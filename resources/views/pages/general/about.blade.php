@extends('layouts.general.app')

@section('title', 'About')
@section('content')
    <div class="container mx-auto px-4 py-24 lg:py-16">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold text-center mb-8 text-[#8B4513]">Tentang DoaBunda</h1>

            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                <div class="flex items-center justify-center mb-6">
                    <img src="{{ asset('favicon.png') }}" alt="DoaBunda Logo" class="w-32 h-32 object-contain">
                </div>

                <div class="space-y-8">
                    <div>
                        <h2 class="text-2xl font-semibold mb-4 text-[#8B4513]">Siapa Kami?</h2>
                        <p class="text-gray-700 leading-relaxed">
                            DoaBunda adalah platform fashion preloved yang berkomitmen untuk mendukung gerakan sustainable
                            fashion di Indonesia. Kami menghubungkan penjual dan pembeli dalam ekosistem yang aman,
                            terpercaya, dan profesional.
                        </p>
                    </div>

                    <div class="bg-[#FFF5E6] p-6 rounded-xl">
                        <h2 class="text-2xl font-semibold mb-4 text-[#8B4513]">Visi & Misi</h2>
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-xl font-medium mb-2 text-[#8B4513]">Visi</h3>
                                <p class="text-gray-700">
                                    Menjadi platform terpercaya yang mendukung pertumbuhan usaha mikro di bidang fashion
                                    preloved dan berkontribusi pada gerakan sustainable fashion di Indonesia.
                                </p>
                            </div>
                            <div>
                                <h3 class="text-xl font-medium mb-2 text-[#8B4513]">Misi</h3>
                                <ul class="list-disc list-inside text-gray-700 space-y-2">
                                    <li>Memberdayakan pelaku usaha mikro dengan platform digital yang profesional</li>
                                    <li>Mengurangi dampak lingkungan dari industri fashion</li>
                                    <li>Menciptakan ekosistem jual-beli yang aman dan terpercaya</li>
                                    <li>Mendukung gerakan sustainable fashion di Indonesia</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-2xl font-semibold mb-4 text-[#8B4513]">Manfaat DoaBunda</h2>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="bg-[#FFF5E6] p-6 rounded-xl">
                                <h3 class="text-xl font-medium mb-3 text-[#8B4513]">Untuk Penjual</h3>
                                <p class="text-gray-700">
                                    Platform profesional yang membantu mengelola penjualan dengan lebih efisien, menjangkau
                                    lebih banyak pembeli potensial, dan mengembangkan bisnis fashion preloved Anda.
                                </p>
                            </div>
                            <div class="bg-[#FFF5E6] p-6 rounded-xl">
                                <h3 class="text-xl font-medium mb-3 text-[#8B4513]">Untuk Pembeli</h3>
                                <p class="text-gray-700">
                                    Temukan fashion berkualitas dengan harga terjangkau, mendukung gerakan sustainable
                                    fashion, dan berbelanja dengan aman dan nyaman.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-12">
                        <h2 class="text-2xl font-semibold mb-4 text-[#8B4513]">Dukung Sustainable Fashion</h2>
                        <p class="text-gray-700">
                            Bersama DoaBunda, mari kita wujudkan fashion yang lebih berkelanjutan. Setiap pembelian fashion
                            preloved adalah langkah kecil untuk masa depan yang lebih baik.
                        </p>
                        <a href="{{ route('general.products.index') }}"
                            class="inline-block mt-6 px-8 py-3 bg-[#8B4513] text-white rounded-full hover:bg-[#6B3410] transition-colors">
                            Mulai Berbelanja
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
