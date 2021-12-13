<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <div class="flex justify-center">
                    <img class="w-32" src="https://gateway.pinata.cloud/ipfs/{{$nft->picture}}" alt="logo">
                </div>
                <h1 class="font-headers font-semibold text-6xl text-h1">
                    {{ $nft->name }}
                </h1> <br>
                <h3 class="font-headers text-base text-xl z-10">
                    {{ $nft->description }}
                </h3> <br>
                @if($creator == $usersession)
                <div class="flex justify-center" id=" mintbutton">
                    <button class="bg-mainblue px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-buttonHover" type="submit" id="myBtn">Mint</button>
                </div><br>
                <div class="flex justify-center">
                    <a class="bg-mainblue px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-buttonHover" href="/nfts/{{$nft->id}}/edit">Edit</a>
                </div><br>
                <div class="flex justify-center">
                    <a class="bg-red-400 px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-red-600" href="/nfts/{{ $nft->id }}/delete">Delete</a>
                </div><br>
                @else
                <div class="flex justify-center" id="mintdisable">
                    <p>This NFT has not been minted yet</p>
                </div><br>
                @endif
            </div>

            <div class="text-center max-w-xs">
                <h2 class="font-headers font-semibold text-3xl text-h2">
                    Comments:
                </h2>
                <div id="comment-form">
                    <form  method="post" action="{{ url('/nfts/comments/store') }}" enctype="multipart/form-data">
                        <label class="text-base font-headers" for="comment">Comment:</label><br>
                        <textarea class="w-full border-2 border-mainblue rounded outline-none px-2 py-1 mb-5" type="textarea" id="comment" name="comment" required minlength="3"></textarea>
                            <button class="bg-mainblue px-10 py-2 font-headers text-white text-lg rounded-xl hover:bg-buttonHover" type="submit">Add comment</button>
                    </form>
                </div>
                <div id="comments">
                    @foreach ($comments as $comment)
                    <div class="flex justify-center">
                        <p>{{ $comment->comment }}</p>
                    </div><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/nav-dropdown.js') }}"></script>

</body>

</html>