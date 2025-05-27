@extends('admin.layouts.app')
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="PatinetWrapper">
        <div class="d-md-flex topHeaderPTD pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                <div class="my-auto ">
                <h2 class="mb-1 flexpagetitle">
                    <div class="backbtnwrap">
                        <a href="nurse.php">
                            <iconify-icon icon="octicon:arrow-left-24"></iconify-icon>
                        </a>
                    </div>
                   Nurse Details
                </h2>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">

                    <!-- <div class="ActionWrapper">
                       <div class="patientAction">
                        <a href="#"><iconify-icon icon="mi:call"></iconify-icon></a>
                        <a href="#"><iconify-icon icon="lucide:video"></iconify-icon></a>
                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#PatientChat" aria-controls="offcanvasRight"><iconify-icon icon="proicons:chat"></iconify-icon></a>
                       </div>                   
                  </div> -->
                  <ul class="tophead_action">
                    <li>
                        <div class="Currentvendorstatus">
                            <iconify-icon icon="f7:status"></iconify-icon> Current Status : &nbsp; <div class="badge badge-soft-success">
                                Active</div>

                        </div>
                    </li>
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
                    <div class="head-icons ms-2 headicon_innerpage">
                        <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
                            <i class="ti ti-chevrons-up"></i>
                        </a>
                    </div>
                </div>
            </div>
           


            <div class="card doc-profile-card">
                <div class="card-body">
                    <div class="doctor-widget doctor-profile-two">
                        <div class="doc-info-left">
                            <div class="doctor-img">
                                <img src="assets/img/newimages/healthcare-workers-preventing-vi.png" class="img-fluid" alt="User Image">
                            </div>
                            <div class="doc-info-cont">
                                <!-- <span class="badge doc-avail-badge"><i class="fa-solid fa-circle"></i>Available </span> -->
                                <h4 class="doc-name">David Miller <img src="assets/img/newimages/badge-check.svg" alt="Img"><span class="badge doctor-role-badge"><i class="fa-solid fa-circle"></i> Sr. Nurse</span></h4>
                                <p>08/04/1959 (64y) Female • Nurse ID : #DOC002</p>
                                <p>Diploma, B.Sc Nursing, GNM - Maxillofacial Surgery</p>
                                <p><strong>Areas of Expertise</strong>  : ICU, Pediatrics, Surgical ward</p>
                               
                            </div>
                        </div>
                        <div class="doc-info-right">
                        <div class="middle-info CommonCardPT">
                            
                           
                            <div class="InfoDt">
                                <iconify-icon icon="ion:location-outline"></iconify-icon> 900 Oak Ridge CIR, Brighton, MI 48116
                            </div>
                            <div class="InfoDt">
                                <iconify-icon icon="carbon:chart-relationship"></iconify-icon> Single
                            </div>
                            <div class="InfoDt">
                                <iconify-icon icon="hugeicons:id"></iconify-icon> #NA2365KLO
                            </div>
                            <div class="InfoDt">
                            <iconify-icon icon="healthicons:doctor-male-outline" width="18" height="18"></iconify-icon> DR. Rachel Green
                            </div>
                        </div>
                        <div class="middle-info CommonCardPT">
                    <!-- <h6 class="ContactInfo">Professional Details</h6> -->

                    <!-- <div class="InfoDt">
                    <iconify-icon icon="hugeicons:new-job"></iconify-icon> 
                    </div> -->
                    <div class="InfoDt">
                    <iconify-icon icon="hugeicons:license-third-party"></iconify-icon> RN-CA-2025-00123 (07 May, 2020 - 07 May, 2030)
                    </div>
                    <div class="InfoDt">
                    <iconify-icon icon="akar-icons:shield"></iconify-icon> 7 Years Experience
                    </div>
                    <!-- <div class="InfoDt">
                    <iconify-icon icon="tdesign:grid-add"></iconify-icon> <span class="consultaionType">Audio</span> <span class="consultaionType">Video</span> <span class="consultaionType">Chat</span> <span class="consultaionType">Physical</span>
                    </div> -->
                    <!-- <div class="InfoDt">
                    <iconify-icon icon="f7:status"></iconify-icon> <span class="badge badge-soft-success">Active</span>
                    </div> -->
                    <div class="InfoDt">
                    <iconify-icon icon="mdi:language"></iconify-icon> English, French, German
                    </div>
                </div>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="VisitCardBox mb-3">
                    <h5>Professional Availability</h5>
                    <div class="VisitCardBox-body">
                        <div class="mainCardVisit">
                            <div class="VisitCard">
                                <div class="LeftSide">
                                    <h6 class="DoctorName">Monday - Friday</h6>
                                </div>
                                
                            </div>
                            <div class="DateInfo">
                                <span>
                                    <iconify-icon icon="iconamoon:clock-light"></iconify-icon> 08:45 AM - 09:15 AM
                                </span>

                            </div>
                        </div>
                        <div class="mainCardVisit">
                            <div class="VisitCard">
                                <div class="LeftSide">
                                    <h6 class="DoctorName">Saturday</h6>
                                </div>
                                
                            </div>
                            <div class="DateInfo">
                                <span>
                                <iconify-icon icon="iconamoon:clock-light"></iconify-icon> 08:45 AM - 09:15 AM
                                </span>

                            </div>
                        </div>
                        <div class="mainCardVisit availableDay">
                            <div class="VisitCard">
                                <div class="LeftSide">
                                    <h6 class="DoctorName">Sunday</h6>
                                </div>
                                
                            </div>
                            <div class="DateInfo">
                                <span class="badge badge-soft-danger">
                                    Closed
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-4">
            <div class="row DoctorCardOverview">
            <div class="col-lg-12">
                <h5 class="PT_title">Appointments Overview</h5>
                </div>
                        <div class="col-lg-6 pe-0">
                          <div class="card mb-0">
                                <div class="text-center card-body">
                                    <div class="tilesFlex">
                                        <div class="IconBoxTiles bg-info">
                                        <iconify-icon icon="solar:calendar-line-duotone"></iconify-icon>
                                        </div>
                                        <div class="tilesCnt">
                                            <h5 class="tilescount"><span class="counter-value" data-target="236.18">236.18</span>k</h5>
                                            <p class="text-slate-500 dark:text-zink-200">Total Appointments</p>
                                        </div>
                                    </div>
                                
                                
                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="col-lg-6">
                          <div class="card mb-0">
                                <div class="text-center card-body">
                                    <div class="tilesFlex">
                                        <div class="IconBoxTiles bg-warning">
                                        <iconify-icon icon="mynaui:video"></iconify-icon>
                                        </div>
                                    <div class="tilesCnt">
                                        <h5 class="tilescount"><span class="counter-value" data-target="13461">13,461</span></h5>
                                        <p class="text-slate-500 dark:text-zink-200">Video Appointments</p>
                                    </div>
                                    </div>
                                
                                    
                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="col-lg-6 pe-0">
                           <div class="card mb-0">
                                <div class="text-center card-body">
                                    <div class="tilesFlex">
                                        <div class="IconBoxTiles bg-primary">
                                        <iconify-icon icon="proicons:call"></iconify-icon>
                                        </div>
                                        <div class="tilesCnt">
                                            <h5 class="tilescount"><span class="counter-value" data-target="17150">17,150</span></h5>
                                            <p class="text-slate-500 dark:text-zink-200">Audio Appointments</p>
                                        </div>
                                    </div>
                                
                                
                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="col-lg-6">
                           <div class="card mb-0">
                                <div class="text-center card-body">
                                    <div class="tilesFlex">
                                        <div class="IconBoxTiles bg-green">
                                        <iconify-icon icon="healthicons:walking-outline"></iconify-icon>
                                        </div>
                                        <div class="tilesCnt">
                                            <h5 class="tilescount"><span class="counter-value" data-target="3519">3,519</span></h5>
                                            <p class="text-slate-500 dark:text-zink-200">Physical Appointments</p>
                                        </div>
                                    </div>
                
                                </div>
                            </div><!--end col-->
                        </div>
                    </div>

                    <div class="vitalsMainWrapper mt-2">
                    <div class="vitalsWrapper">
                        <div class="VitalHeader">
                            <h5 class="VitalTitle">Files & Documents <span>Last Update : 22/04/2025 02:23 PM</span></h5>
                            <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#DocumentUpload" class="UploadBtn">
                                <iconify-icon icon="material-symbols:upload-sharp"></iconify-icon> Upload
                            </a> -->
                        </div>

                        <ul class="dcoumentsList">
                            <li>
                                <div class="IconFile">
                                    <iconify-icon icon="pepicons-print:file"></iconify-icon>
                                    <h6>Medical Record</h6>
                                </div>
                                <!-- <div class="actionDoc">
                                    <a href="assets/img/newimages/dummy.pdf" target="_blank">
                                        <iconify-icon icon="lets-icons:view-light"></iconify-icon>
                                    </a>
                                    <a href="assets/img/newimages/dummy.pdf" download>
                                        <iconify-icon icon="material-symbols-light:download"></iconify-icon>
                                    </a>
                                </div> -->


                            </li>
                            <li>
                                <div class="IconFile">
                                    <iconify-icon icon="pepicons-print:file"></iconify-icon>
                                    <h6>Consent Form</h6>
                                </div>
                                


                            </li>
                            <li>
                                <div class="IconFile">
                                    <iconify-icon icon="pepicons-print:file"></iconify-icon>
                                    <h6>Insurance Card </h6>
                                </div>
                                


                            </li>
                            <li>
                                <div class="IconFile">
                                    <iconify-icon icon="pepicons-print:file"></iconify-icon>
                                    <h6>ID Proof</h6>
                                </div>
                                
                            </li>
                        </ul>

                    </div>
                </div>

                    

                
            </div>
            <div class="col-lg-5">
            <div class="clinic-loc">
                    <h5 class="VitalTitle mb-3">Clinic Location</h5>
                        <div class="clinic-info">
                            <div class="clinic-img"><img src="assets/img/newimages/clinic-11.png" alt="Img">
                            </div>
                            <div class="detail-clinic">
                                <h5>Maxillofacial Surgery - </h5>
                                <p>2286 Sundown Lane, Old Trafford 24541, UK</p>
                            </div>
                        </div>
                        <div class="contact-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3193.7301009561315!2d-76.13077892422932!3d36.82498697224007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89bae976cfe9f8af%3A0xa61eac05156fbdb9!2sBeachStreet%20USA!5e0!3m2!1sen!2sin!4v1669777904208!5m2!1sen!2sin" width="100%" height="230px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
					<!-- <div class="card">
						<div class="card-header">
							<h5 class="card-title">
							<div class="cardheader_TITIcon">
								<iconify-icon icon="material-symbols-light:overview-outline"></iconify-icon>
							 </div>	
							Activity Overview</h5>
						</div>

						<div class="card-body">
                        <div class="activity-item">
	<div class="activity-date">
		<iconify-icon icon="hugeicons:activity-04"></iconify-icon>
	</div>
	<div class="activity-content">
		<div class="activity-header">
			<h4 class="title">Appointment Booked</h4>
		</div>
		<div class="activity-meta">
			<span class="time">5 min ago</span> •
			<span class="info">Nurse booked an appointment for Jane Smith</span>
		</div>
		<span class="badge appointment">Appointment Booked</span>
	</div>
