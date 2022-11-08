<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index(){
        $order = Order::all();
        return $order;
    }
    
}
