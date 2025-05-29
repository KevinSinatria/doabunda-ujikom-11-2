<header
    class="fixed w-full top-0 backdrop-blur lg:backdrop-blur-none shadow lg:shadow-none border-b lg:border-b-0 border-b-gray-600 z-50 hover:mx-12 hover:mt-2 hover:w-[93%] hover:rounded-full hover:shadow hover:border hover:border-gray-400 lg:hover:backdrop-blur transition-all duration-300 h-16">
    <nav class="flex items-center justify-between px-4 py-2">
        {{-- left-side --}}
        <div class="flex gap-4 px-2 items-center">
            <img src="{{ asset('assets/img/logo-doa-bunda.jpg') }}" alt="logo doa bunda"
                class="rounded-full w-12 h-12 border-2 border-gray-500">
            <h1 class="font-bold text-xl">DoaBunda</h1>
        </div>

        {{-- center-side --}}
        <div class="flex justify-between gap-8">
            @if (request()->routeIs('general.home'))
                <a href="{{ route('general.home') }}" class="relative group cursor-pointer font-medium">
                    Home
                    <span class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-400 z-10"></span>
                </a>
            @else
                <a href="{{ route('general.home') }}" class="relative group cursor-pointer">
                    Home
                    <span
                        class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-600 scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-200 ease-in-out z-10"></span>
                </a>
            @endif

            <div>
                <a href="{{ route('general.products.index') }}" class="relative group cursor-pointer">
                    Product
                    <span
                        class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-600 scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-200 ease-in-out z-10"></span>
                </a>
            </div>

            @if (request()->routeIs('general.about'))
                <a href="{{ route('general.about') }}" class="relative group cursor-pointer text-amber-700 font-medium">
                    About
                    <span class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-400 z-10"></span>
                </a>
            @else
                <a href="{{ route('general.about') }}" class="relative group cursor-pointer">
                    About
                    <span
                        class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-600 scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-200 ease-in-out z-10"></span>
                </a>
            @endif

            @if (request()->routeIs('general.contact'))
                <a href="{{ route('general.contact') }}"
                    class="relative group cursor-pointer text-amber-700 font-medium">
                    Contact
                    <span class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-400 z-10"></span>
                </a>
            @else
                <a href="{{ route('general.contact') }}" class="relative group cursor-pointer">
                    Contact
                    <span
                        class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-600 scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-200 ease-in-out z-10"></span>
                </a>
            @endif

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
            <div class="flex gap-8 justify-center items-center">
                <a href="{{ route('general.auth.getsignin') }}"
                    class="hover:bg-[#FFD369]  px-4 py-2 rounded-xl hover:text-black border shadow text-black lg:text-white active:text-white transition-all">
                    Sign In
                </a>
                <a href="{{ route('general.auth.getsignup') }}"
                    class="bg-[#FFD369]  px-4 py-2 rounded-xl hover:bg-yellow-600 hover:text-white transition-all">Sign
                    Up</a>
            </div>
        @endif
    </nav>
</header>
