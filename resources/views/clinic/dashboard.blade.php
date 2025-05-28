@extends('clinic.layouts.app')
@section('title', 'Tele Health Clinic Admin | dashboard')
@section('content')
    <style>
        .card .card-header {
            background: #f9f9fb;
            border-color: #eaeef3;
        }
    </style>
    <div class="page-wrapper">
        <div class="content">

            <div class="d-md-flex d-block align-items-center justify-content-between pagetop_headercmn index_head">
                <div class="my-auto mb-2 dashtopTitle">
                    <h2 class="mb-1">Welcome Back, David john <iconify-icon icon="fluent-emoji:waving-hand"></iconify-icon>
                    </h2>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">

                    <div class="Dashdaterange">
                        <iconify-icon icon="solar:calendar-broken"></iconify-icon>
                        <input type="text" class="form-control date-range bookingrange"
                            placeholder="dd/mm/yyyy - dd/mm/yyyy">
                    </div>
                    <div class="ms-2 head-icons">
                        <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-original-title="Collapse" id="collapse-header">
                            <i class="ti ti-chevrons-up"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="dashCounter_cards_wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-0">
                            <div class="card-header cardflex_header">
                                <h5 class="card-title">
                                    <div class="cardheader_TITIcon">
                                        <iconify-icon icon="iconoir:bell-notification"></iconify-icon>
                                    </div>
                                    Overview
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row dashCounter_cards">

                                    <div class="col-xl-2 col-sm-6 col-12 DB_Card">
                                        <a href="##">
                                            <div class="dash-widget w-100">
                                                <div class="Dashwidget_cdIcon">
                                                    <div class="dash-widgetimg">
                                                        <span>
                                                            <iconify-icon icon="guidance:in-patient"></iconify-icon>
                                                        </span>
                                                    </div>
                                                    <div class="dash-widgetcontent">
                                                        <h5><span class="counters" data-count="4765">4765</span></h5>
                                                        <div class="Numcard_title">Total Patients</div>
                                                    </div>
                                                </div>

                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-sm-6 col-12 DB_Card">
                                        <a href="##">
                                            <div class="dash-widget w-100">
                                                <div class="Dashwidget_cdIcon">
                                                    <div class="dash-widgetimg">
                                                        <span>
                                                            <iconify-icon icon="healthicons:doctor-outline"></iconify-icon>
                                                        </span>
                                                    </div>
                                                    <div class="dash-widgetcontent">
                                                        <h5><span class="counters" data-count="67">67</span></h5>
                                                        <div class="Numcard_title">Total Doctors</div>
                                                    </div>
                                                </div>

                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-sm-6 col-12 DB_Card">
                                        <a href="##">
                                            <div class="dash-widget w-100">
                                                <div class="Dashwidget_cdIcon">
                                                    <div class="dash-widgetimg">
                                                        <span>
                                                            <iconify-icon icon="healthicons:nurse-outline"></iconify-icon>
                                                        </span>
                                                    </div>
                                                    <div class="dash-widgetcontent">
                                                        <h5><span class="counters" data-count="71">71</span></h5>
                                                        <div class="Numcard_title">Total Nurses</div>
                                                    </div>
                                                </div>

                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-sm-6 col-12 DB_Card">
                                        <a href="##">
                                            <div class="dash-widget w-100">
                                                <div class="Dashwidget_cdIcon">
                                                    <div class="dash-widgetimg">
                                                        <span>
                                                            <iconify-icon icon="hugeicons:appointment-01"></iconify-icon>
                                                        </span>
                                                    </div>
                                                    <div class="dash-widgetcontent">
                                                        <h5><span class="counters" data-count="54">54</span></h5>
                                                        <div class="Numcard_title">Appointments Today </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xl-2 col-sm-6 col-12 DB_Card">
                                        <a href="##">
                                            <div class="dash-widget w-100">
                                                <div class="Dashwidget_cdIcon">
                                                    <div class="dash-widgetimg">
                                                        <span>
                                                            <iconify-icon icon="solar:graph-new-up-broken"></iconify-icon>
                                                        </span>
                                                    </div>
                                                    <div class="dash-widgetcontent">
                                                        <h5><span class="counters" data-count="67">67</span></h5>
                                                        <div class="Numcard_title">Revenue Summary</div>
                                                    </div>
                                                </div>

                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-xl-2 col-sm-6 col-12 DB_Card">
                                        <a href="##">
                                            <div class="dash-widget w-100">
                                                <div class="Dashwidget_cdIcon">
                                                    <div class="dash-widgetimg">
                                                        <span>
                                                            <iconify-icon icon="mynaui:users"></iconify-icon>
                                                        </span>
                                                    </div>
                                                    <div class="dash-widgetcontent">
                                                        <h5><span class="counters" data-count="22">22</span></h5>
                                                        <div class="Numcard_title">Total Users</div>
                                                    </div>
                                                </div>

                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
            <!-- Button trigger modal -->

            <div class="OtherWidgets_wrapper">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card nomargin-bt">
                            <div class="card-header cardflex_header">
                                <h5 class="card-title">Weekly Earning</h5>
                            </div>
                            <div class="card-body">
                                <div class="cardbody_content">
                                    <div class="cardcontent_imgwrap">
                                        <img src="{{ asset('clinic/img/icons/weekly-earning.svg') }}" alt="img">
                                    </div>
                                    <div class="cardbody_title">
                                        <h3>$<span class="counters" data-count="95000.45">95000.45</span></h3>
                                        <p class="sales-range"><span class="text-success"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-up feather-16">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>48%&nbsp;</span>increase compare to last week</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- Total Sales Chart -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header cardflex_header">
                                <h5 class="card-title">Patient Admissions</h5>
                                <div class="rightchartfilter StoreChartFilterdrop">
                                    <select class="select2 filter-select" data-chart="admissionsChart">
                                        <option value="week">This Week</option>
                                        <option value="month">This Month</option>
                                        <option value="year">This Year</option>
                                        <option value="custom">Custom Range</option>
                                    </select>
                                    <input type="text" class="custom-range form-control" data-chart="admissionsChart"
                                        style="display:none;" />
                                </div>
                            </div>
                            <div id="admissionsChart"></div>
                        </div>
                    </div>

                    <div class="col-lg-3 mt-3">
                        <div class="card notifications notifications_card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <div class="cardheader_TITIcon">
                                        <iconify-icon icon="iconoir:bell-notification"></iconify-icon>
                                    </div>
                                    Recent Notifications
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="noti-content">
                                    <ul class="notification-list">
                                        <li class="notification-message">
                                            <a href="activitiesjavascript:void(0);">
                                                <div class="media d-flex">
                                                    <span class="avatar flex-shrink-0">
                                                        <img alt="" src="assets/img/newimages/userdummy.png">
                                                    </span>
                                                    <div class="media-body flex-grow-1">
                                                        <p class="noti-details"><span class="noti-title">John Doe</span>
                                                            added
                                                            new task <span class="noti-title">Patient appointment
                                                                booking</span>
                                                        </p>
                                                        <p class="noti-time"><span class="notification-time">4 mins
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
                                                        <p class="noti-details"><span class="noti-title">Tarah
                                                                Shropshire</span>
                                                            changed the task name <span class="noti-title">Appointment
                                                                booking
                                                                with payment gateway</span>
                                                        </p>
                                                        <p class="noti-time"><span class="notification-time">6 mins
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
                                                        <p class="noti-details"><span class="noti-title">Misty
                                                                Tison</span>
                                                            added <span class="noti-title">Domenic Houston</span> and <span
                                                                class="noti-title">Claire Mapes</span> to project <span
                                                                class="noti-title">Doctor available module</span>
                                                        </p>
                                                        <p class="noti-time"><span class="notification-time">8 mins
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
                                                        <p class="noti-details"><span class="noti-title">Rolland
                                                                Webber</span>
                                                            completed task <span class="noti-title">Patient and Doctor
                                                                video
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
                                                            added new task <span class="noti-title">Private chat
                                                                module</span>
                                                        </p>
                                                        <p class="noti-time"><span class="notification-time">2 days
                                                                ago</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 mt-3">
                        <div class="card">
                            <div class="card-header cardflex_header">
                                <h5 class="card-title">
                                    <div class="cardheader_TITIcon">
                                        <iconify-icon icon="healthicons:doctor-female-outline"></iconify-icon>
                                    </div>
                                    Today Available Doctor’s
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="doctors_schedule">


                                    <div class="doctors_schedule-list-title">List of Doctor <iconify-icon
                                            icon="stash:arrow-down-duotone"></iconify-icon></div>

                                    <div class="doctors_schedule-list">
                                        <div class="doctors_schedule-doctor">
                                            <div class="doctors_schedule-info">
                                                <img src="assets/img/users/user-19.jpg" alt="Doctor">
                                                <div>
                                                    <div class="name">Lutfi Steven</div>
                                                    <div class="specialty">Anesthesiology</div>
                                                </div>
                                            </div>
                                            <span class="status available">Available</span>
                                        </div>

                                        <div class="doctors_schedule-doctor">
                                            <div class="doctors_schedule-info">
                                                <img src="assets/img/users/avatar-12.jpg" alt="Doctor">
                                                <div>
                                                    <div class="name">Nasrul Sirli</div>
                                                    <div class="specialty">Cardiology</div>
                                                </div>
                                            </div>
                                            <span class="status available">Available</span>
                                        </div>

                                        <div class="doctors_schedule-doctor">
                                            <div class="doctors_schedule-info">
                                                <img src="assets/img/users/user-44.jpg" alt="Doctor">
                                                <div>
                                                    <div class="name">Sophie Turner</div>
                                                    <div class="specialty">Pediatrics</div>
                                                </div>
                                            </div>
                                            <span class="status available">Available</span>
                                        </div>

                                        <div class="doctors_schedule-doctor">
                                            <div class="doctors_schedule-info">
                                                <img src="assets/img/users/user-37.jpg" alt="Doctor">
                                                <div>
                                                    <div class="name">Albert Etsen</div>
                                                    <div class="specialty">Cardiology</div>
                                                </div>
                                            </div>
                                            <span class="status available">Available</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Monthly Revenue Chart -->
                    <div class="col-md-6 mt-3">
                        <!-- Chart Card: Billing -->
                        <div class="card">
                            <div class="card-header cardflex_header">
                                <h5 class="card-title">Billing & Revenue</h5>

                                <div class="rightchartfilter StoreChartFilterdrop">
                                    <select class="select2 filter-select" data-chart="billingChart">
                                        <option value="week">This Week</option>
                                        <option value="month">This Month</option>
                                        <option value="year">This Year</option>
                                        <option value="custom">Custom Range</option>
                                    </select>
                                    <input type="text" class="custom-range" data-chart="billingChart"
                                        style="display:none;" />
                                </div>
                            </div>
                            <div id="billingChart"></div>
                        </div>
                    </div>


                </div>
            </div>



        </div>
    </div>

