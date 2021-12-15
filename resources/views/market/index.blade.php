<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;400;600&display=swap" rel="stylesheet">
    <title>Market</title>
    @livewireStyles
</head>

<body>
    <x-navigation />
    <livewire:nft-filter :collections="$collections" />

    <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>



    <script src="{{ asset('js/ether.js') }}"></script>
    <script src="{{ asset('js/nav-dropdown.js') }}"></script>
    <script src="{{ asset('js/sliders.js') }}"></script>
    <script src="{{ asset('js/sidebar-market.js') }}"></script>

    @livewireScripts
</body>

</html>