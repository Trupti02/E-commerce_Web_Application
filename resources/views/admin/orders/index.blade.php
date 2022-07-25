@extends('admin.layouts.master')
@section('page')
    Orders
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
                        <h4 class="title">Orders</h4>
                        <p class="category">List of all orders</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ @$order->user->name }}</td>
                                        <td>
                                            @foreach ($order->products as $item)
                                                {{ $item->name }}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($order->OrderItem as $item)
                                                {{ $item->quantity }}
                                            @endforeach
                                        </td>
                                        <td>
                                            @if ($order->status)
                                                <span class="label label-success">Confirmed</span>
                                            @else
                                                <span class="label label-warning">Pending</span>
                                            @endif

                                        </td>
                                        <td>
                                            @if ($order->status)
                                                <a href="{{ route('orders.pending', $order->id) }}"><button
                                                        class="btn btn-danger" type="button">Pending</button></a>
                                            @else
                                                <a href="{{ route('orders.confirm', $order->id) }}"><button
                                                        class="btn btn-success" type="button">Confirm</button></a>
                                            @endif

                                            <a href="{{route('orders.detail',$order->id)}}"><button type="button" class="btn btn-primary">Detail</button></a>
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
