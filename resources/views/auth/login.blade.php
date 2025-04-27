<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign in</title>
</head>
<body>

    <h2>Sign In</h2>

    <form action="" method="POST">
        
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="juan@example.com" >

        <label for="password">Password</label>
        <input type="password" name="password" value="{{ old('password') }}">

        <input type="submit" value="login">

    </form>
    
</body>
</html>