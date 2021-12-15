@extends('layouts/app')

@section('content')
<section class="bg-gradient-to-r from-mainblue to-white block overflow-hidden pb-24">

    <x-navigation />
    <div class="flex h-screen justify-center items-center">
        <div class="flex bg-white px-20 py-10 rounded-xl shadow-xl mx-30">

            <div class="text-center max-w-xs">
                <div class="flex justify-center">
                    <img class="w-32" src="{{ asset('./images/logo.png') }}" alt="logo">
                </div>
                <h1 class="font-headers font-semibold text-6xl text-h1">
                    {{ $collection->title }}
                </h1> <br>
                <h3 class="font-headers text-base text-xl z-10">
                    {{ $collection->description }}
                </h3> <br>
                <div class="flex justify-center">
                    <a class="bg-mainblue px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-buttonHover" href="/collections/{{$collection->id}}/edit">Edit</a>
                </div><br>
                <div class="flex justify-center">
                    <a class="bg-red-400 px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-red-600" href="/collections/{{ $collection->id }}/delete">Delete</a>
                </div><br>
            </div>
        </div>

        <div class="flex flex-row flex-wrap h-20">
            @foreach ($nfts as $nft)
                <div class="bg-white m-10 px-20 py-10 rounded-xl shadow-xl">
                    <div class="text-center">
                        <div class="flex justify-center">
                            <img class="w-32" src="{{ asset('storage/' . $nft->picture) }}" alt="logo">
                        </div>
                        <h1 class="font-headers text-base text-xl z-20"><a href="/nfts/{{ $nft->id }}">{{ $nft->name }}</h1>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
