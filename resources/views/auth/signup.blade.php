@extends('layouts.general.app')

@section('title', 'Homepage')
@section('content')
    <section class="min-h-screen flex justify-center items-center pt-12 lg:px-20 w-full">
        <form id="signup-form" action="{{ route('general.auth.signup') }}" method="post"
            class="flex mt-8 bg-[#fff8eb] w-sm sm:w-md md:w-lg lg:w-xl xl:w-2xl rounded-xl shadow-lg flex-col px-6 py-6">
            @csrf
            {{-- Header of form --}}
            <div class="flex flex-col gap-2 justify-center items-center w-full">
                <a href="{{ route('general.home') }}">
                    <img loading="lazy" src="{{ asset('favicon.png') }}" alt="logo-doa-bunda" class="w-12 h-12">
                </a>
                <h1 class="text-2xl font-semibold">Sign Up ke <span
                        class="bg-linear-to-r from-[#FFAB00] to-[#FF6B35] bg-clip-text text-transparent">DoaBunda</span>
                </h1>
                <p class="text-gray-700">Selamat datang di DoaBunda!</p>
            </div>

            {{-- Main content of form --}}
            <div class="flex flex-col  gap-4 mt-6">
                <div class="flex flex-col w-full">
                    <input type="text" id="username" name="username" autocomplete="off" placeholder="Username"
                        class="w-full px-4 py-2 rounded-lg bg-white outline-none shadow-lg focus:shadow-none focus:ring-2 focus:ring-[#fcbb23] transition-all duration-300"
                        required>
                    <small id="username-error"></small>
                </div>
                <div class="flex flex-col w-full">
                    <input type="email" id="email" name="email" autocomplete="off" placeholder="Email"
                        class="w-full px-4 py-2 rounded-lg bg-white outline-none shadow-lg focus:shadow-none focus:ring-2 focus:ring-[#fcbb23] transition-all duration-300"
                        required>
                    <small id="email-error"></small>
                </div>
                <div x-data="{ showPassword: false }" class="relative flex flex-col w-full">
                    <input x-bind:type="showPassword ? 'text' : 'password'" value="" id="password" name="password"
                        autocomplete="off" placeholder="Password"
                        class="w-full px-4 py-2 rounded-lg bg-white outline-none shadow-lg focus:shadow-none focus:ring-2 focus:ring-[#FFD369] transition-all duration-300"
                        required>
                    <i id="show-password" x-on:click="showPassword = !showPassword" x-show="!showPassword"
                        class="ph ph-eye absolute text-[24px] top-0 right-0 hover:bg-gray-300 transition-all bg-gray-200 px-6 py-2 rounded-tr-lg rounded-br-lg cursor-pointer"></i>
                    <i id="hide-password" x-on:click="showPassword = !showPassword" x-show="showPassword"
                        class="ph ph-eye-slash absolute text-[24px] top-0 right-0 hover:bg-gray-300 transition-all bg-gray-200 px-6 py-2 rounded-tr-lg rounded-br-lg cursor-pointer"></i>
                    <small id="password-error"></small>
                </div>
                <div x-data="{ showConfirmPassword: false }" class="relative flex flex-col w-full">
                    <input x-bind:type="showConfirmPassword ? 'text' : 'password'" id="password-confirmation"
                        name="password_confirmation" autocomplete="off" placeholder="Konfirmasi Password"
                        class="w-full px-4 py-2 rounded-lg bg-white outline-none shadow-lg focus:shadow-none focus:ring-2 focus:ring-[#FFD369] transition-all duration-300"
                        required>
                    <i id="show-password-confirmation" x-on:click="showConfirmPassword = !showConfirmPassword"
                        x-show="!showConfirmPassword"
                        class="ph ph-eye absolute text-[24px] top-0 right-0 hover:bg-gray-300 transition-all bg-gray-200 px-6 py-2 rounded-tr-lg rounded-br-lg cursor-pointer"></i>
                    <i id="hide-password-confirmation" x-on:click="showConfirmPassword = !showConfirmPassword"
                        x-show="showConfirmPassword"
                        class="ph ph-eye-slash absolute text-[24px] top-0 right-0 hover:bg-gray-300 transition-all bg-gray-200 px-6 py-2 rounded-tr-lg rounded-br-lg cursor-pointer"></i>
                    <small id="password-confirmation-error"></small>
                </div>
            </div>

            {{-- Footer of form --}}
            <div class="flex flex-col gap-4 mt-6">
                <p class="text-sm text-end">Sudah punya akun? <a href="{{ route('general.auth.signin') }}"
                        class="text-[#ef9f00] hover:text-[#4d451c] transition-all cursor-pointer duration-300">Sign In</a>
                </p>
                <button type="submit"
                    class="w-full px-4 py-2 rounded-lg cursor-pointer bg-[#FFAB00] text-white hover:bg-[#FFC107] transition-all duration-300">Sign
                    Up
        </form>
    </section>

    @vite('resources/js/auth/signup-form.js')
@endsection
