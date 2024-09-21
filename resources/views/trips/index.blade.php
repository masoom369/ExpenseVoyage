@extends('layouts.user_dashboard')

@section('content')

<div class="container mt-3">

    {{-- Trips Section --}}
    <a href="{{ route('trips.create') }}" class="btn btn-primary mb-3">Add New Trip</a>

    {{-- Search bar --}}
    <input type="text" id="tripSearch" placeholder="Search Trips" class="form-control mb-3">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Trips</h5>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Budget</th>
                            <th>Start Date</th>  
                            <th>End Date</th>                          
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="tripTable">
                        @foreach ($trips as $trip)
                            <tr>
                                <td>{{ $trip->name }}</td>
                                <td>{{ $trip->budget }}</td>
                                <td>{{ $trip->start_date }}</td>
                                <td>{{ $trip->end_date }}</td>
                                <td>
                                    <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-success btn-sm">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this trip?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- jQuery Script for Search Functionality --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Search functionality for trips
        $('#tripSearch').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#tripTable tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>

@endsection
