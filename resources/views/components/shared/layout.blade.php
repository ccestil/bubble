<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Application Layout</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #808080;
            font-family: 'Inter', sans-serif;
        }

        .container {
            background-color: #ffffff;
            border-radius: 20px;
            padding: 30px;
            width: 340px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            color: #4299e1;
            margin-bottom: 15px;
        }

        .tagline, .welcome-text {
            font-size: 16px;
            color: #2d3748;
            margin-bottom: 25px;
            text-align: center;
        }

        .input-group {
            width: 100%;
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            font-size: 14px;
            color: #4a5568;
            margin-bottom: 8px;
        }

        .input-group input {
            width: calc(100% - 30px); /* Increased width by reducing the subtracted value */
            padding: 10px;
            font-size: 16px;
            border: 1px solid #cbd5e0;
            border-radius: 10px;
            height: 44px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
            background-color: #f7fafc;
            margin-left: 15px; /* Increased left margin to maintain centering */
        }

        .input-group input:focus {
            outline: none;
            border-color: #4299e1;
            box-shadow: 0 0 0 2px rgba(66, 153, 225, 0.2);
        }

        .terms-group, .remember-me-group {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .terms-group input[type="checkbox"], .remember-me-group input[type="checkbox"] {
            margin-right: 8px;
            width: 16px;
            height: 16px;
        }

        .terms-group label, .remember-me-group label {
            font-size: 14px;
            color: #4a5568;
        }

        .create-account-button, .login-button {
            width: calc(100% - 30px); /* Increased width by reducing the subtracted value */
            padding: 10px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            background-color: #4299e1;
            border: none;
            border-radius: 10px;
            height: 44px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-left: 15px; /* Increased left margin to maintain centering */
        }

        .create-account-button:hover, .login-button:hover {
            background-color: #3182ce;
        }

        .login-link, .signup-link, .forgot-password {
            margin-top: 15px;
            font-size: 14px;
            color: #4a5568;
            text-decoration: none;
            text-align: center;
            display: block;
        }

        .login-link:hover, .signup-link:hover, .forgot-password:hover {
            color: #4299e1;
            text-decoration: underline;
        }

        .forgot-password {
            margin-bottom: 20px;
            text-align: right;
        }
        .remember-me-group {
            justify-content: left;
        }
    </style>
</head>
<body>

    <main>
        {{ $slot }}
    </main>

</body>
</html>
