<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $nft->name }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;400;600&display=swap">
</head>

<body class="bg-gradient-to-r from-mainblue to-white">
    @php
    $creator = $nft->Creator_id ;
    $usersession = Auth::id();
    @endphp
    <x-navigation />
    <div class="flex h-screen justify-center items-center">

        <div class="bg-white px-20 py-10 rounded-xl shadow-xl mx-30">
            <div class="text-center max-w-xs">
                <div id="nft-error" class="text-center bg-red-400 text-white font-headers rounded px-1 hidden">
                    <p id="nft-error-msg"></p>
                </div><br>
                <div id="nft-success" class="text-center bg-green-400 text-white font-headers rounded px-1 hidden">
                    <p id="nft-success-msg"></p>
                </div><br>
                <div class="flex justify-center">
                    <img class="w-32" src="https://gateway.pinata.cloud/ipfs/{{$nft->picture}}" alt="logo">
                </div>
                <h1 class="font-headers font-semibold text-6xl text-h1">
                    {{ $nft->name }}
                </h1> <br>
                <h3 class="font-headers text-base text-xl z-10">
                    {{ $nft->description }}
                </h3> <br>
                @if($creator == $usersession && $nft->token_id == "")
                <div id="nft--not-minted">
                    <label for="price">Price in ETH</label>
                    <div class="border-2 border-mainblue rounded pl-5 pr-5 pt-1 filter shadow-md">
                        <input id="nft--price" name="price" type="number" class="outline-none w-full" placeholder="Price">
                    </div>
                    <br>
                    <div class="flex justify-center" id=" mintbutton">
                        <button class="bg-mainblue px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-buttonHover" type="submit" id="button--mint">Mint</button>
                    </div><br>
                    <div class="flex justify-center">
                        <a class="bg-mainblue px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-buttonHover" href="/nfts/{{$nft->id}}/edit">Edit</a>
                    </div><br>
                    <div class="flex justify-center">
                        <a class="bg-red-400 px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-red-600" href="/nfts/{{ $nft->id }}/delete">Delete</a>
                    </div><br>
                </div>
                @else
                <div class="flex justify-center" id="mintdisable">
                    <p>This NFT has not been minted yet</p>
                </div><br>
                @endif
            </div>
            <input type="hidden" id="nft--hash" value="{{$nft->picture}}">
            <input type="hidden" id="nft--id" value="{{$nft->id}}">
        </div>
    </div>
    <script src="{{ asset('js/nav-dropdown.js') }}"></script>
    <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>
    <script src="{{ asset('js/ether.js') }}" defer></script>
</body>

</html>