
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<title>Tele Health Book Appointment</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/newimages/logoicon.png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Tabler Icon CSS -->
	<link rel="stylesheet" href="assets/plugins/tabler-icons/tabler-icons.css">
	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <!-- Daterangepikcer CSS -->
	<link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">

	<!-- animation CSS -->
	<link rel="stylesheet" href="assets/css/animate.css">

	<!-- Select2 CSS -->
	<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="assets/css/feather.css">

<link rel="stylesheet" href="assets/css/bookingform.css">
<style>
    body{
        overflow-x:hidden;
    }
</style>
</head>
<body>
<!-- TopHeader-->
<div class="TopHeader">
                    <div class="logoHead">
                        <a href="appointment.php" class="backBtn"><iconify-icon icon="system-uicons:pull-left"></iconify-icon></a>
                        <img src="assets/img/newimages/transparentlogo-tele.png" alt="">
                    </div>
                    <div class="MiddleTitle">
                        <h5>Book Appointment</h5>
                    </div>
                    <div class="ProfileIcon toprProfileBtn">
                    <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown" role="button"
						aria-haspopup="false" aria-expanded="false">
						<div class="profiletpAvatar">
							<div class="cu3-avatar">
								<div class="user-bg-purple avatar" cu3-size="20">R</div>
							</div>
						</div>
						<iconify-icon icon="iconamoon:arrow-down-2-light"></iconify-icon>
					</button>
					<!-- <p class="user_mail_id">avi@techmavesoftware.com</p> -->
					<div class="dropdown-menu dropdown-menu-end profile-dropdown ">
						<!-- item-->
						<div class="dropdown-header noti-title">
							<div class="proileDrop_right">
								<div class="profileInrImagewrap">
									<!-- <img src="http://localhost/techmave-product/public/assets/images/new-images/userdummy.png"  alt="user-image" class="rounded-circle"> -->
									<div class="namerletters">RJ</div>
								</div>

								<div class="pro-user-name ms-1">
									<h2>Admin A</h2>
									<p class="user_mail_id">admin@gmail.com</p>
								</div>
							</div>

						</div>
						<a href="##" class="dropdown-item notify-item">
							<iconify-icon icon="si:user-duotone"></iconify-icon><span>My Account</span>
						</a>
						<!-- <a href="##" class="dropdown-item notify-item">
							<iconify-icon icon="lsicon:setting-search-filled"></iconify-icon><span>Settings</span>
						</a>
						<a href="##" class="dropdown-item notify-item">
							<iconify-icon icon="streamline:notification-alarm-2"></iconify-icon><span>Notification
								Settings</span>
						</a>
						<a href="##" class="dropdown-item notify-item">
							<iconify-icon icon="clarity:help-outline-badged"></iconify-icon><span>Help</span>
						</a> -->
						<a href="login.php" class="dropdown-item notify-item">
							<iconify-icon icon="hugeicons:logout-square-02"></iconify-icon><span>Logout</span>
						</a>
					</div>
                    </div>

                </div>
<!-- Topheader end -->

