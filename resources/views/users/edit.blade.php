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
    <a href="/users/profile/{{$user->id}}">Back to profile</a>
        <form method="post" action={{url("users/profile/{$user->id}/update")}} style="display:flex; flex-direction:column; max-width:400px">
           @csrf
            <img style="width:100px;" src="{{ asset('storage/' .$user->picture) }}" alt="">
            <label for="picture">Profile Picture</label>
            <input type="file" name="picture" id="picture">
            <label for="name">Username</label>
            <input required id="name" name="name" type="text" value="{{$user->name}}">
            <label for="email">Email</label>
            <input required id="email" name="email" type="email" value="{{$user->email}}">
            <label for="description">Description</label>
            <textarea required id="description" name="description" rows="4" cols="50" >{{$user->description}}</textarea>
            <input type="submit" value="Update profile">
        </form>
    </div>
</body>
</html>