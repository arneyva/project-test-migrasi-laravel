<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Default Title')</title>

    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('template/main/css/vendors_css.css') }}">
    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('template/main/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/main/css/skin_color.css') }}">
</head>

<body class="hold-transition theme-primary fixed bg-img">
    <main>
        @yield('content')
    </main>
    <!-- Vendor JS -->
    <script src="{{ asset('template/main/js/vendors.min.js') }}"></script>
    <script src="{{ asset('template/main/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('template/main/icons/feather-icons/feather.min.js') }}"></script>
</body>
</html>
