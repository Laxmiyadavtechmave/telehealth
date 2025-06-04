<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Pharmacy, Schedule, Clinic, Document};
use App\Http\Controllers\{CommonController, ImageController};
use DB;
use Hash;
use App\Traits\GeneratesCustomId;
use Carbon\Carbon;
use Spatie\Permission\Models\{Role, Permission};
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use ZipArchive;

class PharmacyController extends Controller
{
    use GeneratesCustomId;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $clinics = Clinic::orderBy('id', 'desc')->get();
            return view('admin.pharmacy.index', compact('clinics'));
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
        $clinic_id = $request->clinic_id;
        $daterange = $request->daterange;

        // Whitelist of sortable fields
        $sortableColumns = ['id', 'name', 'email', 'phone', 'license_no', 'address1', 'status', 'created_at'];
        if (!in_array($columnName, $sortableColumns)) {
            $columnName = 'id';
        }

        // Count total records
        $totalRecords = Pharmacy::count();

        // Base query
        $query = Pharmacy::query();

        // Apply search text
        if (!empty($searchValue)) {
            $query->search($searchValue);
        }

        // Apply status filter
        if (!empty($status)) {
            $query->where('status', $status);
        }

        // Apply status filter
        if (!empty($clinic_id)) {
            $query->where('clinic_id', $clinic_id);
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
                'pharmacy_id' => $row->pharmacy_id ?? '',
                'name' => $row->name ?? '',
                'phone' => $row->phone ?? '',
                'email' => $row->email ?? '',
                'license_no' => $row->license_no ?? '',
                'address1' => $address,
                'clinic_id' => $row->clinic->name ?? '',
                'created_at' => !empty($row->created_at) ? date('d M, Y', strtotime($row->created_at)) : '',
                'status' => '<span class="badge ' . ($statusBg ?? '') . '" data-bs-toggle="tooltip" data-placement="top" data-bs-original-title="Pharmacy is currently ' . ($row->status ?? '') . '">' . ucfirst($row->status ?? '') . '</span>',
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
            return redirect()->route('superadmin.pharmacies.index')->with('error', 'Something went wrong');
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
                // documents validation
                'documents' => 'nullable|array|max:7',
                'documents.*' => 'file|mimes:jpeg,png,jpg,pdf,doc,docx|max:5120',
            ]);

            //Step 2. save clinic
            $customId = $this->generateCustomUniqueId('pharmacies', 'pharmacy_id', 'PHR-', 6);
            $pharmacy = new Pharmacy();
            $pharmacy->pharmacy_id = $customId;
            $pharmacy->name = $request->name ?? null;
            $pharmacy->email = $request->email ?? null;
            $pharmacy->license_no = $request->license_no ?? null;
            $pharmacy->valid_from = $request->valid_from ?? null;
            $pharmacy->valid_to = $request->valid_to ?? null;
            $pharmacy->clinic_id = $request->clinic_id ?? null;
            $pharmacy->pharmacy_type = $request->pharmacy_type ?? null;
            $pharmacy->password = Hash::make($request->password ?? '');
            $pharmacy->phone = $request->phone ?? null;
            $pharmacy->address1 = $request->address1 ?? null;
            $pharmacy->address2 = $request->address2 ?? null;
            $pharmacy->city = $request->city ?? null;
            $pharmacy->country = $request->country ?? null;
            $pharmacy->postal_code = $request->postal_code ?? null;
            $pharmacy->map_link = $request->map_link ?? null;
            if ($request->hasFile('profile_pic')) {
                $pharmacy->img = ImageController::upload($request->file('profile_pic'), '/pharmacies');
            }

            $pharmacy->extra = $request->filled('extra') ? json_encode($request->extra) : null;
            $pharmacy->save();

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
                        $pharmacy->schedules()->create([
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
                $pharmacy->schedules()->create([
                    'day' => $day,
                    'start_time' => null,
                    'end_time' => null,
                    'is_available' => false,
                ]);
            }

            if ($request->hasFile('documents')) {
                foreach ($request->file('documents') as $image) {
                    $path = ImageController::upload($image, '/pharmacies/documents');
                    $pharmacy->documents()->create([
                        'img' => $path,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('superadmin.pharmacies.index')->with('success', 'Pharmacy created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('superadmin.pharmacies.create')->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $pharmacy = Pharmacy::findorfail(decrypt($id));
            $extra = !empty($pharmacy->extra) ? json_decode($pharmacy->extra, true) : [];
            $clinics = Clinic::where('status', 'active')->orderBy('id', 'desc')->get();
            $schedules = $pharmacy->schedules->groupBy('day', 'extra');
            $documents = $pharmacy->documents->sortByDesc('id');
            return view('admin.pharmacy.detail', compact('pharmacy', 'schedules', 'clinics', 'extra', 'documents'));
        } catch (Exception $e) {
            return redirect()->route('superadmin.pharmacies.index')->with('error', 'Something went wrong');
        }
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
            $documents = $pharmacy->documents->map(function ($doc) {
                return [
                    'id' => $doc->id,
                    'name' => basename($doc->img),
                    'url' => env('IMAGE_ROOT') . $doc->img,
                ];
            });
            return view('admin.pharmacy.edit', compact('pharmacy', 'schedules', 'clinics', 'extra', 'documents'));
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
                // documents validation
                'documents' => 'nullable|array|max:7',
                'documents.*' => 'file|mimes:jpeg,png,jpg,pdf,doc,docx|max:5120',
            ]);
            //Step 2. save pharmacy
            $pharmacy->name = $request->name ?? null;
            $pharmacy->email = $request->email ?? null;
            $pharmacy->license_no = $request->license_no ?? null;
            $pharmacy->valid_from = $request->valid_from ?? null;
            $pharmacy->valid_to = $request->valid_to ?? null;
            if ($request->filled('password')) {
                $pharmacy->password = Hash::make($request->password ?? '');
            }
            $pharmacy->phone = $request->phone ?? null;
            $pharmacy->pharmacy_type = $request->pharmacy_type ?? null;
            $pharmacy->clinic_id = $request->clinic_id ?? null;
            $pharmacy->address1 = $request->address1 ?? null;
            $pharmacy->address2 = $request->address2 ?? null;
            $pharmacy->city = $request->city ?? null;
            $pharmacy->country = $request->country ?? null;
            $pharmacy->postal_code = $request->postal_code ?? null;
            $pharmacy->map_link = $request->map_link ?? null;

            if ($request->hasFile('profile_pic')) {
                if ($pharmacy->img && Storage::disk('public')->exists($pharmacy->img)) {
                    Storage::disk('public')->delete($pharmacy->img);
                }
                $pharmacy->img = ImageController::upload($request->file('profile_pic'), '/pharmacies');
            }

            $pharmacy->extra = $request->filled('extra') ? json_encode($request->extra) : null;
            $pharmacy->save();

            // Step 3: Validate and store schedule
            $pharmacy->schedules()->delete();
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
                        $pharmacy->schedules()->create([
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
                $pharmacy->schedules()->create([
                    'day' => $day,
                    'start_time' => null,
                    'end_time' => null,
                    'is_available' => false,
                ]);
            }

            $removedFileIds = json_decode($request->removed_files, true);
            if (!empty($removedFileIds)) {
                $pharmacy->documents()->whereIn('id', $removedFileIds)->delete();
            }

            if ($request->hasFile('documents')) {
                foreach ($request->file('documents') as $image) {
                    $path = ImageController::upload($image, '/pharmacies/documents');
                    $pharmacy->documents()->create([
                        'img' => $path,
                    ]);
                }
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
}
