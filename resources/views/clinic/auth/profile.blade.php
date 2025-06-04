@extends('clinic.layouts.app')
@section('title', 'Tele Health Clinic Admin | dashboard')
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
                            <a href="index.php">
                                <iconify-icon icon="octicon:arrow-left-24"></iconify-icon>
                            </a>
                        </div>
                        My Profile
                    </h2>
                </div>
                <div class="d-flex  right-content align-items-center flex-wrap ">
                    <ul class="tophead_action">

                        <li>
                            <div class="enquiryDate">
                                <iconify-icon icon="ion:calendar-outline"></iconify-icon> Added On : <div
                                    class="Onboarddate">
                                    {{ \Carbon\Carbon::parse($clinic->created_at)->format('d M y h:ia') ?? '' }}</div>

                            </div>
                        </li>
                        <li>
                            <div class="pageheader_rightbtns">
                                <button type="submit" class="cmnPromary_btn">Save Changes</button>
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
                                                    <img src="{{ $clinic && $clinic->img ? env('IMAGE_ROOT') . $clinic->img : asset('clinic/img/newimages/logoicon.png') }}"
                                                        alt="img" id="blah">

                                                </div>
                                                <div class="profile-contentname">
                                                    <h2>{{ $clinic->name ?? '' }}</h2>
                                                    <p><a href="mailto:{{ $clinic->email }}">{{ $clinic->email }}</a>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="copy-container">
                                                <span>Clinic ID:</span>
                                                <div class="user-id" id="userID">#{{ $clinic->clinic_id }}</div>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="settings-page-wrap RightSideContainer">
                                        <form action="general-settings.html">

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
                                                            <div class="col-lg-12">
                                                                <div class="image-upload-container">
                                                                    <div class="profile-pic-wrapper">
                                                                        <div class="pic-holder">
                                                                            @php
                                                                                $image = '';
                                                                                if (
                                                                                    $clinic->img &&
                                                                                    Illuminate\Support\Facades\Storage::disk(
                                                                                        'public',
                                                                                    )->exists($clinic->img)
                                                                                ) {
                                                                                    $image =
                                                                                        env('IMAGE_ROOT') .
                                                                                        $clinic->img;
                                                                                }
                                                                            @endphp
                                                                            <img id="profilePic" class="pic"
                                                                                src="{{ $image ?? '' }}">

                                                                            <input class="uploadProfileInput"
                                                                                type="file" name="profile_pic"
                                                                                id="newProfilePhoto" accept="image/*"
                                                                                style="opacity: 0;" />
                                                                            <label for="newProfilePhoto"
                                                                                class="upload-file-block">
                                                                                <div class="text-center">
                                                                                    <div class="uploadicon_template">
                                                                                        <iconify-icon
                                                                                            icon="bytesize:upload"></iconify-icon>
                                                                                    </div>
                                                                                    <div class="text-uppercase">
                                                                                        Upload <br /> Logo Picture
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Clinic Name</label>
                                                                    <input type="text" class="form-control"
                                                                        name="name"
                                                                        value="{{ old('name', $clinic->name) }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label">License Number </label>
                                                                    <input type="text" class="form-control"
                                                                        name="license_no"
                                                                        value="{{ old('license_no') ?? ($clinic->license_no ?? '') }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Valid From </label>
                                                                    <input type="text"
                                                                        class="form-control customdataPicker"
                                                                        value="{{ old('valid_from') ?? ($clinic->valid_from ?? '') }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Valid To</label>
                                                                    <input type="text"
                                                                        class="form-control customdataPicker"
                                                                        value="{{ old('valid_to') ?? ($clinic->valid_to ?? '') }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Email</label>
                                                                    <input type="email" class="form-control"
                                                                        value="{{ old('email') ?? ($clinic->email ?? '') }}"
                                                                        name="email" required autocomplete="off"
                                                                        pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$"
                                                                        title="Please enter a valid email">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Phone No</label>
                                                                    <input type="text" class="form-control"
                                                                        name="phone"
                                                                        value="{{ old('phone', $clinic->phone ?? '') }}"
                                                                        maxlength="13" minlength="8"
                                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,13);"
                                                                        pattern="\d{8,13}" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Website URL</label>
                                                                    <input type="text" class="form-control"
                                                                        name="web_url"
                                                                        value="{{ old('web_url') ?? ($clinic->web_url ?? '') }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Description / Bio</label>
                                                                    <!-- <input type="email" class="form-control"
                                                                                value="johndoe@example.com"  > -->
                                                                    <textarea name="extra[description]" id="description" class="form-control" required>{{ old('extra.description') ?? ($extra['description'] ?? '') }}</textarea>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="man-password" role="tabpanel" tabindex="0">
                                                    <div class="settings-page-wrap">
                                                        <form action="#">
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
                                                                                    name="address1"
                                                                                    value="{{ old('address1') ?? ($clinic->address1 ?? '') }}"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Address 2
                                                                                    (optional)</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="address1"
                                                                                    value="{{ old('address2') ?? ($clinic->address2 ?? '') }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-xl-4 col-lg-4 col-md-3">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Country</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="country"
                                                                                    value="{{ old('country') ?? ($clinic->country ?? '') }}"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-4 col-lg-4 col-md-3">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Town/City</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="city"
                                                                                    value="{{ old('city') ?? ($clinic->city ?? '') }}"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-4 col-lg-4 col-md-3">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Postal
                                                                                    Code</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="postal_code"
                                                                                    value="{{ old('postal_code') ?? ($clinic->postal_code ?? '') }}"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Google Maps
                                                                                    Link</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="map_link" id="map_link"
                                                                                    required
                                                                                    value="{{ old('map_link') ?? ($clinic->map_link ?? '') }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                    </div>
                                    <div class="tab-pane" id="main-team" role="tabpanel" aria-labelledby="main-team-tab"
                                        tabindex="0">
                                        <div class="settings-page-wrap">
                                            <div class="setting-title">
                                                <h4>Working days & Hour</h4>
                                            </div>
                                            <div class="vendortab_inrdetails">
                                                <div class="company-info">
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <div class="card mb-0">
                                                                <div class="card-body">
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
                                                                    <div class="WeekDays_row">
                                                                        <ul class="nav nav-tabs" id="weekTabs"
                                                                            role="tablist">
                                                                            @foreach ($weekDays as $index => $day)
                                                                                <li class="nav-item" role="presentation">
                                                                                    <button
                                                                                        class="nav-link {{ $index === 0 ? 'active' : '' }}"
                                                                                        id="{{ $day }}-tab"
                                                                                        data-bs-toggle="tab"
                                                                                        data-bs-target="#{{ $day }}"
                                                                                        type="button" role="tab"
                                                                                        aria-controls="{{ $day }}"
                                                                                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                                                                                        {{ ucfirst($day) }}
                                                                                    </button>
                                                                                </li>
                                                                            @endforeach

                                                                        </ul>
                                                                    </div>
                                                                    <div class="tab-content" id="weekTabContent">

                                                                        @foreach ($weekDays as $index => $day)
                                                                            @php
                                                                                $dayAvailable = true;
                                                                                if (!empty($schedules[$day])) {
                                                                                    $dayAvailable = collect(
                                                                                        $schedules[$day],
                                                                                    )->contains(
                                                                                        fn(
                                                                                            $slot,
                                                                                        ) => $slot->is_available,
                                                                                    );
                                                                                }
                                                                            @endphp
                                                                            <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                                                                                id="{{ $day }}" role="tabpanel"
                                                                                aria-labelledby="{{ $day }}-tab">

                                                                                <div class="day-row"
                                                                                    id="{{ $day }}">
                                                                                    <div class="time-slots"
                                                                                        style="{{ $dayAvailable ? '' : 'display:none' }}"
                                                                                        id="{{ $day }}-slots">
                                                                                        @if (isset($schedules[$day]) && $dayAvailable)
                                                                                            @foreach ($schedules[$day] as $k => $slot)
                                                                                                <div class="time-slot">
                                                                                                    <input type="text"
                                                                                                        name="working_hours[{{ $day }}][slots][{{ $k }}][from]"
                                                                                                        value="{{ !empty($slot->start_time) ? $slot->start_time->format('h:i A') : '' }}"
                                                                                                        class="flatpickr-input form-control from-time"
                                                                                                        required>
                                                                                                    <span>to</span>
                                                                                                    <input type="text"
                                                                                                        name="working_hours[{{ $day }}][slots][{{ $k }}][to]"
                                                                                                        value="{{ !empty($slot->end_time) ? $slot->end_time->format('h:i A') : '' }}"
                                                                                                        class="flatpickr-input form-control to-time"
                                                                                                        required>
                                                                                                    <button type="button"
                                                                                                        onclick="removeSlot(this)"
                                                                                                        class="deleteslot"><iconify-icon
                                                                                                            icon="proicons:delete"></iconify-icon></button>
                                                                                                </div>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </div>

                                                                                    <div
                                                                                        class="form-group applyonallcheckbbox">
                                                                                        <div class="form-check">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input apply-all"
                                                                                                id="applyAll{{ ucfirst($day) }}">
                                                                                            <label class="form-check-label"
                                                                                                for="applyAll{{ ucfirst($day) }}">
                                                                                                Do you want to apply this on
                                                                                                all days
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input"
                                                                                                id="NotAvailable{{ $index + 1 }}"
                                                                                                name="not_available[{{ $day }}]"
                                                                                                {{ $dayAvailable ? '' : 'checked' }}>
                                                                                            <label class="form-check-label"
                                                                                                for="NotAvailable{{ $index + 1 }}">
                                                                                                Not Available
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>

                                                                                    <button type="button"
                                                                                        class="add-button addMultislot_button"
                                                                                        {{ $dayAvailable ? '' : 'disabled' }}
                                                                                        onclick="addSlot('{{ $day }}')">
                                                                                        <iconify-icon
                                                                                            icon="basil:add-outline"></iconify-icon>
                                                                                        Add Time
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                            </div>
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
                                                <button class="btn-primary btn" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#DocumentUpload">Upload Document <iconify-icon
                                                        icon="material-symbols:upload-rounded"></iconify-icon></button>
                                                <button class="Downloadall_docs btn" type="button">Download All
                                                    <iconify-icon icon="mynaui:download"></iconify-icon></button>

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
                                                                $localFilePath = '';
                                                                $file_name = '';
                                                                $file_size = 'N/A';
                                                                $file_type = 'N/A';

                                                                if (is_object($doc) && !empty($doc->img)) {
                                                                    // Local file path for PHP functions
                                                                    $localFilePath = storage_path(
                                                                        'app/public/' . $doc->img,
                                                                    );

                                                                    // Public URL for browser
                                                                    $filePath = env('IMAGE_ROOT') . $doc->img;

                                                                    if (file_exists($localFilePath)) {
                                                                        $file_size =
                                                                            round(filesize($localFilePath) / 1024, 2) .
                                                                            ' KB';
                                                                        $file_type = File::mimeType($localFilePath);
                                                                    }

                                                                    $file_name = basename($doc->img);

                                                                    // Determine icon/image to show
                                                                    $isPdf = preg_match('/\.pdf$/i', $file_name);
                                                                    $isDoc = preg_match('/\.(doc|docx)$/i', $file_name);
                                                                    $isImage = preg_match(
                                                                        '/\.(jpg|jpeg|png|gif)$/i',
                                                                        $file_name,
                                                                    );

                                                                    if ($isPdf) {
                                                                        $displayImage = asset('common/img/file.png'); // pdf icon
                                                                    } elseif ($isDoc) {
                                                                        $displayImage = asset(
                                                                            'common/img/docx-file.png',
                                                                        ); // doc icon
                                                                    } else {
                                                                        $displayImage = $filePath;
                                                                    }
                                                                }
                                                            @endphp

                                                            <tr>
                                                                <td>
                                                                    <label class="checkboxs">
                                                                        <input type="checkbox" name="documents[]"
                                                                            value="{{ $doc->id ?? '' }}"
                                                                            class="doc-checkbox">
                                                                        <span class="checkmarks"></span>
                                                                    </label>
                                                                </td>
                                                                <td class="productimgname">
                                                                    <a href="{{ $filePath ?: 'javascript:void(0)' }}"
                                                                        target="_blank"
                                                                        class="product-img d-flex align-items-center">
                                                                        <img src="{{ $displayImage ?? '' }}" alt="Product"
                                                                            class="me-2">
                                                                        <span>{{ $file_name ?? '' }}</span>
                                                                    </a>
                                                                </td>
                                                                <td>{{ $doc->created_at->format('d M,Y h:i a') }}</td>
                                                                <td>{{ $file_size ?? '' }}</td>
                                                                <td>{{ $file_type ?? '' }}</td>
                                                                <td>
                                                                    <div class="d-flex align-items-center ActionDropdown">
                                                                        <div class="d-flex">
                                                                            <a href="{{ $filePath ?: 'javascript:void(0)' }}"
                                                                                target="_blank"
                                                                                class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover "
                                                                                data-bs-toggle="tooltip" data-placement="top"
                                                                                title=""
                                                                                data-bs-original-title="Preview Document"
                                                                                type="button"><span class="icon"><span
                                                                                        class="feather-icon">
                                                                                        <iconify-icon
                                                                                            icon="hugeicons:view"></iconify-icon>
                                                                                    </span></span></a>

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


                                        <form action="#">
                                            <div class="setting-title">
                                                <h4>Social Media Links</h4>
                                            </div>
                                            <div class="vendortab_inrdetails">
                                                <div class="company-info">

                                                    <div class="card-title-head ">
                                                        <h6><iconify-icon icon="mynaui:link-solid"></iconify-icon></span>
                                                            Social Media Links
                                                        </h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Facebook</label>
                                                                <input type="text" class="form-control"
                                                                    name="extra[facebook]"
                                                                    value="{{ old('extra.facebook') ?? ($extra['facebook'] ?? '') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Instagram</label>
                                                                <input type="text" class="form-control"
                                                                    name="extra[instagram]"
                                                                    value="{{ old('extra.instagram') ?? ($extra['instagram'] ?? '') }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6 col-lg-4 col-md-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">LinkedIn</label>
                                                                <input type="text" class="form-control"
                                                                    name="extra[linkedin]"
                                                                    value="{{ old('extra.linkedin') ?? ($extra['linkedin'] ?? '') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-4 col-md-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">Twitter</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ old('extra.twitter') ?? ($extra['twitter'] ?? '') }}"
                                                                    name="extra[twitter]">
                                                            </div>
                                                        </div>

                                                    </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        <form action="#" id="supportTicketForm">
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
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control"
                                            placeholder="Enter the subject of your issue" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Upload File & Document</label>
                                        <input name="file1" type="file" class="dropify" data-height="100" />
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

    <!-- Delete Unit -->
    <div class="modal fade" id="delete-note-units">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="delete-popup">
                            <div class="deleteModal_icon">
                                <img src="assets/img/newimages/delectvector.gif" alt="Img" class="img-fluid">
                            </div>
                            <div class="delete-heads">
                                <h4>Are You Sure?</h4>
                                <p>Do you really want to delete this item, This process cannot be undone.</p>
                            </div>
                            <div class="modal-footer-btn delete-footer">
                                <a href="" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</a>
                                <a href="" class="btn btn-submit btndeleteAction">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Unit -->


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
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'Error!',
                        text: `Please select at least one document.`
                    });
                    return false;
                }

                $('#selected-documents-input').val(JSON.stringify(selectedIds));
            });

            $('#select-all').on('change', function() {
                $('.doc-checkbox').prop('checked', $(this).is(':checked'));
            });
        });
    </script>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- template icon upload js -->
    <script>
        document.addEventListener("change", function(event) {
            if (event.target.classList.contains("uploadProfileInput")) {
                var triggerInput = event.target;
                var currentImg = triggerInput.closest(".pic-holder").querySelector(".pic").src;
                var holder = triggerInput.closest(".pic-holder");
                var wrapper = triggerInput.closest(".profile-pic-wrapper");
                var alerts = wrapper.querySelectorAll('[role="alert"]');
                alerts.forEach(function(alert) {
                    alert.remove();
                });
                triggerInput.blur();
                var files = triggerInput.files || [];
                if (!files.length || !window.FileReader) {
                    return;
                }
                if (/^image/.test(files[0].type)) {
                    var reader = new FileReader();
                    reader.readAsDataURL(files[0]);
                    reader.onloadend = function() {
                        holder.classList.add("uploadInProgress");
                        holder.querySelector(".pic").src = this.result;
                        var loader = document.createElement("div");
                        loader.classList.add("upload-loader");
                        loader.innerHTML =
                            '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>';
                        holder.appendChild(loader);
                        setTimeout(function() {
                            holder.classList.remove("uploadInProgress");
                            loader.remove();
                            var random = Math.random();
                            if (random < 0.9) {
                                wrapper.innerHTML +=
                                    '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Logo updated successfully</div>';
                                triggerInput.value = "";
                                // Hide the label by setting opacity to 0
                                wrapper.querySelector(".upload-file-block").style.opacity = "0";
                                setTimeout(function() {
                                    wrapper.querySelector('[role="alert"]').remove();
                                }, 3000);
                            } else {
                                holder.querySelector(".pic").src = currentImg;
                                wrapper.innerHTML +=
                                    '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>';
                                triggerInput.value = "";
                                setTimeout(function() {
                                    wrapper.querySelector('[role="alert"]').remove();
                                }, 3000);
                            }
                        }, 1500);
                    };
                } else {
                    wrapper.innerHTML +=
                        '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose a valid image.</div>';
                    setTimeout(function() {
                        var invalidAlert = wrapper.querySelector('[role="alert"]');
                        if (invalidAlert) {
                            invalidAlert.remove();
                        }
                    }, 3000);
                }
            }
        });
    </script>
    <!-- template icon upload js -->
    <script src="{{ asset('common/js/form-validation.js') }}"></script>
    <script src="{{ asset('common/js/password.js') }}"></script>
    <script src="{{ asset('common/js/profile-pic.js') }}"></script>
    @include('admin.common.schedule-js')
@endpush
