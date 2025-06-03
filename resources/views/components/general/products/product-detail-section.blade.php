<section class="flex flex-col pt-18 px-6 sm:px-12 md:px-18 lg:px-24">
    <div
        class="flex flex-col bg-[#fff2d4] shadow-lg rounded-xl py-4 px-4 min-h-112 md:flex-row gap-8 items-center justify-center">
        {{-- Product Image --}}
        <div x-data="{ imageSrc: '{{ asset('storage/' . $product->images[0]->image_path) }}' }" class="flex flex-4 flex-col gap-8 justify-center items-center">
            <div class="w-full flex justify-center items-center">
                <img class="w-64 h-64 md:w-81 md:h-81 rounded object-cover" :src="imageSrc" alt="Image Product">
            </div>
            <div>
                <div class="flex gap-2 items-center">
                    @foreach ($product->images as $image)
                        <img class="w-16 h-16 md:w-24 md:h-24 rounded-xl object-cover"
                            x-on:click="imageSrc = '{{ asset('storage/' . $image->image_path) }}'"
                            src="{{ asset('storage/' . $image->image_path) }}" alt="Image Product Previews">
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Product Detail --}}
        <div class="flex flex-6 flex-col px-2 justify-start items-start">
            <div class="flex-3 flex flex-col justify-start items-start">
                <h1 class="uppercase text-2xl font-semibold">{{ $product->name }}</h1>
                <div class="flex">
                    <span>{{ number_format($product->testimonies->avg('rating'), 2) ?? 0 }}</span>
                    <img src="{{ asset('assets/vector/star-fill.svg') }}" alt="Stars">
                    <span>| {{ $product->testimonies->count() }} Ratings</span>
                </div>
                <p class="bg-[#fffcf4] mt-3 px-4 py-2 rounded text-red-600 font-semibold text-lg">Rp.
                    {{ number_format($product->price, 0, '.', '.') }}</p>
                <p class="my-2">Stock: {{ $product->stock }}</p>
            </div>
            {{-- Description box --}}
            <div class="flex-7 w-full h-full px-4 py-2 rounded-lg bg-[#fffaef] shadow-lg">
                <h2 class="text-lg font-semibold">Description of Product</h2>
                <?= $product->description ?>
            </div>
            <a class="px-4 py-2 rounded-lg mt-6 gap-2 bg-green-400 flex items-center justify-center text-white hover:bg-green-500 transition-all duration-300"
                href="https://wa.me/62895346195409?text=Hi, Saya ingin bertanya tentang produk {{ $product->name }}"
                target="_blank">
                <i class="ph-duotone ph-whatsapp-logo text-[32px]"></i>
                <span>Contact Seller</span>
            </a>
        </div>
    </div>

    {{-- Testimonies --}}
    <div
        class="flex flex-col shadow-lg bg-[#fff2d4] mt-8 rounded-xl py-8 px-8 min-h-112 gap-2 items-center justify-start">
        <div class="w-full">
            <h2 class="text-lg font-medium">Testimonies</h2>
        </div>
        {{-- Ratings Avg Box Stats --}}
        <div class="w-full px-4 py-4 bg-[#eccfae] flex gap-2 rounded-lg">
            <div>
                <p class="mb-2 text-[#7d6851] flex gap-2 items-end"><span
                        class="text-2xl">{{ number_format($product->testimonies->avg('rating'), 2) ?? 0 }}</span><span>dari
                        5</span><span>({{ $product->testimonies->count() }})</span></p>
                @include('components.general.products.stars-ratings-component', [
                    'ratingAvg' => $ratingAvg,
                    'size' => '24px',
                ])
            </div>
        </div>

        <div class="w-full flex flex-col divide-y divide-solid divide-[#cba67e] mt-8 gap-8">
            @foreach ($product->testimonies as $testimony)
                <div class="flex w-full pb-8 gap-2 items-start">
                    <div><i class="ph-fill ph-user-circle text-[48px]"></i></div>
                    <div>
                        <h3>{{ $testimony->user->username }}</h3>
                        @include('components.general.products.stars-ratings-component', [
                            'ratingAvg' => $testimony->rating,
                            'size' => '16px',
                        ])
                        <p class="text-sm text-gray-600">
                            {{ $testimony->created_at->setTimezone('Asia/Jakarta')->format('d-m-Y H:i') }}</p>
                        <p class="mt-1">{{ $testimony->testimony }}</p>
                        <img class="w-32 h-32 rounded-lg object-cover mt-2"
                            src="{{ asset('storage/' . $testimony->image) }}" alt="">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
