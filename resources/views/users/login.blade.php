<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-mainblue to-white">

<x-navigation/>

@if (Auth::check())

<p>lol</p>
<a href="{{ url('/logout') }}"> logout </a>

@else



<div class="flex h-screen justify-center items-center">

  <div class="bg-white px-20 py-10 rounded-xl shadow-xl">
  @if(Session::has('message'))
  <div class="bg-green-400 text-center rounded text-white mb-5">
    <p>
    {{Session::get('message')}}
    </p>

    @php
    Session::forget('message');
    @endphp
    
  </div>
  @endif

  <div class="text-center">
    <div class="flex justify-center">
    <img class="w-32" src="{{ asset('./images/logo.png') }}" alt="logo">
    </div>
  <p class="text-sm font-headers pb-5 mt-5">don't have an account yet? <a class="text-buttonHover underline" href="{{url('/register')}}">register here</a></p>
  </div>
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







</body>
</html>