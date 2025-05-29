@extends('clinic.layouts.app')
@section('title', 'Tele Health Clinic Admin | Patient-create')
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
                    New Patient
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
                    <!-- <a href="patients.php" class="AttchmentBtn"><iconify-icon icon="typcn:arrow-back-outline"></iconify-icon> Back</a> -->
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
                <form action="#">
                    <!-- <div class="ItemContainerTop">
                        <div class="row">


                        </div>
                    </div> -->

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
                                                                    <img id="profilePic" class="pic" src="">

                                                                    <Input class="uploadProfileInput" type="file" name="profile_pic"
                                                                        id="newProfilePhoto" accept="image/*" style="opacity: 0;" />
                                                                    <label for="newProfilePhoto" class="upload-file-block">
                                                                        <div class="text-center">
                                                                            <div class="uploadicon_template">
                                                                                <iconify-icon icon="bytesize:upload"></iconify-icon>
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
                                                                        <label for="#">Patient Name</label>
                                                                        <input type="text"
                                                                            placeholder="Patient Name"
                                                                            id="name" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="#">SSN No.</label>
                                                                        <input type="text"
                                                                            placeholder="SSN No."
                                                                            id="name" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="#">Date of Birth (DOB)</label>
                                                                        <input type="text"
                                                                            placeholder="Date of Birth (DOB)"
                                                                            id="name" class="form-control customdataPicker">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="#">Gender</label>
                                                                        <select class="select2 form-control"
                                                                            data-placeholder="Select Gender">
                                                                            <option value=""></option>
                                                                            <option value="Male">Male</option>
                                                                            <option value="Female">Female</option>
                                                                            <option value="Other">Other</option>
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
                                                        <select class="js-example-basic-single select2">
                                                            <option value="" disabled selected>Select Type</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Unmarried">Unmarried</option>
                                                            <option value="Single">Single</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">Phone No.</label>
                                                        <input type="text"
                                                            placeholder="Phone No."
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">Email</label>
                                                        <input type="text"
                                                            placeholder="Phone No."
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">National ID</label>
                                                        <input type="text"
                                                            placeholder="National ID"
                                                            id="name" class="form-control">
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
                                                        <input type="text"
                                                            placeholder="Address 1"
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="#">Address 2 (Optional)</label>
                                                        <input type="text"
                                                            placeholder="Address 1"
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label for="#">Town/City</label>
                                                        <input type="text"
                                                            placeholder="Town/City"
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label for="#">Country</label>
                                                        <input type="text"
                                                            placeholder="Town/City"
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label for="#">Postal Code</label>
                                                        <input type="text"
                                                            placeholder="Town/City"
                                                            id="name" class="form-control">
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
                                                        <input type="text"
                                                            placeholder="Name"
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">Relation</label>
                                                        <input type="text"
                                                            placeholder="Relation"
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">Phone</label>
                                                        <input type="text"
                                                            placeholder="Phone"
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">Email</label>
                                                        <input type="text"
                                                            placeholder="Email"
                                                            id="name" class="form-control">
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
                                                        <input type="text"
                                                            placeholder="Insurance provider"
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">Card number</label>
                                                        <input type="text"
                                                            placeholder="Card number"
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">Expiry</label>
                                                        <input type="text"
                                                            placeholder="Expiry"
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">Plan</label>
                                                        <input type="text"
                                                            placeholder="Plan"
                                                            id="name" class="form-control">
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





                        </div>
                    </div>
                    <div class="FormSubmit_fix_container">
                <a href="patients.php">
                    <button type="button" class="btn btn-primary commonUpdateButton" onclick="showSweetAlert()">
                    <iconify-icon icon="mynaui:save"></iconify-icon> Submit & Save
                    </button>
                </a>

            <a href="patients.php">
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

@endpush
