@extends('backend.master')

@section('content')

    <div class="container">
    <div class="col-md-12">
        @if (session()->has('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success</strong> {{session()->get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <a class="btn btn-danger mt-2" href="{{url('/categories/add')}}">Add Category</a>
        <table class="table table-bordered mt-2">
            <tr>
                <th class="bg-primary text-center">Sr</th>
                <th class="bg-success text-center">Name</th>
                <th class="bg-warning text-center">Image</th>
                <th class="bg-info text-center">Action</th>
            </tr>

            @foreach ($categories as $category)
            <tr>
                <td class="bg-primary text-center">{{ $loop->index+1 }}</td>
                <td class="bg-success text-center">{{$category->name}}</td>
                <td class="bg-warning text-center">
                    <img src="{{asset('image/'.$category->image)}}" height="50" width="50">
                </td>
                <td class="bg-info text-center">
                   <a class="btn btn-dark" href="{{url('/category/edit/'.$category->id)}}">Edit</a>
                   <a class="btn btn-danger" href="{{url('/category/delete/'.$category->id)}}">Delete</a>
                </td>
            </tr>
            @endforeach

            

        </table>
    </div>
</div>
    
@endsection