@endsection
@push('custom_scripts')
    <script>
        $(document).ready(function() {
            // Initialize Select2 and hide search bar
            $('.select2.filter-select').select2({
                placeholder: "Select Filter", // Optional: adds placeholder
                allowClear: false,
                minimumResultsForSearch: Infinity
            });
            // The rest of your chart logic...
            const charts = {};

            function generateData(count, max = 100) {
                return Array.from({
                    length: count
                }, () => Math.floor(Math.random() * max));
            }

            function updateLineChart(chartId, labels, data, color = '#3b82f6') {
                const options = {
                    chart: {
                        type: 'line',
                        height: 300,
                        toolbar: {
                            show: false
                        }
                    },
                    series: [{
                        name: "Admissions",
                        data
                    }],
                    xaxis: {
                        categories: labels
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    colors: [color],
                    dataLabels: {
                        enabled: false
                    }
                };
                if (charts[chartId]) {
                    charts[chartId].updateOptions({
                        xaxis: options.xaxis,
                        series: options.series
                    });
                } else {
                    charts[chartId] = new ApexCharts(document.querySelector(`#${chartId}`), options);
                    charts[chartId].render();
                }
            }

            function updateBarChart(chartId, labels, data, color = '#10b981') {
                const options = {
                    chart: {
                        type: 'bar',
                        height: 300,
                        toolbar: {
                            show: false
                        }
                    },
                    series: [{
                        name: 'Revenue',
                        data
                    }],
                    xaxis: {
                        categories: labels
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 6,
                            columnWidth: '45%'
                        }
                    },
                    colors: [color],
                    dataLabels: {
                        enabled: false
                    }
                };
                if (charts[chartId]) {
                    charts[chartId].updateOptions({
                        xaxis: options.xaxis,
                        series: options.series
                    });
                } else {
                    charts[chartId] = new ApexCharts(document.querySelector(`#${chartId}`), options);
                    charts[chartId].render();
                }
            }

            function initHospitalCharts() {
                // Admissions chart
                updateLineChart('admissionsChart', ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'], generateData(
                    7));
                // Billing chart
                updateBarChart('billingChart', ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'], generateData(7,
                    50000));
                // Doctor Availability - Horizontal Bars
                charts['doctorChart'] = new ApexCharts(document.querySelector("#doctorChart"), {
                    chart: {
                        type: 'bar',
                        height: 300
                    },
                    series: [{
                        data: generateData(5)
                    }],
                    xaxis: {
                        categories: ['Dr. Singh', 'Dr. Patel', 'Dr. Khan', 'Dr. Mehta', 'Dr. Roy']
                    },
                    plotOptions: {
                        bar: {
                            horizontal: true,
                            barHeight: '50%',
                            borderRadius: 6
                        }
                    },
                    colors: ['#f97316'],
                    dataLabels: {
                        enabled: true
                    }
                });
                charts['doctorChart'].render();
                // Department Donut Chart
                charts['departmentChart'] = new ApexCharts(document.querySelector("#departmentChart"), {
                    chart: {
                        type: 'donut',
                        height: 300
                    },
                    series: [40, 30, 15, 15],
                    labels: ['Cardiology', 'Neurology', 'Pediatrics', 'Oncology'],
                    colors: ['#6366f1', '#0ea5e9', '#14b8a6', '#f43f5e'],
                    legend: {
                        position: 'bottom'
                    }
                });
                charts['departmentChart'].render();
                // Bed Occupancy - Radial Bar
                charts['bedChart'] = new ApexCharts(document.querySelector("#bedChart"), {
                    chart: {
                        type: 'radialBar',
                        height: 300
                    },
                    series: [75],
                    labels: ['Occupied Beds'],
                    plotOptions: {
                        radialBar: {
                            hollow: {
                                size: '60%'
                            },
                            dataLabels: {
                                name: {
                                    fontSize: '16px'
                                },
                                value: {
                                    fontSize: '24px'
                                }
                            }
                        }
                    },
                    colors: ['#22c55e']
                });
                charts['bedChart'].render();
            }
            // Date range + select2 filter
            $('.select2.filter-select').each(function() {
                const $select = $(this);
                const chartId = $select.data('chart');
                const $rangeInput = $(`.custom-range[data-chart="${chartId}"]`);
                // Default weekly data
                const weeklyLabels = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                $select.on('change', function() {
                    const type = $(this).val();
                    if (type === 'custom') {
                        $rangeInput.show();
                    } else {
                        $rangeInput.hide();
                        const count = type === 'month' ? 30 : type === 'year' ? 12 : 7;
                        const labels = Array.from({
                            length: count
                        }, (_, i) => `Day ${i + 1}`);
                        const data = generateData(count);
                        if (chartId === 'admissionsChart') updateLineChart(chartId, labels, data);
                        if (chartId === 'billingChart') updateBarChart(chartId, labels, data);
                    }
                });
                if (typeof $.fn.daterangepicker !== 'undefined') {
                    $rangeInput.daterangepicker({
                        locale: {
                            format: 'YYYY-MM-DD'
                        },
                        opens: 'left'
                    }, function(start, end) {
                        const days = [];
                        const date = start.clone();
                        while (date.isSameOrBefore(end)) {
                            days.push(date.format('MM-DD'));
                            date.add(1, 'day');
                        }
                        const data = generateData(days.length);
                        if (chartId === 'admissionsChart') updateLineChart(chartId, days, data);
                        if (chartId === 'billingChart') updateBarChart(chartId, days, data);
                    });
                }
            });
            initHospitalCharts();
        });
    </script>


    <!-- doctors dashboard list filter functionality start -->
    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('#doctorStatusFilter').select2({
                placeholder: "Filter by Status",
                minimumResultsForSearch: Infinity
            });

            // Filter logic
            $('#doctorStatusFilter').on('change', function() {
                const selected = $(this).val();

                $('.doctors_schedule-doctor').each(function() {
                    const statusText = $(this).find('.status').text().toLowerCase();
                    if (selected === 'all' || statusText === selected) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
    <!-- end -->
@endpush