</div>

<div class="activity-item">
	<div class="activity-date">
		<iconify-icon icon="hugeicons:activity-04"></iconify-icon>
	</div>
	<div class="activity-content">
		<div class="activity-header">
			<h4 class="title">Patient Added</h4>
		</div>
		<div class="activity-meta">
			<span class="time">20 min ago</span> •
			<span class="info">Nurse added new patient: Michael Johnson</span>
		</div>
		<span class="badge created">Patient Added</span>
	</div>
</div>

<div class="activity-item">
	<div class="activity-date">
		<iconify-icon icon="hugeicons:activity-04"></iconify-icon>
	</div>
	<div class="activity-content">
		<div class="activity-header">
			<h4 class="title">Vitals Recorded</h4>
		</div>
		<div class="activity-meta">
			<span class="time">45 min ago</span> •
			<span class="info">Vitals recorded for Emily White (BP: 120/80, HR: 72)</span>
		</div>
		<span class="badge vitals">Vitals Added</span>
	</div>
</div>

<div class="activity-item">
	<div class="activity-date">
		<iconify-icon icon="hugeicons:activity-04"></iconify-icon>
	</div>
	<div class="activity-content">
		<div class="activity-header">
			<h4 class="title">Patient Report Uploaded</h4>
		</div>
		<div class="activity-meta">
			<span class="time">2 hours ago</span> •
			<span class="info">Uploaded blood test report for David Lee</span>
		</div>
		<span class="badge report">Report Uploaded</span>
	</div>
</div>

<div class="activity-item">
	<div class="activity-date">
		<iconify-icon icon="hugeicons:activity-04"></iconify-icon>
	</div>
	<div class="activity-content">
		<div class="activity-header">
			<h4 class="title">Note Added</h4>
		</div>
		<div class="activity-meta">
			<span class="time">3 hours ago</span> •
			<span class="info">Nurse added a follow-up note for patient Sarah Thomas</span>
		</div>
		<span class="badge note">Note Added</span>
	</div>
</div>

						</div>
					</div> -->
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
@endsection