@extends('layouts.general.app')

@section('title', 'Homepage')
@section('content')
    <section
        class="flex min-h-[90vh] flex-col gap-4 pt-18 px-6 sm:px-12 md:px-18 lg:px-24 w-full justify-center items-center">
        <img class="drop-shadow-xl w-96 bg-[#ffbf71] rounded-full p-4" src="{{ asset('assets/vector/undraw_page-not-found_6wni.svg') }}" alt="404 vector">
        <div class="flex flex-col w-full justify-center items-center">
            <h1 class="text-[40px] font-semibold text-[#604c10]">Halaman Tidak Ditemukan</h1>
            <p>Maaf, halaman yang Kamu cari ini ternyata ga ada nih.</p>
            <a class="group mt-4 relative inline-flex items-center overflow-hidden rounded-sm bg-[#5C3A1E] px-8 py-3 text-white focus:ring-3 focus:outline-hidden"
                href="{{ route('general.home') }}">
                <span class="absolute -end-full transition-all group-hover:end-4">
                    <svg class="size-5 shadow-sm rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </span>

                <span class="text-sm font-medium transition-all group-hover:me-4"> Kembali ke Beranda </span>
            </a>
        </div>
    </section>
@endsection