<!-- Page Wrapper -->
<div class="content innerPOSsc_content">
    <div class="container">

    <div class="booking-engine">
    <div class="row m-0 main_bookrow">
        <!-- Sidebar -->
        <div class="col-md-4 sidebar Step_progressSidebar">
            <div class="tracker-line" id="singleTracker"></div>
            <div class="sidetabmenu_wrap">
                <!-- Step 1: Select Doctor -->
                <div class="sidebar-item active" id="doctorStep">
                    <div>
                        <i class="fas fa-user-md me-2"></i> Select Doctor
                        <div class="details" id="doctorDetails"></div>
                    </div>
                    <span class="status-icon"></span>
                </div>
                <!-- Step 2: Patient Information -->
                <div class="sidebar-item" id="patientStep">
                    <div>
                        <i class="fas fa-user me-2"></i> Patient Information
                        <div class="details" id="patientDetails"></div>
                    </div>
                    <span class="status-icon"></span>
                </div>
                <!-- Step 3: Select Date -->
                <div class="sidebar-item" id="dateStep">
                    <div>
                        <i class="fas fa-concierge-bell me-2"></i> Select Date
                        <div class="details" id="dateDetails"></div>
                    </div>
                    <span class="status-icon"></span>
                </div>
                <!-- Step 4: Select Slot -->
                <div class="sidebar-item" id="timeSlotStep">
                    <div>
                        <i class="fas fa-clock me-2"></i> Select Slot
                        <div class="details" id="timeSlotDetails"></div>
                    </div>
                    <span class="status-icon"></span>
                </div>
                <!-- Step 5: Consultation Type -->
                <div class="sidebar-item" id="consultationStep">
                    <div>
                        <i class="fas fa-hourglass-start me-2"></i> Consultation Type
                        <div class="details" id="consultationDetails"></div>
                    </div>
                    <span class="status-icon"></span>
                </div>
                <!-- Step 6: Summary -->
                <div class="sidebar-item" id="summaryStep">
                    <div class="withoutFatch_data">
                        <div class="sidebarmenu">
                            <i class="fas fa-list-alt me-2"></i> Summary
                        </div>
                        <span class="status-icon"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 noclPadding" id="bookingformColumn">
            <!-- Main Content -->
            <div class="main-content">
                <!-- Step 1: Select Doctor -->
                <div class="step active" id="step1">
                    <div class="step-header">
                        <h4 class="step-title">Select Doctor</h4>
                    </div>
                    <div class="stepBody_content">
                        
                        <div class="doctor-selector">
                            <div class="specialty mb-2">
                                     <select id="specialtySearch" class="form-control" style="margin-bottom: 10px;">
                                    <option value="" selected>All Specialties</option>
                                    <option value="General Physician">General Physician</option>
                                    <option value="Cardiologist">Cardiologist</option>
                                    <option value="Orthopedic Surgeon">Orthopedic Surgeon</option>
                                    <option value="Pulmonologist">Pulmonologist</option>
                                </select>
                            </div>
                            <div class="search-container">
                           
                                <input type="text" id="doctorSearch" class="form-control" placeholder="Search for a doctor..." autocomplete="off">
                                <a href="#" class="searchbutton"><iconify-icon icon="icon-park-outline:search"></iconify-icon></a>
                                <div id="doctorDropdown" class="doctor-dropdown"></div>
                            </div>
                            <div id="selectedDoctorContainer" class="selected-doctor-container" style="display: none;">
                                <div class="selected-doctor">
                                    <img id="selectedDoctorImage" class="doctor-image" src="" alt="Doctor Image">
                                    <div class="doctor-info">
                                        <span id="selectedDoctorName"></span>
                                        <span id="selectedDoctorSpecialty"></span>
                                        <span id="selectedDoctorDetails"></span>
                                    </div>
                                    <button id="removeDoctor" class="remove-doctor-btn">×</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Patient Information -->
                <div class="step" id="step2">
                    <div class="step-header">
                        <button class="back-btn" onclick="goBack(2)"><i class="fas fa-arrow-left"></i></button>
                        <h4 class="step-title">Patient Information</h4>
                    </div>
                    <div class="stepBody_content">
                        <div class="patient-info-form">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="patientName">Patient Name</label>
                                        <input type="text" id="patientName" class="form-control" placeholder="Enter patient name">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="patientDOB">Date of Birth</label>
                                        <input type="text" id="patientDOB" class="form-control" placeholder="Select date of birth">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="patientGender">Gender</label>
                                        <select id="patientGender" class="form-control">
                                            <option value="" disabled selected>Select gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="appointmentType">Appointment Type</label>
                                        <select id="appointmentType" class="form-control">
                                            <option value="" disabled selected>Select appointment type</option>
                                            <option value="Follow Up">Follow Up</option>
                                            <option value="Routine Checkup">Routine Checkup</option>
                                            <option value="General">General</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="patientPhone">Phone Number</label>
                                        <input type="tel" id="patientPhone" class="form-control" placeholder="Enter phone number">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="patientEmail">Email</label>
                                        <input type="email" id="patientEmail" class="form-control" placeholder="Enter email address">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="patientReason">Reason/Purpose</label>
                                        <textarea id="patientReason" class="form-control" rows="3" placeholder="Enter reason for consultation"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Select Date -->
                <div class="step" id="step3">
                    <div class="step-header">
                        <button class="back-btn" onclick="goBack(3)"><i class="fas fa-arrow-left"></i></button>
                        <h4 class="step-title">Select Date</h4>
                    </div>
                    <div class="stepBody_content">
                        <div class="date-selector">
                            <div class="calendar-header">
                                <button onclick="prevMonth()">←</button>
                                <div class="monyearWrapper">
                                    <div class="monthselection_wrap">
                                        <select id="monthSelect" class="monthselection" onchange="updateCalendar()">
                                            <option value="0">January</option>
                                            <option value="1">February</option>
                                            <option value="2">March</option>
                                            <option value="3">April</option>
                                            <option value="4">May</option>
                                            <option value="5">June</option>
                                            <option value="6">July</option>
                                            <option value="7">August</option>
                                            <option value="8">September</option>
                                            <option value="9">October</option>
                                            <option value="10">November</option>
                                            <option value="11">December</option>
                                        </select>
                                    </div>
                                    <div class="Yearselection_wrap">
                                        <select id="yearSelect" class="Yearselection" onchange="updateCalendar()">
                                            <!-- Populated dynamically -->
                                        </select>
                                    </div>
                                </div>
                                <button onclick="nextMonth()">→</button>
                            </div>
                            <div class="calendar-grid" id="calendarGrid">
                                <div class="day-label">Sun</div>
                                <div class="day-label">Mon</div>
                                <div class="day-label">Tue</div>
                                <div class="day-label">Wed</div>
                                <div class="day-label">Thu</div>
                                <div class="day-label">Fri</div>
                                <div class="day-label">Sat</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Select Time Slot -->
                <div class="step" id="step4">
                    <div class="step-header">
                        <button class="back-btn" onclick="goBack(4)"><i class="fas fa-arrow-left"></i></button>
                        <h4 class="step-title">Select Slot</h4>
                    </div>
                    <div class="stepBody_content">
                        <p id="selectedDateDisplay"></p>
                        <div class="time-slots">
                            <div class="time-slot-group">
                                <h5>Morning</h5>
                                <div class="slots">
                                    <button class="time-slot">10:00</button>
                                    <button class="time-slot">10:30</button>
                                    <button class="time-slot">11:00</button>
                                    <button class="time-slot">11:30</button>
                                </div>
                            </div>
                            <div class="time-slot-group">
                                <h5>Afternoon</h5>
                                <div class="slots">
                                    <button class="time-slot">12:00</button>
                                    <button class="time-slot">12:30</button>
                                    <button class="time-slot">13:00</button>
                                    <button class="time-slot">13:30</button>
                                    <button class="time-slot">14:00</button>
                                    <button class="time-slot">14:30</button>
                                    <button class="time-slot">15:00</button>
                                    <button class="time-slot">15:30</button>
                                    <button class="time-slot">16:00</button>
                                    <button class="time-slot">16:30</button>
                                    <button class="time-slot">17:00</button>
                                    <button class="time-slot">17:30</button>
                                </div>
                            </div>
                            <div class="time-slot-group">
                                <h5>Evening</h5>
                                <div class="slots">
                                    <button class="time-slot">18:00</button>
                                    <button class="time-slot">18:30</button>
                                    <button class="time-slot">19:00</button>
                                    <button class="time-slot">19:30</button>
                                    <button class="time-slot">20:00</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 5: Consultation Type -->
                <div class="step" id="step5">
                    <div class="step-header">
                        <button class="back-btn" onclick="goBack(5)"><i class="fas fa-arrow-left"></i></button>
                        <h4 class="step-title">Consultation Type</h4>
                    </div>
                    <div class="stepBody_content">
                        <p id="selectedSlotDisplay"></p>
                        <div class="consultation-options">
                            <div class="consultation-option" data-type="Clinic Visit" data-price="20">
                            <iconify-icon icon="healthicons:ambulatory-clinic-outline"></iconify-icon>
                                <div>CLINIC VISIT</div>
                                <div class="price">$20</div>
                            </div>
                            <div class="consultation-option" data-type="Audio Call" data-price="24">
                            <iconify-icon icon="proicons:call"></iconify-icon>
                                <div>AUDIO CALL</div>
                                <div class="price">$24</div>
                            </div>
                            <div class="consultation-option" data-type="Video Call" data-price="35">
                            <iconify-icon icon="mynaui:video"></iconify-icon>
                                <div>VIDEO CALL</div>
                                <div class="price">$35</div>
                            </div>
                        </div>
                        <div class="duration-options" id="durationOptions">
                            <!-- Duration options will be populated dynamically -->
                        </div>
                    </div>
                </div>

                <!-- Step 6: Summary -->
                <div class="step" id="step6">
                    <div class="step-header">
                        <button class="back-btn" onclick="goBack(6)"><i class="fas fa-arrow-left"></i></button>
                        <h4 class="step-title">Summary</h4>
                    </div>
                    <div class="stepBody_content">
                        <div class="summary">
                            <div class="summary-table">
                                <div class="summary-row">
                                    <span class="summaryLabel">Doctor</span>
                                    <span id="summaryDoctor" class="summaryData"></span>
                                </div>
                                <div class="summary-row">
                                    <span class="summaryLabel">Patient</span>
                                    <span id="summaryPatient" class="summaryData"></span>
                                </div>
                                <div class="summary-row">
                                    <span class="summaryLabel">Appointment Type</span>
                                    <span id="summaryAppointmentType" class="summaryData"></span>
                                </div>
                                <div class="summary-row">
                                    <span class="summaryLabel">Services</span>
                                    <span id="summaryService" class="summaryData"></span>
                                </div>
                                <div class="summary-row">
                                    <span class="summaryLabel">Date</span>
                                    <span id="summaryDate" class="summaryData"></span>
                                </div>
                                <div class="summary-row">
                                    <span class="summaryLabel">Time Slot</span>
                                    <span id="summarySlot" class="summaryData"></span>
                                </div>
                                <div class="summary-row">
                                    <span class="summaryLabel">Consultation Type</span>
                                    <span id="summaryConsultation" class="summaryData"></span>
                                </div>
                                <div class="summary-row subtotal">
                                    <span class="summaryLabel">Subtotal:</span>
                                    <span id="summarySubtotal" class="summaryData"></span>
                                </div>
                                <div class="summary-row total">
                                    <span class="summaryLabel Total_Amount">Total Amount:</span>
                                    <span id="summaryTotal" class="summaryData Total"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Skeleton Loading -->
                <div class="step skeleton-step" id="skeletonStep">
                    <div class="skeleton-row" style="width: 50%;"></div>
                    <div class="skeleton-row" style="width: 80%;"></div>
                    <div class="skeleton-row" style="width: 60%;"></div>
                </div>

                <!-- Fixed Footer -->
                <div class="footer-fixed">
                    <button class="btn btn-primary" id="continueBtn" style="display: none;">Continue</button>
                    <a class="btn btn-primary" href="booking-success.php" id="completeBooking" style="display: none;">Confirm Booking</a>
                </div>
            </div>
        </div>
    </div>
