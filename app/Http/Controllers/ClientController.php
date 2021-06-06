<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $borrows = Borrow::where('user_id',Auth::user()->id)->get();
        // dd($borrows);
        return view('users.dataPinjam',compact('borrows'));
    }
    public function profile(){
        $users = User::find(Auth::user()->id);
        // dd($users->id);
        return view('users.profile',compact('users'));
    }
    public function update(Request $request, $id){
        // dd($request->all());
        $users = User::find($id);
        $users->update($request->all());
        if ($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $users->avatar = $request->file('avatar')->getClientOriginalName();
            $users->save();
        }
        return redirect('/home');
    }

}