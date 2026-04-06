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
            background: #f9f9f9;
        }

        /* NAVBAR */
        header {
            background: #222;
            color: #fff;
            padding: 14px 24px;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .nav-left {
            font-weight: bold;
            font-size: 18px;
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

        /* MAIN */
        main {
            padding: 24px;
        }

        .page-container {
            max-width: 100%;
            margin: 0 auto;
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

            nav {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <header>
        <nav>
            @php
                $navigationType = $navType ?? 'guest';
            @endphp

            <div class="nav-left">
                Booking System
            </div>

            <div class="nav-right">
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
            </div>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main>
        <div class="page-container">

            @yield('content')

            {{-- SHOW SECTIONS ONLY IF NOT LOGIN OR REGISTER PAGES --}}
           @unless(
    request()->routeIs('login.choice') ||
    request()->routeIs('register') ||
    request()->routeIs('login') ||
    request()->routeIs('login/user') ||
    request()->routeIs('login/admin')
)
    <section class="section section-1">
        <h2>Container 1</h2>
        <p>Placeholder content for section 1.</p>
    </section>

    <section class="section section-2">
        <h2>Container 2</h2>
        <p>Placeholder content for section 2.</p>
    </section>

    <section class="section section-3">
        <h2>Container 3</h2>
        <p>Placeholder content for section 3.</p>
    </section>
@endunless

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
                    <li><a href="#">About</a></li>
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