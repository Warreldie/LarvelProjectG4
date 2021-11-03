<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\validation\rules;
use \Illuminate\validation\ValidationException;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class UserController extends Controller
{
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
            echo "login failed";
        }; 
        
    }
    public function logout(){
        Auth::logout();
        return view ('/users/login');
    }

}
