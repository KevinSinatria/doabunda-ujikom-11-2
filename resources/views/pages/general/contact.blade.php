@extends('layouts.general.app')

@section('title', 'Contact')
@section('content')
    <section class="flex flex-col lg:flex-row justify-center items-center pt-24 lg:pt-16 gap-12 px-4">
        <div class="w-full max-w-lg bg-white/80 rounded-2xl shadow-lg p-8 flex flex-col gap-6">
            <h1 class="text-3xl font-bold text-center text-[#936400]">Contact Us</h1>
            <p class="text-center text-gray-700">Ada pertanyaan, kritik, atau saran? Silakan kirim pesan ke kami melalui
                WhatsApp!</p>
            <form action="https://wa.me/62895346195409" method="GET" target="_blank" class="flex flex-col gap-4">
                <div>
                    <label class="block mb-1 font-medium text-gray-800">Nama</label>
                    <input type="text" name="text"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#FFD369]"
                        placeholder="Nama kamu..." required>
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-800">Email</label>
                    <input type="email"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#FFD369]"
                        placeholder="Email aktif..." required>
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-800">Pesan</label>
                    <textarea name="text"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#FFD369]"
                        rows="4" placeholder="Tulis pesanmu di sini..." required></textarea>
                </div>
                <button type="submit"
                    class="bg-[#FFD369] hover:bg-[#dfac3c] text-white font-semibold rounded-lg py-2 transition-all shadow">Kirim
                    Pesan ke WhatsApp</button>
            </form>
        </div>
        <div class="flex flex-col gap-8 items-center w-full max-w-md">
            <div class="flex flex-col gap-4 bg-[#f5d689] rounded-2xl shadow-md p-6 w-full">
                <h2 class="text-xl font-semibold text-[#936400] mb-2">Info Kontak</h2>
                <div class="flex items-center gap-3">
                    <i class="ph-bold ph-map-pin text-2xl text-[#936400]"></i>
                    <span class="text-gray-800">Sayati, Kabupaten Bandung, Jawa Barat</span>
                </div>
                <div class="flex items-center gap-3">
                    <i class="ph-bold ph-envelope-simple text-2xl text-[#936400]"></i>
                    <span class="text-gray-800">doabunda@gmail.com</span>
                </div>
                <div class="flex items-center gap-3">
                    <i class="ph-bold ph-whatsapp-logo text-2xl text-[#936400]"></i>
                    <span class="text-gray-800">+62 895-3461-95409</span>
                </div>
            </div>
            <img src="{{ asset('assets/vector/undraw_personal-text_090t.svg') }}" alt="Contact Illustration"
                class="w-81 mx-auto drop-shadow-lg">
        </div>
    </section>
@endsection
