@extends('clinic.layouts.app')
@section('title', 'Tele Health Clinic Admin | Patient-deetail')
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="PatinetWrapper">
        <div class="d-md-flex topHeaderPTD pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                <div class="my-auto ">
                <h2 class="mb-1 flexpagetitle">
                    <div class="backbtnwrap">
                        <a href="patients.php">
                            <iconify-icon icon="octicon:arrow-left-24"></iconify-icon>
                        </a>
                    </div>
                    Patient Details
                </h2>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">

                    <div class="head-icons ms-2 headicon_innerpage">
                        <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
                            <i class="ti ti-chevrons-up"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card">
                <!-- Profile Section -->
                <div class="profile-section CommonCardPT">
                    <img src="{{ $patient && $patient->img ? env('IMAGE_ROOT') . $patient->img : asset('clinic/img/newimages/userdummy.png') }}" alt="Profile">
                    <div class="profile-details">
                        <h3 class="PatientName">{{ $patient->name ?? '' }} <a href="#" class="insuranceInfoCard"><iconify-icon icon="proicons:info"></iconify-icon></a></h3>
                        <!-- <span>08/04/1959 (64y) Male • Patient ID : #PAT008</span> -->
                        <div class="InfoDt">
                            {{ \Carbon\Carbon::parse($patient->dob)->format('d M,Y') ?? '' }} ({{ \Carbon\Carbon::parse($patient->dob)->age }}y ) {{ $patient->gender ?? '' }} • Patient ID : #{{ $patient->patient_id ?? '' }}
                        </div>
                        <div class="InfoDt">
                            <iconify-icon icon="mingcute:phone-line"></iconify-icon> {{ $patient->phone ?? '' }}
                        </div>
                        <div class="InfoDt">
                            <iconify-icon icon="carbon:email"></iconify-icon> {{ $patient->email ?? '' }}
                        </div>
                        <div class="InfoDt">
                           SSN No. <strong>{{ $patient->ssn ?? '' }}</strong>
                        </div>

                    </div>
                    <div class="insurance InsuranceCardShow" style="display: none;">
                        <img src="{{ asset('clinic/img/newimages/security.png') }}" alt="Insurance Icon" class="InsuranceIcon">
                        <strong>{{ $extra['insurance_provider'] ?? '' }}</strong>
                        <small>Card No - {{ $extra['card_number'] ?? '' }}</small>
                        <small>Expiry - {{ $extra['expiry'] ?? '' }}</small>
                    </div>
                </div>

                <!-- Middle Info -->
                <div class="middle-info CommonCardPT">
                    <!-- <div class="info-row">
        <span class="info-label">Address</span> 900 Oak Ridge CIR, Brighton, MI 48116
      </div>
      <div class="info-row">
        <span class="info-label">Marital Status</span> Single
      </div>
      <div class="info-row">
        <span class="info-label">National ID</span> #NA2365KLO

      </div> -->
                    <h6 class="ContactInfo">Other Details</h6>
                    <div class="InfoDt">
                        <iconify-icon icon="ion:location-outline"></iconify-icon> {{ $patient->whole_address ?? '' }}
                    </div>
                    <div class="InfoDt">
                        <iconify-icon icon="carbon:chart-relationship"></iconify-icon> {{ $patient->marital_status ?? '' }}
                    </div>
                    <div class="InfoDt">
                        <iconify-icon icon="hugeicons:id"></iconify-icon> #{{ $patient->national_id ?? '' }}
                    </div>
                    <div class="InfoDt">
                    <iconify-icon icon="hugeicons:doctor-01"></iconify-icon> <span class="doctorNameClinic"><a href="#">Dr. James William</a>, Fortis Hospital</span>
                    </div>
                </div>
                <div class="middle-info CommonCardPT">
                    <h6 class="ContactInfo">Emergency Contact</h6>

                    <div class="InfoDt">
                        <iconify-icon icon="uil:user"></iconify-icon> {{ $extra['emergency_name'] ?? '' }} , {{ $extra['emergency_relation'] ?? '' }}
                    </div>
                    <div class="InfoDt">
                        <iconify-icon icon="mingcute:phone-line"></iconify-icon> {{ $extra['emergency_phone'] ?? '' }}
                    </div>
                    <div class="InfoDt">
                        <iconify-icon icon="carbon:email"></iconify-icon> {{ $extra['emergency_email'] ?? '' }}
                    </div>
                </div>

                <!-- Insurance -->
                <div class="insurance VideoCallDteail">
                    <!-- <img src="assets/img/newimages/security.png" alt="Insurance Icon" class="InsuranceIcon"> -->
                    <div class="VideoWrapper">
                        <div class="Currentvendorstatus">
                                <iconify-icon icon="f7:status"></iconify-icon> Current Status : &nbsp; <div class="badge {{ $patient->satus == 'active' ? 'badge-soft-success' : 'badge-soft-warning' }}">
                                    {{ ucfirst($patient->status) }}</div>

                            </div>
                            <div class="enquiryDate">
                                <iconify-icon icon="ion:calendar-outline"></iconify-icon> Added On : <div
                                    class="Onboarddate">
                                    {{ \Carbon\Carbon::parse($patient->created_at)->format('d M Y h:ia') ?? '' }}</div>

                            </div>
                    </div>


                    <div class="ActionWrapper">
                       <div class="patientAction">
                        <a href="#"><iconify-icon icon="mi:call"></iconify-icon></a>
                        <a href="#"><iconify-icon icon="lucide:video"></iconify-icon></a>
                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#PatientChat" aria-controls="offcanvasRight"><iconify-icon icon="proicons:chat"></iconify-icon></a>
                       </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-5">
                <div class="MainActionsWrapper">
                    <h5 class="PatientRecordTitle orangeText"  data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn" data-tab="Nav-Vitals-monitoring">Patient Records</h5>
                    <div class="searchBarWrapper">
                        <input type="text" class="form-control" placeholder="Search Here...">
                        <a href="#" class="SearchIcon">
                            <iconify-icon icon="prime:search"></iconify-icon>
                        </a>
                    </div>
                    <ul class="MainActionList">
                        <li>
                            <div class="leftSidebox">
                                <h6>Vitals Monitoring</h6>
                                <span>Last Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</span>
                            </div>
                            <div class="rightSidE">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation"
                                class="open-tab-btn" data-tab="Nav-Vitals-monitoring">
                                    <iconify-icon icon="icons8:plus"></iconify-icon>
                                </a>
                                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#VitalView" aria-controls="offcanvasRight"><iconify-icon icon="proicons:eye"></iconify-icon></a>
                            </div>
                        </li>

                        <li>
                            <div class="leftSidebox">
                                <h6>Progress Notes</h6>
                                <span>Last Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</span>
                            </div>
                            <div class="rightSidE">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation"
                                class="open-tab-btn" data-tab="Nav-Progress-Notes">
                                    <iconify-icon icon="icons8:plus"></iconify-icon>
                                </a>
                                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#ProgressNoteView" aria-controls="offcanvasRight"><iconify-icon icon="proicons:eye"></iconify-icon></a>
                            </div>
                        </li>

                        <li>
                            <div class="leftSidebox">
                                <h6>Diagnosis</h6>
                                <span>Last Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</span>
                            </div>
                            <div class="rightSidE">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation"
                                class="open-tab-btn" data-tab="Nav-Diagnosis">
                                    <iconify-icon icon="icons8:plus"></iconify-icon>
                                </a>
                                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#DiagnosisView" aria-controls="offcanvasRight"><iconify-icon icon="proicons:eye"></iconify-icon></a>
                            </div>
                        </li>

                        <!-- <li>
                            <div class="leftSidebox">
                                <h6>Treatment Plan</h6>
                                <span>Last Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</span>
                            </div>
                            <div class="rightSidE">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation"
                                class="open-tab-btn" data-tab="Nav-Treatment-Plan">
                                    <iconify-icon icon="icons8:plus"></iconify-icon>
                                </a>
                                <a href="#"><iconify-icon icon="proicons:eye"></iconify-icon></a>
                            </div>
                        </li> -->

                        <!-- Continue the pattern below for each item -->

                        <li>
                            <div class="leftSidebox">
                                <h6>Prescriptions</h6>
                                <span>Last Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</span>
                            </div>
                            <div class="rightSidE">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation"
                                class="open-tab-btn" data-tab="Nav-Prescriptions">
                                    <iconify-icon icon="icons8:plus"></iconify-icon>
                                </a>
                                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#PrescriptionView" aria-controls="offcanvasRight"><iconify-icon icon="proicons:eye"></iconify-icon></a>
                            </div>
                        </li>

                        <li>
                            <div class="leftSidebox">
                                <h6>Doctor Notes</h6>
                                <span>Last Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</span>
                            </div>
                            <div class="rightSidE">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation"
                                class="open-tab-btn" data-tab="Nav-Doctor-Notes">
                                    <iconify-icon icon="icons8:plus"></iconify-icon>
                                </a>
                                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#DoctorNotesView" aria-controls="offcanvasRight"><iconify-icon icon="proicons:eye"></iconify-icon></a>
                            </div>
                        </li>

                        <li>
                            <div class="leftSidebox">
                                <h6>All Reports</h6>
                                <span>Last Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</span>
                            </div>
                            <div class="rightSidE">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation"
                                class="open-tab-btn" data-tab="Nav-Lab-Reports">
                                    <iconify-icon icon="icons8:plus"></iconify-icon>
                                </a>
                                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#AllReportsView" aria-controls="offcanvasRight"><iconify-icon icon="proicons:eye"></iconify-icon></a>
                            </div>
                        </li>

                        <!-- <li>
                            <div class="leftSidebox">
                                <h6>Imaging Order</h6>
                                <span>Last Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</span>
                            </div>
                            <div class="rightSidE">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation"
                                class="open-tab-btn" data-tab="Nav-Imaging-Order">
                                    <iconify-icon icon="icons8:plus"></iconify-icon>
                                </a>
                                <a href="#"><iconify-icon icon="proicons:eye"></iconify-icon></a>
                            </div>
                        </li> -->

                        <li>
                            <div class="leftSidebox">
                                <h6>Nursing Notes</h6>
                                <span>Last Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</span>
                            </div>
                            <div class="rightSidE">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation"
                                class="open-tab-btn" data-tab="Nav-Nursing-Notes">
                                    <iconify-icon icon="icons8:plus"></iconify-icon>
                                </a>
                                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#NursingNotesView" aria-controls="offcanvasRight"><iconify-icon icon="proicons:eye"></iconify-icon></a>
                            </div>
                        </li>

                        <!-- <li>
                            <div class="leftSidebox">
                                <h6>Chronic Illnesses</h6>
                                <span>Last Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</span>
                            </div>
                            <div class="rightSidE">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation"
                                class="open-tab-btn" data-tab="Nav-Chronic-Illnesses">
                                    <iconify-icon icon="icons8:plus"></iconify-icon>
                                </a>
                                <a href="#"><iconify-icon icon="proicons:eye"></iconify-icon></a>
                            </div>
                        </li> -->

                        <li>
                            <div class="leftSidebox">
                                <h6>Past Surgeries</h6>
                                <span>Last Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</span>
                            </div>
                            <div class="rightSidE">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation"
                                class="open-tab-btn" data-tab="Nav-Past-Surgeries">
                                    <iconify-icon icon="icons8:plus"></iconify-icon>
                                </a>
                                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#PastSurgeriesView" aria-controls="offcanvasRight"><iconify-icon icon="proicons:eye"></iconify-icon></a>
                            </div>
                        </li>

                        <li>
                            <div class="leftSidebox">
                                <h6>Allergies</h6>
                                <span>Last Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</span>
                            </div>
                            <div class="rightSidE">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation"
                                class="open-tab-btn" data-tab="Nav-Allergies">
                                    <iconify-icon icon="icons8:plus"></iconify-icon>
                                </a>
                                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#AllergiesView" aria-controls="offcanvasRight"><iconify-icon icon="proicons:eye"></iconify-icon></a>
                            </div>
                        </li>

                        <li>
                            <div class="leftSidebox">
                                <h6>Past Medications</h6>
                                <span>Last Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</span>
                            </div>
                            <div class="rightSidE">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation"
                                class="open-tab-btn" data-tab="Nav-Past-Medications">
                                    <iconify-icon icon="icons8:plus"></iconify-icon>
                                </a>
                                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#PastMedicationsView" aria-controls="offcanvasRight"><iconify-icon icon="proicons:eye"></iconify-icon></a>
                            </div>
                        </li>

                        <!-- <li>
                            <div class="leftSidebox">
                                <h6>Vaccination History</h6>
                                <span>Last Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</span>
                            </div>
                            <div class="rightSidE">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation"
                                class="open-tab-btn" data-tab="Nav-Vaccination-History">
                                    <iconify-icon icon="icons8:plus"></iconify-icon>
                                </a>
                                <a href="#"><iconify-icon icon="proicons:eye"></iconify-icon></a>
                            </div>
                        </li> -->
                    </ul>

                    <div class="noDataFound" style="display: none; text-align: center; padding: 20px;">
                        <img src="assets/img/newimages/nodatavector.png" alt="No Data"
                            style="width: 100px; margin-bottom: 10px;">
                        <h5>No Search Found</h5>
                        <p>You search something wrong !</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="VisitCardBox">
                    <h5 class="RecentTitle blueText">Recent Visits</h5>
                    <div class="VisitCardBox-body">
                        <div class="mainCardVisit">
                            <div class="VisitCard">
                                <div class="LeftSide">
                                    <h6 class="DoctorName">Dr. Daniel McAdams <span>Cardiology</span></h6>
                                </div>
                                <div class="RightSideBOx">
                                    <span class="badge visitType">Follow Up</span>
                                </div>
                            </div>
                            <div class="DateInfo">
                                <span>
                                    <iconify-icon icon="solar:calendar-linear"></iconify-icon> 03/04/25
                                </span>
                                <span>
                                    <iconify-icon icon="iconamoon:clock-light"></iconify-icon> 08:45 AM - 09:15 AM
                                </span>

                            </div>
                        </div>
                        <div class="mainCardVisit">
                            <div class="VisitCard">
                                <div class="LeftSide">
                                    <h6 class="DoctorName">Dr. Daniel McAdams <span>Cardiology</span></h6>
                                </div>
                                <div class="RightSideBOx">
                                    <span class="badge visitType">Follow Up</span>
                                </div>
                            </div>
                            <div class="DateInfo">
                                <span>
                                    <iconify-icon icon="solar:calendar-linear"></iconify-icon> 03/03/25
                                </span>
                                <span>
                                    <iconify-icon icon="iconamoon:clock-light"></iconify-icon> 08:45 AM - 09:15 AM
                                </span>

                            </div>
                        </div>
                        <div class="mainCardVisit">
                            <div class="VisitCard">
                                <div class="LeftSide">
                                    <h6 class="DoctorName">Dr. Daniel McAdams <span>Cardiology</span></h6>
                                </div>
                                <div class="RightSideBOx">
                                    <span class="badge visitType">Follow Up</span>
                                </div>
                            </div>
                            <div class="DateInfo">
                                <span>
                                    <iconify-icon icon="solar:calendar-linear"></iconify-icon> 03/03/25
                                </span>
                                <span>
                                    <iconify-icon icon="iconamoon:clock-light"></iconify-icon> 08:45 AM - 09:15 AM
                                </span>

                            </div>
                        </div>
                        <div class="mainCardVisit">
                            <div class="VisitCard">
                                <div class="LeftSide">
                                    <h6 class="DoctorName">Dr. Daniel McAdams <span>Cardiology</span></h6>
                                </div>
                                <div class="RightSideBOx">
                                    <span class="badge visitType">Routine Checkup</span>
                                </div>
                            </div>
                            <div class="DateInfo">
                                <span>
                                    <iconify-icon icon="solar:calendar-linear"></iconify-icon> 03/03/25
                                </span>
                                <span>
                                    <iconify-icon icon="iconamoon:clock-light"></iconify-icon> 08:45 AM - 09:15 AM
                                </span>

                            </div>
                        </div>
                        <div class="mainCardVisit">
                            <div class="VisitCard">
                                <div class="LeftSide">
                                    <h6 class="DoctorName">Dr. Daniel McAdams <span>Cardiology</span></h6>
                                </div>
                                <div class="RightSideBOx">
                                    <span class="badge visitType">Routine Checkup</span>
                                </div>
                            </div>
                            <div class="DateInfo">
                                <span>
                                    <iconify-icon icon="solar:calendar-linear"></iconify-icon> 03/03/25
                                </span>
                                <span>
                                    <iconify-icon icon="iconamoon:clock-light"></iconify-icon> 08:45 AM - 09:15 AM
                                </span>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="vitalsMainWrapper">
                    <div class="vitalsWrapper">
                        <h5 class="VitalTitle greenText">Vital Signs <span>Last Update : 22/04/2025 02:23 PM</span></h5>
                        <div class="VitalMainBox">
                            <div class="VitalInner">
                                <div class="VitalIcon">
                                    <iconify-icon icon="healthicons:height-outline"></iconify-icon>
                                </div>
                                <div class="VitalValue">
                                    <h6>Height</h6>
                                    <h5>5'4</h5>
                                </div>
                            </div>
                            <div class="VitalInner">
                                <div class="VitalIcon">
                                    <iconify-icon icon="icon-park-outline:weight"></iconify-icon>
                                </div>
                                <div class="VitalValue">
                                    <h6>Weight</h6>
                                    <h5>80<span class="unitVital">Kg</span></h5>
                                </div>
                            </div>
                            <div class="VitalInner">
                                <div class="VitalIcon">
                                    <iconify-icon icon="carbon:temperature-max"></iconify-icon>
                                </div>
                                <div class="VitalValue">
                                    <h6>Temperature</h6>
                                    <h5>98.0 <iconify-icon icon="tabler:temperature-fahrenheit"></iconify-icon>
                                    </h5>
                                </div>
                            </div>
                            <div class="VitalInner">
                                <div class="VitalIcon">
                                    <iconify-icon icon="hugeicons:blood-pressure"></iconify-icon>
                                </div>
                                <div class="VitalValue">
                                    <h6>Blood Pressure</h6>
                                    <h5>120/80 <span class="unitVital">mmHg</span></h5>
                                </div>
                            </div>
                            <div class="VitalInner mb-0">
                                <div class="VitalIcon">
                                    <iconify-icon icon="solar:pulse-linear"></iconify-icon>
                                </div>
                                <div class="VitalValue">
                                    <h6>Pulse</h6>
                                    <h5>72 <span class="unitVital">bpm</span></h5>
                                </div>
                            </div>
                            <div class="VitalInner mb-0">
                                <div class="VitalIcon">
                                    <iconify-icon icon="material-symbols:spo2-outline"></iconify-icon>
                                </div>
                                <div class="VitalValue">
                                    <h6>SpO2</h6>
                                    <h5>98% </h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="vitalsMainWrapper mt-2">
                    <div class="vitalsWrapper">
                        <div class="VitalHeader">
                            <h5 class="VitalTitle">Files & Documents <span>{{ $patient->documents->first()?->created_at ? 'Last Update : ' . $patient->documents->first()->created_at->format('d M Y h:ia') : '' }}</span></h5>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#DocumentUpload" class="UploadBtn">
                                <iconify-icon icon="material-symbols:upload-sharp"></iconify-icon> Upload
                            </a>
                        </div>

                        {{-- <ul class="dcoumentsList">
                            <li>
                                <div class="IconFile">
                                    <iconify-icon icon="pepicons-print:file"></iconify-icon>
                                    <h6>Medical Record</h6>
                                </div>
                                <div class="actionDoc">
                                    <a href="assets/img/newimages/dummy.pdf" target="_blank">
                                        <iconify-icon icon="lets-icons:view-light"></iconify-icon>
                                    </a>
                                    <a href="assets/img/newimages/dummy.pdf" download>
                                        <iconify-icon icon="material-symbols-light:download"></iconify-icon>
                                    </a>
                                </div>


                            </li>
                            <li>
                                <div class="IconFile">
                                    <iconify-icon icon="pepicons-print:file"></iconify-icon>
                                    <h6>Consent Form</h6>
                                </div>
                                <div class="actionDoc">
                                    <a href="assets/img/newimages/dummy.pdf" target="_blank">
                                        <iconify-icon icon="lets-icons:view-light"></iconify-icon>
                                    </a>
                                    <a href="assets/img/newimages/dummy.pdf" download>
                                        <iconify-icon icon="material-symbols-light:download"></iconify-icon>
                                    </a>
                                </div>


                            </li>
                            <li>
                                <div class="IconFile">
                                    <iconify-icon icon="pepicons-print:file"></iconify-icon>
                                    <h6>Insurance Card </h6>
                                </div>
                                <div class="actionDoc">
                                    <a href="assets/img/newimages/dummy.pdf" target="_blank">
                                        <iconify-icon icon="lets-icons:view-light"></iconify-icon>
                                    </a>
                                    <a href="assets/img/newimages/dummy.pdf" download>
                                        <iconify-icon icon="material-symbols-light:download"></iconify-icon>
                                    </a>
                                </div>


                            </li>
                            <li>
                                <div class="IconFile">
                                    <iconify-icon icon="pepicons-print:file"></iconify-icon>
                                    <h6>ID Proof</h6>
                                </div>
                                <div class="actionDoc">
                                    <a href="assets/img/newimages/dummy.pdf" target="_blank">
                                        <iconify-icon icon="lets-icons:view-light"></iconify-icon>
                                    </a>
                                    <a href="assets/img/newimages/dummy.pdf" download>
                                        <iconify-icon icon="material-symbols-light:download"></iconify-icon>
                                    </a>
                                </div>
                            </li>
                        </ul> --}}
                        @if (count($documents) > 0)
                                <ul class="dcoumentsList">
                                    @foreach ($documents as $document)
                                        <li>
                                            <div class="IconFile">
                                                <iconify-icon icon="pepicons-print:file"></iconify-icon>
                                                <h6>{{ $document['title'] }}</h6>
                                            </div>
                                            <div class="actionDoc">
                                                <a href="{{ $document['url'] }}" target="_blank">
                                                    <iconify-icon icon="lets-icons:view-light"></iconify-icon>
                                                </a>
                                                <a href="{{ $document['url'] }}" download>
                                                    <iconify-icon icon="material-symbols-light:download"></iconify-icon>
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
</div>


