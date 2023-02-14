<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;



// Šis kontroleris bus matomas tik useriams

class CategoryController extends Controller
{
public function show(Category $category)
{
    return view('category_show', ['category' => $category]);
}
}
