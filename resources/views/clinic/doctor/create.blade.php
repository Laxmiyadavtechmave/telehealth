@extends('clinic.layouts.app')
@section('title', 'Tele Health Clinic Admin | Doctor-create')
@section('content')

    <div class="page-wrapper">
        <div class="content">

            <div class="rightSideWrapper">
                <div
                    class="d-md-flex pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                    <div class="my-auto ">
                        <h2 class="mb-1 flexpagetitle">
                            <div class="backbtnwrap">
                                <a href="{{ route('clinic.doctor.index') }}">
                                    <iconify-icon icon="octicon:arrow-left-24"></iconify-icon>
                                </a>
                            </div>
                            New Doctor
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
                    <form id="clinicForm" action="{{ route('clinic.doctor.store') }}" class="form needs-validation"
                        method="post" enctype="multipart/form-data" novalidate>
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
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="name">Doctor Name
                                                                                <span>*</span></label>
                                                                            <input type="text" placeholder="Doctor Name"
                                                                                id="name" value="{{ old('name') }}"
                                                                                class="form-control" name="name"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="#">Date of Birth
                                                                                (DOB) </label>
                                                                            <input type="text"
                                                                                placeholder="Date of Birth (DOB)"
                                                                                id="dob" name="extra[dob]"
                                                                                value="{{ old('extra.dob') }}"
                                                                                class="form-control customdataPicker">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="#">Gender
                                                                                <span>*</span></label>
                                                                            <select class="select2 form-control"
                                                                                data-placeholder="Select Gender"
                                                                                name="gender" id="gender" required>
                                                                                <option value=""></option>
                                                                                <option value="male"
                                                                                    {{ old('gender') == 'male' ? 'selected' : '' }}>
                                                                                    Male</option>
                                                                                <option value="female"
                                                                                    {{ old('gender') == 'female' ? 'selected' : '' }}>
                                                                                    Female</option>
                                                                                <option value="other"
                                                                                    {{ old('gender') == 'other' ? 'selected' : '' }}>
                                                                                    Other</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="#">Marital Status</label>
                                                                            <select class="js-example-basic-single select2"
                                                                                name="marital_status" id="marital_status">
                                                                                <option value="" disabled selected>
                                                                                    Select Type</option>
                                                                                <option value="married"
                                                                                    {{ old('marital_status') == 'married' ? 'selected' : '' }}>
                                                                                    Married</option>
                                                                                <option value="single"
                                                                                    {{ old('marital_status') == 'single' ? 'selected' : '' }}>
                                                                                    Single</option>
                                                                            </select>
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
                                                            <label for="#">Email <span>*</span></label>
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
                                                            <input type="password" name="password" id="password"
                                                                class="pass-input form-control" placeholder="********"
                                                                min="6" style="width: 100%; padding-right: 40px;"
                                                                autocomplete="new-password" required />

                                                            <span
                                                                style="position:absolute; top:38px; right:15px; cursor:pointer;">
                                                                <iconify-icon icon="mdi:eye"
                                                                    id="togglePassword"></iconify-icon>
                                                            </span>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Phone No. <span>*</span></label>
                                                            <input type="text" placeholder="Phone No." id="phone"
                                                                class="form-control" name="phone"
                                                                value="{{ old('phone') }}" maxlength="13"
                                                                minlength="8"
                                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,13);"
                                                                pattern="\d{8,13}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">National ID</label>
                                                            <input type="text" placeholder="National ID"
                                                                id="national_id" name="extra[national_id]"
                                                                class="form-control" required
                                                                value="{{ old('extra.national_id') }}">
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="ItemNewContainer1">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">

                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="address1">Address 1
                                                                <span>*</span></label>
                                                            <input type="text" placeholder="Address 1" id="address1"
                                                                class="form-control" name="address1"
                                                                value="{{ old('address1') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="address2">Address 2 (Optional)</label>
                                                            <input type="text" placeholder="Address 2 (Optional)"
                                                                id="address2" class="form-control" name="address2"
                                                                value="{{ old('address2') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="city">Town/City
                                                                <span>*</span></label>
                                                            <input type="text" placeholder="Town/City" id="city"
                                                                class="form-control" name="city"
                                                                value="{{ old('city') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="country">Country
                                                                <span>*</span></label>
                                                            <input type="text" placeholder="Country" id="country"
                                                                class="form-control" name="country"
                                                                value="{{ old('country') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="postal_code">Postal Code
                                                                <span>*</span></label>
                                                            <input type="text" placeholder="Postal Code"
                                                                id="postal_code" class="form-control" name="postal_code"
                                                                value="{{ old('postal_code') }}" required>
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
                                                <h6 class="sectionTitle">Professional Details</h6>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Degree <span>*</span></label>
                                                            <input type="text" placeholder="Degree" id="name"
                                                                class="form-control" name="extra[degree]"
                                                                value="{{ old('extra.degree') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">License Number <span>*</span></label>
                                                            <input type="text" placeholder="License Number"
                                                                id="license_no" name="license_no"
                                                                value="{{ old('license_no') }}" class="form-control"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="valid_from">Valid From
                                                                <span>*</span></label>
                                                            <input type="text" placeholder="Valid From"
                                                                id="valid_from" class="form-control customdataPicker"
                                                                name="valid_from" value="{{ old('valid_from') }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="valid_to">Valid To
                                                                <span>*</span></label>
                                                            <input type="text" placeholder="Valid To" id="valid_to"
                                                                class="form-control customdataPicker" name="valid_to"
                                                                value="{{ old('valid_to') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Specialization <span>*</span></label>
                                                            @php
                                                                $selectedSpecIds = old('specilization');
                                                            @endphp

                                                            <select name="specilization[]" class="select"
                                                                id="specilization" multiple required>
                                                                @if (count($specilization) > 0)
                                                                    @foreach ($specilization as $expertise)
                                                                        <option value="{{ $expertise->id }}"
                                                                            title="{{ $expertise->description ?? '' }}"
                                                                            {{ is_array($selectedSpecIds) && in_array($expertise->id, $selectedSpecIds) ? 'selected' : '' }}>
                                                                            {{ $expertise->name ?? '' }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="experience">
                                                                Years of Experience <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="number" min="1" id="experience"
                                                                name="extra[experience]" class="form-control"
                                                                value="{{ old('extra.experience') }}" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Consultation Type<div
                                                                    class="requiredLabel">*</div></label>
                                                            <div
                                                                class="dropdown filterdropDownCustom available-users-dropdown-wrapper">
                                                                <button class="dropbtn dropdown-toggle dropmenuBtn"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    <span class="selected-count">Select Type</span>
                                                                </button>
                                                                <div
                                                                    class="dropdown-menu customdropdownmenu_style available-users-dropdown">
                                                                    <div class="filTerSearchMain">
                                                                        <input type="text"
                                                                            class="filterclSearch available-users-search"
                                                                            placeholder="Search here...">
                                                                        <iconify-icon icon="basil:search-outline">
                                                                        </iconify-icon>
                                                                    </div>
                                                                    <div class="sellallitemsMain">
                                                                        <div class="CustomselectallContainer">
                                                                            <input type="checkbox"
                                                                                class="select-all-available-users form-check-input">
                                                                            Select All
                                                                        </div>
                                                                        <div class="clDivider_full"></div>
                                                                    </div>
                                                                    <div class="Customdrpitems_container">
                                                                        <div class="mainoptionContainer">
                                                                            <div class="dropfilter_options">
                                                                                <input type="checkbox"
                                                                                    class="individual-option form-check-input"
                                                                                    data-type="physical">
                                                                                Physical
                                                                            </div>
                                                                        </div>
                                                                        <div class="mainoptionContainer">
                                                                            <div class="dropfilter_options">
                                                                                <input type="checkbox"
                                                                                    class="individual-option form-check-input"
                                                                                    data-type="audio">
                                                                                Audio
                                                                            </div>
                                                                        </div>
                                                                        <div class="mainoptionContainer">
                                                                            <div class="dropfilter_options">
                                                                                <input type="checkbox"
                                                                                    class="individual-option form-check-input"
                                                                                    data-type="video">
                                                                                Video
                                                                            </div>
                                                                        </div>
                                                                        <div class="mainoptionContainer">
                                                                            <div class="dropfilter_options">
                                                                                <input type="checkbox"
                                                                                    class="individual-option form-check-input"
                                                                                    data-type="chat">
                                                                                Chat
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <p class="no-data" style="display: none;">No
                                                                        data
                                                                        found</p>
                                                                </div>
                                                            </div>

                                                            <div class="consultation-type-error mt-1"
                                                                style="display:none;color:#dc3545;font-size: .875em;">
                                                                This Field is required
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Languages Spoken</label>
                                                            <input type="text" placeholder="eg. Hindi,English etc."
                                                                id="lang" class="form-control" name="extra[lang]"
                                                                value="{{ old('extra.lang') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="#">Bio</label>
                                                            <textarea name="extra[bio]" id="bio" placeholder="Enter here.." class="form-control">{{ old('extra.bio') }}</textarea>
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
                                                <h6 class="sectionTitle">Professional Availability</h6>
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
                                                                            id="{{ $day }}-slots"></div>

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
                                                                                    id="NotAvailable{{ $index + 1 }}"
                                                                                    name="not_available[{{ $day }}]">
                                                                                <label class="form-check-label"
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
                        <div class="ItemContainerTop no-bg fee_management" style="display: none">

                            <div class="row">
                                <div class="col-lg-8">
                                    <h6 class="sectionTitle">Consultation Fee Management</h6>
                                    <div class="ItemNewContainer1">
                                        @foreach (['audio', 'video', 'physical', 'chat'] as $type)
                                            <div class="consultation-fee-block" data-type="{{ strtolower($type) }}"
                                                style="display: none;">
                                                {{-- <input type="hidden" name="consultation[{{ $type }}][selected]"
                                                    value="1"> --}}

                                                @if ($type !== 'chat')
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <label>Consultation Type <span>*</span></label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ ucfirst($type) }}" readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <label>Duration (Min) <span>*</span></label>
                                                                <input type="number"
                                                                    name="consultation[{{ $type }}][duration]"
                                                                    class="form-control" value="30">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <label>Price <span>*</span></label>
                                                               <input type="text"
                                                                    name="consultation[{{ $type }}][price]"
                                                                    class="form-control"
                                                                    value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
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

                            <a href="{{ route('clinic.doctor.index') }}">
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

