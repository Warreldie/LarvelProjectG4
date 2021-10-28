<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use Illuminate\Support\Facades\Storage;

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
  
        var_dump($request->hasFile("picture"));

        if ($request->hasFile('picture')) {
            $destination_path = "public/images/profiles";
            $image = $request->file("picture");
            $image_name = date('m/d/Y h:i:s a') . "pfp_" . $image->getClientOriginalName();
            $path = $request->file("picture")->storeAs($destination_path, $image_name);

            $user->picture = "images/profiles/" . $image_name;
        } 

        $user->save();
        return redirect("/users/profile/$id");
    }
}
