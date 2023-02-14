<?php

namespace app\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrdersDetailsController extends Controller
{
    public function index()
    {
            $odetails =  OrderDetails::query()->with(['odetails'])->get();

            return view('odetails.index', compact('odetails'));
    }

    public function create()
    {
        return view('odetails.create');
    }
    public function store(Request $request)
    {
        $odetail = OrderDetails::create($request->all());
        return redirect()->route('odetails.show',$odetail);
    }
    public function edit(OrderDetails $odetail)
    {
        return view('odetails.edit',compact('odetail'));
    }
    public function update(Request $request,OrderDetails $odetail)
    {
        $odetail->update($request->all());
        return redirect()->route('odetails.show',$odetail);
    }

    public function destroy(OrderDetails $odetail)
    {
        $odetail ->delete();
        return redirect()->route('odetails.index');
    }

    public function show(OrderDetails $odetail){

        return view('odetails.show',['odetail'=>$odetail]);
    }
}