</div>


    </div>

</div>
</body>


<!--  -->

<!-- jQuery -->
<script src="assets/js/jquery-3.7.1.min.js"></script>
<!-- iconify icon -->
<script src="assets/js/iconify.js"></script>
<!-- Feather Icon JS -->
<script src="assets/js/feather.min.js"></script>
<!-- Select2 JS -->
<script src="assets/plugins/select2/js/select2.min.js"></script>
<!-- Daterangepikcer JS -->
<script src="assets/js/moment.js"></script>
<!-- Custom JS -->
<script src="assets/js/script.js" type=""></script>
<!-- Custom JS -->
<script src="assets/js/theme-script.js"></script>
<!-- Datetimepicker JS -->
<script src="assets/js/bootstrap-datetimepicker.min.js" type=""></script>
<!-- Daterangepikcer JS -->
<script src="assets/plugins/daterangepicker/daterangepicker.js" type=""></script>

<script src="assets/js/custom-select2.js"></script>
<script src="assets/js/feather.min.js"></script>
<!-- Slimscroll JS -->
<script src="assets/js/jquery.slimscroll.min.js"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>

<!-- phone number with country code custom code js and css -->
<link rel="stylesheet" href="assets/phonecountry/phone-with-country.css">
<script src="assets/phonecountry/list.min.js"></script>
<script src="assets/phonecountry/phone-with-country.js"></script>
<!-- phone number with country code custom code js and css end-->
     <!-- Flatpickr CSS -->
     <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
   <!-- Flatpickr JS -->
   <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
   
    <!-- Select2 JS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
    <link href="assets/css/select2.css" rel="stylesheet" />
    <script src="assets/js/select2.js"></script>

