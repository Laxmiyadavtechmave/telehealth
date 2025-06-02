<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Doctor, Clinic, AreaOfExpertise};
use Carbon\Carbon;
use App\Http\Controllers\{CommonController, ImageController};

class DoctorController extends Controller
{
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

    public function doctorAjaxDatatable(Request $request)
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
        $totalRecords = Doctor::count();

        // Base query
        $query = Doctor::query();

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

            $data_arr[] = [
                'id' => $row->id ?? '',
                'doctor_id' => $row->doctor_id ?? '',
                'name' => $row->name ?? '',
                'phone' => $row->phone ?? '',
                'email' => $row->email ?? '',
                'specilization' => '',
                'experience' => '',
                'consultation_type' => 7,
                'clinic_name' => $row->clinic->name ?? '',
                'created_at' => !empty($row->created_at) ? date('d M, Y', strtotime($row->created_at)) : '',
                'status' => '<span class="badge ' . ($statusBg ?? '') . '" data-bs-toggle="tooltip" data-placement="top" data-bs-original-title="Clinic is currently ' . ($row->status ?? '') . '">' . ucfirst($row->status ?? '') . '</span>',
                'action' =>
                    '<div class="d-flex align-items-center ActionDropdown">
                                        <div class="d-flex">
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="View Clinic Detail" href="' .
                    route('superadmin.doctors.show', encrypt($row->id ?? '')) .
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
            return redirect()->route('clinic.dashboard')->with('error', 'Something went wrong');
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

                // Chat (no price/duration required)
                'consultation.chat' => 'nullable|array',
                'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            ]);

            //Step 2. save clinic
            $customId = $this->generateCustomUniqueId('doctors', 'doctor_id', 'DOC-', 6);
            $doc = new Doctor();
            $doc->doctor_id = $customId;
            $doc->name = $request->clinic_name ?? null;
            $doc->email = $request->email ?? null;
            $doc->license_no = $request->license_no ?? null;
            $doc->valid_from = $request->valid_from ?? null;
            $doc->valid_to = $request->valid_to ?? null;
            $doc->password = Hash::make($request->password ?? '');
            $doc->phone = $request->phone ?? null;
            $clinic->web_url = $request->web_url ?? null;
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
                $clinic->schedules()->create([
                    'day' => $day,
                    'start_time' => null,
                    'end_time' => null,
                    'is_available' => false,
                ]);
            }

            DB::commit();
            return redirect()->route('superadmin.doctor.index')->with('success', 'Doctor created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('clinic.doctor.create')->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('clinic.doctor.detail');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('clinic.doctor.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
