<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('admin.users.index',compact('user'));
    }

    public function detail($id){
        $order = Order::with('user','products')->find($id);
        return view('admin.users.detail',compact('order'));
        return redirect()->route('admin.users.detail');
    }
}
