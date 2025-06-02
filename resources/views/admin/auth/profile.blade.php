@extends('admin.layouts.app')
@section('title', 'Tele Health Super Admin | Profile')
@section('content')
<div class="page-wrapper">
    <form action="{{ route('superadmin.profile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="content settings-content">
            <div class="d-md-flex pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb">
                <div class="my-auto">
                    <h2 class="mb-1 flexpagetitle">
                        <div class="backbtnwrap">
                            <a href="{{ route('superadmin.dashboard') }}">
                                <iconify-icon icon="octicon:arrow-left-24"></iconify-icon>
                            </a>
                        </div>
                        Your Profile
                    </h2>
                </div>
                <div class="d-flex right-content align-items-center flex-wrap">
                    <ul class="tophead_action">
                        <li>
                            <div class="enquiryDate">
                                <iconify-icon icon="ion:calendar-outline"></iconify-icon> Last Updated On:
                                <div class="Onboarddate">{{ $user->updated_at->format('d M Y h:ia') }}</div>
                            </div>
                        </li>
                        <li>
                            <div class="pageheader_rightbtns">
                                <button type="submit" class="cmnPromary_btn">Save Changes</button>
                            </div>
                        </li>
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
                                    <div class="sidebars settings-sidebar" id="sidebar2">
                                        <div class="sidebar-inner slimscroll">
                                            <div class="profile-content">
                                                <div class="profile-contentimg">
                                                    <img src="{{ $user->img ? env('IMAGE_ROOT'). $user->img : asset('admin/img/newimages/userdummy.png') }}"
                                                        alt="Profile Image" id="blah">
                                                </div>
                                                <div class="profile-contentname">
                                                    <h2>{{ $user->name ?? 'N/A' }}</h2>
                                                    <p><a href="mailto:{{ $user->email ?? '' }}">{{ $user->email }}</a></p>
                                                </div>
                                            </div>
                                            <div id="sidebar-menu5" class="sidebar-menu">
                                                <div class="nav vendorDetail_lefttabs flex-column nav-pills tab-style-7"
                                                    id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <button class="nav-link text-start active" id="main-profile-tab"
                                                        data-bs-toggle="pill" data-bs-target="#main-profile"
                                                        type="button" role="tab" aria-controls="main-profile"
                                                        aria-selected="true">
                                                        <iconify-icon icon="solar:user-line-duotone"></iconify-icon>
                                                        Basic Details
                                                    </button>
                                                    <button class="nav-link text-start" id="man-password-tab"
                                                        data-bs-toggle="pill" data-bs-target="#man-password"
                                                        type="button" role="tab" aria-controls="man-password"
                                                        aria-selected="false">
                                                        <iconify-icon icon="hugeicons:square-lock-password"></iconify-icon>
                                                        Security
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="profileLogout_wrap">
                                                <button class="btn" id="logoutbtn" type="button"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <iconify-icon icon="solar:logout-broken"></iconify-icon> Logout
                                                </button>
                                                <form id="logout-form" action="{{ route('superadmin.logout') }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="settings-page-wrap">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane show active" id="main-profile" role="tabpanel" tabindex="0">
                                                <div class="setting-title">
                                                    <h4>Basic Information</h4>
                                                </div>
                                                <div class="vendortab_inrdetails">
                                                    <div class="row">
                                                        <div class="image-upload-container mb-2">
                                                            <div class="profile-pic-wrapper">
                                                                <div class="pic-holder position-relative">
                                                                    <img id="profilePicPreview" class="pic"
                                                                        src="{{ $user->img ? env('IMAGE_ROOT'). $user->img : asset('admin/img/newimages/userdummy.png') }}"
                                                                        alt="Profile Picture" style="width: 150px; height: 150px; object-fit: cover;" />

                                                                    <input class="uploadProfileInput" type="file"
                                                                        name="profile_pic" id="newProfilePhoto"
                                                                        accept="image/*" style="opacity: 0; position: absolute; top: 0; left: 0; width: 100%; height: 100%;" />

                                                                    <label for="newProfilePhoto" class="upload-file-block text-center" style="cursor:pointer;">
                                                                        <div class="uploadicon_template">
                                                                            <iconify-icon icon="bytesize:upload"></iconify-icon>
                                                                        </div>
                                                                        <div class="text-uppercase">Update <br /> Photo</div>
                                                                    </label>
                                                                </div>

                                                                @error('profile_pic')
                                                                    <div class="alert alert-danger d-inline-block p-2 small" role="alert">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-title-head afterfirsthead_title">
                                                        <h6><span><iconify-icon icon="solar:user-line-duotone"></iconify-icon></span>Primary Contact</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Name</label>
                                                                <input type="text" class="form-control" name="name"
                                                                       value="{{ old('name', $user->name) }}"
                                                                       placeholder="John Cena">
                                                                @error('name')
                                                                    <div class="text-danger small">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Phone Number</label>
                                                                <input class="form-control phonewithcode_inp" id="phone"
                                                                       name="phone" type="text"
                                                                       value="{{ old('phone', $user->phone) }}"
                                                                       placeholder="1234567890">
                                                                @error('phone')
                                                                    <div class="text-danger small">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Email Address</label>
                                                                <input type="email" class="form-control" name="email"
                                                                       value="{{ old('email', $user->email) }}"
                                                                       placeholder="johndoe@example.com">
                                                                @error('email')
                                                                    <div class="text-danger small">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-title-head afterfirsthead_title">
                                                        <h6><span><iconify-icon icon="fluent:location-ripple-24-regular"></iconify-icon></span>Address</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Street Address 1</label>
                                                                <input type="text" class="form-control" name="address_line_1"
                                                                       value="{{ old('address_line_1', $user->address_line_1) }}"
                                                                       placeholder="123 Main Street, Apt 101">
                                                                @error('address_line_1')
                                                                    <div class="text-danger small">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Street Address Line 2</label>
                                                                <input type="text" class="form-control" name="address_line_2"
                                                                       value="{{ old('address_line_2', $user->address_line_2) }}"
                                                                       placeholder="Optional">
                                                                @error('address_line_2')
                                                                    <div class="text-danger small">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">Country / Region</label>
                                                                <input type="text" class="form-control" name="country"
                                                                       value="{{ old('country', $user->country) }}"
                                                                       placeholder="Morocco">
                                                                @error('country')
                                                                    <div class="text-danger small">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-3 col-lg-4 col-md-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">State / Province</label>
                                                                <input type="text" class="form-control" name="state"
                                                                       value="{{ old('state', $user->state) }}"
                                                                       placeholder="California">
                                                                @error('state')
                                                                    <div class="text-danger small">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-3 col-lg-4 col-md-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">City</label>
                                                                <input type="text" class="form-control" name="city"
                                                                       value="{{ old('city', $user->city) }}"
                                                                       placeholder="Los Angeles">
                                                                @error('city')
                                                                    <div class="text-danger small">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-3 col-lg-4 col-md-3">
                                                            <div class="mb-3">
                                                                <label class="form-label">Postal / Zip Code</label>
                                                                <input type="text" class="form-control" name="pin_code"
                                                                       value="{{ old('pin_code', $user->pin_code) }}"
                                                                       placeholder="90001">
                                                                @error('pin_code')
                                                                    <div class="text-danger small">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="man-password" role="tabpanel" tabindex="0">
                                                <div class="settings-page-wrap">
                                                    <div class="setting-title">
                                                        <h4>Security Settings</h4>
                                                    </div>
                                                    <div class="vendortab_inrdetails password_setting">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group inputwithICON position-relative">
                                                                    <label class="form-label">Old Password</label>
                                                                    <iconify-icon icon="iconamoon:eye-light" width="17" height="17"></iconify-icon>
                                                                    <input type="password" class="form-control" name="old_password"
                                                                           placeholder="Enter old Password">
                                                                    @error('old_password')
                                                                        <div class="text-danger small">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group inputwithICON position-relative">
                                                                    <label class="form-label">New Password</label>
                                                                    <iconify-icon icon="iconamoon:eye-light" width="17" height="17"></iconify-icon>
                                                                    <input type="password" class="form-control" name="new_password"
                                                                           placeholder="Enter New Password">
                                                                    @error('new_password')
                                                                        <div class="text-danger small">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group inputwithICON position-relative">
                                                                    <label class="form-label">Confirm Password</label>
                                                                    <iconify-icon icon="iconamoon:eye-light" width="17" height="17"></iconify-icon>
                                                                    <input type="password" class="form-control" name="password_confirmation"
                                                                           placeholder="Confirm Password">
                                                                    @error('password_confirmation')
                                                                        <div class="text-danger small">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="securityNote">
                                                            <iconify-icon icon="ph:info-fill"></iconify-icon>
                                                            <p>Password should be minimum 8 characters and include lower and uppercase letters, numbers, and special characters.</p>
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
            </div>
        </form>
    </div>
