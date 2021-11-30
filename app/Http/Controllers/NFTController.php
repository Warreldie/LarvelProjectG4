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
        $nft = \DB::table("nfts")->where("id", $id)->first();
        $data["nft"] = $nft;
        return view("nfts/detail", $data);
    }
    public function create()
    {
        $collections = \DB::table('collections')->get();
        $data['collections'] = $collections;
        return view('nfts/create', $data);
    }
    public function store(Request $request)
    {
        $nft = new Nft();
        $nft->name = $request->input('name');
        $nft->description = $request->input('description');
        
        $destination_path = "public/images/nfts";

        $image = $request->file("picture");

        $image_name = date('m/d/Y h:i:s a') . "pfp_" . $image->getClientOriginalName();
        $path = $request->file("picture")->storeAs($destination_path, $image_name);
        $nft->picture = "images/nfts/" . $image_name;

        $nft->collection_id = $request->input('collection');
        $nft->mint_id = 0;
        $nft->save();
        return redirect('nfts/');
    }
    public function delete(Request $request, $id){
        $nft = NFT::where('id', $id)->firstorfail()->delete();
        return redirect('nfts/');
    }
    public function edit($id){
        $nft = \DB::table("nfts")->where("id", $id)->first();
        $data["nft"] = $nft;
        return view("nfts/edit", $data);
    }
    public function update(Request $request, $id){
        $nft = NFT::find($id);
        $nft->name = $request->input("name");
        $nft->description = $request->input("description");
        $nft->save();
        return redirect("/nfts/$id");
    }

}