<style>
    .navbar-logo {
        margin-top: 1.125rem;
    }
</style>

<!-- booking engine js end -->
<script src="https://davidshimjs.github.io/qrcodejs/qrcode.min.js"></script>
<script>
$(document).ready(function() {
    let selectedDoctor = null;
    let selectedSpecialty = null;
    let selectedPatient = null;
    let selectedDate = null;
    let selectedSlot = null;
    let selectedConsultationType = null;
    let selectedDuration = null;
    let consultationPricePerHour = 0;
    let totalPrice = 0;
    let currentStep = 1;
    let currentMonth = new Date().getMonth();
    let currentYear = new Date().getFullYear();
    let isRenderingCalendar = false;
    let lastTrackerHeight = 0;

    // Doctor list
    const doctors = [
        {
            name: "Dr. Forhad Ahmed",
            specialty: "General Physician",
            image: "assets/img/newimages/userdummy.png",
            details: "10+ years experience"
        },
        {
            name: "Dr. David Patel",
            specialty: "Cardiologist",
            image: "assets/img/newimages/userdummy.png",
            details: "10+ years experience"
        },
        {
            name: "Dr. Emily Johnson",
            specialty: "Orthopedic Surgeon",
            image: "assets/img/newimages/userdummy.png",
            details: "15+ years experience"
        },
        {
            name: "Dr. Michael Brown",
            specialty: "Pulmonologist",
            image: "assets/img/newimages/userdummy.png",
            details: "8+ years experience"
        }
    ];

    // Define durations for each consultation type
    const consultationDurations = {
        "Audio Call": ["10 Min", "15 Min", "20 Min", "30 Min"],
        "Video Call": ["10 Min", "15 Min", "20 Min", "30 Min"]
    };

    // Initialize Select2 for specialty search
    $('#specialtySearch').select2({
        placeholder: "Select a specialty",
        allowClear: true
    });

    // Initialize current date in sidebar
    const today = new Date();
    selectedDate = today.toLocaleDateString('en-US', {
        month: 'long',
        day: 'numeric',
        year: 'numeric'
    });
    $('#dateDetails').text(selectedDate);

    // Populate year dropdown
    const yearSelect = $('#yearSelect');
    const currentYearNow = new Date().getFullYear();
    for (let year = currentYearNow; year <= currentYearNow + 10; year++) {
        yearSelect.append(`<option value="${year}">${year}</option>`);
    }
    yearSelect.val(currentYear);
    $('#monthSelect').val(currentMonth);

    // Generate calendar
    function generateCalendar(month, year) {
        if (isRenderingCalendar) return;
        isRenderingCalendar = true;
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const firstDay = new Date(year, month, 1).getDay();
        const calendarGrid = $('#calendarGrid');
        calendarGrid.children().not('.day-label').remove();
        for (let i = 0; i < firstDay; i++) {
            calendarGrid.append('<div class="day empty"></div>');
        }
        for (let day = 1; day <= daysInMonth; day++) {
            calendarGrid.append(`<div class="day">${day}</div>`);
        }
        const today = new Date();
        $('.day').each(function() {
            const day = parseInt($(this).text());
            const date = new Date(year, month, day);
            if (date < today.setHours(0, 0, 0, 0)) {
                $(this).addClass('empty').removeClass('day');
            }
        });
        if (selectedDate) {
            const [monthName, day, selectedYear] = selectedDate.split(' ');
            const monthIndex = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ].indexOf(monthName);
            const dayNum = parseInt(day.replace(',', ''));
            if (monthIndex === month && parseInt(selectedYear) === year) {
                $('.day').each(function() {
                    if (parseInt($(this).text()) === dayNum) {
                        $(this).addClass('selected');
                    }
                });
            }
        }
        $('.day:not(.empty)').off('click');
        $('.day:not(.empty)').on('click', function() {
            $('.day').removeClass('selected');
            $(this).addClass('selected');
            selectedDate = `${$('#monthSelect option:selected').text()} ${$(this).text()}, ${year}`;
            $('#dateDetails').text(selectedDate);
            $('#continueBtn').prop('disabled', false).show();
        });
        isRenderingCalendar = false;
    }

    // Update calendar
    function updateCalendar() {
        currentMonth = parseInt($('#monthSelect').val());
        currentYear = parseInt($('#yearSelect').val());
        generateCalendar(currentMonth, currentYear);
    }

    // Previous month
    function prevMonth() {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        $('#monthSelect').val(currentMonth);
        $('#yearSelect').val(currentYear);
        updateCalendar();
    }

    // Next month
    function nextMonth() {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        $('#monthSelect').val(currentMonth);
        $('#yearSelect').val(currentYear);
        updateCalendar();
    }

    // Initialize calendar
    generateCalendar(currentMonth, currentYear);

    // Show Continue button for Step 1
    $('#continueBtn').show().prop('disabled', false);

    // Show only target step
    function showOnlyStep(stepNumber) {
        $('.step').removeClass('active');
        $(`#step${stepNumber}`).addClass('active');
    }

    // Update tracker line
    function updateTrackerLines(completedStepId) {
        const sidebarItems = $('.sidebar-item');
        const firstItem = sidebarItems.eq(0);
        const firstIcon = firstItem.find('.status-icon');
        const sidebarRect = $('.sidebar')[0].getBoundingClientRect();
        if (completedStepId) {
            const $completedIcon = $(`#${completedStepId}`).find('.status-icon');
            $completedIcon.addClass('spark');
            setTimeout(() => $completedIcon.removeClass('spark'), 500);
        }
        setTimeout(() => {
            let targetStepIndex = currentStep - 1;
            if (targetStepIndex < 0) targetStepIndex = 0;
            if (targetStepIndex > 5) targetStepIndex = 5;
            const targetItem = sidebarItems.eq(targetStepIndex);
            const targetIcon = targetItem.find('.status-icon');
            const firstIconRect = firstIcon[0].getBoundingClientRect();
            const targetIconRect = targetIcon[0].getBoundingClientRect();
            const startY = firstIconRect.top - sidebarRect.top + (firstIconRect.height / 2);
            const endY = targetIconRect.top - sidebarRect.top + (targetIconRect.height / 2);
            const height = endY - startY;
            const trackerLine = $('#singleTracker');
            const boatIcon = trackerLine.find('.boat-icon');
            trackerLine.css({
                top: `${startY}px`,
                height: `${height}px`
            });
            const boatEndPosition = height;
            boatIcon.css({
                top: `${lastTrackerHeight}px`,
                left: `${firstIconRect.left - sidebarRect.left + (firstIconRect.width / 2)}px`
            }).css('opacity', '1').css('top', `${boatEndPosition}px`);
            lastTrackerHeight = boatEndPosition;
        }, 600);
    }

    // Continue button handler
    function handleContinue(nextStep) {
        $('.step').removeClass('active');
        $('#continueBtn').addClass('loading').prop('disabled', true);
        $('#skeletonStep').addClass('active');
        setTimeout(() => {
            $('#skeletonStep').removeClass('active');
            showOnlyStep(nextStep);
            let completedStepId = null;
            if (currentStep === 1) {
                $('#doctorStep').addClass('completed');
                completedStepId = 'doctorStep';
            } else if (currentStep === 2) {
                $('#patientStep').addClass('completed');
                completedStepId = 'patientStep';
            } else if (currentStep === 3) {
                $('#dateStep').addClass('completed');
                completedStepId = 'dateStep';
            } else if (currentStep === 4) {
                $('#timeSlotStep').addClass('completed');
                completedStepId = 'timeSlotStep';
            } else if (currentStep === 5) {
                $('#consultationStep').addClass('completed');
                completedStepId = 'consultationStep';
            }
            currentStep = nextStep;
            $('.sidebar-item').removeClass('active');
            $(`#${['doctorStep', 'patientStep', 'dateStep', 'timeSlotStep', 'consultationStep', 'summaryStep'][nextStep - 1]}`)
                .addClass('active');
            if (nextStep === 6) {
                $('#continueBtn').hide();
                $('#completeBooking').show();
                $('#summaryStep').addClass('completed');
            } else {
                $('#continueBtn').show().removeClass('loading');
                if (nextStep === 5) {
                    $('#continueBtn').prop('disabled', true);
                } else {
                    $('#continueBtn').prop('disabled', false);
                }
                $('#completeBooking').hide();
            }
            updateTrackerLines(completedStepId);
        }, 1000);
    }

    // Continue button click
    $('#continueBtn').on('click', function() {
        if (currentStep === 1) {
            handleContinue(2);
        } else if (currentStep === 2) {
            const patientName = $('#patientName').val().trim();
            const patientDOB = $('#patientDOB').val();
            const patientGender = $('#patientGender').val();
            const appointmentType = $('#appointmentType').val();
            const patientPhone = $('#patientPhone').val().trim();
            const patientEmail = $('#patientEmail').val().trim();
            const patientReason = $('#patientReason').val().trim();
            selectedPatient = {
                name: patientName || 'Not provided',
                dob: patientDOB || 'Not provided',
                gender: patientGender || 'Not provided',
                appointmentType: appointmentType || 'Not provided',
                phone: patientPhone || 'Not provided',
                email: patientEmail || 'Not provided',
                reason: patientReason || 'Not provided'
            };
            $('#patientDetails').text(`${patientName || 'Not provided'}, ${patientGender || 'Not provided'}, DOB: ${patientDOB || 'Not provided'}`);
            handleContinue(3);
        } else if (currentStep === 3) {
            if (!selectedDate) {
                alert('Please select a date.');
                return;
            }
            handleContinue(4);
            $('#selectedDateDisplay').text(`Selected Date: ${selectedDate}`);
            $('.time-slot').removeClass('selected');
        } else if (currentStep === 4) {
            if (!selectedSlot) {
                alert('Please select a time slot.');
                return;
            }
            handleContinue(5);
            $('#selectedSlotDisplay').text(`Selected Date: ${selectedDate}, Time Slot: ${selectedSlot}`);
            $('.consultation-option').removeClass('selected');
            $('.duration-option').removeClass('selected');
            $('#durationOptions').hide();
        } else if (currentStep === 5) {
            if (!selectedConsultationType || (selectedConsultationType !== "Clinic Visit" && !selectedDuration)) {
                alert('Please select a consultation type' + (selectedConsultationType !== "Clinic Visit" ? ' and duration' : '') + '.');
                return;
            }
            handleContinue(6);
            $('#summaryDoctor').text(selectedDoctor ? selectedDoctor.name : selectedSpecialty || 'Not selected');
            $('#summaryPatient').text(`${selectedPatient.name}, ${selectedPatient.gender}, DOB: ${selectedPatient.dob}`);
            $('#summaryAppointmentType').text(selectedPatient.appointmentType);
            $('#summaryService').text(`${selectedConsultationType} ($${consultationPricePerHour}/hour)`);
            $('#summaryDate').text(selectedDate);
            $('#summarySlot').text(selectedSlot);
            const displayDuration = selectedConsultationType === "Clinic Visit" ? "30 Min" : selectedDuration;
            $('#summaryConsultation').text(`${selectedConsultationType} - ${displayDuration}`);
            const durationInMinutes = selectedConsultationType === "Clinic Visit" ? 30 : parseInt(selectedDuration);
            const hours = durationInMinutes / 60;
            totalPrice = hours * consultationPricePerHour;
            $('#summarySubtotal').text(`$${totalPrice.toFixed(2)}`);
            $('#summaryTotal').text(`$${totalPrice.toFixed(2)}`);
        }
    });

    // Doctor and Specialty Search
    function filterDoctors(query, specialty) {
        const dropdown = $('#doctorDropdown');
        dropdown.empty();
        if (!query) {
            dropdown.hide();
            return;
        }
        let filteredDoctors = doctors;
        if (specialty) {
            filteredDoctors = filteredDoctors.filter(doctor => doctor.specialty === specialty);
        }
        filteredDoctors = filteredDoctors.filter(doctor =>
            doctor.name.toLowerCase().includes(query.toLowerCase()) ||
            doctor.specialty.toLowerCase().includes(query.toLowerCase())
        );
        if (filteredDoctors.length === 0) {
            dropdown.append('<div class="doctor-option">No doctors found</div>');
        } else {
            filteredDoctors.forEach(doctor => {
                dropdown.append(`
                    <div class="doctor-option" data-doctor='${JSON.stringify(doctor)}'>
                        <img src="${doctor.image}" alt="${doctor.name}" class="doctor-image">
                        <div class="doctor-info">
                            <span class="doctor-name">${doctor.name}</span>
                            <span class="doctor-specialty">${doctor.specialty}</span>
                            <span class="doctor-details">${doctor.details}</span>
                        </div>
                    </div>
                `);
            });
        }
        dropdown.show();
        highlightDoctor(0);
    }

    let highlightedIndex = -1;

    function highlightDoctor(index) {
        const options = $('.doctor-option');
        options.removeClass('highlighted');
        if (index >= 0 && index < options.length) {
            options.eq(index).addClass('highlighted');
            highlightedIndex = index;
            const option = options.eq(index);
            const dropdown = $('#doctorDropdown');
            const scrollTop = dropdown.scrollTop();
            const optionTop = option.position().top + scrollTop;
            const optionHeight = option.outerHeight();
            const dropdownHeight = dropdown.height();
            if (optionTop < scrollTop) {
                dropdown.scrollTop(optionTop);
            } else if (optionTop + optionHeight > scrollTop + dropdownHeight) {
                dropdown.scrollTop(optionTop - dropdownHeight + optionHeight);
            }
        } else {
            highlightedIndex = -1;
        }
    }

    $('#specialtySearch').on('select2:select select2:clear', function() {
        selectedSpecialty = $(this).val() || null;
        $('#doctorDetails').text(selectedDoctor ? selectedDoctor.name : selectedSpecialty || '');
        $('#doctorSearch').val('').trigger('input'); // Clear doctor search and trigger input
        $('#continueBtn').prop('disabled', false);
    });

    $('#doctorSearch').on('input', function() {
        const query = $(this).val().trim();
        filterDoctors(query, selectedSpecialty);
    });

    $('#doctorSearch').on('keydown', function(e) {
        const options = $('.doctor-option');
        if (!options.length) return;

        switch (e.key) {
            case 'ArrowDown':
                e.preventDefault();
                highlightedIndex = (highlightedIndex + 1) % options.length;
                highlightDoctor(highlightedIndex);
                break;
            case 'ArrowUp':
                e.preventDefault();
                highlightedIndex = (highlightedIndex - 1 + options.length) % options.length;
                highlightDoctor(highlightedIndex);
                break;
            case 'Enter':
                e.preventDefault();
                if (highlightedIndex >= 0 && highlightedIndex < options.length) {
                    options.eq(highlightedIndex).trigger('click');
                }
                break;
        }
    });

    $(document).on('click', '.doctor-option', function() {
        try {
            selectedDoctor = JSON.parse($(this).attr('data-doctor'));
            if (selectedDoctor) {
                $('#selectedDoctorImage').attr('src', selectedDoctor.image);
                $('#selectedDoctorName').text(selectedDoctor.name);
                $('#selectedDoctorSpecialty').text(selectedDoctor.specialty);
                $('#selectedDoctorDetails').text(selectedDoctor.details);
                $('#doctorDetails').text(selectedDoctor.name);
                $('.search-container').hide();
                $('#doctorDropdown').hide();
                $('#selectedDoctorContainer').show();
                $('#continueBtn').prop('disabled', false);
                highlightedIndex = -1;
            }
        } catch (e) {
            console.error('Error parsing doctor data:', e);
        }
    });

    $('#removeDoctor').on('click', function() {
        selectedDoctor = null;
        $('#doctorDetails').text(selectedSpecialty || '');
        $('#selectedDoctorContainer').hide();
        $('.search-container').show();
        $('#doctorSearch').val('').focus();
        $('#continueBtn').prop('disabled', false);
        highlightedIndex = -1;
    });

    // Patient Information Initialization
    if (typeof flatpickr !== 'undefined') {
        flatpickr('#patientDOB', {
            dateFormat: 'Y-m-d',
            maxDate: 'today',
            defaultDate: null
        });
    } else {
        console.error('Flatpickr is not defined.');
    }

    if (typeof $.fn.select2 !== 'undefined') {
        $('#patientGender, #appointmentType').select2({
            placeholder: 'Select an option',
            allowClear: true
        });
    } else {
        console.error('Select2 is not defined.');
    }

    // Time Slot Selection
    $('.time-slot').on('click', function() {
        $('.time-slot').removeClass('selected');
        $(this).addClass('selected');
        selectedSlot = $(this).text();
        $('#timeSlotDetails').text(selectedSlot);
        $('#continueBtn').prop('disabled', false);
    });

    // Consultation Type and Duration
    $('.consultation-option').on('click', function() {
        $('.consultation-option').removeClass('selected');
        $(this).addClass('selected');
        selectedConsultationType = $(this).data('type');
        consultationPricePerHour = parseFloat($(this).data('price'));

        const durationOptions = $('#durationOptions');
        durationOptions.empty().hide();
        selectedDuration = null;

        if (selectedConsultationType === "Clinic Visit") {
            selectedDuration = "30 Min";
            $('#consultationDetails').text(`${selectedConsultationType} - ${selectedDuration}`);
            $('#continueBtn').prop('disabled', false);
        } else {
            const durations = consultationDurations[selectedConsultationType];
            durations.forEach(duration => {
                durationOptions.append(`<button class="btn btn-outline-primary duration-option">${duration}</button>`);
            });
            durationOptions.show();
            $('#consultationDetails').text(selectedConsultationType);
            $('#continueBtn').prop('disabled', true);

            $('.duration-option').off('click').on('click', function() {
                $('.duration-option').removeClass('selected');
                $(this).addClass('selected');
                selectedDuration = $(this).text();
                $('#consultationDetails').text(`${selectedConsultationType} - ${selectedDuration}`);
                $('#continueBtn').prop('disabled', false);
            });
        }
    });

    // Complete Booking
    $('#completeBooking').on('click', function() {
        $('.step').removeClass('active');
        $('.container-fluid').hide();
    });

    // Start New Booking
    window.startNewBooking = function() {
        $('.container-fluid').show();
        resetBookingForm();
        showOnlyStep(1);
    };

    // Reset Form
    function resetBookingForm() {
        selectedDoctor = null;
        selectedSpecialty = null;
        selectedPatient = null;
        selectedDate = today.toLocaleDateString('en-US', {
            month: 'long',
            day: 'numeric',
            year: 'numeric'
        });
        selectedSlot = null;
        selectedConsultationType = null;
        selectedDuration = null;
        consultationPricePerHour = 0;
        totalPrice = 0;
        $('#doctorDetails').text('');
        $('#patientDetails').text('');
        $('#dateDetails').text(selectedDate);
        $('#timeSlotDetails').text('');
        $('#consultationDetails').text('');
        $('#selectedDoctorContainer').hide();
        $('.search-container').show();
        $('#doctorSearch').val('').focus();
        $('#specialtySearch').val(null).trigger('change');
        $('.sidebar-item').removeClass('active completed');
        $('#doctorStep').addClass('active');
        currentStep = 1;
        $('#continueBtn').show().prop('disabled', false).removeClass('loading');
        $('#completeBooking').hide();
        $('#singleTracker').css('height', '0');
        $('.boat-icon').css('top', '0').css('opacity', '0');
        lastTrackerHeight = 0;
        updateCalendar();
        $('#patientName').val('');
        $('#patientDOB').val('');
        $('#patientGender').val(null).trigger('change');
        $('#appointmentType').val(null).trigger('change');
        $('#patientPhone').val('');
        $('#patientEmail').val('');
        $('#patientReason').val('');
        $('input[name="doctor"]').prop('checked', false);
        highlightedIndex = -1;
        $('.consultation-option').removeClass('selected');
        $('#durationOptions').empty().hide();
    }

    // Back Button
    window.goBack = function(step) {
        showOnlyStep(step - 1);
        $('.sidebar-item').removeClass('active');
        $(`#${['doctorStep', 'patientStep', 'dateStep', 'timeSlotStep', 'consultationStep', 'summaryStep'][step - 2]}`).addClass('active');
        if (step - 1 <= 1) {
            $('#doctorDetails').text('');
            selectedDoctor = null;
            selectedSpecialty = null;
            $('#doctorStep').removeClass('completed');
            $('#selectedDoctorContainer').hide();
            $('.search-container').show();
            $('#doctorSearch').val('').focus();
            $('#specialtySearch').val(null).trigger('change');
        }
        if (step - 1 <= 2) {
            $('#patientDetails').text('');
            selectedPatient = null;
            $('#patientStep').removeClass('completed');
            $('#patientName').val('');
            $('#patientDOB').val('');
            $('#patientGender').val(null).trigger('change');
            $('#appointmentType').val(null).trigger('change');
            $('#patientPhone').val('');
            $('#patientEmail').val('');
            $('#patientReason').val('');
        }
        if (step - 1 <= 3) {
            $('#timeSlotDetails').text('');
            selectedSlot = null;
            $('#timeSlotStep').removeClass('completed');
        }
        if (step - 1 <= 4) {
            $('#consultationDetails').text('');
            selectedConsultationType = null;
            selectedDuration = null;
            consultationPricePerHour = 0;
            $('#consultationStep').removeClass('completed');
            $('.consultation-option').removeClass('selected');
            $('#durationOptions').empty().hide();
        }
        if (step - 1 <= 5) {
            $('#summaryStep').removeClass('completed');
        }
        currentStep = step - 1;
        $('#continueBtn').prop('disabled', false).removeClass('loading');
        if (step === 6) {
            $('#continueBtn').show().prop('disabled', false).removeClass('loading');
            $('#completeBooking').hide();
        }
        if (currentStep === 3) {
            updateCalendar();
        }
        updateTrackerLines();
        highlightedIndex = -1;
    };

    $(window).on('resize', updateTrackerLines);
    updateTrackerLines();
});
</script>



<!-- select2 cdn  -->

<script>
    $(".monthselection").select2({
    placeholder: "Select a state",
    allowClear: false
});
$(".Yearselection").select2({
    placeholder: "Select a state",
    allowClear: false
});

</script>

</html>