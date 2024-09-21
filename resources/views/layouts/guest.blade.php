<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('dashboard-template/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('dashboard-template/assets/js/pace.min.js') }}"></script>
    <link rel="icon" href="{{ asset('dashboard-template/assets/images/favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('dashboard-template/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-template/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-template/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-template/assets/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-template/assets/css/icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-template/assets/css/sidebar-menu.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-template/assets/css/app-style.css') }}" rel="stylesheet" />
</head>

<body class="bg-theme bg-theme1">
    <div id="wrapper">
        <div class="clearfix"></div>
            <div class="container">
                @yield('content')
                <div class="overlay toggle-menu"></div>
            </div>

        <a href="javascript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        <footer class="footer position-fixed bottom-0 end-0">
            <div class="container">
                <div class="text-center">
                    Copyright © 2024 ExpenseVoyage All rights reserved.
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('dashboard-template/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard-template/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard-template/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard-template/assets/plugins/simplebar/js/simplebar.js') }}"></script>
    <script src="{{ asset('dashboard-template/assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('dashboard-template/assets/js/jquery.loading-indicator.js') }}"></script>
    <script src="{{ asset('dashboard-template/assets/js/app-script.js') }}"></script>
    <script src="{{ asset('dashboard-template/assets/plugins/Chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('dashboard-template/assets/js/index.js') }}"></script>
</body>

</html>
