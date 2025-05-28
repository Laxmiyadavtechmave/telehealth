@extends('clinic.layouts.app')
@section('title', 'Tele Health Clinic Admin | Appointment')
@section('content')

<div class="page-wrapper">
    <div class="content">

        <div class="rightSideWrapper">
            <div
                class="d-md-flex pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                <div class="my-0">
                    <h2 class="PageTitle">All Appointments</h2>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
                    <div class="ActionWrapper">
                        <a href="final-book.php" class="btn btn-primary d-flex align-items-center cmnaddbtn">
                        <iconify-icon icon="icons8:plus"></iconify-icon> Add New Appointment
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
                                                placeholder="Search by Patient Name & Id">
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
                                    <!-- <iconify-icon icon="hugeicons:clinic" class="info-img"></iconify-icon> -->
                                    <iconify-icon icon="iconamoon:category-light" class="info-img"></iconify-icon>
                                    <select class="select">
                                        <option selected disabled>Appointment Type</option>
                                        <option>Audio</option>
                                        <option>Video</option>
                                        <option>Physical</option>
                                    </select>
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
                                    <option>Completed</option>
                                    <option>Confirmed</option>
                                    <option>Cancelled</option>
                                    <option>Reschedule</option>
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
                                    <th>Patient ID</th>
                                    <th>Patient Name</th>
                                    <th>Mobile No.</th>
                                    <th>Email</th>
                                    <th>Doctor Name</th>
                                    <th>Appointment Type</th>
                                    <th>Date</th>
                                    <th>Time Slot</th>
                                    <th>Duration</th>
                                    <th>Reason for Visit</th>
                                    <th>Appointment Source</th>
                                    <th>Appointment By</th>
                                    <th>Payment Status</th>
                                    <th>Status</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="#">#PAT001</a></td>
                                    <td>Mille William</td>
                                    <td>9865326544</td>
                                    <td>milliwilliam56@gmail.com</td>
                                    <td>Dr. Smith</td>
                                    <td>Video</td>
                                    <td>05 May, 2025</td>
                                    <td>8:00 AM</td>
                                    <td>15 Min</td>
                                    <td>
                                        <div class="LongMesage_container">
                                            <input class="refuge-collection-input tableLongMessage_Input" value="Suffering from fever since last night and headache" readonly>
                                            <button class="view-btn tablemessageview_btn" type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Click to view" data-bs-original-title="Suffering from fever since last night and headache">
                                                <iconify-icon icon="ion:eye-outline"></iconify-icon> Read More
                                            </button>
                                        </div>
                                    </td>
                                    <td>Nurse</td>
                                    <td>Kitty Peri</td>
                                    <td>
                                    <div class="prioritystatus lowPriority">
                                        <span class="lowpriority_badge custom_mr_2 dot-label1"></span>
                                        <span class="priorityStatus_text">Pending</span>
                                    </div>
                                    </td>
                                    <td><span class="badge bg-soft-info">Confirmed</span></td>
                                    <td>
                                        <div class="d-flex align-items-center ActionDropdown">
                                            <div class="d-flex">
                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Appointment Detail" href="edit-final-book.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a>
                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="offcanvas" data-bs-target="#appointmentDetail" aria-controls="offcanvasRight" href="#">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="hugeicons:view"></iconify-icon></span></span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">#PAT002</a></td>
                                    <td>John Doe</td>
                                    <td>9876543210</td>
                                    <td>johndoe@gmail.com</td>
                                    <td>Dr. Adams</td>
                                    <td>Physical</td>
                                    <td>06 May, 2025</td>
                                    <td>10:00 AM</td>
                                    <td>30 Min</td>
                                    <td><div class="LongMesage_container"><input class="refuge-collection-input tableLongMessage_Input" value="Routine check-up" readonly><button class="view-btn tablemessageview_btn" type="button"><iconify-icon icon="ion:eye-outline"></iconify-icon> Read More</button></div></td>
                                    <td>Direct Patient</td>
                                    <td>

                                    </td>
                                    <td>
                                    <div class="prioritystatus MediumPriority">
                                        <span class="Mediumpriority_badge custom_mr_2 dot-label1"></span>
                                        <span class="priorityStatus_text">Refund</span>
                                    </div>
                                    </td>
                                    <td><span class="badge bg-soft-danger">Cancelled</span></td>
                                    <td>
                                        <div class="d-flex align-items-center ActionDropdown">
                                            <div class="d-flex">
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Appointment Detail" href="edit-final-book.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a>
                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="offcanvas" data-bs-target="#appointmentDetail" aria-controls="offcanvasRight" href="#">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="hugeicons:view"></iconify-icon></span></span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">#PAT003</a></td>
                                    <td>Jane Smith</td>
                                    <td>9123456789</td>
                                    <td>janesmith@email.com</td>
                                    <td>Dr. Lee</td>
                                    <td>Audio</td>
                                    <td>07 May, 2025</td>
                                    <td>11:30 AM</td>
                                    <td>20 Min</td>
                                    <td><div class="LongMesage_container"><input class="refuge-collection-input tableLongMessage_Input" value="Experiencing back pain for a week" readonly><button class="view-btn tablemessageview_btn" type="button"><iconify-icon icon="ion:eye-outline"></iconify-icon> Read More</button></div></td>
                                    <td>Nurse</td>
                                    <td>Nancy Jones</td>
                                    <td>
                                        <div class="prioritystatus highPriority">
                                            <span class="highpriority_badge custom_mr_2 dot-label1"></span>
                                            <span class="priorityStatus_text">Paid</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-soft-success">Completed</span></td>
                                    <td>
                                        <div class="d-flex align-items-center ActionDropdown">
                                            <div class="d-flex">
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Appointment Detail" href="edit-final-book.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a>
                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="offcanvas" data-bs-target="#appointmentDetail" aria-controls="offcanvasRight" href="#">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="hugeicons:view"></iconify-icon></span></span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">#PAT004</a></td>
                                    <td>Robert Brown</td>
                                    <td>9988776655</td>
                                    <td>robertbrown@domain.com</td>
                                    <td>Dr. Clark</td>
                                    <td>Video</td>
                                    <td>08 May, 2025</td>
                                    <td>2:00 PM</td>
                                    <td>25 Min</td>
                                    <td><div class="LongMesage_container"><input class="refuge-collection-input tableLongMessage_Input" value="Chest discomfort and short breath" readonly><button class="view-btn tablemessageview_btn" type="button"><iconify-icon icon="ion:eye-outline"></iconify-icon> Read More</button></div></td>
                                    <td>Direct Patient</td>
                                    <td></td>
                                    <td>
                                        <div class="prioritystatus highPriority">
                                            <span class="highpriority_badge custom_mr_2 dot-label1"></span>
                                            <span class="priorityStatus_text">Paid</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-soft-warning">Reschedule</span></td>
                                    <td>
                                        <div class="d-flex align-items-center ActionDropdown">
                                            <div class="d-flex">
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Appointment Detail" href="edit-final-book.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a>
                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="offcanvas" data-bs-target="#appointmentDetail" aria-controls="offcanvasRight" href="#">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="hugeicons:view"></iconify-icon></span></span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">#PAT005</a></td>
                                    <td>Lisa Green</td>
                                    <td>9090909090</td>
                                    <td>lisagreen@example.com</td>
                                    <td>Dr. Watson</td>
                                    <td>Physical</td>
                                    <td>09 May, 2025</td>
                                    <td>3:15 PM</td>
                                    <td>20 Min</td>
                                    <td><div class="LongMesage_container"><input class="refuge-collection-input tableLongMessage_Input" value="Follow-up for diabetes checkup" readonly><button class="view-btn tablemessageview_btn" type="button"><iconify-icon icon="ion:eye-outline"></iconify-icon> Read More</button></div></td>
                                    <td>Nurse</td>
                                    <td>David Nurse</td>
                                    <td>
                                        <div class="prioritystatus highPriority">
                                            <span class="highpriority_badge custom_mr_2 dot-label1"></span>
                                            <span class="priorityStatus_text">Paid</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-soft-info">Confirmed</span></td>
                                    <td>
                                        <div class="d-flex align-items-center ActionDropdown">
                                            <div class="d-flex">
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Appointment Detail" href="edit-final-book.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a>
                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="offcanvas" data-bs-target="#appointmentDetail" aria-controls="offcanvasRight" href="#">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="hugeicons:view"></iconify-icon></span></span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">#PAT006</a></td>
                                    <td>Kevin White</td>
                                    <td>9345612789</td>
                                    <td>kevinwhite@mail.com</td>
                                    <td>Dr. Gomez</td>
                                    <td>Audio</td>
                                    <td>10 May, 2025</td>
                                    <td>4:45 PM</td>
                                    <td>10 Min</td>
                                    <td><div class="LongMesage_container"><input class="refuge-collection-input tableLongMessage_Input" value="Mild allergic reaction on skin" readonly><button class="view-btn tablemessageview_btn" type="button"><iconify-icon icon="ion:eye-outline"></iconify-icon> Read More</button></div></td>
                                    <td>Direct Patient</td>
                                    <td></td>
                                    <td>
                                        <div class="prioritystatus highPriority">
                                            <span class="highpriority_badge custom_mr_2 dot-label1"></span>
                                            <span class="priorityStatus_text">Paid</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-soft-success">Completed</span></td>
                                    <td>
                                        <div class="d-flex align-items-center ActionDropdown">
                                            <div class="d-flex">
                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Appointment Detail" href="edit-final-book.php">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                </a>
                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="offcanvas" data-bs-target="#appointmentDetail" aria-controls="offcanvasRight" href="#">
                                                    <span class="icon"><span class="feather-icon"><iconify-icon icon="hugeicons:view"></iconify-icon></span></span>
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

