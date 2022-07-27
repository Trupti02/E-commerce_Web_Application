<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function profile(){
        $user = Auth::user();

        return view('admin.profile',compact('user'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'

        ]);

        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('users.index');

    }
}
