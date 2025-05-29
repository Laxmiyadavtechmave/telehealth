@extends('admin.layouts.app')
@section('title', 'Tele Health Super Admin | Role')
@section('content')

    <div class="page-wrapper">
        <div class="content">

            <div class="rightSideWrapper">
                <div
                    class="d-md-flex pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                    <div class="my-0">
                        <h2 class="PageTitle">All Role & Permission</h2>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
                        <div class="ActionWrapper">
                            <a href="{{ route('superadmin.role.create') }}"
                                class="btn btn-primary d-flex align-items-center cmnaddbtn">
                                <iconify-icon icon="icons8:plus"></iconify-icon> Create Role & permission
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
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="input-blocks InputFilter">
                                                <i data-feather="search" class="info-img"></i>
                                                <input type="text" class="form-control"
                                                    placeholder="Search by Clinic Name & Id">
                                            </div>
                                        </div>

                                        <!-- <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="input-blocks InputFilter">
                                        <i data-feather="user" class="info-img"></i>
                                        <input type="text" class="form-control" placeholder="Name/Mobile no.">
                                    </div>
                                </div> -->
                                        <!-- <div class="col-lg-3 col-sm-6 col-12">
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
                            </div> -->
                                        <!-- <div class="col-lg-3 col-sm-6 col-12">
                                <div class="input-blocks">
                                <iconify-icon icon="circum:box-list" class="info-img"></iconify-icon>

                                    <select class="select">
                                        <option selected disabled>Select Specialization</option>
                                        <option>Cardiology</option>
                                        <option>Neurology</option>
                                        <option>Pediatrics</option>
                                        <option>Orthopedics</option>
                                        <option>Dermatology</option>
                                        <option>Urology</option>
                                        <option>Gynecology</option>
                                        <option>ENT</option>
                                        <option>General Medicine</option>
                                    </select>
                                </div>
                            </div>		 -->
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
                                        <th>#</th>
                                        <th>Role</th>
                                        <th>Created Date</th>
                                        {{-- <th>Created By</th> --}}
                                        <th>Modified Date</th>
                                        <th>Status</th>
                                        <th class="no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $role->name ?? 'N/A' }}</td>

                                            {{-- Created at --}}
                                            <td>{{ \Carbon\Carbon::parse($role->created_at)->format('d F, Y') }}</td>

                                            {{-- Created by --}}
                                            {{-- <td>{{ $role->created_by->name ?? 'System' }}</td> --}}

                                            {{-- Updated at --}}
                                            <td>{{ \Carbon\Carbon::parse($role->updated_at)->format('d F, Y') }}</td>

                                            {{-- Status dropdown --}}
                                            <td>
                                                <div class="dropdown status-dropdown d-inline-block">
                                                    @php
                                                        $status = $role->status ?? 'Active';
                                                        $statusClass =
                                                            $status === 'Active' ? 'bg-soft-success' : 'bg-soft-danger';
                                                    @endphp
                                                    <button class="badge {{ $statusClass }} dropdown-toggle border-0"
                                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        {{ $status }}
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item status-option"
                                                                data-status="Active">Active</a></li>
                                                        <li><a class="dropdown-item status-option"
                                                                data-status="Inactive">Inactive</a></li>
                                                    </ul>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center ActionDropdown">
                                                    <div class="d-flex">
                                                        <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                            href="{{ route('superadmin.role.edit', encrypt($role->id)) }}">
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

    <!---------------------------------------------
     Window Style Add System User Modal End Here
    ---------------------------------------------->
    <div class="WindowsStyleModal">
        <form action="#" id="supportTicketForm">
            <div class="modal fade" id="user_add" tabindex="-1" aria-labelledby="HelpPopupLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="HelpPopupLabel">
                                <div class="iconModal">
                                    <iconify-icon icon="uil:user"></iconify-icon>
                                </div>
                                Add User
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Mobile No.</label>
                                        <input type="text" class="form-control" placeholder="Enter Mobile No."
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" placeholder="Enter Email" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group position-relative">
                                        <label for="#">Password <span>*</span></label>
                                        <input type="password" class="form-control password-field"
                                            placeholder="Enter Password here..">
                                        <span class="toggle-password"
                                            style="position:absolute; top:38px; right:15px; cursor:pointer;">
                                            <iconify-icon icon="mdi:eye-off-outline"></iconify-icon>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="#">Select Role</label>
                                        <select class="select">
                                            <option selected disabled>Select Role</option>
                                            <option>Admin</option>
                                            <option>Manager</option>
                                            <option>Internal Staff</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Upload File & Document</label>
                                        <input name="file1" type="file" class="dropify" data-height="100" />
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btnClose" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btnSave">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!---------------------------------------------
     Window Style Add System User Modal End Here
    ---------------------------------------------->

    <!---------------------------------------------
     Window Style Edit System User Modal End Here
    ---------------------------------------------->
    <div class="WindowsStyleModal">
        <form action="#" id="supportTicketForm">
            <div class="modal fade" id="user_edit" tabindex="-1" aria-labelledby="HelpPopupLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="HelpPopupLabel">
                                <div class="iconModal">
                                    <iconify-icon icon="uil:user"></iconify-icon>
                                </div>
                                Edit User Detail
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" required
                                            value="Alice Johnson">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Mobile No.</label>
                                        <input type="text" class="form-control" placeholder="Enter Mobile No."
                                            required value="9876543210">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" placeholder="Enter Email" required
                                            value="alicej@email.com">
                                    </div>
                                </div>
                                <!-- <div class="col-lg-6">
                                    <div class="form-group position-relative">
                                        <label for="#">Password <span>*</span></label>
                                        <input type="password" class="form-control password-field" placeholder="Enter Password here..">
                                        <span class="toggle-password" style="position:absolute; top:38px; right:15px; cursor:pointer;">
                                            <iconify-icon icon="mdi:eye-off-outline"></iconify-icon>
                                        </span>
                                    </div>
                                </div> -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="#">Select Role</label>
                                        <select class="select">
                                            <option disabled>Select Role</option>
                                            <option selected>Assistant</option>
                                            <option>Admin</option>
                                            <option>Manager</option>
                                            <option>Internal Staff</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Upload File & Document</label>
                                        <input name="file1" type="file" class="dropify" data-height="100" />
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btnClose" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btnSave" data-bs-dismiss="modal">Save & Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!---------------------------------------------
     Window Style Edit System User Modal End Here
    ---------------------------------------------->
