@extends('frontend.master');

@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Checkout<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <div class="checkout-discount">
                    <form action="#">
                        <input type="text" class="form-control" required id="checkout-discount-input">
                        <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
                    </form>
                </div><!-- End .checkout-discount -->
                @php
                    $sum = 0;
                    $qty = 0;
                @endphp
                <form action="{{url('/customer/confirmed/order')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-5 d-block">
                            <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                                @foreach ($cartProduct as $product)
                                <input type="hidden" name="product_id[]" value="{{$product->product_id}}">
                                <input type="hidden" name="qty[]" value="{{$q = $product->qty}}">
                                <input type="hidden" name="price[]" value="{{$p = $product->price}}">

                                @php
                                    $sum += $p;
                                    $qty += $q;
                                @endphp
                                @endforeach

                                <label>Phone</label>
                                <input type="tel" name="phone" class="form-control">
                                <input type="hidden" name="total_qty" value="{{$qty}}" class="form-control">
                                <input type="hidden" name="total_price" value="{{$sum}}" class="form-control">

                                <label>Email</label>
                                <input type="email" name="email" class="form-control">

                                <label>Address *</label>
                                <input type="text" name="address" class="form-control" placeholder="House number and Street name">


                            </div><!-- End .col-lg-9 -->
                            <button type="submit" class="btn btn-block btn-primary">confirm order</button>
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection
