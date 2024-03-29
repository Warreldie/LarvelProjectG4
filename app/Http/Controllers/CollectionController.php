<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = \DB::table('collections')->get();
        $data['collections'] = $collections;
        return view('collections/index', $data);
    }
    public function indexpage()
    {
        $collections = \DB::table('collections')->get();
        $data['collections'] = $collections;
        return view('index', $data);
    }
    public function details($id){
        $collections = \DB::table("collections")->where("id", $id)->first();
        $nfts = \DB::table("nfts")->where("collection_id", $id)->get();
        $data["collection"] = $collections;
        $data["nfts"] = $nfts;
        return view("collections/detail", $data);
    }
    public function create()
    {
        return view('collections/create');
    }
    public function store(Request $request)
    {
        $collection = new Collection();
        $collection->title = $request->input('title');
        $collection->description = $request->input('description');
        $collection->save();
        return redirect('collections/');
    }
    public function delete(Request $request, $id){
        $collection = Collection::where('id', $id)->firstorfail()->delete();
        echo ("Collection deleted succesfully");
        return redirect('collections/');
    }
    public function edit($id){
        $nft = \DB::table("collections")->where("id", $id)->first();
        $data["collection"] = $nft;
        return view("collections/edit", $data);
    }
    public function update(Request $request, $id){
        $collection = Collection::find($id);
        $collection->title = $request->input("title");
        $collection->description = $request->input("description");
        $collection->save();
        return redirect("/collections/$id");
    }
}
