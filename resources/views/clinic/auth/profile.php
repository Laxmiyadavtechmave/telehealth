<?php include("header.php") ?>
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
                    <!-- <li>
                        <div class="Currentvendorstatus">
                            <iconify-icon icon="f7:status"></iconify-icon> Current Status : <div class="vndStatusbadge">
                                Approval Pending</div>

                        </div>
                    </li> -->
                    <li>
                        <div class="enquiryDate">
                            <iconify-icon icon="ion:calendar-outline"></iconify-icon> Added On : <div
                                class="Onboarddate">
                                14 Dec 2024 12:24pm</div>

                        </div>
                    </li>
                    <li>
                    <div class="pageheader_rightbtns">
                            <button type="submit" class="cmnPromary_btn">Save Changes</button>
                        </div>
                    </li>
                    <!-- <li>
                        <div class="pageheader_rightbtns" ApproveVendor>
                            <button type="button" class="cmnPromary_btn" onclick="approveVendor()">Approve</button>
                        </div>
                    </li>
                    <li>
                        <div class="pageheader_rightbtns rejectapproval_btn" rejectVendor>
                            <button type="button" class="cmnPromary_btn" onclick="rejectVendor()">Reject</button>
                        </div>
                    </li> -->

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
                                                <img src="assets/img/newimages/logoicon.png" alt="img" id="blah">
                                                <!-- <div class="profileupload">
												<input type="file" id="imgInp">
												<a href="javascript:void(0);" ><img src="assets/img/icons/edit-set.svg"  alt="img"></a>
											</div> -->
                                            </div>
                                            <div class="profile-contentname">
                                                <h2>CarePlus Medical</h2>
                                                <p><a href="mailto:williamcasti@gmail.com">carePlusmedical@gmail.com</a>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="copy-container">
                                            <span>Clinic ID:</span>
                                            <div class="user-id" id="userID">#CLI0001</div>
                                            <!-- <button class="copy-btn" onclick="copyText()">Copy</button> -->
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
                                                    <iconify-icon icon="ion:location-outline"></iconify-icon> Clinic Location
                                                </button>
                                                <button class="nav-link text-start" id="main-team-tab"
                                                    data-bs-toggle="pill" data-bs-target="#main-team" type="button"
                                                    role="tab" aria-controls="main-team" aria-selected="false">
                                                    <iconify-icon icon="solar:calendar-linear"></iconify-icon> Working Days & Hour
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
                                                <!-- <button class="nav-link text-start" id="DoctorsListing-tab"
                                                    data-bs-toggle="pill" data-bs-target="#DoctorsListing" type="button"
                                                    role="tab" aria-controls="DoctorsListing" aria-selected="false">
                                                    <iconify-icon icon="healthicons:doctor-male-outline"></iconify-icon>
                                                    All Doctors
                                                </button> -->

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
                                                        <h6><span> <iconify-icon icon="carbon:building"></iconify-icon></span> Clinic Information</h6>
                                                    </div>
                                                 
                                                    <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="image-upload-container">
                                                            <div class="profile-pic-wrapper">
                                                                <div class="pic-holder">
                                                                    <!-- uploaded pic shown here -->
                                                                    <img id="profilePic" class="pic" src="">

                                                                    <input class="uploadProfileInput" type="file" name="profile_pic" id="newProfilePhoto" accept="image/*" style="opacity: 0;">
                                                                    <label for="newProfilePhoto" class="upload-file-block">
                                                                        <div class="text-center">
                                                                            <div class="uploadicon_template">
                                                                                <iconify-icon icon="bytesize:upload"></iconify-icon>
                                                                            </div>
                                                                            <div class="text-uppercase">
                                                                                Update <br> Logo
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
                                                                <input type="text" class="form-control" value="CarePlus Medical"
                                                                     >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">License Number </label>
                                                                <input type="text" class="form-control" value="NPI-1932154610"
                                                                     >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="mb-3">
                                                                <label class="form-label">Valid From </label>
                                                                <input type="text" class="form-control customdataPicker" value="25 May, 2010"
                                                                     >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="mb-3">
                                                                <label class="form-label">Valid To</label>
                                                                <input type="text" class="form-control customdataPicker" value="25 May, 2040"
                                                                     >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Email</label>
                                                                <input type="text" class="form-control"
                                                                    value="carePlusmedical@gmail.com"  >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Phone No</label>
                                                                <input type="text" class="form-control" value="	9823476521"
                                                                     >
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Website URL</label>
                                                                <input type="text" class="form-control"
                                                                    value="https://techmavesoftware.com/"  >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Description / Bio</label>
                                                                <!-- <input type="email" class="form-control"
                                                                    value="johndoe@example.com"  > -->
                                                                    <textarea class="form-control" name="" id=""   row="4"></textarea>
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
                                                        <h6><span><iconify-icon icon="ion:location-outline"></iconify-icon></span> Clinic Address
                                                        </h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Address 1</label>
                                                                <input type="text" class="form-control"
                                                                    value="123 Main Street, Apt 101"  >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Address 2 (optional)</label>
                                                                <input type="text" class="form-control"
                                                                    value="123 Main Street, Apt 101"  >
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-4 col-lg-4 col-md-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">Country</label>
                                                                <input type="text" class="form-control"
                                                                    value="United States"  >
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">Town/City</label>
                                                                <input type="text" class="form-control"
                                                                    value="California"  >
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">Postal Code</label>
                                                                <input type="text" class="form-control"
                                                                    value="90001"  >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Google Maps Link</label>
                                                                <input type="text" class="form-control"
                                                                    value=""  >
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
                        <div class="tab-pane" id="main-billing" role="tabpanel" aria-labelledby="main-billing-tab"
                            tabindex="0">
                            <div class="setting-title nobtmargin">
                                <h4>Clinic Documents</h4>
                                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">
                                <button class="btn-primary btn" type="button" data-bs-toggle="modal" data-bs-target="#DocumentUpload">Upload Document <iconify-icon icon="material-symbols:upload-rounded"></iconify-icon></button>
                                    <button class="Downloadall_docs btn" type="button">Download All <iconify-icon icon="mynaui:download"></iconify-icon></button>
                                   
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

                                        <tr>
                                            <td>
                                                <label class="checkboxs">
                                                    <input type="checkbox">
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </td>
                                            <td class="productimgname">
                                                <a href="product-list.html"
                                                    class="product-img d-flex align-items-center">
                                                    <img src="assets/img/icons/xls.svg" alt="Product" class="me-2">
                                                    <span>Estimation</span>
                                                </a>
                                            </td>
                                            <td>24 July 2023 08:25 AM</td>
                                            <td>140 MB</td>
                                            <td>
                                                XLS
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center ActionDropdown">
                                                    <div class="d-flex">
                                                        <button
                                                            class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover "
                                                            data-bs-toggle="tooltip" data-placement="top" title=""
                                                            data-bs-original-title="Preview Document"
                                                            type="button"><span class="icon"><span class="feather-icon">
                                                                    <iconify-icon icon="hugeicons:view"></iconify-icon>
                                                                </span></span></button>

                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkboxs">
                                                    <input type="checkbox">
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </td>
                                            <td class="productimgname">
                                                <a href="product-list.html"
                                                    class="product-img d-flex align-items-center">
                                                    <img src="assets/img/icons/pdf-02.svg" alt="Product" class="me-2">
                                                    <span>Intro.pdf</span>
                                                </a>
                                            </td>
                                            <td>24 July 2023 08:25 AM</td>
                                            <td>70 MB</td>
                                            <td>
                                                PDF
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center ActionDropdown">
                                                    <div class="d-flex">
                                                        <button
                                                            class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover "
                                                            data-bs-toggle="tooltip" data-placement="top" title=""
                                                            data-bs-original-title="Preview Document"
                                                            type="button"><span class="icon"><span class="feather-icon">
                                                                    <iconify-icon icon="hugeicons:view"></iconify-icon>
                                                                </span></span></button>

                                                    </div>

                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="main-Stores" role="tabpanel" aria-labelledby="main-Stores-tab"
                            tabindex="0">
                           

                            <form action="#">
                                                        <div class="setting-title">
                                                            <h4>Social Media Links</h4>
                                                        </div>
                                                        <div class="vendortab_inrdetails">
                                                            <div class="company-info">
                                                              
                                                                <div class="card-title-head ">
                                                        <h6><iconify-icon icon="mynaui:link-solid"></iconify-icon></span> Social Media Links
                                                        </h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Facebook</label>
                                                                <input type="text" class="form-control"
                                                                    value=""  >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Instagram</label>
                                                                <input type="text" class="form-control"
                                                                    value=""  >
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6 col-lg-4 col-md-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">LinkedIn</label>
                                                                <input type="text" class="form-control"
                                                                    value=""  >
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-4 col-md-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">Twitter</label>
                                                                <input type="text" class="form-control"
                                                                    value=""  >
                                                            </div>
                                                        </div>
                                                        
                                                    </div>



                                                                

                                                    </form>
                        </div>
                       
                    </div>

                    <!-- <div class="text-end settings-bottom-btn">
											<button type="button" class="btn btn-cancel me-2">Cancel</button>
											<button type="submit" class="btn btn-submit">Save Changes</button>
										</div> -->
                    
                </div>

                
                       
                    </div>

                    <!-- <div class="text-end settings-bottom-btn">
											<button type="button" class="btn btn-cancel me-2">Cancel</button>
											<button type="submit" class="btn btn-submit">Save Changes</button>
										</div> -->
                    
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
        <div class="modal fade" id="DocumentUpload" tabindex="-1" aria-labelledby="HelpPopupLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="HelpPopupLabel">
                            <div class="iconModal">
                                <iconify-icon icon="material-symbols:upload-sharp"></iconify-icon>
                            </div>
                            Upload File & Document
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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


<?php include("footer.php") ?>

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