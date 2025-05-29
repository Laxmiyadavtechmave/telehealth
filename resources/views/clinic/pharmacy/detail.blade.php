@extends('clinic.layouts.app')
@section('title', 'Tele Health Clinic Admin | Pharmacy-detail')
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
                        <a href="pharmacy.php">
                            <iconify-icon icon="octicon:arrow-left-24"></iconify-icon>
                        </a>
                    </div>
                    Pharmacy Details
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
                                                <h2>Care Plus Pharmacy</h2>
                                                <p><a href="mailto:carePlusmedical@gmail.com">carePlusmedical@gmail.com</a>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="copy-container">
                                            <span>Pharmacy ID:</span>
                                            <div class="user-id" id="userID">#PHR0001</div>
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
                                                    <iconify-icon icon="ion:location-outline"></iconify-icon> Pharmacy Location
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
                                                <!-- <button class="nav-link text-start" id="main-Stores-tab"
                                                    data-bs-toggle="pill" data-bs-target="#main-Stores" type="button"
                                                    role="tab" aria-controls="main-Stores" aria-selected="false">
                                                    <iconify-icon icon="mynaui:link-solid"></iconify-icon>
                                                    Social Media Links
                                                </button>
                                                <button class="nav-link text-start" id="DoctorsListing-tab"
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
                                                        <h6><span> <iconify-icon icon="carbon:building"></iconify-icon></span> Pharmacy Information</h6>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Pharmacy Name</label>
                                                                <input type="text" class="form-control" value="CarePlus Medical"
                                                                    readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">License Number </label>
                                                                <input type="text" class="form-control" value="NPI-1932154610"
                                                                    readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="mb-3">
                                                                <label class="form-label">Valid From </label>
                                                                <input type="text" class="form-control" value="25 May, 2010"
                                                                    readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="mb-3">
                                                                <label class="form-label">Valid To</label>
                                                                <input type="text" class="form-control" value="25 May, 2040"
                                                                    readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Email</label>
                                                                <input type="text" class="form-control"
                                                                    value="carePlusmedical@gmail.com" readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Phone No</label>
                                                                <input type="text" class="form-control" value="	9823476521"
                                                                    readonly disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Pharmacy Type</label>
                                                                <input type="text" class="form-control"
                                                                    value="eg. Retail / Hospital / Online / 24x7" readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Description / Bio</label>
                                                                <!-- <input type="email" class="form-control"
                                                                    value="johndoe@example.com" readonly disabled> -->
                                                                    <textarea class="form-control" name="" id="" readonly disabled row="4"></textarea>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="man-password" role="tabpanel" tabindex="0">
                                                <div class="settings-page-wrap">
                                                    <form action="#">
                                                        <div class="setting-title">
                                                            <h4>Pharmacy Location</h4>
                                                        </div>
                                                        <div class="vendortab_inrdetails">
                                                            <div class="company-info">

                                                                <div class="card-title-head ">
                                                        <h6><span><iconify-icon icon="ion:location-outline"></iconify-icon></span> Pharmacy Address
                                                        </h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Address 1</label>
                                                                <input type="text" class="form-control"
                                                                    value="123 Main Street, Apt 101" readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Address 2 (optional)</label>
                                                                <input type="text" class="form-control"
                                                                    value="123 Main Street, Apt 101" readonly disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-4 col-lg-4 col-md-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">Country</label>
                                                                <input type="text" class="form-control"
                                                                    value="United States" readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">Town/City</label>
                                                                <input type="text" class="form-control"
                                                                    value="California" readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">Postal Code</label>
                                                                <input type="text" class="form-control"
                                                                    value="90001" readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Google Maps Link</label>
                                                                <input type="text" class="form-control"
                                                                    value="" readonly disabled>
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
                                                    <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                        <th class="DaysName">Monday</th>
                                                        <td>09:00 AM - 05:30 PM</td>
                                                        </tr>
                                                        <tr>
                                                          <th class="DaysName">Tuesday</th>
                                                          <td>09:00 AM - 05:30 PM</td>
                                                        </tr>
                                                        <tr>
                                                          <th class="DaysName">Wednesday</th>
                                                          <td>09:00 AM - 05:30 PM</td>
                                                        </tr>
                                                        <tr>
                                                          <th class="DaysName">Thursday</th>
                                                          <td>09:00 AM - 05:30 PM</td>
                                                        </tr>
                                                        <tr>
                                                          <th class="DaysName">Friday</th>
                                                          <td>09:00 AM - 05:30 PM</td>
                                                        </tr>
                                                        <tr>
                                                          <th class="DaysName">Saturday</th>
                                                          <td>09:00 AM - 05:30 PM</td>
                                                        </tr>
                                                        <tr>
                                                          <th class="DaysName">Sunday</th>
                                                          <td><span class="badge badge-soft-danger">Closed</span></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                    </div>
                                                </div>


                                            </div>
                                          </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="main-billing" role="tabpanel" aria-labelledby="main-billing-tab"
                            tabindex="0">
                            <div class="setting-title nobtmargin">
                                <h4>Pharmacy Documents</h4>
                                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">

                                    <button class="Downloadall_docs btn" type="button">Download All <iconify-icon
                                            icon="mynaui:download"></iconify-icon></button>
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

