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


    <link rel="stylesheet" href="assets/css/bookingform.css">
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <!-- TopHeader-->
    <div class="TopHeader">
        <div class="logoHead">
            <a href="appointment.php" class="backBtn">
                <iconify-icon icon="system-uicons:pull-left"></iconify-icon>
            </a>
            <img src="assets/img/newimages/transparentlogo-tele.png" alt="">
        </div>
        <div class="MiddleTitle">
            <h5>Book Appointment</h5>
        </div>
        <div class="ProfileIcon toprProfileBtn">
            <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="false"
                aria-expanded="false">
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

        <Section class="Successmesaage_wrap">
            <!-- Success Page -->
        <div class="success-page" id="successPage">
            <div class="successImage">
                <img src="assets/img/newimages/kkSb1K4UZF.png" alt="">
            </div>
            <h2>Appointment Booked — Payment Pending</h2>
            <p>Your appointment has been reserved, but the payment is still pending. Please complete the payment through the app to confirm your booking.</p>
            <a href="final-book.php" class="BtnBacktohome" onclick="startNewBooking()">Book Another Appointment</a>
        </div>
        </Section>


        </div>

    </div>
</body>


<!--  -->

<!-- jQuery -->
<script src="assets/js/jquery-3.7.1.min.js"></script>
<!-- iconify icon -->
<script src="assets/js/iconify.js"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>

</html>