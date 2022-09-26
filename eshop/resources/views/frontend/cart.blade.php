@extends('layouts.front')

@section('title')
    Welcome to E-Shop
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/') }}">Home</a> /
            <a href="{{ url('/cart') }}">Cart</a>
        </h6>
    </div>
</div>
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                @foreach ($cartItems as $items)
                <div class="row product_data">
                    <div class="col-md-2">
                        <img src="{{ asset('assets/uploads/product/'.$items->products->image) }}" height="70px" width="70px" alt="Image Here">
                    </div>
                    <div class="col-md-5">
                        <h6>{{ $items->products->name }}</h6>
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" class="prod_id" value="{{ $items->product_id }}">
                        <label for="quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width: 130px">
                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" name="quantity" value="{{ $items->product_qty }}" class="form-control qty-input ">
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
