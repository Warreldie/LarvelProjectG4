<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
</head>
<body>
    <div>
        <h1>{{$user->name}}</h1>
        <img src="{{ asset('storage/' .$user->picture) }}" alt="">
    </div>
</body>
</html>