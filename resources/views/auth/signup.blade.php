@extends('layouts.general.app')

@section('title', 'Homepage')
@section('content')
    <section class="h-screen flex justify-center items-center lg:px-20 w-full">
        <form action="{{ route('general.auth.signup') }}" method="post"
            class="flex bg-[#fff8eb] w-sm sm:w-md md:w-lg lg:w-xl xl:w-2xl rounded-xl shadow-lg flex-col px-6 py-6">
            @csrf
            {{-- Header of form --}}
            <div class="flex justify-center items-center w-full">
                <h1 class="uppercase text-xl font-semibold">Sign Up</h1>
            </div>

            {{-- Main content of form --}}
            <div class="flex flex-col  gap-4 mt-6">
                <input type="text" id="username" name="username" autocomplete="off" placeholder="Username"
                    class="w-full px-4 py-2 rounded-lg bg-white outline-none shadow-lg focus:shadow-none focus:ring-2 focus:ring-[#fcbb23] transition-all duration-300">
                <input type="email" id="email" name="email" autocomplete="off" placeholder="Email"
                    class="w-full px-4 py-2 rounded-lg bg-white outline-none shadow-lg focus:shadow-none focus:ring-2 focus:ring-[#fcbb23] transition-all duration-300">
                <input type="password" id="password" name="password" autocomplete="off" placeholder="Password"
                    class="w-full px-4 py-2 rounded-lg bg-white outline-none shadow-lg focus:shadow-none focus:ring-2 focus:ring-[#FFD369] transition-all duration-300">
            </div>

            {{-- Footer of form --}}
            <div class="flex flex-col gap-4 mt-6">
                <p class="text-sm text-end">Sudah punya akun? <a href="{{ route('general.auth.signin') }}"
                        class="text-[#ef9f00] hover:text-[#4d451c] transition-all duration-300">Sign In</a></p>
                <button type="submit"
                    class="w-full px-4 py-2 rounded-lg bg-[#FFAB00] text-white hover:bg-[#FFC107] transition-all duration-300">Sign
                    Up
        </form>
    </section>
@endsection
