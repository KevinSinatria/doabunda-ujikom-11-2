<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DoaBunda - @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('pavicon.png') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.2/src/bold/style.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-poppins overflow-x-hidden">
    @include('partials.header')
    <main>
        @yield('content')
    </main>
    @include('partials.footer')
</body>

<script>
    const header = document.getElementById('header');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 80) {
            header.classList.add('lg:mx-12', 'lg:mt-2', 'lg:w-[93%]', 'lg:rounded-full', 'lg:shadow', 'lg:border', 'lg:border-gray-400', 'lg:backdrop-blur-2xl');
            header.classList.remove('lg:backdrop-blur-none', 'lg:shadow-none', 'hover:mx-12', 'hover:mt-2', 'hover:w-[93%]', 'hover:rounded-full', 'hover:shadow', 'hover:border', 'hover:border-gray-400', 'lg:hover:backdrop-blur');
        } else {
            header.classList.remove('lg:mx-12', 'lg:mt-2', 'lg:w-[93%]', 'lg:rounded-full', 'lg:shadow', 'lg:border', 'lg:border-gray-400', 'lg:backdrop-blur-2xl');
            header.classList.add('lg:backdrop-blur-none', 'lg:shadow-none', 'hover:mx-12', 'hover:mt-2', 'hover:w-[93%]', 'hover:rounded-full', 'hover:shadow', 'hover:border', 'hover:border-gray-400', 'lg:hover:backdrop-blur');
        }
    })
</script>

</html>
