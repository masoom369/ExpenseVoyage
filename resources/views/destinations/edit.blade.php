@extends('layouts.user_dashboard')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="card-title">Edit Destination</div>
            <hr>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $destination->name }}" placeholder="Enter Destination Name" required>
                </div>

                <div class="form-group mb-3">
                    <label for="currency">Currency</label>
                    <select name="currency" id="currency" class="form-select" required>
                        <option value="" disabled>Select Currency…</option>
                        @foreach (['USD' => 'United States Dollar', 'AED' => 'UA Emirates Dirham', 'ARS' => 'Argentine Peso', 'AUD' => 'Australian Dollar', 'BGN' => 'Bulgarian Lev', 'BRL' => 'Brazilian Real', 'BSD' => 'Bahamian Dollar', 'CAD' => 'Canadian Dollar', 'CHF' => 'Swiss Franc', 'CNY' => 'Chinese Yuan', 'EUR' => 'Euro', 'GBP' => 'British Pound', 'INR' => 'Indian Rupee', 'JPY' => 'Japanese Yen', 'PKR' => 'Pakistani Rupee', 'ZAR' => 'South African Rand'] as $code => $name)
                            <option value="{{ $code }}" {{ $destination->currency == $code ? 'selected' : '' }}>{{ $name }} ({{ $code }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>Current Image</label>
                    @if ($destination->d_image_path)
                        <img src="{{ asset($destination->d_image_path) }}" alt="Image" width="100">
                    @else
                        No Image
                    @endif
                    <br>
                    <label for="d_image_path">New Image (optional)</label>
                    <input type="file" name="d_image_path" class="form-control-file" id="d_image_path">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
