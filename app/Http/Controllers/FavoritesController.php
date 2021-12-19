<?php

namespace App\Http\Controllers;

use \App\Models\Nft;
use \App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { {
            $favorite = $request->input('nft-id');
            $favorite = new Favorite();
            $favorite->nft_id = $request->input('nft-id');
            $favorite->user_id = Auth::id();;
            $favorite->save();
            return redirect("nfts/" . $request->input('nft-id'));
        }
    }


    public function destroy(Request $request)
    {
        $favorites = \DB::table("favorites")->where('user_id', Auth::id())->where('nft_id', $request->input('nft-id'))->delete();
        return redirect("nfts/" . $request->input('nft-id'));
    }
}
