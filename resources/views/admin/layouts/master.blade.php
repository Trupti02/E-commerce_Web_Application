<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Admin Panel</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>


    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"/>

    <link href="{{asset('assets/css/animate.min.css')}}" rel="stylesheet"/>

    <link href="{{asset('assets/css/paper-dashboard.css')}}" rel="stylesheet"/>

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>

    <link href="{{asset('assets/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>
<body>

<div class="wrapper">
    @include('admin.layouts.sidebar')
    {{-- <div class="sidebar" data-background-color="white" data-active-color="danger">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    Admin Panel
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="ti-archive"></i>
                        <p>Add Product</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="ti-view-list-alt"></i>
                        <p>View Products</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="ti-calendar"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
            </ul>
        </div>
    </div> --}}

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">@yield('page')</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-settings"></i>
                                <p>Account</p>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('admin.profile')}}">Profile</a></li>
                                <li><a href="{{route('logout')}}">Logout</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <div class="content">
            @yield('content')
            {{-- <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-eye"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Total Visitors</p>
                                            11022
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr/>
                                    <div class="stats">
                                        <i class="ti-panel"></i> Details
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-archive"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Products</p>
                                            $1,345
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr/>
                                    <div class="stats">
                                        <i class="ti-panel"></i> Details
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-shopping-cart-full"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Orders</p>
                                            23
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr/>
                                    <div class="stats">
                                        <i class="ti-panel"></i> Details
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-info text-center">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Users</p>
                                            45
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr/>
                                    <div class="stats">
                                        <i class="ti-panel"></i> Details
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="">
                                Contact
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>
                    , made with <i class="fa fa-heart heart"></i> by <a href="">Trupti</a>
                </div>
            </div>
        </footer>

    </div>
</div>

</body>

<script src="{{asset('assets/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/script.js')}}" type="text/javascript"></script>
</html>
