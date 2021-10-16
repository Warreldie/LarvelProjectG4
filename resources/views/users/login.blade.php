


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>



@if (Auth::check())

<p>lol</p>
<a href="{{ url('/logout') }}"> logout </a>

@else


<form method="post" action="{{ url('/login') }}">
@csrf

  <label for="email">Email adress:</label><br>
  <input type="email" id="email" name="email"><br>

  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"><br>

    <button type="submit">login</button>

@endif
</body>
</html>