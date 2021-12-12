@extends('layouts/app')

@section('content')
<section class="bg-gradient-to-r from-mainblue to-white block overflow-hidden pb-24">

    <x-navigation />
    <div class="flex h-screen justify-center items-center">

        <div class="bg-white px-20 py-10 rounded-xl shadow-xl mx-30">
          
          <div class="text-center max-w-xs">
            <div class="flex justify-center">
              <img class="w-32" src="{{ asset('storage/' . $nft->picture) }}" alt="logo">
            </div>
            <h1 class="font-headers font-semibold text-6xl text-h1">
                {{ $nft->name }}
            </h1> <br>
            <h3 class="font-headers text-base text-xl z-10">
                {{ $nft->description }}
            </h3> <br>
            <div class="flex justify-center">
                <button class="bg-mainblue px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-buttonHover" type="submit" id="myBtn">Mint</button>
            </div><br>
            <div class="flex justify-center">
                <a class="bg-mainblue px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-buttonHover" href="/nfts/{{$nft->id}}/edit">Edit</a>
            </div><br>
            <div class="flex justify-center">
                <a class="bg-red-400 px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-red-600" href="/nfts/{{ $nft->id }}/delete">Delete</a>
            </div><br>
          </div>
        </div>
    </div>
</section>
@endsection

