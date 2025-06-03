@extends('clinic.layouts.app')
@section('title', 'Tele Health Clinic Admin | Doctor-detail')
@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="PatinetWrapper">
                <div
                    class="d-md-flex topHeaderPTD pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                    <div class="my-auto ">
                        <h2 class="mb-1 flexpagetitle">
                            <div class="backbtnwrap">
                                <a href="{{ route('clinic.doctor.index') }}">
                                    <iconify-icon icon="octicon:arrow-left-24"></iconify-icon>
                                </a>
                            </div>
                            Doctor Details
                        </h2>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
                        <ul class="tophead_action">
                            <li>
                                <div class="Currentvendorstatus">
                                    <iconify-icon icon="f7:status"></iconify-icon> Current Status : &nbsp; <div
                                        class="badge {{ $doctor->status == 'active' ? 'badge-success' : 'badge-danger' }}">
                                        {{ ucfirst($doctor->status ?? '') }}</div>

                                </div>
                            </li>
                            <li>
                                <div class="enquiryDate">
                                    <iconify-icon icon="ion:calendar-outline"></iconify-icon> Added On : <div
                                        class="Onboarddate">
                                        {{ $doctor->created_at->format('d M,Y h:i a') }}</div>

                                </div>
                            </li>

                        </ul>
                        <div class="head-icons ms-2 headicon_innerpage">
                            <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-original-title="Collapse" id="collapse-header">
                                <i class="ti ti-chevrons-up"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card doc-profile-card">
                    <div class="card-body">
                        <div class="doctor-widget doctor-profile-two">
                            <div class="doc-info-left">
                                <div class="doctor-img">
                                    @php

                                        $image = '';
                                        if (
                                            $doctor->img &&
                                            Illuminate\Support\Facades\Storage::disk('public')->exists($doctor->img)
                                        ) {
                                            $image = env('IMAGE_ROOT') . $doctor->img;
                                        }

                                    @endphp
                                    @if (!empty($image))
                                        <img src="{{ $image ?? '' }}" class="img-fluid" alt="User Image">
                                    @endif
                                </div>
                                <div class="doc-info-cont">
                                    <h4 class="doc-name">{{ $doctor->name ?? '' }} <img
                                            src="{{ asset('clinic/img/newimages/badge-check.svg') }}" alt="Img">
                                        {{-- <span
                                            class="badge doctor-role-badge"><i
                                                class="fa-solid fa-circle"></i>Therapist</span> --}}
                                    </h4>
                                    <p>{{ !empty($extra['dob']) ? date('d M,Y', strtotime($extra['dob'])) . ' (' . ($age ?? '') . ')' : '' }}
                                        {{ ucfirst($doctor->gender ?? '') }} • Doctor ID :
                                        #{{ ucfirst($doctor->doctor_id ?? '') }}</p>
                                    <p>{{ $doctor->doctorExpertises->map(function ($doctorExpertise) {
                                            return $doctorExpertise->expertise ? $doctorExpertise->expertise->name : null;
                                        })->filter()->implode(',') }}
                                    </p>

                                </div>
                            </div>
                            <div class="doc-info-right">
                                <div class="middle-info CommonCardPT">


                                    <div class="InfoDt">
                                        <iconify-icon icon="ion:location-outline"></iconify-icon>
                                        {{ address($doctor) }}
                                    </div>
                                    @if (!empty($doctor->marital_status))
                                        <div class="InfoDt">
                                            <iconify-icon icon="carbon:chart-relationship"></iconify-icon>
                                            {{ $doctor->marital_status ?? '' }}
                                        </div>
                                    @endif
                                    <div class="InfoDt">
                                        <iconify-icon icon="hugeicons:id"></iconify-icon> #NA2365KLO
                                    </div>

                                </div>
                                <div class="middle-info CommonCardPT">

                                    <div class="InfoDt">
                                        <iconify-icon icon="hugeicons:license-third-party"></iconify-icon>
                                        {{ $doctor->license_no ?? '' }} ({{ $doctor->valid_from->format('d M,Y') ?? '' }}
                                        -
                                        {{ $doctor->valid_to->format('d M,Y') ?? '' }})
                                    </div>
                                    <div class="InfoDt">
                                        <iconify-icon icon="akar-icons:shield"></iconify-icon>
                                        {{ $extra['experience'] ?? '' }} Years Experience
                                    </div>
                                    <div class="InfoDt">
                                        <iconify-icon icon="tdesign:grid-add"></iconify-icon>
                                        @isset($doctor->consulationTypes)
                                            @foreach ($doctor->consulationTypes->pluck('type') as $cons)
                                                <span class="consultaionType">{{ ucfirst($cons ?? '') }}</span>
                                            @endforeach
                                        @endisset
                                    </div>
                                    <div class="InfoDt">
                                        <iconify-icon icon="mdi:language"></iconify-icon> {{ $extra['lang'] ?? '' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="VisitCardBox mb-3">
                        <div class="VitalHeader">
                            <h5 class="VitalTitle">
                                Professional Availability

                                @php
                                    $latestSchedule = $schedules->flatten()->sortByDesc('created_at')->first();
                                @endphp

                                {{ $latestSchedule ? '<span>Last Update: ' . $latestSchedule->created_at->format('d M,Y h:i a') . '</span>' : '' }}

                            </h5>

                            <a href="#" data-bs-toggle="modal" data-bs-target="#MangeSchedulePop"
                                class="UploadBtn ManageBtn">
                                <iconify-icon icon="fluent-mdl2:schedule-event-action"></iconify-icon> Manage
                            </a>
                        </div>
                        <div class="VisitCardBox-body">

                            @php
                                $weekDays = [
                                    'monday',
                                    'tuesday',
                                    'wednesday',
                                    'thursday',
                                    'friday',
                                    'saturday',
                                    'sunday',
                                ];
                            @endphp

                            @foreach ($weekDays as $day)
                                @if (!empty($schedules[$day]))
                                    <div class="mainCardVisit">
                                        <div class="VisitCard">
                                            <div class="LeftSide">
                                                <h6 class="DoctorName">{{ ucfirst($day) }}</h6>
                                            </div>

                                        </div>
                                        <div class="DateInfo">
                                            @foreach ($schedules[$day] as $slot)
                                                @if ($slot->is_available)
                                                    @php
                                                        $start = !empty($slot->start_time)
                                                            ? \Carbon\Carbon::parse($slot->start_time)->format('h:i A')
                                                            : '';
                                                        $end = !empty($slot->end_time)
                                                            ? \Carbon\Carbon::parse($slot->end_time)->format('h:i A')
                                                            : '';
                                                    @endphp
                                                    <span>
                                                        <iconify-icon icon="iconamoon:clock-light"></iconify-icon>
                                                        {{ $start }} - {{ $end }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-soft-danger">Closed</span>
                                                @endif
                                            @endforeach
                                        </div>

                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="vitalsMainWrapper mt-2">
                        <div class="vitalsWrapper">
                            <div class="VitalHeader">
                                <h5 class="VitalTitle">Files & Documents <span>
                                        {{ $doctor->documents->first()?->created_at ? 'Last Update : ' . $doctor->documents->first()->created_at->format('d M Y h:ia') : '' }}
                                    </span></h5>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#DocumentUpload" class="UploadBtn">
                                    <iconify-icon icon="material-symbols:upload-sharp"></iconify-icon> Upload
                                </a>
                            </div>

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
                            <ul class="dcoumentsList">

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
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row DoctorCardOverview">
                        <div class="col-lg-12">
                            <h5 class="PT_title">Patient &amp; Appointments Overview</h5>
                        </div>
                        <div class="col-lg-6 pe-0">
                            <div class="card mb-0">
                                <div class="text-center card-body">
                                    <div class="tilesFlex">
                                        <div class="IconBoxTiles bg-info">
                                            <iconify-icon icon="prime:user"></iconify-icon>
                                        </div>
                                        <div class="tilesCnt">
                                            <h5 class="tilescount"><span class="counter-value"
                                                    data-target="236.18">236.18</span>k</h5>
                                            <p class="text-slate-500 dark:text-zink-200">Total Patients</p>
                                        </div>
                                    </div>


                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="col-lg-6">
                            <div class="card mb-0">
                                <div class="text-center card-body">
                                    <div class="tilesFlex">
                                        <div class="IconBoxTiles bg-warning">
                                            <iconify-icon icon="mynaui:video"></iconify-icon>
                                        </div>
                                        <div class="tilesCnt">
                                            <h5 class="tilescount"><span class="counter-value"
                                                    data-target="13461">13,461</span></h5>
                                            <p class="text-slate-500 dark:text-zink-200">Video Appointments</p>
                                        </div>
                                    </div>


                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="col-lg-6 pe-0">
                            <div class="card mb-0">
                                <div class="text-center card-body">
                                    <div class="tilesFlex">
                                        <div class="IconBoxTiles bg-primary">
                                            <iconify-icon icon="proicons:call"></iconify-icon>
                                        </div>
                                        <div class="tilesCnt">
                                            <h5 class="tilescount"><span class="counter-value"
                                                    data-target="17150">17,150</span></h5>
                                            <p class="text-slate-500 dark:text-zink-200">Audio Appointments</p>
                                        </div>
                                    </div>


                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="col-lg-6">
                            <div class="card mb-0">
                                <div class="text-center card-body">
                                    <div class="tilesFlex">
                                        <div class="IconBoxTiles bg-green">
                                            <iconify-icon icon="healthicons:walking-outline"></iconify-icon>
                                        </div>
                                        <div class="tilesCnt">
                                            <h5 class="tilescount"><span class="counter-value"
                                                    data-target="3519">3,519</span></h5>
                                            <p class="text-slate-500 dark:text-zink-200">Physical Appointments</p>
                                        </div>
                                    </div>

                                </div>
                            </div><!--end col-->
                        </div>
                    </div>

                    <div class="clinic-loc">
                        <h5 class="VitalTitle mb-3">Clinic Location</h5>
                        <div class="clinic-info">
                            <div class="clinic-img"><img src="assets/img/newimages/clinic-11.png" alt="Img">
                            </div>
                            <div class="detail-clinic">
                                <h5>Maxillofacial Surgery - </h5>
                                <p>2286 Sundown Lane, Old Trafford 24541, UK</p>
                            </div>
                        </div>
                        <div class="contact-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3193.7301009561315!2d-76.13077892422932!3d36.82498697224007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89bae976cfe9f8af%3A0xa61eac05156fbdb9!2sBeachStreet%20USA!5e0!3m2!1sen!2sin!4v1669777904208!5m2!1sen!2sin"
                                width="100%" height="230px" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>


                </div>
                <div class="col-lg-5">
                    <div class="AppointmentsCard">
                        <h5 class="VitalTitle mb-3">Upcoming Appointments</h5>
                        <div class="searchBarWrapper">
                            <input type="text" class="form-control" placeholder="Search Here...">
                            <a href="#" class="SearchIcon">
                                <iconify-icon icon="prime:search"></iconify-icon>
                            </a>
                        </div>
                        <ul class="appointmentListing">
                            <!-- <li>
                                                                                    <div class="mainInfoVitalsWrapper">
                                                                                        <div class="vitalInfo">
                                                                                            <h6 class="labelInfo">Patient Name</h6>
                                                                                                <h6>Amish</h6>
                                                                                        </div>
                                                                                        <div class="vitalInfo">
                                                                                            <h6 class="labelInfo">Mobile No.</h6>
                                                                                                <h6>9568626989</h6>
                                                                                        </div>

                                                                                        <div class="vitalInfo">
                                                                                            <h6 class="labelInfo">Date & Time</h6>
                                                                                                <h6>1 May, 2025 10:00 AM</h6>
                                                                                        </div>
                                                                                        <div class="vitalInfo">
                                                                                            <h6 class="labelInfo">Consultation Type</h6>
                                                                                                <h6>Video</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </li> -->
                            <li>
                                <div class="mainInfoVitalsWrapper">
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Patient Name</h6>
                                        <h6>Bilal Safi</h6>
                                    </div>
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Mobile No.</h6>
                                        <h6>9568624568</h6>
                                    </div>

                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Date & Time</h6>
                                        <h6>30 Apr, 2025 09:00 AM</h6>
                                    </div>
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Consultation Type</h6>
                                        <h6>Video</h6>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="mainInfoVitalsWrapper">
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Patient Name</h6>
                                        <h6>David William</h6>
                                    </div>
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Mobile No.</h6>
                                        <h6>9568649689</h6>
                                    </div>

                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Date & Time</h6>
                                        <h6>30 Apr, 2025 09:00 AM</h6>
                                    </div>
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Consultation Type</h6>
                                        <h6>Video</h6>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="mainInfoVitalsWrapper">
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Patient Name</h6>
                                        <h6>Rito Riba</h6>
                                    </div>
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Mobile No.</h6>
                                        <h6>6462496895</h6>
                                    </div>
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Date & Time</h6>
                                        <h6>30 Apr, 2025 09:00 AM</h6>
                                    </div>
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Consultation Type</h6>
                                        <h6>Audio</h6>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="mainInfoVitalsWrapper">
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Patient Name</h6>
                                        <h6>Neha Kapoor</h6>
                                    </div>
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Mobile No.</h6>
                                        <h6>9876543210</h6>
                                    </div>
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Date & Time</h6>
                                        <h6>30 Apr, 2025 10:00 AM</h6>
                                    </div>
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Consultation Type</h6>
                                        <h6>Video</h6>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="mainInfoVitalsWrapper">
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Patient Name</h6>
                                        <h6>Arjun Mehta</h6>
                                    </div>
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Mobile No.</h6>
                                        <h6>9123456780</h6>
                                    </div>
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Date & Time</h6>
                                        <h6>30 Apr, 2025 11:00 AM</h6>
                                    </div>
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Consultation Type</h6>
                                        <h6>Physical</h6>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="mainInfoVitalsWrapper">
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Patient Name</h6>
                                        <h6>Anjali Sharma</h6>
                                    </div>
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Mobile No.</h6>
                                        <h6>9988776655</h6>
                                    </div>
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Date & Time</h6>
                                        <h6>30 Apr, 2025 12:00 PM</h6>
                                    </div>
                                    <div class="vitalInfo">
                                        <h6 class="labelInfo">Consultation Type</h6>
                                        <h6>Audio</h6>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="noDataFound" style="display: none; text-align: center; padding: 20px;">
                            <img src="assets/img/newimages/nodatavector.png" alt="No Data"
                                style="width: 100px; margin-bottom: 10px;">
                            <h5>No Search Found</h5>
                            <p>You search something wrong !</p>
                        </div>
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>


    </div>
    </div>


    <!---------------------------------------------
                                                         Window Style Upload file and document Modal Strat
                                                        ---------------------------------------------->

    <div class="WindowsStyleModal">
        <form action="{{ route('clinic.doctors.upload.document', encrypt($doctor->id)) }}" method="POST"
            id="supportTicketForm" enctype="multipart/form-data" novalidate class="form needs-validation">
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

                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Upload File & Document</label>

                                        <input type="file" name="document" class="dropify" required
                                            accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" data-height="100" required>
                                        <small class="text-muted">Accepted formats: PDF, DOC, DOCX, JPG, PNG. Max size:
                                            5MB</small>
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


    <!---------------------------------------------
                                                         Window Style Upload file and document Modal Strat
                                                        ---------------------------------------------->

    <div class="WindowsStyleModal">
        <form action="#" id="supportTicketForm">
            <div class="modal fade" id="MangeSchedulePop" tabindex="-1" aria-labelledby="HelpPopupLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="HelpPopupLabel">
                                <div class="iconModal">
                                    <iconify-icon icon="fluent-mdl2:schedule-event-action"></iconify-icon>
                                </div>
                                Manage Schedule
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="WeekDays_row">
                                                <ul class="nav nav-tabs" id="weekTabs" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="monday-tab"
                                                            data-bs-toggle="tab" data-bs-target="#monday" type="button"
                                                            role="tab" aria-controls="monday"
                                                            aria-selected="true">Monday</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="tuesday-tab" data-bs-toggle="tab"
                                                            data-bs-target="#tuesday" type="button" role="tab"
                                                            aria-controls="tuesday" aria-selected="false">Tuesday</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="wednesday-tab" data-bs-toggle="tab"
                                                            data-bs-target="#wednesday" type="button" role="tab"
                                                            aria-controls="wednesday"
                                                            aria-selected="false">Wednesday</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="thursday-tab" data-bs-toggle="tab"
                                                            data-bs-target="#thursday" type="button" role="tab"
                                                            aria-controls="thursday"
                                                            aria-selected="false">Thursday</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="friday-tab" data-bs-toggle="tab"
                                                            data-bs-target="#friday" type="button" role="tab"
                                                            aria-controls="friday" aria-selected="false">Friday</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="saturday-tab" data-bs-toggle="tab"
                                                            data-bs-target="#saturday" type="button" role="tab"
                                                            aria-controls="saturday"
                                                            aria-selected="false">Saturday</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="sunday-tab" data-bs-toggle="tab"
                                                            data-bs-target="#sunday" type="button" role="tab"
                                                            aria-controls="sunday" aria-selected="false">Sunday</button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-content" id="weekTabContent">
                                                <div class="tab-pane fade show active" id="monday" role="tabpanel"
                                                    aria-labelledby="monday-tab">

                                                    <div class="day-row" id="monday">

                                                        <div class="time-slots" id="monday-slots">
                                                            <div class="time-slot">
                                                                <input type="text" class="flatpickr-input form-control"
                                                                    value="09:00 AM">
                                                                to
                                                                <input type="text" class="flatpickr-input form-control"
                                                                    value="05:30 PM">
                                                            </div>
                                                        </div>

                                                        <div class="form-group applyonallcheckbbox">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input apply-all"
                                                                    id="applyAllMonday">
                                                                <label class="form-check-label" for="applyAllMonday">Do
                                                                    you want to apply this on all days</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="NotAvailable1">
                                                                <label class="form-check-label" for="NotAvailable1">Not
                                                                    Available</label>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="add-button addMultislot_button"
                                                            onclick="addSlot('monday')"><iconify-icon
                                                                icon="basil:add-outline"></iconify-icon> Add Time</button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tuesday" role="tabpanel"
                                                    aria-labelledby="tuesday-tab">

                                                    <div class="day-row" id="tuesday">

                                                        <div class="time-slots" id="tuesday-slots">
                                                            <div class="time-slot">
                                                                <input type="text" class="flatpickr-input form-control"
                                                                    value="09:00 AM">
                                                                to
                                                                <input type="text" class="flatpickr-input form-control"
                                                                    value="05:30 PM">
                                                            </div>
                                                        </div>
                                                        <div class="form-group applyonallcheckbbox">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input apply-all"
                                                                    id="applyAllMonday">
                                                                <label class="form-check-label" for="applyAllMonday">Do
                                                                    you want to apply this on all days</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="NotAvailable2">
                                                                <label class="form-check-label" for="NotAvailable2">Not
                                                                    Available</label>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="add-button addMultislot_button"
                                                            onclick="addSlot('tuesday')"><iconify-icon
                                                                icon="basil:add-outline"></iconify-icon> Add Time</button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="wednesday" role="tabpanel"
                                                    aria-labelledby="wednesday-tab">

                                                    <div class="day-row" id="wednesday">

                                                        <div class="time-slots" id="wednesday-slots">
                                                            <div class="time-slot">
                                                                <input type="text" class="flatpickr-input form-control"
                                                                    value="09:00 AM">
                                                                to
                                                                <input type="text" class="flatpickr-input form-control"
                                                                    value="05:30 PM">
                                                            </div>
                                                        </div>
                                                        <div class="form-group applyonallcheckbbox">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input apply-all"
                                                                    id="applyAllMonday">
                                                                <label class="form-check-label" for="applyAllMonday">Do
                                                                    you want to apply this on all days</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="NotAvailable3">
                                                                <label class="form-check-label" for="NotAvailable3">Not
                                                                    Available</label>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="add-button addMultislot_button"
                                                            onclick="addSlot('wednesday')"><iconify-icon
                                                                icon="basil:add-outline"></iconify-icon> Add Time</button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="thursday" role="tabpanel"
                                                    aria-labelledby="thursday-tab">

                                                    <div class="day-row" id="thursday">

                                                        <div class="time-slots" id="thursday-slots">
                                                            <div class="time-slot">
                                                                <input type="text" class="flatpickr-input form-control"
                                                                    value="09:00 AM">
                                                                to
                                                                <input type="text" class="flatpickr-input form-control"
                                                                    value="05:30 PM">
                                                            </div>
                                                        </div>
                                                        <div class="form-group applyonallcheckbbox">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input apply-all"
                                                                    id="applyAllMonday">
                                                                <label class="form-check-label" for="applyAllMonday">Do
                                                                    you want to apply this on all days</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="NotAvailable4">
                                                                <label class="form-check-label" for="NotAvailable4">Not
                                                                    Available</label>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="add-button addMultislot_button"
                                                            onclick="addSlot('thursday')"><iconify-icon
                                                                icon="basil:add-outline"></iconify-icon> Add Time</button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="friday" role="tabpanel"
                                                    aria-labelledby="friday-tab">

                                                    <div class="day-row" id="friday">

                                                        <div class="time-slots" id="friday-slots">
                                                            <div class="time-slot">
                                                                <input type="text" class="flatpickr-input form-control"
                                                                    value="09:00 AM">
                                                                to
                                                                <input type="text" class="flatpickr-input form-control"
                                                                    value="05:30 PM">
                                                            </div>
                                                        </div>
                                                        <div class="form-group applyonallcheckbbox">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input apply-all"
                                                                    id="applyAllMonday">
                                                                <label class="form-check-label" for="applyAllMonday">Do
                                                                    you want to apply this on all days</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="NotAvailable5">
                                                                <label class="form-check-label" for="NotAvailable5">Not
                                                                    Available</label>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="add-button addMultislot_button"
                                                            onclick="addSlot('friday')"><iconify-icon
                                                                icon="basil:add-outline"></iconify-icon> Add Time</button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="saturday" role="tabpanel"
                                                    aria-labelledby="saturday-tab">

                                                    <div class="day-row" id="saturday">

                                                        <div class="time-slots" id="saturday-slots">
                                                            <div class="time-slot">
                                                                <input type="text" class="flatpickr-input form-control"
                                                                    value="09:00 AM">
                                                                to
                                                                <input type="text" class="flatpickr-input form-control"
                                                                    value="05:30 PM">
                                                            </div>
                                                        </div>

                                                        <div class="form-group applyonallcheckbbox">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input apply-all"
                                                                    id="applyAllMonday">
                                                                <label class="form-check-label" for="applyAllMonday">Do
                                                                    you want to apply this on all days</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="NotAvailable6">
                                                                <label class="form-check-label" for="NotAvailable6">Not
                                                                    Available</label>
                                                            </div>
                                                        </div>

                                                        <button type="button" class="add-button addMultislot_button"
                                                            onclick="addSlot('saturday')"><iconify-icon
                                                                icon="basil:add-outline"></iconify-icon> Add Time</button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="sunday" role="tabpanel"
                                                    aria-labelledby="sunday-tab">

                                                    <div class="day-row" id="sunday">

                                                        <div class="time-slots" id="sunday-slots">
                                                            <div class="time-slot">
                                                                <input type="text" class="flatpickr-input form-control"
                                                                    value="09:00 AM">
                                                                to
                                                                <input type="text" class="flatpickr-input form-control"
                                                                    value="05:30 PM">
                                                            </div>
                                                        </div>

                                                        <div class="form-group applyonallcheckbbox">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input apply-all"
                                                                    id="applyAllMonday">
                                                                <label class="form-check-label" for="applyAllMonday">Do
                                                                    you want to apply this on all days</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="NotAvailable7">
                                                                <label class="form-check-label" for="NotAvailable7">Not
                                                                    Available</label>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="add-button addMultislot_button"
                                                            onclick="addSlot('sunday')"><iconify-icon
                                                                icon="basil:add-outline"></iconify-icon> Add Time</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <script>
        $('.dropify').dropify();
    </script>

    <script>
        $(document).ready(function() {
            $('.searchBarWrapper input').on('keyup', function() {
                var searchText = $(this).val().toLowerCase();
                var found = false;

                $('.appointmentListing li').each(function() {
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
        document.addEventListener("DOMContentLoaded", function() {
            initializeTimePickers();
        });

        function initializeTimePickers() {
            const timepickers = document.querySelectorAll('.flatpickr-input:not(.flatpickr-initialized)');
            timepickers.forEach(tp => {
                if (!tp._flatpickr) {
                    flatpickr(tp, {
                        enableTime: true,
                        noCalendar: true,
                        dateFormat: "H:i",
                        time_24hr: true,
                        minuteIncrement: 1,
                        onChange: function(selectedDates, dateStr, instance) {
                            tp.value = dateStr;
                        }
                    });
                    tp.classList.add('flatpickr-initialized');
                }
            });
        }

        function addSlot(day) {
            const container = document.getElementById(day + '-slots');
            const timeSlot = document.createElement('div');
            timeSlot.className = 'time-slot';
            timeSlot.innerHTML = `
                <input type="text" class="flatpickr-input form-control" readonly>
                to
                <input type="text" class="flatpickr-input form-control" readonly>
                <button class="deleteslot" onclick="removeSlot(this, false)"><iconify-icon icon="proicons:delete"></iconify-icon></button>
            `;
            // Append new slot before the add button if it exists
            const addButton = container.querySelector('.add-button');
            if (addButton) {
                container.insertBefore(timeSlot, addButton.parentElement);
            } else {
                container.appendChild(timeSlot);
            }
            initializeTimePickers(); // Reinitialize for new timepickers

            // Apply to all days if checkbox is checked
            const applyAll = document.getElementById(`applyAll${day.charAt(0).toUpperCase() + day.slice(1)}`).checked;
            if (applyAll) {
                document.querySelectorAll('.tab-pane').forEach(tab => {
                    if (tab.id !== day) {
                        const otherContainer = tab.querySelector(`#${tab.id}-slots`);
                        const newOtherSlot = timeSlot.cloneNode(true);
                        const otherAddButton = otherContainer.querySelector('.add-button');
                        if (otherAddButton) {
                            otherContainer.insertBefore(newOtherSlot, otherAddButton.parentElement);
                        } else {
                            otherContainer.appendChild(newOtherSlot);
                        }
                        initializeTimePickers(); // Reinitialize for cloned timepickers
                    }
                });
            }
        }

        function removeSlot(button, isDefault = true) {
            if (isDefault) return; // Prevent deletion of default slot
            const timeSlot = button.parentElement;
            const day = timeSlot.closest('.day-row').id;
            timeSlot.remove();

            // Remove from all days if applied
            const applyAll = document.getElementById(`applyAll${day.charAt(0).toUpperCase() + day.slice(1)}`).checked;
            if (applyAll) {
                const startTime = timeSlot.querySelector('.flatpickr-input').value || '09:00 AM'; // Fallback to default
                document.querySelectorAll('.tab-pane').forEach(tab => {
                    if (tab.id !== day) {
                        const otherSlot = tab.querySelector(
                            `.time-slot:not(.default-slot):has(.flatpickr-input[value="${startTime}"])`);
                        if (otherSlot) otherSlot.remove();
                    }
                });
            }
        }
    </script>
@endpush