</div>
</div>

<!-- Modal -->
<div class="createQuotationForm">
    <form action="#">
        <div class="modal fade" id="createQuotation" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modalFull_width">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="quotationMainBox">

                            <div class="sidebardMain">
                                <h4 class="TemplateTitle">Patient Clinical Records</h4>
                                <div class="tabButtonsMain">
                                    <nav class="nav nav-style-6 nav-pills d-block" role="tablist">
                                        <a class="nav-link active" data-bs-toggle="tab" role="tab" aria-current="page"
                                            href="#Nav-Vitals-monitoring" aria-selected="false">Vitals Monitoring
                                        </a>

                                        <a class="nav-link" data-bs-toggle="tab" role="tab" href="#Nav-Progress-Notes"
                                            aria-selected="true">Progress Notes</a>
                                        <a class="nav-link" data-bs-toggle="tab" role="tab" href="#Nav-Diagnosis"
                                            aria-selected="true">Diagnosis</a>
                                        <!-- <a class="nav-link" data-bs-toggle="tab" role="tab" href="#Nav-Treatment-Plan"
                                            aria-selected="true">Treatment Plan</a> -->
                                        <a class="nav-link" data-bs-toggle="tab" role="tab" href="#Nav-Prescriptions"
                                            aria-selected="true">Prescriptions</a>
                                        <a class="nav-link" data-bs-toggle="tab" role="tab" href="#Nav-Doctor-Notes"
                                            aria-selected="true">Doctor Notes</a>
                                        <a class="nav-link" data-bs-toggle="tab" role="tab" href="#Nav-Lab-Reports"
                                            aria-selected="true">All Reports</a>
                                        <!-- <a class="nav-link" data-bs-toggle="tab" role="tab" href="#Nav-Imaging-Order"
                                            aria-selected="true">Imaging Order</a> -->
                                        <a class="nav-link" data-bs-toggle="tab" role="tab" href="#Nav-Nursing-Notes"
                                            aria-selected="true">Nursing Notes</a>
                                        <!-- <a class="nav-link" data-bs-toggle="tab" role="tab"
                                            href="#Nav-Chronic-Illnesses" aria-selected="true">Chronic Illnesses</a> -->
                                        <a class="nav-link" data-bs-toggle="tab" role="tab" href="#Nav-Past-Surgeries"
                                            aria-selected="true">Past Surgeries</a>
                                        <a class="nav-link" data-bs-toggle="tab" role="tab" href="#Nav-Allergies"
                                            aria-selected="true">Allergies</a>
                                        <a class="nav-link" data-bs-toggle="tab" role="tab" href="#Nav-Past-Medications"
                                            aria-selected="true">Past Medications</a>
                                        <!-- <a class="nav-link" data-bs-toggle="tab" role="tab"
                                            href="#Nav-Vaccination-History" aria-selected="true">Vaccination History</a> -->
                                    </nav>
                                </div>



                                <!-- Create Group Button -->
                                <!-- <div class="groupEditBox">
                                    <button data-bs-toggle="modal" data-bs-target="#createGroupModal"
                                        class="btn createGroupBtn">
                                        <iconify-icon icon="icons8:plus"></iconify-icon> Create Group
                                    </button>
                                </div> -->

                            </div>


                            <div class="rightSidebar">
                                <div class="topQuotationHeader">
                                    <div class="SectionNameInput">
                                        <h5 class="sectionNameHJIO"><span class="InputSectionMane">Add Clinical
                                                Records</span></h5>

                                    </div>

                                    <div class="quotasionActions">
                                        <ul>
                                            <!-- <li><a href="javascript:void(0);" class="themeBtn shareBtn">Save Changes
                                                    <iconify-icon icon="lucide:save"></iconify-icon></a></li> -->
                                            <li><a href="javascript:void(0);" class="closeBtn" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <iconify-icon icon="weui:close-filled"></iconify-icon>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane show active text-muted" id="Nav-Vitals-monitoring"
                                        role="tabpanel">
                                       <form action="#">
                                        <div class="innerContainer">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="TopHeadSection">
                                                        <h4>Vital Signs</h4>
                                                        <p>Monitor and record the patient's essential health indicators for accurate and timely care.</p>

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">Height</label>
                                                        <input type="text" class="form-control" placeholder="eg 5'4">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">Weight</label>
                                                        <input type="text" class="form-control" placeholder="eg 80">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">Temperature</label>
                                                        <input type="text" class="form-control" placeholder="eg 98.0 ">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">Blood Pressure</label>
                                                        <input type="text" class="form-control" placeholder="eg 120/80">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">Pulse</label>
                                                        <input type="text" class="form-control" placeholder="eg 72">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">SpO2</label>
                                                        <input type="text" class="form-control" placeholder="eg 98%">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="lastUpdate">
                                                        <h6 class="VitalInfoTitle">Recent Update's</h6>
                                                        <ul class="VitalsInfoList">
                                                            <li>
                                                                <div class="mainInfoVitalsWrapper">

                                                                    <div class="vitalInfo">
                                                                        <h6 class="labelInfo">Temperature</h6>
                                                                         <h6>98.0 <iconify-icon icon="tabler:temperature-fahrenheit"></iconify-icon></h6>
                                                                    </div>
                                                                    <div class="vitalInfo">
                                                                        <h6 class="labelInfo">Blood Pressure</h6>
                                                                         <h6>120/80 <span class="unitVital">mmHg</span></h6>
                                                                    </div>
                                                                    <div class="vitalInfo">
                                                                        <h6 class="labelInfo">Pulse</h6>
                                                                         <h6>72 <span class="unitVital">bpm</span></h6>
                                                                    </div>
                                                                    <div class="vitalInfo">
                                                                        <h6 class="labelInfo">SpO2</h6>
                                                                         <h6>98%</h6>
                                                                    </div>

                                                                </div>
                                                                <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                                                            </li>
                                                            <li>
                                                                <div class="mainInfoVitalsWrapper">

                                                                    <div class="vitalInfo">
                                                                        <h6 class="labelInfo">Temperature</h6>
                                                                         <h6>98.0 <iconify-icon icon="tabler:temperature-fahrenheit"></iconify-icon></h6>
                                                                    </div>
                                                                    <div class="vitalInfo">
                                                                        <h6 class="labelInfo">Blood Pressure</h6>
                                                                         <h6>120/80 <span class="unitVital">mmHg</span></h6>
                                                                    </div>
                                                                    <div class="vitalInfo">
                                                                        <h6 class="labelInfo">Pulse</h6>
                                                                         <h6>72 <span class="unitVital">bpm</span></h6>
                                                                    </div>
                                                                    <div class="vitalInfo">
                                                                        <h6 class="labelInfo">SpO2</h6>
                                                                         <h6>98%</h6>
                                                                    </div>

                                                                </div>
                                                                <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 21 Oct 2025, 12:00</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="BottomFooter">
                                            <a href="#" class="btn SaveBtn">
                                                <span class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
                                                Save & Update
                                                </a>
                                                <a href="#" class="btn cancelBtn">Cancel</a>
                                            </div>
                                        </div>

                                       </form>
                                    </div>
                                    <div class="tab-pane  text-muted" id="Nav-Progress-Notes" role="tabpanel">
                                    <form action="#">
                                        <div class="innerContainer">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="TopHeadSection">
                                                        <h4>Progress Note</h4>
                                                        <p>Document the patient's ongoing condition, treatment response, and clinical observations.</p>

                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="#">Title</label>
                                                        <input type="text" class="form-control" placeholder="Progress Note - Day 3 Post-Op">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="#">Description</label>
                                                        <textarea name="" id="" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-end">
                                                    <a href="#" class="AddMoreBtn"><iconify-icon icon="basil:add-outline"></iconify-icon> Add More</a>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="lastUpdate">
                                                        <h6 class="VitalInfoTitle">Recent Updated Notes</h6>
                                                        <ul class="VitalsInfoList">
                                                            <li>
                                                                <div class="ProgressNotes">
                                                                    <h6 class="progressNoteTitle">Progress Note - Day 3 Post-Op</h6>
                                                                    <p>Patient is alert and oriented. Reports mild pain at the surgical site, rated 3/10. Vitals stable with no signs of infection. Wound site clean and dry. Plan to continue current antibiotics and encourage early ambulation. Follow-up labs scheduled for tomorrow.</p>
                                                                </div>
                                                                <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                                                            </li>

                                                            <li>
                                                                <div class="ProgressNotes">
                                                                    <h6 class="progressNoteTitle">Progress Note - Morning Rounds</h6>
                                                                   <p>Patient resting comfortably, no new complaints overnight. Blood pressure slightly elevated at 142/92, otherwise vitals within normal limits. Appetite improved, tolerated breakfast well. Plan to monitor BP closely and adjust antihypertensive medication if needed.</p>
                                                                </div>
                                                                <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                               </div>
                                               <div class="BottomFooter">
                                               <a href="#" class="btn SaveBtn">
                                                <span class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
                                                Save & Update
                                                </a>
                                                <a href="#" class="btn cancelBtn">Cancel</a>
                                            </div>
                                           </div>
                                     </form>
                                    </div>
                                    <div class="tab-pane  text-muted" id="Nav-Diagnosis" role="tabpanel">
                                    <form action="#">
                                        <div class="innerContainer">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="TopHeadSection">
                                                        <h4>Diagnosis</h4>
                                                        <p>Record the identified medical condition based on symptoms, tests, and clinical evaluation.</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label for="#">Diagnosis Type</label>
                                                        <select class="select2 form-control"
                                                            data-placeholder="Diagnosis Type">
                                                            <option value=""></option>
                                                            <option value="Primary">Primary</option>
                                                            <option value="Secondary">Secondary</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label for="#">Severity</label>
                                                        <select class="select2 form-control"
                                                            data-placeholder="Severity">
                                                            <option value=""></option>
                                                            <option value="Mild">Mild</option>
                                                            <option value="Moderate">Moderate</option>
                                                            <option value="Severe">Severe</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                        <label for="#">Diagnosis Name <span class="infoPara">( Type a diagnosis and press Enter to add multiple diagnoses.)</span></label>
                                                        <div class="diagnosis-wrapper">
                                                        <input type="text" class="diagnosis-input form-control" placeholder="Enter diagnosis">
                                                        <div class="diagnosis-tags"></div>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="#">Description / Notes</label>
                                                        <textarea name="" id="" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-end">
                                                    <a href="#" class="AddMoreBtn"><iconify-icon icon="basil:add-outline"></iconify-icon> Add More</a>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="lastUpdate">
                                                        <h6 class="VitalInfoTitle">Recent Updated Diagnosis</h6>
                                                        <ul class="VitalsInfoList">
                                                            <li>
                                                                <div class="ProgressNotes">
                                                                    <h6 class="progressNoteTitle"><iconify-icon icon="formkit:radio"></iconify-icon> Primary, <span class="SeverityOP">(Mild)</span></h6>
                                                                    <p class="diagnosis_text"> Thyroid nodule <span class="sepration">|</span> Multi-Nodular Goitre <span class="sepration">|</span> Thyroid Cyst <span class="sepration">|</span> Euothyroid <span class="sepration">|</span> Hypothyroidism <span class="sepration">|</span> Thyrotoxicosis <span class="sepration">|</span> Grave’s Disease</p>
                                                                    <p>Patient resting comfortably, no new complaints overnight. Blood pressure slightly elevated at 142/92, otherwise vitals within normal limits.</p>
                                                                </div>
                                                                <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                                                            </li>

                                                            <li>
                                                                <div class="ProgressNotes">
                                                                    <h6 class="progressNoteTitle"><iconify-icon icon="formkit:radio"></iconify-icon> Secondary, <span class="SeverityOP">(Moderate)</span></h6>
                                                                    <p class="diagnosis_text"> Thyroid nodule <span class="sepration">|</span> Multi-Nodular Goitre <span class="sepration">|</span> Thyroid Cyst <span class="sepration">|</span> Euothyroid <span class="sepration">|</span> Hypothyroidism <span class="sepration">|</span> Thyrotoxicosis <span class="sepration">|</span> Grave’s Disease</p>
                                                                    <p>Patient resting comfortably, no new complaints overnight. Blood pressure slightly elevated at 142/92, otherwise vitals within normal limits.</p>
                                                                </div>
                                                                <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 24 Oct 2025, 12:00</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                               </div>
                                               <div class="BottomFooter">
                                               <a href="#" class="btn SaveBtn">
                                                <span class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
                                                Save & Update
                                                </a>
                                                <a href="#" class="btn cancelBtn">Cancel</a>
                                            </div>
                                           </div>
                                     </form>
                                    </div>
                                    <!-- <div class="tab-pane  text-muted" id="Nav-Treatment-Plan" role="tabpanel">
                                    <form action="#">
                                        <div class="innerContainer">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="TopHeadSection">
                                                        <h4>Treatment Plan</h4>
                                                        <p>Provide a structured plan for diagnosis-based care.</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">Plan Title</label>
                                                        <input type="text" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">Start Date</label>
                                                        <input type="text" class="form-control customdataPicker" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">End Date</label>
                                                        <input type="text" class="form-control customdataPicker" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="#">Description / Notes</label>
                                                        <textarea name="" id="" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="lastUpdate">
                                                        <h6 class="VitalInfoTitle">Recent Updated Treatment Plan</h6>
                                                        <ul class="VitalsInfoList">
                                                            <li>
                                                                <div class="ProgressNotes">
                                                                    <h6 class="progressNoteTitle"> Comprehensive Antimicrobial Management Plan, <span class="SeverityOP">22/04/2025 - 02/05/2025</span></h6>
                                                                    <p>Initiate a 10-day regimen of Amoxicillin 500mg TID to address suspected lower respiratory tract infection. Monitor patient response and adjust dosage as clinically indicated. Recommend supportive care and hydration.</p>
                                                                </div>
                                                                <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 23 Apr 2025, 12:00</p>
                                                            </li>


                                                        </ul>
                                                    </div>
                                                </div>
                                               </div>
                                               <div class="BottomFooter">
                                                <a href="#" class="btn SaveBtn">Save & Update</a>
                                                <a href="#" class="btn cancelBtn">Cancel</a>
                                            </div>
                                           </div>
                                     </form>
                                    </div> -->
                                    <div class="tab-pane  text-muted" id="Nav-Prescriptions" role="tabpanel">
                                    <form action="#">
                                        <div class="innerContainer">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="TopHeadSection">
                                                        <h4>Prescription</h4>
                                                        <p>List the prescribed medications, dosages, and instructions for patient use.</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="#">Select Phramacy</label>
                                                                <select class="select2 form-control"
                                                                    data-placeholder="Select Phramacy">
                                                                    <option value=""></option>
                                                                    <option value="Mild">HealthFirst Pharmacy</option>
                                                                    <option value="Moderate">MediTrust Pharmacy</option>
                                                                    <option value="Severe">CarePoint Pharmacy</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">Medication Name </label>
                                                        <input type="text" class="form-control" placeholder="Paracetamol">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">Dosage </label>
                                                        <input type="text" class="form-control" placeholder="(e.g., 500mg, 1g, 2ml)">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">Route</label>
                                                        <input type="text" class="form-control" placeholder="(e.g., Oral/IV)">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">Frequency</label>
                                                        <input type="text" class="form-control" placeholder="(e.g., 2 times/day)">
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">Start Date</label>
                                                        <input type="text" class="form-control customdataPicker" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">End Date</label>
                                                        <input type="text" class="form-control customdataPicker" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">Note</label>
                                                        <input type="text" class="form-control" placeholder="Additional instructions or observations related to the prescription.">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-end">
                                                    <a href="#" class="AddMoreBtn"><iconify-icon icon="basil:add-outline"></iconify-icon> Add More</a>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="prescriptionMain">
                                                        <h6 class="VitalInfoTitle mt-0">Prescribed Medicantions</h6>
                                                    <div class="prescriptionWrapper">
                                                    <table class="table table-bordered">
                                                            <tr>
                                                                <th>Medication Name</th>
                                                                <th>Dosage</th>
                                                                <th>Route</th>
                                                                <th>Frequency</th>
                                                                <th>Start Date</th>
                                                                <th>End Date</th>
                                                                <th>Note</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tr>
                                                                <td>Paracetamol</td>
                                                                <td>500mg</td>
                                                                <td>Oral</td>
                                                                <td>2 times/day</td>
                                                                <td>2025-04-01</td>
                                                                <td>2025-04-07</td>
                                                                <td>Take after meals</td>
                                                                <td>
                                                                    <a href="#" class="editMedi"><iconify-icon icon="fluent:edit-16-regular"></iconify-icon></a>
                                                                    <a href="#" class="removeMedi"><iconify-icon icon="tabler:trash"></iconify-icon></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Aspirin</td>
                                                                <td>300mg</td>
                                                                <td>IV</td>
                                                                <td>Once a day</td>
                                                                <td>2025-04-02</td>
                                                                <td>2025-04-05</td>
                                                                <td>For pain relief</td>
                                                                <td>
                                                                <a href="#" class="editMedi"><iconify-icon icon="fluent:edit-16-regular"></iconify-icon></a>
                                                                <a href="#" class="removeMedi"><iconify-icon icon="tabler:trash"></iconify-icon></a>
                                                                </td>
                                                            </tr>

                                                        </table>
                                                    </div>

                                                    </div>
                                                </div>
                                               </div>
                                               <div class="BottomFooter">
                                               <a href="#" class="btn SaveBtn">
                                                <span class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
                                                Save & Send
                                                </a>
                                                <a href="#" class="btn cancelBtn">Cancel</a>
                                            </div>
                                           </div>
                                     </form>
                                    </div>
                                    <div class="tab-pane  text-muted" id="Nav-Doctor-Notes" role="tabpanel">
                                    <form action="#">
                                        <div class="innerContainer">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="TopHeadSection">
                                                        <h4>Doctor Notes</h4>
                                                        <p>Provide a summary of the patient's visit, including assessments, observations, and recommended follow-up care.</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">Note Type</label>
                                                        <select class="select2 form-control"
                                                            data-placeholder="Note Type">
                                                            <option value=""></option>
                                                            <option value="General">General</option>
                                                            <option value="Urgent">Urgent</option>
                                                            <option value="Discharge">Discharge</option>
                                                            <option value="Post-op">Post-op</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="form-group">
                                                        <label for="#">Title</label>
                                                        <input type="text" class="form-control" placeholder="Enter Title here..">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="#">Description</label>
                                                        <textarea name="" id="" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-end">
                                                    <a href="#" class="AddMoreBtn"><iconify-icon icon="basil:add-outline"></iconify-icon> Add More</a>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="lastUpdate">
                                                        <h6 class="VitalInfoTitle">Recent Updated Notes</h6>
                                                        <ul class="VitalsInfoList">
                                                            <li>
                                                                <div class="ProgressNotes">
                                                                    <h6 class="progressNoteTitle">Doctor's Note - Day 3 <span class="SeverityOP">(Post-Op)</span></h6>
                                                                    <p>Patient is responsive and alert, experiencing mild discomfort at the surgical site (3/10). Vital signs remain stable with no indication of infection. Wound site appears clean and dry. Continue antibiotics and promote early movement. Follow-up labs are planned for tomorrow.</p>
                                                                </div>
                                                                <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                                                            </li>

                                                            <li>
                                                                <div class="ProgressNotes">
                                                                    <h6 class="progressNoteTitle">Doctor's Note - <span class="SeverityOP">General</span></h6>
                                                                    <p>Patient resting comfortably with no new complaints overnight. Blood pressure slightly elevated at 142/92, but other vitals are normal. Appetite has improved, and breakfast was well tolerated. Plan to monitor BP closely and adjust antihypertensive medication as needed.</p>
                                                                </div>
                                                                <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                               </div>
                                               <div class="BottomFooter">
                                               <a href="#" class="btn SaveBtn">
                                                <span class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
                                                Save & Update
                                                </a>
                                                <a href="#" class="btn cancelBtn">Cancel</a>
                                            </div>
                                           </div>
                                     </form>
                                    </div>
                                    <div class="tab-pane  text-muted" id="Nav-Lab-Reports" role="tabpanel">
                                    <form action="#">
                                        <div class="innerContainer">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="TopHeadSection">
                                                        <h4>All Reports</h4>
                                                        <p>Upload, manage, and view all reports for the patient in one place.</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">Report Type</label>
                                                        <select class="select2 form-control"
                                                            data-placeholder="Report Type">
                                                            <option value=""></option>
                                                            <option value="Blood Reports">Blood Reports</option>
                                                            <option value="Imaging Reports">Imaging Reports</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="form-group">
                                                        <label for="#">Report Title</label>
                                                        <input type="text" class="form-control" placeholder="Enter Title here..">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Upload Report</label>
                                                        <input name="file1" type="file" class="dropify" data-height="100" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-end">
                                                    <a href="#" class="AddMoreBtn"><iconify-icon icon="basil:add-outline"></iconify-icon> Add More</a>
                                                </div>
                                                <div class="col-lg-12">
                                                <div class="prescriptionMain">
                                                        <h6 class="VitalInfoTitle mt-0">Recent Uploaded Reports</h6>
                                                    <div class="prescriptionWrapper">
                                                    <table class="table table-bordered">
                                                            <tr>
                                                                <th>Report Title</th>
                                                                <th>Upload Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tr>
                                                                <td>Sugar Test Report</td>
                                                                <td>23/04/2025 09:00 AM</td>

                                                                <td>
                                                                <a class="editMedi" href="assets/img/newimages/dummy.pdf" target="_blank">
                                                                <iconify-icon icon="iconamoon:eye"></iconify-icon>
                                                                </a>
                                                                <a class="editMedi" href="assets/img/newimages/dummy.pdf" download>
                                                                <iconify-icon icon="material-symbols:download"></iconify-icon>
                                                                </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>CBC Test Report</td>
                                                                <td>23/04/2025 09:00 AM</td>

                                                                <td>
                                                                <a class="editMedi" href="assets/img/newimages/dummy.pdf" target="_blank">
                                                                <iconify-icon icon="iconamoon:eye"></iconify-icon>
                                                                </a>
                                                                <a class="editMedi" href="assets/img/newimages/dummy.pdf" download>
                                                                <iconify-icon icon="material-symbols:download"></iconify-icon>
                                                                </a>
                                                                </td>
                                                            </tr>

                                                        </table>
                                                    </div>

                                                    </div>
                                                </div>
                                               </div>
                                               <div class="BottomFooter">
                                               <a href="#" class="btn SaveBtn">
                                                <span class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
                                                Save & Update
                                                </a>
                                                <a href="#" class="btn cancelBtn">Cancel</a>
                                            </div>
                                           </div>
                                     </form>
                                    </div>
                                    <!-- <div class="tab-pane  text-muted" id="Nav-Imaging-Order" role="tabpanel">
                                        Imaging Order
                                    </div> -->
                                    <div class="tab-pane  text-muted" id="Nav-Nursing-Notes" role="tabpanel">
                                    <form action="#">
                                        <div class="innerContainer">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="TopHeadSection">
                                                        <h4>Nursing Notes</h4>
                                                        <p>Document patient care observations, treatments, and nursing interventions in real-time</p>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="#">Title</label>
                                                        <input type="text" class="form-control" placeholder="Enter Title here..">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="#">Description</label>
                                                        <textarea name="" id="" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-end">
                                                    <a href="#" class="AddMoreBtn"><iconify-icon icon="basil:add-outline"></iconify-icon> Add More</a>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="lastUpdate">
                                                        <h6 class="VitalInfoTitle">Recent Updated Notes</h6>
                                                        <ul class="VitalsInfoList">
                                                            <li>
                                                                <div class="ProgressNotes">
                                                                    <h6 class="progressNoteTitle">Diet Recommend </h6>
                                                                    <p>Patient is responsive and alert, experiencing mild discomfort at the surgical site (3/10). Vital signs remain stable with no indication of infection. Wound site appears clean and dry. Continue antibiotics and promote early movement. Follow-up labs are planned for tomorrow.</p>
                                                                </div>
                                                                <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                                                            </li>

                                                            <li>
                                                                <div class="ProgressNotes">
                                                                    <h6 class="progressNoteTitle">Precaution</h6>
                                                                    <p>Patient resting comfortably with no new complaints overnight. Blood pressure slightly elevated at 142/92, but other vitals are normal. Appetite has improved, and breakfast was well tolerated. Plan to monitor BP closely and adjust antihypertensive medication as needed.</p>
                                                                </div>
                                                                <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                               </div>
                                               <div class="BottomFooter">
                                               <a href="#" class="btn SaveBtn">
                                                <span class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
                                                Save & Update
                                                </a>
                                                <a href="#" class="btn cancelBtn">Cancel</a>
                                            </div>
                                           </div>
                                     </form>
                                    </div>
                                    <!-- <div class="tab-pane  text-muted" id="Nav-Chronic-Illnesses" role="tabpanel">
                                        Nav-Chronic-Illnesses
                                    </div> -->
                                    <div class="tab-pane  text-muted" id="Nav-Past-Surgeries" role="tabpanel">
                                        <form action="#">
                                            <div class="innerContainer">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="TopHeadSection">
                                                            <h4>Past Surgeries</h4>
                                                            <p>Review the patient's history of previous surgical procedures and outcomes.</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="#">Surgery Type</label>
                                                            <input type="text" class="form-control" placeholder="Surgery Type">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label for="#">Hospital/Clinic</label>
                                                            <input type="text" class="form-control" placeholder="Hospital/Clinic">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="#">Date</label>
                                                            <input type="text" class="form-control customdataPicker" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="#">Outcome / Notes</label>
                                                            <textarea name="" id="" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 text-end">
                                                    <a href="#" class="AddMoreBtn"><iconify-icon icon="basil:add-outline"></iconify-icon> Add More</a>
                                                </div>
                                                    <div class="col-lg-12">
                                                        <div class="lastUpdate">
                                                            <h6 class="VitalInfoTitle mt-2">Recent Updated Surgeries History</h6>
                                                            <ul class="VitalsInfoList">
                                                            <li>
                                                                <div class="ProgressNotes">
                                                                    <h6 class="progressNoteTitle">Laparoscopic Appendectomy <span class="SeverityOP">22/02/2024</span></h6>
                                                                   <p class="hospital">CityCare General Hospital</p>
                                                                   <p>Outcome / Notes: Procedure was successful with no post-operative complications. Patient discharged on Day 2 in stable condition. Advised routine follow-up in 2 weeks.</p>
                                                                </div>
                                                                <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                                                            </li>


                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="BottomFooter">
                                                <a href="#" class="btn SaveBtn">
                                                <span class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
                                                Save & Update
                                                </a>
                                                    <a href="#" class="btn cancelBtn">Cancel</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane  text-muted" id="Nav-Allergies" role="tabpanel">
                                    <form action="#">
                                            <div class="innerContainer">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="TopHeadSection">
                                                            <h4>Allergies</h4>
                                                            <p>Record and review the patient's known allergies to medications, foods, or other substances.</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="#">Allergy Type</label>
                                                            <input type="text" class="form-control" placeholder="Allergy Type">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">Severity</label>
                                                        <select class="select2 form-control"
                                                            data-placeholder="Severity">
                                                            <option value=""></option>
                                                            <option value="Mild">Mild</option>
                                                            <option value="Moderate">Moderate</option>
                                                            <option value="Severe">Severe</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="#">Date First Observed</label>
                                                            <input type="text" class="form-control customdataPicker" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="#">Allergen From <span class="infoPara">(Type an allergen and press Enter to add multiple allergy entries)</span></label>
                                                            <div class="diagnosis-wrapper">
                                                                <input type="text" class="diagnosis-input form-control" placeholder="(e.g., Penicillin)">
                                                                <div class="diagnosis-tags"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="#">Reaction</label>
                                                            <textarea name="" id="" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 text-end">
                                                    <a href="#" class="AddMoreBtn"><iconify-icon icon="basil:add-outline"></iconify-icon> Add More</a>
                                                </div>

                                                    <div class="col-lg-12">
                                                        <div class="lastUpdate">
                                                            <h6 class="VitalInfoTitle mt-2">Recent Updated Allergies</h6>
                                                            <ul class="VitalsInfoList">
                                                            <li>
                                                                <div class="ProgressNotes">
                                                                    <h6 class="progressNoteTitle">Food <span class="SeverityOP">(Mild), 20/01/2023</span></h6>
                                                                    <p class="diagnosis_text"> Mango <span class="sepration">|</span> Milk <span class="sepration">|</span> Curd <span class="sepration">|</span> Chesse <span class="sepration"></p>
                                                                    <p>Patient allergic form these thing and symptoms seen like Rash, Anaphylaxis and not taking the breath properly</p>
                                                                </div>
                                                                <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                                                            </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="BottomFooter">
                                                <a href="#" class="btn SaveBtn">
                                                <span class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
                                                Save & Update
                                                </a>
                                                    <a href="#" class="btn cancelBtn">Cancel</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane  text-muted" id="Nav-Past-Medications" role="tabpanel">
                                    <form action="#">
                                        <div class="innerContainer">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="TopHeadSection">
                                                        <h4>Past Medications</h4>
                                                        <p>View the list of medications previously prescribed and administered to the patient.</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">Medication Name </label>
                                                        <input type="text" class="form-control" placeholder="Paracetamol">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">Dosage </label>
                                                        <input type="text" class="form-control" placeholder="(e.g., 500mg, 1g, 2ml)">
                                                    </div>
                                                </div>


                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">Start Date</label>
                                                        <input type="text" class="form-control customdataPicker" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">End Date</label>
                                                        <input type="text" class="form-control customdataPicker" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="#">Reason for Use</label>
                                                        <input type="text" class="form-control" placeholder="Enter Reason">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-end">
                                                    <a href="#" class="AddMoreBtn"><iconify-icon icon="basil:add-outline"></iconify-icon> Add More</a>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="prescriptionMain">
                                                        <h6 class="VitalInfoTitle mt-0">Prescribed Medicantions</h6>
                                                    <div class="prescriptionWrapper">
                                                    <table class="table table-bordered">
                                                            <tr>
                                                                <th>Medication Name</th>
                                                                <th>Dosage</th>
                                                                <th>Start Date</th>
                                                                <th>End Date</th>
                                                                <th>Reason for Use</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tr>
                                                                <td>Paracetamol</td>
                                                                <td>500mg</td>
                                                                <td>2025-04-01</td>
                                                                <td>2025-04-07</td>
                                                                <td>For Fever and Pain</td>
                                                                <td>
                                                                    <a href="#" class="editMedi"><iconify-icon icon="fluent:edit-16-regular"></iconify-icon></a>
                                                                    <a href="#" class="removeMedi"><iconify-icon icon="tabler:trash"></iconify-icon></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Aspirin</td>
                                                                <td>300mg</td>
                                                                <td>2025-04-02</td>
                                                                <td>2025-04-05</td>
                                                                <td>For pain relief</td>
                                                                <td>
                                                                <a href="#" class="editMedi"><iconify-icon icon="fluent:edit-16-regular"></iconify-icon></a>
                                                                <a href="#" class="removeMedi"><iconify-icon icon="tabler:trash"></iconify-icon></a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>

                                                    </div>
                                                </div>
                                               </div>
                                               <div class="BottomFooter">
                                               <a href="#" class="btn SaveBtn">
                                                <span class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
                                                Save & Update
                                                </a>
                                                <a href="#" class="btn cancelBtn">Cancel</a>
                                            </div>
                                           </div>
                                     </form>
                                    </div>
                                    <!-- <div class="tab-pane  text-muted" id="Nav-Vaccination-History" role="tabpanel">
                                        Vaccination History
                                    </div> -->
                                </div>

                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>

