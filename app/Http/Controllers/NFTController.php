<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Nft;
use Illuminate\Support\Facades\Http;

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

        if($request->hasFile("picture")){
            $url = $request->file("picture");
            $upload_file_name = strtolower(str_replace(" ", "_", $request->input("name")));
            $response = Http::withHeaders([
                "pinata_api_key" => env("PINATA_API_KEY"), "pinata_secret_api_key" => env("PINATA_SECRET_API_KEY")
            ])->attach("file", file_get_contents($url), $upload_file_name)->post("https://api.pinata.cloud/pinning/pinFileToIPFS", []);

            $data = $response->json();

            if(array_key_exists("IpfsHash", $data)){
                $upload_file_hash = $data["IpfsHash"];
                $size = $data["PinSize"];

                if($size > 0) {
                    $nft->picture = $upload_file_hash;
                }
            }
            
        }
    
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
