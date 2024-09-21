@extends('layouts.user_dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">Edit Category</div>
            <hr>
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}"
                        placeholder="Enter Category Name">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-light px-5"><i class="icon-edit"></i> Update Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection
