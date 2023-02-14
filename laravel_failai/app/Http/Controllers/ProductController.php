<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;


// Šis kontroleris bus matomas tik useriams

class ProductController extends Controller
{
    public function show(Products $product){

        return view('products.show',['product'=> $product]);
    }
}
