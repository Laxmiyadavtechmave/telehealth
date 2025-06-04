<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Doctor,Clinic,AreaOfExpertise};
use App\Http\Controllers\{CommonController, ImageController};

class HomeController extends Controller
{
    public function dashboard()
    {
        $clinicCount = Clinic::where('status','active')->count();
        $patientCount = Patient::where('status','active')->count();
        $doctorCount = Doctor::where('status','active')->count();
        $nurseCount = Nurse::where('status','active')->count();
        $pharmacyCount = Pharmacy::where('status','active')->count();

        return view('admin.dashboard' ,compact('clinicCount','patientCount','doctorCount','nurseCount','pharmacyCount'));
    }

    public function patients()
    {
        return view('admin.patients');
    }

    public function doctors()
    {
        $clinics = Clinic::where('status','active')->get();
        $specilization = AreaOfExpertise::where('type','doctor')->get();
        return view('admin.doctors.index',compact('specilization','clinics'));
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
                'clinic_name'=>$row->clinic->name??'',
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

    public function doctorDetail()
    {
        return view('admin.doctors.detail');
    }

    public function nurses()
    {
        return view('admin.nurses.index');
    }

    public function nursesDetail()
    {
        return view('admin.nurses.detail');
    }
}
