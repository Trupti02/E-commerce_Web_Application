@extends('admin.layouts.master')
@section('page')
    View Product
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">

                @if (session()->has('message'))
                    <div class="alert alert-success ">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="header">
                        <h4 class="title">All Products</h4>
                        <p class="category">List of all stock</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $p)
                                    <tr>
                                        <td>{{ $p->id }}</td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->price }}</td>
                                        <td>{{ $p->description }}</td>
                                        <td>

                                            @if (empty($p->image))
                                                <img src="{{ asset('defaultblog.png') }}" width="100px" height="100px" />
                                            @else
                                                <img src="{{ asset('uploads/' . $p->image) }}" width="100px"
                                                    height="100px" />
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ route('products.edit', $p->id) }}"><button
                                                    class="btn btn-sm btn-info ti-pencil-alt" title="Edit"></button></a>
                                            <a href="{{ route('delete', $p->id) }}"><button
                                                    class="btn btn-sm btn-danger ti-trash" title="Delete"></button></a>

                                            <a href="{{ route('products.detail', $p->id) }}"><button
                                                    class="btn btn-sm btn-primary ti-view-list-alt"
                                                    title="Details"></button></a>

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
