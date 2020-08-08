<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('product.index')->with(compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(ProductRequest $request)
    {
        Product::create($request->input());
        return redirect('/product')->with('success', 'New agent added');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit')->with(compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        Product::find($id)->update($request->input());
        return redirect('/product')->with('success', 'Product updated');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect('/product')->with('success', 'Data Removed');
    }
}
