@extends('layouts.admin_dashboard')

@section('content')
    <div class="container">
        <div class="row" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
            <div class="col-md-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header text-white">
                        <h1 class="mb-0">Code of Conduct for Admins</h1>
                    </div>
                    <div class="card-body">
                        <p class="lead">As an administrator, you hold a vital role in maintaining the integrity and
                            functionality of our platform. Your responsibilities include:</p>

                        <h2 class="mt-4">Adding and Maintaining Destinations:</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Accurately add new destinations along with their respective
                                currencies and images.</li>
                            <li class="list-group-item">Regularly update existing listings to ensure all information is
                                current and accurate.</li>
                        </ul>

                        <h2 class="mt-4">Addressing User Concerns:</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Respond to inquiries submitted through the "Contact Us" form in a
                                timely and respectful manner.</li>
                            <li class="list-group-item">Maintain a professional tone in all email communications, ensuring
                                clarity and empathy in your responses.</li>
                        </ul>

                        <h2 class="mt-4">Upholding Quality Standards:</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Ensure all content related to destinations adheres to our quality
                                standards.</li>
                            <li class="list-group-item">Collaborate with the team to resolve any issues or discrepancies
                                promptly.</li>
                        </ul>

                        <h2 class="mt-4">Feedback and Improvement:</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Actively seek feedback from users and colleagues to improve services
                                and content.</li>
                            <li class="list-group-item">Stay informed about industry trends to enhance the user experience
                                continually.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
