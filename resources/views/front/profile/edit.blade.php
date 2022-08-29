@extends('front.layouts.master')
@section('content')

<body>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-md-12" id="register">
            {{-- @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

            <div class="card col-md-8">
                <div class="card-body">
                    <h2 class="card-title">Edit Profile</h2>
                    <hr>
                    <form action="{{route('profile.update',$user->id)}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" placeholder="Full Name" id="name" class="form-control" value="{{$user->name}}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" placeholder="Email" id="email" class="form-control" value="{{$user->email}}">
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" placeholder="Password" id="password" class="form-control" >
                            <span class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}}</span>
                        </div>

                        <div class="form-group">
                            <label for="password">Confirm Password:</label>
                            <input type="password" name="password_confirmation" placeholder="Password" id="password" class="form-control" >
                            <span class="text-danger">{{$errors->has('password_confirmation') ? $errors->first('password_confirmation') : ''}}</span>
                        </div>

                        <div class="form-group">
                            <label for="address">Address:</label>
                            {{-- <input type="text" name="address" placeholder="Address" id="address" class="form-control"> --}}
                            <textarea  type="text" id="address" name="address" rows="2" cols="50" placeholder="Address" class="form-control">{{$user->address}}</textarea>


                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-info col-md-2"> Update</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
@endsection
