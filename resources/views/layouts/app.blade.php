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

        .profile-menu {
            position: relative;
        }

        .profile-toggle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #fff;
            color: #fff;
            background: #4caf50;
            cursor: pointer;
            font-weight: 700;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .profile-toggle:hover {
            background: #45a049;
            transform: translateY(-1px);
        }

        .profile-dropdown {
            position: absolute;
            right: 0;
            top: calc(100% + 12px);
            width: 200px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 14px 30px rgba(0, 0, 0, 0.18);
            overflow: hidden;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: opacity 0.2s ease, visibility 0.2s ease, transform 0.2s ease;
            z-index: 20;
        }

        .profile-dropdown.open {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .profile-dropdown a {
            display: block;
            padding: 14px 18px;
            color: #111827;
            text-decoration: none;
            font-weight: 600;
            border-bottom: 1px solid #f1f5f9;
        }

        .profile-dropdown a:last-child {
            border-bottom: none;
        }

        .profile-dropdown a:hover {
            background: #f8fafc;
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

        .page-header-section {
            padding: 40px 30px;
            background: linear-gradient(135deg, #3f6f4a 0%, #2e5f3b 100%);
            color: #fff;
            border-radius: 20px;
            margin-bottom: 30px;
        }

        .page-header-section h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .page-header-section p {
            color: #e8f4e8;
            max-width: 760px;
            line-height: 1.7;
        }

        .services-grid,
        .package-grid {
            display: grid;
            gap: 24px;
        }

        .services-grid {
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            margin-bottom: 40px;
        }

        .service-card,
        .package-card,
        .promo-card,
        .service-detail-card {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 16px 35px rgba(0, 0, 0, 0.12);
            overflow: hidden;
        }

        .service-card {
            display: flex;
            flex-direction: column;
            min-height: 320px;
        }

        .service-card-image {
            min-height: 160px;
            background: linear-gradient(120deg, #4caf50 0%, #2e7d32 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
            letter-spacing: 0.04em;
        }

        .service-card-body {
            flex: 1;
            padding: 24px;
        }

        .service-card-body h2 {
            margin-bottom: 12px;
            font-size: 1.35rem;
        }

        .service-card-body p {
            margin-bottom: 18px;
            color: #555;
            line-height: 1.7;
        }

        .service-price {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2e7d32;
        }

        .service-card-footer {
            padding: 24px;
            text-align: center;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 999px;
            padding: 12px 24px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 22px rgba(0, 0, 0, 0.15);
        }

        .button-primary {
            background: #4caf50;
            color: #fff;
        }

        .button-secondary {
            background: #e5e7eb;
            color: #111;
        }

        .package-section,
        .promo-section,
        .service-detail-section {
            margin-bottom: 40px;
        }

        .package-section h2,
        .promo-section h2 {
            margin-bottom: 18px;
            font-size: 2rem;
            color: #1f2937;
        }

        .package-grid {
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        }

        .package-card {
            padding: 24px;
        }

        .package-card h3 {
            margin-bottom: 8px;
            font-size: 1.25rem;
        }

        .package-card span {
            display: inline-block;
            margin-bottom: 16px;
            color: #4b5563;
            font-size: 0.95rem;
        }

        .package-card p {
            margin-bottom: 18px;
            color: #4b5563;
            line-height: 1.75;
        }

        .package-price {
            font-size: 1.1rem;
            font-weight: 700;
            color: #111827;
        }

        .promo-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 20px;
        }

        .promo-track-container {
            overflow: hidden;
        }

        .promo-track {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding-bottom: 10px;
        }

        .promo-card {
            padding: 28px 24px;
            min-width: 280px;
            border: 1px solid #e5e7eb;
            background: #fff;
        }

        .promo-card h3 {
            margin-bottom: 12px;
        }

        .promo-card p {
            color: #4b5563;
            line-height: 1.7;
        }

        .promo-controls {
            display: flex;
            gap: 10px;
        }

        .promo-button {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            border: none;
            background: #111827;
            color: #fff;
            font-size: 1.25rem;
            cursor: pointer;
        }

        .service-detail-card {
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 32px;
            padding: 30px;
            align-items: center;
        }

        .service-detail-image {
            min-height: 300px;
            background: linear-gradient(135deg, #4caf50 0%, #81c784 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 800;
            font-size: 1.2rem;
            border-radius: 20px;
        }

        .service-detail-price {
            margin-bottom: 18px;
            font-size: 1.4rem;
            font-weight: 700;
            color: #1f433d;
        }

        .detail-actions {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            margin-top: 24px;
        }

        .empty-state {
            padding: 40px;
            background: #fff;
            border-radius: 24px;
            text-align: center;
        }

        .empty-state h2 {
            margin-bottom: 12px;
        }

        .empty-state p {
            color: #4b5563;
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
            $navigationType = $navType ?? (isset($authUser) && $authUser ? 'user' : 'guest');
        @endphp

        <div class="nav-left">
            Booking System
        </div>

        <div class="nav-center">
            @if ($navigationType === 'guest')
                <a href="{{ route('welcome') }}">Home</a>
                <a href="{{ route('services') }}">Services</a>
                <a href="{{ route('booking') }}">Book</a>
                <a href="#">About</a>
            @elseif ($navigationType === 'user')
                <a href="{{ route('user.home') }}">Home</a>
                <a href="{{ route('services') }}">Services</a>
                <a href="{{ route('booking') }}">Booking</a>
            @elseif ($navigationType === 'admin')
                <a href="{{ route('admin.dashboard') }}">Admin Panel</a>
            @endif
        </div>

        <div class="nav-right">
            @if ($navigationType === 'guest')
                <a href="{{ route('login.choice') }}" class="btn-login">Login</a>
            @elseif ($navigationType === 'user' && isset($authUser))
                <div class="profile-menu">
                    <span class="profile-name">Hi, {{ explode(' ', $authUser->name)[0] }}</span>
                    <button type="button" class="profile-toggle" id="profileToggle">{{ strtoupper(substr($authUser->name, 0, 1)) }}</button>
                    <div class="profile-dropdown" id="profileDropdown">
                        <a href="{{ route('profile.edit') }}">Edit profile</a>
                        <a href="{{ route('profile.password') }}">Change password</a>
                        <a href="{{ route('profile.history') }}">Booking history</a>
                        <a href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
            @else
                <a href="{{ route('welcome') }}">Logout</a>
            @endif
        </div>
    </nav>
</header>

<!-- MAIN CONTENT -->
<main>
    <div class="page-container">

            @if (session('status'))
                <div class="auth-card" style="background: #e6ffed; color: #1f433d; border: 1px solid #bbf7d0; margin-bottom: 20px;">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="auth-card" style="background: #ffe4e6; color: #991b1b; border: 1px solid #fecdd3; margin-bottom: 20px;">
                    <ul style="list-style: none; padding-left: 0; margin: 0;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        {{-- SHOW SECTIONS ONLY IF NOT LOGIN OR REGISTER PAGES --}}
       @php
    $hideSectionsRoutes = [
        'login.choice',
        'register',
        'login',
        'user.login',
        'admin.login',
        'booking',
        'services',
        'service.show',
        'admin.dashboard',
        'user.home',
        'admin.users',
        'admin.bookings',
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('profileToggle');
        const dropdown = document.getElementById('profileDropdown');

        if (toggle && dropdown) {
            toggle.addEventListener('click', function () {
                dropdown.classList.toggle('open');
            });

            document.addEventListener('click', function (event) {
                if (!toggle.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.classList.remove('open');
                }
            });
        }
    });
</script>

</body>
</html>