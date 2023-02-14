<?php

namespace app\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Statuses;
use Illuminate\Http\Request;

class StatusesController extends Controller
{

    public function index()
    {
        {
            $statuses =  Statuses::query()->with(['statuses'])->get();

            return view('statuses.index', compact('statuses'));
        }
    }

    public function create()
    {
        return view('statuses.create');
    }
    public function store(Request $request)
    {
        $status = Statuses::create($request->all());
        return redirect()->route('statuses.show',$status);
    }
    public function edit(Statuses $status)
    {
        return view('statuses.edit',compact('status'));
    }
    public function update(Request $request,Statuses $status)
    {
        $status->update($request->all());
        return redirect()->route('statuses.show',$status);
    }

    public function destroy(Statuses $status)
    {
        $status ->delete();
        return redirect()->route('statuses.index');
    }

    public function show(Statuses $status){

        return view('statuses.show',['status'=>$status]);
    }


    public function showByType(Statuses $status){

        return view('statuses.show',['status'=>$status]);
    }
}
