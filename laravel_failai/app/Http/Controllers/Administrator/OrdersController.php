<?php

namespace app\Http\Controllers\Administrator;


use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        {
            $orders =  Orders::query()->with(['order'])->get();

            return view('orders.index', compact('orders'));
        }
    }
    public function create()
    {
        return view('orders.create');
    }
    public function store(Request $request)
    {
        $order = Orders::create($request->all());
        return redirect()->route('orders.show',$order);
    }
    public function edit(Orders $order)
    {
        return view('orders.edit',compact('order'));
    }
    public function update(Request $request, Orders $order)
    {
        $order->update($request->all());
        return redirect()->route('orders.show',$order);
    }
    public function destroy(Orders $order)
    {
        $order ->delete();
        return redirect()->route('orders.index');
    }
    public function show(Orders $order){

        return view('orders.show',['order'=> $order]);
    }
}
