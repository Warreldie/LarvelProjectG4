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

<x-navigation/>
<section class="bg-home bg-cover pb-40">
    <!-- left side -->
    <div class="flex">
        <div class="mt-40 ml-32">
        <h1 class="font-headers font-semibold text-6xl text-h1">
            Together we can <br>
            help our seas recover
        </h1>
        <h3 class="text-h3 font-headers font-regular text-3xl mt-4">
            collect and trade
        </h3>
        <div class="mt-10 font-headers font-extralight text-2xl flex justify-around">
            <a class="rounded bg-white  py-0.5 px-8 text-regular shadow-md" href="">More info</a>
            <a class="rounded bg-white  py-0.5 px-8 text-regular shadow-md" href="">Register</a>
        </div>
        </div>


    </div>
    <!-- right side -->
    <div class="flex">

    </div>
</section>
<section class="flex justify-center">
    <div class="mt-10">
        <h2 class="font-headers font-semibold text-4xl">Featured</h2>
    </div>

</section>
<script src="{{ asset('js/nav-dropdown.js') }}"></script>
</body>
</html>

