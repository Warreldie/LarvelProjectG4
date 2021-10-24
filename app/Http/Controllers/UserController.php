<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
