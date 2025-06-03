<section class="flex flex-col justify-center items-center pt-24 lg:pt-20 gap-4">
    <h1 class="text-2xl font-semibold font-serif">Wishlists</h1>
    @if (!$wishlists->isEmpty())
        <section
            class="w-full gap-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 2xl:grid-cols-6 cursor-pointer items-center justify-items-center justify-center px-4 sm:px-6 md:px-8 lg:px-12 mx-auto mt-8">
            {{-- Product Card --}}
            @foreach ($wishlists as $wishlist)
                <a x-data="{ isWishlist: {{ Auth::check() && Auth::user()->role == 'customer' && Auth::user()->wishlists->where('product_id', $wishlist->product->id)->isNotEmpty() ? 'true' : 'false' }} }" href="{{ route('general.products.show', $wishlist->product->slug) }}"
                    class="w-full max-w-60 rounded-xl relative transition-all flex flex-col items-start shadow-none active:shadow-none duration-200 hover:shadow-lg h-82 bg-gray-100 overflow-hidden justify-center gap-1">
                    <img src="{{ asset('storage/' . $wishlist->product->images[0]->image_path) }}" alt="Product Image"
                        class="object-cover w-full max-h-56">

                    <form id="wishlist-form-{{ $wishlist->product->id }}"
                        action="{{ route('customer.wishlists.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $wishlist->product->id }}">
                    </form>

                    <form id="delete-wishlist-form-{{ $wishlist->product->id }}"
                        action="{{ route('customer.wishlists.destroy') }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="product_id" value="{{ $wishlist->product->id }}">
                    </form>

                    @if (Auth::check() && Auth::user()->role == 'customer')
                        <img x-show="!isWishlist"
                            x-on:click.stop.prevent="isWishlist = true; document.getElementById('wishlist-form-{{ $wishlist->product->id }}').submit()"
                            src="{{ asset('assets/vector/heart-straight.svg') }}" alt="Add to Wishlist"
                            class="absolute cursor-pointer top-4 right-4 w-6 h-6">
                        <img x-show="isWishlist"
                            x-on:click.stop.prevent="isWishlist = false; document.getElementById('delete-wishlist-form-{{ $wishlist->product->id }}').submit()"
                            src="{{ asset('assets/vector/heart-straight-fill.svg') }}" alt="Add to Wishlist"
                            class="absolute cursor-pointer top-4 right-4 w-6 h-6">
                    @endif

                    {{-- Product Information --}}
                    <div class="px-4 pb-8">
                        <h2 class="uppercase leading-snug mb-1">{{ $wishlist->product->name }}</h2>
                        <p class="text-red-700"><span class="text-sm">Rp.</span> <span
                                class="text-lg">{{ number_format($wishlist->product->price, 0, '.', '.') }}</span></p>
                        <div class="flex items-center gap-1">
                            <img src="{{ asset('assets/vector/star-fill.svg') }}" alt="Stars" class="w-4 h-4">
                            <p class="text-sm text-gray-800">
                                {{ $wishlist->product->testimonies->avg('rating') ?? 0 }}
                                <span>({{ $wishlist->product->testimonies->count() }})</span>
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </section>
    @else
        <section
            class="w-full min-h-[75vh] lg:min-h-[60vh] cursor-pointer flex flex-col items-center justify-center px-4 sm:px-6 md:px-8 mx-auto mt-8">
            <img src="{{ asset('assets/vector/undraw_empty_4zx0 (1).svg') }}"
                class="bg-[#8a6b24] px-2 py-2 rounded-full w-68 md:w-72 lg:w-80" alt="Empty Vector">
            <h1 class="text-4xl text-center mt-4 font-semibold">Belum ada wishlistnya nih..</h1>
            <p class="text-gray-700 text-center mt-2">Kamu belum punya wishlist nih, yuk lihat produk-produk kami!</p>
            <a href="{{ route('general.products.index') }}"
                class="text-amber-700 active:text-amber-700 transition-all hover:text-amber-600 font-medium">Lihat
                Products</a>
        </section>
    @endif
</section>
