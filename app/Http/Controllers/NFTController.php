<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Nft;

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
    public function create()
    {
        return view('nfts/create');
    }
    public function store(Request $request)
    {
        $nft = new Nft();
        $nft->name = $request->input('name');
        $nft->description = $request->input('description');
        $nft->collection_id = $request->input('collection');
        $nft->save();
        return redirect('nfts/');
    }
}
