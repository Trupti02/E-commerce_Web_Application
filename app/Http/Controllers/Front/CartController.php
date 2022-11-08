<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
// use App\Models\Validator;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){

        return view('front.cart.index');
    }

    // public function store(Request $request){

    //     // dd($request->all());
    //     // dd($request->all());
    //     // Cart::add($request->id,$request->name,1,$request->price,0);

    //     Cart::add($request->id, $request->name, 1, $request->price, 0);

    //     return redirect()->back()->with('message', 'Item has been added to cart');
    // }

    public function store(Request $request){
        $dub = Cart::instance('default')->search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });
        if ($dub->isNotEmpty()) {
            return redirect()->back()->with('msg', 'Item is  already in cart !');

        }
        Cart::add($request->id, $request->name, 1, 10, 0);
        return redirect()->back()->with('msg', 'Item has been added cart !');
    }

    public function empty(){
        Cart::destroy();
    }

    public function remove($id){
        Cart::remove($id);
        return redirect()->back()->with('msg','Item has been removed from the cart !');
    }

    public function update(Request $request,$id)
    {
        // $validator = Validator::make($request->all(), [
        //     'qty' => 'required|numeric|between: 1,5'
        // ]);

        // if ($validator->fails()) {
        //     session()->flash('errors','Quantity must be between 1 and 5');
        //     return response()->json(['success' => false]);
        // }

        Cart::update($id, $request->qty);

        session()->flash('msg','Quantity has been updated');

        return response()->json(['success' => true]);
    }

    public function saveForLater($id)
    {
        //    dd($id);

        $item = Cart::get($id);
        Cart::remove($id);
        $dub = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });
        if ($dub->isNotEmpty()) {
            return redirect()->back()->with('msg', 'Item is  saved for later already !');

        }
        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price, 0);
        return redirect()->back()->with('msg', 'Item has been saved for later !');

    }

    public function saveForLaterDestroy($id)
    {
        Cart::instance('saveForLater')->remove($id);
        return redirect()->back()->with('msg', 'Item has been remove from save for later !');

    }

    public function moveToCart($id)
    {

        $item = Cart::instance('saveForLater')->get($id);
        Cart::instance('saveForLater')->remove($id);
        $dub = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });
        if ($dub->isNotEmpty()) {
            return redirect()->back()->with('msg', 'Item is  saved for later already !');

        }
        Cart::instance('default')->add($item->id, $item->name, 1, $item->price, 0);
        return redirect()->back()->with('msg', 'Item has been move to cart !');

    }


}
