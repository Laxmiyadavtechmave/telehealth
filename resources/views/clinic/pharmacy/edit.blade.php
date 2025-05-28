@extends('clinic.layouts.app')
@section('title', 'Tele Health Clinic Admin | Pharmacy-edit')
@section('content')

<div class="page-wrapper">
    <div class="content">

        <div class="rightSideWrapper">
            <div
                class="d-md-flex pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                <div class="my-auto ">
                <h2 class="mb-1 flexpagetitle">
                    <div class="backbtnwrap">
                        <a href="pharmacy.php">
                            <iconify-icon icon="octicon:arrow-left-24"></iconify-icon>
                        </a>
                    </div>
                    Edit Pharmacy Details
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
                    <!-- <a href="pharmacy.php" class="AttchmentBtn"><iconify-icon icon="typcn:arrow-back-outline"></iconify-icon> Back</a> -->
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
                                                                        <label for="#">Pharmacy Name <span>*</span></label>
                                                                        <input type="text"
                                                                            placeholder="Pharmacy Name"
                                                                            id="name" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="#">License Number <span>*</span></label>
                                                                        <input type="text"
                                                                            placeholder="License Number"
                                                                            id="name" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <div class="form-group">
                                                                        <label for="#">Valid From</label>
                                                                        <input type="text"
                                                                            placeholder="Valid From"
                                                                            id="name" class="form-control customdataPicker">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <div class="form-group">
                                                                        <label for="#">Valid To</label>
                                                                        <input type="text"
                                                                            placeholder="Valid To"
                                                                            id="name" class="form-control customdataPicker">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="#">Description / Bio <span>*</span></label>
                                                                        <textarea name="" id="" class="form-control"></textarea>
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
                                                        <input type="text"
                                                            placeholder="Enter Email here.."
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group position-relative">
                                                        <label for="#">Password <span>*</span></label>
                                                        <input type="password" class="form-control password-field" placeholder="Enter Password here..">
                                                        <span class="toggle-password" style="position:absolute; top:38px; right:15px; cursor:pointer;">
                                                            <iconify-icon icon="mdi:eye-off-outline"></iconify-icon>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">Phone No. <span>*</span></label>
                                                        <input type="text"
                                                            placeholder="Phone No."
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">Pharmacy Type</label>
                                                        <input type="text"
                                                            placeholder="eg. Retail / Hospital / Online / 24x7"
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
                                        <h6 class="sectionTitle">Clinic Location</h6>
                                    </div>
                                    <div class="col-lg-12">
                                <div class="ItemNewContainer1">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">Address 1 <span>*</span></label>
                                                        <input type="text"
                                                            placeholder="Address 1"
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">Address 2 (Optional)</label>
                                                        <input type="text"
                                                            placeholder="Address 2 (Optional)"
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="#">Town/City <span>*</span></label>
                                                        <input type="text"
                                                            placeholder="Town/City"
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="#">Country <span>*</span></label>
                                                        <input type="text"
                                                            placeholder="Country"
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="#">Postal Code <span>*</span></label>
                                                        <input type="text"
                                                            placeholder="Postal Code"
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="#">Google Maps Link <span>*</span></label>
                                                        <input type="text"
                                                            placeholder="Google Maps Link"
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
                                    <button class="nav-link active" id="monday-tab" data-bs-toggle="tab" data-bs-target="#monday" type="button" role="tab" aria-controls="monday" aria-selected="true">Monday</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tuesday-tab" data-bs-toggle="tab" data-bs-target="#tuesday" type="button" role="tab" aria-controls="tuesday" aria-selected="false">Tuesday</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="wednesday-tab" data-bs-toggle="tab" data-bs-target="#wednesday" type="button" role="tab" aria-controls="wednesday" aria-selected="false">Wednesday</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="thursday-tab" data-bs-toggle="tab" data-bs-target="#thursday" type="button" role="tab" aria-controls="thursday" aria-selected="false">Thursday</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                <button class="nav-link" id="friday-tab" data-bs-toggle="tab" data-bs-target="#friday" type="button" role="tab" aria-controls="friday" aria-selected="false">Friday</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="saturday-tab" data-bs-toggle="tab" data-bs-target="#saturday" type="button" role="tab" aria-controls="saturday" aria-selected="false">Saturday</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="sunday-tab" data-bs-toggle="tab" data-bs-target="#sunday" type="button" role="tab" aria-controls="sunday" aria-selected="false">Sunday</button>
                            </li>
                        </ul>
                        </div>
                        <div class="tab-content" id="weekTabContent">
                            <div class="tab-pane fade show active" id="monday" role="tabpanel" aria-labelledby="monday-tab">

                                <div class="day-row" id="monday">

                                    <div class="time-slots" id="monday-slots">
                                        <div class="time-slot">
                                            <input type="text" class="flatpickr-input form-control" value="09:00 AM">
                                            to
                                            <input type="text" class="flatpickr-input form-control" value="05:30 PM">
                                        </div>
                                    </div>

                                    <div class="form-group applyonallcheckbbox">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input apply-all" id="applyAllMonday">
                                        <label class="form-check-label" for="applyAllMonday">Do you want to apply this on all days</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="NotAvailable1">
                                        <label class="form-check-label" for="NotAvailable1">Not Available</label>
                                    </div>
                                </div>
                                    <button type="button" class="add-button addMultislot_button" onclick="addSlot('monday')"><iconify-icon icon="basil:add-outline"></iconify-icon> Add Time</button>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tuesday" role="tabpanel" aria-labelledby="tuesday-tab">

                                <div class="day-row" id="tuesday">

                                    <div class="time-slots" id="tuesday-slots">
                                        <div class="time-slot">
                                            <input type="text" class="flatpickr-input form-control" value="09:00 AM">
                                            to
                                            <input type="text" class="flatpickr-input form-control" value="05:30 PM">
                                        </div>
                                    </div>
                                    <div class="form-group applyonallcheckbbox">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input apply-all" id="applyAllMonday">
                                        <label class="form-check-label" for="applyAllMonday">Do you want to apply this on all days</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="NotAvailable2">
                                        <label class="form-check-label" for="NotAvailable2">Not Available</label>
                                    </div>
                                </div>
                                    <button type="button" class="add-button addMultislot_button" onclick="addSlot('tuesday')"><iconify-icon icon="basil:add-outline"></iconify-icon> Add Time</button>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="wednesday" role="tabpanel" aria-labelledby="wednesday-tab">

                                <div class="day-row" id="wednesday">

                                    <div class="time-slots" id="wednesday-slots">
                                        <div class="time-slot">
                                            <input type="text" class="flatpickr-input form-control" value="09:00 AM">
                                            to
                                            <input type="text" class="flatpickr-input form-control" value="05:30 PM">
                                        </div>
                                    </div>
                                    <div class="form-group applyonallcheckbbox">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input apply-all" id="applyAllMonday">
                                        <label class="form-check-label" for="applyAllMonday">Do you want to apply this on all days</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="NotAvailable3">
                                        <label class="form-check-label" for="NotAvailable3">Not Available</label>
                                    </div>
                                </div>
                                    <button type="button" class="add-button addMultislot_button" onclick="addSlot('wednesday')"><iconify-icon icon="basil:add-outline"></iconify-icon> Add Time</button>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="thursday" role="tabpanel" aria-labelledby="thursday-tab">

                                <div class="day-row" id="thursday">

                                    <div class="time-slots" id="thursday-slots">
                                        <div class="time-slot">
                                            <input type="text" class="flatpickr-input form-control" value="09:00 AM">
                                            to
                                            <input type="text" class="flatpickr-input form-control" value="05:30 PM">
                                        </div>
                                    </div>
                                    <div class="form-group applyonallcheckbbox">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input apply-all" id="applyAllMonday">
                                        <label class="form-check-label" for="applyAllMonday">Do you want to apply this on all days</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="NotAvailable4">
                                        <label class="form-check-label" for="NotAvailable4">Not Available</label>
                                    </div>
                                </div>
                                    <button type="button" class="add-button addMultislot_button" onclick="addSlot('thursday')"><iconify-icon icon="basil:add-outline"></iconify-icon> Add Time</button>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="friday" role="tabpanel" aria-labelledby="friday-tab">

                                <div class="day-row" id="friday">

                                    <div class="time-slots" id="friday-slots">
                                        <div class="time-slot">
                                            <input type="text" class="flatpickr-input form-control" value="09:00 AM">
                                            to
                                            <input type="text" class="flatpickr-input form-control" value="05:30 PM">
                                        </div>
                                    </div>
                                    <div class="form-group applyonallcheckbbox">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input apply-all" id="applyAllMonday">
                                        <label class="form-check-label" for="applyAllMonday">Do you want to apply this on all days</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="NotAvailable5">
                                        <label class="form-check-label" for="NotAvailable5">Not Available</label>
                                    </div>
                                </div>
                                    <button type="button" class="add-button addMultislot_button" onclick="addSlot('friday')"><iconify-icon icon="basil:add-outline"></iconify-icon> Add Time</button>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="saturday" role="tabpanel" aria-labelledby="saturday-tab">

                                <div class="day-row" id="saturday">

                                <div class="time-slots" id="saturday-slots">
                                        <div class="time-slot">
                                            <input type="text" class="flatpickr-input form-control" value="09:00 AM">
                                            to
                                            <input type="text" class="flatpickr-input form-control" value="05:30 PM">
                                        </div>
                                    </div>

                                    <div class="form-group applyonallcheckbbox">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input apply-all" id="applyAllMonday">
                                        <label class="form-check-label" for="applyAllMonday">Do you want to apply this on all days</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="NotAvailable6">
                                        <label class="form-check-label" for="NotAvailable6">Not Available</label>
                                    </div>
                                </div>

                                    <button type="button" class="add-button addMultislot_button" onclick="addSlot('saturday')"><iconify-icon icon="basil:add-outline"></iconify-icon> Add Time</button>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sunday" role="tabpanel" aria-labelledby="sunday-tab">

                                <div class="day-row" id="sunday">

                                <div class="time-slots" id="sunday-slots">
                                        <div class="time-slot">
                                            <input type="text" class="flatpickr-input form-control" value="09:00 AM">
                                            to
                                            <input type="text" class="flatpickr-input form-control" value="05:30 PM">
                                        </div>
                                    </div>

                                    <div class="form-group applyonallcheckbbox">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input apply-all" id="applyAllMonday">
                                        <label class="form-check-label" for="applyAllMonday">Do you want to apply this on all days</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="NotAvailable7">
                                        <label class="form-check-label" for="NotAvailable7">Not Available</label>
                                    </div>
                                </div>
                                    <button type="button" class="add-button addMultislot_button" onclick="addSlot('sunday')"><iconify-icon icon="basil:add-outline"></iconify-icon> Add Time</button>
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
                                <div class="ItemNewContainer1">
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <h6 class="sectionTitle">Upload Pharmacy Document</h6>
                                    </div>
                                    <div class="col-lg-12">
                                    <div class="card selected">

                                <div class="card-body">
                                    <div class="adding_fildswrap multipleimage_wrap">
                                        <!-- Product Gallery Images Section -->
                                        <div class="image-gallery" id="imageGalleryNew" style="display: none;">
                                            <!-- Placeholder for uploaded images -->
                                        </div>

                                        <!-- Add Product Gallery Images Link -->
                                        <div class="addgaller_action">
                                            <a href="#" class="text-primary d-inline-flex justify-content-center addgallery_btn btnComn_add_lightbg" data-bs-toggle="modal" data-bs-target="#uploadModalNew" style="display: none;">
                                                <iconify-icon icon="octicon:feed-plus-16"></iconify-icon> Add Document

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
                <a href="pharmacy.php">
                    <button type="button" class="btn btn-primary commonUpdateButton" onclick="showSweetAlert()">
                    <iconify-icon icon="mynaui:save"></iconify-icon> Submit & Save
                    </button>
                </a>

            <a href="pharmacy.php">
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

