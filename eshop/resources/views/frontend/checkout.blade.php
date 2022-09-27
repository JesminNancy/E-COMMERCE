@extends('layouts.front')

@section('title')
    Welcome to E-Shop
@endsection
@section('content')
    <div class="container mt-5">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Information</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="fname" placeholder="Enter Your Fristname" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->lname }}" name="lname" placeholder="Enter Your Lastname">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" value="{{ Auth::user()->email }}" name="email" placeholder="Enter Your Email">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Phone Number</label>
                                    <input type="text" class="form-control"  value="{{ Auth::user()->phone }}" name="phone" placeholder="Enter Your Number">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 1</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->address1 }}" name="address1" placeholder="Enter Your Address 1">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 2</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->address2 }}" name="address2" placeholder="Enter Your Address 2">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">city</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->city }}" name="city" placeholder="Enter Your City">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">State</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->state }}" name="state" placeholder="Enter Your State">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->country }}" name="country" placeholder="Enter Your Country">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Pin code</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Enter Your pincode">
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
                                                <td>{{ $item->products->selling_price }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <button type="submit" class="btn btn-primary display-block w-100">Place Order</button>
                            </div>
                        </div>
                    </div>
        </form>
    </div>
@endsection