<!-- Modal Structure -->

<!---------------------------------------------
  View Modal's For Patient Record Start Here
---------------------------------------------->

<!-- Vitals View Modal Start Here -->
<div class="RightSideMOffcanvas">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="VitalView" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel"> <iconify-icon icon="material-symbols:vital-signs-rounded"></iconify-icon> Vitals Monitoring</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body PatientRecordView">
        <div class="row">
        <div class="col-lg-12">
            <div class="lastUpdate">
                <h6 class="VitalInfoTitle">All Updated Vitals</h6>
                <ul class="VitalsInfoList">
                    <li>
                        <div class="mainInfoVitalsWrapper">

                            <div class="vitalInfo">
                                <h6 class="labelInfo">Temperature</h6>
                                    <h6>98.0 <iconify-icon icon="tabler:temperature-fahrenheit"></iconify-icon></h6>
                            </div>
                            <div class="vitalInfo">
                                <h6 class="labelInfo">Blood Pressure</h6>
                                    <h6>120/80 <span class="unitVital">mmHg</span></h6>
                            </div>
                            <div class="vitalInfo">
                                <h6 class="labelInfo">Pulse</h6>
                                    <h6>72 <span class="unitVital">bpm</span></h6>
                            </div>
                            <div class="vitalInfo">
                                <h6 class="labelInfo">SpO2</h6>
                                    <h6>98%</h6>
                            </div>

                        </div>
                        <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                    </li>
                    <li>
                        <div class="mainInfoVitalsWrapper">

                            <div class="vitalInfo">
                                <h6 class="labelInfo">Temperature</h6>
                                    <h6>98.0 <iconify-icon icon="tabler:temperature-fahrenheit"></iconify-icon></h6>
                            </div>
                            <div class="vitalInfo">
                                <h6 class="labelInfo">Blood Pressure</h6>
                                    <h6>120/80 <span class="unitVital">mmHg</span></h6>
                            </div>
                            <div class="vitalInfo">
                                <h6 class="labelInfo">Pulse</h6>
                                    <h6>72 <span class="unitVital">bpm</span></h6>
                            </div>
                            <div class="vitalInfo">
                                <h6 class="labelInfo">SpO2</h6>
                                    <h6>98%</h6>
                            </div>

                        </div>
                        <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 21 Oct 2025, 12:00</p>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </div>
    <div class="offcanvas-footer">
       <div class="row">
       <div class="col-lg-12 text-end">
            <a href="#"  data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn addFieldBtn" data-tab="Nav-Vitals-monitoring" ><iconify-icon icon="basil:add-outline"></iconify-icon> Add Vitals</a>
        </div>
       </div>
    </div>
    </div>
