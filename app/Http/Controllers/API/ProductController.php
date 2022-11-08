<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return $product;
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',

        ]);
        $product = new Product();
        $product->name=$request->name;
        $product->price=$request->price;
        $product->description=$request->description;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads',$filename);
            $product->image=$filename;

        }

        $product->save();
        return $product;


    }

    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',



        ]);
        $product = Product::find($id);
        $product->name=$request->name;
        $product->price=$request->price;
        $product->description=$request->description;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads',$filename);
            $product->image=$filename;

        }

        $product->update();
         return $product;


    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();

        return $product;
    }

}
