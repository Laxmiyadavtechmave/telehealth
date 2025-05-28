<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clinic;
use App\Http\Controllers\{CommonController,ImageController};
use DB;
use Hash;

class ClinicController extends Controller
{
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
        // dd($request->all());
    //    DB::beginTransaction();
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
       
        try {
            $clinic = new Clinic();
            $clinic->clinic_id = '4324';
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
            
            if ($request->hasFile('profile_pic')) {
                $clinic->img = ImageController::upload($request->file('profile_pic'), '/img');
            }

            $clinic->extra = json_encode($request->extra);
            $clinic->save();

            // DB::commit();
             return redirect()->route('superadmin.clinic.index')->with('success', 'Clinic created successfully!');
        } catch (\Exception $e) {
            dd($e);
            // DB::rollback();
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
    public function edit(string $id)
    {
        //
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
