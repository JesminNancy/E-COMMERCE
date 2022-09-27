@extends('layouts.front')

@section('title')
    My Cart
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
            @php $total = 0; @endphp
                @foreach ($cartItems as $items)
                <div class="row product_data">
                    <div class="col-md-2">
                        <img src="{{ asset('assets/uploads/product/'.$items->products->image) }}" height="70px" width="70px" alt="Image Here">
                    </div>
                    <div class="col-md-3 my-auto">
                        <h6>{{ $items->products->name }}</h6>
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6>Tk.{{ $items->products->selling_price }}</h6>
                    </div>
                    <div class="col-md-3 my-auto">
                        <input type="hidden" class="prod_id" value="{{ $items->product_id }}">

                        @if($items->products->qty > $items->product_qty)
                            <label for="quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width: 130px">
                                <button class="input-group-text changeQuantity decrement-btn">-</button>
                                <input type="text" name="quantity" value="{{ $items->product_qty }}" class="form-control qty-input ">
                                <button class="input-group-text changeQuantity increment-btn">+</button>
                            </div>
                            @php $total += $items->products->selling_price * $items->product_qty; @endphp
                        @else
                            <h6>Out Of Stock</h6>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                    </div>
                </div>
                {{-- @php $total += $items->products->selling_price * $items->product_qty; @endphp --}}
                @endforeach
            </div>
            <div class="card-footer">
                <h6>Total Price:Tk.{{ $total }}
                <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end">Proceed to checkout</a>
                </h6>
            </div>
        </div>
    </div>
@endsection
