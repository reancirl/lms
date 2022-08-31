<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::where('id','!=',1)->get();
        return view('users.index',compact('users'));
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $user = new User;
        $user->fill($request->except('password'));
        $user->password = bcrypt($request->id_number);
        $user->save();
        return redirect('users')->with('success','Sucessfully created user!');
    }
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }
    public function update(Request $request,$id)
    {
        $user = User::find($id);
        $user->fill($request->except('password'));
        $user->password = bcrypt($request->id_number);
        $user->update();
        return redirect('users')->with('success','Sucessfully updated user!');
    }
    public function show(User $user) {
        $user->delete();
        return redirect('users')->with('success','Sucessfully deleted user!');
    }
}
