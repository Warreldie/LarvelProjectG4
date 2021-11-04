<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Collection</title>
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;400;600&display=swap">
</head>

<body class="bg-gradient-to-r from-mainblue to-white">

  <x-navigation />
    
  <div class="flex h-screen justify-center items-center">

    <div class="bg-white px-20 py-10 rounded-xl shadow-xl">

      @if (Session::has('message'))
        <div class="bg-green-400 text-center rounded text-white mb-5">
          <p>{{ Session::get('message') }}</p>
          @php
            Session::forget('message');
          @endphp
        </div>
      @endif
      
      <div class="text-center">
        <div class="flex justify-center">
          <img class="w-32" src="{{ asset('./images/logo.png') }}" alt="logo">
        </div>
        <h1 class="font-headers text-base text-xl z-20">Add a new Collection</h1>
      </div>

      @if ($errors->has('nft'))
        <div class="text-center text-white bg-red-400 rounded ">
          <p>Collection already exist</p>
        </div>
      @endif
                  
      <div>
        <form method="post" action="{{ url('/collections/store') }}">
          @csrf
            <label class="text-1xl font-headers" for="title">Titel Collection</label><br>
            <input class="w-72 border-2 border-mainblue rounded outline-none  px-2 py-1 mb-5" type="name" id="title" name="title"><br>

            <label class="text-1xl font-headers" for="description">Description Collection</label><br>
            <textarea class="w-full border-2 border-mainblue rounded outline-none px-2 py-1 mb-5" type="textarea" id="description" name="description"></textarea>

            <div class="flex justify-center">
              <button class="bg-mainblue px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-buttonHover" type="submit">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>