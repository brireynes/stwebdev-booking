<!DOCTYPE html>
<html>
<head>
    <title>Bong's Salon</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

@include('partials.header')

<div class="container">
    @yield('content')
</div>

@include('partials.footer')

</body>
</html>