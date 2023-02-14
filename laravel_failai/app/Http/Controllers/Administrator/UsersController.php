<?php

namespace app\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users =  User::query()->with(['users'])->get();

        return view('users.index', compact('users'));
    }




    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return redirect()->route('users.show',$user);
    }
    public function edit(User $user)
    {

        return view('users.edit',compact('user'));
    }
    public function update(Request $request,User $user)
    {
        $user->update($request->all());
        return redirect()->route('users.show',$user);
    }

    public function destroy(User $user)
    {
        $user ->delete();
        return redirect()->route('users.index');
    }

    public function show(User $user){

        return view('users.show',['user'=> $user]);
    }




}
