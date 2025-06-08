<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DoaBunda - @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.2/src/bold/style.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-poppins overflow-x-hidden">
    <div id="swup" class="transition-main">
        @include('sweetalert2::index')
        @include('partials.header')
        <main class="bg-[#FFEAC5]">
            @yield('content')
        </main>
        @include('partials.footer')
        @if (session('show_toast'))
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    @php
                        $toast = session('show_toast');
                    @endphp
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        width: 'auto',
                        showConfirmButton: false,
                        timer: {{ $toast['duration'] ?? 3000 }},
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: '{{ $toast['type'] }}',
                        title: '{{ $toast['title'] }}'
                    })
                })
            </script>
        @endif
    </div>
    <div class="overlay transition-overlay"></div>
</body>


</html>
