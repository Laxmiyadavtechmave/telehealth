@extends('clinic.layouts.app')
@section('title', 'Tele Health Clinic Admin | Pharmacy')
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
                        <a href="{{ route('clinic.pharmacy.create') }}" class="btn btn-primary d-flex align-items-center cmnaddbtn">
                        <iconify-icon icon="icons8:plus"></iconify-icon> Add New Pharmacy
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
                                    <div class="col-lg-2 col-sm-6 col-12">
                                        <div class="input-blocks InputFilter">
                                            <i data-feather="search" class="info-img"></i>
                                            <input type="text" class="form-control"
                                                placeholder="Search by Pharmacy Name & Id">
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
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="input-blocks">
                            <iconify-icon icon="ic:baseline-mode-standby" class="info-img"></iconify-icon>
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
                                    <th>Pharmacy ID</th>
                                    <th>Pharmacy Name</th>
                                    <th>Mobile No.</th>
                                    <th>Email</th>
                                    <th>Registration Number</th>
                                    <th>Location</th>
                                    <!-- <th>Clinic Name</th> -->
                                    <th>Added On</th>
                                    <th>Status</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="pharmacy-detail.php">#PHRI001</a></td>
                                <td>
                                    <div class="productimgname">
                                        <a href="assets/img/newimages/logoicon.png" data-fancybox="gallery" class="product-img stock-img">
                                            <img src="assets/img/newimages/logoicon.png" alt="product">
                                        </a>
                                        <a href="javascript:void(0);">Tele Health Pharmacy</a>
                                    </div>
                                </td>
                                <td>9865326544</td>
                                <td>telehealth@gmail.com</td>
                                <td>DEA-547829361</td>
                                <td>
                                    <div class="LongMesage_container">
                                        <input class="refuge-collection-input tableLongMessage_Input" value="No 14, 15th Cross, Old Trafford, UK" readonly>
                                        <button class="view-btn tablemessageview_btn" type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Click to view" data-bs-original-title="No 14, 15th Cross, Old Trafford, UK">
                                            <iconify-icon icon="ion:eye-outline"></iconify-icon> Read More
                                        </button>
                                    </div>
                                </td>
                                <!-- <td>Tele Health Clinic</td> -->
                                <td>20 April, 2025</td>
                                <td>
                                    <span class="badge bg-soft-success" data-bs-toggle="tooltip" data-placement="top" title="Pharmacy is currently active">Active</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center ActionDropdown">
                                        <div class="d-flex">
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Pharmacy Detail" href="pharmacy-edit.php">
                                                <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                            </a>
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="View Pharmacy Detail" href="pharmacy-detail.php">
                                                <span class="icon"><span class="feather-icon"><iconify-icon icon="hugeicons:view"></iconify-icon></span></span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="pharmacy-detail.php">#PHRI002</a></td>
                                <td>
                                    <div class="productimgname">
                                        <a href="assets/img/newimages/logoicon.png" data-fancybox="gallery" class="product-img stock-img">
                                            <img src="assets/img/newimages/logoicon.png" alt="product">
                                        </a>
                                        <a href="javascript:void(0);">Wellness Pharmacy</a>
                                    </div>
                                </td>
                                <td>9876543210</td>
                                <td>wellness@pharmacy.com</td>
                                <td>DEA-983472641</td>
                                <td>
                                    <div class="LongMesage_container">
                                        <input class="refuge-collection-input tableLongMessage_Input" value="22 Baker Street, London, UK" readonly>
                                        <button class="view-btn tablemessageview_btn" type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Click to view" data-bs-original-title="22 Baker Street, London, UK">
                                            <iconify-icon icon="ion:eye-outline"></iconify-icon> Read More
                                        </button>
                                    </div>
                                </td>
                                <!-- <td>Wellness Center</td> -->
                                <td>21 April, 2025</td>
                                <td>
                                    <span class="badge bg-soft-danger" data-bs-toggle="tooltip" data-placement="top" title="Pharmacy is currently inactive">Inactive</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center ActionDropdown">
                                        <div class="d-flex">
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Pharmacy Detail" href="pharmacy-edit.php">
                                                <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                            </a>
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="View Pharmacy Detail" href="pharmacy-detail.php">
                                                <span class="icon"><span class="feather-icon"><iconify-icon icon="hugeicons:view"></iconify-icon></span></span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="pharmacy-detail.php">#PHRI003</a></td>
                                <td>
                                    <div class="productimgname">
                                        <a href="assets/img/newimages/logoicon.png" data-fancybox="gallery" class="product-img stock-img">
                                            <img src="assets/img/newimages/logoicon.png" alt="product">
                                        </a>
                                        <a href="javascript:void(0);">Care Plus Pharmacy</a>
                                    </div>
                                </td>
                                <td>9988776655</td>
                                <td>careplus@med.com</td>
                                <td>DEA-274839104</td>
                                <td>
                                    <div class="LongMesage_container">
                                        <input class="refuge-collection-input tableLongMessage_Input" value="105 Elm Street, Manchester, UK" readonly>
                                        <button class="view-btn tablemessageview_btn" type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Click to view" data-bs-original-title="105 Elm Street, Manchester, UK">
                                            <iconify-icon icon="ion:eye-outline"></iconify-icon> Read More
                                        </button>
                                    </div>
                                </td>
                                <!-- <td>Care Plus Clinic</td> -->
                                <td>22 April, 2025</td>
                                <td>
                                    <span class="badge bg-soft-success" data-bs-toggle="tooltip" data-placement="top" title="Pharmacy is currently active">Active</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center ActionDropdown">
                                        <div class="d-flex">
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Pharmacy Detail" href="pharmacy-edit.php">
                                                <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                            </a>
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="View Pharmacy Detail" href="pharmacy-detail.php">
                                                <span class="icon"><span class="feather-icon"><iconify-icon icon="hugeicons:view"></iconify-icon></span></span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="pharmacy-detail.php">#PHRI004</a></td>
                                <td>
                                    <div class="productimgname">
                                        <a href="assets/img/newimages/logoicon.png" data-fancybox="gallery" class="product-img stock-img">
                                            <img src="assets/img/newimages/logoicon.png" alt="product">
                                        </a>
                                        <a href="javascript:void(0);">MediLife Pharmacy</a>
                                    </div>
                                </td>
                                <td>9445566778</td>
                                <td>info@medilife.co.uk</td>
                                <td>DEA-847362919</td>
                                <td>
                                    <div class="LongMesage_container">
                                        <input class="refuge-collection-input tableLongMessage_Input" value="76 Kings Road, Birmingham, UK" readonly>
                                        <button class="view-btn tablemessageview_btn" type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Click to view" data-bs-original-title="76 Kings Road, Birmingham, UK">
                                            <iconify-icon icon="ion:eye-outline"></iconify-icon> Read More
                                        </button>
                                    </div>
                                </td>
                                <!-- <td>MediLife Center</td> -->
                                <td>23 April, 2025</td>
                                <td>
                                    <span class="badge bg-soft-danger" data-bs-toggle="tooltip" data-placement="top" title="Pharmacy is currently inactive">Inactive</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center ActionDropdown">
                                        <div class="d-flex">
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Pharmacy Detail" href="pharmacy-edit.php">
                                                <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                            </a>
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="View Pharmacy Detail" href="pharmacy-detail.php">
                                                <span class="icon"><span class="feather-icon"><iconify-icon icon="hugeicons:view"></iconify-icon></span></span>
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
