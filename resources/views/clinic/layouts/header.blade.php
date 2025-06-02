<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="{{ route('clinic.dashboard') }}" class="logo logo-normal">
            <img src="{{ asset('clinic/img/newimages/logoicon.png') }}" alt="">
        </a>
        <a href="{{ route('clinic.dashboard') }}" class="logo logo-white">
            <img src="{{ asset('clinic/img/logo-white.png') }}" alt="">
        </a>
        <a href="{{ route('clinic.dashboard') }}" class="logo-small">
            <img src="{{ asset('clinic/img/newimages/logoicon.png') }}" alt="">
        </a>

    </div>
    <!-- /Logo -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Menu -->
    <ul class="nav user-menu">
        <div class="topleftheader_menu">
            <nav class="navbar navbar-expand-lg bg-body-tertiary topheader_customMenu">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('clinic.patient.index') }}" aria-expanded="false">
                                Patients
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('clinic.doctor.index') }}" aria-expanded="false">
                                Doctors / Specialists
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('clinic.nurse.index') }}" aria-expanded="false">
                                Nurses
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('clinic.pharmacy.index') }}" aria-expanded="false">
                                Pharmacists
                            </a>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Appointments
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="appointment.php">All Appointments</a></li>
                                <li><a class="dropdown-item" href="final-book.php">Add New Appointments</a>
                                </li>

                            </ul>
                        </li>


                    </ul>

                </div>
            </nav>
        </div>

        <!-- Search -->
        <li class="nav-item nav-searchinputs">
            <div class="top-nav-search">
                <a href="javascript:void(0);" class="responsive-search">
                    <i class="fa fa-search"></i>
                </a>
                <form action="#" class="dropdown">
                    <div class="searchinputs dropdown-toggle" id="dropdownMenuClickable" data-bs-toggle="dropdown"
                        data-bs-auto-close="false">
                        <iconify-icon icon="icon-park-outline:search"></iconify-icon>
                        <input type="text" placeholder="Search">
                        <div class="search-addon">
                            <span><i data-feather="x-circle" class="feather-14"></i></span>
                        </div>
                    </div>
                    <div class="dropdown-menu search-dropdown" aria-labelledby="dropdownMenuClickable">
                        <div class="search-info">
                            <h6><span><i data-feather="search" class="feather-16"></i></span>Recent Searches
                            </h6>
                            <ul class="search-tags">
                                <li><a href="javascript:void(0);">Patients</a></li>
                                <li><a href="javascript:void(0);">Doctors</a></li>
                                <li><a href="javascript:void(0);">Clinics</a></li>
                            </ul>
                        </div>
                        <div class="search-info">
                            <h6><span><i data-feather="help-circle" class="feather-16"></i></span>Help</h6>
                            <p>How to Change Product Volume from 0 to 200 on Inventory management</p>
                            <p>Change Product Name</p>
                        </div>
                        <div class="search-info">
                            <h6><span><i data-feather="user" class="feather-16"></i></span>Customers</h6>
                            <ul class="customers">
                                <li>
                                    <a href="javascript:void(0);">Aron Varu<img src="assets/img/profiles/avator1.jpg"
                                            alt="" class="img-fluid"></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Jonita<img src="assets/img/profiles/avatar-01.jpg"
                                            alt="" class="img-fluid"></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Aaron<img src="assets/img/profiles/avatar-10.jpg"
                                            alt="" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <!-- /Search -->


        <!-- /Flag -->
        <li class="dropdown d-none d-xl-block">
            <a class="nav-link dropdown-toggle quicklink_drodpwnBtn" data-bs-toggle="dropdown" href="#"
                role="button" aria-haspopup="false" aria-expanded="false">
                <iconify-icon icon="si:dashboard-duotone"></iconify-icon>
            </a>
            <div class="dropdown-menu quicklink_dropdown_main">

                <div class="appItems_wrap">
                    <div class="appsgritems">
                        <div class="quickapp_item">
                            <div class="item__icon">
                                <div class="appicon_avatar" style="background: rgb(123, 104, 238);">
                                    RJ
                                </div>
                            </div>
                            <div class="Appitem__title">My profile</div>
                        </div>
                        <div class="quickapp_item">
                            <div class="item__icon">
                                <div class="appicon_avatar">
                                    <iconify-icon icon="pepicons-print:ticket"></iconify-icon>
                                </div>
                            </div>
                            <div class="Appitem__title">Tickets</div>
                        </div>
                        <!-- <div class="quickapp_item">

                                    <div class="quickapp_item">
                                        <div class="item__icon">
                                            <div class="appicon_avatar">
                                                <iconify-icon icon="ph:users-duotone"></iconify-icon>
                                            </div>
                                        </div>
                                        <div class="Appitem__title">Patients</div>
                                    </div>
                                    <div class="quickapp_item">
                                        <div class="item__icon">
                                            <div class="appicon_avatar">
                                                <iconify-icon icon="hugeicons:ai-user"></iconify-icon>
                                            </div>
                                        </div>
                                        <div class="Appitem__title">Nurses</div>
                                    </div>
                                    <div class="quickapp_item">
                                        <div class="item__icon">
                                            <div class="appicon_avatar">
                                                <iconify-icon icon="hugeicons:activity-04"></iconify-icon>
                                            </div>
                                        </div>
                                        <div class="Appitem__title">Activity</div>
                                    </div>
                                    <div class="quickapp_item">
                                        <div class="item__icon">
                                            <div class="appicon_avatar">
                                                <iconify-icon icon="proicons:bell"></iconify-icon>
                                            </div>
                                        </div>
                                        <div class="Appitem__title">Notifications</div>
                                    </div>
                                    <div class="quickapp_item">
                                        <div class="item__icon">
                                            <div class="appicon_avatar">
                                                <iconify-icon icon="fluent:person-support-20-regular"></iconify-icon>
                                            </div>
                                        </div>
                                        <div class="Appitem__title">Support</div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </li>

                    <li class="nav-item nav-item-box">
                        <a href="javascript:void(0);" id="btnFullscreen">
                            <iconify-icon icon="solar:maximize-square-linear"></iconify-icon>
                        </a>
                    </li>

                    <!-- Notifications -->
        <li class="nav-item dropdown nav-item-box">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <iconify-icon icon="proicons:bell"></iconify-icon><span class="badge rounded-pill">2</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        <li class="notification-message">
                            <a href="activitiesjavascript:void(0);">
                                <div class="media d-flex">
                                    <span class="avatar flex-shrink-0">
                                        <img alt="" src="assets/img/newimages/userdummy.png">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">John Doe</span> added
                                            new task <span class="noti-title">Patient appointment
                                                booking</span>
                                        </p>
                                        <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="activitiesjavascript:void(0);">
                                <div class="media d-flex">
                                    <span class="avatar flex-shrink-0">
                                        <img alt="" src="assets/img/newimages/userdummy.png">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">Tarah
                                                Shropshire</span>
                                            changed the task name <span class="noti-title">Appointment booking
                                                with payment gateway</span>
                                        </p>
                                        <p class="noti-time"><span class="notification-time">6 mins ago</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="activitiesjavascript:void(0);">
                                <div class="media d-flex">
                                    <span class="avatar flex-shrink-0">
                                        <img alt="" src="assets/img/newimages/userdummy.png">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">Misty Tison</span>
                                            added <span class="noti-title">Domenic Houston</span> and <span
                                                class="noti-title">Claire Mapes</span> to project <span
                                                class="noti-title">Doctor available module</span>
                                        </p>
                                        <p class="noti-time"><span class="notification-time">8 mins ago</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="activitiesjavascript:void(0);">
                                <div class="media d-flex">
                                    <span class="avatar flex-shrink-0">
                                        <img alt="" src="assets/img/newimages/userdummy.png">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">Rolland Webber</span>
                                            completed task <span class="noti-title">Patient and Doctor video
                                                conferencing</span>
                                        </p>
                                        <p class="noti-time"><span class="notification-time">12 mins
                                                ago</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="activitiesjavascript:void(0);">
                                <div class="media d-flex">
                                    <span class="avatar flex-shrink-0">
                                        <img alt="" src="assets/img/newimages/userdummy.png">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">Bernardo
                                                Galaviz</span>
                                            added new task <span class="noti-title">Private chat module</span>
                                        </p>
                                        <p class="noti-time"><span class="notification-time">2 days ago</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="activitiesjavascript:void(0);">View all Notifications</a>
                </div>
            </div>
        </li>
        <!-- /Notifications -->


        <li class="ms-3 dropdown notification-list topbar-dropdown border-left toprProfileBtn">
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
                <a href="profile.php" class="dropdown-item notify-item">
                    <iconify-icon icon="si:user-duotone"></iconify-icon><span>My Account</span>
                </a>

                {{-- <a href="login.php" class="dropdown-item notify-item">
                                <iconify-icon icon="hugeicons:logout-square-02"></iconify-icon><span>Logout</span>
                            </a> --}}

                <a href="#" class="dropdown-item notify-item"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <iconify-icon icon="hugeicons:logout-square-02"></iconify-icon>
                    <span>Logout</span>
                </a>

                <!-- Hidden Logout Form -->
                <form id="logout-form" action="{{ route('clinic.logout') }}" method="POST"
                    style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="profile.php">My Profile</a>
            <a class="dropdown-item" href="signinjavascript:void(0);">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->
</div>
<!-- /Header -->
