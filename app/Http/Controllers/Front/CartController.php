<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('front.cart.index');
    }

    public function store(Request $request){
        // $cart = new Cart();
        // $cart->name=$request->name;
        // $cart->price=$request->price;
        // $cart->save();

        // Cart::add($request->id, $request->name, 1, $request->price)->associate('App/Product');

        return redirect()->back()->with('message', 'Item has been added to car');
    }
}