<!-- Note Unit -->
<div class="modal fade cmnmodalstyle" id="note-units">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Add New Note</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="vendor-details.php">
                        <div class="modal-body custom-modal-body">

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Note Title</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Descriptions</label>
                                        <textarea rows="5" cols="5" class="form-control"
                                            placeholder="Enter text here"></textarea>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit"
                                class="btn btn-submit canvasSubmit_button modalsubmitbtn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Note Unit -->

<!-- Note Unit -->
<div class="modal fade" id="Edit_note">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Edit Note</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="vendor-details.php">
                        <div class="modal-body custom-modal-body">

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Note Title</label>
                                        <input type="text" value="Additional Note added for the Approval"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Descriptions</label>
                                        <textarea rows="5" cols="5" class="form-control"
                                            placeholder="Enter text here">Tenant was very interested in the property, appreciating the layout and natural light</textarea>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-submit canvasSubmit_button modalsubmitbtn">Save
                                Changes</button>
                        </div>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Note Unit -->

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

<!-- View Unit -->
<div class="modal fade" id="ApproveVendor">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title edit-page-title">
                            <h4>Approve Vendor</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="notes.html">
                        <div class="modal-body custom-modal-body">
                            <div class="deleteModal_icon">
                                <img src="assets/img/newimages/delectvector.gif" alt="Img" class="img-fluid">
                            </div>
                            <div class="delete-heads">
                                <h4>Approve this Vendor?</h4>
                                <p>Do you really want to delete this item, This process cannot be undone.</p>
                            </div>
                        </div>
                        <div class="modal-footer-btn edit-footer-menu">
                            <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /View Unit -->

@endsection
@push('custom_scripts')
    <!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- copy id functionality start -->
<script>
    function copyText() {
        // Get the User ID content
        const userID = document.getElementById('userID').textContent;
        // Copy text to clipboard
        const textarea = document.createElement('textarea');
        textarea.value = userID;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
        // SweetAlert2 Toast Notification
        Swal.fire({
            toast: true,
            icon: 'success',
            title: 'Copied to clipboard!',
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            background: '#fff',
            color: '#333',
        });
    }
</script>
<!-- end -->

