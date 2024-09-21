@extends('layouts.user_dashboard')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-title">Add New Expense</div>
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
        <form action="{{ route('expenses.store') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <div class="form-group">
                <label for="trip_id">Trip:</label>
                <select name="trip_id" id="trip_id" class="form-control" required>
                    <option value="">Select Trip</option>
                    @foreach($trips as $trip)
                        <option value="{{ $trip->id }}">{{ $trip->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="note">Note:</label>
                <textarea name="note" id="note" class="form-control" required>{{ old('note') }}</textarea>
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" name="amount" id="amount" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-light px-5"><i class="icon-plus"></i> Save Expense</button>
            </div>
        </form>
    </div>
</div>
@endsection
