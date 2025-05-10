<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Customer Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/customer-home.css') }}">

    @stack('styles')

</head>

<body>

    <div class="navbar">
        <div class="logo">Bubbleworks</div>

        <!-- Hamburger Icon -->

        <div class="nav-links">
            <a href="#">Chris ⚙️</a>
            {{-- make a drop down for log out and edit profile --}}
        </div>
    </div>


    <div class="container">

        {{ $slot }}

    </div>

</body>

</html>
