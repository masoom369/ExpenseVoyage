@extends('layouts.admin_dashboard')

@section('content')
    <div class="container mt-3">
        <a href="{{ route('destinations.create') }}" class="btn btn-primary mb-3">Add New Destination</a>

        <div class="card">
            <div class="card-body">
                <h4>Destinations</h4>
                <div class="table-responsive">
                    <table class="table table-sm align-items-center">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Currency</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($destinations as $destination)
                                <tr>
                                    <td>{{ $destination->name }}</td>
                                    <td>{{ $destination->currency }}</td>
                                    <td>
                                        @if ($destination->d_image_path)
                                            <img src="{{ asset($destination->d_image_path) }}" alt="Image"
                                                width="100">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td> <a href="{{ route('destinations.edit', $destination->id) }}"
                                            class="btn btn-success mr-2">Edit</a>
                                        <form action="{{ route('destinations.destroy', $destination->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this destination?');">
                                                Delete
                                            </button>
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
@endsection
