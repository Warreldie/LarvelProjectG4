@extends('layouts/app')

@section('content')
<section class="bg-gradient-to-r from-mainblue to-white block overflow-hidden pb-24">
    <x-navigation />
    <div class="flex h-screen justify-center items-center">

        <div class="text-center bg-white px-20 py-10 rounded-xl shadow-xl mx-30">
            <div class="flex justify-center">
                <img class="w-32" src="{{ asset('./images/logo.png') }}" alt="logo">
            </div>

            <div>
                <form method="post" action={{ url("/collections/{$collection->id}/update") }}>
                    @csrf
                    <label class="text-1xl font-headers" for="title">Title Collection</label><br>
                    <input class="w-72 border-2 border-mainblue rounded outline-none  px-2 py-1 mb-5" type="name" id="title" name="title" value="{{ $collection->title }}"><br>

                    <label class="text-1xl font-headers" for="description">Description Collection</label><br>
                    <textarea class="w-full border-2 border-mainblue rounded outline-none px-2 py-1 mb-5" type="textarea" id="description" name="description" rows="6">{{ $collection->description }}</textarea>

                    <div class="flex justify-center">
                        <button class="bg-mainblue px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-buttonHover" type="submit">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