<!---------------------------------------------
     Appointment Detail modal Start Here
---------------------------------------------->

<div class="RightSideMOffcanvas AppointmentModal">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="appointmentDetail" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel"> <iconify-icon icon="solar:calendar-broken"></iconify-icon> Appointment Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><iconify-icon icon="gravity-ui:arrow-right-to-line"></iconify-icon></button>
    </div>
    <div class="offcanvas-body PatientRecordView">
        <div class="row">
            <div class="col-lg-12">
                <div class="TopDocHead">
                    <div class="doctorProfileAp">
                        <div class="doctorImageAp">
                            <img src="assets/img/newimages/doc-profile-02.png" alt="">
                        </div>
                        <div class="doctorDetailAp">
                            <h5 class="doctorNameAp">Dr. James William <span class="expAp"><iconify-icon icon="akar-icons:shield"></iconify-icon> 7 Year Experience</span> <span class="doctorRatingAp"><iconify-icon icon="iconoir:star-solid"></iconify-icon> 4.2</span></h5>
                            <p class="specialtyAp">Cardiology, Psychiatry</p>
                        </div>
                    </div>
                    <span class="badge bg-soft-info">Confirmed</span>
                </div>

            </div>
            <div class="col-lg-12">
                <ul class="appointmentInfo">
                    <li>
                        <div class="appointInfoBox">
                            <p>Date</p>
                            <h6>07 May, 2025</h6>
                        </div>
                    </li>
                    <li>
                        <div class="appointInfoBox">
                            <p>Time Slot</p>
                            <h6>11:30 AM</h6>
                        </div>
                    </li>
                    <li>
                        <div class="appointInfoBox">
                            <p>Type</p>
                            <h6>Audio</h6>
                        </div>
                    </li>
                    <li>
                        <div class="appointInfoBox">
                            <p>Duration</p>
                            <h6>10 Min</h6>
                        </div>
                    </li>
                    <li>
                        <div class="appointInfoBox">
                            <p>Payment Status</p>
                            <div class="prioritystatus highPriority">
                                <span class="highpriority_badge custom_mr_2 dot-label1"></span>
                                <span class="priorityStatus_text">Paid</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-12">
                <h5 class="patentDtTitle">Patient Details</h5>
                <div class="row">
                    <div class="col-lg-7">
                    <div class="patientDetailInfoBox">
                            <ul class="patientDetailInfo">
                                <li>
                                    <span class="patientInfo">Patient ID</span>
                                    <span class="patientValue"><a href="#" style="color:#0495fa;">#PAT001</a></span>
                                </li>

                                <li>
                                    <span class="patientInfo">Patient Name</span>
                                    <span class="patientValue">Mrs. Emily Watson</span>
                                </li>
                                <li>
                                    <span class="patientInfo">Date of Birth</span>
                                    <span class="patientValue">25 April, 1995</span>
                                </li>
                                <li>
                                    <span class="patientInfo">Gender</span>
                                    <span class="patientValue">Female</span>
                                </li>
                                <li>
                                    <span class="patientInfo">Phone No.</span>
                                    <span class="patientValue">+91 - 9860657992</span>
                                </li>
                                <li>
                                    <span class="patientInfo">Email</span>
                                    <span class="patientValue">emilywatson96@gmail.com</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5">
                       <div class="reasonText">
                         <h6>Reason</h6>
                         <p>Routine check-up to assess overall health, update vaccinations, and discuss any minor concerns such as occasional headaches and sleep patterns. No urgent issues, just a general wellness visit.</p>
                       </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-12">
            <h5 class="patentDtTitle">Payment Details</h5>
                <ul class="appointmentInfo">
                    <li>
                        <div class="appointInfoBox">
                            <p>Transaction ID</p>
                            <h6>Trnx00245682df23</h6>
                        </div>
                    </li>
                    <li>
                        <div class="appointInfoBox">
                            <p>Payment Method</p>
                            <h6>Card</h6>
                        </div>
                    </li>
                    <li>
                        <div class="appointInfoBox">
                            <p>Amount</p>
                            <h6>$30</h6>
                        </div>
                    </li>
                    <li>
                        <div class="appointInfoBox">
                            <p>Date & Time</p>
                            <h6>07 May, 2025 09:00 AM</h6>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <!-- <div class="offcanvas-footer">

    </div> -->
    </div>
