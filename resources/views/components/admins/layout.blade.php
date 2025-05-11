<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bubbleworks Admin</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('styles')


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body style="font-family: 'Inter', sans-serif;">

    <div class="container">
        {{-- Sidebar --}}
        <aside class="sidebar">
            <x-admins.nav-bar />
        </aside>

        {{-- Main content --}}
        <main class="main-content">
            {{-- Topbar --}}
            <div class="topbar">
                <a class="add-btn" href="{{ route('transactions.create') }}">Add
                        Transaction</a>
                {{-- add transaction button, shoudl i use a tag? --}}

                <div class="admin-info">
                    <span>👤</span>
                    <p>Admin</p>
                </div>
            </div>

            {{-- Slot for dashboard or other views --}}
            <div class="page-content">
                {{ $slot }}
            </div>
        </main>
    </div>

</body>

</html>
