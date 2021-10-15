<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NFTController extends Controller
{
    public function index(){
        $nfts = \DB::table('nfts')->get();
        $data['nfts'] = $nfts;
        return view('nfts/index', $data);
    }
}
