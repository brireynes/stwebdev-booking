<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Booking System' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        header {
            background: #f4f4f4;
            padding: 16px 24px;
            border-bottom: 1px solid #ddd;
        }

        nav {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        nav a {
            text-decoration: none;
            color: #222;
            font-weight: 600;
        }

        main {
            padding: 24px;
        }

        .page-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            max-width: 400px;
            padding: 10px;
            box-sizing: border-box;
        }

        button,
        .button-link {
            display: inline-block;
            padding: 10px 18px;
            text-decoration: none;
            color: #000;
            border: 1px solid #000;
            background: #fff;
            cursor: pointer;
            margin-right: 10px;
        }

        ul {
            padding-left: 20px;
        }

        .action-group {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            @php
                $navigationType = $navType ?? 'guest';
            @endphp

            @if ($navigationType === 'guest')
                <a href="{{ route('welcome') }}">Welcome</a>
                <a href="{{ route('register') }}">Register</a>
                <a href="{{ route('login.choice') }}">Login</a>
            @elseif ($navigationType === 'user')
                <a href="{{ route('user.home') }}">Home</a>
                <a href="{{ route('booking') }}">Booking</a>
                <a href="{{ route('welcome') }}">Logout</a>
            @elseif ($navigationType === 'admin')
                <a href="{{ route('admin.dashboard') }}">Admin Panel</a>
                <a href="{{ route('welcome') }}">Logout</a>
            @endif
        </nav>
    </header>

    <main>
        <div class="page-container">
            @yield('content')
        </div>
    </main>
</body>
</html>