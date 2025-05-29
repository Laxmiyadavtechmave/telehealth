@extends('clinic.layouts.app')
@section('title', 'Tele Health Clinic Admin | Doctor-Edit')
@section('content')

<div class="page-wrapper">
    <div class="content">

        <div class="rightSideWrapper">
            <div
                class="d-md-flex pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                <div class="my-auto ">
                <h2 class="mb-1 flexpagetitle">
                    <div class="backbtnwrap">
                        <a href="doctors.php">
                            <iconify-icon icon="octicon:arrow-left-24"></iconify-icon>
                        </a>
                    </div>
                   Edit Doctor Details
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
                    <!-- <a href="doctors.php" class="AttchmentBtn"><iconify-icon icon="typcn:arrow-back-outline"></iconify-icon> Back</a> -->
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
                                                                        <label for="#">Doctor Name</label>
                                                                        <input type="text"
                                                                            placeholder="Doctor Name"
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
                                                        <input type="text"
                                                            placeholder="Phone No."
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
                                                        <label for="#">Phone No.</label>
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
                                        <h6 class="sectionTitle">Professional Details</h6>
                                    </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">Degree</label>
                                                        <input type="text"
                                                            placeholder="Degree"
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">Select Clinic</label>
                                                        <select class="js-example-basic-single select2">
                                                            <option value="" disabled selected>Select Type</option>
                                                            <option value="Fortis">Fortis Clinic & Care</option>
                                                            <option value="NewBorn">New Born Child Care</option>
                                                            <option value="RoyalBird">Royal Bird City Hospital</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">License Number</label>
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
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">Specialization</label>
                                                        <input type="text"
                                                            placeholder="eg. Cardiology, Psychiatry, etc."
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">Years of Experience</label>
                                                        <input type="text"
                                                            placeholder="eg. 1 year"
                                                            id="name" class="form-control">
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
                                                                        <span class="selected-count">Select
                                                                        Type</span>
                                                                        <!-- <iconify-icon
                                                                            icon="ic:round-keyboard-arrow-down">
                                                                        </iconify-icon> -->
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
                                                                                        class="individual-option form-check-input">
                                                                                    Physical
                                                                                </div>
                                                                            </div>
                                                                            <div class="mainoptionContainer">
                                                                                <div class="dropfilter_options">
                                                                                    <input type="checkbox"
                                                                                        class="individual-option form-check-input">
                                                                                   Audio
                                                                                </div>
                                                                            </div>
                                                                            <div class="mainoptionContainer">
                                                                                <div class="dropfilter_options">
                                                                                    <input type="checkbox"
                                                                                        class="individual-option form-check-input">
                                                                                   Video
                                                                                </div>
                                                                            </div>
                                                                            <div class="mainoptionContainer">
                                                                                <div class="dropfilter_options">
                                                                                    <input type="checkbox"
                                                                                        class="individual-option form-check-input">
                                                                                   Chat
                                                                                </div>
                                                                            </div>


                                                                        </div>

                                                                        <p class="no-data" style="display: none;">No
                                                                            data
                                                                            found</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="#">Languages Spoken</label>
                                                        <input type="text"
                                                            placeholder="eg. Hindi,English etc."
                                                            id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="#">Bio</label>
                                                       <textarea name="" id="" placeholder="Enter here.." class="form-control"></textarea>
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
                                        <div class="card">
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
                       <div class="col-lg-8">
                       <h6 class="sectionTitle">Consultation Fee Management</h6>
                       <div class="ItemNewContainer1">
                        <div class="row mb-3">
                        <!-- <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="#">Consultation Type</label>
                                    <select class="select2 form-control"
                                        data-placeholder="Select Gender">
                                        <option value=""></option>
                                        <option value="Audio">Audio</option>
                                        <option value="Video">Video</option>
                                        <option value="Physical">Physical</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="#">Consultation Type</label>
                                    <input type="text" class="form-control" value="Audio" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="#">Start Time</label>
                                    <input type="text" class="flatpickr-input form-control" value="09:00 AM">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="#">End Time</label>
                                    <input type="text" class="flatpickr-input form-control" value="05:30 PM">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="#">Price</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="#">Consultation Type</label>
                                    <input type="text" class="form-control" value="Video" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="#">Start Time</label>
                                    <input type="text" class="flatpickr-input form-control" value="09:00 AM">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="#">End Time</label>
                                    <input type="text" class="flatpickr-input form-control" value="05:30 PM">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="#">Price</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="#">Consultation Type</label>
                                    <input type="text" class="form-control" value="Physical" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="#">Start Time</label>
                                    <input type="text" class="flatpickr-input form-control" value="09:00 AM">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="#">End Time</label>
                                    <input type="text" class="flatpickr-input form-control" value="05:30 PM">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="#">Price</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <!-- <div class="col-lg-12 text-end">
                                                    <a href="#" class="AddMoreBtn"><iconify-icon icon="basil:add-outline"></iconify-icon> Add More</a>
                                                </div> -->
                        </div>



                       </div>




                        </div>
                        </div>

                    </div>
                    <div class="FormSubmit_fix_container">
                <a href="doctors.php">
                    <button type="button" class="btn btn-primary commonUpdateButton" onclick="showSweetAlert()">
                    <iconify-icon icon="mynaui:save"></iconify-icon> Submit & Save
                    </button>
                </a>

            <a href="doctors.php">
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

@endpush
