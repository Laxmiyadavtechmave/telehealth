<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <title>@yield('title', 'Tele Health Super Admin')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('common/img/newimages/logoicon.png') }}">

    <!-- Theme Script js -->
    <script src="assets/js/theme-script.js" type=""></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('common/css/bootstrap.min.css') }}">
    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="{{ asset('common/plugins/tabler-icons/tabler-icons.css') }}">
    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{ asset('common/css/bootstrap-datetimepicker.min.css') }}">

    <!-- Daterangepikcer CSS -->
    <link rel="stylesheet" href="{{ asset('common/plugins/daterangepicker/daterangepicker.css') }}">

    <!-- animation CSS -->
    <link rel="stylesheet" href="{{ asset('common/css/animate.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('common/plugins/select2/css/select2.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('common/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('common/plugins/fontawesome/css/all.min.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('common/css/feather.css') }}">

    <link href="{{ asset('common/vendors/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('common/vendors/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">

    <link rel="stylesheet" href="{{ asset('common/css/modernstyle.css') }}">

</head>

<body class="mini-sidebar">
    <div id="global-loader">
        <div class="whirly-loader"> <img src="{{ asset('admin/img/newimages/logoicon.png') }}" alt="">
        </div>

    </div>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        @include('admin.layouts.header')
       
        @include('admin.layouts.sidebar')
        @yield('content')
    </div>
    @include('admin.layouts.footer')
    @stack('custom_scripts')
    @include('admin.layouts.includes.alerts')
</body>

</html>
