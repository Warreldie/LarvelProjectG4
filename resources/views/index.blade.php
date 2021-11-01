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
<section class="h-40 bg-black">

</section>
<script src="{{ asset('js/nav-dropdown.js') }}"></script>
</body>
</html>

