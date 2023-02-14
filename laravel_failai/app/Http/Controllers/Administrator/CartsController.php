<?php

namespace app\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function index()
    {
        return Carts::query()->with('cart')->get();
    }
    public function create()
    {
        return view('carts.create');
    }
    public function store(Request $request){
        $carts = Carts::create($request->all());
        return redirect()->route('carts.show',$carts);
    }
    public function edit(Carts $carts)
    {
        return view('carts.edit',compact('carts'));
    }
    public function update(Request $request, Carts $carts)
    {
        $carts->update($request->all());
        return redirect()->route('carts.show',$carts);
    }
    public function destroy(Carts $carts)
    {
        $carts ->delete();
        return redirect()->route('carts.index');
    }

    public function show(Carts $carts){

        return $carts;
    }
}
