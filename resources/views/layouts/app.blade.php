<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', config('app.name'))</title>

    {{-- Fonts from Stitch --}}
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;700&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    {{-- Tailwind from Stitch --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f2ca50",
                        "primary-container": "#d4af37",
                        "on-primary": "#3c2f00",
                        "on-surface": "#e4e1e7",
                        "on-surface-variant": "#d0c5af",
                        "surface": "#131317",
                        "surface-container": "#1f1f23",
                        "surface-container-high": "#2a292e",
                        "outline-variant": "#4d4635",
                        "outline": "#99907c",
                        "background": "#131317",
                    },
                    fontFamily: {
                        "headline": ["Noto Serif"],
                        "body": ["Manrope"],
                        "label": ["Manrope"],
                    },
                },
            },
        }
    </script>

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }
    </style>

    @stack('styles')
</head>
<body class="text-on-surface font-body selection:bg-primary-container selection:text-on-primary-container min-h-screen">

    {{-- Stitch Header Partial --}}
    @include('partials.header')

    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>