<section class="w-full min-h-screen flex flex-col justify-center items-center">
    <header class="flex flex-col justify-center items-center gap-2">
        <h2 class="text-[40px] font-semibold text-[#604c10] group">
            Apa Kata Mereka?
            <div
                class="w-0 group-hover:w-full h-[3px] bg-gradient-to-r from-[#8a5c00] via-[#9f7700] to-[#774f00] rounded-full transition-all duration-300">
            </div>
        </h2>
        <p class="text-sm">Beberapa testimoni dari pelanggan kami</p>
    </header>

    <div class="swiper mt-8 w-full flex justify-center items-center" id="swiper-rtl">
        <div class="swiper-wrapper px-4">
            @foreach ($testimonies as $testimony)
                <div
                    class="swiper-slide flex flex-col shrink-0 justify-center shadow-lg items-center gap-4 px-8 py-8 max-w-96 max-h-48 md:max-h-56 rounded-xl bg-gray-{{ $loop->odd ? '100' : '200' }}">
                    <div>
                        <p class="line-clamp-4 text-sm md:text-base">&quot;{{ $testimony->testimony }}&quot;</p>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <div class="flex justify-start items-center gap-4">
                            <i class="ph-duotone ph-user-circle text-[52px] text-[#604c10]"></i>
                            <div>
                                <p class="font-semibold text-sm text-[#604c10]">{{ $testimony->user->username }}</p>
                                <p class="text-xs text-gray-600">customer</p>
                            </div>
                        </div>
                        @include('components.general.products.stars-ratings-component', [
                            'ratingAvg' => $testimony->rating,
                            'size' => '12px',
                        ])
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="swiper mt-4 w-full flex justify-center items-center" id="swiper-ltr">
        <div class="swiper-wrapper px-4">
            @foreach ($testimonies as $testimony)
                <div
                    class="swiper-slide flex flex-col shrink-0 justify-center shadow-lg items-center gap-4 px-8 py-8 max-w-96 max-h-48 md:max-h-56 rounded-xl bg-gray-{{ $loop->odd ? '200' : '100' }}">
                    <div>
                        <p class="line-clamp-4 text-sm md:text-base">&quot;{{ $testimony->testimony }}&quot;</p>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <div class="flex justify-start items-center gap-4">
                            <i class="ph-duotone ph-user-circle text-[52px] text-[#604c10]"></i>
                            <div>
                                <p class="font-semibold text-sm text-[#604c10]">{{ $testimony->user->username }}</p>
                                <p class="text-xs text-gray-600">customer</p>
                            </div>
                        </div>
                        @include('components.general.products.stars-ratings-component', [
                            'ratingAvg' => $testimony->rating,
                            'size' => '12px',
                        ])
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
