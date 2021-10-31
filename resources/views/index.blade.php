<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Home</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;400;600&display=swap" rel="stylesheet">
</head>
<body>

    {{-- @foreach ($nfts as $nft)
    <div>
        <a href="/nfts/{{ $nft->id }}">{{ $nft->name }}</a>
    </div>
    @endforeach --}}

    <nav class="bg-gray font-headers text-base text-xl">
        <div class="max-w-8xl mx-auto border border-red-400 h-20 pt-2">
            <div class="flex justify-between pr-20 pl-20 items-center">
                <div class="flex space-x-32 items-center">
                    <!-- logo -->
                    <div class="flex items-center">
                        <a href="#"> <img  class="w-14 h-14" src="{{ asset('./../images/logo.png') }}" alt="logo"> </a>
                        <span>Sea hackers</span>
                    </div>
                    <!-- search -->
                    <div class="border-2 border-mainblue rounded pl-5 pr-5">
                    <input type="text"  class="outline-none" placeholder="Search..." size="40">
                    <button type="submit" class="">
                        <img class="w-4" src="{{ asset('./../images/search.png') }}" alt="search">
                    </button>
                    </div>
                </div>
                    <!-- navigation -->
                    <div class="flex space-x-5">
                        <a href="">Home</a>
                        <a href="">Collections</a>
                        <a href="">Market</a>
                        @if(Auth::check())
                        <a href=""> <img class="h-6" src="{{ asset('./../images/profile.png') }}" alt="profile"></a>
                        @else
                        <a href="">login/register</a>
                        @endif
                        
                    </div>


            </div>
        </div>

    </nav>
</body>
</html>

