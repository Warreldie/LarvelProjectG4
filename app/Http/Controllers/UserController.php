<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\validation\rules;

//@throws \Illuminate\validation\ValidationException;

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

        //$request->validate([
           // 'password' => [
            //    'required','min:8'
                
          //  ]
           // ]);
        $firstname = $request->input('fname');
        $lastname = $request->input('lname');
        $fullname = $firstname. ' ' .$lastname;
        $user -> name = $fullname;
        $user -> email = $request->input('email');
        $user -> password = Hash::make($request->input('password'));
        $user->save();
        echo "user signup ok";
        
    }

    public function loginHandler(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            
            return view ('/users/login');

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
