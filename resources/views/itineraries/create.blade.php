@extends('layouts.user_dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">Add Itinerary</div>
            <hr>
            <form action="{{ route('itineraries.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="trip_date">Trip Date</label>
                    <input type="date" class="form-control" id="trip_date" name="trip_date" required>
                </div>

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" required>
                </div>

                <div class="form-group">
                    <label for="trip_id">Trip</label>
                    <select class="form-control" name="trip_id" id="trip_id" required>
                        <option value="">Select Trip</option>
                        @foreach ($trips as $trip)
                            <option value="{{ $trip->id }}">{{ $trip->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-light px-5"><i class="icon-plus"></i> Add Itinerary</button>
                </div>
            </form>
        </div>
    </div>
@endsection
