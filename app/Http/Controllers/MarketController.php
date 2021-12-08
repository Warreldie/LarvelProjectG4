<?php

namespace App\Http\Controllers;

use \App\Models\Category;
use \App\Models\Collection;
use Illuminate\Http\Request;

class Marketcontroller extends Controller
{
    public function index()
    {
        $collections = Collection::all();
        $data['collections'] = $collections;
        return view('market/index', $data);
    }
}
