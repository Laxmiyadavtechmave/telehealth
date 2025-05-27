@extends('admin.layouts.app')
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
                            New Clinic
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
                    <form action="{{ route('superadmin.clinic.store') }}" class="form needs-validation" method="post"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="ItemContainerTop no-bg">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 class="sectionTitle">Basic Info</h6>
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
                                                                            <img id="profilePic" class="pic"
                                                                                src="">

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
                                                                                value="{{ old('clinic_name') }}" required>
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
                                                                                value="{{ old('license_no') }}" required>
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
                                                                                value="{{ old('valid_from') }}" required>
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
                                                                                value="{{ old('valid_to') }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label for="description">Description / Bio
                                                                                <span>*</span></label>
                                                                            <textarea name="extra[description]" id="description" class="form-control" required>{{ old('description') }}</textarea>
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
                                                                value="{{ old('email') }}" name="email" required
                                                                autocomplete="off" pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$"
                                                                title="Please enter a valid email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group position-relative">
                                                            <label for="password">Password <span>*</span></label>
                                                            <input type="password" class="form-control password-field"
                                                                placeholder="Enter Password here.." name="password"
                                                                autocomplete="new-password" required>
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
                                                                value="{{ old('phone') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="web_url">Website URL</label>
                                                            <input type="text" placeholder="Website URL"
                                                                id="web_url" class="form-control" name="web_url"
                                                                value="{{ old('web_url') }}">
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
                                                                            name="address1" value="{{ old('address1') }}"
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
                                                                            value="{{ old('address2') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <label for="city">Town/City
                                                                            <span>*</span></label>
                                                                        <input type="text" placeholder="Town/City"
                                                                            id="city" class="form-control"
                                                                            name="city" value="{{ old('city') }}"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <label for="country">Country
                                                                            <span>*</span></label>
                                                                        <input type="text" placeholder="Country"
                                                                            id="country" class="form-control"
                                                                            name="country" value="{{ old('country') }}"
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
                                                                            value="{{ old('postal_code') }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="map_link">Google Maps Link
                                                                            <span>*</span></label>
                                                                        <input type="text"
                                                                            placeholder="Google Maps Link" id="map_link"
                                                                            id="map_link" required
                                                                            value="{{ old('map_link') }}"
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
                                                        <div class="WeekDays_row">
                                                            <ul class="nav nav-tabs" id="weekTabs" role="tablist">
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link active" id="monday-tab"
                                                                        data-bs-toggle="tab" data-bs-target="#monday"
                                                                        type="button" role="tab"
                                                                        aria-controls="monday"
                                                                        aria-selected="true">Monday</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link" id="tuesday-tab"
                                                                        data-bs-toggle="tab" data-bs-target="#tuesday"
                                                                        type="button" role="tab"
                                                                        aria-controls="tuesday"
                                                                        aria-selected="false">Tuesday</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link" id="wednesday-tab"
                                                                        data-bs-toggle="tab" data-bs-target="#wednesday"
                                                                        type="button" role="tab"
                                                                        aria-controls="wednesday"
                                                                        aria-selected="false">Wednesday</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link" id="thursday-tab"
                                                                        data-bs-toggle="tab" data-bs-target="#thursday"
                                                                        type="button" role="tab"
                                                                        aria-controls="thursday"
                                                                        aria-selected="false">Thursday</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link" id="friday-tab"
                                                                        data-bs-toggle="tab" data-bs-target="#friday"
                                                                        type="button" role="tab"
                                                                        aria-controls="friday"
                                                                        aria-selected="false">Friday</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link" id="saturday-tab"
                                                                        data-bs-toggle="tab" data-bs-target="#saturday"
                                                                        type="button" role="tab"
                                                                        aria-controls="saturday"
                                                                        aria-selected="false">Saturday</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link" id="sunday-tab"
                                                                        data-bs-toggle="tab" data-bs-target="#sunday"
                                                                        type="button" role="tab"
                                                                        aria-controls="sunday"
                                                                        aria-selected="false">Sunday</button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="tab-content" id="weekTabContent">
                                                            <div class="tab-pane fade show active" id="monday"
                                                                role="tabpanel" aria-labelledby="monday-tab">

                                                                <div class="day-row" id="monday">

                                                                    <div class="time-slots" id="monday-slots">

                                                                    </div>

                                                                    <div class="form-group applyonallcheckbbox">
                                                                        <div class="form-check">
                                                                            <input type="checkbox"
                                                                                class="form-check-input apply-all"
                                                                                id="applyAllMonday">
                                                                            <label class="form-check-label"
                                                                                for="applyAllMonday">Do you want to apply
                                                                                this on all days</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input type="checkbox"
                                                                                class="form-check-input"
                                                                                id="NotAvailable1">
                                                                            <label class="form-check-label"
                                                                                for="NotAvailable1">Not Available</label>
                                                                        </div>
                                                                    </div>
                                                                    <button type="button"
                                                                        class="add-button addMultislot_button"
                                                                        onclick="addSlot('monday')"><iconify-icon
                                                                            icon="basil:add-outline"></iconify-icon> Add
                                                                        Time</button>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="tuesday" role="tabpanel"
                                                                aria-labelledby="tuesday-tab">

                                                                <div class="day-row" id="tuesday">

                                                                    <div class="time-slots" id="tuesday-slots">

                                                                    </div>
                                                                    <div class="form-group applyonallcheckbbox">
                                                                        <div class="form-check">
                                                                            <input type="checkbox"
                                                                                class="form-check-input apply-all"
                                                                                id="applyAllTuesday">
                                                                            <label class="form-check-label"
                                                                                for="applyAllTuesday">Do you want to apply
                                                                                this on all days</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input type="checkbox"
                                                                                class="form-check-input"
                                                                                id="NotAvailable2">
                                                                            <label class="form-check-label"
                                                                                for="NotAvailable2">Not Available</label>
                                                                        </div>
                                                                    </div>
                                                                    <button type="button"
                                                                        class="add-button addMultislot_button"
                                                                        onclick="addSlot('tuesday')"><iconify-icon
                                                                            icon="basil:add-outline"></iconify-icon> Add
                                                                        Time</button>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="wednesday" role="tabpanel"
                                                                aria-labelledby="wednesday-tab">

                                                                <div class="day-row" id="wednesday">

                                                                    <div class="time-slots" id="wednesday-slots">

                                                                    </div>
                                                                    <div class="form-group applyonallcheckbbox">
                                                                        <div class="form-check">
                                                                            <input type="checkbox"
                                                                                class="form-check-input apply-all"
                                                                                id="applyAllWednesday">
                                                                            <label class="form-check-label"
                                                                                for="applyAllWednesday">Do you want to
                                                                                apply
                                                                                this on all days</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input type="checkbox"
                                                                                class="form-check-input"
                                                                                id="NotAvailable3">
                                                                            <label class="form-check-label"
                                                                                for="NotAvailable3">Not Available</label>
                                                                        </div>
                                                                    </div>
                                                                    <button type="button"
                                                                        class="add-button addMultislot_button"
                                                                        onclick="addSlot('wednesday')"><iconify-icon
                                                                            icon="basil:add-outline"></iconify-icon> Add
                                                                        Time</button>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="thursday" role="tabpanel"
                                                                aria-labelledby="thursday-tab">

                                                                <div class="day-row" id="thursday">

                                                                    <div class="time-slots" id="thursday-slots">

                                                                    </div>
                                                                    <div class="form-group applyonallcheckbbox">
                                                                        <div class="form-check">
                                                                            <input type="checkbox"
                                                                                class="form-check-input apply-all"
                                                                                id="applyAllThursday">
                                                                            <label class="form-check-label"
                                                                                for="applyAllThursday">Do you want to apply
                                                                                this on all days</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input type="checkbox"
                                                                                class="form-check-input"
                                                                                id="NotAvailable4">
                                                                            <label class="form-check-label"
                                                                                for="NotAvailable4">Not Available</label>
                                                                        </div>
                                                                    </div>
                                                                    <button type="button"
                                                                        class="add-button addMultislot_button"
                                                                        onclick="addSlot('thursday')"><iconify-icon
                                                                            icon="basil:add-outline"></iconify-icon> Add
                                                                        Time</button>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="friday" role="tabpanel"
                                                                aria-labelledby="friday-tab">

                                                                <div class="day-row" id="friday">

                                                                    <div class="time-slots" id="friday-slots">

                                                                    </div>
                                                                    <div class="form-group applyonallcheckbbox">
                                                                        <div class="form-check">
                                                                            <input type="checkbox"
                                                                                class="form-check-input apply-all"
                                                                                id="applyAllFriday">
                                                                            <label class="form-check-label"
                                                                                for="applyAllFriday">Do you want to apply
                                                                                this on all days</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input type="checkbox"
                                                                                class="form-check-input"
                                                                                id="NotAvailable5">
                                                                            <label class="form-check-label"
                                                                                for="NotAvailable5">Not Available</label>
                                                                        </div>
                                                                    </div>
                                                                    <button type="button"
                                                                        class="add-button addMultislot_button"
                                                                        onclick="addSlot('friday')"><iconify-icon
                                                                            icon="basil:add-outline"></iconify-icon> Add
                                                                        Time</button>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="saturday" role="tabpanel"
                                                                aria-labelledby="saturday-tab">

                                                                <div class="day-row" id="saturday">

                                                                    <div class="time-slots" id="saturday-slots">

                                                                    </div>

                                                                    <div class="form-group applyonallcheckbbox">
                                                                        <div class="form-check">
                                                                            <input type="checkbox"
                                                                                class="form-check-input apply-all"
                                                                                id="applyAllSaturday">
                                                                            <label class="form-check-label"
                                                                                for="applyAllSaturday">Do you want to apply
                                                                                this on all days</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input type="checkbox"
                                                                                class="form-check-input"
                                                                                id="NotAvailable6">
                                                                            <label class="form-check-label"
                                                                                for="NotAvailable6">Not Available</label>
                                                                        </div>
                                                                    </div>

                                                                    <button type="button"
                                                                        class="add-button addMultislot_button"
                                                                        onclick="addSlot('saturday')"><iconify-icon
                                                                            icon="basil:add-outline"></iconify-icon> Add
                                                                        Time</button>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="sunday" role="tabpanel"
                                                                aria-labelledby="sunday-tab">

                                                                <div class="day-row" id="sunday">

                                                                    <div class="time-slots" id="sunday-slots">

                                                                    </div>

                                                                    <div class="form-group applyonallcheckbbox">
                                                                        <div class="form-check">
                                                                            <input type="checkbox"
                                                                                class="form-check-input apply-all"
                                                                                id="applyAllSunday">
                                                                            <label class="form-check-label"
                                                                                for="applyAllSunday">Do you want to apply
                                                                                this on all days</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input type="checkbox"
                                                                                class="form-check-input"
                                                                                id="NotAvailable7">
                                                                            <label class="form-check-label"
                                                                                for="NotAvailable7">Not Available</label>
                                                                        </div>
                                                                    </div>
                                                                    <button type="button"
                                                                        class="add-button addMultislot_button"
                                                                        onclick="addSlot('sunday')"><iconify-icon
                                                                            icon="basil:add-outline"></iconify-icon> Add
                                                                        Time</button>
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
                                                                    value="{{ old('extra.email') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="#">Instagram</label>
                                                                <input type="text" placeholder="Enter Url"
                                                                    id="name" class="form-control"
                                                                    name="extra[instagram]"
                                                                    value="{{ old('extra.instagram') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="#">LinkedIn</label>
                                                                <input type="text" placeholder="Enter Url"
                                                                    id="name" class="form-control"
                                                                    name="extra[linkedin]"
                                                                    value="{{ old('extra.linkedin') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="#">Twitter</label>
                                                                <input type="text" placeholder="Enter Url"
                                                                    id="name" class="form-control"
                                                                    value="{{ old('extra.twitter') }}"
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

        /***************************** clinic schedules *******************/
        let applyAllSourceDay = null;

        $(document).ready(function() {
            const days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

            // Apply All Checkbox
            $('.apply-all').on('change', function() {
                const dayId = $(this).closest('.day-row').attr('id');

                if ($(this).is(':checked')) {
                    applyAllSourceDay = dayId;

                    setTimeout(() => {
                        copyTimeSlotsToAllDays(dayId);

                        // Check Apply on all other days too (visually only)
                        days.forEach(day => {
                            if (day !== dayId && !$('#NotAvailable' + (days.indexOf(day) +
                                    1)).is(':checked')) {
                                $('#applyAll' + capitalize(day)).prop('checked', true);
                            }
                        });
                    }, 100); // Delay in milliseconds
                } else {
                    applyAllSourceDay = null;

                    // Uncheck apply-all everywhere
                    days.forEach(day => {
                        $('#applyAll' + capitalize(day)).prop('checked', false);
                    });
                }
            });


            // Handle Not Available checkbox
            days.forEach((day, index) => {
                addSlot(day);
                $('#NotAvailable' + (index + 1)).on('change', function() {
                    const $slots = $('#' + day + '-slots');
                    const $addButton = $('#' + day + ' .addMultislot_button');
                    const $applyAll = $('#applyAll' + capitalize(day));

                    if ($(this).is(':checked')) {
                        $slots.hide();
                        $addButton.prop('disabled', true);
                        $applyAll.prop('checked', false).prop('disabled', true);
                    } else {
                        $slots.show();
                        $addButton.prop('disabled', false);
                        $applyAll.prop('disabled', false);
                    }
                });
            });


            initializeTimePickers();
        });



        // Copy slots from sourceDay to other days except those marked Not Available
        function copyTimeSlotsToAllDays(sourceDay) {
            const days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

            const $sourceSlots = $('#' + sourceDay + '-slots .time-slot');
            const slotsData = [];

            // Extract actual time values from the Flatpickr fields
            $sourceSlots.each(function() {
                const fromTime = $(this).find('.from-time').val();
                const toTime = $(this).find('.to-time').val();
                slotsData.push({
                    from: fromTime,
                    to: toTime
                });
            });

            // Apply to all other days
            days.forEach((day, index) => {
                if (day !== sourceDay && !$('#NotAvailable' + (index + 1)).is(':checked')) {
                    const $target = $('#' + day + '-slots');
                    $target.empty(); // Clear old slots

                    slotsData.forEach(slot => {
                        const slotHTML = `
                    <div class="time-slot">
                        <input type="text" class="form-control from-time" value="${slot.from}"> to
                        <input type="text" class="form-control to-time" value="${slot.to}">
                        <button class="deleteslot" onclick="removeSlot(this)">
                            <iconify-icon icon="proicons:delete"></iconify-icon>
                        </button>
                    </div>
                `;
                        $target.append(slotHTML);
                    });
                }
            });

            initializeTimePickers();
        }


        // Add new time slot respecting Not Available
        function addSlot(day) {
            const days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
            const index = days.indexOf(day) + 1;

            if ($('#NotAvailable' + index).is(':checked')) {
                alert(`${capitalize(day)} is marked as Not Available.`);
                return;
            }

            applyAllSourceDay = null;
            days.forEach(d => {
                $('#applyAll' + capitalize(d)).prop('checked', false);
            });


            const $container = $('#' + day + '-slots');
            $container.append(`
        <div class="time-slot">
            <input type="text" class="flatpickr-input form-control from-time"> to
            <input type="text" class="flatpickr-input form-control to-time">
            <button class="deleteslot" onclick="removeSlot(this)"><iconify-icon icon="proicons:delete"></iconify-icon></button>
        </div>
    `);
            initializeTimePickers();

            // If apply-all is active and current day is the source, propagate to others
            if (applyAllSourceDay === day) {
                copyTimeSlotsToAllDays(day);
            }
        }

        function removeSlot(button) {
            $(button).closest('.time-slot').remove();
        }

        function capitalize(word) {
            return word.charAt(0).toUpperCase() + word.slice(1);
        }

        // Initialize flatpickr on all inputs not yet initialized
        function initializeTimePickers() {
            $('.from-time').each(function() {
                if (!$(this).hasClass('flatpickr-initialized')) {
                    flatpickr(this, {
                        enableTime: true,
                        noCalendar: true,
                        dateFormat: "h:i K",
                        defaultDate: "09:00", // Default start time
                        minuteIncrement: 1,
                        onChange: validateTimeSlot
                    });
                    $(this).addClass('flatpickr-initialized');
                }
            });

            $('.to-time').each(function() {
                if (!$(this).hasClass('flatpickr-initialized')) {
                    flatpickr(this, {
                        enableTime: true,
                        noCalendar: true,
                        dateFormat: "h:i K",
                        defaultDate: "17:00", // Default end time
                        minuteIncrement: 1,
                        onChange: validateTimeSlot
                    });
                    $(this).addClass('flatpickr-initialized');
                }
            });
        }

        function validateTimeSlot(selectedDates, dateStr, instance) {
            const $slot = $(instance.element).closest('.time-slot');
            const from = $slot.find('.from-time').val();
            const to = $slot.find('.to-time').val();

            if (from && to) {
                const fromTime = parseTime(from);
                const toTime = parseTime(to);

                if (fromTime >= toTime) {
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'End time must be after start time!',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        background: '#fff',
                        color: '#333',
                    });
                    $(instance.element).val('');
                }
            }
        }

        function parseTime(timeStr) {
            const [time, meridian] = timeStr.split(' ');
            let [hours, minutes] = time.split(':').map(Number);

            if (meridian === 'PM' && hours !== 12) hours += 12;
            if (meridian === 'AM' && hours === 12) hours = 0;

            return hours * 60 + minutes;
        }


        let debounceTimer = null;

        $(document).on('change', '.from-time, .to-time', function() {
            if (!applyAllSourceDay) return;

            const $sourceInput = $(this);
            const isFrom = $sourceInput.hasClass('from-time');
            const timeIndex = $sourceInput.closest('.time-slot').index();
            const newValue = $sourceInput.val();

            clearTimeout(debounceTimer);

            debounceTimer = setTimeout(() => {
                const days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

                days.forEach((day, index) => {
                    if (day === applyAllSourceDay) return;
                    if ($('#NotAvailable' + (index + 1)).is(':checked')) return;

                    const $targetSlot = $('#' + day + '-slots .time-slot').eq(timeIndex);
                    if ($targetSlot.length) {
                        const $targetInput = isFrom ? $targetSlot.find('.from-time') : $targetSlot
                            .find('.to-time');
                        if ($targetInput.val() !== newValue) {
                            $targetInput.val(newValue);

                            if ($targetInput[0]._flatpickr) {
                                $targetInput[0]._flatpickr.setDate(newValue, true);
                            }
                        }
                    }
                });
            }, 300); // Delay ensures stability
        });
    </script>
@endpush
