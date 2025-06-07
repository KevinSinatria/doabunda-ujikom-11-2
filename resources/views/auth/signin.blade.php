@extends('layouts.general.app')

@section('title', 'Homepage')
@section('content')
    <section class="h-screen flex justify-center items-center lg:px-20 w-full">
        <form action="{{ route('general.auth.signin') }}" method="post"
            id="signin-form" class="flex bg-[#fff8eb] w-sm sm:w-md md:w-lg lg:w-xl xl:w-2xl rounded-xl shadow-lg flex-col px-6 py-6">
            @csrf
            {{-- Header of form --}}
            <div class="flex flex-col gap-2 justify-center items-center w-full">
                <a href="{{ route('general.home') }}">
                    <img src="{{ asset('favicon.png') }}" alt="logo-doa-bunda" class="w-12 h-12">
                </a>

                <h1 class="text-2xl font-semibold">Sign In ke DoaBunda</h1>
                <p class="text-gray-700">Selamat datang kembali di DoaBunda!</p>
            </div>

            {{-- Main content of form --}}
            <div class="flex flex-col  gap-4 mt-6">
                <input type="email" id="email" name="email" autocomplete="off" placeholder="Email"
                    class="w-full px-4 py-2 rounded-lg bg-white outline-none shadow-lg focus:shadow-none focus:ring-2 focus:ring-[#fcbb23] transition-all duration-300"
                    required minlength="8">
                <small id="email-error"></small>
                <input type="password" id="password" name="password" autocomplete="off" placeholder="Password"
                    class="w-full px-4 py-2 rounded-lg bg-white outline-none shadow-lg focus:shadow-none focus:ring-2 focus:ring-[#FFD369] transition-all duration-300"
                    required>
                <small id="password-error"></small>
            </div>

            {{-- Footer of form --}}
            <div class="flex flex-col gap-4 mt-6">
                <p class="text-sm text-end">Belum punya akun? <a href="{{ route('general.auth.signup') }}"
                        class="text-[#ef9f00] hover:text-[#4d451c] cursor-pointer transition-all duration-300">Sign Up</a>
                </p>
                <button type="submit"
                    class="w-full px-4 py-2 cursor-pointer rounded-lg bg-[#FFAB00] text-white hover:bg-[#FFC107] transition-all duration-300">Sign
                    In
        </form>
    </section>
    @vite(['resources/js/auth/signin-form.js'])
@endsection
