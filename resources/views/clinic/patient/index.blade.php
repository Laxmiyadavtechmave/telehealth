@extends('clinic.layouts.app')
@section('title', 'Tele Health Clinic Admin | Patient')
@section('content')

<div class="page-wrapper">
    <div class="content">

        <div class="rightSideWrapper">
            <div
                class="d-md-flex pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                <div class="my-0">
                    <h2 class="PageTitle">All Patients</h2>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
                    <div class="ActionWrapper">
                        <a href="patients-add.php" class="btn btn-primary d-flex align-items-center cmnaddbtn">
                        <iconify-icon icon="icons8:plus"></iconify-icon> Add New Patient
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
                                                placeholder="Search by Customer Name & Id">
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
                                    <div class="col-lg-2 col-sm-6 col-12">
                            <div class="input-blocks">
                            <iconify-icon icon="healthicons:doctor-male-outline" class="info-img"></iconify-icon>
                            <!-- <iconify-icon icon="iconamoon:category-light" class="info-img"></iconify-icon> -->
                                <select class="select">
                                    <option selected disabled>Select Doctor</option>
                                    <option>Dr. Emily Brown</option>
                                    <option>Dr. Michael Lee</option>
                                    <option>Dr. Sarah Miller</option>
                                    <option>Dr. Olivia Brooks</option>
                                    <option>Dr. Ethan Hall</option>
                                    <option>Dr. Nathan Scott</option>
                                    <option>Dr. Hannah Cooper</option>
                                    <option>Dr. William King</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="input-blocks">
                            <iconify-icon icon="circum:box-list" class="info-img"></iconify-icon>

                                <select class="select">
                                    <option selected disabled>Select Department</option>
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
                                    <th>Patient ID</th>
                                    <th>Patient Name</th>
                                    <th>Mobile No.</th>
                                    <th>Email</th>
                                    <th>Assign Doctor</th>
                                    <th>Department</th>
                                    <th>Status</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="patient-detail.php">#PAT001</a></td>
                                <td>John Smith</td>
                                <td>+1 555-123-4567</td>
                                <td>john.smith@example.com</td>
                                <td>Dr. Emily Brown</td>
                                <td>Cardiology</td>
                                <td>
                                    <span class="badge bg-soft-success" data-bs-toggle="tooltip" data-placement="top" title="Patient is currently active">Active</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center ActionDropdown">
                                        <div class="d-flex">
                                        <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                data-bs-toggle="tooltip" title="Edit Patient Detail" href="patients-edit.php">
                                                <span class="icon"><span class="feather-icon">
                                                <iconify-icon icon="fluent:edit-20-regular"></iconify-icon>
                                                </span></span>
                                            </a>
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                data-bs-toggle="tooltip" title="View Patient Detail" href="patient-detail.php">
                                                <span class="icon"><span class="feather-icon">
                                                        <iconify-icon icon="hugeicons:view"></iconify-icon>
                                                    </span></span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="patient-detail.php">#PAT002</a></td>
                                <td>Mary Johnson</td>
                                <td>+1 555-234-5678</td>
                                <td>mary.johnson@example.com</td>
                                <td>Dr. Michael Lee</td>
                                <td>Neurology</td>
                                <td>
                                    <span class="badge bg-soft-danger" data-bs-toggle="tooltip" title="Patient is not currently active">Inactive</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center ActionDropdown">
                                        <div class="d-flex">
                                        <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                data-bs-toggle="tooltip" title="Edit Patient Detail" href="patients-edit.php">
                                                <span class="icon"><span class="feather-icon">
                                                <iconify-icon icon="fluent:edit-20-regular"></iconify-icon>
                                                </span></span>
                                            </a>
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                data-bs-toggle="tooltip" title="View Patient Detail" href="patient-detail.php">
                                                <span class="icon"><span class="feather-icon">
                                                        <iconify-icon icon="hugeicons:view"></iconify-icon>
                                                    </span></span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="patient-detail.php">#PAT003</a></td>
                                <td>James Williams</td>
                                <td>+1 555-345-6789</td>
                                <td>james.williams@example.com</td>
                                <td>Dr. Sarah Miller</td>
                                <td>Pediatrics</td>
                                <td>
                                    <span class="badge bg-soft-success" data-bs-toggle="tooltip" title="Patient is currently active">Active</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center ActionDropdown">
                                        <div class="d-flex">
                                        <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                data-bs-toggle="tooltip" title="Edit Patient Detail" href="patients-edit.php">
                                                <span class="icon"><span class="feather-icon">
                                                <iconify-icon icon="fluent:edit-20-regular"></iconify-icon>
                                                </span></span>
                                            </a>
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                data-bs-toggle="tooltip" title="View Patient Detail" href="patient-detail.php">
                                                <span class="icon"><span class="feather-icon">
                                                        <iconify-icon icon="hugeicons:view"></iconify-icon>
                                                    </span></span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="patient-detail.php">#PAT004</a></td>
                                <td>Kevin Martinez</td>
                                <td>+1 555-777-8899</td>
                                <td>kevin.martinez@example.com</td>
                                <td>Dr. Olivia Brooks</td>
                                <td>Orthopedics</td>
                                <td>
                                    <span class="badge bg-soft-danger" data-bs-toggle="tooltip" title="Patient is not currently active">Inactive</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center ActionDropdown">
                                        <div class="d-flex">
                                        <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                data-bs-toggle="tooltip" title="Edit Patient Detail" href="patients-edit.php">
                                                <span class="icon"><span class="feather-icon">
                                                <iconify-icon icon="fluent:edit-20-regular"></iconify-icon>
                                                </span></span>
                                            </a>
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                data-bs-toggle="tooltip" title="View Patient Detail" href="patient-detail.php">
                                                <span class="icon"><span class="feather-icon">
                                                        <iconify-icon icon="hugeicons:view"></iconify-icon>
                                                    </span></span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="patient-detail.php">#PAT005</a></td>
                                <td>Susan Green</td>
                                <td>+1 555-101-1213</td>
                                <td>susan.green@example.com</td>
                                <td>Dr. Ethan Hall</td>
                                <td>Dermatology</td>
                                <td>
                                    <span class="badge bg-soft-success" data-bs-toggle="tooltip" title="Patient is currently active">Active</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center ActionDropdown">
                                        <div class="d-flex">
                                        <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                data-bs-toggle="tooltip" title="Edit Patient Detail" href="patients-edit.php">
                                                <span class="icon"><span class="feather-icon">
                                                <iconify-icon icon="fluent:edit-20-regular"></iconify-icon>
                                                </span></span>
                                            </a>
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                data-bs-toggle="tooltip" title="View Patient Detail" href="patient-detail.php">
                                                <span class="icon"><span class="feather-icon">
                                                        <iconify-icon icon="hugeicons:view"></iconify-icon>
                                                    </span></span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="patient-detail.php">#PAT006</a></td>
                                <td>Daniel White</td>
                                <td>+1 555-232-3434</td>
                                <td>daniel.white@example.com</td>
                                <td>Dr. Chloe Adams</td>
                                <td>Urology</td>
                                <td>
                                    <span class="badge bg-soft-danger" data-bs-toggle="tooltip" title="Patient is not currently active">Inactive</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center ActionDropdown">
                                        <div class="d-flex">
                                        <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                data-bs-toggle="tooltip" title="Edit Patient Detail" href="patients-edit.php">
                                                <span class="icon"><span class="feather-icon">
                                                <iconify-icon icon="fluent:edit-20-regular"></iconify-icon>
                                                </span></span>
                                            </a>
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                data-bs-toggle="tooltip" title="View Patient Detail" href="patient-detail.php">
                                                <span class="icon"><span class="feather-icon">
                                                        <iconify-icon icon="hugeicons:view"></iconify-icon>
                                                    </span></span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="patient-detail.php">#PAT007</a></td>
                                <td>Emma Davis</td>
                                <td>+1 555-454-5656</td>
                                <td>emma.davis@example.com</td>
                                <td>Dr. Nathan Scott</td>
                                <td>Gynecology</td>
                                <td>
                                    <span class="badge bg-soft-success" data-bs-toggle="tooltip" title="Patient is currently active">Active</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center ActionDropdown">
                                        <div class="d-flex">
                                        <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                data-bs-toggle="tooltip" title="Edit Patient Detail" href="patients-edit.php">
                                                <span class="icon"><span class="feather-icon">
                                                <iconify-icon icon="fluent:edit-20-regular"></iconify-icon>
                                                </span></span>
                                            </a>
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                data-bs-toggle="tooltip" title="View Patient Detail" href="patient-detail.php">
                                                <span class="icon"><span class="feather-icon">
                                                        <iconify-icon icon="hugeicons:view"></iconify-icon>
                                                    </span></span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="patient-detail.php">#PAT008</a></td>
                                <td>Brian Turner</td>
                                <td>+1 555-676-7878</td>
                                <td>brian.turner@example.com</td>
                                <td>Dr. Hannah Cooper</td>
                                <td>ENT</td>
                                <td>
                                    <span class="badge bg-soft-danger" data-bs-toggle="tooltip" title="Patient is not currently active">Inactive</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center ActionDropdown">
                                        <div class="d-flex">
                                        <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                data-bs-toggle="tooltip" title="Edit Patient Detail" href="patients-edit.php">
                                                <span class="icon"><span class="feather-icon">
                                                <iconify-icon icon="fluent:edit-20-regular"></iconify-icon>
                                                </span></span>
                                            </a>
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                data-bs-toggle="tooltip" title="View Patient Detail" href="patient-detail.php">
                                                <span class="icon"><span class="feather-icon">
                                                        <iconify-icon icon="hugeicons:view"></iconify-icon>
                                                    </span></span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="patient-detail.php">#PAT009</a></td>
                                <td>Natalie Wright</td>
                                <td>+1 555-898-9090</td>
                                <td>natalie.wright@example.com</td>
                                <td>Dr. William King</td>
                                <td>General Medicine</td>
                                <td>
                                    <span class="badge bg-soft-success" data-bs-toggle="tooltip" title="Patient is currently active">Active</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center ActionDropdown">
                                        <div class="d-flex">
                                        <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                data-bs-toggle="tooltip" title="Edit Patient Detail" href="patients-edit.php">
                                                <span class="icon"><span class="feather-icon">
                                                <iconify-icon icon="fluent:edit-20-regular"></iconify-icon>
                                                </span></span>
                                            </a>
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                data-bs-toggle="tooltip" title="View Patient Detail" href="patient-detail.php">
                                                <span class="icon"><span class="feather-icon">
                                                        <iconify-icon icon="hugeicons:view"></iconify-icon>
                                                    </span></span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                                <!-- Add more patient rows as needed -->
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>


    </div>
</div>
@endsection
