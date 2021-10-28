<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class UserController extends Controller
{
    public function profile($id){
        $user = \DB::table("users")->where("id", $id)->first();
        $data["user"] = $user;
        return view("users/profile", $data);
    }

    public function edit($id){
        $user = \DB::table("users")->where("id", $id)->first();
        $data["user"] = $user;
        return view("users/edit", $data);
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->description = $request->input("description");
        $user->save();
        return redirect("/users/profile/$id");


    }
}
