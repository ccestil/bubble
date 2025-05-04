<div class="container">
    <div class="logo">Bubbleworks</div>
    <p class="tagline">Register and try our services now!</p>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <div class="input-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-group">
            <label for="password_confirmation">Repeat Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repeat your password" required>
        </div>
        <div class="terms-group">
            <input type="checkbox" id="terms" name="terms" {{ old('terms') ? 'checked' : '' }} required>
            <label for="terms">Accept Terms and Conditions</label>
            @error('terms')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="create-account-button">Create Account</button>
    </form>
    <a href="{{ route('login') }}" class="login-link">Already have an account? <span style="color: #4299e1;">Log In</span></a>
</div>