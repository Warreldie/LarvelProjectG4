<h1>Nfts</h1>

@foreach ($nfts as $nft)
    <div>
        <a href="/nfts/{{ $nft->id }}">{{ $nft->name }}</a>
    </div>
@endforeach