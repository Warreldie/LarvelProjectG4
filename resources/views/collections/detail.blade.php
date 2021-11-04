<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$collection->title}}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;400;600&display=swap">
</head>

<body class="bg-gradient-to-r from-mainblue to-white">

    <x-navigation />
    <div class="flex">
        <div class="mt-40 ml-32">
            <h1 class="font-headers font-semibold text-6xl text-h1">
                {{$collection->title}}
            </h1>
            <h3 class="text-h3 font-headers font-regular text-3xl mt-4">
                {{$collection->description}}
            </h3>
        </div>
    </div>
</body>

</html>