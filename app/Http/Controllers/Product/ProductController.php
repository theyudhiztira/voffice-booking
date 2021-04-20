<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = \App\Models\Product::all();
        return view('admin.pages.product.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('admin.pages.product.create');
    }

    public function edit($id)
    {
        $product = \App\Models\Product::find($id);

        if(empty($product)){
            return abort(404);
        }

        return view('admin.pages.product.edit', $product);
    }

    public function store(Request $req)
    {
        $validator = \Validator::make($req->all(), [
            'name' => 'required',
            'price' => 'required|numeric|min:10000',
            'credit' => 'required|numeric|min:1',
            'image' => 'required|image',
            'description' => 'required|min:15'
        ]);

        if($validator->fails()){
            return redirect(route('admin.product.create'))
            ->withErrors($validator)
            ->withInput();
        }

        $product = new \App\Models\Product;
        $product->name = $req->name;
        $product->price = $req->price;
        $product->credit = $req->credit;
        $product->description = $req->description;
        $product->image = "default.jpeg";
        $product->created_by = \Auth::user()->id;
        $product->save();

        $file = $req->file('image');
        $fileName = $product->id.".".$file->getClientOriginalExtension();
        $file->move('img/products', $fileName);
        $product->image = $fileName;
        $product->save();

        return redirect(route('admin.product.index'));
    }

    public function update(Request $req)
    {
        $validator = \Validator::make($req->all(), [
            'id' => 'required|exists:product,id',
            'name' => 'required',
            'price' => 'required|numeric|min:10000',
            'credit' => 'required|numeric|min:1',
            'image' => 'required|image',
            'description' => 'required|min:15'
        ]);

        if($validator->fails()){
            return redirect(route('admin.product.edit'))
            ->withErrors($validator)
            ->withInput();
        }

        $product = \App\Models\Product::find($req->id);
        $product->name = $req->name;
        $product->price = $req->price;
        $product->credit = $req->credit;
        $product->description = $req->description;
        $file = $req->file('image');
        $fileName = $product->id.".".$file->getClientOriginalExtension();
        $file->move('img/products', $fileName);
        $product->image = $fileName;
        $product->save();

        return redirect(route('admin.product.index'));
    }

    public function delete($id)
    {
        $product = \App\Models\Product::find($id);

        if(empty($product)){
            return abort(404);
        }

        if(\File::exists(public_path('img/products/'.$product->image))){
            \File::delete(public_path('img/products/'.$product->image));
        }

        $product->delete();

        return redirect(route('admin.product.index'));
    }
}
