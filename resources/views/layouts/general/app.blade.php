<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DoaBunda - @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('pavicon.png') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.2/src/bold/style.css" />

    @vite('resources/css/app.css')
</head>

<body class="font-poppins overflow-x-hidden">
    @include('partials.header')
    <main>
        @yield('content')
    </main>
    @include('partials.footer')
</body>

</html>
