@extends('layouts.website_main')
@section('main_section')
  <!-- Header Start -->
  <div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Contact Us</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Contact</li>
        </ol>
    </div>
</div>
<!-- Header End -->
        <!-- Contact Start -->
        <div class="container-fluid contact bg-light py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Contact Us</h5>
                    <h1 class="mb-0">Contact For Any Query</h1>
                </div>

                <div class="row g-5 align-items-center">
                    <div class="col-lg-4">
                        <div class="bg-white rounded p-4">
                            <div class="text-center mb-4">
                                <i class="fa fa-map-marker-alt fa-3x text-info"></i>
                                <h4 class="text-info"><Address></Address></h4>
                                <p class="mb-0">123 ranking Street, <br> New York, USA</p>
                            </div>
                            <div class="text-center mb-4">
                                <i class="fa fa-phone-alt fa-3x text-info mb-3"></i>
                                <h4 class="text-info">Mobile</h4>
                                <p class="mb-0">+012 345 67890</p>
                                <p class="mb-0">+012 345 67890</p>
                            </div>

                            <div class="text-center">
                                <i class="fa fa-envelope-open fa-3x text-info mb-3"></i>
                                <h4 class="text-info">Email</h4>
                                <p class="mb-0">info@example.com</p>
                                <p class="mb-0">info@example.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h3 class="mb-2">Send us a message</h3>
                        <p class="mb-4">Are you ready to transform the way you manage travel expenses? Sign up today and experience the freedom of hassle-free budgeting. Let’s make every journey a smooth one together! <a href="https://htmlcodex.com/contact-form">Download Now</a>
                            .</p>

                            <form method="POST" action="{{ route('contact.store') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="name" name="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0" name="email" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" name="subject" id="subject" placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" name="message" placeholder="Leave a message here" id="message" style="height: 160px;"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-info w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12">
                        <div class="rounded">
                            <iframe class="rounded w-100" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14479.610514492117!2d67.024241!3d24.867175!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e6b1566c46f%3A0x65318f4eb62c7aa8!2sAptech%20Computer%20Education%20Garden%20Center!5e0!3m2!1sen!2s!4v1726736713427!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


@endsection
