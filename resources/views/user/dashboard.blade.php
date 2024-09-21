@extends('layouts.user_dashboard')
@section('content')
    <div class="container">
        <div class="row" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
            <div class="col-md-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header text-white">
                        <h1 class="mb-0">User Code of Conduct</h1>
                    </div>
                    <div class="card-body">
                        <p class="lead">Welcome to our platform! As a valued user, you can effectively manage and track
                            your spending during your trips. Here’s how to get started:</p>

                        <h2 class="mt-4">Select Your Destination:</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Choose your desired destination from our comprehensive list.</li>
                        </ul>

                        <h2 class="mt-4">Create Your Trip:</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Set your trip by specifying the start and end dates.</li>
                            <li class="list-group-item">Input your overall budget for the trip to help you stay on track.
                            </li>
                        </ul>

                        <h2 class="mt-4">Track Your Spending:</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Use the Itinerary feature to monitor daily spending, allowing you to
                                manage expenses day by day.</li>
                            <li class="list-group-item">Utilize the Expense tracker to categorize your spending (e.g., food,
                                transportation, activities) for better visibility and control.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
