<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Doctor, Clinic, AreaOfExpertise, DoctorConsultationFee, DoctorExpertise};
use Carbon\Carbon;
use App\Http\Controllers\{CommonController, ImageController};
use DB;
use App\Traits\GeneratesCustomId;
use Hash;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    use GeneratesCustomId;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $clinics = Clinic::where('status', 'active')->get();
            $specilization = AreaOfExpertise::where('type', 'doctor')->get();
            return view('clinic.doctor.index', compact('clinics', 'specilization'));
        } catch (\Exception $e) {
            return redirect()->route('clinic.dashboard')->with('error', 'Something went wrong');
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
        $specilization = $request->specilization;
        $daterange = $request->daterange;
        // Whitelist of sortable fields
        $sortableColumns = ['id', 'name', 'email', 'phone', 'license_no', 'address1', 'status', 'created_at'];
        if (!in_array($columnName, $sortableColumns)) {
            $columnName = 'id';
        }

        // Count total records
        $totalRecords = Doctor::count();

        // Base query
        $query = Doctor::query();
        $query->with(['doctorExpertises.expertise', 'clinic']);

        // Apply search text
        if (!empty($searchValue)) {
            $query->search($searchValue);
        }

        // Apply clinic filter
        if (!empty($clinic_id)) {
            $query->where('clinic_id', $clinic_id);
        }

        if (!empty($specilization)) {
            $query->whereHas('doctorExpertises', function ($q) use ($specilization) {
                $q->where('expertise_id', $specilization);
            });
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
            $extra = !empty($row->extra) ? json_decode($row->extra, true) : [];
            $doctor_spl = $row->doctorExpertises
                ->map(function ($doctorExpertise) {
                    return $doctorExpertise->expertise ? $doctorExpertise->expertise->name : null;
                })
                ->filter()
                ->implode(',');
            if (!empty($doctor_spl)) {
                $expertise =
                    '  <div class="LongMesage_container">
                                        <input class="refuge-collection-input tableLongMessage_Input" value="' .
                    ($doctor_spl ?? '') .
                    '" readonly>
                                        <button class="view-btn tablemessageview_btn" type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Click to view" data-bs-original-title="' .
                    ($doctor_spl ?? '') .
                    '">
                                            <iconify-icon icon="ion:eye-outline"></iconify-icon> Read More
                                        </button>
                                    </div>';
            }

            $currentStatus = strtolower($row->status ?? 'inactive');
            $alternateStatus = $currentStatus === 'active' ? 'inactive' : 'active';

            $status =
                '<div class="dropdown status-dropdown d-inline-block">
        <button class="badge ' .
                ($statusBg ?? '') .
                ' dropdown-toggle border-0 change-status-btn"
            data-id="' .
                encrypt($row->id) .
                '"
            data-status="' .
                $currentStatus .
                '"
            type="button" data-bs-toggle="dropdown" aria-expanded="false">
            ' .
                ucfirst($currentStatus) .
                '
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item status-option" data-id="' .
                encrypt($row->id) .
                '" data-status="' .
                $alternateStatus .
                '">' .
                ucfirst($alternateStatus) .
                '</a></li>
        </ul>
    </div>';

            $data_arr[] = [
                'id' => $row->id ?? '',
                'doctor_id' => $row->doctor_id ?? '',
                'name' => $row->name ?? '',
                'phone' => $row->phone ?? '',
                'email' => $row->email ?? '',
                'specilization' => $expertise,
                'experience' => !empty($extra['experience']) ? $extra['experience'] . ' Year' : 'N/A',
                'consultation' => 'asd',
                'clinic_id' => $row->clinic->name ?? '',
                'created_at' => !empty($row->created_at) ? date('d M, Y', strtotime($row->created_at)) : '',
                'status' => $status,
                'action' =>
                    '<div class="d-flex align-items-center ActionDropdown">
                                        <div class="d-flex">
                                        <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Doctor Detail" href="' .
                    route('clinic.doctor.edit', encrypt($row->id ?? '')) .
                    '">
                                                <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                            </a>
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="View Doctor Detail" href="' .
                    route('clinic.doctor.show', encrypt($row->id ?? '')) .
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
            $specilization = AreaOfExpertise::where('type', 'doctor')->get();
            return view('clinic.doctor.create', compact('specilization'));
        } catch (\Exception $e) {
            return redirect()->route('clinic.doctor.index')->with('error', 'Something went wrong');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:doctors',
                'license_no' => 'required|string|unique:doctors', // or adjust if license_no is not user id
                'valid_from' => 'required|date',
                'valid_to' => 'required|date|after_or_equal:valid_from',
                'password' => 'required|string|min:6', // add minimum length for security
                'gender' => 'required|string',
                'phone' => 'required',
                'address1' => 'required|string',
                'city' => 'required|string',
                'country' => 'required|string',
                'postal_code' => 'required|string',
                'extra.degree' => 'required',
                'specilization.*' => 'required',
                'extra.experience' => 'required',

                // Audio
                'consultation.audio.duration' => 'required_with:consultation.audio.price|nullable|integer|min:1',
                'consultation.audio.price' => 'required_with:consultation.audio.duration|nullable|numeric|min:0',

                // Video
                'consultation.video.duration' => 'required_with:consultation.video.price|nullable|integer|min:1',
                'consultation.video.price' => 'required_with:consultation.video.duration|nullable|numeric|min:0',

                // Physical
                'consultation.physical.duration' => 'required_with:consultation.physical.price|nullable|integer|min:1',
                'consultation.physical.price' => 'required_with:consultation.physical.duration|nullable|numeric|min:0',

                'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            ]);

            //Step 2. save clinic
            $customId = $this->generateCustomUniqueId('doctors', 'doctor_id', 'DOC-', 6);
            $doc = new Doctor();
            $doc->doctor_id = $customId;
            $doc->name = $request->name ?? null;
            $doc->email = $request->email ?? null;
            $doc->password = Hash::make($request->password ?? '');
            $doc->phone = $request->phone ?? null;
            $doc->license_no = $request->license_no ?? null;
            $doc->valid_from = $request->valid_from ?? null;
            $doc->valid_to = $request->valid_to ?? null;
            $doc->clinic_id = auth()->guard('clinic')->user()?->id;
            $doc->marital_status = $request->marital_status ?? null;
            $doc->address1 = $request->address1 ?? null;
            $doc->address2 = $request->address2 ?? null;
            $doc->city = $request->city ?? null;
            $doc->country = $request->country ?? null;
            $doc->postal_code = $request->postal_code ?? null;
            if ($request->hasFile('profile_pic')) {
                $doc->img = ImageController::upload($request->file('profile_pic'), '/clinics/doctors');
            }

            $doc->extra = $request->filled('extra') ? json_encode($request->extra) : null;
            $doc->save();

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
                        $doc->schedules()->create([
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
                $doc->schedules()->create([
                    'day' => $day,
                    'start_time' => null,
                    'end_time' => null,
                    'is_available' => false,
                ]);
            }

            $consultations = $request->input('consultation', []);

            foreach ($consultations as $type => $data) {
                if (!isset($data['selected'])) {
                    continue; // skip unselected
                }

                $typeLower = strtolower($type);

                DoctorConsultationFee::create([
                    'doctor_id' => $doc->id,
                    'type' => $typeLower,
                    'duration_minutes' => $typeLower !== 'chat' ? $data['duration'] ?? null : null,
                    'price' => $typeLower !== 'chat' ? $data['price'] ?? null : null,
                ]);
            }

            $consultations = $request->input('specilization', []);
            foreach ($consultations as $sp) {
                DoctorExpertise::create([
                    'doctor_id' => $doc->id,
                    'expertise_id' => $sp,
                ]);
            }

            DB::commit();
            return redirect()->route('clinic.doctor.index')->with('success', 'Doctor created successfully!');
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            return redirect()->route('clinic.doctor.create')->with('error', $e->getMessage())->withInput();
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $doctor = Doctor::find(decrypt($request->id));
            if (!$doctor) {
                return response()->json(['success' => false, 'message' => 'Doctor not found']);
            }

            $doctor->status = $request->status;
            $doctor->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            return redirect()->route('clinic.doctor.create')->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $doctor = Doctor::findorfail(decrypt($id));
            $extra = !empty($doctor->extra) ? json_decode($doctor->extra, true) : [];
            $specilization = AreaOfExpertise::where('type', 'doctor')->get();
            $schedules = $doctor->schedules->groupBy('day');
            $documents = $doctor->documents->sortByDesc('id');
            $consultationFees = $doctor?->consulationTypes?->keyBy('type');

            $dob = $extra['dob'] ?? null;
            $age = null;

            if ($dob) {
                $dobCarbon = Carbon::parse($dob);
                $now = Carbon::now();

                if ($dobCarbon->diffInYears($now) >= 1) {
                    $years = $dobCarbon->diffInYears($now);
                    $age = $years . ' year' . ($years > 1 ? 's' : '');
                } else {
                    $days = $dobCarbon->diffInDays($now);
                    $age = (int) $days . ' day' . ($days > 1 ? 's' : '');
                }
            }

            return view('clinic.doctor.detail', compact('specilization', 'doctor', 'extra', 'schedules', 'consultationFees', 'age','documents'));
        } catch (\Exception $e) {
            return redirect()->route('clinic.doctor.index')->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $doctor = Doctor::findorfail(decrypt($id));
            $extra = !empty($doctor->extra) ? json_decode($doctor->extra, true) : [];
            $specilization = AreaOfExpertise::where('type', 'doctor')->get();
            $schedules = $doctor->schedules->groupBy('day');
            $consultationFees = $doctor?->consulationTypes?->keyBy('type');
            return view('clinic.doctor.edit', compact('specilization', 'doctor', 'extra', 'schedules', 'consultationFees'));
        } catch (\Exception $e) {
            return redirect()->route('clinic.doctor.index')->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:doctors,email,' . $id,
                'license_no' => 'required|string|unique:doctors,license_no,' . $id, // or adjust if license_no is not user id
                'valid_from' => 'required|date',
                'valid_to' => 'required|date|after_or_equal:valid_from',
                'gender' => 'required|string',
                'phone' => 'required',
                'address1' => 'required|string',
                'city' => 'required|string',
                'country' => 'required|string',
                'postal_code' => 'required|string',
                'extra.degree' => 'required',
                'specilization.*' => 'required',
                'extra.experience' => 'required',

                // Audio
                'consultation.audio.duration' => 'required_with:consultation.audio.price|nullable|integer|min:1',
                'consultation.audio.price' => 'required_with:consultation.audio.duration|nullable|numeric|min:0',

                // Video
                'consultation.video.duration' => 'required_with:consultation.video.price|nullable|integer|min:1',
                'consultation.video.price' => 'required_with:consultation.video.duration|nullable|numeric|min:0',

                // Physical
                'consultation.physical.duration' => 'required_with:consultation.physical.price|nullable|integer|min:1',
                'consultation.physical.price' => 'required_with:consultation.physical.duration|nullable|numeric|min:0',

                'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            ]);

            //Step 2. update clinic
            $doc = Doctor::find($id);
            $doc->name = $request->name ?? null;
            $doc->email = $request->email ?? null;
            if ($request->filled('password')) {
                $doc->password = Hash::make($request->password ?? '');
            }
            $doc->phone = $request->phone ?? null;
            $doc->license_no = $request->license_no ?? null;
            $doc->valid_from = $request->valid_from ?? null;
            $doc->valid_to = $request->valid_to ?? null;
            $doc->clinic_id = auth()->guard('clinic')->user()?->id;
            $doc->marital_status = $request->marital_status ?? null;
            $doc->address1 = $request->address1 ?? null;
            $doc->address2 = $request->address2 ?? null;
            $doc->city = $request->city ?? null;
            $doc->country = $request->country ?? null;
            $doc->postal_code = $request->postal_code ?? null;
            if ($request->hasFile('profile_pic')) {
                if ($doc->img && Storage::disk('public')->exists($doc->img)) {
                    Storage::disk('public')->delete($doc->img);
                }
                $doc->img = ImageController::upload($request->file('profile_pic'), '/clinics/doctors');
            }

            $doc->extra = $request->filled('extra') ? json_encode($request->extra) : null;
            $doc->save();

            // Step 3: Validate and store schedule
            $doc->schedules()->delete();
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
                        $doc->schedules()->create([
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
                $doc->schedules()->create([
                    'day' => $day,
                    'start_time' => null,
                    'end_time' => null,
                    'is_available' => false,
                ]);
            }

            // Handle DoctorConsultationFee
            $submittedConsultations = $request->input('consultation', []);
            $existingFees = $doc?->consultationTypes?->keyBy('type');

            // Types from form (chat/audio/video/physical)
            $submittedTypes = array_keys($submittedConsultations);

            // Delete types that are no longer selected
            $typesToDelete = !empty($existingFees) ? $existingFees->keys()->diff($submittedTypes) : [];
            DoctorConsultationFee::where('doctor_id', $doc->id)->whereIn('type', $typesToDelete)->delete();

            // Update or Create
            foreach ($submittedConsultations as $type => $data) {
                if (!isset($data['selected'])) {
                    continue;
                }

                $typeLower = strtolower($type);

                if (!empty($existingFees) && $existingFees->has($typeLower)) {
                    // Update
                    $fee = $existingFees[$typeLower];
                    $fee->duration_minutes = $typeLower !== 'chat' ? $data['duration'] ?? null : null;
                    $fee->price = $typeLower !== 'chat' ? $data['price'] ?? null : null;
                    $fee->save();
                } else {
                    // Create new
                    DoctorConsultationFee::create([
                        'doctor_id' => $doc->id,
                        'type' => $typeLower,
                        'duration_minutes' => $typeLower !== 'chat' ? $data['duration'] ?? null : null,
                        'price' => $typeLower !== 'chat' ? $data['price'] ?? null : null,
                    ]);
                }
            }

            // Handle DoctorExpertise (specializations)
            $submittedExpertiseIds = $request->input('specilization', []);
            $existingExpertiseIds = $doc->doctorExpertises->pluck('expertise_id')->toArray();

            // Delete removed
            $toDelete = array_diff($existingExpertiseIds, $submittedExpertiseIds);
            DoctorExpertise::where('doctor_id', $doc->id)->whereIn('expertise_id', $toDelete)->delete();

            // Add new
            $toAdd = array_diff($submittedExpertiseIds, $existingExpertiseIds);
            foreach ($toAdd as $sp) {
                DoctorExpertise::create([
                    'doctor_id' => $doc->id,
                    'expertise_id' => $sp,
                ]);
            }

            DB::commit();
            return redirect()->route('clinic.doctor.index')->with('success', 'Doctor updated successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('clinic.doctor.edit', $id)->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function uploadDocument(Request $request, $id)
    {
        try {
            $request->validate([
                'document' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120',
            ]);

            $doctor = Doctor::findOrFail(decrypt($id));

            if ($request->hasFile('document')) {
                $path = ImageController::upload($request->file('document'), '/clinics/doctors/documents');
                $doctor->documents()->create([
                    'img' => $path,
                    'title' => $request->title,
                ]);
            }

            return redirect()->back()->with('success', 'File uploaded successfully');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to upload document: ' . $e->getMessage());
        }
    }
}
