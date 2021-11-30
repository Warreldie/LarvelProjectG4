<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add NFT</title>
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
        <h1 class="font-headers text-base text-xl z-20">Add a new NFT</h1>
      </div>

      @if ($errors->has('nft'))
        <div class="text-center text-white bg-red-400 rounded ">
          <p>NFT already exist</p>
        </div>
      @endif
                  
      <div class="text-center">
        <form method="post" action="{{ url('/nfts/store') }}" enctype="multipart/form-data">
          @csrf
            <label class="text-1xl font-headers" for="name">Name NFT</label><br>
            <input class="w-72 border-2 border-mainblue rounded outline-none  px-2 py-1 mb-5" type="name" id="name" name="name"><br>

            <label class="text-1xl font-headers" for="description">Description NFT</label><br>
            <textarea class="w-full border-2 border-mainblue rounded outline-none px-2 py-1 mb-5" type="textarea" id="description" name="description"></textarea>

            <label class="text-1xl font-headers" for="picture">NFT Picture</label><br>
            <input class="w-72 border-2 border-mainblue rounded outline-none  px-2 py-1 mb-5" type="file" name="picture" id="picture"><br>

            <label class="text-1xl font-headers" for="description">Collection</label><br>
            <select class="w-72 border-2 border-mainblue rounded outline-none  px-2 py-1 mb-5" name="collection">
              @foreach ($collections as $collection)
              <option value="{{ $collection->id }}">{{ $collection->title }}</option>
              @endforeach
            </select><br>

            <div class="flex justify-center">
              <button class="bg-mainblue px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-buttonHover" type="submit">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>