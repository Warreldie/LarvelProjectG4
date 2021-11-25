<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Marketcontroller extends Controller
{
    public function index(){
        return view('market/index');
    }
}
