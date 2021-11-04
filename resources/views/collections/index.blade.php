<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collections</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;400;600&display=swap">
</head>

<body class="bg-gradient-to-r from-mainblue to-white">

    <x-navigation />
    <h1 class="font-headers m-10 text-center text-6xl text-h1">
        Collections
    </h1>
    <div class="mt-10 font-headers font-extralight text-2xl flex justify-around">
        <a class="rounded bg-white  py-0.5 px-8 text-regular shadow-md" href="{{url('/collections/create')}}">Create Collection</a>
    </div>
    <div class="flex flex-row flex-wrap h-screen">
        @foreach ($collections as $collection)
            <div class="bg-white m-10 px-20 py-10 rounded-xl shadow-xl">
                <div class="text-center">
                    <div class="flex justify-center">
                        <img class="w-32" src="{{ asset('./images/logo.png') }}" alt="logo">
                    </div>
                    <h1 class="font-headers text-base text-xl z-20"><a href="/collections/{{ $collection->id }}">{{ $collection->title }}</h1>
                </div>
            </div>
        @endforeach
    </div>

</body>

</html>