</div>
<!---------------------------------------------
      Appointment Detail modal End Here
---------------------------------------------->
@endsection
<!--------------------------
Status Dropdown Js Start here for appointment
----------------------------->

<!-- <div class="dropdown status-dropdown d-inline-block">
<button class="badge badge-soft-info dropdown-toggle border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Confirmed
</button>
<ul class="dropdown-menu">
    <li><a class="dropdown-item status-option" data-status="Completed" data-badge="badge-soft-success">Completed</a></li>
    <li><a class="dropdown-item status-option" data-status="Confirmed" data-badge="badge-soft-info">Confirmed</a></li>
    <li><a class="dropdown-item status-option" data-status="Cancelled" data-badge="badge-soft-danger">Cancelled</a></li>
    <li><a class="dropdown-item status-option" data-status="Reschedule" data-badge="badge-soft-warning">Reschedule</a></li>
</ul>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(document).on('click', '.status-option', function () {
    var $this = $(this);
    var selectedStatus = $this.data('status');
    var selectedBadgeClass = $this.data('badge');
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

        $btn.removeClass(function (index, className) {
          return (className.match(/(^|\s)badge-soft-\S+/g) || []).join(' ');
        });


        $btn.addClass(selectedBadgeClass).text(selectedStatus);

        Swal.fire({
          icon: 'success',
          title: 'Status Changed',
          text: 'Appointment is now ' + selectedStatus + '.',
          timer: 2000,
          showConfirmButton: false
        });
      }
    });
  });
</script> -->
<!--------------------------
Status Dropdown Js Start here
----------------------------->