</div>
<!-- Vitals View Modal Start Here -->

<!--Progress Note View Modal Start Here -->
<div class="RightSideMOffcanvas">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="ProgressNoteView" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel"> <iconify-icon icon="tabler:progress"></iconify-icon> Progress Note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body PatientRecordView">
        <div class="row">
        <div class="col-lg-12">
                <div class="lastUpdate">
                    <h6 class="VitalInfoTitle">All Updated Notes</h6>
                    <ul class="VitalsInfoList">
                        <li>
                            <div class="ProgressNotes">
                                <h6 class="progressNoteTitle">Progress Note - Day 3 Post-Op</h6>
                                <p>Patient is alert and oriented. Reports mild pain at the surgical site, rated 3/10. Vitals stable with no signs of infection. Wound site clean and dry. Plan to continue current antibiotics and encourage early ambulation. Follow-up labs scheduled for tomorrow.</p>
                            </div>
                            <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                        </li>

                        <li>
                            <div class="ProgressNotes">
                                <h6 class="progressNoteTitle">Progress Note - Morning Rounds</h6>
                                <p>Patient resting comfortably, no new complaints overnight. Blood pressure slightly elevated at 142/92, otherwise vitals within normal limits. Appetite improved, tolerated breakfast well. Plan to monitor BP closely and adjust antihypertensive medication if needed.</p>
                            </div>
                            <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-footer">
       <div class="row">
       <div class="col-lg-12 text-end">
            <a href="#"  data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn addFieldBtn" data-tab="Nav-Progress-Notes" ><iconify-icon icon="basil:add-outline"></iconify-icon> Add Progress Note</a>
        </div>
       </div>
    </div>
    </div>
