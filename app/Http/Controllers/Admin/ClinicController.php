<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Clinic, ClinicSchedule};
use App\Http\Controllers\{CommonController, ImageController};
use DB;
use Hash;
use App\Traits\GeneratesCustomId;
use Carbon\Carbon;
use Spatie\Permission\Models\{Role, Permission};
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ClinicController extends Controller
{
    use GeneratesCustomId;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.clinics.index');
        } catch (Exception $e) {
            return redirect()->route('superadmin.dashboard')->with('error', 'Something went wrong');
        }
    }

    public function ajaxDatatable(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get('start');
        $rowperpage = $request->get('length');

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column'] ?? 0;
        $columnName = $columnName_arr[$columnIndex]['data'] ?? 'name';
        $columnSortOrder = $columnIndex_arr[0]['dir'] ?? 'asc';
        $searchValue = $search_arr['value'] ?? '';

        // Whitelist of sortable fields
        $sortableColumns = ['id', 'name', 'email', 'phone', 'license_no', 'address1', 'status', 'created_at'];
        if (!in_array($columnName, $sortableColumns)) {
            $columnName = 'id';
        }

        // Count total records
        $totalRecords = Clinic::count();

        // Count with filter
        $totalRecordswithFilter = Clinic::search($searchValue)->count();

        // Fetch data
        $clinics = Clinic::search($searchValue)->skip($start)->take($rowperpage)->orderBy($columnName, $columnSortOrder)->get();

        // Data formatting
        $data_arr = [];
        foreach ($clinics as $key => $row) {
            $statusBg = CommonController::statusBg($row->status ?? '');

            $address =
                '  <div class="LongMesage_container">
                                        <input class="refuge-collection-input tableLongMessage_Input" value="' .
                implode(', ', array_filter([$row->address1 ?? '', $row->address2 ?? '', $row->city ?? '', $row->country ?? '', $row->postal_code ?? ''])) .
                '" readonly>
                                        <button class="view-btn tablemessageview_btn" type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Click to view" data-bs-original-title="' .
                implode(', ', array_filter([$row->address1 ?? '', $row->address2 ?? '', $row->city ?? '', $row->country ?? '', $row->postal_code ?? ''])) .
                '">
                                            <iconify-icon icon="ion:eye-outline"></iconify-icon> Read More
                                        </button>
                                    </div>';

            $data_arr[] = [
                'clinic_id' => $row->clinic_id ?? '',
                'name' => $row->name ?? '',
                'phone' => $row->phone ?? '',
                'email' => $row->email ?? '',
                'license_no' => $row->license_no ?? '',
                'address1' => $address,
                'total_doctors' => 7,
                'created_at' => !empty($row->created_at) ? date('d M, Y', strtotime($row->created_at)) : '',
                'status' => $row->status ?? '',
                'action' =>
                    '<div class="d-flex align-items-center ActionDropdown">
                                        <div class="d-flex">
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Clinic Detail" href="' .
                    route('superadmin.clinic.edit', encrypt($row->id ?? '')) .
                    '">
                                                <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                            </a>
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="View Clinic Detail" href="' .
                    route('superadmin.clinic.show', encrypt($row->id ?? '')) .
                    '">
                                                <span class="icon"><span class="feather-icon"><iconify-icon icon="hugeicons:view"></iconify-icon></span></span>
                                            </a>
                                        </div>
                                    </div>',
            ];
        }

        // Response
        $response = [
            'draw' => intval($draw),
            'iTotalRecords' => $totalRecords,
            'iTotalDisplayRecords' => $totalRecordswithFilter,
            'aaData' => $data_arr,
        ];

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('admin.clinics.create');
        } catch (Exception $e) {
            return redirect()->route('superadmin.clinic.index')->with('error', 'Something went wrong');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'clinic_name' => 'required|string|max:255',
                'email' => 'required|email|unique:clinics',
                'license_no' => 'required|string|unique:clinics', // or adjust if license_no is not user id
                'valid_from' => 'required|date',
                'valid_to' => 'required|date|after_or_equal:valid_from',
                'password' => 'required|string|min:6', // add minimum length for security
                'phone' => 'required|string',
                'web_url' => 'required|url',
                'address1' => 'required|string',
                'city' => 'required|string',
                'country' => 'required|string',
                'postal_code' => 'required|string',
                'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            ]);

            //Step 2. save clinic
            $customId = $this->generateCustomUniqueId('clinics', 'clinic_id', 'CL-', 6);
            $clinic = new Clinic();
            $clinic->clinic_id = $customId;
            $clinic->name = $request->clinic_name ?? '';
            $clinic->email = $request->email ?? '';
            $clinic->license_no = $request->license_no ?? '';
            $clinic->valid_from = $request->valid_from ?? '';
            $clinic->valid_to = $request->valid_to ?? '';
            $clinic->password = Hash::make($request->password ?? '');
            $clinic->phone = $request->phone ?? '';
            $clinic->web_url = $request->web_url ?? '';
            $clinic->address1 = $request->address1 ?? '';
            $clinic->city = $request->city ?? '';
            $clinic->country = $request->country ?? '';
            $clinic->postal_code = $request->postal_code ?? '';
            $clinic->map_link = $request->map_link ?? '';
            if ($request->hasFile('profile_pic')) {
                $clinic->img = ImageController::upload($request->file('profile_pic'), '/clinics/');
            }

            $clinic->extra = $request->filled('extra') ? json_encode($request->extra) : null;
            $clinic->save();

            // Step 3: Validate and store schedule
            $workingHours = $request->input('working_hours', []);
            $notAvailable = $request->input('not_available', []);

            $validationErrors = CommonController::validateClinicSchedule($workingHours, $notAvailable);

            if (!empty($validationErrors)) {
                return back()->withErrors($validationErrors)->withInput();
            }

            // Step 4: Save available slots
            foreach ($workingHours as $day => $info) {
                foreach ($info['slots'] ?? [] as $slot) {
                    ClinicSchedule::create([
                        'clinic_id' => $clinic->id,
                        'day' => $day,
                        'start_time' => Carbon::createFromFormat('g:i A', $slot['from'])->format('H:i:s'),
                        'end_time' => Carbon::createFromFormat('g:i A', $slot['to'])->format('H:i:s'),
                        'is_available' => true,
                    ]);
                }
            }

            // Step 5: Save not available days
            foreach ($notAvailable as $day => $val) {
                ClinicSchedule::create([
                    'clinic_id' => $clinic->id,
                    'day' => $day,
                    'start_time' => null,
                    'end_time' => null,
                    'is_available' => false,
                ]);
            }

            //Step 6. assign role and sync permissions
            $role = Role::create(['name' => $clinic->clinic_id, 'guard_name' => 'clinic']);
            $clinic->assignRole($request->role_name);

            $clinicPermissions = Permission::where('guard_name', 'clinic')->get();

            if ($clinicPermissions->isNotEmpty()) {
                $role->syncPermissions($clinicPermissions);
            }

            DB::commit();
            return redirect()->route('superadmin.clinic.index')->with('success', 'Clinic created successfully!');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->route('superadmin.clinic.create')->with('error', 'Something went wrong')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $clinic = Clinic::findorfail(decrypt($id));
            $extra = !empty($clinic->extra) ? json_decode($clinic->extra, true) : [];
            $schedules = $clinic->schedules->groupBy('day');
            return view('admin.clinics.edit', compact('clinic', 'extra','schedules'));
        } catch (Exception $e) {
            return redirect()->route('superadmin.clinic.index')->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        $id = decrypt($id);

        $clinic = Clinic::findorfail($id);
        try {
            $request->validate([
                'clinic_name' => 'required|string|max:255',
                'email' => 'required|email|unique:clinics,email,' . $id,
                'license_no' => 'required|string|unique:clinics,license_no,' . $id, // or adjust if license_no is not user id
                'valid_from' => 'required|date',
                'valid_to' => 'required|date|after_or_equal:valid_from',
                'phone' => 'required|string',
                'web_url' => 'required|url',
                'address1' => 'required|string',
                'city' => 'required|string',
                'country' => 'required|string',
                'postal_code' => 'required|string',
                'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            ]);
            //Step 2. save clinic
// dd("Sdfds");
            $clinic->name = $request->clinic_name ?? '';
            $clinic->email = $request->email ?? '';
            $clinic->license_no = $request->license_no ?? '';
            $clinic->valid_from = $request->valid_from ?? '';
            $clinic->valid_to = $request->valid_to ?? '';
            if ($request->filled('password')) {
                $clinic->password = Hash::make($request->password ?? '');
            }
            $clinic->phone = $request->phone ?? '';
            $clinic->web_url = $request->web_url ?? '';
            $clinic->address1 = $request->address1 ?? '';
            $clinic->city = $request->city ?? '';
            $clinic->country = $request->country ?? '';
            $clinic->postal_code = $request->postal_code ?? '';
            $clinic->map_link = $request->map_link ?? '';

            if ($request->hasFile('profile_pic')) {
                if ($clinic->img && Storage::disk('public')->exists($clinic->img)) {
                    Storage::disk('public')->delete($clinic->img);
                }
                $clinic->img = ImageController::upload($request->file('profile_pic'), '/clinics/');
            }

            $clinic->extra = $request->filled('extra') ? json_encode($request->extra) : null;
            $clinic->save();
            // dd($clinic,$request->all());
            // Step 3: Validate and store schedule
            ClinicSchedule::where('clinic_id', $clinic->id)->delete();
            $workingHours = $request->input('working_hours', []);
            $notAvailable = $request->input('not_available', []);

            $validationErrors = CommonController::validateClinicSchedule($workingHours, $notAvailable);

            if (!empty($validationErrors)) {
                dd($validationErrors);
                return redirect()->back()->withErrors($validationErrors)->withInput();
            }

            // Step 4: Save available slots
            foreach ($workingHours as $day => $info) {
                foreach ($info['slots'] ?? [] as $slot) {
                    ClinicSchedule::create([
                        'clinic_id' => $clinic->id,
                        'day' => $day,
                        'start_time' => Carbon::createFromFormat('g:i A', $slot['from'])->format('H:i:s'),
                        'end_time' => Carbon::createFromFormat('g:i A', $slot['to'])->format('H:i:s'),
                        'is_available' => true,
                    ]);
                }
            }

            // Step 5: Save not available days
            foreach ($notAvailable as $day => $val) {
                ClinicSchedule::create([
                    'clinic_id' => $clinic->id,
                    'day' => $day,
                    'start_time' => null,
                    'end_time' => null,
                    'is_available' => false,
                ]);
            }

            //Step 6. sync permissions
            $role = Role::where('name', $clinic->clinic_id)->where('guard_name', 'clinic')->first();

            $clinicPermissions = Permission::where('guard_name', 'clinic')->get();

            if ($clinicPermissions->isNotEmpty()) {
                $role->syncPermissions($clinicPermissions);
            }

            DB::commit();
            return redirect()->route('superadmin.clinic.index')->with('success', 'Clinic updated successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return redirect()->route('superadmin.clinic.edit', encrypt($id))->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
