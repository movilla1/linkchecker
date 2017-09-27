<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view("users.index", ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
         return view("users.create",["user"=>new User()]);
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         $user = new User();
         $user->name = $request->input('name');
         $user->email = $request->input('email');
         $user->password = bcrypt($request->input('password'));
         $user->active = $request->input('active');

         $ret=$user->save();
         $user->roles()->attach($request->input('role'));
         return \redirect()->route("users.index",["notice"=>"User stored"]);
     }

     /**
      * Display the specified resource.
      *
      * @param  \App\User  $User
      * @return \Illuminate\Http\Response
      */
     public function show(User $user)
     {
         return view("users.show",["user"=>$user]);
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\User  $user
      * @return \Illuminate\Http\Response
      */
     public function edit(User $user)
     {
         return view("users.edit",["user"=>$user]);
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\User  $user
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, User $user)
     {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->active = $request->input('active');
        $user->roles()->attach($request->input('role'));
        $ret=$user->save();

        if ($ret)
            return \redirect()->route("users.index",["notice"=>"User #{$user->id} Updated properly"]);
        else
            return \redirect()->route("users.index",["notice"=>"User #{$user->id} failed to Update"]);
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\User  $user
      * @return \Illuminate\Http\Response
      */
     public function destroy(User $user)
     {
         $user->delete();
         return \redirect()->route("users.index",["notice"=>"User deleted"]);
     }
 }
