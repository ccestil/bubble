<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>

    <div>
        <h1>Login to your Account</h1>
        <p>Welcome back, please enter your details</p>
        
        <form action="{{ route('customer.index') }}">
            
            <label for="email">Email Address</label>
            <input type="email" name="email" id="">

            <label for="password">Password</label>
            <input type="password">

            <a href="">Forgot Password?</a>
            <input type="submit" value="Login">
        </form>

            <p>Don't have an account? <a href="{{ route('users.register') }}">Sign Up</a></p>
        <label for=""></label>
    </div>
    
</body>
</html>