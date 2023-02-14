<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
    public function index()
    {
        {
            $subcategories =  SubCategory::query()->with(['subcategories'])->get();

            return view('subcategories.index', compact('subcategories'));
        }
    }

    public function create()
    {
        return view('subcategories.create');
    }
    public function store(Request $request)
    {
        $subcategory = SubCategory::create($request->all());
        return redirect()->route('subcategories.show',$subcategory);
    }
    public function edit(SubCategory $subcategory)
    {
        return view('subcategories.edit',compact('subcategory'));
    }
    public function update(Request $request,SubCategory $subcategory)
    {
        $subcategory->update($request->all());
        return redirect()->route('subcategories.show',$subcategory);
    }

    public function destroy(SubCategory $subcategory)
    {
        $subcategory ->delete();
        return redirect()->route('subcategories.index');
    }

    public function show(SubCategory $subcategory){

        return view('subcategories.show',['subcategory'=>$subcategory]);
    }
}

