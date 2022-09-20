<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){

        return view('front.cart.index');
    }

    public function store(Request $request){

        // dd($request->all());

        Cart::add($request->id, $request->name, 1, $request->price,0);

        return redirect()->route('cart')->with('message', 'Item has been added to cart');
    }

    public function empty(){
        Cart::destroy();
    }

    public function remove($id){
        Cart::remove($id);
        return redirect()->back()->with('msg','Item has been removed from the cart !');
    }


}
