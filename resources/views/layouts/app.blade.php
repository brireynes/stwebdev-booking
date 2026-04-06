<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Booking System' }}</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            background: #f9f9f9;
        }

        /* NAVBAR */
        header {
            background: #222;
            color: #fff;
            padding: 14px 24px;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-left {
            font-weight: bold;
            font-size: 18px;
        }

        .nav-center {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex: 1;
        }

        .nav-right {
            display: flex;
            gap: 16px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: 600;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .btn-login {
            background: #4CAF50;
            padding: 6px 12px;
            border-radius: 4px;
        }

        .btn-login:hover {
            background: #45a049;
        }

        /* MAIN */
        main {
            padding: 24px;
        }

        .page-container {
            max-width: 100%;
            margin: 0 auto;
        }

        .auth-card {
            max-width: 420px;
            margin: 40px auto;
            padding: 36px 32px;
            background: #ffffff;
            border-radius: 28px;
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.12);
            text-align: center;
        }

        .auth-card h1 {
            margin-bottom: 18px;
            font-size: 2rem;
            color: #1a202c;
        }

        .auth-card p {
            margin-bottom: 28px;
            color: #555;
            line-height: 1.5;
        }

        .action-group {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-top: 12px;
        }

        .button-link,
        .auth-card button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 14px 18px;
            border-radius: 999px;
            border: none;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.98rem;
            transition: transform 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
            cursor: pointer;
        }

        .button-link {
            background: #3f6f4a;
            color: #fff;
        }

        .button-link:hover,
        .auth-card button:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
        }

        .form-group {
            display: flex;
            flex-direction: column;
            align-items: stretch;
            margin-bottom: 18px;
            text-align: left;
        }

        .form-group label {
            margin-bottom: 8px;
            font-size: 0.95rem;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 14px 16px;
            border-radius: 16px;
            border: 1px solid #d1d5db;
            background: #f8fafc;
            font-size: 1rem;
            color: #111827;
        }

        .form-group input:focus {
            outline: none;
            border-color: #3f6f4a;
            box-shadow: 0 0 0 4px rgba(63, 111, 74, 0.12);
        }

        .auth-card button.submit-button {
            background: #3f6f4a;
            color: #fff;
            margin-top: 6px;
        }

        .auth-card .small-link {
            margin-top: 14px;
            color: #4b5563;
            font-size: 0.95rem;
        }

        .auth-card .small-link a {
            color: #3f6f4a;
            text-decoration: none;
            font-weight: 700;
        }

        .auth-card .small-link a:hover {
            text-decoration: underline;
        }

        /* SECTIONS */
        .section {
            width: 100%;
            padding: 60px 30px;
            margin-top: 20px;
            border-radius: 8px;
            color: #fff;
        }

        .section-1 {
            background: #4CAF50;
            min-height: 500px;
        }

        .section-2 {
            background: #2196F3;
            min-height: 500px;
        }

        .section-3 {
            background: #FF5722;
            min-height: 500px;
        }

        /* CARDS (SECTION 2) */
        .cards-container {
            display: flex;
            gap: 20px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .card {
            flex: 1;
            min-width: 200px;
            min-height:500px;
            background: rgba(255, 255, 255, 0.15);
            padding: 25px;
            border-radius: 12px;
            text-decoration: none;
            color: #fff;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        .card:hover {
            transform: translateY(-10px) scale(1.05);
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
        }

        .card h3 {
            margin-bottom: 10px;
        }

        /* FOOTER */
        .footer {
            background: #222;
            color: #fff;
            margin-top: 40px;
            padding: 40px 20px 20px;
        }

        .footer-container {
            max-width: 1000px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .footer-section h3 {
            margin-bottom: 10px;
            border-bottom: 1px solid #555;
            padding-bottom: 5px;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 8px;
        }

        .footer-section a {
            color: #ddd;
            text-decoration: none;
        }

        .footer-section a:hover {
            text-decoration: underline;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 30px;
            border-top: 1px solid #444;
            padding-top: 10px;
            font-size: 14px;
            color: #aaa;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .footer-container {
                grid-template-columns: 1fr;
            }

            .navbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .nav-center {
                justify-content: flex-start;
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<header>
    <nav class="navbar">
        @php
            $navigationType = $navType ?? 'guest';
        @endphp

        <div class="nav-left">
            Booking System
        </div>

        <div class="nav-center">
            @if ($navigationType === 'guest')
                <a href="{{ route('welcome') }}">Home</a>
                <a href="{{ route('booking') }}">Book</a>
                <a href="#">About</a>
            @elseif ($navigationType === 'user')
                <a href="{{ route('user.home') }}">Home</a>
                <a href="{{ route('booking') }}">Booking</a>
            @elseif ($navigationType === 'admin')
                <a href="{{ route('admin.dashboard') }}">Admin Panel</a>
            @endif
        </div>

        <div class="nav-right">
            @if ($navigationType === 'guest')
                <a href="{{ route('login.choice') }}" class="btn-login">Login</a>
            @else
                <a href="{{ route('welcome') }}">Logout</a>
            @endif
        </div>
    </nav>
</header>

<!-- MAIN CONTENT -->
<main>
    <div class="page-container">

        @yield('content')

        {{-- SHOW SECTIONS ONLY IF NOT LOGIN OR REGISTER PAGES --}}
       @php
    $hideSectionsRoutes = [
        'login.choice',
        'register',
        'login',
        'user.login',
        'admin.login',
        'booking',          // ✅ added
        'admin.dashboard',  // ✅ added
        'user.home',        // ✅ added
    ];
@endphp

@if (!request()->routeIs($hideSectionsRoutes))

<section class="section section-1">
    <h2>Banner</h2>
    <p>Placeholder content for section 1.</p>
</section>

<section class="section section-2">
    <h2>Container 2</h2>

    <div class="cards-container">
        <a href="#" class="card">
            <h3>Option 1</h3>
            <p>Click to view details</p>
        </a>

        <a href="#" class="card">
            <h3>Option 2</h3>
            <p>Click to view details</p>
        </a>

        <a href="#" class="card">
            <h3>Option 3</h3>
            <p>Click to view details</p>
        </a>
    </div>
</section>

<section class="section section-3">
    <h2>Book Now!</h2>
    <p>Placeholder content for section 3.</p>
</section>

@endif

    </div>
</main>

<!-- FOOTER -->
<footer class="footer">
    <div class="footer-container">

        <div class="footer-section">
            <h3>EXPLORE</h3>
            <ul>
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">About us</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>LOCATION</h3>
            <p>
                Tawhay Wellness <br>
                Unit 209 University Courtyard <br>
                La Salle Avenue, Villamonte <br>
                Bacolod City, Negros Occidental, Philippines
            </p>
        </div>

        <div class="footer-section">
            <h3>GET IN TOUCH</h3>
            <p>Email:</p>
            <p>Primary: 09505609585</p>
            <p>Landline:</p>
        </div>

    </div>

    <div class="footer-bottom">
        <p>© {{ date('Y') }} Booking System. All rights reserved.</p>
    </div>
</footer>

</body>
</html>