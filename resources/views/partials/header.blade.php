<header id="header" x-data="{ open: false }" x-bind:class="open ? 'bg-[#FFEAC5] lg:bg-transparent' : 'backdrop-blur'"
    class="fixed w-full top-0 lg:backdrop-blur-none shadow lg:shadow-none border-b lg:border-b-0 border-b-gray-600 z-50 hover:mx-12 hover:mt-2 hover:w-[93%] hover:rounded-full hover:shadow hover:border hover:border-gray-400 lg:hover:backdrop-blur transition-all duration-300 h-16">
    <nav class="flex items-center justify-between px-4 py-2">
        {{-- left-side --}}
        <div class="flex gap-4 px-2 items-center">
            <img src="{{ asset('assets/img/logo-doa-bunda.jpg') }}" alt="logo doa bunda"
                class="rounded-full w-12 h-12 border-2 border-gray-500">
            <h1 class="font-bold text-xl">DoaBunda</h1>
        </div>

        {{-- center-side / Desktop Menu --}}
        <div class="hidden justify-between gap-8 lg:flex">
            @if (request()->routeIs('general.home'))
                <a href="{{ route('general.home') }}" class="relative group cursor-pointer font-medium">
                    Home
                    <span class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-800 z-10"></span>
                </a>
            @else
                <a href="{{ route('general.home') }}" class="relative group cursor-pointer">
                    Home
                    <span
                        class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-800 scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-200 ease-in-out z-10"></span>
                </a>
            @endif

            <div>
                <a href="{{ route('general.products.index') }}" class="relative group cursor-pointer">
                    Product
                    <span
                        class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-800 scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-200 ease-in-out z-10"></span>
                </a>
            </div>

            @if (request()->routeIs('general.about'))
                <a href="{{ route('general.about') }}" class="relative group cursor-pointer text-amber-700 font-medium">
                    About
                    <span class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-800 z-10"></span>
                </a>
            @else
                <a href="{{ route('general.about') }}" class="relative group cursor-pointer">
                    About
                    <span
                        class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-800 scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-200 ease-in-out z-10"></span>
                </a>
            @endif

            @if (request()->routeIs('general.contact'))
                <a href="{{ route('general.contact') }}"
                    class="relative group cursor-pointer text-amber-700 font-medium">
                    Contact
                    <span class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-800 z-10"></span>
                </a>
            @else
                <a href="{{ route('general.contact') }}" class="relative group cursor-pointer">
                    Contact
                    <span
                        class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-800 scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-200 ease-in-out z-10"></span>
                </a>
            @endif

            @if (Auth::check())
                @if (Auth::user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="relative text-xl group cursor-pointer">
                        Dashboard
                        <span
                            class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-800 scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-200 ease-in-out z-10"></span>
                    </a>
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
                    class="whitespace-nowrap bg-gray-300 hidden md:block  px-4 py-2 rounded-xl hover:text-black border border-black lg:border-gray-400 shadow text-black lg:text-[#574723] active:text-white transition-all">
                    Sign In
                </a>
                <a href="{{ route('general.auth.getsignup') }}"
                    class="bg-[#FFD369] whitespace-nowrap hidden md:block  px-4 py-2 rounded-xl hover:bg-yellow-600 hover:text-white transition-all">Sign
                    Up</a>
                <label class="hamburger cursor-pointer block lg:hidden">
                    <input type="checkbox" x-model="open" />
                    <svg viewBox="0 0 32 32">
                        <path class="line line-top-bottom"
                            d="M27 10 13 10C10.8 10 9 8.2 9 6 9 3.5 10.8 2 13 2 15.2 2 17 3.8 17 6L17 26C17 28.2 18.8 30 21 30 23.2 30 25 28.2 25 26 25 23.8 23.2 22 21 22L7 22">
                        </path>
                        <path class="line" d="M7 16 27 16"></path>
                    </svg>
                </label>
            </div>
        @endif

        {{-- Mobile Menu --}}
        <div x-show="open" x-transition.origin.top.duration.300
            class="lg:hidden fixed w-full px-16 top-16 left-0 h-[calc(100vh-4rem)] bg-[#FFEAC5]">
            <div class="flex h-full flex-col gap-8">
                {{-- Top Menu (Medium Screen and Smaller) --}}
                <div class="flex flex-1 flex-col gap-8 items-center justify-center w-full border-b border-b-gray-900 py-12">
                    @if (request()->routeIs('general.home'))
                        <a href="{{ route('general.home') }}"
                            class="relative group text-xl cursor-pointer font-medium">
                            Home
                            <span class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-800 z-10"></span>
                        </a>
                    @else
                        <a href="{{ route('general.home') }}" class="relative text-xl group cursor-pointer">
                            Home
                            <span
                                class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-800 scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-200 ease-in-out z-10"></span>
                        </a>
                    @endif

                    <div>
                        <a href="{{ route('general.products.index') }}" class="relative text-xl group cursor-pointer">
                            Product
                            <span
                                class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-800 scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-200 ease-in-out z-10"></span>
                        </a>
                    </div>

                    @if (request()->routeIs('general.about'))
                        <a href="{{ route('general.about') }}"
                            class="relative group cursor-pointer text-amber-700 text-xl font-medium">
                            About
                            <span class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-800 z-10"></span>
                        </a>
                    @else
                        <a href="{{ route('general.about') }}" class="relative text-xl group cursor-pointer">
                            About
                            <span
                                class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-800 scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-200 ease-in-out z-10"></span>
                        </a>
                    @endif

                    @if (request()->routeIs('general.contact'))
                        <a href="{{ route('general.contact') }}"
                            class="relative group cursor-pointer text-amber-700  text-xl font-medium">
                            Contact
                            <span class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-800 z-10"></span>
                        </a>
                    @else
                        <a href="{{ route('general.contact') }}" class="relative text-xl group cursor-pointer">
                            Contact
                            <span
                                class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-800 scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-200 ease-in-out z-10"></span>
                        </a>
                    @endif

                    @if (Auth::check())
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="relative text-xl group cursor-pointer">
                                Dashboard
                                <span
                                    class="absolute bottom-[1px] left-0 w-full h-[1px] bg-gray-800 scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-200 ease-in-out z-10"></span>
                            </a>
                        @endif
                    @endif
                </div>
                {{-- Bottom Menu (Small Screen and Smaller only) --}}
                <div class="flex flex-1 md:hidden flex-col gap-8 items-center justify-center w-full h-full py-12">
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
                        <div class="flex flex-col gap-8 justify-center items-center">
                            <a href="{{ route('general.auth.getsignin') }}"
                                class="hover:bg-[#FFD369] whitespace-nowrap px-32 py-2 rounded-xl hover:text-black border border-black lg:border-gray-400 shadow text-black lg:text-white active:text-white transition-all">
                                Sign In
                            </a>
                            <a href="{{ route('general.auth.getsignup') }}"
                                class="bg-[#FFD369] whitespace-nowrap px-32 py-2 rounded-xl hover:bg-yellow-600 hover:text-white transition-all">Sign
                                Up</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
