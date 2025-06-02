@extends('clinic.layouts.app')
@section('title', 'Tele Health Clinic Admin | Nurse')
@section('content')

    <div class="page-wrapper">
        <div class="content">

            <div class="rightSideWrapper">
                <div
                    class="d-md-flex pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                    <div class="my-0">
                        <h2 class="PageTitle">All Nurses</h2>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
                        <div class="ActionWrapper">
                            <a href="{{ route('clinic.nurse.create') }}"
                                class="btn btn-primary d-flex align-items-center cmnaddbtn">
                                <iconify-icon icon="icons8:plus"></iconify-icon> Add New Nurse
                            </a>
                            <!-- <a href="sales-return-new.php" class="btn btn-info d-flex align-items-center cmnaddbtn">
                         <iconify-icon icon="carbon:return"></iconify-icon> Sales Return
                        </a> -->
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
                                    {{-- <div class="row">
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks InputFilter">
                                                <i data-feather="search" class="info-img"></i>
                                                <input type="text" class="form-control"
                                                    placeholder="Search by Nurse Name & Id">
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

                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <iconify-icon icon="hugeicons:clinic" class="info-img"></iconify-icon>
                                                <!-- <iconify-icon icon="iconamoon:category-light" class="info-img"></iconify-icon> -->
                                                <select class="select">
                                                    <option selected disabled>Select Doctor</option>
                                                    <option>Dr. John Smith</option>
                                                    <option>Dr. Emily Johnson</option>
                                                    <option>Dr. Michael Brown</option>
                                                    <option>Dr. Sarah Davis</option>
                                                    <option>Dr. William Martinez</option>
                                                    <option>Dr. Linda Thompson</option>
                                                    <option>Dr. James Wilson</option>
                                                    <option>Dr. Olivia Taylor</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-sm-6 col-12">
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
                                    </div> --}}
                                    <form id="filterForm">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="input-blocks">
                                                    <iconify-icon icon="ic:baseline-mode-standby"
                                                        class="info-img"></iconify-icon>
                                                    <select class="select" id="status" name="status">
                                                        <option value="" disabled selected>Select Status</option>
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
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
                                                        placeholder="dd/mm/yyyy - dd/mm/yyyy" name="daterange"
                                                        id="daterange">
                                                </div>
                                            </div>
                                            <div class="col-lg-2 d-flex align-items-center gap-2">
                                                <button type="button" class="btn btn-primary btn-sm" id="validateSearchForm">Search</button>
                                                <a href="{{ route('superadmin.clinic.index') }}"
                                                    class="btn btn-default commonCancleButton">
                                                    <span>Reset</span>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--
                        <div class="col-lg-4">
                            <div class="rightPrFilters">
                                <div class="input-icon mb-2 position-relative">
                                    <span class="input-icon-addon">
                                    <iconify-icon icon="iconoir:calendar" width="15" height="15"></iconify-icon>
                                    </span>
                                    <input type="text" class="form-control date-range bookingrange"
                                        placeholder="dd/mm/yyyy - dd/mm/yyyy">
                                </div>

                            </div>
                        </div> -->

                        </div>
                        <!-- /Filter -->
                    </div>
                    <div class="custom-datatable-filter">
                        <div class="TableMainWrap">
                            <table class="table common-datatable nowrap w-100">
                                <thead>
                                    <tr>
                                        <th hidden>ID</th>
                                        <th>Nurse ID</th>
                                        <th>Nurse Name</th>
                                        <th>Mobile No.</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Experience</th>
                                        <th>Doctor Name</th>
                                        <th>Added On</th>
                                        <th>Status</th>
                                        <th class="no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nurses as $nurse )
                                        <tr>
                                        <td hidden></td>
                                        <td><a href="{{ route('clinic.nurse.show',['nurse' => encrypt($nurse->id)]) }}">#NUR001</a></td>
                                        <td>Mille William</td>
                                        <td>Female</td>
                                        <td>+1 555-123-4567</td>
                                        <td>mille.william@example.com</td>
                                        <td>5 Years</td>
                                        <td>DR. John Smith</td>
                                        <td>20 April, 2025</td>
                                        <td>
                                            <span class="badge bg-soft-success" data-bs-toggle="tooltip"
                                                data-placement="top" title="Nurse is currently active">Active</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center ActionDropdown">
                                                <div class="d-flex">
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                        data-bs-toggle="tooltip" title="Edit Nurse Detail"
                                                        href="{{ route('clinic.nurse.edit',['nurse' => encrypt($nurse->id)]) }}">
                                                        <span class="icon"><span class="feather-icon"><iconify-icon
                                                                    icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                    </a>
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                        data-bs-toggle="tooltip" title="View Nurse Detail"
                                                        href="{{ route('clinic.nurse.show',['nurse' => encrypt($nurse->id)]) }}">
                                                        <span class="icon"><span class="feather-icon"><iconify-icon
                                                                    icon="hugeicons:view"></iconify-icon></span></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

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
    {{-- @include('admin.layouts.includes.datatable-js')
    <script>
        $(document).ready(function() {
            const columns = [{
                    data: 'id',
                    name: 'id',
                    orderable: false,
                    searchable: false,
                    visible: false
                }, {
                    data: 'nurse_id',
                    name: 'nurse_id',
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
                    data: 'gender',
                    name: 'gender',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'experience',
                    name: 'experience',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'total_doctors',
                    name: 'total_doctors',
                    orderable: false,
                    searchable: false
                },

                {
                    data: 'doctor name',
                    name: 'doctor name',
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

            let table = initializeDataTable(
                '#clinic_table',
                '{{ route('clinic.nurse.ajaxDataTable') }}',
                columns,
                0,
                () => {
                    return {
                        status: $('#status').val(),
                        daterange: $('#daterange').val()
                    };
                },
                [
                    [0, 'desc']
                ]
            );

            $(document).on('click', '#validateSearchForm', function() {
                const status = document.getElementById('status').value;
                const daterange = document.getElementById('daterange').value;

                if (!status && !daterange) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'Error!',
                        text: 'Please select at least one filter to search.',
                    });
                    return false;
                }

                // Reload DataTable with new filter values
                table.ajax.reload();

                return false; // prevent form submission
            });
        });
    </script> --}}
@endpush