</div>
<!--Progress Note View Modal End Here -->

<!--Diagnosis View Modal Start Here -->
<div class="RightSideMOffcanvas">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="DiagnosisView" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel"> <iconify-icon icon="solar:health-linear"></iconify-icon> Diagnosis</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body PatientRecordView">
        <div class="row">
        <div class="col-lg-12">
                <div class="lastUpdate">
                    <h6 class="VitalInfoTitle">Recent Updated Diagnosis</h6>
                    <ul class="VitalsInfoList">
                        <li>
                            <div class="ProgressNotes">
                                <h6 class="progressNoteTitle"><iconify-icon icon="formkit:radio"></iconify-icon> Primary, <span class="SeverityOP">(Mild)</span></h6>
                                <p class="diagnosis_text"> Thyroid nodule <span class="sepration">|</span> Multi-Nodular Goitre <span class="sepration">|</span> Thyroid Cyst <span class="sepration">|</span> Euothyroid <span class="sepration">|</span> Hypothyroidism <span class="sepration">|</span> Thyrotoxicosis <span class="sepration">|</span> Grave’s Disease</p>
                                <p>Patient resting comfortably, no new complaints overnight. Blood pressure slightly elevated at 142/92, otherwise vitals within normal limits.</p>
                            </div>
                            <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                        </li>

                        <li>
                            <div class="ProgressNotes">
                                <h6 class="progressNoteTitle"><iconify-icon icon="formkit:radio"></iconify-icon> Secondary, <span class="SeverityOP">(Moderate)</span></h6>
                                <p class="diagnosis_text"> Thyroid nodule <span class="sepration">|</span> Multi-Nodular Goitre <span class="sepration">|</span> Thyroid Cyst <span class="sepration">|</span> Euothyroid <span class="sepration">|</span> Hypothyroidism <span class="sepration">|</span> Thyrotoxicosis <span class="sepration">|</span> Grave’s Disease</p>
                                <p>Patient resting comfortably, no new complaints overnight. Blood pressure slightly elevated at 142/92, otherwise vitals within normal limits.</p>
                            </div>
                            <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 24 Oct 2025, 12:00</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-footer">
       <div class="row">
       <div class="col-lg-12 text-end">
            <a href="#"  data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn addFieldBtn" data-tab="Nav-Diagnosis" ><iconify-icon icon="basil:add-outline"></iconify-icon> Add Diagnosis</a>
        </div>
       </div>
    </div>
    </div>
</div>
<!--Diagnosis View Modal End Here -->


<!--Prescriptions View Modal Start Here -->
<div class="RightSideMOffcanvas">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="PrescriptionView" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel"> <iconify-icon icon="lets-icons:pils"></iconify-icon> Prescriptions</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body PatientRecordView">
        <div class="row">
        <div class="col-lg-12">
                <div class="lastUpdate">
                    <h6 class="VitalInfoTitle">Recent Prescribed Medications</h6>
                    <div class="accordions-items-seperate" id="accordionSpacingExample">
										<div class="accordion-item">
											<h2 class="accordion-header" id="headingSpacingOne">
												<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#SpacingOne" aria-expanded="true" aria-controls="SpacingOne">
													<div class="PresCriptIOnDateTime">
                                                        <h6>Prescription 24 Apr, 2025 03:39 PM <span class="pharmacyName">Green Cross Pharmacy</span></h6>

                                                    </div>
												</button>
											</h2>
											<div id="SpacingOne" class="accordion-collapse collapse show" aria-labelledby="headingSpacingOne" data-bs-parent="#accordionSpacingExample">
												<div class="accordion-body p-2">
                                                    <ul class="VitalsInfoList">
                                                        <li>
                                                            <div class="MedicationPrescribed">
                                                                <h6 class="MedicationName">Paracetamol-500mg <span class="SeverityOP">Oral, 2 times/day</span></h6>
                                                                <p class="MedicationNote">Take after meals</p>
                                                                <div class="bottomFooterMedication">
                                                                    <span class="SeverityOP MedicationTakeDate"><iconify-icon icon="solar:calendar-linear"></iconify-icon> 1 Apr – 7 May 2025</span>
                                                                    <div class="ActionBox">
                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn editMedi" data-tab="Nav-Prescriptions"><iconify-icon icon="fluent:edit-16-regular"></iconify-icon></a>
                                                                        <a href="#" class="Discontine" style="color:#ff0000;"  data-bs-toggle="tooltip" aria-label="Discontinue" data-bs-original-title="Discontinue"><iconify-icon icon="tabler:ban"></iconify-icon></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="MedicationPrescribed">
                                                                <h6 class="MedicationName">Amoxicillin-250mg <span class="SeverityOP">Oral, 3 times/day</span></h6>
                                                                <p class="MedicationNote">Take with water, 1 hour before meals</p>
                                                                <div class="bottomFooterMedication">
                                                                    <span class="SeverityOP MedicationTakeDate"><iconify-icon icon="solar:calendar-linear"></iconify-icon> 5 Apr – 12 Apr 2025</span>
                                                                    <div class="ActionBox">
                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn editMedi" data-tab="Nav-Prescriptions"><iconify-icon icon="fluent:edit-16-regular"></iconify-icon></a>
                                                                        <a href="#" class="Discontine" style="color:#ff0000;"  data-bs-toggle="tooltip" aria-label="Discontinue" data-bs-original-title="Discontinue"><iconify-icon icon="tabler:ban"></iconify-icon></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="MedicationPrescribed">
                                                                <h6 class="MedicationName">Ibuprofen-400mg <span class="SeverityOP">Oral, as needed</span></h6>
                                                                <p class="MedicationNote">Take only if experiencing pain</p>
                                                                <div class="bottomFooterMedication">
                                                                    <span class="SeverityOP MedicationTakeDate"><iconify-icon icon="solar:calendar-linear"></iconify-icon> 1 Apr – 10 Apr 2025</span>
                                                                    <div class="ActionBox">
                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn editMedi" data-tab="Nav-Prescriptions"><iconify-icon icon="fluent:edit-16-regular"></iconify-icon></a>
                                                                        <a href="#" class="Discontine" style="color:#ff0000;"  data-bs-toggle="tooltip" aria-label="Discontinue" data-bs-original-title="Discontinue"><iconify-icon icon="tabler:ban"></iconify-icon></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="MedicationPrescribed">
                                                                <h6 class="MedicationName">Metformin-500mg <span class="SeverityOP">Oral, 2 times/day</span></h6>
                                                                <p class="MedicationNote">Take with breakfast and dinner</p>
                                                                <div class="bottomFooterMedication">
                                                                    <span class="SeverityOP MedicationTakeDate"><iconify-icon icon="solar:calendar-linear"></iconify-icon> 10 Mar – 10 Jun 2025</span>
                                                                    <div class="ActionBox">
                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn editMedi" data-tab="Nav-Prescriptions"><iconify-icon icon="fluent:edit-16-regular"></iconify-icon></a>
                                                                        <a href="#" class="Discontine" style="color:#ff0000;"  data-bs-toggle="tooltip" aria-label="Discontinue" data-bs-original-title="Discontinue"><iconify-icon icon="tabler:ban"></iconify-icon></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>


                                                        </ul>
												</div>
											</div>
										</div>
                                        <h6 class="VitalInfoTitle mt-3">Prescribed Medication History</h6>
										<div class="accordion-item">
											<h2 class="accordion-header" id="headingSpacingTwo">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#SpacingTwo" aria-expanded="false" aria-controls="SpacingTwo">
                                                 <h6>Prescription 22 March, 2025 03:39 PM <span class="pharmacyName">Green Cross Pharmacy</span></h6>
												</button>
											</h2>
											<div id="SpacingTwo" class="accordion-collapse collapse" aria-labelledby="headingSpacingTwo" data-bs-parent="#accordionSpacingExample">
												<div class="accordion-body">
												<ul class="VitalsInfoList">
                                                        <li>
                                                            <div class="MedicationPrescribed">
                                                                <h6 class="MedicationName">Paracetamol-500mg <span class="SeverityOP">Oral, 2 times/day</span></h6>
                                                                <p class="MedicationNote">Take after meals</p>
                                                                <div class="bottomFooterMedication">
                                                                    <span class="SeverityOP MedicationTakeDate"><iconify-icon icon="solar:calendar-linear"></iconify-icon> 1 Apr – 7 May 2025</span>
                                                                    <div class="ActionBox">
                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn editMedi" data-tab="Nav-Prescriptions"><iconify-icon icon="fluent:edit-16-regular"></iconify-icon></a>
                                                                        <a href="#" class="Discontine" style="color:#ff0000;"  data-bs-toggle="tooltip" aria-label="Discontinue" data-bs-original-title="Discontinue"><iconify-icon icon="tabler:ban"></iconify-icon></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="MedicationPrescribed">
                                                                <h6 class="MedicationName">Amoxicillin-250mg <span class="SeverityOP">Oral, 3 times/day</span></h6>
                                                                <p class="MedicationNote">Take with water, 1 hour before meals</p>
                                                                <div class="bottomFooterMedication">
                                                                    <span class="SeverityOP MedicationTakeDate"><iconify-icon icon="solar:calendar-linear"></iconify-icon> 5 Apr – 12 Apr 2025</span>
                                                                    <div class="ActionBox">
                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn editMedi" data-tab="Nav-Prescriptions"><iconify-icon icon="fluent:edit-16-regular"></iconify-icon></a>
                                                                        <a href="#" class="Discontine" style="color:#ff0000;"  data-bs-toggle="tooltip" aria-label="Discontinue" data-bs-original-title="Discontinue"><iconify-icon icon="tabler:ban"></iconify-icon></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="MedicationPrescribed">
                                                                <h6 class="MedicationName">Ibuprofen-400mg <span class="SeverityOP">Oral, as needed</span></h6>
                                                                <p class="MedicationNote">Take only if experiencing pain</p>
                                                                <div class="bottomFooterMedication">
                                                                    <span class="SeverityOP MedicationTakeDate"><iconify-icon icon="solar:calendar-linear"></iconify-icon> 1 Apr – 10 Apr 2025</span>
                                                                    <div class="ActionBox">
                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn editMedi" data-tab="Nav-Prescriptions"><iconify-icon icon="fluent:edit-16-regular"></iconify-icon></a>
                                                                        <a href="#" class="Discontine" style="color:#ff0000;"  data-bs-toggle="tooltip" aria-label="Discontinue" data-bs-original-title="Discontinue"><iconify-icon icon="tabler:ban"></iconify-icon></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="MedicationPrescribed">
                                                                <h6 class="MedicationName">Metformin-500mg <span class="SeverityOP">Oral, 2 times/day</span></h6>
                                                                <p class="MedicationNote">Take with breakfast and dinner</p>
                                                                <div class="bottomFooterMedication">
                                                                    <span class="SeverityOP MedicationTakeDate"><iconify-icon icon="solar:calendar-linear"></iconify-icon> 10 Mar – 10 Jun 2025</span>
                                                                    <div class="ActionBox">
                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn editMedi" data-tab="Nav-Prescriptions"><iconify-icon icon="fluent:edit-16-regular"></iconify-icon></a>
                                                                        <a href="#" class="Discontine" style="color:#ff0000;"  data-bs-toggle="tooltip" aria-label="Discontinue" data-bs-original-title="Discontinue"><iconify-icon icon="tabler:ban"></iconify-icon></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>


                                                        </ul>
												</div>
											</div>
										</div>

									</div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-footer">
       <div class="row">
       <div class="col-lg-12 text-end">
            <a href="#"  data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn addFieldBtn" data-tab="Nav-Prescriptions" ><iconify-icon icon="basil:add-outline"></iconify-icon> Add Medication</a>
        </div>
       </div>
    </div>
    </div>
