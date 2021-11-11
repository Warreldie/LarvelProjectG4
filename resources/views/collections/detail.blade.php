<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $collection->title }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;400;600&display=swap">
</head>

<body class="bg-gradient-to-r from-mainblue to-white">

    <x-navigation />
    <div class="flex h-screen justify-center items-center">
        <div class="flex bg-white px-20 py-10 rounded-xl shadow-xl mx-30">

            <div class="text-center max-w-xs">
                <div class="flex justify-center">
                    <img class="w-32" src="{{ asset('./images/logo.png') }}" alt="logo">
                </div>
                <h1 class="font-headers font-semibold text-6xl text-h1">
                    {{ $collection->title }}
                </h1> <br>
                <h3 class="font-headers text-base text-xl z-10">
                    {{ $collection->description }}
                </h3> <br>
                <div class="flex justify-center">
                    <button
                        class="bg-mainblue px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-buttonHover"
                        type="submit">Edit</button>
                </div><br>
                <div class="flex justify-center">
                    <button class="bg-red-400 px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-red-600"
                        type="submit">Delete</button>
                </div><br>
            </div>
        </div>

        <div class="flex flex-row flex-wrap h-20">
            @foreach ($nfts as $nft)
                <div class="bg-white m-10 px-20 py-10 rounded-xl shadow-xl">
                    <div class="text-center">
                        <div class="flex justify-center">
                            <img class="w-32" src="{{ asset('storage/' . $nft->picture) }}" alt="logo">
                        </div>
                        <h1 class="font-headers text-base text-xl z-20"><a href="/nfts/{{ $nft->id }}">{{ $nft->name }}</h1>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
