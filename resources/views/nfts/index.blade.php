<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFTS</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;400;600&display=swap">
</head>

<body class="bg-gradient-to-r from-mainblue to-white">

    <x-navigation />
    <h1 class="font-headers m-10 text-center text-6xl text-h1">
        NFTS
    </h1>
    <div class="mt-10 font-headers font-extralight text-2xl flex justify-around">
        <a class="rounded bg-white  py-0.5 px-8 text-regular shadow-md" href="{{url('/nfts/create')}}">Create NFT</a>
    </div>
    <div class="flex flex-row flex-wrap h-screen">
        @foreach ($nfts as $nft)
            <div class="bg-white m-10 px-20 py-10 rounded-xl shadow-xl max-h-60">
                <div class="text-center">
                    <div class="flex justify-center">
                        <img class="w-32" src="https://gateway.pinata.cloud/ipfs/{{$nft->picture}}" alt="logo">
                    </div>
                    <h1 class="font-headers text-base text-xl z-20"><a href="/nfts/{{ $nft->id }}">{{ $nft->name }}</h1>
                </div>
            </div>
        @endforeach
    </div>

</body>

</html>
