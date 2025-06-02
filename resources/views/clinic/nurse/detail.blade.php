@extends('clinic.layouts.app')
@section('title', 'Tele Health Clinic Admin | Nurse-detail')
@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="PatinetWrapper">
                <div
                    class="d-md-flex topHeaderPTD pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                    <div class="my-auto ">
                        <h2 class="mb-1 flexpagetitle">
                            <div class="backbtnwrap">
                                <a href="{{ route('clinic.nurse.index') }}">
                                    <iconify-icon icon="octicon:arrow-left-24"></iconify-icon>
                                </a>
                            </div>
                            Nurse Details
                        </h2>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">

                        <!-- <div class="ActionWrapper">
                               <div class="patientAction">
                                <a href="#"><iconify-icon icon="mi:call"></iconify-icon></a>
                                <a href="#"><iconify-icon icon="lucide:video"></iconify-icon></a>
                                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#PatientChat" aria-controls="offcanvasRight"><iconify-icon icon="proicons:chat"></iconify-icon></a>
                               </div>
                          </div> -->
                        <ul class="tophead_action">
                            <li>
                                <div class="Currentvendorstatus">
                                    <iconify-icon icon="f7:status"></iconify-icon> Current Status : &nbsp; <div
                                        class="badge  {{ $nurse->satus == 'active' ? 'badge-soft-success' : 'badge-soft-warning' }}
                                {{-- badge-soft-success --}}
                                ">
                                        {{ ucfirst($nurse->satus) }}</div>

                                </div>
                            </li>
                            <li>
                                <div class="enquiryDate">
                                    <iconify-icon icon="ion:calendar-outline"></iconify-icon> Added On : <div
                                        class="Onboarddate">
                                        {{ \Carbon\Carbon::parse($nurse->created_at)->format('d M Y h:ia') ?? '' }}</div>

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
                                    <img src="{{ $nurse && $nurse->img ? env('IMAGE_ROOT') . $nurse->img : asset('clinic/img/newimages/healthcare-workers-preventing-vi.png') }}"
                                        class="img-fluid" alt="User Image">
                                </div>
                                <div class="doc-info-cont">
                                    <!-- <span class="badge doc-avail-badge"><i class="fa-solid fa-circle"></i>Available </span> -->
                                    <h4 class="doc-name">{{ $nurse->name ?? '' }} <img
                                            src="{{ asset('clinic/img/newimages/badge-check.svg') }}" alt="Img"><span
                                            class="badge doctor-role-badge"><i
                                                class="fa-solid fa-circle"></i>{{ $nurse->role_id ?? '' }}</span></h4>
                                    <p>{{ \Carbon\Carbon::parse($nurse->dob)->format('d M,Y') ?? '' }}
                                        ({{ \Carbon\Carbon::parse($nurse->dob)->age }}y ) {{ $nurse->gender ?? '' }} •
                                        Nurse ID :
                                        #{{ $nurse->nurse_id ?? '' }}</p>
                                    <p>{{ $nurse->qualification ?? '' }}</p>
                                    <p><strong>Areas of Expertise</strong> : {{ $xpertise ?? '' }}</p>

                                </div>
                            </div>
                            <div class="doc-info-right">
                                <div class="middle-info CommonCardPT">


                                    <div class="InfoDt">
                                        <iconify-icon icon="ion:location-outline"></iconify-icon>
                                        {{ $nurse->whole_address ?? '' }}
                                    </div>
                                    <div class="InfoDt">
                                        <iconify-icon icon="carbon:chart-relationship"></iconify-icon>
                                        {{ $nurse->marital_status ?? '' }}
                                    </div>
                                    <div class="InfoDt">
                                        <iconify-icon icon="hugeicons:id"></iconify-icon> #{{ $nurse->national_id ?? '' }}
                                    </div>
                                    <div class="InfoDt">
                                        <iconify-icon icon="healthicons:doctor-male-outline" width="18"
                                            height="18"></iconify-icon> {{ $nurse->doctor_id ?? '' }}
                                    </div>
                                </div>
                                <div class="middle-info CommonCardPT">
                                    <!-- <h6 class="ContactInfo">Professional Details</h6> -->
                                    <div class="InfoDt">
                                        <iconify-icon icon="hugeicons:license-third-party"></iconify-icon>
                                        {{ $nurse->license_no }}
                                        <br>
                                        ({{ \Carbon\Carbon::parse($nurse->valid_from)->format('d M,Y') ?? '' }} -
                                        {{ \Carbon\Carbon::parse($nurse->valid_to)->format('d M,Y') ?? '' }})
                                    </div>
                                    <div class="InfoDt">
                                        <iconify-icon icon="akar-icons:shield"></iconify-icon>
                                        {{ $nurse->year_of_experience ?? '' }} Years Experience
                                    </div>
                                    <div class="InfoDt">
                                        <iconify-icon icon="mdi:language"></iconify-icon> {{ $nurse->language ?? '' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col-lg-5">
                    <div class="row DoctorCardOverview">
                        <div class="col-lg-6 pe-0">
                            <div class="card mb-0">
                                <div class="text-center card-body">
                                    <div class="tilesFlex">
                                        <div class="IconBoxTiles bg-info">
                                            <iconify-icon icon="solar:calendar-line-duotone"></iconify-icon>
                                        </div>
                                        <div class="tilesCnt">
                                            <h5 class="tilescount"><span class="counter-value"
                                                    data-target="236.18">236.18</span>k</h5>
                                            <p class="text-slate-500 dark:text-zink-200">Total Appointments</p>
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
                    <div class="vitalsMainWrapper mt-2">
                        <div class="vitalsWrapper">
                            <div class="VitalHeader">
                                <h5 class="VitalTitle">Files & Documents <span>
                                    {{ $nurse->documents->first()?->created_at ? 'Last Update : ' . $nurse->documents->first()->created_at->format('d M Y h:ia') : '' }}
                                </h5>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#DocumentUpload"
                                    class="UploadBtn">
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
                        </div>
                    </div>



                </div>
                <div class="col-lg-7">
                    <div class="clinic-loc">
                        <h5 class="VitalTitle mb-3">Clinic Location</h5>
                        <div class="clinic-info">
                            <div class="clinic-img"><img
                                    src="{{ $nurse->clinic && $nurse->clinic->img ? env('IMAGE_ROOT') . $nurse->clinic->img : asset('clinic/img/newimages/clinic-11.png') }}"
                                    alt="Img">
                            </div>
                            <div class="detail-clinic">
                                <h5>{{ $nurse->clinic->name }} - </h5>
                                <p>{{ $nurse->clinic->whole_address }}</p>
                            </div>
                        </div>
                        <div class="contact-map">
                            @php
                                $encodedAddress = urlencode($nurse->clinic->whole_address);
                            @endphp
                            <iframe src="https://www.google.com/maps?q={{ $encodedAddress }}&output=embed" width="100%"
                                height="230px" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
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
        <form action="{{ route('clinic.nurse.upload.document') }}" method="POST" id="supportTicketForm" enctype="multipart/form-data">
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
                        <input type="hidden" name="nurse_id" value="{{ $nurse->id }}">

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
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <script>
        $('.dropify').dropify();
    </script>

    <script>
    document.querySelector('input[type="file"]').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png'];
            if (!allowedTypes.includes(file.type)) {
                alert('Invalid file type!');
                e.target.value = ''; // Reset file
                return;
            }
            if (file.size > 5 * 1024 * 1024) {
                alert('File size must be 5MB or less.');
                e.target.value = ''; // Reset file
            }
        }
    });
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
@endpush
