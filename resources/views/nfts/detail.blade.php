@extends('layouts/app')

@section('content')
<section class="bg-gradient-to-r from-mainblue to-white block overflow-hidden pb-24">
    @php
    $creator = $nft->Creator_id;
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
                @if($nft->forsale)
                <h3 class="font-headers text-base text-xl z-10">
                    {{ $nft->price }} ETH
                </h3> <br>
                @endif
                @if($creator == $usersession && $nft->Owner_id == $usersession)
                @if($nft->forsale == false)
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
                    <p> You minted your NFT and its now for sale</p>
                </div><br>
                @endif
                @elseif($usersession == $nft->Owner_id)
                @if($nft->forsale == false)
                <div id="nft--not-forsale">
                    <label for="price">Price in ETH</label>
                    <div class="border-2 border-mainblue rounded pl-5 pr-5 pt-1 filter shadow-md">
                        <input id="nft--price" name="price" type="number" class="outline-none w-full" placeholder="Price">
                    </div>
                    <br>
                    <div class="flex justify-center" id=" mintbutton">
                        <button class="bg-mainblue px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-buttonHover" type="submit" id="button--sell">Sell</button>
                    </div><br>
                    @else
                    <div class="flex justify-center" id="mintdisable">
                        <p>You put this NFT for sale</p>
                    </div><br>
                </div>
                @endif
                @else
                @if($nft->forsale == false)
                <div class="flex justify-center" id="mintdisable">
                    <p>This nft is not for sale!</p>
                </div><br>
                @else

                <div class="flex justify-center" id=" mintbutton">
                    <button class="bg-mainblue px-20 py-2 font-headers text-white text-2xl rounded-xl hover:bg-buttonHover" type="submit" id="button--buy">Buy</button>
                </div><br>
                @endif
                @endif
            </div>

            <div class="text-center max-w-xs">
                <h2 class="font-headers font-semibold text-3xl text-h2">
                    Comments:
                </h2>
                @if(isset($usersession))
                <div id="comment-form">
                    <form method="post" action="{{ url('/nfts/comments/store'), $nft->id }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="nft-id" value="{{ $nft->id }}">
                        <label class="text-base font-headers" for="comment">Comment:</label><br>
                        <textarea class="w-full border-2 border-mainblue rounded outline-none px-2 py-1 mb-5" type="textarea" id="comment" name="comment" required minlength="3"></textarea>
                        <button class="bg-mainblue px-10 py-2 font-headers text-white text-lg rounded-xl hover:bg-buttonHover" type="submit">Add comment</button>
                    </form>
                </div>
                @endif
                <div id="comments">
                    @foreach ($nft->comments as $comment)
                    <div class="flex justify-center">
                        <p>{{ $comment->text }}</p>
                    </div><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<input type="hidden" id="nft--hash" value="{{$nft->picture}}">
<input type="hidden" id="nft--id" value="{{$nft->id}}">
<input type="hidden" id="nft--token" value="{{$nft->token_id}}">
<input type="hidden" id="nft--setprice" value="{{$nft->price}}">
</div>
</div>
<script src="{{ asset('js/nav-dropdown.js') }}"></script>
<script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>
<script src="{{ asset('js/ether.js') }}" defer></script>
</body>