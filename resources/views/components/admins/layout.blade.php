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
            <button class="add-btn"><a href="{{ route('transactions.create') }}" style="color: white;">Add Transaction</a></button> 
            {{-- add transaction button, shoudl i use a tag? --}}

            <div class="admin-info">
                <span>👤</span>
                <p>Admin</p>
                <span>▼</span>
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
