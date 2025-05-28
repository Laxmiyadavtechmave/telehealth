@extends('admin.layouts.app')
@section('title', 'Tele Health Super Admin | Edit Clinic')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <div class="rightSideWrapper">
                <div
                    class="d-md-flex pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                    <div class="my-auto ">
                        <h2 class="mb-1 flexpagetitle">
                            <div class="backbtnwrap">
                                <a href="{{ route('superadmin.clinic.index') }}">
                                    <iconify-icon icon="octicon:arrow-left-24"></iconify-icon>
                                </a>
                            </div>
                            Edit Clinic
                        </h2>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">

                        <div class="ActionWrapper">

                        </div>
                        <div class="head-icons ms-2 headicon_innerpage">
                            <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-original-title="Collapse" id="collapse-header">
                                <i class="ti ti-chevrons-up"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="tablemaincard_nopaddingleftright">
                    <form action="{{ route('superadmin.clinic.update', encrypt($clinic->id)) }}"
                        class="form needs-validation" method="post" enctype="multipart/form-data" novalidate>
                        @method('patch')
                        @csrf
                        <div class="ItemContainerTop no-bg">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 class="sectionTitle working_hr_val">Basic Info</h6>
                                </div>
                                <div class="col-lg-6">
                                    <div class="ItemNewContainer1 pe-3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-3">
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

                                                                            <input class="uploadProfileInput" type="file"
                                                                                name="profile_pic" id="newProfilePhoto"
                                                                                accept="image/*" style="opacity: 0;" />
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
                                                            <div class="col-lg-9">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label for="clinic_name">Clinic Name
                                                                                <span>*</span></label>
                                                                            <input type="text" placeholder="Clinic Name"
                                                                                id="clinic_name" class="form-control"
                                                                                name="clinic_name"
                                                                                value="{{ old('clinic_name') ?? ($clinic->name ?? '') }}"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="license_no">License Number
                                                                                <span>*</span></label>
                                                                            <input type="text"
                                                                                placeholder="License Number" id="license_no"
                                                                                name="license_no" class="form-control"
                                                                                name="license_no"
                                                                                value="{{ old('license_no') ?? ($clinic->license_no ?? '') }}"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div class="form-group">
                                                                            <label for="valid_from">Valid From
                                                                                <span>*</span></label>
                                                                            <input type="text" placeholder="Valid From"
                                                                                id="valid_from"
                                                                                class="form-control customdataPicker"
                                                                                name="valid_from"
                                                                                value="{{ old('valid_from') ?? ($clinic->valid_from ?? '') }}"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div class="form-group">
                                                                            <label for="valid_to">Valid To
                                                                                <span>*</span></label>
                                                                            <input type="text" placeholder="Valid To"
                                                                                id="valid_to"
                                                                                class="form-control customdataPicker"
                                                                                name="valid_to"
                                                                                value="{{ old('valid_to') ?? ($clinic->valid_to ?? '') }}"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label for="description">Description / Bio
                                                                                <span>*</span></label>
                                                                            <textarea name="extra[description]" id="description" class="form-control" required>{{ old('description') ?? ($extra['description'] ?? '') }}</textarea>
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
                                <div class="col-lg-6">
                                    <div class="ItemNewContainer1">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="email">Email <span>*</span></label>
                                                            <input type="email" placeholder="Enter Email here.."
                                                                id="email" class="form-control"
                                                                value="{{ old('email') ?? ($clinic->email ?? '') }}"
                                                                name="email" required autocomplete="off"
                                                                pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$"
                                                                title="Please enter a valid email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group position-relative">
                                                            <label for="password">Password</label>
                                                            <input type="password" class="form-control password-field"
                                                                placeholder="Enter Password here.." name="password"
                                                                autocomplete="new-password">
                                                            <span class="toggle-password"
                                                                style="position:absolute; top:38px; right:15px; cursor:pointer;">
                                                                <iconify-icon icon="mdi:eye-off-outline"></iconify-icon>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="phone">Phone No. <span>*</span></label>
                                                            <input type="text" placeholder="Phone No." id="phone"
                                                                class="form-control" name="phone"
                                                                value="{{ old('phone') ?? ($clinic->phone ?? '') }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="web_url">Website URL</label>
                                                            <input type="text" placeholder="Website URL"
                                                                id="web_url" class="form-control" name="web_url"
                                                                value="{{ old('web_url') ?? ($clinic->web_url ?? '') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ItemContainerTop">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="ItemNewContainer1 pe-2">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h6 class="sectionTitle">Clinic Location</h6>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="ItemNewContainer1">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="address1">Address 1
                                                                            <span>*</span></label>
                                                                        <input type="text" placeholder="Address 1"
                                                                            id="address1" class="form-control"
                                                                            name="address1"
                                                                            value="{{ old('address1') ?? ($clinic->address1 ?? '') }}"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="address2">Address 2 (Optional)</label>
                                                                        <input type="text"
                                                                            placeholder="Address 2 (Optional)"
                                                                            id="address2" class="form-control"
                                                                            name="address2"
                                                                            value="{{ old('address2') ?? ($clinic->address2 ?? '') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <label for="city">Town/City
                                                                            <span>*</span></label>
                                                                        <input type="text" placeholder="Town/City"
                                                                            id="city" class="form-control"
                                                                            name="city"
                                                                            value="{{ old('city') ?? ($clinic->city ?? '') }}"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <label for="country">Country
                                                                            <span>*</span></label>
                                                                        <input type="text" placeholder="Country"
                                                                            id="country" class="form-control"
                                                                            name="country"
                                                                            value="{{ old('country') ?? ($clinic->country ?? '') }}"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <label for="postal_code">Postal Code
                                                                            <span>*</span></label>
                                                                        <input type="text" placeholder="Postal Code"
                                                                            id="postal_code" class="form-control"
                                                                            name="postal_code"
                                                                            value="{{ old('postal_code') ?? ($clinic->postal_code ?? '') }}"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="map_link">Google Maps Link
                                                                            <span>*</span></label>
                                                                        <input type="text"
                                                                            placeholder="Google Maps Link" name="map_link"
                                                                            id="map_link" required
                                                                            value="{{ old('map_link') ?? ($clinic->map_link ?? '') }}"
                                                                            class="form-control">
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
                                <div class="col-lg-6">
                                    <div class="ItemNewContainer1">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h6 class="sectionTitle">Working Days & Hour</h6>
                                            </div>
                                            <div class="col-lg-12">
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
                                                            <ul class="nav nav-tabs" id="weekTabs" role="tablist">
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
                                                                <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                                                                    id="{{ $day }}" role="tabpanel"
                                                                    aria-labelledby="{{ $day }}-tab">

                                                                    <div class="day-row" id="{{ $day }}">
                                                                        <div class="time-slots"
                                                                            id="{{ $day }}-slots">
                                                                            @if (isset($schedules[$day]))
                                                                                @foreach ($schedules[$day] as $k=>$slot)
                                                                                    <div class="time-slot">
                                                                                        <input type="text"
                                                                                            name="working_hours[{{ $day }}][slots][{{$k}}][from]"
                                                                                            value="{{ $slot->start_time ?? '' }}"
                                                                                            class="flatpickr-input form-control from-time"
                                                                                            required>
                                                                                        <span>to</span>
                                                                                        <input type="text"
                                                                                            name="working_hours[{{ $day }}][slots][{{$k}}][to]"
                                                                                            value="{{ $slot->end_time }}"
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

                                                                        <div class="form-group applyonallcheckbbox">
                                                                            <div class="form-check">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input apply-all"
                                                                                    id="applyAll{{ ucfirst($day) }}">
                                                                                <label class="form-check-label"
                                                                                    for="applyAll{{ ucfirst($day) }}">
                                                                                    Do you want to apply this on all days
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    id="NotAvailable{{ $index + 1 }}">
                                                                                <label class="form-check-label"
                                                                                    name="not_available[{{ $day }}]"
                                                                                    for="NotAvailable{{ $index + 1 }}">
                                                                                    Not Available
                                                                                </label>
                                                                            </div>
                                                                        </div>

                                                                        <button type="button"
                                                                            class="add-button addMultislot_button"
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

                        <div class="ItemContainerTop no-bg">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="ItemNewContainer1 pe-2">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h6 class="sectionTitle">Social Media Links</h6>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="ItemNewContainer1">
                                                    <div class="row mb-3">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="facebook">Facebook </label>
                                                                <input type="text" placeholder="Enter Url"
                                                                    id="facebook" class="form-control"
                                                                    name="extra[facebook]"
                                                                    value="{{ old('extra.facebook') ?? ($extra['facebook'] ?? '') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="#">Instagram</label>
                                                                <input type="text" placeholder="Enter Url"
                                                                    id="name" class="form-control"
                                                                    name="extra[instagram]"
                                                                    value="{{ old('extra.instagram') ?? ($extra['instagram'] ?? '') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="#">LinkedIn</label>
                                                                <input type="text" placeholder="Enter Url"
                                                                    id="name" class="form-control"
                                                                    name="extra[linkedin]"
                                                                    value="{{ old('extra.linkedin') ?? ($extra['linkedin'] ?? '') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="#">Twitter</label>
                                                                <input type="text" placeholder="Enter Url"
                                                                    id="name" class="form-control"
                                                                    value="{{ old('extra.twitter') ?? ($extra['twitter'] ?? '') }}"
                                                                    name="extra[twitter]">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="ItemNewContainer1">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h6 class="sectionTitle">Upload Clinic Document Images</h6>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="card selected">

                                                    <div class="card-body">
                                                        <div class="adding_fildswrap multipleimage_wrap">
                                                            <!-- Product Gallery Images Section -->
                                                            <div class="image-gallery" id="imageGalleryNew"
                                                                style="display: none;">
                                                                <!-- Placeholder for uploaded images -->
                                                            </div>

                                                            <!-- Add Product Gallery Images Link -->
                                                            <div class="addgaller_action">
                                                                <a href="#"
                                                                    class="text-primary d-inline-flex justify-content-center addgallery_btn btnComn_add_lightbg"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#uploadModalNew"
                                                                    style="display: none;">
                                                                    <iconify-icon
                                                                        icon="octicon:feed-plus-16"></iconify-icon> Add
                                                                    Document
                                                                    Images
                                                                </a>
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

                        <div class="FormSubmit_fix_container">
                            <a href="javascript:void(0)">
                                <button type="submit" class="btn btn-primary commonUpdateButton">
                                    <iconify-icon icon="mynaui:save"></iconify-icon> Submit & Save
                                </button>
                            </a>

                            <a href="{{ route('superadmin.clinic.index') }}">
                                <button type="button" class="btn commonCancleButton">
                                    Cancel
                                </button>
                            </a>
                        </div>
                    </form>

                </div>

            </div>
        </div>

    </div>


    <div class="modal fade" id="uploadModalNew" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Clinic Document Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Drag and Drop Upload Area -->
                    <div id="uploadAreaNew" class="upload-area">
                        Drag & drop images here or click to upload
                        <input type="file" id="imageInputNew" accept="image/*,.pdf,.doc,.docx" style="display: none;"
                            multiple />
                    </div>
                    <!-- Upload Loader -->
                    <div class="loaderCenter">
                        <div class="loader" id="uploadLoaderNew">

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class=" brnmodalclose" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addImageBtnNew">Add Images</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_scripts')
    <script src="{{ asset('common/js/form-validation.js') }}"></script>
    <script>
        /******************************* clinic profile image ***********************/
        $(document).on("change", ".uploadProfileInput", function() {
            const triggerInput = $(this);
            const wrapper = triggerInput.closest(".profile-pic-wrapper");
            const holder = triggerInput.closest(".pic-holder");
            const pic = holder.find(".pic");
            const currentImg = pic.attr("src");
            const file = this.files[0];

            // Remove old alerts/snackbars
            wrapper.find('[role="alert"]').remove();

            if (!file || !window.FileReader) return;

            // Validate file type
            if (!file.type.match(/^image/)) {
                wrapper.append(
                    '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose a valid image.</div>'
                );
                setTimeout(() => {
                    wrapper.find('[role="alert"]').remove();
                }, 3000);
                return;
            }

            // Validate file size (5MB max)
            if (file.size > 5 * 1024 * 1024) {
                wrapper.append(
                    '<div class="alert alert-danger d-inline-block p-2 small" role="alert">File size must be less than 5MB.</div>'
                );
                setTimeout(() => {
                    wrapper.find('[role="alert"]').remove();
                }, 3000);
                return;
            }

            const reader = new FileReader();
            reader.onloadend = function() {
                holder.addClass("uploadInProgress");
                pic.attr("src", this.result);

                const loader = $('<div class="upload-loader"></div>').html(
                    '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>'
                );
                holder.append(loader);

                setTimeout(() => {
                    holder.removeClass("uploadInProgress");
                    loader.remove();

                    // Simulate random success/failure
                    const random = Math.random();
                    if (random < 0.9) {
                        // wrapper.append(
                        //     '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Image uploaded successfully</div>'
                        // );
                        // triggerInput.val("");
                        wrapper.find(".upload-file-block").css("opacity", "0");

                        setTimeout(() => {
                            wrapper.find('[role="alert"]').remove();
                        }, 3000);
                    } else {
                        pic.attr("src", currentImg);
                        wrapper.append(
                            '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There was an error while uploading! Please try again later.</div>'
                        );
                        triggerInput.val("");
                        setTimeout(() => {
                            wrapper.find('[role="alert"]').remove();
                        }, 3000);
                    }
                }, 1500);
            };

            reader.readAsDataURL(file);
        });
    </script>
    @include('admin.common.schedule-js')
@endpush
