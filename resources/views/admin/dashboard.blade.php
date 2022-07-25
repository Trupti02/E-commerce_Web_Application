@extends('admin.layouts.master')
@section('page')
Dashboard
@endsection
@section('content')
<div class="container-fluid">
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
                                <h5>11022</h5>
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
                                <?php
                                $product_count = App\Models\Product::count();
                                ?>
                                <h5>{{$product_count}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr/>
                        <div class="stats">
                            <a href="{{route('products.index')}}"><i class="ti-panel"></i> Details</a>
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
                                <?php
                                $order_count = App\Models\Order::count();
                                ?>
                                <h5>{{$order_count}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr/>
                        <div class="stats">
                            <a href="{{route('order.index')}}"><i class="ti-panel"></i> Details</a>
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
                                <?php
                                $user_count = App\Models\User::count();
                                ?>
                                <h5>{{$user_count}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr/>
                        <div class="stats">
                            <a href="{{route('users.index')}}"><i class="ti-panel"></i> Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
