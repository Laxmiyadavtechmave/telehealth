<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Pharmacy, PharmacySchedule, Clinic};
use App\Http\Controllers\{CommonController, ImageController};
use DB;
use Hash;
use App\Traits\GeneratesCustomId;
use Carbon\Carbon;
use Spatie\Permission\Models\{Role, Permission};
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PharmacyController extends Controller
{
    use GeneratesCustomId;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.pharmacy.index');
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
        $totalRecords = Pharmacy::count();

        // Count with filter
        $totalRecordswithFilter = Pharmacy::search($searchValue)->count();

        // Fetch data
        $pharmacies = Pharmacy::search($searchValue)->skip($start)->take($rowperpage)->orderBy($columnName, $columnSortOrder)->get();

        // Data formatting
        $data_arr = [];
        foreach ($pharmacies as $key => $row) {
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
                'pharmacy_id' => $row->pharmacy_id ?? '',
                'name' => $row->name ?? '',
                'phone' => $row->phone ?? '',
                'email' => $row->email ?? '',
                'license_no' => $row->license_no ?? '',
                'address1' => $address,
                'clinic_id' => $row->clinic->name ?? '',
                'created_at' => !empty($row->created_at) ? date('d M, Y', strtotime($row->created_at)) : '',
                'status' => $row->status ?? '',
                'action' =>
                    '<div class="d-flex align-items-center ActionDropdown">
                                        <div class="d-flex">
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Clinic Detail" href="' .
                    route('superadmin.pharmacies.edit', encrypt($row->id ?? '')) .
                    '">
                                                <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                            </a>
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="View Clinic Detail" href="' .
                    route('superadmin.pharmacies.show', encrypt($row->id ?? '')) .
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
            $clinics = Clinic::where('status', 'active')->orderBy('id', 'desc')->get();
            return view('admin.pharmacy.create', compact('clinics'));
        } catch (Exception $e) {
            return redirect()->route('superadmin.pharmacy.index')->with('error', 'Something went wrong');
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
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:pharmacies',
                'license_no' => 'required|string|unique:pharmacies', // or adjust if license_no is not user id
                'valid_from' => 'required|date',
                'valid_to' => 'required|date|after_or_equal:valid_from',
                'password' => 'required|string|min:6', // add minimum length for security
                'phone' => 'required|string',
                'address1' => 'required|string',
                'city' => 'required|string',
                'country' => 'required|string',
                'postal_code' => 'required|string',
                'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            ]);

            //Step 2. save clinic
            $customId = $this->generateCustomUniqueId('pharmacies', 'pharmacy_id', 'PHR-', 6);
            $pharmacy = new Pharmacy();
            $pharmacy->pharmacy_id = $customId;
            $pharmacy->name = $request->name ?? '';
            $pharmacy->email = $request->email ?? '';
            $pharmacy->license_no = $request->license_no ?? '';
            $pharmacy->valid_from = $request->valid_from ?? '';
            $pharmacy->valid_to = $request->valid_to ?? '';
            $pharmacy->clinic_id = $request->clinic_id ?? null;
            $pharmacy->pharmacy_type = $request->pharmacy_type ?? '';
            $pharmacy->password = Hash::make($request->password ?? '');
            $pharmacy->phone = $request->phone ?? '';
            $pharmacy->address1 = $request->address1 ?? '';
            $pharmacy->city = $request->city ?? '';
            $pharmacy->country = $request->country ?? '';
            $pharmacy->postal_code = $request->postal_code ?? '';
            $pharmacy->map_link = $request->map_link ?? '';
            if ($request->hasFile('profile_pic')) {
                $pharmacy->img = ImageController::upload($request->file('profile_pic'), '/pharmacies/');
            }

            $pharmacy->extra = $request->filled('extra') ? json_encode($request->extra) : null;
            $pharmacy->save();

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
                    PharmacySchedule::create([
                        'pharmacy_id' => $pharmacy->id,
                        'day' => $day,
                        'start_time' => Carbon::createFromFormat('g:i A', $slot['from'])->format('H:i:s'),
                        'end_time' => Carbon::createFromFormat('g:i A', $slot['to'])->format('H:i:s'),
                        'is_available' => true,
                    ]);
                }
            }

            // Step 5: Save not available days
            foreach ($notAvailable as $day => $val) {
                PharmacySchedule::create([
                    'pharmacy_id' => $pharmacy->id,
                    'day' => $day,
                    'start_time' => null,
                    'end_time' => null,
                    'is_available' => false,
                ]);
            }

            //Step 6. assign role and sync permissions
            $role = Role::create(['name' => $pharmacy->pharmacy_id, 'guard_name' => 'pharmacy']);
            $pharmacy->assignRole($pharmacy->pharmacy_id);

            $pharmacyPermissions = Permission::where('guard_name', 'pharmacy')->get();

            if ($pharmacyPermissions->isNotEmpty()) {
                $role->syncPermissions($pharmacyPermissions);
            }

            DB::commit();
            return redirect()->route('superadmin.pharmacies.index')->with('success', 'Pharmacy created successfully!');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->route('superadmin.pharmacies.create')->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.pharmacy.detail');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $pharmacy = Pharmacy::findorfail(decrypt($id));
            $extra = !empty($pharmacy->extra) ? json_decode($pharmacy->extra, true) : [];
            $clinics = Clinic::where('status', 'active')->orderBy('id', 'desc')->get();
            $schedules = $pharmacy->schedules->groupBy('day', 'extra');
            return view('admin.pharmacy.edit', compact('pharmacy', 'schedules','clinics','extra'));
        } catch (Exception $e) {
            return redirect()->route('superadmin.pharmacies.index')->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        $id = decrypt($id);

        $pharmacy = Pharmacy::findorfail($id);
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:pharmacies,email,' . $id,
                'license_no' => 'required|string|unique:pharmacies,license_no,' . $id, // or adjust if license_no is not user id
                'valid_from' => 'required|date',
                'valid_to' => 'required|date|after_or_equal:valid_from',
                'phone' => 'required|string',
                'address1' => 'required|string',
                'city' => 'required|string',
                'country' => 'required|string',
                'postal_code' => 'required|string',
                'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            ]);
            //Step 2. save pharmacy
            $pharmacy->name = $request->name ?? '';
            $pharmacy->email = $request->email ?? '';
            $pharmacy->license_no = $request->license_no ?? '';
            $pharmacy->valid_from = $request->valid_from ?? '';
            $pharmacy->valid_to = $request->valid_to ?? '';
            if ($request->filled('password')) {
                $pharmacy->password = Hash::make($request->password ?? '');
            }
            $pharmacy->phone = $request->phone ?? '';
            $pharmacy->pharmacy_type = $request->pharmacy_type ?? '';
            $pharmacy->clinic_id = $request->clinic_id ?? null;
            $pharmacy->address1 = $request->address1 ?? '';
            $pharmacy->city = $request->city ?? '';
            $pharmacy->country = $request->country ?? '';
            $pharmacy->postal_code = $request->postal_code ?? '';
            $pharmacy->map_link = $request->map_link ?? '';

            if ($request->hasFile('profile_pic')) {
                if ($pharmacy->img && Storage::disk('public')->exists($pharmacy->img)) {
                    Storage::disk('public')->delete($pharmacy->img);
                }
                $pharmacy->img = ImageController::upload($request->file('profile_pic'), '/pharmacies/');
            }

            $pharmacy->extra = $request->filled('extra') ? json_encode($request->extra) : null;
            $pharmacy->save();

            // Step 3: Validate and store schedule
            PharmacySchedule::where('pharmacy_id', $pharmacy->id)->delete();
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
                    PharmacySchedule::create([
                        'pharmacy_id' => $pharmacy->id,
                        'day' => $day,
                        'start_time' => Carbon::createFromFormat('g:i A', $slot['from'])->format('H:i:s'),
                        'end_time' => Carbon::createFromFormat('g:i A', $slot['to'])->format('H:i:s'),
                        'is_available' => true,
                    ]);
                }
            }

            // Step 5: Save not available days
            foreach ($notAvailable as $day => $val) {
                PharmacySchedule::create([
                    'pharmacy_id' => $pharmacy->id,
                    'day' => $day,
                    'start_time' => null,
                    'end_time' => null,
                    'is_available' => false,
                ]);
            }

            //Step 6. sync permissions
            $role = Role::where('name', $pharmacy->pharmacy_id)->where('guard_name', 'pharmacy')->first();

            $pharmacyPermissions = Permission::where('guard_name', 'pharmacy')->get();

            if ($pharmacyPermissions->isNotEmpty()) {
                $role->syncPermissions($pharmacyPermissions);
            }

            DB::commit();
            return redirect()->route('superadmin.pharmacies.index')->with('success', 'Pharmacy updated successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('superadmin.pharmacies.edit', encrypt($id))->with('error', $e->getMessage())->withInput();
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