</div>
<!--Prescriptions View Modal End Here -->

<!--Doctor Notes View Modal Start Here -->
<div class="RightSideMOffcanvas">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="DoctorNotesView" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel"> <iconify-icon icon="healthicons:doctor-male-outline"></iconify-icon> Doctor Notes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body PatientRecordView">
        <div class="row">
        <div class="col-lg-12">
                <div class="lastUpdate">
                    <h6 class="VitalInfoTitle">Recent Updated Notes</h6>
                    <ul class="VitalsInfoList">
                        <li>
                            <div class="ProgressNotes">
                                <h6 class="progressNoteTitle">Doctor's Note - Day 3 <span class="SeverityOP">(Post-Op)</span></h6>
                                <p>Patient is responsive and alert, experiencing mild discomfort at the surgical site (3/10). Vital signs remain stable with no indication of infection. Wound site appears clean and dry. Continue antibiotics and promote early movement. Follow-up labs are planned for tomorrow.</p>
                            </div>
                            <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                        </li>

                        <li>
                            <div class="ProgressNotes">
                                <h6 class="progressNoteTitle">Doctor's Note - <span class="SeverityOP">General</span></h6>
                                <p>Patient resting comfortably with no new complaints overnight. Blood pressure slightly elevated at 142/92, but other vitals are normal. Appetite has improved, and breakfast was well tolerated. Plan to monitor BP closely and adjust antihypertensive medication as needed.</p>
                            </div>
                            <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-footer">
       <div class="row">
       <div class="col-lg-12 text-end">
            <a href="#"  data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn addFieldBtn" data-tab="Nav-Doctor-Notes" ><iconify-icon icon="basil:add-outline"></iconify-icon> Add Doctor Note</a>
        </div>
       </div>
    </div>
    </div>
</div>
<!--Doctor Notes View Modal End Here -->

<!--All Reports View Modal Start Here -->
<div class="RightSideMOffcanvas">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="AllReportsView" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel"> <iconify-icon icon="iconoir:reports"></iconify-icon> All Reports</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body PatientRecordView">
        <div class="row">
        <div class="col-lg-12">
                <div class="lastUpdate">
                    <h6 class="VitalInfoTitle">Recent Updated Notes</h6>
                    <ul class="dcoumentsList">
                            <li>
                                <div class="IconFile">
                                    <iconify-icon icon="pepicons-print:file"></iconify-icon>
                                    <h6>Medical Record <span class="documentDateTime">20/04/25 02:00 PM</span></h6>
                                </div>
                                <div class="actionDoc">
                                    <a href="assets/img/newimages/dummy.pdf" target="_blank">
                                        <iconify-icon icon="lets-icons:view-light"></iconify-icon>
                                    </a>
                                    <a href="assets/img/newimages/dummy.pdf" download="">
                                        <iconify-icon icon="material-symbols-light:download"></iconify-icon>
                                    </a>
                                </div>


                            </li>
                            <li>
                                <div class="IconFile">
                                    <iconify-icon icon="pepicons-print:file"></iconify-icon>
                                    <h6>Consent Form <span class="documentDateTime">20/04/25 02:00 PM</span></h6>
                                </div>
                                <div class="actionDoc">
                                    <a href="assets/img/newimages/dummy.pdf" target="_blank">
                                        <iconify-icon icon="lets-icons:view-light"></iconify-icon>
                                    </a>
                                    <a href="assets/img/newimages/dummy.pdf" download="">
                                        <iconify-icon icon="material-symbols-light:download"></iconify-icon>
                                    </a>
                                </div>


                            </li>
                            <li>
                                <div class="IconFile">
                                    <iconify-icon icon="pepicons-print:file"></iconify-icon>
                                    <h6>Insurance Card <span class="documentDateTime">20/04/25 02:00 PM</span></h6>
                                </div>
                                <div class="actionDoc">
                                    <a href="assets/img/newimages/dummy.pdf" target="_blank">
                                        <iconify-icon icon="lets-icons:view-light"></iconify-icon>
                                    </a>
                                    <a href="assets/img/newimages/dummy.pdf" download="">
                                        <iconify-icon icon="material-symbols-light:download"></iconify-icon>
                                    </a>
                                </div>


                            </li>
                            <li>
                                <div class="IconFile">
                                    <iconify-icon icon="pepicons-print:file"></iconify-icon>
                                    <h6>ID Proof <span class="documentDateTime">20/04/25 02:00 PM</span></h6>
                                </div>
                                <div class="actionDoc">
                                    <a href="assets/img/newimages/dummy.pdf" target="_blank">
                                        <iconify-icon icon="lets-icons:view-light"></iconify-icon>
                                    </a>
                                    <a href="assets/img/newimages/dummy.pdf" download="">
                                        <iconify-icon icon="material-symbols-light:download"></iconify-icon>
                                    </a>
                                </div>
                            </li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-footer">
       <div class="row">
       <div class="col-lg-12 text-end">
            <a href="#"  data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn addFieldBtn" data-tab="Nav-Lab-Reports" ><iconify-icon icon="basil:add-outline"></iconify-icon> Add Report</a>
        </div>
       </div>
    </div>
    </div>
</div>
<!--All Reports View Modal End Here -->

<!--Nursing Notes View Modal Start Here -->
<div class="RightSideMOffcanvas">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="NursingNotesView" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel"> <iconify-icon icon="streamline:nurse-hat"></iconify-icon> Nursing Notes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body PatientRecordView">
        <div class="row">
        <div class="col-lg-12">
                <div class="lastUpdate">
                    <h6 class="VitalInfoTitle">All Updated Notes</h6>
                    <ul class="VitalsInfoList">
                        <li>
                            <div class="ProgressNotes">
                                <h6 class="progressNoteTitle">Diet Recommend </h6>
                                <p>Patient is responsive and alert, experiencing mild discomfort at the surgical site (3/10). Vital signs remain stable with no indication of infection. Wound site appears clean and dry. Continue antibiotics and promote early movement. Follow-up labs are planned for tomorrow.</p>
                            </div>
                            <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                        </li>

                        <li>
                            <div class="ProgressNotes">
                                <h6 class="progressNoteTitle">Precaution</h6>
                                <p>Patient resting comfortably with no new complaints overnight. Blood pressure slightly elevated at 142/92, but other vitals are normal. Appetite has improved, and breakfast was well tolerated. Plan to monitor BP closely and adjust antihypertensive medication as needed.</p>
                            </div>
                            <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-footer">
       <div class="row">
       <div class="col-lg-12 text-end">
            <a href="#"  data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn addFieldBtn" data-tab="Nav-Nursing-Notes" ><iconify-icon icon="basil:add-outline"></iconify-icon> Add Nursing Note</a>
        </div>
       </div>
    </div>
    </div>
</div>
<!--Nursing Notes View Modal End Here -->

<!--Past Surgeries View Modal Start Here -->
<div class="RightSideMOffcanvas">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="PastSurgeriesView" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel"> <iconify-icon icon="guidance:surgery"></iconify-icon> Past Surgeries</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body PatientRecordView">
        <div class="row">
           <div class="col-lg-12">
                <div class="lastUpdate">
                    <h6 class="VitalInfoTitle mt-2">All Past Surgeries History</h6>
                    <ul class="VitalsInfoList">
                    <li>
                        <div class="ProgressNotes">
                            <h6 class="progressNoteTitle">Laparoscopic Appendectomy <span class="SeverityOP">22/02/2024</span></h6>
                            <p class="hospital">CityCare General Hospital</p>
                            <p>Outcome / Notes: Procedure was successful with no post-operative complications. Patient discharged on Day 2 in stable condition. Advised routine follow-up in 2 weeks.</p>
                        </div>
                        <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                    </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-footer">
       <div class="row">
       <div class="col-lg-12 text-end">
            <a href="#"  data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn addFieldBtn" data-tab="Nav-Past-Surgeries" ><iconify-icon icon="basil:add-outline"></iconify-icon> Add Past Surgeries</a>
        </div>
       </div>
    </div>
    </div>
</div>
<!--Nursing Notes View Modal End Here -->


<!--Past Surgeries View Modal Start Here -->
<div class="RightSideMOffcanvas">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="PastSurgeriesView" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel"> <iconify-icon icon="lets-icons:pils"></iconify-icon> Past Surgeries</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body PatientRecordView">
        <div class="row">
           <div class="col-lg-12">
                <div class="lastUpdate">
                    <h6 class="VitalInfoTitle mt-2">All Past Surgeries History</h6>
                    <ul class="VitalsInfoList">
                    <li>
                        <div class="ProgressNotes">
                            <h6 class="progressNoteTitle">Laparoscopic Appendectomy <span class="SeverityOP">22/02/2024</span></h6>
                            <p class="hospital">CityCare General Hospital</p>
                            <p>Outcome / Notes: Procedure was successful with no post-operative complications. Patient discharged on Day 2 in stable condition. Advised routine follow-up in 2 weeks.</p>
                        </div>
                        <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                    </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-footer">
       <div class="row">
       <div class="col-lg-12 text-end">
            <a href="#"  data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn addFieldBtn" data-tab="Nav-Past-Surgeries" ><iconify-icon icon="basil:add-outline"></iconify-icon> Add Past Surgeries</a>
        </div>
       </div>
    </div>
    </div>
