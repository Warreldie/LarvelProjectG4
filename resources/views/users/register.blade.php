<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;400;600&display=swap" rel="stylesheet">
    <title>Register</title>
</head>
<body class="bg-gradient-to-r from-mainblue to-white">
<x-navigation/>


<div class="flex h-screen justify-center items-center relative">
  <div class="bg-white px-20 py-10 rounded-xl shadow-xl">
  <div class="text-center">
    <div class="flex justify-center">
    <img class="w-32" src="{{ asset('./images/logo.png') }}" alt="logo">
    </div>
  <p class="text-sm font-headers pb-5 mt-5">already have an account? <a class="text-buttonHover underline" href="{{url('/login')}}">login here</a></p>
  </div>
  
  @if($errors->has('fname'))
      <div class="text-center bg-red-400 text-white font-headers rounded px-1">
        <p>Firstname is required</p>
    </div>
  @endif
  @if($errors->has('lname'))
      <div class="text-center bg-red-400 text-white font-headers rounded px-1">
        <p>Lastname is required</p>
    </div>
  @endif
  @if($errors->has('email'))
      <div class="text-center bg-red-400 text-white font-headers rounded px-1">
        <p>this email address is unvalid or has been used</p>
    </div>
  @endif
  @if($errors->has('password'))
      <div class="text-center bg-red-400 text-white font-headers rounded px-1 w-72">
        <p>Password is required with a minimum of 6 characters,
            Should have at least 1 lowercase, 1 uppercase, 1 number AND 1 symbol</p>
    </div>
  @endif
  


  <div>
  <form method="post" action="{{ url('/register') }}">
@csrf
<label class="text-1xl font-headers" for="fname">First name:</label><br>
  <input class="w-72 border-2 border-mainblue rounded outline-none  px-2 py-1 mb-2" type="text" id="fname" name="fname"><br>
 

  <label class="text-1xl font-headers" for="lname">Last name:</label><br>
  <input class="w-72 border-2 border-mainblue rounded outline-none  px-2 py-1 mb-2" type="text" id="lname" name="lname"><br>

  <label class="text-1xl font-headers" for="email">Email address:</label><br>
  <input class="w-72 border-2 border-mainblue rounded outline-none  px-2 py-1 mb-2" type="email" id="email" name="email"><br>

  <label class="text-1xl font-headers" for="password">Password:</label><br>
  <input  class="w-72 border-2 border-mainblue rounded outline-none  px-2 py-1 mb-2"type="password" id="password" name="password"><br>
  <div class="flex justify-center">
  <button class="bg-mainblue px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-buttonHover" type="submit">Register</button>

  </div>
  </div>

  </div>
</div>





</form>
</body>
</html>