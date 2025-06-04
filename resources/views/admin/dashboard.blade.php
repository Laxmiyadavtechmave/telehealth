@extends('admin.layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <div class="d-md-flex d-block align-items-center justify-content-between pagetop_headercmn index_head">
                <div class="my-auto mb-2 dashtopTitle">
                <h2 class="mb-1">Welcome Back, {{auth()->guard('web')->user()->name??''}} <iconify-icon icon="fluent-emoji:waving-hand"></iconify-icon>
                    </h2>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">

                    <div class="ms-2 head-icons">
                        <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-original-title="Collapse" id="collapse-header">
                            <i class="ti ti-chevrons-up"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="dashCounter_cards_wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row dashCounter_cards">
                            <div class="CardDBMainWrapper">
                                <a href="##">
                                    <div class="dash-widget w-100">
                                        <div class="Dashwidget_cdIcon">
                                            <div class="dash-widgetimg">
                                                <span>
                                                    <iconify-icon icon="hugeicons:clinic"></iconify-icon>
                                                </span>
                                            </div>
                                            <div class="dash-widgetcontent">
                                                <h5><span class="counters" data-count="{{ $clinicCount ?? 00 }}">{{ $clinicCount ?? 00 }}</span></h5>
                                                <div class="Numcard_title">Total Clinics</div>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>
                            <div class="CardDBMainWrapper">
                                <a href="##">
                                    <div class="dash-widget w-100">
                                        <div class="Dashwidget_cdIcon">
                                            <div class="dash-widgetimg">
                                                <span>
                                                    <iconify-icon icon="guidance:in-patient"></iconify-icon>
                                                </span>
                                            </div>
                                            <div class="dash-widgetcontent">
                                                <h5><span class="counters" data-count="{{ $patientCount ?? 00 }}">{{ $patientCount ?? 00 }}</span></h5>
                                                <div class="Numcard_title">Total Patients</div>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>
                            <div class="CardDBMainWrapper">
                                <a href="##">
                                    <div class="dash-widget w-100">
                                        <div class="Dashwidget_cdIcon">
                                            <div class="dash-widgetimg">
                                                <span>
                                                    <iconify-icon icon="healthicons:doctor-outline"></iconify-icon>
                                                </span>
                                            </div>
                                            <div class="dash-widgetcontent">
                                                <h5><span class="counters" data-count="{{ $doctorCount ?? 00 }}">{{ $doctorCount ?? 00 }}</span></h5>
                                                <div class="Numcard_title">Total Doctors</div>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>
                            <div class="CardDBMainWrapper">
                                <a href="##">
                                    <div class="dash-widget w-100">
                                        <div class="Dashwidget_cdIcon">
                                            <div class="dash-widgetimg">
                                                <span>
                                                    <iconify-icon icon="healthicons:nurse-outline"></iconify-icon>
                                                </span>
                                            </div>
                                            <div class="dash-widgetcontent">
                                                <h5><span class="counters" data-count="{{ $nurseCount ?? 00 }}">{{ $nurseCount ?? 00 }}</span></h5>
                                                <div class="Numcard_title">Total Nurses</div>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>
                            <div class="CardDBMainWrapper">
                                <a href="##">
                                    <div class="dash-widget w-100">
                                        <div class="Dashwidget_cdIcon">
                                            <div class="dash-widgetimg">
                                                <span>
                                                    <iconify-icon icon="hugeicons:appointment-01"></iconify-icon>
                                                </span>
                                            </div>
                                            <div class="dash-widgetcontent">
                                                <h5><span class="counters" data-count="{{ $pharmacyCount ?? 00 }}">{{ $pharmacyCount ?? 00 }}</span></h5>
                                                <div class="Numcard_title">Total Pharmacy</div>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row dashCounter_cards">


                        </div>
                    </div>


                    <div class="col-lg-12 mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <div class="cardheader_TITIcon">
                                        <iconify-icon icon="hugeicons:clinic"></iconify-icon>
                                    </div>
                                    Recent Added Clinics
                                </h5>
                            </div>
                            <div class="card-body py-0">
                                <div id="tablefiltesa_container" class="tableInCardFilter">
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
                                                                <iconify-icon icon="iconoir:calendar" width="15"
                                                                    height="15">
                                                                </iconify-icon>
                                                            </span>
                                                            <input type="text"
                                                                class="form-control date-range bookingrange"
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
                                        <table class="table common-datatable nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Clinic ID</th>
                                                    <th>Clinic Name</th>
                                                    <th>Mobile No.</th>
                                                    <th>Email</th>
                                                    <th>License Number</th>
                                                    <th>Location</th>
                                                    <th>Total Doctors</th>
                                                    <th>Added On</th>
                                                    <th>Status</th>
                                                    <th class="no-sort">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="clinic-detail.php">#CLI001</a></td>
                                                    <td>
                                                        <div class="productimgname">
                                                            <a href="{{asset('admin/assets/img/newimages/logimg1.png')}}"
                                                                data-fancybox="gallery" class="product-img stock-img">
                                                                <img src="{{asset('admin/assets/img/newimages/logimg1.png')}}"
                                                                    alt="product">
                                                            </a>
                                                            <a href="javascript:void(0);">Pro Health Clinic</a>
                                                        </div>
                                                    </td>
                                                    <td>9865326544</td>
                                                    <td>prohealthclinic@gmail.com</td>
                                                    <td>NPI-1932154602</td>
                                                    <td>
                                                        <div class="LongMesage_container">
                                                            <input class="refuge-collection-input tableLongMessage_Input"
                                                                value="No 14, 15th Cross, Old Trafford, UK" readonly>
                                                            <button class="view-btn tablemessageview_btn" type="button"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                aria-label="Click to view"
                                                                data-bs-original-title="No 14, 15th Cross, Old Trafford, UK">
                                                                <iconify-icon icon="ion:eye-outline"></iconify-icon> Read
                                                                More
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td>20</td>
                                                    <td>20 April, 2025</td>
                                                    <td>
                                                        <span class="badge bg-soft-success" data-bs-toggle="tooltip"
                                                            data-placement="top"
                                                            title="Clinic is currently active">Active</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center ActionDropdown">
                                                            <div class="d-flex">
                                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                                    data-bs-toggle="tooltip" title="Edit Clinic Detail"
                                                                    href="clinic-edit.php">
                                                                    <span class="icon"><span
                                                                            class="feather-icon"><iconify-icon
                                                                                icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                                </a>
                                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                                    data-bs-toggle="tooltip" title="View Clinic Detail"
                                                                    href="clinic-detail.php">
                                                                    <span class="icon"><span
                                                                            class="feather-icon"><iconify-icon
                                                                                icon="hugeicons:view"></iconify-icon></span></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="clinic-detail.php">#CLI002</a></td>
                                                    <td>
                                                        <div class="productimgname">
                                                            <a href="{{asset('admin/assets/img/newimages/logimg2.png')}}"
                                                                data-fancybox="gallery" class="product-img stock-img">
                                                                <img src="{{asset('admin/assets/img/newimages/logimg2.png')}}"
                                                                    alt="product">
                                                            </a>
                                                            <a href="javascript:void(0);">City Wellness Center</a>
                                                        </div>
                                                    </td>
                                                    <td>9123456789</td>
                                                    <td>citywellness@mail.com</td>
                                                    <td>NPI-1932154603</td>
                                                    <td>
                                                        <div class="LongMesage_container">
                                                            <input class="refuge-collection-input tableLongMessage_Input"
                                                                value="22 Baker Street, London, UK" readonly>
                                                            <button class="view-btn tablemessageview_btn" type="button"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                aria-label="Click to view"
                                                                data-bs-original-title="22 Baker Street, London, UK">
                                                                <iconify-icon icon="ion:eye-outline"></iconify-icon> Read
                                                                More
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td>15</td>
                                                    <td>23 April, 2025</td>
                                                    <td>
                                                        <span class="badge bg-soft-danger" data-bs-toggle="tooltip"
                                                            data-placement="top"
                                                            title="Clinic is currently inactive">Inactive</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center ActionDropdown">
                                                            <div class="d-flex">
                                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                                    data-bs-toggle="tooltip" title="Edit Clinic Detail"
                                                                    href="clinic-edit.php">
                                                                    <span class="icon"><span
                                                                            class="feather-icon"><iconify-icon
                                                                                icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                                </a>
                                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                                    data-bs-toggle="tooltip" title="View Clinic Detail"
                                                                    href="clinic-detail.php">
                                                                    <span class="icon"><span
                                                                            class="feather-icon"><iconify-icon
                                                                                icon="hugeicons:view"></iconify-icon></span></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="clinic-detail.php">#CLI003</a></td>
                                                    <td>
                                                        <div class="productimgname">
                                                            <a href="assets/img/newimages/logimg3.png"
                                                                data-fancybox="gallery" class="product-img stock-img">
                                                                <img src="{{asset('admin/assets/img/newimages/logimg3.png')}}"
                                                                    alt="product">
                                                            </a>
                                                            <a href="javascript:void(0);">WellBeing Clinic</a>
                                                        </div>
                                                    </td>
                                                    <td>9876543210</td>
                                                    <td>wellbeing@clinic.com</td>
                                                    <td>NPI-1932154604</td>
                                                    <td>
                                                        <div class="LongMesage_container">
                                                            <input class="refuge-collection-input tableLongMessage_Input"
                                                                value="5 Downing Street, London, UK" readonly>
                                                            <button class="view-btn tablemessageview_btn" type="button"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                aria-label="Click to view"
                                                                data-bs-original-title="5 Downing Street, London, UK">
                                                                <iconify-icon icon="ion:eye-outline"></iconify-icon> Read
                                                                More
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td>30</td>
                                                    <td>17 March, 2025</td>
                                                    <td>
                                                        <span class="badge bg-soft-success" data-bs-toggle="tooltip"
                                                            data-placement="top"
                                                            title="Clinic is currently active">Active</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center ActionDropdown">
                                                            <div class="d-flex">
                                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                                    data-bs-toggle="tooltip" title="Edit Clinic Detail"
                                                                    href="clinic-edit.php">
                                                                    <span class="icon"><span
                                                                            class="feather-icon"><iconify-icon
                                                                                icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                                </a>
                                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                                    data-bs-toggle="tooltip" title="View Clinic Detail"
                                                                    href="clinic-detail.php">
                                                                    <span class="icon"><span
                                                                            class="feather-icon"><iconify-icon
                                                                                icon="hugeicons:view"></iconify-icon></span></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Button trigger modal -->

        </div>
    </div>
@endsection
