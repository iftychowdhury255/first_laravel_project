@extends('backend.master')

@section('content')

    <div class="container">
        <div class="col-md-12">
            <a class="btn btn-danger mt-2" href="{{url('/categories/manage')}}">Back</a>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
            @if (session()->has('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Success</strong> {{session()->get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                   <div class="card mt-5">
                    <div class="card-header text-center ">Update Category</div>
                   </div>
                   <div class="card-body">
                    <form action="{{url('/category/update/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <label for="name" class="text-white mt-5">Name :-</label>
                        <input type="text" name="name" value="{{$category->name}}" class="form-control mt-2" placeholder="Enter Your Category name">
                        </div>

                        <div class="form-group">
                        <label for="name" class="text-white mt-2">Image :-</label>
                        <input type="file" name="image" class="form-control mt-2" accept="image/*" />
                        <img class="mt-2" src="{{ asset('/image/'.$category->image) }}" height="65" width="65" />
                        </div>

                        <button type="submit" class="btn btn-success mt-4">Update</button>
                    </form>
                   </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    
@endsection