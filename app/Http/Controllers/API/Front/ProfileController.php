<?php

namespace App\Http\Controllers\API\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $order = Order::where('user_id',$id)->get();
        return $order;
    }

    public function update(Request $request, $id)
    {
        // $id = Auth::user()->id;
        $user = User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password = bcrypt($request->password);
        $user->address=$request->address;
        $user->update();
        return $user;
    }
}
