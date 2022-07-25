<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){
        return view('admin.products.create');
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

        return redirect()->route('admin.products.index')->with('message', 'Added Succesfully!');

    }

    public function index(){
        $product = Product::all();
        return view('admin.products.index',compact('product'));
    }

    public function edit($id){
        $product = Product::find($id);
        return view('admin.products.edit',compact('product'));


    }

    public function update(Request $request,$id){
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

        return redirect()->route('admin.products.index')->with('message', 'Update Succesfully!');

    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('message', 'Delete Succesfully!');
    }

    public function detail($id){
        $product = Product::find($id);
        return view('admin.products.details',compact('product'));


    }




}
