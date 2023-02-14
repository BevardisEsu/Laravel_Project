<?php

namespace app\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Products;

class ProductsController extends Controller
{

    public function index()
    {
        $product =  Products::query()->with('products')->get();

        return view('products.index', compact('product'));
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(ProductRequest $request)
    {

        $product = Products::create($request->all());
        return redirect()->route('products.show',$product);
    }
    public function edit(Products $product)
    {
        return view('products.edit',compact('product'));
    }
    public function update(ProductRequest $request, Products $product)
    {

        $product->update($request->all());
        return redirect()->route('products.show',$product);
    }
    public function destroy(Products $product)
    {
        $product ->delete();
        return redirect()->route('products.index');
    }


    public function show(Products $product){

        return view('products.show',['product'=> $product]);
    }





}
