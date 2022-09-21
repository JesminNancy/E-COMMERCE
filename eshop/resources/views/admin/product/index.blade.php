@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Products</h4>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Selling Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $item)
                    <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->selling_price }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/product/'.$item->image) }}"  class="category-image" alt="Image Here">
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ url('edit-product/'.$item->id)}}">Edit</a>
                                <a href="{{ url('delete-product/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
