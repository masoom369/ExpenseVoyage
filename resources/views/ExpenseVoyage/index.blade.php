@extends('layouts.website_main')
@section('main_section')
    <!-- Carousel Start -->
    <div class="carousel-header">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{ asset('template/img/carousel-2.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">
                                Reduce Complexity in Monitoring Travel Expenses</h4>
                            <p class="mb-5 fs-5"> Expense tracking tools that are used today do not allow for reciept loss
                                or dependancy on mess spreadsheets. While on trips with ExpenseVoyage, you will be able to
                                capture and tag travel costs while on the move to give you a good picture of how much you
                                are spending.
                            </p>
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-info rounded-pill text-white py-3 px-5"
                                    href="#">Discover Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('template/img/carousel-1.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">
                                Efficient Working in Team during Group Travels</h4>

                            <p class="mb-5 fs-5">Spending time with friends or business partners? Allocate shared expenses,
                                manage everyone’s participation and divide amounts judiciously using ExpenseVoyage
                                cooperation features.
                            </p>
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-info rounded-pill text-white py-3 px-5"
                                    href="#">Discover Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('template/img/carousel-3.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">
                                Seamless Currency Conversion on the Go</h4>
                            <p class="mb-5 fs-5">No more manual calculations or currency confusion. ExpenseVoyage
                                automatically converts expenses to your home currency, ensuring you have a clear
                                understanding of what you're spending abroad.</p>
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-info rounded-pill text-white py-3 px-5"
                                    href="#">Discover Now</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon btn bg-info" aria-hidden="false"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon btn bg-info" aria-hidden="false"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->
    </div>
    <div class="container-fluid search-bar position-relative" style="top: -50%; transform: translateY(-50%);">
        <div class="container">
            <div class="position-relative rounded-pill w-100 mx-auto p-1" style="background: rgba(25, 195, 217, 0.8);">
                <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text"
                    placeholder="Eg: Thailand">
                <button type="button" class="btn btn-info rounded-pill py-2 px-4 position-absolute me-2"
                    style="top: 50%; right: 46px; transform: translateY(-50%);">Search</button>
            </div>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-fluid about ">
        <div class="container mb-3">
            <div class="row g-5 align-items-center">

                <div class="col-lg-12"
                    style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);">
                    <center>
                        <h1 class="mb-4">Welcome to <span class="text-info">ExpenseVoyage</span></h1>
                    </center>
                    <p class="mb-4">Our new and simple travel expense platform. Tracking your money when on an adventure,
                        either solo or with a group can be daunting. Between collecting receipts, tracking where your money
                        went, and what you spend for travel often turns controlling the purse strings into a bit of a
                        nightmare. We at ExpenseVoyage provide a solution to track your travel expenses to keep you
                        organized and within the limit.</p>
                    <a href="{{ url('about') }}" class="btn bg-info text-light"> Read More . . .</a>

                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Services Start -->
        <div class="container-fluid bg-light service py-3">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Searvices</h5>
                </div>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-12">
                                <div
                                    class="service-content-inner d-flex align-items-center bg-white border border-info rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">Per Day Tracking</h5>
                                        <p class="mb-0"> Log daily expenses easily to monitor your spending habits and
                                            stay on top of your budget.
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-globe fa-4x text-info"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div
                                    class="service-content-inner d-flex align-items-center  bg-white border border-info rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">Open to Multiple Currencies</h5>
                                        <p class="mb-">Inflight? ExpenseVoyage coins support different currencies, thus
                                            it will be easy to track expenditure in different currencies and exchange rates
                                            automatically.
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-hotel fa-4x text-info"></i>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-12">
                                <div
                                    class="service-content-inner d-flex align-items-center bg-white border border-info rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-hotel fa-4x text-info"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-3">Per Trip Overview</h5>
                                        <p class="mb-0">Access a comprehensive summary of all expenses for each trip,
                                            allowing you to analyze your total spending and make adjustments for future
                                            travels.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div
                                    class="service-content-inner d-flex align-items-center bg-white border border-info rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-globe fa-4x text-info"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-3">Tailor made solutions for budgets
                                        </h5>
                                        <p class="mb-0">Make easy plans and keep tabs on your travel cost. With the
                                            budgeting options we offer, you are able to impose spend limits and achieve your
                                            financial objectives helping you along your way..
                                        </p>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Services End -->

        <!-- Destination Start -->
        <div class="container-fluid destination py-3">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Destination</h5>
                </div>
                <div class="tab-class text-center">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                @forelse ($destinations as $destination)
                                
                                <div class="col-lg-4">
                                    <a href="{{ url('trips/create') }}">
                                    <div class="destination-img">
                                        <img class="img-fluid rounded w-100"
                                            src="{{ asset($destination->d_image_path) }}" alt="{{ $destination->name }}">
                                        <div class="destination-overlay p-4">
                                            <h4 class="text-white mb-2 mt-3">{{ $destination->name }}</h4>
                                        </div>
                                        
                                    </div></a>
                                </div>
                            
                                @empty
                                <p>no destinations found</p>
                            @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Destination End -->
        <!-- Testimonial Start -->
        <div class="container-fluid testimonial py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Testimonial</h5>
                    <h1 class="mb-0">Our Clients Say!!!</h1>
                </div>
                <div class="testimonial-carousel owl-carousel">
                    <div class="testimonial-item text-center rounded pb-4">
                        <div class="testimonial-comment bg-light rounded p-4">
                            <p class="text-center mb-5">The budgeting tools are fantastic! Setting daily and trip budgets
                                helps me stay financially disciplined while enjoying my travels
                            </p>
                        </div>
                        <div class="testimonial-img p-1">
                            <img src="{{ asset('template/img/testimonial-1.jpg') }}" class="img-fluid rounded-circle"
                                alt="Image">
                        </div>
                        <div style="margin-top: -35px;">
                            <h5 class="mb-0">— David K</h5>
                            <p class="mb-0">Australia</p>
                            <div class="d-flex justify-content-center">
                                <i class="fas fa-star text-info"></i>
                                <i class="fas fa-star text-info"></i>
                                <i class="fas fa-star text-info"></i>
                                <i class="fas fa-star text-info"></i>
                                <i class="fas fa-star text-info"></i>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item text-center rounded pb-4">
                        <div class="testimonial-comment bg-light rounded p-4">
                            <p class="text-center mb-5">“I appreciate the multi-currency support. It makes managing
                                expenses abroad so much simpler, and I no longer worry about losing receipts.”
                            </p>
                        </div>
                        <div class="testimonial-img p-1">
                            <img src="{{ asset('template/img/testimonial-2.jpg') }}" class="img-fluid rounded-circle"
                                alt="Image">
                        </div>
                        <div style="margin-top: -35px;">
                            <h5 class="mb-0">John Abraham</h5>
                            <p class="mb-0">New York, USA</p>
                            <div class="d-flex justify-content-center">
                                <i class="fas fa-star text-info"></i>
                                <i class="fas fa-star text-info"></i>
                                <i class="fas fa-star text-info"></i>
                                <i class="fas fa-star text-info"></i>
                                <i class="fas fa-star text-info"></i>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item text-center rounded pb-4">
                        <div class="testimonial-comment bg-light rounded p-4">
                            <p class="text-center mb-5">The collaborative features are the best thing that we have as a
                                group of travelers. We are now able to split the costs and solve them quickly and easily
                                without any tiresome procedures!
                            </p>
                        </div>
                        <div class="testimonial-img p-1">
                            <img src="{{ asset('template/img/testimonial-3.jpg') }}" class="img-fluid rounded-circle"
                                alt="Image">
                        </div>
                        <div style="margin-top: -35px;">
                            <h5 class="mb-0">— Michael R</h5>
                            <p class="mb-0">Paris</p>
                            <div class="d-flex justify-content-center">
                                <i class="fas fa-star text-info"></i>
                                <i class="fas fa-star text-info"></i>
                                <i class="fas fa-star text-info"></i>
                                <i class="fas fa-star text-info"></i>
                                <i class="fas fa-star text-info"></i>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item text-center rounded pb-4">
                        <div class="testimonial-comment bg-light rounded p-4">
                            <p class="text-center mb-5">ExpenseVoyage is not only easy to handle, but effective. I can
                                easily head each day in terms of costs incurred and have all the summaries of my trip
                                appropriately done
                            </p>
                        </div>
                        <div class="testimonial-img p-1">
                            <img src="{{ asset('template/img/testimonial-4.jpg') }}" class="img-fluid rounded-circle"
                                alt="Image">
                        </div>
                        <div style="margin-top: -35px;">
                            <h5 class="mb-0">— Jessica M</h5>
                            <p class="mb-0"> USA</p>
                            <div class="d-flex justify-content-center">
                                <i class="fas fa-star text-info"></i>
                                <i class="fas fa-star text-info"></i>
                                <i class="fas fa-star text-info"></i>
                                <i class="fas fa-star text-info"></i>
                                <i class="fas fa-star text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

        <!-- Subscribe Start -->

    </div>
    <!-- Subscribe End -->
@endsection
