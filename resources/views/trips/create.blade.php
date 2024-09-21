@extends('layouts.user_dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Add Trip</div>
                <hr>

                <form action="{{ route('trips.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="name">Trip Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required
                            placeholder="Enter Trip Name">
                    </div>

                    <div class="form-group mb-3">
                        <label for="budget">Budget:</label>
                        <input type="number" name="budget" id="budget" class="form-control" required
                            placeholder="Enter Budget In Your Preferred Currency">
                    </div>

                    <div class="form-group mb-3">
                        <label for="start_date">Start Date:</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" min=""
                            required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="end_date">End Date:</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" min="" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="destination_id">Destination:</label>
                        <select name="destination_id" id="destination_id" class="form-select" required>
                            <option value="">Select Destination</option>
                            @forelse ($destinations as $destination)
                                <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                            @empty
                                <option value="" disabled>No destinations found</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Add Trip</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const today = new Date();
        const dd = String(today.getDate()).padStart(2, '0');
        const mm = String(today.getMonth() + 1).padStart(2, '0');
        const yyyy = today.getFullYear();
        const formattedDate = `${yyyy}-${mm}-${dd}`;
        document.getElementById('start_date').setAttribute('min', formattedDate);
        document.getElementById('end_date').setAttribute('min', formattedDate);
    </script>
@endsection
