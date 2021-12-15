@extends('layouts/app')

@section('content')
<section class="bg-gradient-to-r from-mainblue to-white block overflow-hidden pb-24">

    <x-navigation />
    <div class="flex h-screen justify-center items-center my-20">
        <div class="bg-white px-20 py-5 rounded-xl shadow-xl mx-30">
            <div class="text-center max-w-xs ">
                <div class="flex justify-center">
                    <img style="width:150px;" class="w-32 rounded-lg" src="{{ asset('storage/' . $user->picture) }}" alt="">
                </div><br>
                @if($errors->has('email'))
                <div class="text-center bg-red-400 text-white font-headers rounded px-1">
                    <p>this email address is unvalid or has been used</p>
                </div>
                @endif
                <form method="post" action={{ url("profile/{$user->id}/update") }} enctype="multipart/form-data">
                    @csrf
                    <label class="text-1xl font-headers" for="name">Username</label><br>
                    <input class="w-72 border-2 border-mainblue rounded outline-none  px-2 py-1 mb-5" id="name" name="name" type="text" value="{{ $user->name }}" required><br>

                    <label class="text-1xl font-headers" for="email">Email</label><br>
                    <input class="w-72 border-2 border-mainblue rounded outline-none  px-2 py-1 mb-5" required id="email" name="email" type="email" value="{{ $user->email }}">

                    <label class="text-1xl font-headers" for="description">Description</label>
                    <textarea class="w-72 border-2 border-mainblue rounded outline-none  px-2 py-1 mb-5" required id="description" name="description" rows="4" cols="50">{{ $user->description }}</textarea>

                    <label class="text-1xl font-headers" for="picture">Profile Picture</label>
                    <input class="w-72 border-2 border-mainblue rounded outline-none  px-2 py-1 mb-5" type="file" name="picture" id="picture">
                    <input class="bg-mainblue px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-buttonHover" type="submit" value="Update profile">
                </form><br>
                <div class="flex justify-center">
                    <a class="bg-red-400 px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-red-600" href="/profile/{{ $user->id }}/deletePicture">Delete Picture</a>
                </div><br>
            </div>
        </div>
    </div>
</section>
@endsection