</div>
<!--Past Surgeries View Modal End Here -->

<!--Allergies View Modal Start Here -->
<div class="RightSideMOffcanvas">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="AllergiesView" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel"><iconify-icon icon="la:allergies"></iconify-icon> Allergies </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body PatientRecordView">
        <div class="row">
        <div class="col-lg-12">
                <div class="lastUpdate">
                    <h6 class="VitalInfoTitle mt-2">All Allergies</h6>
                    <ul class="VitalsInfoList">
                    <li>
                        <div class="ProgressNotes">
                            <h6 class="progressNoteTitle">Food <span class="SeverityOP">(Mild), 20/01/2023</span></h6>
                            <p class="diagnosis_text"> Mango <span class="sepration">|</span> Milk <span class="sepration">|</span> Curd <span class="sepration">|</span> Chesse <span class="sepration"></span></p>
                            <p>Patient allergic form these thing and symptoms seen like Rash, Anaphylaxis and not taking the breath properly</p>
                        </div>
                        <p class="enertedBY">Entered By | DAVID WILLIAM Sun, 22 Oct 2025, 12:00</p>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-footer">
       <div class="row">
       <div class="col-lg-12 text-end">
            <a href="#"  data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn addFieldBtn" data-tab="Nav-Allergies" ><iconify-icon icon="basil:add-outline"></iconify-icon> Add Past Surgeries</a>
        </div>
       </div>
    </div>
    </div>
</div>
<!--Allergies  View Modal End Here -->

<!--Past Medications View Modal Start Here -->
<div class="RightSideMOffcanvas">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="PastMedicationsView" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel"> <iconify-icon icon="lets-icons:pils"></iconify-icon> Past Medication History </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body PatientRecordView">
        <div class="row">
        <div class="col-lg-12">
            <div class="lastUpdate">
                <h6 class="VitalInfoTitle">Recent Past Medication History</h6>
                <div class="accordions-items-seperate" id="accordionSpacingExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSpacingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#SpacingOne" aria-expanded="true" aria-controls="SpacingOne">
                                <div class="PresCriptIOnDateTime">
                                    <h6>Prescription 24 Apr, 2025 03:39 PM</h6>

                                </div>
                            </button>
                        </h2>
                        <div id="SpacingOne" class="accordion-collapse collapse show" aria-labelledby="headingSpacingOne" data-bs-parent="#accordionSpacingExample">
                            <div class="accordion-body p-2">
                                <ul class="VitalsInfoList">
                                    <li>
                                        <div class="MedicationPrescribed">
                                            <h6 class="MedicationName">Paracetamol-500mg
                                                <span class="SeverityOP MedicationTakeDate">
                                                    <iconify-icon icon="solar:calendar-linear"></iconify-icon> 1 Apr – 7 May 2025
                                                </span>
                                            </h6>
                                            <div class="bottomFooterMedication mt-2">
                                                <p class="MedicationNote">Take after meals</p>
                                                <div class="ActionBox">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn editMedi" data-tab="Nav-Prescriptions">
                                                        <iconify-icon icon="fluent:edit-16-regular"></iconify-icon>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="MedicationPrescribed">
                                            <h6 class="MedicationName">Ciprofloxacin-500mg
                                                <span class="SeverityOP MedicationTakeDate">
                                                    <iconify-icon icon="solar:calendar-linear"></iconify-icon> 10 Apr – 17 Apr 2025
                                                </span>
                                            </h6>
                                            <div class="bottomFooterMedication mt-2">
                                                <p class="MedicationNote">Take with full glass of water, avoid dairy</p>
                                                <div class="ActionBox">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn editMedi" data-tab="Nav-Prescriptions">
                                                        <iconify-icon icon="fluent:edit-16-regular"></iconify-icon>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="MedicationPrescribed">
                                            <h6 class="MedicationName">Metformin-850mg
                                                <span class="SeverityOP MedicationTakeDate">
                                                    <iconify-icon icon="solar:calendar-linear"></iconify-icon> 2 Apr – 2 Jul 2025
                                                </span>
                                            </h6>
                                            <div class="bottomFooterMedication mt-2">
                                                <p class="MedicationNote">Take with breakfast and dinner</p>
                                                <div class="ActionBox">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn editMedi" data-tab="Nav-Prescriptions">
                                                        <iconify-icon icon="fluent:edit-16-regular"></iconify-icon>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="MedicationPrescribed">
                                            <h6 class="MedicationName">Ibuprofen-400mg
                                                <span class="SeverityOP MedicationTakeDate">
                                                    <iconify-icon icon="solar:calendar-linear"></iconify-icon> 15 Apr – 22 Apr 2025
                                                </span>
                                            </h6>
                                            <div class="bottomFooterMedication mt-2">
                                                <p class="MedicationNote">Take only if pain persists, max 3/day</p>
                                                <div class="ActionBox">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn editMedi" data-tab="Nav-Prescriptions">
                                                        <iconify-icon icon="fluent:edit-16-regular"></iconify-icon>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>




                                    </ul>
                            </div>
                        </div>
                    </div>
                    <h6 class="VitalInfoTitle mt-3">Past Medication History</h6>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSpacingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#SpacingTwo" aria-expanded="false" aria-controls="SpacingTwo">
                                <h6>Prescription 22 March, 2025 03:39 PM</h6>
                            </button>
                        </h2>
                        <div id="SpacingTwo" class="accordion-collapse collapse" aria-labelledby="headingSpacingTwo" data-bs-parent="#accordionSpacingExample">
                            <div class="accordion-body p-2">
                            <ul class="VitalsInfoList">
                                <li>
                                    <div class="MedicationPrescribed">
                                        <h6 class="MedicationName">Paracetamol-500mg
                                            <span class="SeverityOP MedicationTakeDate">
                                                <iconify-icon icon="solar:calendar-linear"></iconify-icon> 1 Apr – 7 May 2025
                                            </span>
                                        </h6>
                                        <div class="bottomFooterMedication mt-2">
                                            <p class="MedicationNote">Take after meals</p>
                                            <div class="ActionBox">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn editMedi" data-tab="Nav-Prescriptions">
                                                    <iconify-icon icon="fluent:edit-16-regular"></iconify-icon>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="MedicationPrescribed">
                                        <h6 class="MedicationName">Ciprofloxacin-500mg
                                            <span class="SeverityOP MedicationTakeDate">
                                                <iconify-icon icon="solar:calendar-linear"></iconify-icon> 10 Apr – 17 Apr 2025
                                            </span>
                                        </h6>
                                        <div class="bottomFooterMedication mt-2">
                                            <p class="MedicationNote">Take with full glass of water, avoid dairy</p>
                                            <div class="ActionBox">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn editMedi" data-tab="Nav-Prescriptions">
                                                    <iconify-icon icon="fluent:edit-16-regular"></iconify-icon>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="MedicationPrescribed">
                                        <h6 class="MedicationName">Metformin-850mg
                                            <span class="SeverityOP MedicationTakeDate">
                                                <iconify-icon icon="solar:calendar-linear"></iconify-icon> 2 Apr – 2 Jul 2025
                                            </span>
                                        </h6>
                                        <div class="bottomFooterMedication mt-2">
                                            <p class="MedicationNote">Take with breakfast and dinner</p>
                                            <div class="ActionBox">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn editMedi" data-tab="Nav-Prescriptions">
                                                    <iconify-icon icon="fluent:edit-16-regular"></iconify-icon>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="MedicationPrescribed">
                                        <h6 class="MedicationName">Ibuprofen-400mg
                                            <span class="SeverityOP MedicationTakeDate">
                                                <iconify-icon icon="solar:calendar-linear"></iconify-icon> 15 Apr – 22 Apr 2025
                                            </span>
                                        </h6>
                                        <div class="bottomFooterMedication mt-2">
                                            <p class="MedicationNote">Take only if pain persists, max 3/day</p>
                                            <div class="ActionBox">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn editMedi" data-tab="Nav-Prescriptions">
                                                    <iconify-icon icon="fluent:edit-16-regular"></iconify-icon>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>



                                    </ul>
                            </div>
                        </div>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-footer">
       <div class="row">
       <div class="col-lg-12 text-end">
            <a href="#"  data-bs-toggle="modal" data-bs-target="#createQuotation" class="open-tab-btn addFieldBtn" data-tab="Nav-Past-Medications" ><iconify-icon icon="basil:add-outline"></iconify-icon> Add Past Medication</a>
        </div>
       </div>
    </div>
    </div>
</div>
<!--Past Medications  View Modal End Here -->

<!---------------------------------------------
  View Modal's For Patient Record End Here
---------------------------------------------->

<!---------------------------------------------
      Patient chat modal Start Here
---------------------------------------------->

<div class="RightSideMOffcanvas patientChat">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="PatientChat" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <div class="profileChat">
        <div class="imgProfile">
            <img src="assets/img/newimages/userdummy.png" alt="">
            <h6>Mark Villiams <span>Last Seen at 07:15 PM</span></h6>
        </div>
      </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body PatientRecordView">
        <div class="row">
        <div class="col-lg-12">
        <div class="main-chat-blk">
                <div class=" chat-page-wrapper">
                    <div class="content">

                        <!-- Chat -->
                        <div class="chat chat-messages">
                                    <div class="chat-body p-2">
                                        <div class="messages">
                                            <div class="chats">
                                                <div class="chat-avatar">
                                                    <img src="assets/img/newimages/userdummy.png" class="rounded-circle dreams_chat" alt="image">
                                                </div>
                                                <div class="chat-content">
                                                    <div class="chat-profile-name">
                                                        <h6>Mark Villiams<span>8:16 PM</span></h6>

                                                    </div>
                                                    <div class="message-content">
                                                        Hello <a href="javascript:void(0);">@Alex</a> Thank you for the
                                                        beautiful web design ahead schedule.

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat-line">
                                                <span class="chat-date">Today, July 24</span>
                                            </div>
                                            <div class="chats chats-right">
                                                <div class="chat-content">
                                                    <div class="chat-profile-name justify-content-end">
                                                        <h6>Alex Smith<span>8:16 PM</span></h6>

                                                    </div>
                                                    <div class="message-content ">
                                                        Hello <a href="javascript:void(0);">@Alex</a> Thank you for the
                                                        beautiful web design ahead schedule.
                                                    </div>
                                                </div>
                                                <div class="chat-avatar">
                                                    <img src="assets/img/newimages/userdummy.png" class="rounded-circle dreams_chat" alt="image">
                                                </div>
                                            </div>
                                            <div class="chats">
                                                <div class="chat-avatar">
                                                    <img src="assets/img/newimages/userdummy.png" class="rounded-circle dreams_chat" alt="image">
                                                </div>
                                                <div class="chat-content">
                                                    <div class="chat-profile-name">
                                                        <h6>Mark Villiams<span>8:16 PM</span><span class="check-star"><i class="bx bxs-star"></i></span></h6>

                                                    </div>
                                                    <div class="message-content award-link chat-award-link">
                                                        Hello Alex Thank you for the beautiful web design ahead
                                                        schedule.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chats chats-right">
                                                <div class="chat-content">
                                                    <div class="chat-profile-name justify-content-end">
                                                        <h6>Alex Smith<span>8:16 PM</span></h6>

                                                    </div>
                                                    <div class="message-content fancy-msg-box">
                                                        Hello Alex Thank you for the beautiful web design ahead
                                                        schedule.
                                                    </div>
                                                </div>
                                                <div class="chat-avatar">
                                                    <img src="assets/img/newimages/userdummy.png" class="rounded-circle dreams_chat" alt="image">
                                                </div>
                                            </div>

                                            <div class="chats">
                                                <div class="chat-avatar">
                                                    <img src="assets/img/newimages/userdummy.png" class="rounded-circle dreams_chat" alt="image">
                                                </div>
                                                <div class="chat-content">
                                                    <div class="chat-profile-name">
                                                        <h6>Mark Villiams<span>8:16 PM</span></h6>

                                                    </div>
                                                    <div class="message-content review-files">
                                                        <p class="d-flex align-items-center">Please check and review the
                                                            files<span class="ms-1 d-flex"><img src="assets/img/icons/smile-chat.svg" alt="Icon"></span></p>
                                                        <div class="file-download d-flex align-items-center mb-0">
                                                            <div class="file-type d-flex align-items-center justify-content-center me-2">
                                                                <i class="bx bxs-file-doc"></i>
                                                            </div>
                                                            <div class="file-details">
                                                                <span class="file-name">Landing_page_V1.doc</span>
                                                                <ul>
                                                                    <li>80 Bytes</li>
                                                                    <li><a href="javascript:void(0);">Download</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="chats">
                                                <div class="chat-avatar">
                                                    <img src="assets/img/newimages/userdummy.png" class="rounded-circle dreams_chat" alt="image">
                                                </div>
                                                <div class="chat-content">
                                                    <div class="chat-profile-name">
                                                        <h6>Mark Villiams<span>8:16 PM</span></h6>

                                                    </div>
                                                    <div class="message-content review-files">
                                                        <p class="d-flex align-items-center">Please check and review the
                                                            files<span class="ms-1 d-flex"><img src="assets/img/icons/smile-chat.svg" alt="Icon"></span></p>
                                                        <div class="file-download  mb-0">

                                                            <div class="file-details">
                                                            <ul class="image-grid">
                                                                <li>
                                                                    <a href="assets/img/newimages/avatar-19.jpg" data-fancybox="gallery">
                                                                        <img src="assets/img/newimages/avatar-19.jpg" alt="Image 1">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="assets/img/newimages/avatar-30.jpg" data-fancybox="gallery">
                                                                        <img src="assets/img/newimages/avatar-30.jpg" alt="Image 2">
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                <div class="pdfUpload">
                                                                    <a href="assets/img/newimages/dummy.pdf" target="_blank" download="">
                                                                        <img src="assets/img/newimages/file.png" alt="PDF Download">
                                                                    </a>
                                                                </div>
                                                                </li>
                                                                <!-- You can dynamically add more images here -->
                                                            </ul>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>



                                            <div class="chats forward-chat-msg">
                                                <div class="chat-avatar">
                                                    <img src="assets/img/newimages/userdummy.png" class="rounded-circle dreams_chat" alt="image">
                                                </div>
                                                <div class="chat-content">
                                                    <div class="chat-profile-name">
                                                        <h6>Mark Villiams<span>8:16 PM</span></h6>

                                                    </div>
                                                    <div class="message-content">
                                                        Thank you for your support
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>



                        </div>
                        <!-- /Chat -->



                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-footer">
    <div class="chat-footer">
        <div class="chat-container">
                <div class="input-area">
                <div class="mentionReplyMAve"></div>
                <div id="uploadPreview" class="upload-preview"></div>
                <div class="inputWrapper">
                <input type="text" id="messageInput" placeholder="Write your message...">
                    <label for="fileUpload" class="attachment-icon">
                    <iconify-icon icon="teenyicons:attach-solid"></iconify-icon>
                    <input type="file" id="fileUpload" accept="image/*,video/*,application/pdf" hidden="" multiple="" onchange="handleFileUpload(event)">
                    </label>
                    <button class="send-button" onclick="sendMessage()"><iconify-icon icon="tabler:send"></iconify-icon></button>
                </div>

                </div>

                </div>
        </div>
    </div>
    </div>
