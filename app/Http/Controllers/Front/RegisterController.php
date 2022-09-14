<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(){
        return view ('front.register');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'address' => 'required',

        ]);
        // $user = new User();
        // $user->name=$request->name;
        // $user->email=$request->email;
        // $user->password = bcrypt($request->password);
        // $user->address=$request->address;
        // $user->save();
        // return redirect()->route('cart');

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'password' => bcrypt($request->password),

        ]);
        return redirect()->route('user.login')->with('msg','User has been created successfully !');


    }
}
