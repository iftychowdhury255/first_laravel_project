@extends('backend.master')

@section('content')

    <div class="container">
        <div class="col-md-12">
            <a class="btn btn-danger mt-2" href="{{url('/product/manage')}}">Manage Product</a>
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
                <div class="col-md-1"></div>
                <div class="col-md-10">
                   <div class="card mt-5">
                    <div class="card-header text-center ">Add Product</div>
                </div>
                   <div class="card-body">
                    <form action="{{url('/product/store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <label for="name" class="text-white mt-5">Category Name</label>
                        <select class="form-control" name="category_id" >
                        <option selected disabled>Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                        </div>

                        <div class="form-group">
                        <label for="name" class="text-white mt-5">Name :-</label>
                        <input type="text" name="name" class="form-control mt-2" placeholder="Enter Your product name">
                        </div>

                        <div class="form-group">
                        <label for="price" class="text-white mt-5">Price :-</label>
                        <input type="text" name="price" class="form-control mt-2" placeholder="Enter Your product price">
                        </div>

                        <div class="form-group">
                        <label for="short_description" class="text-white mt-5">Short Description</label>
                        <textarea class="form-control"  name="short_description" rows="5" placeholder="Enter Product Short Description"></textarea>
                        </div>

                        <div class="form-group">
                        <label for="long_description" class="text-white mt-5">long Description</label>
                        <textarea class="ckeditor form-control"  name="long_description" rows="5" placeholder="Enter Product Long Description"></textarea>
                        </div>
                        
                        <div class="form-group">
                        <label for="type" class="text-white mt-5">Category Type</label>
                        <select class="selected disabled" name="type">Enter Select A product Type
                        <option value="top">Top</option>
                        <option value="hot">Hot</option>
                        </select>
                        </div>
                        <div class="form-group">
                        <label for="qty" class="text-white mt-5">Product Qty</label>
                        <input type="text" name="qty" class="form-control mt-2" placeholder="Enter Your product Qty">

                        <div class="form-group">
                        <label for="name" class="text-white mt-2">Image :-</label>
                        <input type="file" name="image" class="form-control mt-2 " accept="image/*" />
                        </div>

                        <button type="submit" class="btn btn-success mt-4 mb-2">Submit & Create</button>
                    </form>
                   </div>
                </div>
            
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
    
@endsection

@push('script')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>