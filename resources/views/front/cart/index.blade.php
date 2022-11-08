@extends('front.layouts.master')
@section('content')
    <div class="container">
        <h2 class="mt-5"><i class="fa fa-shopping-cart"></i> Shooping Cart</h2>
        <hr>
        @if (Cart::instance('default')->count() > 0)
            <h4 class="mt-5">{{ Cart::instance()->count() }} items(s) in Shopping Cart</h4>
            <div class="cart-items">
                <div class="row">
                    <div class="col-md-12">
                        @if (session()->has('msg'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ session()->get('msg') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session()->has('errors'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ session()->get('errors') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <table class="table">
                            <tbody>
                                @foreach (Cart::instance('default')->content() as $item)
                                    <tr>

                                        <?php

                                        $product_data = App\Models\Product::find($item->id);
                                        ?>
                                        <td><img src="{{ asset('uploads' . '/' . @$product_data->image) }}"
                                                style="width: 5em">
                                        </td>
                                        <td>
                                            <strong>{{ $item->name }}</strong><br> {{ @$product_data->description }}
                                        </td>

                                        <td>
                                            <form action="{{ route('cart.remove', $item->rowId) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-link btn-large">Remove</button><br>
                                            </form>
                                            <a href="{{ route('cart.saveForLater', $item->rowId) }}">Save for later</a>
                                        </td>
                                        <td>
                                            <select name="" id="" class="form-control qty"
                                                style="width: 4.7em" data-id={{ $item->rowId }}>
                                                <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                                                <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                                                <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                                                <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
                                            </select>
                                        </td>
                                        <td>Rs. {{ $item->total() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Price Details -->
                    <div class="col-md-6">
                        <div class="sub-total">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="2">Price Details</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>Subtotal </td>
                                    <td>{{ Cart::subtotal() }}</td>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <td>{{ Cart::tax() }}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <th>{{ Cart::total() }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- Save for later  -->
                    <div class="col-md-12">
                        <a href="{{route('index')}}"><button class="btn btn-outline-dark">Continue Shopping</button></a>
                        <a href={{ route('checkout') }} class="btn btn-outline-info">Proceed to checkout</a>
                        <hr>
                    </div>
                @else
                    <h1> There Is no Item in Cart !</h1>
                    <a href="/"class="btn btn-outline-dark">Continue Shopping</a>
        @endif
        <div class="col-md-12">

            <h4>{{ Cart::instance('saveForLater')->count() }} items Save for Later</h4>
            <table class="table">
                <tbody>
                    @foreach (Cart::instance('saveForLater')->content() as $item)
                        <tr>

                            @php

                                $product_data = App\Models\Product::find($item->id);
                            @endphp
                            <td><img src="{{ asset('uploads' . '/' . @$product_data->image) }}" style="width: 5em">
                            </td>

                            <td>
                                <strong>{{ $item->name }}</strong><br> {{ @$product_data->description }}
                            </td>
                            <td>
                                <form action={{ route('cart.saveForLaterDestroy', $item->rowId) }} method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-link btn-large">Remove</button><br>
                                </form>
                                <a href="{{ route('cart.moveToCart', $item->rowId) }}">Move to Cart</a>
                            </td>
                            <td>
                                <select name="" id="" class="form-control " style="width: 4.7em">
                                    <option>1</option>
                                    <option>2</option>


                                </select>
                            </td>
                            <td>Rs. {{ $item->total() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        const className = document.querySelectorAll('.qty');
        Array.from(className).forEach(function(el) {
            el.addEventListener('change', function() {
                const id = el.getAttribute('data-id');
                axios.patch(`/cart/update/${id}`, {
                        qty: this.value
                    })
                    .then(function(response) {
                        location.reload();
                    })
                    .catch(function(error) {
                        location.reload();
                    });
                console.log(id);
            })
        })
    </script>
@endsection
