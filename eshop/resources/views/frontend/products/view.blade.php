@extends('layouts.front')

@section('title',$products->name)



@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collections / {{ $products->category->name }} / {{ $products->name }}</h6>
    </div>
</div>
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/product/'.$products->image) }}" class="w-100" alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $products->name }}
                            @if ($products->trending == '1')
                            <label style="font-size:16px" class="badge float-end bg-danger trending-tag">Trending</label>
                            @endif
                        </h2>
                        <hr>
                        <label for="" class="me-3">Original Price: <s>TK{{ $products->original_price }}</s></label>
                        <label for="" class="fw-bold">Selling Price: Tk{{ $products->selling_price }}</label>
                        <p class="mt-3">
                            {{ $products->small_description }}
                        </p>
                        <hr>
                        @if ($products->qty > 0)
                          <label class="badge bg-success">In Stock</label>
                          @else
                          <label class="badge bg-danger">out of stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-3 mt-2">
                                <label for="quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <span class="input-group-text">-</span>
                                    <input type="text" name="quantity" value="1" class="form-control">
                                    <span class="input-group-text">+</span>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <br>
                                <button type="button" class="btn btn-success me-3 float-start">Add to Wishlist
                                    <i class="fa fa-heart"></i>
                                </button>
                                <button type="button" class="btn btn-primary me-3 float-start">Add to Cart<i class="fa fa-shopping-cart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h2>Description</h2>
                    <p>{{ $products->description }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
