<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bubbleworks | Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/customer-home.css') }}">

    @stack('styles')

</head> 

<body>

    <div class="navbar">
        <div class="logo">Bubbleworks</div>

        <div class="nav-links">
            <div class="dropdown">
                <p class="dropdown-toggle"> <img src="{{ asset('images/settings.svg') }}" style="width: 20px; vertical-align: middle; margin-right: 5px;">Settings</p>
                <div class="dropdown-menu">
                    <a href="{{ route('customer.profile.edit') }}">✏️ Account Settings</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-button">🚪 Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        {{ $slot }}
    </div>

</body>

</html>