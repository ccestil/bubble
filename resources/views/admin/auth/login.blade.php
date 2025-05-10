<x-shared.layout> {{-- Or you can create a separate admin layout --}}
    <div class="container">
        <div class="logo">Bubbleworks</div>
        <p class="welcome-text">Welcome back!</p>
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <div class="input-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <button type="submit" class="login-button">Admin Log In</button>
            </div>

            @if (session('status'))
                <div>{{ session('status') }}</div>
            @endif
        </form>
        <a href="{{ route('login') }}" class="login-link">Back to Customer Login</a>
    </div>
</x-shared.layout>