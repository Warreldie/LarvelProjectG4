@extends('layouts/app')

@section('content')
<section class="bg-gradient-to-r from-mainblue to-white block overflow-hidden pb-24">

    <x-navigation />
    <h1 class="font-headers m-10 text-center text-6xl text-h1">
        Collections
    </h1>
    <div class="mt-10 font-headers font-extralight text-2xl flex justify-around">
        <a class="rounded bg-white  py-0.5 px-8 text-regular shadow-md" href="{{url('/collections/create')}}">Create Collection</a>
    </div>
    <div class="flex flex-row flex-wrap h-screen">
        @foreach ($collections as $collection)
            <div class="bg-white m-10 px-20 py-10 rounded-xl shadow-xl">
                <div class="text-center">
                    <div class="flex justify-center">
                        <img class="w-32" src="{{ asset('./images/logo.png') }}" alt="logo">
                    </div>
                    <h1 class="font-headers text-base text-xl z-20"><a href="/collections/{{ $collection->id }}">{{ $collection->title }}</h1>
                </div>
            </div>
        @endforeach
    </div>

</section>
@endsection

