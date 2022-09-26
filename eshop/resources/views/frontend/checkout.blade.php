@extends('layouts.front')

@section('title')
    Welcome to E-Shop
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Information</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" placeholder="Enter Your Fristname">
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" placeholder="Enter Your Lastname">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="email" class="form-control" placeholder="Enter Your Email">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone Number</label>
                                <input type="email" class="form-control" placeholder="Enter Your Number">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 1</label>
                                <input type="text" class="form-control" placeholder="Enter Your Address 1">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 2</label>
                                <input type="text" class="form-control" placeholder="Enter Your Address 2">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">city</label>
                                <input type="email" class="form-control" placeholder="Enter Your City">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">State</label>
                                <input type="email" class="form-control" placeholder="Enter Your State">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Country</label>
                                <input type="email" class="form-control" placeholder="Enter Your Country">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Pincode</label>
                                <input type="email" class="form-control" placeholder="Enter Your pincode">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order Details</h6>
                            <hr>
                            <table class="table table-border table-striped">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Qty</td>
                                        <td>Price</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->product_qty }}</td>
                                            <td>{{ $item->selling_price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <button class="btn btn-primary float-end">Place Order</button>



                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
