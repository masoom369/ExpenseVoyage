<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('dashboard-template/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('dashboard-template/assets/js/pace.min.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('template/logo1.png') }}" type="image/x-icon">
    <link href="{{ asset('dashboard-template/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('dashboard-template/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-template/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-template/assets/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-template/assets/css/icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-template/assets/css/sidebar-menu.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-template/assets/css/app-style.css') }}" rel="stylesheet" />
</head>

<body class="bg-theme bg-theme1">
    <div id="wrapper">
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="brand-logo mb-3 mt-1">
                <a href="{{ url('') }}">
                    <img src="{{ asset('template/logo.png') }}" class="logo-icon" style="height: 50px;width:70px;"
                        alt="logo icon">
                </a>
            </div>
            <ul class="sidebar-menu do-nicescrol">
                <li class="sidebar-header">
                    <a href="{{ url('/home') }}">
                        <h5>User Dashboard</h5>
                    </a>
                </li>
                <li class="sidebar-header">MAIN NAVIGATION</li>
                <li>
                    <a href="{{ url('/trips') }}">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Manage trips</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/categories') }}">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Manage Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/itineraries') }}">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Manage Itineraries</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/expenses') }}">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Manage Expenses</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/trips/create') }}">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Create Trips</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/categories/create') }}">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Create Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/itineraries/create') }}">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Create Itineraries</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/expenses/create') }}">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Create Expenses</span>
                    </a>
                </li>
            </ul>
        </div>

        <header class="topbar-nav">
            <nav class="navbar navbar-expand fixed-top">
                <ul class="navbar-nav mr-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link toggle-menu" href="javascript:void();">
                            <i class="icon-menu menu-icon"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center right-nav-link">
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown"
                            href="#">
                            <span class="user-profile"><img src="{{ Auth::user()->profile_photo_url }}"
                                    class="img-circle" alt="user avatar"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item user-details">
                                <a href="javaScript:void();">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="user-title">{{ Auth::user()->name }}</h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><a href="{{ route('profile.show') }}">Profile</a></li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">
                                <form method="POST" action="{{ url('logout') }}">
                                    @csrf
                                    <button type="submit">{{ __('Log Out') }}</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">
                @yield('content')
                <div class="overlay toggle-menu"></div>
            </div>
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
