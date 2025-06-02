@extends('clinic.layouts.app')
@section('title', 'Tele Health Clinic Admin | Doctors')
@section('content')

    <div class="page-wrapper">
        <div class="content">

            <div class="rightSideWrapper">
                <div
                    class="d-md-flex pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                    <div class="my-0">
                        <h2 class="PageTitle">All Doctors</h2>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
                        <div class="ActionWrapper">
                            <a href="{{ route('clinic.doctor.create') }}"
                                class="btn btn-primary d-flex align-items-center cmnaddbtn">
                                <iconify-icon icon="icons8:plus"></iconify-icon> Add New Doctor
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
                                <form id="filterForm">
                                    <div class="leftprFilters">
                                        <div class="row">

                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="input-blocks">
                                                    <iconify-icon icon="hugeicons:clinic" class="info-img"></iconify-icon>
                                                    <select class="select" name="clinic_id" id="clinic_id">
                                                        <option value="" selected disabled>Select Clinic</option>
                                                        @isset($clinics)
                                                            @foreach ($clinics as $row)
                                                                <option value="{{ $row->id }}">{{ $row->name ?? '' }}
                                                                </option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="input-blocks">
                                                    <iconify-icon icon="circum:box-list" class="info-img"></iconify-icon>

                                                    <select class="select" id="specilization" name="specilization">
                                                        <option value="" selected disabled>Select Specialization
                                                        </option>
                                                        @isset($specilization)
                                                            @foreach ($specilization as $row)
                                                                <option value="{{ $row->id ?? '' }}">{{ $row->name ?? '' }}
                                                                </option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-6 col-12">
                                                <div class="input-blocks">
                                                    <iconify-icon icon="ic:baseline-mode-standby"
                                                        class="info-img"></iconify-icon>
                                                    <select class="select" name="status" id="status">
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
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    id="validateSearchForm">Search</button>
                                                <a href="{{ route('clinic.doctor.index') }}"
                                                    class="btn btn-default commonCancleButton">
                                                    <span>Reset</span>
                                                </a>
                                            </div>


                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="custom-datatable-filter">
                        <div class="TableMainWrap">
                            <table id="doctors_table" class="table nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Doctor ID</th>
                                        <th>Doctor Name</th>
                                        <th>Mobile No.</th>
                                        <th>Email</th>
                                        <th>Specialization</th>
                                        <th>Experience</th>
                                        <th>Consultation Type</th>
                                        <th>Clinic Name</th>
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
                    data: 'id',
                    name: 'id',
                    orderable: false,
                    searchable: false,
                    visible: false
                }, {
                    data: 'doctor_id',
                    name: 'doctor_id',
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
                    data: 'specilization',
                    name: 'specilization',
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
                    data: 'consultation_type',
                    name: 'consultation_type',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'clinic_name',
                    name: 'clinic_name',
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
                '#doctors_table',
                '{{ route('superadmin.doctors.ajaxDataTable') }}',
                columns,
                0,
                () => {
                    return {
                        status: $('#status').val(),
                        clinic_id: $('#clinic_id').val(),
                        specilization: $('#specilization').val(),
                        daterange: $('#daterange').val()
                    };
                },
                [
                    [0, 'desc']
                ]
            );

            $(document).on('click', '#validateSearchForm', function() {
                const status = document.getElementById('status').value;
                const clinic_id = document.getElementById('clinic_id').value;
                const specilization = document.getElementById('specilization').value;
                const daterange = document.getElementById('daterange').value;


                if (!status && !clinic_id && !specilization && !daterange) {
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
    </script>
@endpush
