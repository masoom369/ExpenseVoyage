@extends('layouts.user_dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">Add Category</div>
            <hr>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-light px-5"><i class="icon-plus"></i> Add Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection
