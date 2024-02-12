@extends('backend.master');

@section('content')
<div class="container">
    <div class="col-md-12">
        @if (session()->has('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success</strong> {{session()->get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <h1 style="color:white; font-family: roboto">Order List's</h1>
        <table class="table table-bordered mt-2">
            <tr>
                <th class="bg-primary text-center">Sr</th>
                <th class="bg-success text-center">Product</th>
                <th class="bg-warning text-center">Customer</th>
                <th class="bg-info text-center">Action</th>
            </tr>

            @foreach ($orders as $order)
            <tr>
                <td class="bg-primary text-center">{{ $loop->index+1 }}</td>
                <td class="bg-success text-center">
                    <img src="{{ asset("image/".$order->product->image) }}"  height='50' width='50'>
                    {{$order->product->name}} <br>
                    {{$order->price}} <br>
                    {{$order->qty}}
                </td>
                <td class="bg-warning text-center">
                   <em>Name : </em> {{$order->name}} <br>
                   <em>phone : </em> {{$order->phone}} <br>
                   <em>Address : </em> {{$order->address}} <br>
                </td>
                <td class="bg-info text-center">
                   <a class="btn btn-dark" href="{{url('/order/edit/'.$category->id)}}">Edit</a>
                   <a class="btn btn-danger" href="{{url('/order/delete/'.$category->id)}}">Delete</a>
                </td>
            </tr>
            @endforeach



        </table>
    </div>
</div>
@endsection
