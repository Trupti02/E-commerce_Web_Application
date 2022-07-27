@extends('admin.layouts.master')
@section('page')
    Edit Profile
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">


                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit Profile</h4>
                    </div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="content">
                        <form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input type="text" class="form-control border-input"
                                            name="name" value="{{$user->name}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="email" class="form-control border-input"
                                            name="email" value="{{$user->email}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input type="password" class="form-control border-input"
                                            name="password" value="{{$user->password}}">
                                    </div>



                                </div>

                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
