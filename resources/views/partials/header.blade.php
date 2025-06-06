@php
    $routeName = Route::currentRouteName();
    $isHome = $routeName === 'general.home';
@endphp
{{-- Homepages only with hover effect if scrollY is lower than 80px --}}
<header id="{{ $isHome ? 'header-home' : 'header-other' }}" x-data="{ open: false }"
    data-aos="fade-down" x-bind:class="open ? 'bg-[#FFEAC5] lg:bg-transparent' : 'backdrop-blur-2xl'"
    class="fixed w-full top-0 {{ $isHome ? 'lg:backdrop-blur-none hover:mx-12 hover:mt-2 hover:w-[93%] hover:rounded-full hover:shadow hover:border hover:border-gray-400 lg:hover:backdrop-blur' : 'lg:backdrop-blur' }} shadow lg:shadow-none border-b lg:border-b-0 border-b-gray-600 z-50 transition-all duration-300 h-16">
    <nav class="flex items-center justify-between px-2 md:px-4">
        {{-- left-side --}}
        <div class="flex gap-2 md:gap-4 px-2 items-center py-2">
            <img src="{{ asset('assets/img/logo-doa-bunda.jpg') }}" alt="logo doa bunda"
                class="rounded-full w-12 h-12 border-2 border-gray-500">
            <a href="{{ route('general.home') }}" class="font-bold text-xl">DoaBunda</a>
        </div>

        {{-- center-side / Desktop Menu --}}
        <div class="hidden justify-between gap-8 lg:flex py-2">
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
                    Products
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
        </div>

        {{-- right-side --}}
        @if (Auth::check())
            <div class="flex px-4 justify-center cursor-pointer items-center h-16" x-data="{ userCircleOpen: false }">
                @if (Auth::user()->role == 'customer')
                    <a title="Wishlists" class="mr-4 relative" href="{{ route('customer.wishlists.index') }}">
                        <i class="ph-duotone ph-heart-straight shadow-lg hover:shadow-none hover:bg-gray-200 transition-all bg-gray-100 p-1 rounded-full text-[28px]"></i>
                        @if (Auth::user()->wishlists->count() > 0)
                            <span
                                class="absolute -top-1 left-6 text-[12px] w-4 h-4 rounded-full animate-bounce bg-red-500 text-white flex justify-center items-center">{{ Auth::user()->wishlists->count() }}</span>
                        @endif
                    </a>
                @endif

                {{-- User dropdown toggle --}}
                <div title="User Info" class="flex items-center gap-2" x-on:click="userCircleOpen = !userCircleOpen">
                    <div class="h-11 w-11 flex justify-center items-center rounded-full bg-gray-100 border">
                        <i class="ph-duotone ph-user-circle text-[48px]"></i>
                    </div>
                    <i class="ph-bold ph-caret-down transition-all bg-gray-100 rounded-full duration-300 border border-gray-600"
                        x-bind:class="userCircleOpen ? 'rotate-180' : ''"></i>
                </div>

                {{-- Only user dropdown --}}
                <div x-show="userCircleOpen" x-transition.origin.top.duration.300
                    class="fixed shadow-xl bg-white top-16 right-0 overflow-hidden flex flex-col items-center w-60 rounded-lg z-1000">
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('filament.admin.pages.dashboard') }}"
                            class="py-3 w-full text-center hover:bg-gray-200 cursor-pointer">
                            <i class="ph-bold ph-house"></i>
                            Dashboard
                        </a>
                    @endif
                    <a href="{{ route('filament.admin.pages.dashboard') }}"
                        class="py-3 w-full text-center hover:bg-gray-200 cursor-pointer">
                        <i class="ph-bold ph-user"></i>
                        User Profile
                    </a>
                    <a href="{{ route('general.auth.signout') }}"
                        class="py-3 w-full text-center hover:bg-gray-200 text-red-500 cursor-pointer">
                        <i class="ph-bold ph-sign-out"></i>
                        Sign Out
                    </a>
                </div>

                {{-- 1024px and lower only hamburger menu --}}
                <label class="hamburger cursor-pointer block lg:hidden">
                    <input type="checkbox" x-model="open" x-on:change="userCircleOpen = false" />
                    <svg viewBox="0 0 32 32">
                        <path class="line line-top-bottom"
                            d="M27 10 13 10C10.8 10 9 8.2 9 6 9 3.5 10.8 2 13 2 15.2 2 17 3.8 17 6L17 26C17 28.2 18.8 30 21 30 23.2 30 25 28.2 25 26 25 23.8 23.2 22 21 22L7 22">
                        </path>
                        <path class="line" d="M7 16 27 16"></path>
                    </svg>
                </label>
            </div>
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

        {{-- Mobile Menu Nav (Hamburger Open) --}}
        <div x-show="open" x-transition.origin.top.duration.300
            class="lg:hidden fixed w-full px-16 top-16 left-0 h-[calc(100vh-4rem)] bg-[#FFEAC5]">
            <div class="flex h-full flex-col gap-8">
                {{-- Top Menu (Medium Screen and Smaller) --}}
                <div
                    class="flex flex-1 flex-col gap-8 items-center justify-center w-full border-b border-b-gray-900 py-12">
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
                </div>
                {{-- Bottom Menu (Small Screen and Smaller only) --}}
                <div class="flex flex-1 md:hidden flex-col gap-8 items-center justify-center w-full h-full py-12">
                    @if (!Auth::check())
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
