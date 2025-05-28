<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="{{ route('superadmin.dashboard') }}" class="logo logo-normal">
            <img src="{{ asset('admin/img/newimages/logoicon.png') }}" alt="">
        </a>
        <a href="{{ route('superadmin.dashboard') }}" class="logo logo-white">
            <img src="{{ asset('admin/img/logo-white.png') }}" alt="">
        </a>
        <a href="{{ route('superadmin.dashboard') }}" class="logo-small">
            <img src="{{ asset('admin/img/newimages/logoicon.png') }}" alt="">
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
        <div class="topleftheader_menu nav-searchinputs ms-0">
            <nav class="navbar navbar-expand-lg bg-body-tertiary topheader_customMenu">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('superadmin.patients') }}" aria-expanded="false">
                                Patients
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('superadmin.doctors.list') }}" aria-expanded="false">
                                Doctors / Specialists
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="" aria-expanded="false">
                                Nurses
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('superadmin.pharmacies.index') }}" aria-expanded="false">
                                Pharmacists
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Clinic Management
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('superadmin.clinic.index')}}">Clinics List</a></li>
                                <li><a class="dropdown-item" href="#">Add New Clinic</a></li>


                            </ul>
                        </li>



                    </ul>

                </div>
            </nav>
        </div>

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
                                        <img alt="" src="{{ asset('admin/img/newimages/userdummy.png') }}">
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
                                        <img alt="" src="{{ asset('admin/img/newimages/userdummy.png') }}">
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
                                        <img alt="" src="{{ asset('admin/img/newimages/userdummy.png') }}">
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
                                        <img alt="" src="{{ asset('admin/img/newimages/userdummy.png') }}">
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
                                        <img alt="" src="{{ asset('admin/img/newimages/userdummy.png') }}">
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
                            <h2>{{ auth()->user()->name ?? '' }}</h2>
                            <p class="user_mail_id">{{ auth()->user()->email ?? '' }}</p>
                        </div>
                    </div>

                </div>
                <a href="{{ route('superadmin.profile') }}" class="dropdown-item notify-item">
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
                <form id="logout-form" action="{{ route('superadmin.logout') }}" method="POST"
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
