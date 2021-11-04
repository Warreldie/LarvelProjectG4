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
        $user = \DB::table("collections")->where("id", $id)->first();
        $data["collection"] = $user;
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
}
