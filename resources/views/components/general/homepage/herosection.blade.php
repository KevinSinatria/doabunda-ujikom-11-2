<section
    id="herosection" class="h-screen w-full flex flex-col lg:flex-row items-center justify-center bg-[#FFEAC5] overflow-hidden relative px-4 sm:px-6 lg:px-0">
    <!-- Text Content -->
    <div
        class="flex-1 max-w-2xl lg:max-w-none lg:px-8 xl:px-20 text-center lg:text-left z-10 order-2 lg:order-1 mt-8 lg:mt-0">
        <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-bold leading-tight">
            100% Original, 0% Basa-basi.
        </h1>
        <p
            class="mt-4 sm:mt-6 text-sm sm:text-base lg:text-lg text-gray-800 leading-relaxed max-w-md lg:max-w-none mx-auto lg:mx-0">
            Kurasi eksklusif barang-barang fashion edgy & pre-loved dari berbagai archive.
            Tanpa refund, tanpa drama. Order via DM atau Shopee.
        </p>
        <a class="group mt-4 relative inline-flex items-center overflow-hidden rounded-sm bg-[#5C3A1E] px-8 py-3 text-white focus:ring-3 focus:outline-hidden"
            href="{{ route('general.products.index') }}">
            <span class="absolute -end-full transition-all group-hover:end-4">
                <svg class="size-5 shadow-sm rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </span>

            <span class="text-sm font-medium transition-all group-hover:me-4"> Lihat Koleksi </span>
        </a>
        <button href="https://www.instagram.com/doabundaa_/"><i class="ph-fill ph-instagram-logo"></i></button>
    </div>

    <!-- Image Content -->
    <div class="flex-1 relative mt-32 lg:mt-0 flex items-center justify-center lg:px-8 xl:px-20 order-1 lg:order-2">
        <!-- Background Circle -->
        <div
            class="w-72 h-72 md:w-80 md:h-80 lg:w-[35rem] lg:h-[35rem] 
                    bg-[#A67B5B] rounded-full absolute 
                    -top-12 -right-8 sm:-top-16 sm:-right-10 
                    md:-top-20 md:-right-12 
                    lg:-top-40 lg:-right-16">
        </div>

        <!-- Model Image -->
        <img src="{{ asset('assets/img/herosection_model.png') }}" alt="hero section model"
            class="relative z-10 w-48 sm:w-56 lg:w-72 xl:w-80 h-auto 
                    -mt-8 lg:-mt-12 xl:-mt-24">
    </div>
</section>
