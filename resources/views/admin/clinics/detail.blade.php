@extends('admin.layouts.app')
@section('title', 'Tele Health Super Admin | Clinic Detail')
@section('content')
    <style>
        .RightSideContainer {
            height: 100vh;
            width: 80%;
        }

        .page-wrapper .content.settings-content {
            padding-bottom: 0 !important;
        }
    </style>
    <div class="page-wrapper">
        <div class="content settings-content">
            <div class="d-md-flex pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                <div class="my-auto ">
                    <h2 class="mb-1 flexpagetitle">
                        <div class="backbtnwrap">
                            <a href="{{ route('superadmin.clinic.index') }}">
                                <iconify-icon icon="octicon:arrow-left-24"></iconify-icon>
                            </a>
                        </div>
                        Clinic Details
                    </h2>
                </div>
                <div class="d-flex  right-content align-items-center flex-wrap ">
                    <ul class="tophead_action">

                        <li>
                            <div class="enquiryDate">
                                <iconify-icon icon="ion:calendar-outline"></iconify-icon> Added On : <div
                                    class="Onboarddate">
                                    {{ $clinic->created_at->format('d M,Y H:i a') }}</div>

                            </div>
                        </li>

                    </ul>
                    <div class="head-icons ms-2 mb-0">
                        <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-original-title="Collapse" id="collapse-header">
                            <i class="ti ti-chevrons-up"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card tablemaincard_nopaddingleftright noboxshadow">
                <div class="card-body p-0">
                    <div class="custom-datatable-filter">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="settings-wrapper d-flex">
                                    <div class="sidebars settings-sidebar " id="sidebar2">
                                        <div class="sidebar-inner slimscroll">
                                            <div class="profile-content">
                                                <div class="profile-contentimg">
                                                    @php

                                                        $image = '';
                                                        if (
                                                            $clinic->img &&
                                                            Illuminate\Support\Facades\Storage::disk('public')->exists(
                                                                $clinic->img,
                                                            )
                                                        ) {
                                                            $image = env('IMAGE_ROOT') . $clinic->img;
                                                        }

                                                    @endphp
                                                    @if (!empty($image))
                                                        <img src="{{ $image ?? '' }}" alt="img" id="blah">
                                                    @endif

                                                </div>
                                                <div class="profile-contentname">
                                                    <h2>{{ $clinic->name ?? '' }}</h2>
                                                    <p><a
                                                            href="mailto:{{ $clinic->email ?? '' }}">{{ $clinic->email ?? '' }}</a>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="copy-container">
                                                <span>Clinic ID:</span>
                                                <div class="user-id" id="userID">#{{ $clinic->clinic_id ?? '' }}</div>
                                            </div>

                                            <div id="sidebar-menu5" class="sidebar-menu">
                                                <div class="nav vendorDetail_lefttabs flex-column nav-pills  tab-style-7"
                                                    id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <button class="nav-link text-start active" id="main-profile-tab"
                                                        data-bs-toggle="pill" data-bs-target="#main-profile" type="button"
                                                        role="tab" aria-controls="main-profile" aria-selected="true">
                                                        <iconify-icon icon="carbon:building"></iconify-icon> Basic
                                                        Details
                                                    </button>
                                                    <button class="nav-link text-start" id="man-password-tab"
                                                        data-bs-toggle="pill" data-bs-target="#man-password" type="button"
                                                        role="tab" aria-controls="man-password" aria-selected="false">
                                                        <iconify-icon icon="ion:location-outline"></iconify-icon> Clinic
                                                        Location
                                                    </button>
                                                    <button class="nav-link text-start" id="main-team-tab"
                                                        data-bs-toggle="pill" data-bs-target="#main-team" type="button"
                                                        role="tab" aria-controls="main-team" aria-selected="false">
                                                        <iconify-icon icon="solar:calendar-linear"></iconify-icon> Working
                                                        Days & Hour
                                                    </button>
                                                    <button class="nav-link text-start" id="main-billing-tab"
                                                        data-bs-toggle="pill" data-bs-target="#main-billing" type="button"
                                                        role="tab" aria-controls="main-billing" aria-selected="false">
                                                        <iconify-icon icon="solar:documents-linear"></iconify-icon>
                                                        All
                                                        Documents
                                                    </button>
                                                    <button class="nav-link text-start" id="main-Stores-tab"
                                                        data-bs-toggle="pill" data-bs-target="#main-Stores" type="button"
                                                        role="tab" aria-controls="main-Stores" aria-selected="false">
                                                        <iconify-icon icon="mynaui:link-solid"></iconify-icon>
                                                        Social Media Links
                                                    </button>
                                                    <button class="nav-link text-start" id="DoctorsListing-tab"
                                                        data-bs-toggle="pill" data-bs-target="#DoctorsListing"
                                                        type="button" role="tab" aria-controls="DoctorsListing"
                                                        aria-selected="false">
                                                        <iconify-icon icon="healthicons:doctor-male-outline"></iconify-icon>
                                                        All Doctors
                                                    </button>

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="settings-page-wrap RightSideContainer">

                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane show active" id="main-profile" role="tabpanel"
                                                tabindex="0">
                                                <div class="setting-title">
                                                    <h4>Basic Details</h4>
                                                </div>
                                                <div class="vendortab_inrdetails">

                                                    <div class="card-title-head">
                                                        <h6><span> <iconify-icon
                                                                    icon="carbon:building"></iconify-icon></span>
                                                            Clinic Information</h6>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Clinic Name</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $clinic->name ?? '' }}" readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">License Number </label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $clinic->license_no ?? '' }}" readonly
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="mb-3">
                                                                <label class="form-label">Valid From </label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ !empty($clinic->valid_from) ? $clinic->valid_from->format('d M,Y') : 'N/A' }}"
                                                                    readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="mb-3">
                                                                <label class="form-label">Valid To</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ !empty($clinic->valid_to) ? $clinic->valid_to->format('d M,Y') : 'N/A' }}"
                                                                    readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Email</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $clinic->email ?? '' }}" readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Phone No</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $clinic->phone ?? '' }}" readonly disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Website URL</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $clinic->web_url ?? '' }}" readonly
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Description / Bio</label>
                                                                <textarea class="form-control" name="" id="" readonly disabled row="4">{{ $extra['description'] ?? '' }}</textarea>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="man-password" role="tabpanel" tabindex="0">
                                                <div class="settings-page-wrap">
                                                    <div class="setting-title">
                                                        <h4>Clinic Location</h4>
                                                    </div>
                                                    <div class="vendortab_inrdetails">
                                                        <div class="company-info">

                                                            <div class="card-title-head ">
                                                                <h6><span><iconify-icon
                                                                            icon="ion:location-outline"></iconify-icon></span>
                                                                    Clinic Address
                                                                </h6>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Address 1</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $clinic->address1 ?? '' }}" readonly
                                                                            disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Address 2
                                                                            (optional)</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $clinic->address2 ?? '' }}" readonly
                                                                            disabled>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-4 col-lg-4 col-md-3">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Country</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $clinic->country ?? '' }}" readonly
                                                                            disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-4 col-md-3">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Town/City</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $clinic->city ?? '' }}" readonly
                                                                            disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-4 col-md-3">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Postal
                                                                            Code</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $clinic->postal_code ?? '' }}"
                                                                            readonly disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Google Maps
                                                                            Link</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $clinic->map_link ?? '' }}" readonly
                                                                            disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="main-team" role="tabpanel"
                                                aria-labelledby="main-team-tab" tabindex="0">
                                                <div class="settings-page-wrap">
                                                    <div class="setting-title">
                                                        <h4>Working days & Hour</h4>
                                                    </div>
                                                    <div class="vendortab_inrdetails">
                                                        <div class="company-info">
                                                            <div class="row">
                                                                <div class="col-lg-8">
                                                                    <table class="table table-bordered">
                                                                        <tbody>
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
                                                                                    <tr>
                                                                                        <th class="DaysName">
                                                                                            {{ ucfirst($day) }}</th>
                                                                                        <td>
                                                                                            @php $formattedSlots = []; @endphp

                                                                                            @foreach ($schedules[$day] as $slot)
                                                                                                @if ($slot->is_available)
                                                                                                    @php
                                                                                                        $start = !empty(
                                                                                                            $slot->start_time
                                                                                                        )
                                                                                                            ? $slot->start_time->format(
                                                                                                                'h:i a',
                                                                                                            )
                                                                                                            : '';
                                                                                                        $end = !empty(
                                                                                                            $slot->end_time
                                                                                                        )
                                                                                                            ? $slot->end_time->format(
                                                                                                                'h:i a',
                                                                                                            )
                                                                                                            : '';
                                                                                                        $formattedSlots[] = "$start - $end";
                                                                                                    @endphp
                                                                                                @else
                                                                                                    @php
                                                                                                        $formattedSlots[] =
                                                                                                            '<span class="badge badge-soft-danger">Closed</span>';
                                                                                                    @endphp
                                                                                                @endif
                                                                                            @endforeach

                                                                                            {!! implode(', ', $formattedSlots) !!}
                                                                                        </td>
                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach



                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="main-billing" role="tabpanel"
                                                aria-labelledby="main-billing-tab" tabindex="0">
                                                <div class="setting-title nobtmargin">
                                                    <h4>Clinic Documents</h4>
                                                    <div
                                                        class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">

                                                        <form id="download-selected-form" method="POST"
                                                            action="{{ route('superadmin.clinics.downloadDocuments', encrypt($clinic->id ?? '')) }}">
                                                            @csrf
                                                            <input type="hidden" name="document_ids"
                                                                id="selected-documents-input">
                                                            <button class="Downloadall_docs btn" type="submit">Download
                                                                All
                                                                <iconify-icon
                                                                    icon="mynaui:download"></iconify-icon></button>
                                                        </form>
                                                    </div>
                                                </div>

                                                <div class="vendortab_inrdetails all-documents">
                                                    <table class="table common-datatable withoutActionTR nowrap w-100 ">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <label class="checkboxs">
                                                                        <input type="checkbox" id="select-all">
                                                                        <span class="checkmarks"></span>
                                                                    </label>
                                                                </th>
                                                                <th>Name</th>
                                                                <th>Uploaded On</th>
                                                                <th>Size</th>
                                                                <th>Type</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @isset($documents)
                                                                @foreach ($documents as $doc)
                                                                    @php
                                                                        $filePath = '';
                                                                        if (
                                                                            $doc->img &&
                                                                            Illuminate\Support\Facades\Storage::disk(
                                                                                'public',
                                                                            )->exists($doc->img)
                                                                        ) {
                                                                            $filePath = env('IMAGE_ROOT') . $doc->img;
                                                                        }
                                                                        $fileExists = file_exists($filePath);
                                                                        $size = $fileExists
                                                                            ? round(filesize($filePath) / 1024, 2) .
                                                                                ' KB'
                                                                            : 'N/A';
                                                                        $type = $fileExists
                                                                            ? File::mimeType($filePath)
                                                                            : 'N/A';
                                                                        $name = basename($image->img);
                                                                    @endphp
                                                                    <tr>
                                                                        <td>
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox" name="documents[]"
                                                                                    value="{{ $doc->id }}"
                                                                                    class="doc-checkbox">
                                                                                <span class="checkmarks"></span>
                                                                            </label>
                                                                        </td>
                                                                        <td class="productimgname">
                                                                            <a href="{{ $filePath ?? 'javascript:void(0)' }}"
                                                                                class="product-img d-flex align-items-center">
                                                                                <img src="{{ $filePath ?? '' }}"
                                                                                    alt="Product" class="me-2">
                                                                                <span>{{ $name ?? '' }}</span>
                                                                            </a>
                                                                        </td>
                                                                        <td>{{ $doc->created_at->format('d M,Y h:i a') }}</td>
                                                                        <td> {{ $size ?? '' }}</td>
                                                                        <td>
                                                                            {{ $type ?? '' }}
                                                                        </td>
                                                                        <td>
                                                                            <div
                                                                                class="d-flex align-items-center ActionDropdown">
                                                                                <div class="d-flex">
                                                                                    <button
                                                                                        class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover "
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-placement="top" title=""
                                                                                        data-bs-original-title="Preview Document"
                                                                                        type="button"><span
                                                                                            class="icon"><span
                                                                                                class="feather-icon">
                                                                                                <iconify-icon
                                                                                                    icon="hugeicons:view"></iconify-icon>
                                                                                            </span></span></button>

                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endisset
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="main-Stores" role="tabpanel"
                                                aria-labelledby="main-Stores-tab" tabindex="0">


                                                <div class="setting-title">
                                                    <h4>Social Media Links</h4>
                                                </div>
                                                <div class="vendortab_inrdetails">
                                                    <div class="company-info">

                                                        <div class="card-title-head ">
                                                            <h6><iconify-icon
                                                                    icon="mynaui:link-solid"></iconify-icon></span>
                                                                Social Media Links
                                                            </h6>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Facebook</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $extra['facebook'] ?? '' }}" readonly
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Instagram</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $extra['instagram'] ?? '' }}" readonly
                                                                        disabled>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6 col-lg-4 col-md-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label">LinkedIn</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $extra['linkedin'] ?? '' }}" readonly
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-4 col-md-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Twitter</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $extra['twitter'] ?? '' }}" readonly
                                                                        disabled>
                                                                </div>
                                                            </div>

                                                        </div>


                                                    </div>

                                                </div>
                                            </div>

                                            <div class="tab-pane" id="DoctorsListing" role="tabpanel"
                                                aria-labelledby="main-Stores-tab" tabindex="0">

                                                <div class="setting-title nobtmargin">
                                                    <h4>All Doctors</h4>
                                                    <div
                                                        class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">

                                                    </div>
                                                </div>

                                                <div class="vendortab_inrdetails all-documents">
                                                    <table class="table common-datatable withoutActionTR nowrap w-100 ">
                                                        <thead>
                                                            <tr>
                                                                <th>Doctor ID</th>
                                                                <th>Doctor Name</th>
                                                                <th>Mobile No.</th>
                                                                <th>Email</th>
                                                                <th>Specialization</th>
                                                                <th>Experience</th>
                                                                <th>Consultation Type</th>
                                                                <th>Status</th>
                                                                <th class="no-sort">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><a href="doctor-detail.php">#DOC001</a></td>
                                                                <td>DR. John Smith</td>
                                                                <td>+1 555-123-4567</td>
                                                                <td>john.smith@example.com</td>
                                                                <td>Cardiology</td>
                                                                <td>5 Years</td>
                                                                <td><span class="consultaionType">Audio</span><span
                                                                        class="consultaionType">Video</span><span
                                                                        class="consultaionType">Chat</span><span
                                                                        class="consultaionType">Physical</span></td>

                                                                <td>
                                                                    <span class="badge bg-soft-success"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="Doctor is currently active">Active</span>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center ActionDropdown">
                                                                        <div class="d-flex">

                                                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                                                data-bs-toggle="tooltip"
                                                                                title="View Doctor Detail"
                                                                                href="doctor-detail.php">
                                                                                <span class="icon"><span
                                                                                        class="feather-icon"><iconify-icon
                                                                                            icon="hugeicons:view"></iconify-icon></span></span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td><a href="doctor-detail.php">#DOC002</a></td>
                                                                <td>DR. Emily Brown</td>
                                                                <td>+1 555-234-5678</td>
                                                                <td>emily.brown@example.com</td>
                                                                <td>Pediatrics</td>
                                                                <td>3 Years</td>
                                                                <td><span class="consultaionType">Audio</span><span
                                                                        class="consultaionType">Video</span></td>

                                                                <td>
                                                                    <span class="badge bg-soft-danger"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="Doctor is currently inactive">Inactive</span>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center ActionDropdown">
                                                                        <div class="d-flex">

                                                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                                                data-bs-toggle="tooltip"
                                                                                title="View Doctor Detail"
                                                                                href="doctor-detail.php">
                                                                                <span class="icon"><span
                                                                                        class="feather-icon"><iconify-icon
                                                                                            icon="hugeicons:view"></iconify-icon></span></span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td><a href="doctor-detail.php">#DOC003</a></td>
                                                                <td>DR. Michael Lee</td>
                                                                <td>+1 555-345-6789</td>
                                                                <td>michael.lee@example.com</td>
                                                                <td>Orthopedics</td>
                                                                <td>8 Years</td>
                                                                <td><span class="consultaionType">Video</span><span
                                                                        class="consultaionType">Chat</span></td>

                                                                <td>
                                                                    <span class="badge bg-soft-success"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="Doctor is currently active">Active</span>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center ActionDropdown">
                                                                        <div class="d-flex">
                                                                            <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Doctor Detail" href="doctor-edit.php">
                                                                                <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                                            </a> -->
                                                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                                                data-bs-toggle="tooltip"
                                                                                title="View Doctor Detail"
                                                                                href="doctor-detail.php">
                                                                                <span class="icon"><span
                                                                                        class="feather-icon"><iconify-icon
                                                                                            icon="hugeicons:view"></iconify-icon></span></span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td><a href="doctor-detail.php">#DOC004</a></td>
                                                                <td>DR. Sarah Miller</td>
                                                                <td>+1 555-456-7890</td>
                                                                <td>sarah.miller@example.com</td>
                                                                <td>Dermatology</td>
                                                                <td>6 Years</td>
                                                                <td><span class="consultaionType">Audio</span><span
                                                                        class="consultaionType">Chat</span></td>

                                                                <td>
                                                                    <span class="badge bg-soft-danger"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="Doctor is currently inactive">Inactive</span>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center ActionDropdown">
                                                                        <div class="d-flex">
                                                                            <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Doctor Detail" href="doctor-edit.php">
                                                                                <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                                            </a> -->
                                                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                                                data-bs-toggle="tooltip"
                                                                                title="View Doctor Detail"
                                                                                href="doctor-detail.php">
                                                                                <span class="icon"><span
                                                                                        class="feather-icon"><iconify-icon
                                                                                            icon="hugeicons:view"></iconify-icon></span></span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td><a href="doctor-detail.php">#DOC005</a></td>
                                                                <td>DR. Olivia Brooks</td>
                                                                <td>+1 555-567-8901</td>
                                                                <td>olivia.brooks@example.com</td>
                                                                <td>Gynecology</td>
                                                                <td>4 Years</td>
                                                                <td><span class="consultaionType">Audio</span><span
                                                                        class="consultaionType">Video</span></td>

                                                                <td>
                                                                    <span class="badge bg-soft-success"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="Doctor is currently active">Active</span>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center ActionDropdown">
                                                                        <div class="d-flex">
                                                                            <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Doctor Detail" href="doctor-edit.php">
                                                                                <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                                            </a> -->
                                                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                                                data-bs-toggle="tooltip"
                                                                                title="View Doctor Detail"
                                                                                href="doctor-detail.php">
                                                                                <span class="icon"><span
                                                                                        class="feather-icon"><iconify-icon
                                                                                            icon="hugeicons:view"></iconify-icon></span></span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td><a href="doctor-detail.php">#DOC006</a></td>
                                                                <td>DR. Ethan Hall</td>
                                                                <td>+1 555-678-9012</td>
                                                                <td>ethan.hall@example.com</td>
                                                                <td>Neurology</td>
                                                                <td>7 Years</td>
                                                                <td><span class="consultaionType">Video</span><span
                                                                        class="consultaionType">Chat</span></td>

                                                                <td>
                                                                    <span class="badge bg-soft-danger"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="Doctor is currently inactive">Inactive</span>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center ActionDropdown">
                                                                        <div class="d-flex">
                                                                            <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Doctor Detail" href="doctor-edit.php">
                                                                                <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                                            </a> -->
                                                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                                                data-bs-toggle="tooltip"
                                                                                title="View Doctor Detail"
                                                                                href="doctor-detail.php">
                                                                                <span class="icon"><span
                                                                                        class="feather-icon"><iconify-icon
                                                                                            icon="hugeicons:view"></iconify-icon></span></span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td><a href="doctor-detail.php">#DOC007</a></td>
                                                                <td>DR. Nathan Scott</td>
                                                                <td>+1 555-789-0123</td>
                                                                <td>nathan.scott@example.com</td>
                                                                <td>Psychiatry</td>
                                                                <td>9 Years</td>
                                                                <td><span class="consultaionType">Audio</span><span
                                                                        class="consultaionType">Video</span></td>

                                                                <td>
                                                                    <span class="badge bg-soft-success"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="Doctor is currently active">Active</span>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center ActionDropdown">
                                                                        <div class="d-flex">
                                                                            <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Doctor Detail" href="doctor-edit.php">
                                                                                <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                                            </a> -->
                                                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                                                data-bs-toggle="tooltip"
                                                                                title="View Doctor Detail"
                                                                                href="doctor-detail.php">
                                                                                <span class="icon"><span
                                                                                        class="feather-icon"><iconify-icon
                                                                                            icon="hugeicons:view"></iconify-icon></span></span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td><a href="doctor-detail.php">#DOC008</a></td>
                                                                <td>DR. Hannah Cooper</td>
                                                                <td>+1 555-890-1234</td>
                                                                <td>hannah.cooper@example.com</td>
                                                                <td>Radiology</td>
                                                                <td>2 Years</td>
                                                                <td><span class="consultaionType">Audio</span><span
                                                                        class="consultaionType">Video</span><span
                                                                        class="consultaionType">Chat</span></td>

                                                                <td>
                                                                    <span class="badge bg-soft-danger"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="Doctor is currently inactive">Inactive</span>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center ActionDropdown">
                                                                        <div class="d-flex">
                                                                            <!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" title="Edit Doctor Detail" href="doctor-edit.php">
                                                                                <span class="icon"><span class="feather-icon"><iconify-icon icon="fluent:edit-20-regular"></iconify-icon></span></span>
                                                                            </a> -->
                                                                            <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                                                data-bs-toggle="tooltip"
                                                                                title="View Doctor Detail"
                                                                                href="doctor-detail.php">
                                                                                <span class="icon"><span
                                                                                        class="feather-icon"><iconify-icon
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
                        </div>
                    </div>
                @endsection
                @push('custom_scripts')
                    <script>
                        $(document).ready(function() {
                            $('#download-selected-form').on('submit', function(e) {
                                var selectedIds = $('.doc-checkbox:checked').map(function() {
                                    return $(this).val();
                                }).get();

                                if (selectedIds.length === 0) {
                                    e.preventDefault();
                                    alert('Please select at least one document.');
                                    return false;
                                }

                                $('#selected-documents-input').val(JSON.stringify(selectedIds));
                            });

                            $('#select-all').on('change', function() {
                                $('.doc-checkbox').prop('checked', $(this).is(':checked'));
                            });
                        });
                    </script>
                @endpush
