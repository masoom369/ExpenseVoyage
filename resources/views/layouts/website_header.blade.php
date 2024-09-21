<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('template/logo1.png') }}" type="image/x-icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Topbar End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="{{ url('') }}" class="navbar-brand p-0">
                {{-- <h1 class="m-0"><i class="fa fa-map-marker-alt me-3"></i>Travela</h1> --}}
                <img src="{{ asset('template/logo1.png') }}" alt="Logo" style="height: 200px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ url('') }}" class="nav-item nav-link ">Home</a>
                    <a href="{{ url('about') }}" class="nav-item nav-link">About</a>
                    <a href="{{ url('contact') }}" class="nav-item nav-link">Contact</a>
                    @if (Route::has('login'))
                        @auth
                            <div class="nav-item dropdown">
                                <a href="{{ __('Manage Account') }}" class="nav-link dropdown-toggle "
                                    data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                                <div class="dropdown-menu m-0">
                                    <a href="{{ route('profile.show') }}" class="dropdown-item">{{ __('Profile') }}</a>
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf
                                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();"
                                            class="dropdown-item">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </div>
                            </div>
                            <li class="nav-item">
                                <a href="{{ url('home') }}" class="nav-link">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Log in</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
    </div>
    </nav>
