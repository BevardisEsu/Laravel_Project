<?php

namespace app\Http\Controllers\Administrator;


use App\Http\Controllers\Controller;
use App\Models\Payments;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payment = Payments::query()->with(['Payments'])->get();
        return view('payments.index',compact('payment'));
    }
    public function create()
    {
        return view('payments.create');
    }
    public function store(Request $request)
    {
        $payment = Payments::create($request->all());
        return redirect()->route('payments.show',$payment);
    }
    public function edit(Payments $payment)
    {
        return view('payments.edit',compact('payment'));
    }
    public function update(Request $request, Payments $payment)
    {
        $payment->update($request->all());
        return redirect()->route('payments.show',$payment);
    }
    public function destroy(Payments $payment)
    {
        $payment ->delete();
        return redirect()->route('payments.index');
    }

    public function show(Payments $payment){

        return view('payments.show',['payment'=>$payment]);
    }


}
