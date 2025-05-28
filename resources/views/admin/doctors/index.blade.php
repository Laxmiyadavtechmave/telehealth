@extends('admin.layouts.app')
@section('title', 'Tele Health Super Admin | Doctors')
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
                            <!-- <a href="doctor-add.php" class="btn btn-primary d-flex align-items-center cmnaddbtn">
                            <iconify-icon icon="icons8:plus"></iconify-icon> Add New Doctor
                            </a> -->
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
                                                    placeholder="Search by Doctor Name & Id">
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-icon position-relative">
                                                <span class="input-icon-addon">
                                                    <iconify-icon icon="iconoir:calendar" width="15" height="15">
                                                    </iconify-icon>
                                                </span>
                                                <input type="text" class="form-control date-range bookingrange"
                                                    placeholder="dd/mm/yyyy - dd/mm/yyyy">
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="input-blocks InputFilter">
                                        <i data-feather="user" class="info-img"></i>
                                        <input type="text" class="form-control" placeholder="Name/Mobile no.">
                                    </div>
                                </div> -->
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <iconify-icon icon="hugeicons:clinic" class="info-img"></iconify-icon>
                                                <!-- <iconify-icon icon="iconamoon:category-light" class="info-img"></iconify-icon> -->
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
                                    <tr>
                                        <td><a href="{{route('superadmin.doctors.detail')}}">#DOC001</a></td>
                                        <td>DR. John Smith</td>
                                        <td>+1 555-123-4567</td>
                                        <td>john.smith@example.com</td>
                                        <td>Cardiology</td>
                                        <td>5 Years</td>
                                        <td><span class="consultaionType">Audio</span><span
                                                class="consultaionType">Video</span><span
                                                class="consultaionType">Chat</span><span
                                                class="consultaionType">Physical</span></td>
                                        <td>Pro Health Clinic</td>
                                        <td>
                                            <div class="dropdown status-dropdown d-inline-block">
                                                <button class="badge bg-soft-success dropdown-toggle border-0"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Active
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
                                                    <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Doctor Detail" href="doctor-edit.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a> -->
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                        data-bs-toggle="tooltip" title="View Doctor Detail"
                                                        href="{{route('superadmin.doctors.detail')}}">
                                                        <span class="icon"><span class="feather-icon"><iconify-icon
                                                                    icon="hugeicons:view"></iconify-icon></span></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><a href="{{route('superadmin.doctors.detail')}}">#DOC002</a></td>
                                        <td>DR. Emily Brown</td>
                                        <td>+1 555-234-5678</td>
                                        <td>emily.brown@example.com</td>
                                        <td>Pediatrics</td>
                                        <td>3 Years</td>
                                        <td><span class="consultaionType">Audio</span><span
                                                class="consultaionType">Video</span></td>
                                        <td>Sunrise Medical Center</td>
                                        <td>
                                            <div class="dropdown status-dropdown d-inline-block">
                                                <button class="badge bg-soft-success dropdown-toggle border-0"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Active
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
                                                    <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Doctor Detail" href="doctor-edit.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a> -->
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                        data-bs-toggle="tooltip" title="View Doctor Detail"
                                                        href="{{route('superadmin.doctors.detail')}}">
                                                        <span class="icon"><span class="feather-icon"><iconify-icon
                                                                    icon="hugeicons:view"></iconify-icon></span></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><a href="{{route('superadmin.doctors.detail')}}">#DOC003</a></td>
                                        <td>DR. Michael Lee</td>
                                        <td>+1 555-345-6789</td>
                                        <td>michael.lee@example.com</td>
                                        <td>Orthopedics</td>
                                        <td>8 Years</td>
                                        <td><span class="consultaionType">Video</span><span
                                                class="consultaionType">Chat</span></td>
                                        <td>Prime Wellness Clinic</td>
                                        <td>
                                            <div class="dropdown status-dropdown d-inline-block">
                                                <button class="badge bg-soft-danger dropdown-toggle border-0"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Inactive
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
                                                    <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Doctor Detail" href="doctor-edit.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a> -->
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                        data-bs-toggle="tooltip" title="View Doctor Detail"
                                                        href="{{route('superadmin.doctors.detail')}}">
                                                        <span class="icon"><span class="feather-icon"><iconify-icon
                                                                    icon="hugeicons:view"></iconify-icon></span></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><a href="{{route('superadmin.doctors.detail')}}">#DOC004</a></td>
                                        <td>DR. Sarah Miller</td>
                                        <td>+1 555-456-7890</td>
                                        <td>sarah.miller@example.com</td>
                                        <td>Dermatology</td>
                                        <td>6 Years</td>
                                        <td><span class="consultaionType">Audio</span><span
                                                class="consultaionType">Chat</span></td>
                                        <td>CityCare Health</td>
                                        <td>
                                            <div class="dropdown status-dropdown d-inline-block">
                                                <button class="badge bg-soft-danger dropdown-toggle border-0"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Inactive
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
                                                    <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Doctor Detail" href="doctor-edit.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a> -->
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                        data-bs-toggle="tooltip" title="View Doctor Detail"
                                                        href="{{route('superadmin.doctors.detail')}}">
                                                        <span class="icon"><span class="feather-icon"><iconify-icon
                                                                    icon="hugeicons:view"></iconify-icon></span></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><a href="{{route('superadmin.doctors.detail')}}">#DOC005</a></td>
                                        <td>DR. Olivia Brooks</td>
                                        <td>+1 555-567-8901</td>
                                        <td>olivia.brooks@example.com</td>
                                        <td>Gynecology</td>
                                        <td>4 Years</td>
                                        <td><span class="consultaionType">Audio</span><span
                                                class="consultaionType">Video</span></td>
                                        <td>Greenfield Medical Center</td>
                                        <td>
                                            <div class="dropdown status-dropdown d-inline-block">
                                                <button class="badge bg-soft-success dropdown-toggle border-0"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Active
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
                                                    <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Doctor Detail" href="doctor-edit.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a> -->
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                        data-bs-toggle="tooltip" title="View Doctor Detail"
                                                        href="{{route('superadmin.doctors.detail')}}">
                                                        <span class="icon"><span class="feather-icon"><iconify-icon
                                                                    icon="hugeicons:view"></iconify-icon></span></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><a href="{{route('superadmin.doctors.detail')}}">#DOC006</a></td>
                                        <td>DR. Ethan Hall</td>
                                        <td>+1 555-678-9012</td>
                                        <td>ethan.hall@example.com</td>
                                        <td>Neurology</td>
                                        <td>7 Years</td>
                                        <td><span class="consultaionType">Video</span><span
                                                class="consultaionType">Chat</span></td>
                                        <td>NorthStar Health</td>
                                        <td>
                                            <div class="dropdown status-dropdown d-inline-block">
                                                <button class="badge bg-soft-success dropdown-toggle border-0"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Active
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
                                                    <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Doctor Detail" href="doctor-edit.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a> -->
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                        data-bs-toggle="tooltip" title="View Doctor Detail"
                                                        href="{{route('superadmin.doctors.detail')}}">
                                                        <span class="icon"><span class="feather-icon"><iconify-icon
                                                                    icon="hugeicons:view"></iconify-icon></span></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><a href="{{route('superadmin.doctors.detail')}}">#DOC007</a></td>
                                        <td>DR. Nathan Scott</td>
                                        <td>+1 555-789-0123</td>
                                        <td>nathan.scott@example.com</td>
                                        <td>Psychiatry</td>
                                        <td>9 Years</td>
                                        <td><span class="consultaionType">Audio</span><span
                                                class="consultaionType">Video</span></td>
                                        <td>BlueSky Clinic</td>
                                        <td>
                                            <div class="dropdown status-dropdown d-inline-block">
                                                <button class="badge bg-soft-success dropdown-toggle border-0"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Active
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
                                                    <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Doctor Detail" href="doctor-edit.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a> -->
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                        data-bs-toggle="tooltip" title="View Doctor Detail"
                                                        href="{{route('superadmin.doctors.detail')}}">
                                                        <span class="icon"><span class="feather-icon"><iconify-icon
                                                                    icon="hugeicons:view"></iconify-icon></span></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><a href="{{route('superadmin.doctors.detail')}}">#DOC008</a></td>
                                        <td>DR. Hannah Cooper</td>
                                        <td>+1 555-890-1234</td>
                                        <td>hannah.cooper@example.com</td>
                                        <td>Radiology</td>
                                        <td>2 Years</td>
                                        <td><span class="consultaionType">Audio</span><span
                                                class="consultaionType">Video</span><span
                                                class="consultaionType">Chat</span></td>
                                        <td>MountainView Medical</td>
                                        <td>
                                            <div class="dropdown status-dropdown d-inline-block">
                                                <button class="badge bg-soft-success dropdown-toggle border-0"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Active
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
                                                    <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Doctor Detail" href="doctor-edit.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a> -->
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                        data-bs-toggle="tooltip" title="View Doctor Detail"
                                                        href="{{route('superadmin.doctors.detail')}}">
                                                        <span class="icon"><span class="feather-icon"><iconify-icon
                                                                    icon="hugeicons:view"></iconify-icon></span></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>




                                    <!-- Add more Doctor rows as needed -->
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>


        </div>
    </div>
@endsection
