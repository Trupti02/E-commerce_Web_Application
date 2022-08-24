<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $order = Order::where('user_id',$id)->get();
        return view ('front.profile.index',compact(['user','order']));
    }

    public function show($id)
    {
        $order = Order::find($id);
        return view('front.profile.details',compact('order'));
    }

    public function edit($id){
        $user = User::all();
        return view('front.profile.edit',compact('user'));
    }
}