</div>
<!---------------------------------------------
      Patient chat modal End Here
---------------------------------------------->

<!---------------------------------------------
 Window Style Upload file and document Modal Strat
---------------------------------------------->

<div class="WindowsStyleModal">
        <form action="{{ route('clinic.patient.upload.document') }}" method="POST" id="supportTicketForm" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="DocumentUpload" tabindex="-1" aria-labelledby="HelpPopupLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="HelpPopupLabel">
                                <div class="iconModal">
                                    <iconify-icon icon="material-symbols:upload-sharp"></iconify-icon>
                                </div>
                                Upload File & Document
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                        <input type="hidden" name="patient_id" value="{{ $patient->id }}">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control"
                                            placeholder="Enter the name of the document" name="title" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Upload File & Document</label>
                                        {{-- <input name="file1" type="file" class="dropify"
                                            required /> --}}

                                            <input type="file" name="document" class="dropify"  accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" data-height="100" required>
                                            <small class="text-muted">Accepted formats: PDF, DOC, DOCX, JPG, PNG. Max size: 5MB</small>
                                    </div>
                                </div>
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
 Window Style Upload file and document Modal End Hre
---------------------------------------------->
@endsection
@push('custom_scripts')
  <script>
    $(document).ready(function () {
        $('.searchBarWrapper input').on('keyup', function () {
            var searchText = $(this).val().toLowerCase();
            var found = false;

            $('.MainActionList li').each(function () {
                var title = $(this).find('h6').text().toLowerCase();
                if (title.indexOf(searchText) !== -1) {
                    $(this).show();
                    found = true;
                } else {
                    $(this).hide();
                }
            });

            if (!found) {
                $('.noDataFound').show();
            } else {
                $('.noDataFound').hide();
            }
        });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.open-tab-btn').forEach(button => {
        button.addEventListener('click', function () {
            const targetTabId = this.getAttribute('data-tab');
            if (targetTabId) {
                // Activate the tab BEFORE the modal opens
                const tabLink = document.querySelector(`a[href="#${targetTabId}"]`);
                if (tabLink) {
                    const tabInstance = new bootstrap.Tab(tabLink);
                    tabInstance.show();
                }
            }
        });
    });
});
</script>

<!-- DIAGNOSIS TAG JS-->
<script>
$(document).ready(function() {
    // Handle Enter key press to add tag
    $(document).on('keypress', '.diagnosis-input', function(e) {
        if (e.which === 13 && $(this).val().trim() !== '') {
            e.preventDefault();
            const tagText = $(this).val().trim();
            const tagHtml = `<span class="diagnosis-tag">${tagText}<span class="remove-tag">&times;</span></span>`;
            $(this).closest('.diagnosis-wrapper').find('.diagnosis-tags').append(tagHtml);
            $(this).val('');
        }
    });

    // Remove tag when X is clicked
    $(document).on('click', '.remove-tag', function() {
        $(this).parent('.diagnosis-tag').remove();
    });
});
</script>

<script>
  $(document).on("click", ".SaveBtn", function (e) {
    e.preventDefault();

    var $btn = $(this);
    var $spinner = $btn.find(".spinner-border");

    // Show the spinner
    $spinner.removeClass("d-none");

    // Simulate a loading delay (e.g., API call or form submission)
    setTimeout(function () {
      // Hide the modal after loading
      const modalEl = document.getElementById('createQuotation');
      const modal = bootstrap.Modal.getInstance(modalEl);
      modal.hide();

      // Optionally reset the spinner (if button remains visible)
      $spinner.addClass("d-none");
    }, 1500); // adjust time as needed
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $('.VitalsInfoList').on('click', '.Discontine', function (e) {
            e.preventDefault();
            let $medicationBox = $(this).closest('.MedicationPrescribed');

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you really want to discontinue this medicine?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, discontinue it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $medicationBox.addClass('blurredMedication');
                    Swal.fire({
                        title: 'Discontinued!',
                        text: 'This medication has been discontinued.',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            });
        });
    });
</script>

<!----------------------------------
Chat Image Upload Js Start Here
--------------------------------------->

<script>
function handleFileUpload(event) {
  const files = Array.from(event.target.files);
  const previewContainer = document.getElementById("uploadPreview");

  // Show the container when there are files to upload
  if (files.length > 0) {
    previewContainer.style.display = "flex"; // Show the container
  }

  files.forEach(file => {
    // Create a wrapper for each file preview with opacity and loader
    const fileWrapper = document.createElement("div");
    fileWrapper.classList.add("file-preview");
    fileWrapper.style.opacity = "0.5"; // Initial opacity

    // Add the loader to the file wrapper
    const loader = document.createElement("div");
    loader.classList.add("loader");
    fileWrapper.appendChild(loader);

    previewContainer.appendChild(fileWrapper);

    // Simulate a delay for uploading files
    setTimeout(() => {
      fileWrapper.style.opacity = "1"; // Full opacity when loading is complete
      hideLoader(fileWrapper);

      if (file.type.startsWith("image/")) {
        const img = document.createElement("img");
        img.src = URL.createObjectURL(file);
        img.style.maxWidth = "100px";
        img.style.maxHeight = "100px";
        img.onload = () => URL.revokeObjectURL(img.src);
        fileWrapper.appendChild(img);
      } else if (file.type.startsWith("video/")) {
        const video = document.createElement("video");
        video.src = URL.createObjectURL(file);
        video.controls = true;
        video.style.maxWidth = "100px";
        fileWrapper.appendChild(video);
        video.onloadeddata = () => URL.revokeObjectURL(video.src);
      } else if (file.type === "application/pdf") {
        const pdfImg = document.createElement("img");
        pdfImg.src = "assets/img/new-image/file.png";
        pdfImg.alt = "PDF Download";
        pdfImg.style.maxWidth = "100px";
        fileWrapper.appendChild(pdfImg);
      }

      // Add a remove button with an icon
      const removeBtn = document.createElement("button");
      removeBtn.classList.add("remove-btn");
      removeBtn.innerHTML = `<iconify-icon icon="mdi:remove"></iconify-icon>`;
      removeBtn.onclick = () => {
        fileWrapper.remove();
        checkIfPreviewContainerShouldHide(); // Check if the preview container should be hidden
      };
      fileWrapper.appendChild(removeBtn);
    }, 1000); // Simulate a 1-second delay
  });
}

function hideLoader(fileWrapper) {
  const loader = fileWrapper.querySelector(".loader");
  if (loader) loader.remove(); // Remove the loader when the file upload is complete
}

function checkIfPreviewContainerShouldHide() {
  const previewContainer = document.getElementById("uploadPreview");
  if (previewContainer.children.length === 0) {
    previewContainer.style.display = "none"; // Hide the container if no files remain
  }
}
function showReply() {
  const mentionContainer = document.querySelector('.mentionReplyMAve');

  // Check if a reply mention already exists in the mentionReplyMAve to prevent duplicates
  if (!mentionContainer.querySelector('.replyMention')) {
    const replyMention = document.createElement('div');
    replyMention.classList.add('replyMention');

    replyMention.innerHTML = `
      <div class="messageProfile">
        <img src="assets/img/profiles/avatar-14.jpg" alt="Profile" class="profile-image">
        <div class="name">Paul Walker</div>
      </div>
      <div class="message-text">
        Hello! Have you already prepared financial statements for the last month...
      </div>
      <button class="remove-reply" onclick="removeReply(this)">
        <iconify-icon icon="mdi:remove"></iconify-icon>
      </button>
    `;

    // Append the replyMention to the mentionReplyMAve container
    mentionContainer.appendChild(replyMention);
  }
}

function removeReply(button) {
  const replyMention = button.closest('.replyMention'); // Find the closest replyMention div
  if (replyMention) {
    replyMention.remove(); // Remove the replyMention div
  }
}







// Function to show loader with overlay for 3 seconds, then hide the DiscussionReplyContainerMave and show the discussionCardsContainer
function hideDiscussionReplyContainer() {
  const loader = document.getElementById('loader1');
  const overlay = document.getElementById('overlay');
  const discussionReplyContainer = document.getElementById('DiscussionReplyContainerMave');
  const discussionCardsContainer = document.getElementById('discussionCardsContainer');

  // Show the overlay and loader
  overlay.style.display = 'block';
  loader.style.display = 'block';

  // Set a timeout to perform the actions after 3 seconds
  setTimeout(() => {
    if (discussionReplyContainer) {
      discussionReplyContainer.style.display = 'none'; // Hide the DiscussionReplyContainerMave
    }

    if (discussionCardsContainer) {
      discussionCardsContainer.style.display = 'block'; // Show the discussionCardsContainer
    }

    // Hide the loader and overlay after 3 seconds
    loader.style.display = 'none';
    overlay.style.display = 'none';
  }, 3000); // 3000ms = 3 seconds
}

// Function to show loader with overlay for 3 seconds, then hide the discussionCardsContainer and show the DiscussionReplyContainerMave
function toggleDiscussionContainers() {
  const loader = document.getElementById('loader1');
  const overlay = document.getElementById('overlay');
  const discussionReplyContainer = document.getElementById('DiscussionReplyContainerMave');
  const discussionCardsContainer = document.getElementById('discussionCardsContainer');

  // Show the overlay and loader
  overlay.style.display = 'block';
  loader.style.display = 'block';

  // Set a timeout to perform the actions after 3 seconds
  setTimeout(() => {
    if (discussionCardsContainer) {
      discussionCardsContainer.style.display = 'none'; // Hide the discussionCardsContainer
    }

    if (discussionReplyContainer) {
      discussionReplyContainer.style.display = 'block'; // Show the DiscussionReplyContainerMave
    }

    // Hide the loader and overlay after 3 seconds
    loader.style.display = 'none';
    overlay.style.display = 'none';
  }, 500); // 1000ms = 1 seconds
}


</script>
<!----------------------------------
Chat Image Upload Js End Here
--------------------------------------->

<!-- Include Fancybox CSS and JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize Fancybox for all items with the data-fancybox attribute
    $('[data-fancybox="gallery"]').fancybox({
        loop: true,                 // Allow the gallery to loop
        buttons: ["zoom", "close"],  // Customize buttons (optional)
        // Other Fancybox options can be added here
    });
});
</script>

<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
<script>
    $('.dropify').dropify();
</script>


<script>
    $(document).ready(function () {
    $('.insuranceInfoCard').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation(); // prevent bubbling up to document
        $('.InsuranceCardShow').toggle();
    });

    $('.InsuranceCardShow').on('click', function (e) {
        e.stopPropagation(); // prevent bubbling when clicking inside
    });

    $(document).on('click', function () {
        $('.InsuranceCardShow').hide();
    });
});
</script>

@endpush
