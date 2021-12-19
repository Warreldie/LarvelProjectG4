@extends('layouts/app')

@section('content')
<section class="bg-gradient-to-r from-mainblue to-white block overflow-hidden pb-24">

    <x-navigation />
    <div class="flex h-screen justify-center items-center">

        <div class="bg-white px-20 py-10 rounded-xl shadow-xl mx-30">
          
          <div class="text-center max-w-xs">
            <div class="flex justify-center">
                <img style="width:150px;" class="w-32 rounded-lg" src="{{ asset('storage/' .$user->picture) }}" alt="">
            </div><br>
            <h1 class="font-headers font-semibold text-6xl text-h1">
                {{$user->name}}
            </h1> <br>
            <h3 class="font-headers text-base text-xl z-10">
                {{$user->description}}
            </h3> <br>
            @if (Auth::id() === $user->id)
            <div class="flex justify-center">
                <a class="bg-mainblue px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-buttonHover" href="/profile/{{$user->id}}/edit">Edit</a>
            </div><br>
          </div>
          @endif
        </div>
    </div>
    
    <div class="flex flex-row flex-wrap h-screen">
        @php
         $usersession = Auth::id();   
        @endphp
        @if (isset($usersession))
                @if($user->favorite->user_id ===$usersession )
        @foreach ($user->nfts as $nft)
            <div class="bg-white m-10 px-20 py-10 rounded-xl shadow-xl max-h-60">
                <div class="text-center">
                    <div class="flex justify-center">
                        <img class="w-32" src="https://gateway.pinata.cloud/ipfs/{{$nft->picture}}" alt="logo">
                    </div>
                    <h1 class="font-headers text-base text-xl z-20"><a href="/nfts/{{ $nft->id }}">{{ $nft->name }}</h1>
                </div>
            </div>
        @endforeach
        @endif
        @endif
    </div>
</section>
@endsection