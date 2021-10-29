<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NFTController extends Controller
{
    public function index()
    {
        $nfts = \DB::table('nfts')->get();
        $data['nfts'] = $nfts;
        return view('nfts/index', $data);
    }
    public function indexpage()
    {
        $nfts = \DB::table('nfts')->get();
        $data['nfts'] = $nfts;
        return view('index', $data);
    }

    public function details($id){
        $user = \DB::table("nfts")->where("id", $id)->first();
        $data["nft"] = $user;
        return view("nfts/detail", $data);
    }
}
