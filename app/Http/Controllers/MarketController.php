<?php

namespace App\Http\Controllers;

use \App\Models\Nft;
use \App\Models\Collection;
use Illuminate\Http\Request;

class Marketcontroller extends Controller
{
    public function index()
    {
        $nfts = Nft::all();
        $data['nfts'] = $nfts;
        $collections = Collection::all();
        $data['collections'] = $collections;
        return view('market/index', $data);
    }
}