@endsection
@push('custom_scripts')
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery (Assuming it's included in admin.layouts.app) -->
    <script>
        // Display success or error messages from session
        @if (session('success'))
            Swal.fire({
                toast: true,
                icon: 'success',
                title: '{{ session('success') }}',
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#fff',
                color: '#333',
            });
        @endif
        @if (session('error'))
            Swal.fire({
                toast: true,
                icon: 'error',
                title: '{{ session('error') }}',
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#fff',
                color: '#333',
            });
        @endif

        // Profile image upload
        // document.addEventListener("change", function(event) {
        //     if (event.target.classList.contains("uploadProfileInput")) {
        //         const triggerInput = event.target;
        //         const currentImg = triggerInput.closest(".pic-holder").querySelector(".pic").src;
        //         const holder = triggerInput.closest(".pic-holder");
        //         const wrapper = triggerInput.closest(".profile-pic-wrapper");
        //         const alerts = wrapper.querySelectorAll('[role="alert"]');
        //         alerts.forEach(alert => alert.remove());
        //         triggerInput.blur();
        //         const files = triggerInput.files || [];
        //         if (!files.length || !window.FileReader) return;
        //         if (/^image/.test(files[0].type)) {
        //             const reader = new FileReader();
        //             reader.readAsDataURL(files[0]);
        //             reader.onloadend = function() {
        //                 holder.classList.add("uploadInProgress");
        //                 holder.querySelector(".pic").src = this.result;
        //                 const loader = document.createElement("div");
        //                 loader.classList.add("upload-loader");
        //                 loader.innerHTML = '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>';
        //                 holder.appendChild(loader);
        //                 setTimeout(() => {
        //                     holder.classList.remove("uploadInProgress");
        //                     loader.remove();
        //                     const random = Math.random();
        //                     if (random < 0.9) {
        //                         wrapper.innerHTML += '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image preview updated</div>';
        //                         // Keep the file input value for form submission
        //                         wrapper.querySelector(".upload-file-block").style.opacity = "0";
        //                         setTimeout(() => wrapper.querySelector('[role="alert"]').remove(), 3000);
        //                     } else {
        //                         holder.querySelector(".pic").src = currentImg;
        //                         wrapper.innerHTML += '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> Error in preview. Please try again.</div>';
        //                         triggerInput.value = "";
        //                         setTimeout(() => wrapper.querySelector('[role="alert"]').remove(), 3000);
        //                     }
        //                 }, 1500);
        //             };
        //         } else {
        //             wrapper.innerHTML += '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose a valid image.</div>';
        //             setTimeout(() => wrapper.querySelector('[role="alert"]').remove(), 3000);
        //         }
        //     }
        // });
        document.addEventListener("change", function(event) {
            if (event.target.classList.contains("uploadProfileInput")) {
                const input = event.target;
                const file = input.files[0];
                const preview = input.closest(".pic-holder").querySelector(".pic");

                if (file && file.type.startsWith("image/")) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert("Please choose a valid image file.");
                    input.value = ""; // Clear the input
                }
            }
        });

        // Password visibility toggle and validation
        $(document).ready(function() {
            // Toggle password visibility
            $(".inputwithICON iconify-icon").click(function() {
                const input = $(this).siblings("input");
                const type = input.attr("type") === "password" ? "text" : "password";
                input.attr("type", type);
            });

            // Client-side password validation
            function validatePassword(password) {
                const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
                return regex.test(password);
            }

            $("input[name='new_password']").on("keyup", function() {
                const newPassword = $(this).val();
                const validationMessage = "Password should be at least 8 characters long and include uppercase, lowercase, numbers, and special characters.";
                if (newPassword === "" || validatePassword(newPassword)) {
                    $(".securityNote p").text(newPassword ? "Password meets requirements." : validationMessage).css("color", newPassword ? "green" : "#333");
                    $("input[name='password_confirmation']").prop("disabled", !newPassword);
                } else {
                    $(".securityNote p").text(validationMessage).css("color", "red");
                    $("input[name='password_confirmation']").prop("disabled", true);
                }
            });

            $("input[name='password_confirmation']").on("keyup", function() {
                const newPassword = $("input[name='new_password']").val();
                const confirmPassword = $(this).val();
                $(".match-message, .error-message").remove();
                if (newPassword && confirmPassword) {
                    if (newPassword === confirmPassword) {
                        $(".securityNote").after("<p class='match-message' style='color: green;'>Passwords match!</p>");
                    } else {
                        $(".securityNote").after("<p class='error-message' style='color: red;'>Passwords do not match!</p>");
                    }
                }
            });
        });
    </script>
@endpush
