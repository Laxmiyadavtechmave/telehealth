<?php

namespace App\Http\Controllers\Clinic;
use Exception;
use Carbon\Carbon;
use App\Models\Nurse;
use Illuminate\Http\Request;
use App\Models\NurseExpertise;
use App\Models\AreaOfExpertise;
use App\Traits\GeneratesCustomId;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CommonController;

class NurseController extends Controller
{
        use GeneratesCustomId;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = Auth::guard('clinic')->user() ?? 1;
        // $clinicId = $user->clinic_id ?? $user->id;
        $nurses = Nurse::all();
        // where('clinic_id', $clinicId)

        return view('clinic.nurse.index',compact('nurses'));
        try {
            return view('clinic.nurse.index');
        } catch (Exception $e) {
            return redirect()->route('clinic.dashboard')->with('error', 'Something went wrong');
        }
    }


    // public function ajaxDatatable(Request $request)
    // {
    //     $draw = $request->get('draw');
    //     $start = $request->get('start');
    //     $rowperpage = $request->get('length');

    //     $columnIndex_arr = $request->get('order');
    //     $columnName_arr = $request->get('columns');
    //     $search_arr = $request->get('search');

    //     $columnIndex = $columnIndex_arr[0]['column'] ?? 0;
    //     $columnName = $columnName_arr[$columnIndex]['data'] ?? 'name';
    //     $columnSortOrder = $columnIndex_arr[0]['dir'] ?? 'asc';
    //     $searchValue = $search_arr['value'] ?? '';
    //     $status = $request->status;
    //     $daterange = $request->daterange;
    //     // Whitelist of sortable fields
    //     $sortableColumns = ['id', 'name', 'email', 'phone', 'license_no', 'address1', 'status', 'created_at'];
    //     if (!in_array($columnName, $sortableColumns)) {
    //         $columnName = 'id';
    //     }

    //     // Count total records
    //     $totalRecords = Nurse::count();

    //     // Base query
    //     $query = Nurse::query();

    //     // Apply search text
    //     if (!empty($searchValue)) {
    //         $query->search($searchValue);
    //     }

    //     // Apply status filter
    //     if (!empty($status)) {
    //         $query->where('status', $status);
    //     }

    //     // // Apply daterange filter
    //     if (!empty($daterange)) {
    //         try {
    //             [$startRange, $endRange] = explode(' - ', $daterange);

    //             $startDate = Carbon::createFromFormat('m/d/Y', trim($startRange))->format('Y-m-d');
    //             $endDate = Carbon::createFromFormat('m/d/Y', trim($endRange))->format('Y-m-d');

    //             $query->whereDate('created_at', '>=', $startDate)->whereDate('created_at', '<=', $endDate);
    //         } catch (\Exception $e) {
    //             \Log::error('Invalid date range: ' . $e->getMessage());
    //         }
    //     }

    //     // Count with filter
    //     $totalRecordswithFilter = $query->count();

    //     // Fetch data
    //     $records = $query->skip($start)->take($rowperpage)->orderBy($columnName, $columnSortOrder)->get();

    //     // Data formatting
    //     $data_arr = [];
    //     foreach ($records as $key => $row) {
    //         $statusBg = CommonController::statusBg($row->status ?? '');

    //         $address =
    //             '  <div class="LongMesage_container">
    //                                     <input class="refuge-collection-input tableLongMessage_Input" value="' .
    //             implode(', ', array_filter([$row->address1 ?? '', $row->address2 ?? '', $row->city ?? '', $row->country ?? '', $row->postal_code ?? ''])) .
    //             '" readonly>
    //                                     <button class="view-btn tablemessageview_btn" type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Click to view" data-bs-original-title="' .
    //             implode(', ', array_filter([$row->address1 ?? '', $row->address2 ?? '', $row->city ?? '', $row->country ?? '', $row->postal_code ?? ''])) .
    //             '">
    //                                         <iconify-icon icon="ion:eye-outline"></iconify-icon> Read More
    //                                     </button>
    //                                 </div>';

    //         // $image = asset('common/img/logoicon.png');
    //         // if ($row->img && Storage::disk('public')->exists($row->img)) {
    //         //     $image = env('IMAGE_ROOT') . $row->img;
    //         // }

    //         // $clinic =
    //         //     '<div class="productimgname">
    //         //                             <a href="' .
    //         //     ($image ?? '') .
    //         //     '" data-fancybox="gallery" class="product-img stock-img">
    //         //                                 <img src="' .
    //         //     ($image ?? '') .
    //         //     '" alt="product">
    //         //                             </a>
    //         //                             <a href="'.(route('superadmin.clinic.show',encrypt($row->id??''))).'">' .
    //         //     ($row->name ?? '') .
    //         //     '</a>
    //         //                         </div>';

    //         $data_arr[] = [
    //             'id' => $row->id ?? '',
    //             'clinic_id' => $row->clinic_id ?? '',
    //             'name' => $row->name ?? '',
    //             'phone' => $row->phone ?? '',
    //             'email' => $row->email ?? '',
    //             'license_no' => $row->license_no ?? '',
    //             'address1' => $address,
    //             'total_doctors' => 7,
    //             'created_at' => !empty($row->created_at) ? date('d M, Y', strtotime($row->created_at)) : '',
    //             'status' => '<span class="badge ' . ($statusBg ?? '') . '" data-bs-toggle="tooltip" data-placement="top" data-bs-original-title="Clinic is currently ' . ($row->status ?? '') . '">' . ucfirst($row->status ?? '') . '</span>',
    //             'action' =>
    //                 '<div class="d-flex align-items-center ActionDropdown">
    //                                     <div class="d-flex">
    //                                         <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Clinic Detail" href="' .
    //                 route('superadmin.clinic.edit', encrypt($row->id ?? '')) .
    //                 '">
    //                                             <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
    //                                         </a>
    //                                         <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="View Clinic Detail" href="' .
    //                 route('superadmin.clinic.show', encrypt($row->id ?? '')) .
    //                 '">
    //                                             <span class="icon"><span class="feather-icon"><iconify-icon icon="hugeicons:view"></iconify-icon></span></span>
    //                                         </a>
    //                                     </div>
    //                                 </div>',
    //         ];
    //     }

    //     // Response
    //     $response = [
    //         'draw' => intval($draw),
    //         'iTotalRecords' => $totalRecords,
    //         'iTotalDisplayRecords' => $totalRecordswithFilter,
    //         'aaData' => $data_arr,
    //     ];

    //     return response()->json($response);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        try {
            $areaExpertises = AreaOfExpertise::all();
            return view('clinic.nurse.create',compact('areaExpertises'));
        } catch (Exception $e) {
            return redirect()->route('clinic.dashboard')->with('error', 'Something went wrong');
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
            // Step 1: Validate
            $request->validate([
                'name' => 'required|string|max:255',
                'dob' => 'required|date',
                'email' => 'required|email|unique:nurses',
                'license_no' => 'required|string|unique:nurses|max:255',
                'valid_from' => 'required|date',
                'valid_to' => 'required|date|after:valid_from',
                'password' => 'required|string|min:6',
                'phone' => 'required|string',
                'address1' => 'required|string',
                'city' => 'required|string',
                'country' => 'required|string',
                'postal_code' => 'required|string',
                'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
                'gender' => 'required|in:Male,Female,Other',
                'marital_status' => 'required|in:Married,Unmarried,Single',
                'national_id' => 'required|string|max:255',
                'qualification' => 'required|string|max:255',
                // 'doctor_id' => 'required|exists:doctors,id',
                // 'role_id' => 'required|exists:roles,id',
                'year_of_experience' => 'required|integer|min:1',
                'language' => 'required|string|max:255',
                'area_expertise_id' => 'required|array',
                // 'area_expertise_id.*' => 'exists:area_of_expertises',
            ]);

            // Step 2: Save nurse
            $customId = $this->generateCustomUniqueId('nurses', 'nurse_id', 'NU-', 6);

            // $user = Auth::guard('clinic')->user() ?? 1;
            // $clinicId = $user->clinic_id ?? $user->id;

            $nurse = new Nurse();
            $nurse->clinic_id =  1;
            $nurse->nurse_id = $customId;
            $nurse->name = $request->name;
            $nurse->dob = $request->dob;
            $nurse->email = $request->email;
            $nurse->license_no = $request->license_no;
            $nurse->valid_from = $request->valid_from;
            $nurse->valid_to = $request->valid_to;
            $nurse->password = Hash::make($request->password);
            $nurse->phone = $request->phone;
            $nurse->address1 = $request->address1;
            $nurse->address2 = $request->address2;
            $nurse->city = $request->city;
            $nurse->country = $request->country;
            $nurse->postal_code = $request->postal_code;
            $nurse->gender = $request->gender;
            $nurse->marital_status = $request->marital_status;
            $nurse->national_id = $request->national_id;
            $nurse->qualification = $request->qualification;
            $nurse->doctor_id = $request->doctor_id;
            $nurse->role_id = $request->role_id;
            $nurse->year_of_experience = $request->year_of_experience;
            $nurse->language = $request->language;

            if ($request->hasFile('profile_pic')) {
                $nurse->img = ImageController::upload($request->file('profile_pic'), 'nurse');
            }

            $nurse->save();

            // Step 3: Save expertise (if any)
            if ($request->filled('area_expertise_id')) {
                foreach ($request->area_expertise_id as $expertiseId) {
                    NurseExpertise::create([
                        'nurse_id' => $nurse->id,
                        'area_of_expertise_id' => $expertiseId,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('superadmin.clinic.index')->with('success', 'Nurse created successfully!');


        } catch (\Exception $e) {
            DB::rollback();
            // dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

     // //Step 6. assign role and sync permissions
            // $role = Role::create(['name' => $clinic->clinic_id, 'guard_name' => 'clinic']);
            // $nurse->assignRole($role->name);
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        try {
            return view('clinic.nurse.detail');
        } catch (Exception $e) {
            return redirect()->route('clinic.dashboard')->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        try {
         return view('clinic.nurse.edit');
        } catch (Exception $e) {
            return redirect()->route('clinic.dashboard')->with('error', 'Something went wrong');
        }
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
