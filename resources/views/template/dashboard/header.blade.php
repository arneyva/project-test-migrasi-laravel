<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('template/images/favicon.ico') }}">
    <title>@yield('title', 'Technical Test Pako Group')</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('template/main/css/vendors_css.css') }}">
    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('template/main/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/main/css/skin_color.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />

    <style>
        .select2-container--default .select2-selection--single {
            height: 38px;
            padding: 12px 12px;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            font-size: 1rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 24px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 100%;
            right: 10px;
        }
    </style>

    @stack('styles')
</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
<div class="wrapper">

    <div id="loader"></div>

    <!-- Header -->
    <header class="main-header">
        <div class="d-flex align-items-center logo-box justify-content-start">
             <a href="#" class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent" data-toggle="push-menu" role="button">
                    <span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
                </a>
            <a href="{{ url('/') }}" class="logo">
                <div class="logo-lg">
                    <span class="light-logo"><img src="{{ asset('template/images/logo-dark-text.png') }}" alt="logo"></span>
                    <span class="dark-logo"><img src="{{ asset('template/images/logo-light-text.png') }}" alt="logo"></span>
                </div>
            </a>
        </div>
         <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <div class="app-menu">
                </div>
                <div class="navbar-custom-menu r-side">
                    <ul class="nav navbar-nav">
                        <li class="btn-group nav-item d-lg-inline-flex d-none">
                            <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen" title="Full Screen">
                                <i class="icon-Expand-arrows"><span class="path1"></span><span class="path2"></span></i>
                            </a>
                        </li>
                        <!-- User Account-->
                        <li class="dropdown user user-menu">
                            <a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown" title="User">
                                <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                            </a>
                            <ul class="dropdown-menu animated flipInX">
                                <li class="user-body">
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ url('logout') }}"><i class="ti-lock text-muted me-2"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
    </header>
    <!-- Sidebar -->
    <aside class="main-sidebar">
        <section class="sidebar position-relative">
            <div class="multinav">
                <div class="multinav-scroll" style="height: 100%;">
                    <ul class="sidebar-menu" data-widget="tree">
                            <li class="header">Menu</li>
                            <li class="">
                                <a href="{{ route('transaksi.index') }}">
                                    <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Transaksi</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{ route('dashboard.index') }}">
                                    <i span class="icon-Layout-grid"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Barang</span>
                                    <span class="pull-right-container">
                                    </span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i span class="icon-Layout-grid"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Manajemen Akses</span>
                                    <span class="pull-right-container">
                                    </span>
                                </a>
                            </li>
                        </ul>
                </div>
            </div>
        </section>
    </aside>
            @yield('content')
    <!-- Footer -->
    <footer class="main-footer">
        <div class="pull-right d-none d-sm-inline-block">
            <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
                <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Purchase Now</a></li>
            </ul>
        </div>
        &copy; 2021 <a href="https://www.multipurposethemes.com/">Multipurpose Themes</a>. All Rights Reserved.
    </footer>

    <div class="control-sidebar-bg"></div>
</div>

<!-- Scripts -->
<script src="{{ asset('template/main/js/vendors.min.js') }}"></script>
<script src="{{ asset('template/main/js/pages/chat-popup.js') }}"></script>
<script src="{{ asset('template/assets/icons/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('template/assets/vendor_components/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('template/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
<script src="{{ asset('template/assets/vendor_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('template/assets/vendor_components/fullcalendar/fullcalendar.js') }}"></script>
<script src="{{ asset('template/assets/vendor_components/chart.js-master/Chart.min.js') }}"></script>
<script src="{{ asset('template/main/js/template.js') }}"></script>
<script src="{{ asset('template/main/js/pages/dashboard3.js') }}"></script>
<script src="{{ asset('template/main/js/pages/calendar.js') }}"></script>
<script src="{{ asset('template/main/js/pages/data-table.js') }}"></script>
<script src="{{ asset('template/main/js/pages/widget-charts2.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        confirmButtonText: 'OK',
        timer: 3000,
        showConfirmButton: true,
        timerProgressBar: true
    });
</script>
@endif

@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: '{{ session('error') }}',
        confirmButtonText: 'Coba Lagi',
        timer: 3000,
        showConfirmButton: true,
        timerProgressBar: true
    });
</script>
@endif

@stack('scripts')

</body>
</html>
