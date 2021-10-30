<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Home</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <!-- <h1>Welcome to our homepage</h1>

    @foreach ($nfts as $nft)
    <div>
        <a href="/nfts/{{ $nft->id }}">{{ $nft->name }}</a>
    </div>
    @endforeach -->

    <nav>
        <div>
            <h1>test</h1>
            <img src="{{ asset('./../images/logo.png') }}" alt="test">
            <div>
                <input type="text"  placeholder="What are you looking for?">
                <button type="submit">
                <img src="{{ asset('./../images/search.png') }}" alt="search">
            </button>
            </div>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Collections</a></li>
                <li><a href="">Market</a></li>
                <li><a href="">login/register</a></li>
            </ul>
            
            
        </div>

    </nav>
</body>
</html>

