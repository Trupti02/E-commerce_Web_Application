<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(){
        $user = User::all();
        return $user;
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'

        ]);

        $id = $request->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return $user;

    }

    public function login( Request $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::User();
            $token = $user->createToken('MyApp')->accessToken;
            $success = array('token'=>$token,'name'=>$user->name,'email'=>$user->email);
            return $success;
        }
        else{
            return response()->json('Invaild Data');
        }
    }

}

