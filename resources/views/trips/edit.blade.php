@extends('layouts.user_dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Edit Trip</div>
                <hr>

                <form action="{{ route('trips.update', $trip->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="name">Trip Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $trip->name }}"
                            required placeholder="Enter Trip Name">
                    </div>

                    <div class="form-group mb-3">
                        <label for="budget">Budget:</label>
                        <input type="number" name="budget" id="budget" class="form-control" value="{{ $trip->budget }}"
                            required placeholder="Enter Budget">
                    </div>

                    <div class="form-group mb-3">
                        <label for="start_date">Start Date:</label>
                        <input type="date" name="start_date" id="start_date" class="form-control"
                            value="{{ $trip->start_date }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="end_date">End Date:</label>
                        <input type="date" name="end_date" id="end_date" class="form-control"
                            value="{{ $trip->end_date }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="destination_id">Destination:</label>
                        <select name="destination_id" id="destination_id" class="form-select" required>
                            <option value="">Select Destination</option>
                            @forelse ($destinations as $destination)
                                <option value="{{ $destination->id }}"
                                    {{ $trip->destination_id == $destination->id ? 'selected' : '' }}>
                                    {{ $destination->name }}
                                </option>
                            @empty
                                <option value="" disabled>No destinations found</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Update Trip</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
