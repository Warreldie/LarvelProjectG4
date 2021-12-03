<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;400;600&display=swap">
</head>

<body class="bg-gradient-to-r from-mainblue to-white">

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
</body>

</html>