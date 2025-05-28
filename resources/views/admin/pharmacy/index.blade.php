@extends('admin.layouts.app')
@section('title', 'Tele Health Super Admin | Pharmacy')
@section('content')

    <div class="page-wrapper">
        <div class="content">

            <div class="rightSideWrapper">
                <div
                    class="d-md-flex pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                    <div class="my-0">
                        <h2 class="PageTitle">All Pharmacy</h2>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
                        <div class="ActionWrapper">
                            <a href="{{ route('superadmin.pharmacies.create') }}"
                                class="btn btn-primary d-flex align-items-center cmnaddbtn">
                                <iconify-icon icon="icons8:plus"></iconify-icon> Add New Pharmacy
                            </a>
                        </div>
                        <div class="head-icons ms-2 headicon_innerpage">
                            <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-original-title="Collapse" id="collapse-header">
                                <i class="ti ti-chevrons-up"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card tablemaincard_nopaddingleftright">
                    <div id="tablefiltesa_container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="leftprFilters">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="input-blocks InputFilter">
                                                <i data-feather="search" class="info-img"></i>
                                                <input type="text" class="form-control"
                                                    placeholder="Search by Pharmacy Name & Id">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <iconify-icon icon="hugeicons:clinic" class="info-img"></iconify-icon>

                                                <select class="select">
                                                    <option selected disabled>Select Clinic</option>
                                                    <option>HealthCare Clinic</option>
                                                    <option>Sunrise Medical Center</option>
                                                    <option>Prime Wellness Clinic</option>
                                                    <option>CityCare Health</option>
                                                    <option>Greenfield Medical Center</option>
                                                    <option>NorthStar Health</option>
                                                    <option>BlueSky Clinic</option>
                                                    <option>MountainView Medical</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <iconify-icon icon="ic:baseline-mode-standby"
                                                    class="info-img"></iconify-icon>
                                                <select class="select">
                                                    <option disabled selected>Select Status</option>
                                                    <option>Active</option>
                                                    <option>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-icon position-relative">
                                                <span class="input-icon-addon">
                                                    <iconify-icon icon="iconoir:calendar" width="15" height="15">
                                                    </iconify-icon>
                                                </span>
                                                <input type="text" class="form-control date-range bookingrange"
                                                    placeholder="dd/mm/yyyy - dd/mm/yyyy">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- /Filter -->
                    </div>
                    <div class="custom-datatable-filter">
                        <div class="TableMainWrap">
                            <table id="pharmacy_table" class="table nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Pharmacy ID</th>
                                        <th>Pharmacy Name</th>
                                        <th>Mobile No.</th>
                                        <th>Email</th>
                                        <th>License Number</th>
                                        <th>Location</th>
                                        <th>Clinic Name</th>
                                        <th>Added On</th>
                                        <th>Status</th>
                                        <th class="no-sort">Action</th>
                                    </tr>
                                </thead>
                               <tbody>

                               </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_scripts')
    @include('admin.layouts.includes.datatable-js')
    <script>
        $(document).ready(function() {
            const columns = [{
                    data: 'pharmacy_id',
                    name: 'pharmacy_id',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'phone',
                    name: 'phone',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'email',
                    name: 'email',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'license_no',
                    name: 'license_no',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'address1',
                    name: 'address1',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'clinic_id',
                    name: 'clinic_id',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ];

             initializeDataTable('#pharmacy_table',"{{ route('superadmin.pharmacy.ajaxDataTable') }}",columns,0,{},[[0, 'desc']]);
        });
    </script>
@endpush
