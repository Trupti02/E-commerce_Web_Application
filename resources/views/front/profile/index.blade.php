@extends('front.layouts.master')
@section('content')
<br>
@if (session()->has('msg'))
        <div class="alert alert-success"><button type="button" class="close"
                data-dismiss="alert">&times;</button>{{ session()->get('msg') }}</div>
    @endif


    <h2>Profile</h2>
    <hr>
    <h3>User Details</h3>




    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="2">User Details <a href="{{route('profile.edit',$user->id)}}" class="pullright">
                        <i class="fa fa-cogs">Edit Profile</i></a>
                </th>
            <tr>
            <tr>
                <th>ID</th>
                <th>{{ $user->id }}</th>

            </tr>
            <tr>
                <th>Name</th>
                <th>{{ $user->name }}</th>

            </tr>
            <tr>
                <th>Email</th>
                <th>{{ $user->email }}</th>

            </tr>
            <tr>
                <th>Registed At</th>
                <th>{{ $user->created_at }}</th>

            </tr>
        </thead>
    </table>

    <h2>Orders </h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($user->order as $order)
                    <td>{{ $order->id }}</td>
                    <td>
                        @foreach ($order->products as $item)
                            <table class="table">
                                <tr>
                                    <td>{{ $item->name }}</td>
                                </tr>
                            </table>
                        @endforeach
                    </td>

                    <td>
                        @foreach ($order->orderItem as $item)
                            <table class="table">
                                <tr>
                                    <td>{{ $item->quantity }}</td>
                                </tr>
                            </table>
                        @endforeach
                    </td>

                    <td>
                        @foreach ($order->orderItem as $item)
                            <table class="table">
                                <tr>
                                    <td>RS{{ $item->price }}</td>
                                </tr>
                            </table>
                        @endforeach
                    </td>

                    <td>
                        @if ($order->status)
                            <span class="badge badge-success">Confirmed</span>
                        @else
                            <span class="badge badge-warning">Pending</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('/user/profile/details') . '/' . $order->id}}"
                            class="btn btn-outline-dark btn-sm">Details</a>
                    </td>

            </tr>
            @endforeach


            </tr>
            {{-- @dd($orders[0]->user); --}}

            {{-- @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->description }}</td>
                                <td><img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->image }}"
                                        class="img-thumbnail" style="width: 50px"></td>
                                <td>
                                    <a class="btn btn-sm btn-info ti-pencil-alt" title="Edit"
                                        href="{{ route('product.edit', $product->id) }}"></a>
                                    <a class="btn btn-sm btn-danger ti-trash" title="Delete"
                                        href="{{ route('pro.delete', $product->id) }}"></a>
                                    <a class="btn btn-sm btn-primary ti-view-list-alt" title="Details" href="{{ route('product.show', $product->id) }}"></a>
                                </td>
                            </tr>
                        @endforeach --}}
        </tbody>
    </table>
@endsection
