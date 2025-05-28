<header class="sticky top-0 z-50 bg-white shadow border-b border-b-gray-400 h-16">
    <nav class="flex items-center justify-between px-4 py-2">
        {{-- left-side --}}
        <div class="flex gap-4 px-2 items-center">
            <img src="{{ asset('assets/img/logo-doa-bunda.jpg') }}" alt="logo doa bunda" class="rounded-full w-12 h-12 border-2">
            <h1 class="font-bold">DoaBunda</h1>
        </div>

        {{-- center-side --}}
        <div class="flex justify-between gap-4">
            <a href="{{ route('general.home') }}" class="hover:underline">Home</a>
            <div>
                <a href="{{ route('general.products.index') }}" class="hover:underline">Product</a>
            </div>
            <a href="{{ route('general.about') }}" class="hover:underline">About</a>
            <a href="{{ route('general.contact') }}" class="hover:underline">Contact</a>
            @if (Auth::check())
                @if (Auth::user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a>
                @endif
            @endif
        </div>

        {{-- right-side --}}
        @if (Auth::check())
            @if (Auth::user()->role == 'admin')
                <div class="flex px-4">
                    <i class="ph-duotone ph-user-circle"></i>

                </div>
            @elseif (Auth::user()->role == 'customer')
                <div class="flex justify-between gap-4 px-4">
                    <i class="ph ph-heart"></i>
                    <i class="ph-duotone ph-user-circle"></i>
                </div>
            @endif
        @else
            <div class="flex gap-4">
                <a href="{{ route('general.auth.getsignin') }}" class="hover:underline">Login</a>
                <a href="{{ route('general.auth.getsignup') }}" class="hover:underline">Register</a>
            </div>
        @endif
    </nav>
</header>
