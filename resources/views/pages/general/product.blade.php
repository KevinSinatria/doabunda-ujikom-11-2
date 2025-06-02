@extends('layouts.general.app')

@section('title', 'Homepage')
@section('content')
    <div class="flex flex-col justify-center items-center pt-16 gap-4">
        <h1 class="text-2xl font-semibold font-serif">Products</h1>
        <section
            class="w-full gap-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 2xl:grid-cols-6 cursor-pointer items-center justify-items-center justify-center px-4 sm:px-6 md:px-8 lg:px-12 mx-auto mt-8">
            {{-- Product Card --}}
            @foreach ($products as $product)
                <a x-data="{ isWishlist: false }" href="{{ route('general.products.show', $product->slug) }}"
                    class="w-full max-w-60 rounded-xl relative transition-all flex flex-col items-start shadow-none active:shadow-none duration-200 hover:shadow-lg bg-gray-100 overflow-hidden justify-center gap-4">
                    <img src="{{ asset('storage/' . $product->images[0]->image_path) }}" alt="Product Image" class="w-full">

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
        </section>
    </div>
@endsection
