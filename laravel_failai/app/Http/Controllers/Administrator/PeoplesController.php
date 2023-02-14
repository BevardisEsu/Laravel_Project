<?php

namespace app\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonUpdateRequest;
use App\Models\Peoples;
use Illuminate\Http\Request;

class PeoplesController extends Controller
{
    public function index()
    {
        $person = Peoples::query()->with(['people'])->get();
        return view('peoples.index',compact('person'));
    }
    public function create()
    {
        return view('peoples.create');
    }
    public function store(Request $request)
    {
        $person = Peoples::create($request->all());
        return redirect()->route('peoples.show',$person);
    }
    public function edit(Peoples $person)
    {
        return view('peoples.edit',compact('person'));
    }
    public function update(PersonUpdateRequest $request, Peoples $person)
    {
        $person->update($request->all());
        return redirect()->route('peoples.show',$person);
    }
    public function destroy()
    {


    }


    public function show(Peoples $person){

        return view('peoples.show',['person'=> $person]);
    }
}
