@extends('admin.layouts.master')
@section('page')
    User Product
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">{{$order->user->name}}</h4>
                        {{-- <p class="category">List of all registered users</p> --}}
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Product Name</th>

                                    <th>Address</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ @$order->id }}</td>
                                    <td>{{ $order->products[0]->name }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->OrderItem[0]->quantity }}</td>
                                    <td>{{ $order->OrderItem[0]->price }}</td>
                                    <td>{{ $order->date }}</td>
                                    <td>
                                        @if ($order->status)
                                            <span class="label label-success">Confirmed</label>
                                            @else
                                                <span class="label label-warning">Pending</label>
                                        @endif


                                    </td>

                                </tr>

                                {{-- <tr>
                                    <td>2</td>
                                    <td>Dakota</td>
                                    <td>Macbook pro</td>
                                    <td>12/33,UK</td>
                                    <td><span class="label label-warning">Blocked</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-success ti-check" title="Active User"></button>

                                        <button class="btn btn-sm btn-primary ti-view-list-alt" title="Details"></button>
                                    </td>
                                </tr> --}}

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
