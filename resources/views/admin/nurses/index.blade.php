@extends('admin.layouts.app')
@section('title', 'Tele Health Super Admin | Nurses')
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


                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Filter -->
                    </div>
                    <div class="custom-datatable-filter">
                        <div class="TableMainWrap">
                            <table class="table common-datatable nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Nurse ID</th>
                                        <th>Nurse Name</th>
                                        <th>Gender</th>
                                        <th>Mobile No.</th>
                                        <th>Email</th>
                                        <th>Experience</th>
                                        <th>Doctor Name</th>
                                        <th>Clinic Name</th>
                                        <th>Added On</th>
                                        <th>Status</th>
                                        <th class="no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="{{ route('superadmin.nurses.detail') }}">#NUR001</a>
                                        </td>
                                        <td>Mille William</td>
                                        <td>Female</td>
                                        <td>+1 555-123-4567</td>
                                        <td>mille.william@example.com</td>
                                        <td>5 Years</td>
                                        <td>DR. John Smith</td>
                                        <td>Care Plus Pharmacy</td>
                                        <td>20 April, 2025</td>
                                        <td>
                                            <span class="badge bg-soft-success" data-bs-toggle="tooltip"
                                                data-placement="top" title="Nurse is currently active">Active</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center ActionDropdown">
                                                <div class="d-flex">
                                                    <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Nurse Detail" href="nurse-edit.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a> -->
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                        data-bs-toggle="tooltip" title="View Nurse Detail"
                                                        href="{{ route('superadmin.nurses.detail') }}">
                                                        <span class="icon"><span class="feather-icon"><iconify-icon
                                                                    icon="hugeicons:view"></iconify-icon></span></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><a href="nurse-detail.php">#NUR002</a></td>
                                        <td>Linda Scott</td>
                                        <td>Female</td>
                                        <td>+1 555-234-5678</td>
                                        <td>linda.scott@example.com</td>
                                        <td>3 Years</td>
                                        <td>DR. Emily Rose</td>
                                        <td>MediLife Pharmacy</td>
                                        <td>18 April, 2025</td>
                                        <td>
                                            <span class="badge bg-soft-danger" data-bs-toggle="tooltip"
                                                data-placement="top" title="Nurse is currently inactive">Inactive</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center ActionDropdown">
                                                <div class="d-flex">
                                                    <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Nurse Detail" href="nurse-edit.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a> -->
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                        data-bs-toggle="tooltip" title="View Nurse Detail"
                                                        href="nurse-detail.php">
                                                        <span class="icon"><span class="feather-icon"><iconify-icon
                                                                    icon="hugeicons:view"></iconify-icon></span></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><a href="nurse-detail.php">#NUR003</a></td>
                                        <td>Jason Lee</td>
                                        <td>Male</td>
                                        <td>+1 555-345-6789</td>
                                        <td>jason.lee@example.com</td>
                                        <td>7 Years</td>
                                        <td>DR. Alan Grant</td>
                                        <td>Tele Health Pharmacy</td>
                                        <td>22 April, 2025</td>
                                        <td>
                                            <span class="badge bg-soft-success" data-bs-toggle="tooltip"
                                                data-placement="top" title="Nurse is currently active">Active</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center ActionDropdown">
                                                <div class="d-flex">
                                                    <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Nurse Detail" href="nurse-edit.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a> -->
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                        data-bs-toggle="tooltip" title="View Nurse Detail"
                                                        href="nurse-detail.php">
                                                        <span class="icon"><span class="feather-icon"><iconify-icon
                                                                    icon="hugeicons:view"></iconify-icon></span></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><a href="nurse-detail.php">#NUR004</a></td>
                                        <td>Sara Kim</td>
                                        <td>Female</td>
                                        <td>+1 555-456-7890</td>
                                        <td>sara.kim@example.com</td>
                                        <td>2 Years</td>
                                        <td>DR. Olivia Moore</td>
                                        <td>Wellness Pharmacy</td>
                                        <td>15 April, 2025</td>
                                        <td>
                                            <span class="badge bg-soft-danger" data-bs-toggle="tooltip"
                                                data-placement="top" title="Nurse is currently inactive">Inactive</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center ActionDropdown">
                                                <div class="d-flex">
                                                    <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Nurse Detail" href="nurse-edit.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a> -->
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                        data-bs-toggle="tooltip" title="View Nurse Detail"
                                                        href="nurse-detail.php">
                                                        <span class="icon"><span class="feather-icon"><iconify-icon
                                                                    icon="hugeicons:view"></iconify-icon></span></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><a href="nurse-detail.php">#NUR005</a></td>
                                        <td>David Miller</td>
                                        <td>Male</td>
                                        <td>+1 555-567-8901</td>
                                        <td>david.miller@example.com</td>
                                        <td>6 Years</td>
                                        <td>DR. Rachel Green</td>
                                        <td>Wellness Pharmacy</td>
                                        <td>11 April, 2025</td>
                                        <td>
                                            <span class="badge bg-soft-success" data-bs-toggle="tooltip"
                                                data-placement="top" title="Nurse is currently active">Active</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center ActionDropdown">
                                                <div class="d-flex">
                                                    <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Nurse Detail" href="nurse-edit.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a> -->
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                        data-bs-toggle="tooltip" title="View Nurse Detail"
                                                        href="nurse-detail.php">
                                                        <span class="icon"><span class="feather-icon"><iconify-icon
                                                                    icon="hugeicons:view"></iconify-icon></span></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><a href="nurse-detail.php">#NUR006</a></td>
                                        <td>Nina Patel</td>
                                        <td>Female</td>
                                        <td>+1 555-678-9012</td>
                                        <td>nina.patel@example.com</td>
                                        <td>4 Years</td>
                                        <td>DR. Derek Shepherd</td>
                                        <td>Wellness Pharmacy</td>
                                        <td>28 April, 2025</td>
                                        <td>
                                            <span class="badge bg-soft-danger" data-bs-toggle="tooltip"
                                                data-placement="top" title="Nurse is currently inactive">Inactive</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center ActionDropdown">
                                                <div class="d-flex">
                                                    <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Nurse Detail" href="nurse-edit.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a> -->
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                        data-bs-toggle="tooltip" title="View Nurse Detail"
                                                        href="nurse-detail.php">
                                                        <span class="icon"><span class="feather-icon"><iconify-icon
                                                                    icon="hugeicons:view"></iconify-icon></span></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><a href="nurse-detail.php">#NUR007</a></td>
                                        <td>Steve Rogers</td>
                                        <td>Male</td>
                                        <td>+1 555-789-0123</td>
                                        <td>steve.rogers@example.com</td>
                                        <td>8 Years</td>
                                        <td>DR. Bruce Banner</td>
                                        <td>Wellness Pharmacy</td>
                                        <td>19 April, 2025</td>
                                        <td>
                                            <span class="badge bg-soft-success" data-bs-toggle="tooltip"
                                                data-placement="top" title="Nurse is currently active">Active</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center ActionDropdown">
                                                <div class="d-flex">
                                                    <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Nurse Detail" href="nurse-edit.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a> -->
                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                        data-bs-toggle="tooltip" title="View Nurse Detail"
                                                        href="nurse-detail.php">
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
