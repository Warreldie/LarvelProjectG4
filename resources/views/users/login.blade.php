@extends('layouts/app')

@section('content')
<section class="bg-gradient-to-r from-mainblue to-white block overflow-hidden pb-24">

  <x-navigation />

  @if (Auth::check())

  <script type="text/javascript">
    window.location.href = "/";
  </script>

  @else



  <div class="flex h-screen justify-center items-center">

    <div class="bg-white px-20 py-10 rounded-xl shadow-xl">




      <div class="text-center">
        <div class="flex justify-center">
          <img class="w-32" src="{{ asset('./images/logo.png') }}" alt="logo">
        </div>
        <p class="text-sm font-headers pb-5 mt-5">don't have an account yet? <a class="text-buttonHover underline" href="{{url('/register')}}">register here</a></p>
      </div>
      @if ($errors->has('email'))
      <div class="text-center text-white bg-red-400 rounded ">
        <p>Email or password incorrect</p>
      </div>

      @endif
      <div>
        <form method="post" action="{{ url('/login') }}">
          @csrf
          <label class="text-1xl font-headers" for="email">Email address:</label><br>
          <input class="w-72 border-2 border-mainblue rounded outline-none  px-2 py-1 mb-5" type="email" id="email" name="email"><br>

          <label class="text-1xl font-headers" for="password">Password:</label><br>
          <input class="w-full border-2 border-mainblue rounded outline-none px-2 py-1 mb-5" type="password" id="password" name="password"><br>
          <div class="flex justify-center">
            <button class="bg-mainblue px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-buttonHover" type="submit">login</button>
          </div>
      </div>
      @endif
    </div>
  </div>
</section>
@endsection