@extends('layouts.user_dashboard')

@section('content')
    <div class="container mt-3">
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3 ">Add New Category</a>
        <input type="text" id="search" placeholder="Search Categories" class="form-control mb-3">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Categories</h5>
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Category name</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody id="categoryTable">
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td><a href="{{ route('categories.edit', $category->id) }}"
                                            class="btn btn-success">Edit</a></td>
                                    <td>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#categoryTable tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
@endsection
