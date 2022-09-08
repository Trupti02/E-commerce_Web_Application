@extends('front.layouts.master')
@section('content')

<body>


<!-- Page Content -->
<div class="container">

    <div class="row">
        {{-- @if (session()->has('message'))
        <div class="alert alert-success ">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get('message') }}
        </div>
    @endif --}}

        <div class="col-md-12" id="register">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


            <div class="card col-md-8">
                <div class="card-body">
                    <h2 class="card-title">Sign In</h2>
                    <hr>
                    <form action="{{route('login.store')}}" method="POST">
                        @csrf




                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" placeholder="Email" id="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                        </div>



                        <div class="form-group">
                            <button class="btn btn-outline-info col-md-2"> Sign In</button>
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