@endsection

@push('custom_scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--------------------------
    Status Dropdown Js Start here
    ----------------------------->

    <script>
        $(document).on('click', '.status-option', function() {
            var $this = $(this);
            var selectedStatus = $this.data('status');
            var $dropdown = $this.closest('.status-dropdown');
            var $btn = $dropdown.find('button');

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to change the status to ' + selectedStatus + '?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, change it!',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Update button text
                    $btn.text(selectedStatus);

                    // Toggle colors
                    if (selectedStatus === 'Active') {
                        $btn.removeClass('bg-soft-danger').addClass('bg-soft-success');

                        // Success alert
                        Swal.fire({
                            icon: 'success',
                            title: 'Status Changed',
                            text: 'Doctor is now Active.',
                            timer: 2000,
                            showConfirmButton: false
                        });

                    } else {
                        $btn.removeClass('bg-soft-success').addClass('bg-soft-danger');

                        // Warning alert
                        Swal.fire({
                            icon: 'warning',
                            title: 'Status Changed',
                            text: 'Doctor is now Inactive.',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                }
            });
        });
    </script>

    <!--------------------------
    Status Dropdown Js End here
    ----------------------------->
    <!-----------------------------------
    Password Hide and show js start here
    ------------------------------------->
    <script>
        $(document).on('click', '.toggle-password', function() {
            const input = $(this).siblings('.password-field');
            const type = input.attr('type') === 'password' ? 'text' : 'password';
            input.attr('type', type);

            const icon = type === 'password' ? 'mdi:eye-off-outline' : 'mdi:eye-outline';
            $(this).html(`<iconify-icon icon="${icon}"></iconify-icon>`);
        });
    </script>
    <!-----------------------------------
    Password Hide and show js End here
    ------------------------------------->
@endpush
