@extends('layouts.general.app')

@section('title', 'Homepage')
@section('content')
    <section class="flex flex-col pt-18 px-12 sm:px-16 md:px-20 lg:px-24">
        <div class="flex flex-col bg-[#fff2d4] rounded-xl py-4 min-h-112 md:flex-row gap-8 items-center justify-center">
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
                        <span>{{ $product->testimonies->avg('rating') ?? 0 }}</span>
                        <img src="{{ asset('assets/vector/star-fill.svg') }}" alt="Stars">
                        <span>| {{ $product->testimonies->count() }} Ratings</span>
                    </div>
                    <p class="bg-[#fffcf4] mt-3 px-4 py-2 rounded text-red-600 font-semibold text-lg">Rp.
                        {{ number_format($product->price, 0, '.', '.') }}</p>
                    <p class="my-2">Stock: {{ $product->stock }}</p>
                </div>
                {{-- Description box --}}
                <div class="flex-7 h-full px-4 py-2 rounded-lg bg-[#fffaef] shadow-lg">
                    <h2 class="text-lg font-semibold">Description of Product</h2>
                    <?= $product->description ?>
                </div>
            </div>
        </div>

        {{-- Testimonies --}}
        <div>

        </div>
    </section>
    <section class="flex flex-col justify-center items-center pt-16 gap-4">
        <h1 class="text-2xl font-semibold font-serif">Other Products</h1>
        <div
            class="w-full gap-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 2xl:grid-cols-6 cursor-pointer items-center justify-items-center justify-center px-4 sm:px-6 md:px-8 lg:px-12 mx-auto mt-8">
            {{-- Product Card --}}
            @foreach ($other_products as $product)
                <a x-data="{ isWishlist: false }" href="{{ route('general.products.show', $product->slug) }}"
                    class="w-full max-w-60 rounded-xl relative transition-all flex flex-col items-start shadow-none active:shadow-none duration-200 hover:shadow-lg bg-gray-100 overflow-hidden justify-center gap-4">
                    <img src="{{ asset('storage/' . $product->images[0]->image_path) }}" alt="Product Image"
                        class="w-full">

                    @if (Auth::check() && Auth::user()->role == 'customer')
                        <img x-show="!isWishlist" x-on:click="isWishlist = true"
                            src="{{ asset('assets/vector/heart-straight.svg') }}" alt="Add to Wishlist"
                            class="absolute cursor-pointer top-4 right-4 w-6 h-6">
                        <img x-show="isWishlist" x-on:click="isWishlist = false"
                            src="{{ asset('assets/vector/heart-straight-fill.svg') }}" alt="Add to Wishlist"
                            class="absolute cursor-pointer top-4 right-4 w-6 h-6">
                    @endif

                    <div class="px-4 pb-4">
                        <h2>{{ $product->name }}</h2>
                        <p class="text-red-700">Rp. {{ number_format($product->price, 0, '.', '.') }}</p>
                        <div class="mt-2 flex items-center gap-1">
                            <img src="{{ asset('assets/vector/star-fill.svg') }}" alt="Stars" class="w-4 h-4">
                            <p class="text-sm text-gray-800">
                                {{ $product->testimonies->avg('rating') ?? 0 }}
                                <span>({{ $product->testimonies->count() }})</span>
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
