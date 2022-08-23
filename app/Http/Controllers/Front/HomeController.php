<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::inRandomOrder()->take(4)->get();
        return view('front.index',compact('products'));
    }

   








}
