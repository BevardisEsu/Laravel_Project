<?php

namespace app\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\PaymentsTypes;
use Illuminate\Http\Request;

class PaymentsTypesController extends Controller
{
    public function index()
    {
        $ptypes =  PaymentsTypes::query()->with(['ptypes'])->get();

        return view('ptypes.index', compact('ptypes'));
    }

    public function create()
    {
        return view('ptypes.create');
    }
    public function store(Request $request)
    {
        $ptype = PaymentsTypes::create($request->all());
        return redirect()->route('ptypes.show',$ptype);
    }
    public function edit(PaymentsTypes $ptype)
    {
        return view('ptypes.edit',compact('ptype'));
    }
    public function update(Request $request, PaymentsTypes $ptype)
    {
        $ptype->update($request->all());
        return redirect()->route('ptypes.show',$ptype);
    }

    public function destroy(PaymentsTypes $ptype)
    {
        $ptype ->delete();
        return redirect()->route('ptypes.index');
    }

    public function show(PaymentsTypes $ptype){

        return view('ptypes.show',['ptype'=>$ptype]);
    }
}
