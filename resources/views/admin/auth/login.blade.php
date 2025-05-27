<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <title>Login - Tele Health Super Admin</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/assets/img/newimages/logoicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <!-- Pe7 CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/icons/themify/themify.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/custom.css') }}">

    <style>
        .success-message img {
            width: 70%;
        }

        .success-message {
            text-align: center;
        }

        .back-to-login {
            width: 90%;
            padding: 9px 20px;
            background-color: #242424 !important;
            border: 1px solid #242424 !important;
            color: #fff;
        }

        .back-to-login:hover {
            width: 90%;
            padding: 9px 20px;
            background-color: #242424 !important;
            border: 1px solid #242424 !important;
            color: #fff;
        }

        .form-control {
            height: 40px !important;
            border-color: #d8d6e3 !important;
            font-size: 13px !important;
            padding: 5px 8px !important;
        }

        .btn {
            border-radius: 5px;
            padding: 8px 10px;
        }

        /* login page style start */

        .login-wrapper .login-content .login-userheading h3 {
            font-size: 24px;
            font-weight: 700;
            margin: 0 0 10px;
            color: #ffffff;
        }

        .login-wrapper .login-content .login-userheading h4 {
            font-size: 15px;
            font-weight: 400;
            color: #d0d0d0;
            line-height: 1.4;
        }

        .login-wrapper .login-content .form-login label {
            width: 100%;
            color: #f8f8f8;
            margin-bottom: 10px;
            font-size: 15px;
            font-weight: 400;
        }

        .login-background::before {
            content: "";
            background: linear-gradient(180deg, #161a29 0%, #161a29 100%);
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            backdrop-filter: blur(6px);
        }

        .authentication-card {
            padding: 40px;
        }

        .authen-overlay-item {
            background: rgb(255 247 243 / 3%);
            border-radius: 15px;
            padding: 40px;
            position: relative;
            backdrop-filter: blur(26px);
            border: 1px solid #384050 !important;
        }

        .display-1 {
            font-size: 40px;
            font-weight: 700;
        }

        .authen-overlay-img {
            max-width: 400px;
        }

        .lohinlogo {
            width: 35%;
        }

        .formtitle_login h2 {
            margin-bottom: 1px !important;
        }

        .authentication-card p {
            color: #fff;
            text-align: center;
        }

        .mockimage_wrap {
            margin: 60px 0px;
        }

        .Iconinp_Group {
            position: relative;
        }

        .Iconinp_Group iconify-icon {
            position: absolute;
            right: 12px;
            top: 34px;
            font-size: 17px;
        }

        .LoginformWrap {
            margin: auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0px 5px 3px rgb(0 0 0 / 7%);
            width: 400px;
            overflow: hidden;
            border: 1px solid #e8e8e8;
        }

        .login-body {
            padding: 30px 20px;
        }

        .login-header {
            background-image: linear-gradient(to bottom, #e9f4fe75, #f8f6ff00), url({{ asset('admin/assets/img/newimages/Digital-Product-Hero-BG.png') }});
            background-size: cover;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            padding-bottom: 10px;
        }

        .login-header img {
            width: 35%;
        }

        .login-body p {
            text-align: center;
            margin-bottom: 20px;
            color: #666;
            font-size: 14px;
        }

        .login-body::after {
            display: none;
        }

        .login-body {
            height: auto;
            min-height: auto;
            margin: 0px;
            width: 100%;
        }

        body {
            background: #f9f9fb;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            flex-direction: column;
        }

        .btn.btn-primary {
            background: linear-gradient(to right, #2196F3, #68bafb);
            border: none !important;
            color: white;
            width: 100% !important;
            font-size: 16px !important;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 1px 5px 1px rgb(0 0 0 / 6%);
        }

        .btn.btn-primary:hover {
            border: none !important;
        }

        .logform_fields {
            margin-top: 30px;
        }

        .logFooterWrap {
            width: 100%;
            position: fixed;
            bottom: 0px;
            padding: 18px 20px;
            background: #fff;
            border-top: 1px solid #ececec;
        }

        footer.logFootr {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            gap: 10px;
        }

        footer.logFootr p {
            margin-bottom: 0px;
        }

        footer.logFootr a {
            color: #0495fa;
        }

        .success-message h2 {
            text-align: center;
            font-size: 19px;
            margin-bottom: 2px;
        }

        /* login page style end */
    </style>

</head>

<body class="account-page">

    <div id="global-loader">
        <div class="whirly-loader"> <img src="{{ asset('admin/assets/img/newimages/logoicon.png') }}" alt="loader">
        </div>

    </div>

    <div class="main-wrapper">

        <div class="LoginformWrap">

            <div class="login-header">
                <img src="{{ asset('admin/assets/img/newimages/transparentlogo-tele.png') }}" class="img-fluid"
                    alt="Logo">
            </div>

            <div class="login-body">
                <form action="{{ route('superadmin.login.submit') }}" method="post" class="form needs-validation"
                    novalidate>
                    @csrf
                    <div class="loginformcontent">

                        <!-- Login Form -->
                        <div class="loginformContainer">
                            <div class="text-center mb-3 formtitle_login">
                                <h2 class="mb-2">Welcome Back!</h2>
                                <p class="mb-0">Please Enter Your Details to Sign in.</p>
                            </div>
                            <div class="logform_fields">
                                <div class="form-group Iconinp_Group">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror" autocomplete="off" required
                                        pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$" title="Please enter a valid email">

                                    <iconify-icon icon="material-symbols:mark-email-read-outline-rounded">
                                    </iconify-icon>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group password-group Iconinp_Group">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="pass-input form-control" placeholder="********" min="6"
                                        style="width: 100%; padding-right: 40px;" autocomplete="new-password"
                                        required />
                                    <iconify-icon icon="mdi:eye" id="togglePassword"></iconify-icon>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="form-check form-check-md mb-0">
                                    <input class="form-check-input" name="remember" id="remember_me" type="checkbox"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember_me" class="form-check-label mt-0">Remember Me</label>
                                </div>
                                <div class="text-end">
                                    <a href="#" class="link-danger forgotpassword">Forgot Password?</a>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100">Sign In</button>
                            </div>
                        </div>


                    </div>
                </form>
            </div>

        </div>

    </div>
    <!-- /Main Wrapper -->
    <div class="logFooterWrap">
        <footer class="logFootr">
            <p>Copyright © 2025 - Tele Shendeti</p>
            <div class="privacyContent">
                <a href="#">Privacy Policy</a> |
                <a href="#">Terms & Conditions</a>
            </div>
        </footer>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin/assets/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('admin/assets/js/feather.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('admin/assets/js/theme-script.js') }}"></script>
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>
    <!-- iconify icon -->
    <script src="{{ asset('admin/assets/js/iconify.js') }}"></script>
    <script src="{{ asset('common/js/form-validation.js') }}"></script>

    <script>
        const passwordInput = document.getElementById("password");
        const toggleIcon = document.getElementById("togglePassword");
        toggleIcon.addEventListener("click", function() {
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);
            toggleIcon.setAttribute("icon", type === "password" ? "mdi:eye" : "mdi:eye-off");
        });
    </script>

</body>

</html>
