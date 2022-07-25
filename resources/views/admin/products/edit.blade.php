@extends('admin.layouts.master')
@section('page')
Edit Product
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-md-10">
            <div class="card">
                <div class="header">
                    <h4 class="title">Edit Product</h4>
                </div>
                <div class="content">
                    <form action="{{route('update',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Product Name:</label>
                                    <input type="text" class="form-control border-input" placeholder="Macbook pro" name="name" value="{{$product->name}}">
                                </div>

                                <div class="form-group">
                                    <label>Product Price:</label>
                                    <input type="text" class="form-control border-input" placeholder="$2500" name="price" value="{{$product->price}}">
                                </div>

                                <div class="form-group">
                                    <label>Product Description:</label>
                                    <textarea  id="description" cols="30" rows="10"
                                              class="form-control border-input" placeholder="Product Description" name="description" value="{{$product->description}}">{{$product->description}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Product Image:</label>
                                    <input type="file" class="form-control border-input" name="image" value="{{$product->image}}">
                                </div>

                            </div>

                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">Update Product</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
