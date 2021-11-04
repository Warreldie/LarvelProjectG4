<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\validation\rules;

use Illuminate\Http\Request;
use \App\Models\User;
use Illuminate\Support\Facades\Storage;
use \Illuminate\validation\ValidationException;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Redirect;

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

        if ($request->hasFile('picture')) {
            $destination_path = "public/images/profiles";
            $image = $request->file("picture");
            $image_name = date('m/d/Y h:i:s a') . "pfp_" . $image->getClientOriginalName();
            $path = $request->file("picture")->storeAs($destination_path, $image_name);

            $user->picture = "images/profiles/" . $image_name;
        } 
        $user->save();
        return redirect("/profile/$id");
    }

    public function deletePicture(Request $request, $id){
        $user = User::find($id);
        $user->picture = "images/default.jpeg/";
        $user->save();
        return redirect("/profile/$id/edit");
    }

    //registreer controller
    public function register(){
        return view ('users/register');
    }
    //login controller
    public function login(){
        return view ('users/login');
    }

    public function registerHandler(Request $request){
        $user = new \App\Models\User();

        $validated = $request->validate([
            'fname'=> 'required',
            'lname' => 'required',
            'email' => 'required|unique:users',
            'password' => ['required', 'min:6','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/']
        ]);

        $firstname = $request->input('fname');
        $lastname = $request->input('lname');
        $fullname = $firstname. ' ' .$lastname;
        $user -> name = $fullname;
        $user -> email = $request->input('email');
        $user -> password = Hash::make($request->input('password'));
        $request->session()->flash('message', 'Regisration succesful, please login...');
        $user->save();
        return view ('/users/login');
        ;
        
    }

    public function loginHandler(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            
            return view ('/index');

        }
        else{
            return Redirect::back()->withErrors([
                'email' => 'password or email incorrect',
                'password' => 'password or email incorrect'
            ]);
        };
        
    }
    public function logout(){
        Auth::logout();
        return view ('/users/login');
    }

}
