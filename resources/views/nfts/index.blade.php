@extends('layouts/app')

@section('content')

<section class="bg-gradient-to-r from-mainblue to-white block overflow-hidden pb-24">

    <x-navigation />
    <h1 class="font-headers m-10 text-center text-6xl text-h1">
        NFTS
    </h1>
    <div class="mt-10 font-headers font-extralight text-2xl flex justify-around">
        <a class="rounded bg-white  py-0.5 px-8 text-regular shadow-md" href="{{url('/nfts/create')}}">Create NFT</a>
    </div>
    <div class="flex flex-row flex-wrap h-screen">
        @foreach ($nfts as $nft)
            <div class="bg-white m-10 px-20 py-10 rounded-xl shadow-xl max-h-60">
                <div class="text-center">
                    <div class="flex justify-center">
                        <img class="w-32" src="https://gateway.pinata.cloud/ipfs/{{$nft->picture}}" alt="logo">
                    </div>
                    <h1 class="font-headers text-base text-xl z-20"><a href="/nfts/{{ $nft->id }}">{{ $nft->name }}</h1>
                </div>
            </div>
        @endforeach
    </div>

</section>

@endsection

