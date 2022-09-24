@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/Update Products</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select">
                            <option value="">{{ $product->category->name }}</option>
                          </select>
                    </div>
                    <div class="col-md-6  ">
                        <label for="">Name</label>
                        <input type="text" value="{{ $product->name }}" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $product->slug }}" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for=""> Small Description</label>
                        <textarea name="small_description" rows="3" class="form-control">{{ $product->small_description}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{ $product->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" name="original_price" value="{{ $product->original_price}}"  class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" value="{{ $product->selling_price}}" name="selling_price" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" value="{{ $product->qty }}" name="qty" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Tax</label>
                        <input type="number" name="tax" value="{{ $product->tax }}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{ $product->status == "1" ? 'checked':''}} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" {{ $product->trending == "1" ? 'checked':''}} name="trending">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" value="{{ $product->meta_title }}" name="meta_title" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control">{{ $product->meta_keywords }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{{ $product->meta_description }}</textarea>
                    </div>

                    @if ('$product->image')
                        <img src="{{ asset('assets/uploads/product/'.$product->image) }}" alt="Image here">
                    @endif
                    <div class="col-md-12 mb-3">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