@endsection
@push('custom_scripts')
    <script src="{{ asset('common/js/form-validation.js') }}"></script>
    <script src="{{ asset('common/js/password.js') }}"></script>
    <script src="{{ asset('common/js/profile-pic.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.individual-option').on('change', function() {
                let selectedTypes = [];

                $('.individual-option').each(function() {
                    let type = $(this).data('type').toLowerCase(); // always lowercase
                    let isChecked = $(this).is(':checked');

                    let block = $('.consultation-fee-block[data-type="' + type + '"]');
                    block.toggle(isChecked); // show/hide block

                    const inputs = block.find('input');

                    if (isChecked) {
                        selectedTypes.push(type);
                        inputs.prop('disabled', false);

                        if (type !== 'chat') {
                            block.find(`input[name="consultation[${type}][duration]"]`)
                                .prop('required', true)
                                .removeClass('is-invalid');

                            block.find(`input[name="consultation[${type}][price]"]`)
                                .prop('required', true)
                                .removeClass('is-invalid');
                        }

                        // Add hidden selected marker if not already present
                        if (block.find(`input[name="consultation[${type}][selected]"]`).length ===
                            0) {
                            block.append(
                                `<input type="hidden" name="consultation[${type}][selected]" value="1">`
                            );
                        }

                    } else {
                        inputs.prop('disabled', true);

                        // Remove required and invalid if unchecked
                        block.find(`input[name="consultation[${type}][duration]"]`)
                            .removeAttr('required')
                            .removeClass('is-invalid');

                        block.find(`input[name="consultation[${type}][price]"]`)
                            .removeAttr('required')
                            .removeClass('is-invalid');

                        block.find(`input[name="consultation[${type}][selected]"]`).remove();
                    }
                });

                $('.fee_management').toggle(selectedTypes.length > 0);
            });

            $('.select-all-available-users').on('change', function() {
                $('.individual-option').prop('checked', $(this).prop('checked')).trigger('change');
            });

            // Trigger on load
            $('.available-users-search').on('keyup', function() {
                let searchTerm = $(this).val().toLowerCase();
                let $options = $('.Customdrpitems_container .mainoptionContainer');
                let matched = 0;

                $options.each(function() {
                    let label = $(this).text().toLowerCase();
                    if (label.indexOf(searchTerm) > -1) {
                        $(this).show();
                        matched++;
                    } else {
                        $(this).hide();
                    }
                });

                // Show/hide "No data found" message
                $('.no-data').toggle(matched === 0);

                // Show/hide "Select All" checkbox block
                $('.sellallitemsMain').toggle(matched > 0);
            });

            // Optional: Clear search on dropdown close
            $('.available-users-dropdown-wrapper .dropdown-toggle').on('hide.bs.dropdown', function() {
                $('.available-users-search').val('').trigger('keyup');
            });
        });

        $('form').on('submit', function(e) {
            let atLeastOneSelected = $('.individual-option:checked').length > 0;

            if (!atLeastOneSelected) {
                e.preventDefault(); // stop form submission
                $('.consultation-type-error').show();
                $('.dropbtn').addClass('border-danger');
            } else {
                $('.consultation-type-error').hide();
                $('.dropbtn').removeClass('border-danger');
            }
        });
    </script>
    @include('admin.common.schedule-js')
@endpush
