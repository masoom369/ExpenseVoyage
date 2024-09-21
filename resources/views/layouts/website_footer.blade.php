        <!-- Footer Start -->
       <div class="container-fluid footer py-4">
    <div class="container py-4">
        <div class="row g-5">
            <div class="col-md-6 col-lg-6 col-xl-4 text-center">
                <a href="{{ url('') }}" class="navbar-brand p-0">
                    <img src="{{ asset('template/logo.png') }}" alt="Logo" style="height: 200px;">
                </a>
            </div>



            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="footer-item d-flex flex-column ">
                    <center><h4 class="mb-4 text-white">Links</h4></center>
                    <a href="{{ url('') }}"><i class="fas fa-angle-right me-2"></i>Home</a>
                    <a href="{{ url('about') }}"><i class="fas fa-angle-right me-2"></i>About</a>
                    <a href="{{ url('contact') }}"><i class="fas fa-angle-right me-2"></i>Contact</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('home') }}"><i class="fas fa-angle-right me-2"></i>Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-gray">
                                    <i class="fas fa-angle-right me-2"></i>{{ __('Log Out') }}
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}"><i class="fas fa-angle-right me-2"></i>Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"><i class="fas fa-angle-right me-2"></i>Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-4">
                <h4 class="mb-4 text-white text-center">About Us</h4>
                <p class="text-center">ExpenseVoyage: Simplifying Travel Expense Management for Everyone. Join us on your next journey and keep your finances in check!</p>
            </div>
        </div>
    </div>
</div>

        <!-- Footer End -->
        <!-- Copyright Start -->
        <div class="container-fluid copyright text-body py-4">
            <div class="container align-items-center">
                <div class="col-md-6 text-center text-md-end mb-md-0 ">
                    <i class="fas fa-copyright me-2"></i><a class="text-white text-center " href="#">© 2024
                        ExpenseVoyage</a>, All right reserved.
                </div>
            </div>
        </div>
        <!-- Copyright End -->
        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i
                class="fa fa-arrow-up"></i></a>
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('template/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('template/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('template/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('template/lib/lightbox/js/lightbox.min.js') }}"></script>
        <!-- Template Javascript -->
        <script src="{{ asset('template/js/main.js') }}"></script>
        </body>

        </html>
