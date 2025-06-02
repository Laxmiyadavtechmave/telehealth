<?php

namespace App\Http\Controllers\Admin;

use App\Models\{Clinic, Schedule, Document};
use DB;
use Carbon\Carbon;
use App\Traits\GeneratesCustomId;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use ZipArchive;
use Spatie\Permission\Models\{Role, Permission};
use Illuminate\Foundation\Exceptions\Renderer\Exception;

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
        $status = $request->status;
        $daterange = $request->daterange;
        // Whitelist of sortable fields
        $sortableColumns = ['id', 'name', 'email', 'phone', 'license_no', 'address1', 'status', 'created_at'];
        if (!in_array($columnName, $sortableColumns)) {
            $columnName = 'id';
        }

        // Count total records
        $totalRecords = Clinic::count();

        // Base query
        $query = Clinic::query();

        // Apply search text
        if (!empty($searchValue)) {
            $query->search($searchValue);
        }

        // Apply status filter
        if (!empty($status)) {
            $query->where('status', $status);
        }

        // // Apply daterange filter
        if (!empty($daterange)) {
            try {
                [$startRange, $endRange] = explode(' - ', $daterange);

                $startDate = Carbon::createFromFormat('m/d/Y', trim($startRange))->format('Y-m-d');
                $endDate = Carbon::createFromFormat('m/d/Y', trim($endRange))->format('Y-m-d');

                $query->whereDate('created_at', '>=', $startDate)->whereDate('created_at', '<=', $endDate);
            } catch (\Exception $e) {
                \Log::error('Invalid date range: ' . $e->getMessage());
            }
        }

        // Count with filter
        $totalRecordswithFilter = $query->count();

        // Fetch data
        $records = $query->skip($start)->take($rowperpage)->orderBy($columnName, $columnSortOrder)->get();

        // Data formatting
        $data_arr = [];
        foreach ($records as $key => $row) {
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
                'id' => $row->id ?? '',
                'clinic_id' => $row->clinic_id ?? '',
                'name' => $row->name ?? '',
                'phone' => $row->phone ?? '',
                'email' => $row->email ?? '',
                'license_no' => $row->license_no ?? '',
                'address1' => $address,
                'total_doctors' => 7,
                'created_at' => !empty($row->created_at) ? date('d M, Y', strtotime($row->created_at)) : '',
                'status' => '<span class="badge ' . ($statusBg ?? '') . '" data-bs-toggle="tooltip" data-placement="top" data-bs-original-title="Clinic is currently ' . ($row->status ?? '') . '">' . ucfirst($row->status ?? '') . '</span>',
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
                // documents validation
                'documents' => 'nullable|array|max:7',
                'documents.*' => 'file|mimes:jpeg,png,jpg,pdf,doc,docx|max:5120',
            ]);

            //Step 2. save clinic
            $customId = $this->generateCustomUniqueId('clinics', 'clinic_id', 'CL-', 6);
            $clinic = new Clinic();
            $clinic->clinic_id = $customId;
            $clinic->name = $request->clinic_name ?? null;
            $clinic->email = $request->email ?? null;
            $clinic->license_no = $request->license_no ?? null;
            $clinic->valid_from = $request->valid_from ?? null;
            $clinic->valid_to = $request->valid_to ?? null;
            $clinic->password = Hash::make($request->password ?? '');
            $clinic->phone = $request->phone ?? null;
            $clinic->web_url = $request->web_url ?? null;
            $clinic->address1 = $request->address1 ?? null;
            $clinic->address2 = $request->address2 ?? null;
            $clinic->city = $request->city ?? null;
            $clinic->country = $request->country ?? null;
            $clinic->postal_code = $request->postal_code ?? null;
            $clinic->map_link = $request->map_link ?? null;
            if ($request->hasFile('profile_pic')) {
                $clinic->img = ImageController::upload($request->file('profile_pic'), '/clinics');
            }

            $clinic->extra = $request->filled('extra') ? json_encode($request->extra) : null;
            $clinic->save();

            // Step 3: Validate and store schedule
            $workingHours = $request->input('working_hours', []);
            $notAvailable = $request->input('not_available', []);

            $validationErrors = CommonController::validateSchedule($workingHours, $notAvailable);

            if (!empty($validationErrors)) {
                return back()->withErrors($validationErrors)->withInput();
            }

            // Step 4: Save available slots
            foreach ($workingHours as $day => $info) {
                if (isset($notAvailable[$day])) {
                    continue;
                }
                if (!empty($info['slots'])) {
                    foreach ($info['slots'] ?? [] as $slot) {
                        $clinic->schedules()->create([
                            'day' => $day,
                            'start_time' => Carbon::createFromFormat('g:i A', $slot['from'])->format('H:i:s'),
                            'end_time' => Carbon::createFromFormat('g:i A', $slot['to'])->format('H:i:s'),
                            'is_available' => true,
                        ]);
                    }
                }
            }

            // Step 5: Save not available days
            foreach ($notAvailable as $day => $val) {
                $clinic->schedules()->create([
                    'day' => $day,
                    'start_time' => null,
                    'end_time' => null,
                    'is_available' => false,
                ]);
            }

            if ($request->hasFile('documents')) {
                foreach ($request->file('documents') as $image) {
                    $path = ImageController::upload($image, '/clinics/documents');

                    $clinic->documents()->create([

                    ClinicImage::create([
                        'clinic_id' => $clinic->id,

                        'img' => $path,
                    ]);
                }
            }

            //Step 6. assign role and sync permissions
            $role = Role::create(['name' => $clinic->clinic_id, 'guard_name' => 'clinic']);
            $clinic->assignRole($clinic->clinic_id);

            $clinicPermissions = Permission::where('guard_name', 'clinic')->get();

            if ($clinicPermissions->isNotEmpty()) {
                $role->syncPermissions($clinicPermissions);
            }

            DB::commit();
            return redirect()->route('superadmin.clinic.index')->with('success', 'Clinic created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('superadmin.clinic.create')->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $clinic = Clinic::findorfail(decrypt($id));
            $extra = !empty($clinic->extra) ? json_decode($clinic->extra, true) : [];
            $schedules = $clinic->schedules->groupBy('day');
            $documents = $clinic->documents->sortByDesc('id');
            return view('admin.clinics.detail', compact('clinic', 'extra', 'schedules', 'documents'));
        } catch (Exception $e) {
            return redirect()->route('superadmin.clinic.index')->with('error', 'Something went wrong');
        }
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
            $documents = $clinic->documents->map(function ($doc) {
                return [
                    'id' => $doc->id,
                    'name' => basename($doc->img),
                    'url' => env('IMAGE_ROOT') . $doc->img,
                ];
            });
            return view('admin.clinics.edit', compact('clinic', 'extra', 'schedules', 'documents'));
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

                // documents validation
                'documents' => 'nullable|array|max:7',
                'documents.*' => 'file|mimes:jpeg,png,jpg,pdf,doc,docx|max:5120',
            ]);
            //Step 2. save clinic
            $clinic->name = $request->clinic_name ?? null;
            $clinic->email = $request->email ?? null;
            $clinic->license_no = $request->license_no ?? null;
            $clinic->valid_from = $request->valid_from ?? null;
            $clinic->valid_to = $request->valid_to ?? null;
            if ($request->filled('password')) {
                $clinic->password = Hash::make($request->password ?? '');
            }
            $clinic->phone = $request->phone ?? null;
            $clinic->web_url = $request->web_url ?? null;
            $clinic->address1 = $request->address1 ?? null;
            $clinic->address2 = $request->address2 ?? null;
            $clinic->city = $request->city ?? null;
            $clinic->country = $request->country ?? null;
            $clinic->postal_code = $request->postal_code ?? null;
            $clinic->map_link = $request->map_link ?? null;
            if ($request->hasFile('profile_pic')) {
                if ($clinic->img && Storage::disk('public')->exists($clinic->img)) {
                    Storage::disk('public')->delete($clinic->img);
                }
                $clinic->img = ImageController::upload($request->file('profile_pic'), '/clinics');
            }

            $clinic->extra = $request->filled('extra') ? json_encode($request->extra) : null;
            $clinic->save();

            // Step 3: Validate and store schedule
            $clinic->schedules()->delete();

            $workingHours = $request->input('working_hours', []);
            $notAvailable = $request->input('not_available', []);

            $validationErrors = CommonController::validateSchedule($workingHours, $notAvailable);

            if (!empty($validationErrors)) {
                return redirect()->back()->withErrors($validationErrors)->withInput();
            }

            // Step 4: Save available slots
            foreach ($workingHours as $day => $info) {
                if (isset($notAvailable[$day])) {
                    continue;
                }
                if (!empty($info['slots'])) {
                    foreach ($info['slots'] ?? [] as $slot) {
                        $clinic->schedules()->create([
                            'day' => $day,
                            'start_time' => Carbon::createFromFormat('g:i A', $slot['from'])->format('H:i:s'),
                            'end_time' => Carbon::createFromFormat('g:i A', $slot['to'])->format('H:i:s'),
                            'is_available' => true,
                        ]);
                    }
                }
            }

            // Step 5: Save not available days
            foreach ($notAvailable as $day => $val) {
                $clinic->schedules()->create([
                    'day' => $day,
                    'start_time' => null,
                    'end_time' => null,
                    'is_available' => false,
                ]);
            }

            $removedFileIds = json_decode($request->removed_files, true);
            if (!empty($removedFileIds)) {
                $clinic->documents()->whereIn('id', $removedFileIds)->delete();
            }

            if ($request->hasFile('documents')) {
                foreach ($request->file('documents') as $image) {
                    $path = ImageController::upload($image, '/clinics/documents');
                    $clinic->documents()->create([
                        'img' => $path,
                    ]);
                }
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
            return redirect()->route('superadmin.clinic.edit', encrypt($id))->with('error', $e->getMessage())->withInput();
        }
    }

    public function downloadDocuments(Request $request, $id)
    {
        $id = decrypt($id);
        $ids = json_decode($request->document_ids, true);

        if (empty($ids)) {
            return redirect()->back()->with('error', 'Documents not selected.');
        }

        $documents = Document::whereIn('id', $ids)->get();
        $zipFileName = 'clinic_documents_' . now()->format('YmdHis') . '.zip';
        $zipPath = storage_path("app/public/zips/{$zipFileName}");

        if (!file_exists(storage_path('app/public/zips'))) {
            mkdir(storage_path('app/public/zips'), 0755, true);
        }

        $zip = new ZipArchive();
        if ($zip->open($zipPath, ZipArchive::CREATE) === true) {
            foreach ($documents as $doc) {
                if (Storage::disk('public')->exists($doc->img)) {
                    $filePath = storage_path('app/public/' . $doc->img);
                    $zip->addFile($filePath, basename($doc->img));
                }
            }
            $zip->close();
        }
        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
