<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    
    <h2>Register</h2>
    
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <label for="first_name">First name</label>
        <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Juan" >

        <label for="last_name">Last name</label>
        <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Tamad" >

        <label for="phone">Phone</label>
        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="090956244301" >

        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="juan@example.com" >

        <label for="password">Password</label>
        <input type="password" name="password" value="{{ old('password') }}">

        <input type="submit" value="register">


    </form>

    <h2><a href=""></a></h2>

</body>
</html>