<script>
   function approveVendor() {
    Swal.fire({
        html: `
            <div style="text-align: center;">
                <div class="swalalert_custom_icon">
                    <img src="assets/img/newimages/approvalalert-imag4.png" alt="Approval Alert" class="img-fluid">
                </div>
                <h2 class="Swal_CustomTitle">Please confirm your action to approve this Supplier.</h2>
                <p class="alertcs_desc" style="font-size: small; color: gray;">Provide a reason or note below before proceeding.</p>
                <textarea id="approvalReason" class="swal2-textarea form-control" placeholder="Enter reason or note here..." style="height: 100px; border: 1px solid #ddd;"></textarea>
            </div>
        `,
        showCancelButton: true,
        confirmButtonText: 'Approve',
        cancelButtonText: 'Cancel',
        focusConfirm: false,
        didOpen: () => {
            // Add custom classes for styling
            document.querySelector('.swal2-popup').classList.add('vendorapprove_modal');
            document.querySelector('.swal2-html-container').classList.add('customapprove_alert_container');
        },
        preConfirm: () => {
            const reasonTextarea = document.getElementById('approvalReason');
            const reason = reasonTextarea.value.trim();

            if (!reason) {
                // Add red border to indicate validation error
                reasonTextarea.style.border = '1px solid red';
                return false;
            }

            // Reset border color if valid
            reasonTextarea.style.border = '1px solid #ddd';
            return reason;
        }
    }).then((result) => {
        if (result.isConfirmed) {
            const reason = result.value;

            // Update the status to "Approved"
            const statusDiv = document.querySelector('.Currentvendorstatus .vndStatusbadge');
            statusDiv.textContent = 'Approved';

            // Add ApprovedVendor class to the parent container
            const parentDiv = document.querySelector('.Currentvendorstatus');
            parentDiv.classList.add('ApprovedVendor');

            // Show a custom success message
            Swal.fire({
                html: `
                    <div style="text-align: center;">
                        <div class="swalalert_custom_icon confirm">
                            <img src="assets/img/newimages/successgif.gif" alt="Success" class="img-fluid">
                        </div>
                        <h2 class="Swal_CustomTitle">Supplier Approved Successfully!</h2>
                        <p class="alertcs_desc" style="font-size: small; color: gray;">The Supplier has been successfully approved with your provided note.</p>
                    </div>
                `,
                showConfirmButton: false,
                timer: 3000,
                 timerProgressBar: true
            }).then(() => {
                    // Redirect after success message
                    window.location.href = "suppliers.php"; // Change this URL
                });
        }
    });
}

</script>
<!-- approve end -->

<!-- reject alert -->
<script>
    function rejectVendor() {
        Swal.fire({
            html: `
                <div style="text-align: center;">
                    <div class="swalalert_custom_icon">
                        <img src="assets/img/newimages/rejecticon.png" alt="Reject Alert" class="img-fluid">
                    </div>
                    <h2 class="Swal_CustomTitle">Please confirm your action to reject this Supplier.</h2>
                    <p class="alertcs_desc" style="font-size: small; color: gray;">Provide a reason or note below before proceeding.</p>
                    <textarea id="rejectionReason" class="swal2-textarea form-control" placeholder="Enter reason or note here..." style="height: 100px; border: 1px solid #ddd;"></textarea>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Reject',
            cancelButtonText: 'Cancel',
            focusConfirm: false,
            didOpen: () => {
                document.querySelector('.swal2-popup').classList.add('vendorreject_modal');
                document.querySelector('.swal2-html-container').classList.add('customreject_alert_container');
            },
            preConfirm: () => {
                const reasonTextarea = document.getElementById('rejectionReason');
                const reason = reasonTextarea.value.trim();

                if (!reason) {
                    reasonTextarea.style.border = '1px solid red';
                    return false;
                }

                reasonTextarea.style.border = '1px solid #ddd';
                return reason;
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const reason = result.value;

                // Update the status to "Rejected"
                const statusDiv = document.querySelector('.Currentvendorstatus .vndStatusbadge');
                statusDiv.textContent = 'Rejected';

                // Add RejectedVendor class to the parent container
                const parentDiv = document.querySelector('.Currentvendorstatus');
                parentDiv.classList.add('RejectedVendor');

                // Show a custom success message
                Swal.fire({
                    html: `
                        <div style="text-align: center;">
                            <div class="swalalert_custom_icon ">
                                <img src="assets/img/newimages/rejecticon.png" alt="Rejected" class="img-fluid">
                            </div>
                            <h2 class="Swal_CustomTitle">Supplier Rejected Successfully!</h2>
                            <p class="alertcs_desc" style="font-size: small; color: gray;">The Supplier has been successfully rejected with your provided note.</p>
                        </div>
                    `,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                }).then(() => {
                    // Redirect after success message
                    window.location.href = "suppliers.php"; // Change this URL
                });
            }
        });
    }
</script>
<!-- end -->

@endpush
