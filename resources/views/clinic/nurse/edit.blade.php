@extends('clinic.layouts.app')
@section('title', 'Tele Health Clinic Admin | Nurse-edit')
@section('content')

    <div class="page-wrapper">
        <div class="content">

            <div class="rightSideWrapper">
                <div
                    class="d-md-flex pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                    <div class="my-auto ">
                        <h2 class="mb-1 flexpagetitle">
                            <div class="backbtnwrap">
                                <a href="nurse.php">
                                    <iconify-icon icon="octicon:arrow-left-24"></iconify-icon>
                                </a>
                            </div>
                            Edit Nurse Detail
                        </h2>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">

                        <div class="ActionWrapper">
                            <!-- <a href="#" class="btn btn-primary d-flex align-items-center cmnaddbtn">
                            <iconify-icon icon="fluent-mdl2:add-to"></iconify-icon> Add New Item
                        </a> -->
                            <!-- <a href="sales-return-new.php" class="btn btn-info d-flex align-items-center cmnaddbtn">
                         <iconify-icon icon="carbon:return"></iconify-icon> Sales Return
                        </a> -->
                            <!-- <a href="nurse.php" class="AttchmentBtn"><iconify-icon icon="typcn:arrow-back-outline"></iconify-icon> Back</a> -->
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
                    <form action="{{ route('clinic.nurse.update', ['nurse' => $nurse->id]) }}"
                        class="form needs-validation" method="post" enctype="multipart/form-data" novalidate>
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
                                                                            <!-- uploaded pic shown here -->
                                                                            <img id="profilePic" class="pic"
                                                                                src="">

                                                                            <Input class="uploadProfileInput" type="file"
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
                                                                                        Update <br /> Profile Photo
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
                                                                            <label for="#">Nurse Name</label>
                                                                            <input type="text" placeholder="Nurse Name"
                                                                                id="name" class="form-control"
                                                                                name="name" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="#">Date of Birth
                                                                                (DOB)</label>
                                                                            <input type="text"
                                                                                placeholder="Date of Birth (DOB)"
                                                                                id="name"
                                                                                class="form-control customdataPicker"
                                                                                name="dob" value="{{ old('dob') }}"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="#">Gender</label>
                                                                            <select class="select2 form-control"
                                                                                data-placeholder="Select Gender"
                                                                                name="gender" required>
                                                                                <option value="" selected disabled>
                                                                                </option>
                                                                                <option value="Male"
                                                                                    {{ old('gender') == 'Male' ? 'selected' : '' }}>
                                                                                    Male</option>
                                                                                <option value="Female"
                                                                                    {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                                                                    Female</option>
                                                                                <option value="Other"
                                                                                    {{ old('gender') == 'Other' ? 'selected' : '' }}>
                                                                                    Other</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="#">Marital Status</label>
                                                                            <select class="js-example-basic-single select2"
                                                                                data-placeholder='Select Type'
                                                                                name="marital_status" required>
                                                                                <option value="" selected disabled>

                                                                                </option>
                                                                                <option value="Married"
                                                                                    {{ old('marital_status') == 'Married' ? 'selected' : '' }}>
                                                                                    Married</option>
                                                                                <option value="Unmarried"
                                                                                    {{ old('marital_status') == 'Unmarried' ? 'selected' : '' }}>
                                                                                    Unmarried</option>
                                                                                <option value="Single"
                                                                                    {{ old('marital_status') == 'Single' ? 'selected' : '' }}>
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
                                                            <label for="#">Email</label>
                                                            <input type="email" id="name" class="form-control"
                                                                value="{{ old('email') }}" name="email" required
                                                                autocomplete="off" pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$"
                                                                title="Please enter a valid email" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group position-relative">
                                                            <label for="#">Password <span>*</span></label>
                                                            <input type="password" class="form-control password-field"
                                                                placeholder="Enter Password here.." name="password"
                                                                required>
                                                            <span class="toggle-password"
                                                                style="position:absolute; top:38px; right:15px; cursor:pointer;">
                                                                <iconify-icon icon="mdi:eye-off-outline"></iconify-icon>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Phone No.</label>
                                                            <input type="text" placeholder="Phone No." id="name"
                                                                class="form-control" name="phone"
                                                                value="{{ request('phone') }}" maxlength="13"
                                                                minlength="8"
                                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,13);"
                                                                pattern="\d{8,13}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">National ID</label>
                                                            <input type="text" placeholder="National ID"
                                                                id="name" class="form-control" name="national_id"
                                                                value = "{{ old('national_id') }}" required>
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
                                                            <label for="#">Address 1</label>
                                                            <input type="text" placeholder="Address 1" id="name"
                                                                class="form-control" name="address1"
                                                                value="{{ old('address1') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="#">Address 2 (Optional)</label>
                                                            <input type="text" placeholder="Address 1" id="name"
                                                                class="form-control" name="address2"
                                                                value="{{ old('address2') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="#">Town/City</label>
                                                            <input type="text" placeholder="Town/City" id="name"
                                                                class="form-control" name="city"
                                                                value="{{ old('city') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="#">Country</label>
                                                            <input type="text" placeholder="country" id="name"
                                                                class="form-control" name="country"
                                                                value="{{ old('country') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="#">Postal Code</label>
                                                            <input type="text" placeholder="Postal Code"
                                                                id="name" class="form-control" name="postal_code"
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
                                <div class="col-lg-12">
                                    <div class="ItemNewContainer1 pe-2">
                                        <div class="row mb-3">
                                            <div class="col-lg-12">
                                                <h6 class="sectionTitle">Professional Details</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Qualification</label>
                                                            <input type="text"
                                                                placeholder="eg. Diploma, B.Sc Nursing, GNM, etc."
                                                                id="name" class="form-control" name="qualification"
                                                                value="{{ old('qualification') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="#">Select Doctor</label>
                                                            <select class="select" data-placeholder='Select Doctor'
                                                                name="doctor_id" required>
                                                                <option value="" selected></option>
                                                                <option value="1">Dr. John Smith</option>
                                                                <option value="2">Dr. Emily Johnson</option>
                                                                <option value="3">Dr. Michael Brown</option>
                                                                <option value="4">Dr. Sarah Davis</option>
                                                                <option value="5">Dr. William Martinez</option>
                                                                <option value="6">Dr. Linda Thompson</option>
                                                                <option value="7">Dr. James Wilson</option>
                                                                <option value="8">Dr. Olivia Taylor</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="#">Role Type</label>
                                                            <select class="select" data-placeholder='Select Role'
                                                                name="role_id" required>
                                                                <option value="" selected></option>
                                                                <option value="1">Jr. Nurse</option>
                                                                <option value="2">Sr. Nurse</option>
                                                                <option value="3">Visiting Nurse</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">License Number</label>
                                                            <input type="text" placeholder="License Number"
                                                                id="name" class="form-control" name="license_no"
                                                                value="{{ old('license_no') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="#">Valid From</label>
                                                            <input type="text" placeholder="Valid From" id="name"
                                                                class="form-control customdataPicker" name="valid_from"
                                                                value="{{ old('valid_from') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="#">Valid To</label>
                                                            <input type="text" placeholder="Valid To" id="name"
                                                                class="form-control customdataPicker" name="valid_to"
                                                                value="{{ old('valid_to') }}" required>
                                                        </div>
                                                    </div>


                                                </div>


                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="#">Areas of Expertise</label>
                                                            {{-- <input type="text"
                                                                placeholder="e.g., ICU, Pediatrics, Surgical ward"
                                                                id="name" class="form-control"> --}}
                                                            <select name="area_expertise_id[]" class="select"
                                                                id="" multiple required>
                                                                @if (count($areaExpertises) > 0)
                                                                    @foreach ($areaExpertises as $expertise)
                                                                        <option value="{{ $expertise->id }}"
                                                                            title="{{ $expertise->description }}"
                                                                            {{ is_array(old('area_expertise_id')) && in_array($expertise->id, old('area_expertise_id')) ? 'selected' : '' }}>
                                                                            {{ $expertise->name }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Years of Experience</label>
                                                            <input type="number" min=1 placeholder="" id="name"
                                                                class="form-control" name="year_of_experience"
                                                                value="year_of_experience"
                                                                value="{{ old('year_of_experience') }}" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Languages Spoken</label>
                                                            <input type="text" placeholder="eg. Hindi,English etc."
                                                                id="name" class="form-control" name="language"
                                                                value="{{ old('language') }}" required>
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

                                <button type="submit" class="btn btn-primary commonUpdateButton">
                                    <iconify-icon icon="mynaui:save"></iconify-icon> Submit & Save
                                </button>


                            <a href="{{ route('clinic.nurse.index') }}">
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
    </div>


    </div>
    </div>
@endsection

@push('custom_scripts')
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
                                    '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Patient Profile updated successfully</div>';
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
    <!-- custom multiple select js start -->
    <script>
        $(document).ready(function() {
            // Update the count of selected options
            function updateSelectedCount(dropdownWrapper) {
                const selectedCount = dropdownWrapper.find(".individual-option:checked").length;
                const selectedCountElement = dropdownWrapper.find(".selected-count");
                if (selectedCount === 0) {
                    selectedCountElement.text("Select Location");
                } else if (selectedCount === 1) {
                    selectedCountElement.text("1 selected");
                } else {
                    selectedCountElement.text(`${selectedCount} selected`);
                }
            }
            // Handle Select All checkbox
            $(".select-all-available-users").on("change", function() {
                const dropdownWrapper = $(this).closest(".available-users-dropdown-wrapper");
                const isChecked = $(this).prop("checked");
                dropdownWrapper.find(".individual-option").prop("checked", isChecked);
                updateSelectedCount(dropdownWrapper);
            });
            // Handle individual option selection
            $(".individual-option").on("change", function() {
                const dropdownWrapper = $(this).closest(".available-users-dropdown-wrapper");
                const totalOptions = dropdownWrapper.find(".individual-option").length;
                const selectedOptions = dropdownWrapper.find(".individual-option:checked").length;
                // Toggle the Select All checkbox
                dropdownWrapper.find(".select-all-available-users").prop("checked", totalOptions ===
                    selectedOptions);
                updateSelectedCount(dropdownWrapper);
            });
            // Reset Filter button
            $(".reset-filter").on("click", function() {
                const dropdownWrapper = $(this).closest(".available-users-dropdown-wrapper");
                dropdownWrapper.find(".individual-option").prop("checked", false);
                dropdownWrapper.find(".select-all-available-users").prop("checked", false);
                updateSelectedCount(dropdownWrapper);
            });
            // Apply Filter button
            $(".apply-filter").on("click", function() {
                const dropdownWrapper = $(this).closest(".available-users-dropdown-wrapper");
                const selectedItems = dropdownWrapper.find(".individual-option:checked").map(
                    function() {
                        return $(this).parent().text().trim();
                    }).get();
                console.log("Selected Items:", selectedItems);
            });
            // Filter search functionality
            $(".available-users-search").on("keyup", function() {
                const dropdownWrapper = $(this).closest(".available-users-dropdown-wrapper");
                const searchTerm = $(this).val().toLowerCase();
                const options = dropdownWrapper.find(".mainoptionContainer");
                options.filter(function() {
                    $(this).toggle($(this).text().toLowerCase().includes(searchTerm));
                });
                const noDataMessage = dropdownWrapper.find(".no-data");
                noDataMessage.toggle(options.filter(":visible").length === 0);
            });
        });
    </script>
    <!-- end -->
    <!-----------------------------------
    Password Hide and show js start here
    ------------------------------------->
    <script>
        $(document).on('click', '.toggle-password', function() {
            const input = $(this).siblings('.password-field');
            const type = input.attr('type') === 'password' ? 'text' : 'password';
            input.attr('type', type);

            const icon = type === 'password' ? 'mdi:eye-off-outline' : 'mdi:eye-outline';
            $(this).html(`<iconify-icon icon="${icon}"></iconify-icon>`);
        });
    </script>
    <!-----------------------------------
    Password Hide and show js End here
    ------------------------------------->
@endpush
