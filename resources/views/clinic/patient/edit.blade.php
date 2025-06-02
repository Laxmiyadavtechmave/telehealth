@extends('clinic.layouts.app')
@section('title', 'Tele Health Clinic Admin | Patient-edit')
@section('content')

    <div class="page-wrapper">
        <div class="content">

            <div class="rightSideWrapper">
                <div
                    class="d-md-flex pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                    <div class="my-auto ">
                        <h2 class="mb-1 flexpagetitle">
                            <div class="backbtnwrap">
                                <a href="patients.php">
                                    <iconify-icon icon="octicon:arrow-left-24"></iconify-icon>
                                </a>
                            </div>
                            Edit Patient Detail
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
                    <form action="{{ route('clinic.patient.update', encrypt($patient->id)) }}" class="form needs-validation"
                        method="post" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
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
                                                                            @php

                                                                                $image = '';
                                                                                if (
                                                                                    $patient->img &&
                                                                                    Illuminate\Support\Facades\Storage::disk(
                                                                                        'public',
                                                                                    )->exists($patient->img)
                                                                                ) {
                                                                                    $image =
                                                                                        env('IMAGE_ROOT') .
                                                                                        $patient->img;
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
                                                                            <label for="#">Patient Name</label>
                                                                            <input type="text" placeholder="Patient Name"
                                                                                id="name" class="form-control"
                                                                                name="name" value="{{ old('name', $patient->name ?? '') }}"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="#">SSN No.</label>
                                                                            <input type="text" placeholder="SSN No."
                                                                                id="name" class="form-control"
                                                                                name="ssn" value="{{ old('ssn', $patient->ssn ?? '') }}">
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
                                                                                name="dob" value="{{ old('dob', $patient->dob ?? '') }}"
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
                                                                                    {{ old('gender', $patient->gender) == 'Male' ? 'selected' : '' }}>
                                                                                    Male</option>
                                                                                <option value="Female"
                                                                                    {{ old('gender', $patient->gender) == 'Female' ? 'selected' : '' }}>
                                                                                    Female</option>
                                                                                <option value="Other"
                                                                                    {{ old('gender', $patient->gender) == 'Other' ? 'selected' : '' }}>
                                                                                    Other</option>
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
                                                            <label for="#">Marital Status</label>
                                                            <select class="js-example-basic-single select2"
                                                                data-placeholder='Select Type' name="marital_status"
                                                                required>
                                                                <option value="" selected disabled>

                                                                </option>
                                                                <option value="Married"
                                                                    {{ old('marital_status', $patient->marital_status) == 'Married' ? 'selected' : '' }}>
                                                                    Married</option>
                                                                <option value="Unmarried"
                                                                    {{ old('marital_status', $patient->marital_status) == 'Unmarried' ? 'selected' : '' }}>
                                                                    Unmarried</option>
                                                                <option value="Single"
                                                                    {{ old('marital_status', $patient->marital_status) == 'Single' ? 'selected' : '' }}>
                                                                    Single</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Phone No.</label>
                                                            <input type="text" placeholder="Phone No." id="name"
                                                                class="form-control" name="phone"
                                                                value="{{ old('phone', $patient->phone ?? '') }}" maxlength="13"
                                                                minlength="8"
                                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,13);"
                                                                pattern="\d{8,13}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Email</label>
                                                            <input type="email" placeholder="email" id="name"
                                                                class="form-control" name="email"
                                                                value="{{ old('email', $patient->email ?? '') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">National ID</label>
                                                            <input type="text" placeholder="National ID"
                                                                id="name" class="form-control" name="national_id"
                                                                value="{{ old('national_id',$patient->national_id ?? '') }}">
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
                                                                value="{{ old('address1',$patient->address1 ?? '') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="#">Address 2 (Optional)</label>
                                                            <input type="text" placeholder="Address 1" id="name"
                                                                class="form-control" name="address2"
                                                                value="{{ old('address2',$patient->address2 ?? '') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="#">Town/City</label>
                                                            <input type="text" placeholder="Town/City" id="name"
                                                                class="form-control" name="city"
                                                                value="{{ old('city',$patient->city ?? '') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="#">Country</label>
                                                            <input type="text" placeholder="country" id="name"
                                                                class="form-control" name="country"
                                                                value="{{ old('country',$patient->country ?? '') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="#">Postal Code</label>
                                                            <input type="text" placeholder="Postal Code"
                                                                id="name" class="form-control" name="postal_code"
                                                                value="{{ old('postal_code',$patient->postal_code ?? '') }}" required>
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
                                                <h6 class="sectionTitle">Emergency Contact</h6>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="row">

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Name</label>
                                                            <input type="text" placeholder="Name" id="name"
                                                                class="form-control" name="extra[emergency_name]"
                                                                value="{{ old('extra.emergency_name',$extra['emergency_name'] ?? '') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Relation</label>
                                                            <input type="text" placeholder="Relation" id="name"
                                                                class="form-control" name="extra[emergency_relation]"
                                                                value="{{ old('extra.emergency_relation',$extra['emergency_relation'] ?? '') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Phone</label>
                                                            <input type="text" placeholder="Phone" id="name"
                                                                class="form-control" name="extra[emergency_phone]"
                                                                value="{{ old('extra.emergency_phone',$extra['emergency_phone'] ?? '') }}"
                                                                maxlength="13"
                                                                minlength="8"
                                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,13);"
                                                                pattern="\d{8,13}" required
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Email</label>
                                                            <input type="text" placeholder="Email" id="name"
                                                                class="form-control" name="extra[emergency_email]"
                                                                value="{{ old('extra.emergency_email',$extra['emergency_email'] ?? '') }}">
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
                                                <h6 class="sectionTitle">Insurance / Health Card</h6>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="row">

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Insurance provider</label>
                                                            <input type="text" placeholder="Insurance provider"
                                                                id="name" class="form-control"
                                                                name="extra[insurance_provider]"
                                                                value="{{ old('extra.insurance_provider',$extra['insurance_provider'] ?? '') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Insurance Card number</label>
                                                            <input type="text" placeholder="Card number"
                                                                id="name" class="form-control"
                                                                name="extra[card_number]"
                                                                value="{{ old('extra.card_number',$extra['card_number'] ?? '') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Expiry</label>
                                                            <input type="text" placeholder="Expiry" id="name"
                                                                class="form-control customdataPicker" name="extra[expiry]"
                                                                value="{{ old('extra.expiry',$extra['expiry'] ?? '') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Plan</label>
                                                            <input type="text" placeholder="Plan" id="name"
                                                                class="form-control" name="extra[plan]"
                                                                value="{{ old('extra.plan',$extra['plan'] ?? '') }}">
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


                            <a href="{{ route('clinic.patient.index') }}">
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
    <!-- template icon upload js -->
@endpush
