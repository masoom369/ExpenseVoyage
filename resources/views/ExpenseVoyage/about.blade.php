@extends('layouts.website_main')
@section('main_section')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">About Us</h1>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-white">About</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->
    <!-- About Start -->
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <div class="h-100"
                        style="border: 50px solid; border-color: transparent #0dcaf0  transparent #0dcaf0 ;">
                        <img src="{{ asset('template/images/full-shot-adventurous-couple-bivouacking.jpg') }}"
                            class="img-fluid w-100 h-100" alt="">
                    </div>
                </div>
                <div class="col-lg-7"
                    style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);">
                    <h5 class="section-about-title pe-3">About Us</h5>
                    {{-- <h1 class="mb-4">Welcome to <span class="text-info">Travela</span></h1> --}}
                    <h1 class="mb-4">Welcome to <span class="text-info">ExpenseVoyage</span></h1>
                    <p class="mb-4">Our new and simple travel expense platform. Tracking your money when on an adventure,
                        either solo or with a group can be daunting. Between collecting receipts, tracking where your money
                        went, and what you spend for travel often turns controlling the purse strings into a bit of a
                        nightmare. We at ExpenseVoyage provide a solution to track your travel expenses to keep you
                        organized and within the limit.</p>
                    <h3>Why ExpenseVoyage?
                    </h3>
                    <p class="mb-4"> Conventional ways to manage expenses like shuffling through receipts and going back
                        for a spreadsheet all are prone to mistakes and can be annoying. Digital transformation is
                        everywhere, so we had to figure there was a better way… So out of this need ExpenseVoyage was born—a
                        smart, easy-to-use web application created to manage your travel expenses. Track and manage your
                        expenses on the go, with instant real-time update in any device you prefer.</p>




                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection
