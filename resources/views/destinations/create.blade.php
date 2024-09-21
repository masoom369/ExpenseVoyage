@extends('layouts.admin_dashboard')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-title">Add New Destination</div>
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

        <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="name">Destination Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Destination Name" required>
            </div>

            <div class="form-group mb-3 ">
                <label for="currency">Currency</label>
                <select name="currency" id="currency" class="form-select" required>
                    <option value="" disabled selected>Select Currency…</option>
                    <option value="USD">United States Dollar (USD)</option>
                    <option value="AED">UA Emirates Dirham (AED)</option>
                    <option value="ARS">Argentine Peso (ARS)</option>
                    <option value="AUD">Australian Dollar (AUD)</option>
                    <option value="BGN">Bulgarian Lev (BGN)</option>
                    <option value="BRL">Brazilian Real (BRL)</option>
                    <option value="BSD">Bahamian Dollar (BSD)</option>
                    <option value="CAD">Canadian Dollar (CAD)</option>
                    <option value="CHF">Swiss Franc (CHF)</option>
                    <option value="CNY">Chinese Yuan (CNY)</option>
                    <option value="EUR">Euro (EUR)</option>
                    <option value="GBP">British Pound (GBP)</option>
                    <option value="INR">Indian Rupee (INR)</option>
                    <option value="JPY">Japanese Yen (JPY)</option>
                    <option value="PKR">Pakistani Rupee (PKR)</option>
                    <option value="ZAR">South African Rand (ZAR)</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="d_image_path">Upload Image</label>
                <input type="file" name="d_image_path" id="d_image_path" class="form-control" required>
            </div>

            <div class="form-group ">
                <button type="submit" class="btn btn-light mb-3 px-5"><i class="icon-save"></i> Save Destination</button>
                <a href="{{ route('destinations.index') }}" class="btn btn-secondary mb-3 px-5">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
