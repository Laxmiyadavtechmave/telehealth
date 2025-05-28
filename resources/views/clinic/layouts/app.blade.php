<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <title>@yield('title', 'Tele Health Clinic Admin')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('clinic/img/newimages/logoicon.png') }}">

    <!-- Theme Script js -->
    <script src="{{ asset('clinic/js/theme-script.js') }}" type=""></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('clinic/css/bootstrap.min.css') }}">
    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="{{ asset('clinic/plugins/tabler-icons/tabler-icons.css') }}">
    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{ asset('clinic/css/bootstrap-datetimepicker.min.css') }}">

    <!-- Daterangepikcer CSS -->
    <link rel="stylesheet" href="{{ asset('clinic/plugins/daterangepicker/daterangepicker.css') }}">

    <!-- animation CSS -->
    <link rel="stylesheet" href="{{ asset('clinic/css/animate.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('clinic/plugins/select2/css/select2.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('clinic/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clinic/plugins/fontawesome/css/all.min.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('clinic/css/feather.css') }}">

    <!-- Datatable CSS -->
    <!-- Data Table CSS -->
    <link href="{{ asset('clinic/vendors/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('clinic/vendors/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('clinic/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('clinic/css/custom.css') }}">

    <link rel="stylesheet" href="{{ asset('clinic/css/modernstyle.css') }}">

</head>

<body class="mini-sidebar">
    <div id="global-loader">
        <div class="whirly-loader"> <img src="{{ asset('clinic/img/newimages/logoicon.png') }}" alt=""> </div>

    </div>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="main-wrapper">
        @include('clinic.layouts.header')
         @include('admin.layouts.includes.alerts')
        @include('clinic.layouts.sidebar')
        @yield('content')
    </div>
    <!-- /Main Wrapper -->
    @include('clinic.layouts.footer')
    @stack('custom_scripts')
</body>

</html>