<div class="modal fade" id="uploadModalNew" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Pharmacy Document </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Drag and Drop Upload Area -->
                    <div id="uploadAreaNew" class="upload-area">
                        Drag & drop images here or click to upload
                        <input type="file" id="imageInputNew" accept="image/*,.pdf,.doc,.docx" style="display: none;" multiple />

                    </div>
                    <!-- Upload Loader -->
                     <div class="loaderCenter">
                     <div class="loader" id="uploadLoaderNew">
                        <!-- <img src="https://i.gifer.com/ZZ5H.gif" alt="Loading..." />
                        <p>Uploading...</p> -->
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
                                    '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Pharmacy Logo updated successfully</div>';
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
        document.addEventListener("DOMContentLoaded", function () {
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
                        const otherSlot = tab.querySelector(`.time-slot:not(.default-slot):has(.flatpickr-input[value="${startTime}"])`);
                        if (otherSlot) otherSlot.remove();
                    }
                });
            }
        }
    </script>

<!-----------------------------------
Password Hide and show js start here
------------------------------------->
    <script>
    $(document).on('click', '.toggle-password', function () {
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

<!-- product gallery images multiple upload start -->
<script>
    const uploadAreaNew = document.getElementById("uploadAreaNew");
    const imageInputNew = document.getElementById("imageInputNew");
    const imageGalleryNew = document.getElementById("imageGalleryNew");
    const uploadLoaderNew = document.getElementById("uploadLoaderNew");
    const addImageBtnNew = document.getElementById("addImageBtnNew");
    const addImagesLinkNew = document.querySelector("[data-bs-target='#uploadModalNew']");
    let uploadedFilesNew = [];

    imageGalleryNew.style.display = "none";

    // Drag & Drop
    uploadAreaNew.addEventListener("dragover", (event) => {
        event.preventDefault();
        uploadAreaNew.classList.add("drag-over");
    });

    uploadAreaNew.addEventListener("dragleave", () => {
        uploadAreaNew.classList.remove("drag-over");
    });

    uploadAreaNew.addEventListener("drop", (event) => {
        event.preventDefault();
        uploadAreaNew.classList.remove("drag-over");
        const files = event.dataTransfer.files;
        if (files && files.length > 0) {
            Array.from(files).forEach((file) => {
                const validTypes = [
                    "image/",
                    "application/pdf",
                    "application/msword",
                    "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                ];
                if (
                    (validTypes.some(type => file.type.startsWith(type)) || file.name.endsWith(".doc") || file.name.endsWith(".docx")) &&
                    !uploadedFilesNew.includes(file)
                ) {
                    uploadedFilesNew.push(file);
                }
            });
            showPreviewNew(uploadedFilesNew);
        }
    });

    // Click to Upload
    uploadAreaNew.addEventListener("click", () => {
        imageInputNew.click();
    });

    imageInputNew.addEventListener("change", (event) => {
        const files = event.target.files;
        if (files && files.length > 0) {
            Array.from(files).forEach((file) => {
                const validTypes = [
                    "image/",
                    "application/pdf",
                    "application/msword",
                    "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                ];
                if (
                    (validTypes.some(type => file.type.startsWith(type)) || file.name.endsWith(".doc") || file.name.endsWith(".docx")) &&
                    !uploadedFilesNew.includes(file)
                ) {
                    uploadedFilesNew.push(file);
                }
            });
            showPreviewNew(uploadedFilesNew);
        }
    });

    function showPreviewNew(files) {
        uploadAreaNew.innerHTML = ""; // Clear previous previews
        files.forEach((file) => {
            const fileDiv = document.createElement("div");
            fileDiv.style.marginBottom = "10px";
            fileDiv.style.border = "1px solid #ccc";
            fileDiv.style.padding = "5px";

            const fileName = document.createElement("p");
            fileName.textContent = file.name;
            fileName.style.fontSize = "14px";
            fileName.style.margin = "5px 0";

            if (file.type.startsWith("image/")) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.style.width = "100%";
                    img.style.border = "1px solid #ccc";
                    fileDiv.appendChild(img);
                    fileDiv.appendChild(fileName);
                };
                reader.readAsDataURL(file);
            } else {
                const img = document.createElement("img");
                img.style.width = "50px";
                img.style.marginRight = "10px";

                if (file.name.endsWith(".pdf")) {
                    img.src = "assets/img/newimages/file.png";
                } else if (file.name.endsWith(".doc") || file.name.endsWith(".docx")) {
                    img.src = "assets/img/newimages/docx-file.png";
                } else {
                    img.src = ""; // fallback (optional)
                }

                fileDiv.appendChild(img);
                fileDiv.appendChild(fileName);
            }

            uploadAreaNew.appendChild(fileDiv);
        });
    }

    addImageBtnNew.addEventListener("click", () => {
        if (uploadedFilesNew.length === 0) {
            alert("Please upload at least one file first.");
            return;
        }

        uploadLoaderNew.style.display = "block";

        uploadedFilesNew.forEach((file, index) => {
            setTimeout(() => {
                const container = document.createElement("div");
                container.classList.add("image-container");

                if (file.type.startsWith("image/")) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const img = document.createElement("img");
                        img.src = e.target.result;
                        img.style.width = "100px";
                        img.style.marginRight = "10px";

                        const removeBtn = document.createElement("button");
                        removeBtn.classList.add("remove-btn");
                        removeBtn.innerHTML = "×";
                        removeBtn.addEventListener("click", () => {
                            container.remove();
                            checkAndHideGallery();
                        });

                        container.appendChild(img);
                        container.appendChild(removeBtn);
                        imageGalleryNew.appendChild(container);
                        imageGalleryNew.style.display = "flex";
                    };
                    reader.readAsDataURL(file);
                } else {
                    const fileWrapper = document.createElement("div");
                    fileWrapper.style.display = "flex";
                    fileWrapper.style.alignItems = "center";
                    fileWrapper.style.border = "1px solid #ccc";
                    fileWrapper.style.padding = "5px";
                    fileWrapper.style.flexDirection = "column";
                    fileWrapper.style.textAlign = "center";

                    const img = document.createElement("img");
                    img.style.width = "60px";
                    img.style.marginRight = "10px";

                    if (file.name.endsWith(".pdf")) {
                        img.src = "assets/img/newimages/file.png";
                    } else if (file.name.endsWith(".doc") || file.name.endsWith(".docx")) {
                        img.src = "assets/img/newimages/docx-file.png";
                    }

                    const fileText = document.createElement("span");
                    fileText.textContent = file.name;
                    fileText.style.fontSize = "12px";
                    fileText.style.lineHeight = "13px";
                    fileText.style.marginTop = "10px";

                    const removeBtn = document.createElement("button");
                    removeBtn.classList.add("remove-btn");
                    removeBtn.innerHTML = "×";
                    removeBtn.style.marginLeft = "10px";
                    removeBtn.addEventListener("click", () => {
                        container.remove();
                        checkAndHideGallery();
                    });

                    fileWrapper.appendChild(img);
                    fileWrapper.appendChild(fileText);
                    container.appendChild(fileWrapper);
                    container.appendChild(removeBtn);
                    imageGalleryNew.appendChild(container);
                    imageGalleryNew.style.display = "flex";
                }
            }, index * 2000);
        });

        setTimeout(() => {
            uploadLoaderNew.style.display = "none";
            uploadedFilesNew = [];
            uploadAreaNew.innerHTML = "Drag & drop images here or click to upload";
            const modal = bootstrap.Modal.getInstance(document.getElementById("uploadModalNew"));
            modal.hide();
            addImagesLinkNew.style.display = "none";
        }, uploadedFilesNew.length * 2000);
    });

    function checkAndHideGallery() {
        if (imageGalleryNew.childElementCount === 0) {
            imageGalleryNew.style.display = "none";
        }
    }
</script>

<!-- multiple images upload js end -->
@endpush

