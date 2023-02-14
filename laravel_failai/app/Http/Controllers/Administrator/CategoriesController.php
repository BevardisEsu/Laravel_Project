<?php

namespace app\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{

    public function index()
    {
        {
            $categories =  Category::query()->with(['category'])->get();

            return view('categories.index', compact('categories'));
        }
    }

    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return redirect()->route('categories.show',$category);
    }
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }
    public function update(Request $request,Category $category)
    {
        $category->update($request->all());
        return redirect()->route('categories.show',$category);
    }

    public function destroy(Category $category)
    {
        $category ->delete();
        return redirect()->route('categories.index');
    }

    public function show(Category $category){

        return view('categories.show',['category'=>$category]);
    }
}
