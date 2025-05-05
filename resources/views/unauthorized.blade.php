<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unauthorized Access</title>
    <link rel="stylesheet" href="{{ asset('css/unauthorized.css') }}">
</head>
<body>
    <div class="container">
        <h2>Unauthorized Access</h2>
        <p class="lead">You do not have permission to access this page. Please log in.</p>

        <div class="mt-4">
            <a href="{{ route('login') }}" class="btn btn-primary mr-3">Customer Login</a>
            <a href="{{ route('admin.login') }}" class="btn btn-secondary">Admin Login</a>
        </div>
    </div>
</body>
</html>