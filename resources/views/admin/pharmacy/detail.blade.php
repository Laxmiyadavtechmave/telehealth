@extends('admin.layouts.app')
@section('title', 'Tele Health Super Admin | Pharmacy Detail')
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
                            <a href="{{ route('superadmin.pharmacies.index') }}">
                                <iconify-icon icon="octicon:arrow-left-24"></iconify-icon>
                            </a>
                        </div>
                        Pharmacy Details
                    </h2>
                </div>
                <div class="d-flex  right-content align-items-center flex-wrap ">
                    <ul class="tophead_action">

                        <li>
                            <div class="enquiryDate">
                                <iconify-icon icon="ion:calendar-outline"></iconify-icon> Added On : <div
                                    class="Onboarddate">
                                    {{ $pharmacy->created_at->format('d M,Y H:i a') }}</div>

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
                                                            $pharmacy->img &&
                                                            Illuminate\Support\Facades\Storage::disk('public')->exists(
                                                                $pharmacy->img,
                                                            )
                                                        ) {
                                                            $image = env('IMAGE_ROOT') . $pharmacy->img;
                                                        }

                                                    @endphp
                                                    @if (!empty($image))
                                                        <img src="{{ $image ?? '' }}" alt="img" id="blah">
                                                    @endif
                                                </div>
                                                <div class="profile-contentname">
                                                    <h2>{{ $pharmacy->name ?? '' }}</h2>
                                                    <p><a
                                                            href="mailto:{{ $pharmacy->email ?? '' }}">{{ $pharmacy->email ?? '' }}</a>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="copy-container">
                                                <span>Pharmacy ID:</span>
                                                <div class="user-id" id="userID">{{ $pharmacy->pharmacy_id ?? '' }}</div>
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
                                                        <iconify-icon icon="ion:location-outline"></iconify-icon> Pharmacy
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
                                                            Pharmacy Information</h6>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Pharmacy Name</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $pharmacy->name ?? '' }}" readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">License Number </label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $pharmacy->license_no ?? '' }}" readonly
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="mb-3">
                                                                <label class="form-label">Valid From </label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ !empty($pharmacy->valid_from) ? $pharmacy->valid_from->format('d M,Y') : 'N/A' }}"
                                                                    readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="mb-3">
                                                                <label class="form-label">Valid To</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ !empty($pharmacy->valid_to) ? $pharmacy->valid_to->format('d M,Y') : 'N/A' }}"
                                                                    readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">Email</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $pharmacy->email ?? '' }}" readonly
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">Phone No</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $pharmacy->phone ?? '' }}" readonly
                                                                    disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">Pharmacy Type</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $pharmacy->pharmacy_type ?? '' }}" readonly
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">Clinic</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $pharmacy->clinic->name ?? '' }}" readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Description / Bio</label>
                                                                <!-- <input type="email" class="form-control"
                                                                                                                                                        value="johndoe@example.com" readonly disabled> -->
                                                                <textarea class="form-control" name="" id="" readonly disabled row="4">{{ $extra['description'] ?? '' }}</textarea>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="man-password" role="tabpanel" tabindex="0">
                                                <div class="settings-page-wrap">
                                                    <div class="setting-title">
                                                        <h4>Pharmacy Location</h4>
                                                    </div>
                                                    <div class="vendortab_inrdetails">
                                                        <div class="company-info">

                                                            <div class="card-title-head ">
                                                                <h6><span><iconify-icon
                                                                            icon="ion:location-outline"></iconify-icon></span>
                                                                    Pharmacy Address
                                                                </h6>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Address 1</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $pharmacy->address1 ?? '' }}"
                                                                            readonly disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Address 2
                                                                            (optional)</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $pharmacy->address2 ?? '' }}"
                                                                            readonly disabled>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-4 col-lg-4 col-md-3">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Country</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $pharmacy->country ?? '' }}"
                                                                            readonly disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-4 col-md-3">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Town/City</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $pharmacy->city ?? '' }}" readonly
                                                                            disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-4 col-md-3">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Postal
                                                                            Code</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $pharmacy->postal_code ?? '' }}"
                                                                            readonly disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Google Maps
                                                                            Link</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $pharmacy->map_link ?? '' }}"
                                                                            readonly disabled>
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
                                                    <h4>Pharmacy Documents</h4>
                                                    <div
                                                        class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">

                                                        <form id="download-selected-form" method="POST"
                                                            action="{{ route('superadmin.pharmacy.downloadDocuments', encrypt($pharmacy->id ?? '')) }}">
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
                                                                                    round(
                                                                                        filesize($localFilePath) / 1024,
                                                                                        2,
                                                                                    ) . ' KB';
                                                                                $file_type = File::mimeType(
                                                                                    $localFilePath,
                                                                                );
                                                                            }

                                                                            $file_name = basename($doc->img);

                                                                            // Determine icon/image to show
                                                                            $isPdf = preg_match(
                                                                                '/\.pdf$/i',
                                                                                $file_name,
                                                                            );
                                                                            $isDoc = preg_match(
                                                                                '/\.(doc|docx)$/i',
                                                                                $file_name,
                                                                            );
                                                                            $isImage = preg_match(
                                                                                '/\.(jpg|jpeg|png|gif)$/i',
                                                                                $file_name,
                                                                            );

                                                                            if ($isPdf) {
                                                                                $displayImage = asset(
                                                                                    'common/img/file.png',
                                                                                ); // pdf icon
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
                                                                                <img src="{{ $displayImage ?? '' }}"
                                                                                    alt="Product" class="me-2">
                                                                                <span>{{ $file_name ?? '' }}</span>
                                                                            </a>
                                                                        </td>
                                                                        <td>{{ $doc->created_at->format('d M,Y h:i a') }}</td>
                                                                        <td>{{ $file_size ?? '' }}</td>
                                                                        <td>{{ $file_type ?? '' }}</td>
                                                                        <td>
                                                                            <div
                                                                                class="d-flex align-items-center ActionDropdown">
                                                                                <div class="d-flex">
                                                                                    <a href="{{ $filePath ?: 'javascript:void(0)' }}"
                                                                                        target="_blank"
                                                                                        class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover "
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-placement="top" title=""
                                                                                        data-bs-original-title="Preview Document"
                                                                                        type="button"><span
                                                                                            class="icon"><span
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
                                                                        value="" readonly disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Instagram</label>
                                                                    <input type="text" class="form-control"
                                                                        value="" readonly disabled>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6 col-lg-4 col-md-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label">LinkedIn</label>
                                                                    <input type="text" class="form-control"
                                                                        value="" readonly disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-4 col-md-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Twitter</label>
                                                                    <input type="text" class="form-control"
                                                                        value="" readonly disabled>
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
        @endpush
