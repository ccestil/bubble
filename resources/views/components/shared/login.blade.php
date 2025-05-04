<div class="container">
    <div class="logo">Bubbleworks</div>
    <p class="welcome-text">Welcome back! Please enter your details</p>
    <form method="POST" action="{{ route('login') }}">
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

        <div class="remember-me-group">
            <label for="remember">
                <input type="checkbox" name="remember"> Remember Me
            </label>
        </div>

        <div class="input-group">
            <button class="login-button" type="submit">Log In</button>
        </div>

        @if (session('status'))
            <div>{{ session('status') }}</div>
        @endif
    </form>
    <a href="#" class="signup-link">Don't have an account? <span style="color: #4299e1;">Sign Up</span></a>
</div>
