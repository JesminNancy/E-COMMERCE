@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Category</h4>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                    <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/category/'.$item->image) }}"  class="category-image" alt="Image Here">
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ 'edit-categories/'.$item->id}}">Edit</a>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
