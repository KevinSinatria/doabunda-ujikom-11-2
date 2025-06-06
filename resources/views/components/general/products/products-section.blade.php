<section class="flex flex-col justify-center items-center pt-24 lg:pt-16 gap-4">
    <h1 class="text-2xl font-semibold font-serif">{{ $title }}</h1>


    @if (request()->routeIs('general.products.index'))
        <form x-ref="searchForm" x-data="{ value: '{{ $search ?? '' }}' }" x-on:input.debounce.500="$event.target.form.submit()"
            method="GET" class="max-w-sm sm:max-w-lg md:max-w-xl lg:max-w-2xl relative mx-12 w-full">
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search" name="search" x-model="value" autocomplete="off"
                    class="block w-full p-4 ps-10 text-sm transition-all focus:shadow-lg outline-none text-gray-900 border border-gray-300 rounded-lg bg-gray-50"
                    placeholder="Search Products..." />
                @if ($search !== '')
                    <i x-on:click="value = ''; setTimeout(() => $refs.searchForm.submit(), 100);"
                        class="ph ph-x text-lg absolute top-4 right-26 cursor-pointer hover:text-[#bd8c22]"></i>
                @endif
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 duration-100 transition-all cursor-pointer hover:shadow-md bg-[#bd8c22] hover:bg-[#dfac3c] focus:ring-4 focus:outline-none outline-0 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
        </form>
    @endif


    @if ($products->count() > 0)
        <div
            class="w-full gap-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 2xl:grid-cols-6 cursor-pointer items-center justify-items-center justify-center px-4 sm:px-6 md:px-8 lg:px-12 mx-auto mt-8">
            {{-- Product Card --}}
            @foreach ($products as $product)
                <a x-data="{
                    isWishlist: {{ Auth::check() && Auth::user()->role == 'customer' && Auth::user()->wishlists->where('product_id', $product->id)->isNotEmpty() ? 'true' : 'false' }},
                    isInStock: {{ $product->stock > 0 ? 'true' : 'false' }}
                }" href="{{ route('general.products.show', $product->slug) }}"
                    class="w-full max-w-60 rounded-xl relative transition-all flex flex-col items-start shadow-none active:shadow-none duration-200 hover:shadow-lg bg-gray-100 overflow-hidden justify-center gap-1">
                    <img src="{{ asset('storage/' . $product->images[0]->image_path) }}" loading="lazy" alt="Product Image"
                        class="object-cover w-full h-56">

                    <p x-bind:class="isInStock ? 'bg-green-600 top-6 -left-12' : 'bg-red-600 top-6 -left-12'"
                        class="absolute shadow-xl z-10 text-white font-medium w-full py-2 flex justify-center items-center -rotate-45">
                        {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}</p>

                    <form id="wishlist-form-{{ $product->id }}" action="{{ route('customer.wishlists.store') }}"
                        method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                    </form>

                    <form id="delete-wishlist-form-{{ $product->id }}"
                        action="{{ route('customer.wishlists.destroy') }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                    </form>

                    @if (Auth::check() && Auth::user()->role == 'customer')
                        <img x-show="!isWishlist"
                            x-on:click="isWishlist = true; document.getElementById('wishlist-form-{{ $product->id }}').submit()"
                            src="{{ asset('assets/vector/heart-straight.svg') }}" alt="Add to Wishlist"
                            class="absolute cursor-pointer top-4 right-4 w-6 h-6">
                        <img x-show="isWishlist"
                            x-on:click="isWishlist = false; document.getElementById('delete-wishlist-form-{{ $product->id }}').submit()"
                            src="{{ asset('assets/vector/heart-straight-fill.svg') }}" alt="Add to Wishlist"
                            class="absolute cursor-pointer top-4 right-4 w-6 h-6">
                    @endif

                    <div class="px-4 pb-4" x-data="{ isFeatured: {{ $product->is_featured ? 'true' : 'false' }} }">
                        <p
                            x-bind:class="isFeatured ?
                                'bg-linear-to-r/oklch w-fit from-[#b3a039] to-[#B8860B] shadow-md text-white px-3 py-1 rounded-lg' :
                                'hidden'">
                            {{ $product->is_featured ? 'Featured' : '' }}</p>
                        <h2 class="line-clamp-2">{{ $product->name }}</h2>
                        <p class="text-red-700"><span class="text-xs">Rp.{{ ' ' }}</span><span
                                class="text-base">{{ number_format($product->price, 0, '.', '.') }}</span></p>
                        <div class="mt-2 flex items-center gap-1">
                            <img src="{{ asset('assets/vector/star-fill.svg') }}" alt="Stars" class="w-4 h-4">
                            <p class="text-sm text-gray-800">
                                {{ number_format($product->testimonies->avg('rating'), 2) ?? 0 }}
                                <span>({{ $product->testimonies->count() }})</span>
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    @else
        @if (request()->routeIs('general.products.index'))
            <div class="w-full flex flex-col items-center justify-center gap-4">
                <img class="w-80" src="{{ asset('assets/vector/undraw_file-search_cbur.svg') }}"
                    alt="Not Found Products Vector">
                <p class="text-2xl text-center md:text-3xl lg:text-4xl font-semibold">Product yang kamu cari gak ketemu
                    nih!
                </p>
                <p>Coba cari <a class="text-[#936400] font-medium hover:text-[#b3a039] transition-all"
                        href="{{ route('general.products.index') }}">product</a> yang lain yaa! Atau hubungi <a
                        href="https://wa.me/62895346195409?text=Hi, Saya ingin bertanya apakah produk {{ $search }} ada?"
                        target="_blank" class="text-[#936400] font-medium hover:text-[#b3a039] transition-all">Admin</a>
                    kami ajaa..</p>
            </div>
        @endif
    @endif
</section>
<div class="mx-16 px-4 py-4 rounded-xl mt-12 bg-[#f5d689]">
    {{ $products->links('pagination::tailwind') }}
</div>
