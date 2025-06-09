<section class="flex flex-col pt-18 px-6 sm:px-12 md:px-18 lg:px-24">
    <div class="flex flex-col bg-[#fff2d4] shadow-lg relative rounded-xl py-8 px-8 min-h-112 md:flex-row gap-8 items-center justify-center hover:shadow-xl transition-all duration-300"
        x-data="{ isWishlist: {{ Auth::check() && Auth::user()->role == 'customer' && $isWishlist ? 'true' : 'false' }} }">
        {{-- Decorative elements --}}
        <div
            class="absolute top-0 left-0 w-32 h-32 bg-[#FFAB00] opacity-20 rounded-full -translate-x-16 -translate-y-16">
        </div>
        <div
            class="absolute bottom-0 right-10 w-32 h-32 bg-[#FFAB00] opacity-20 rounded-full translate-x-16 translate-y-16">
        </div>

        {{-- Product Image --}}
        <div x-data="{ imageSrc: '{{ asset('storage/' . $product->images[0]->image_path) }}' }" class="flex flex-4 flex-col gap-8 justify-center items-center">
            <div class="w-full flex justify-center items-center">
                <img class="w-64 h-64 md:w-81 md:h-81 rounded-lg object-cover transition-transform duration-300"
                    :src="imageSrc" alt="Image Product">
            </div>
            <div class="flex gap-4 items-center overflow-x-auto py-2 px-4">
                @foreach ($product->images as $image)
                    <img class="w-16 h-16 md:w-24 md:h-24 rounded-xl object-cover cursor-pointer transition-all duration-150 hover:border-2 hover:border-[#FFAB00]"
                        x-on:click="imageSrc = '{{ asset('storage/' . $image->image_path) }}'"
                        src="{{ asset('storage/' . $image->image_path) }}" alt="Image Product Previews">
                @endforeach
            </div>
        </div>

        {{-- Product Detail --}}
        <div class="flex flex-6 flex-col px-4 justify-start items-start gap-6">
            <div class="flex-3 flex flex-col justify-start items-start gap-4">
                <div class="flex items-center gap-2">
                    <span class="text-sm text-[#604c10]">Kategori:</span>
                    <span
                        class="bg-[#ffda75] px-4 py-2 rounded-lg text-sm font-semibold uppercase text-[#604c10] hover:bg-[#FFAB00] transition-colors duration-300">{{ $product->category->name }}</span>
                </div>
                <h1 class="uppercase text-3xl font-bold text-[#604c10] group">
                    {{ $product->name }}
                    <div
                        class="w-0 group-hover:w-full h-[3px] bg-gradient-to-r from-[#FFAB00] via-[#FFC107] to-[#FFAB00] rounded-full transition-all duration-300">
                    </div>
                </h1>
                <div class="flex items-center gap-2">
                    <span
                        class="text-lg font-semibold text-[#604c10]">{{ number_format($product->testimonies->avg('rating'), 2) ?? 0 }}</span>
                    <img src="{{ asset('assets/vector/star-fill.svg') }}" alt="Stars" class="w-5 h-5">
                    <span class="text-[#604c10]">| {{ $product->testimonies->count() }} Ratings</span>
                </div>
                <p class="bg-[#fffcf4] px-6 py-3 rounded-lg text-red-600 font-bold text-xl shadow-md">Rp.
                    {{ number_format($product->price, 0, '.', '.') }}</p>
                <div class="flex items-center gap-2">
                    <i class="ph-fill ph-package text-[#604c10] text-xl"></i>
                    <p class="text-[#604c10] font-medium">Stok: {{ $product->stock }}</p>
                </div>
            </div>

            {{-- Description box --}}
            <div
                class="flex-7 w-full h-full px-6 py-4 rounded-lg bg-[#fffaef] shadow-lg hover:shadow-xl transition-all duration-300">
                <h2 class="text-xl font-bold text-[#604c10] mb-3 flex items-center gap-2">
                    <i class="ph-fill ph-info text-[#FFAB00]"></i>
                    Deskripsi Produk
                </h2>
                <div class="text-[#604c10] leading-relaxed">
                    <?= $product->description ?>
                </div>
            </div>

            <a class="w-full px-6 py-3 rounded-lg gap-3 bg-green-500 flex items-center justify-center text-white hover:bg-green-600 transition-all duration-300 shadow-md hover:shadow-lg"
                href="https://wa.me/62895346195409?text=Hi, Saya ingin bertanya tentang produk {{ $product->name }}"
                target="_blank">
                <i class="ph-duotone ph-whatsapp-logo text-[32px]"></i>
                <span class="font-semibold">Hubungi Penjual</span>
            </a>
        </div>

        <form id="wishlist-form-{{ $product->id }}" action="{{ route('customer.wishlists.store') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
        </form>

        <form id="delete-wishlist-form-{{ $product->id }}" action="{{ route('customer.wishlists.destroy') }}"
            method="POST">
            @csrf
            @method('delete')
            <input type="hidden" name="product_id" value="{{ $product->id }}">
        </form>

        @if (Auth::check() && Auth::user()->role == 'customer')
            <img x-show="!isWishlist"
                x-on:click="isWishlist = true; document.getElementById('wishlist-form-{{ $product->id }}').submit()"
                src="{{ asset('assets/vector/heart-straight.svg') }}" alt="Add to Wishlist"
                class="absolute cursor-pointer top-4 right-4 w-8 h-8 hover:scale-110 transition-transform duration-300">
            <img x-show="isWishlist"
                x-on:click="isWishlist = false; document.getElementById('delete-wishlist-form-{{ $product->id }}').submit()"
                src="{{ asset('assets/vector/heart-straight-fill.svg') }}" alt="Add to Wishlist"
                class="absolute cursor-pointer top-4 right-4 w-8 h-8 hover:scale-110 transition-transform duration-300">
        @endif
    </div>

    {{-- Testimonies --}}
    <div
        class="flex flex-col shadow-lg bg-[#fff2d4] mt-8 rounded-xl py-8 px-8 min-h-112 gap-6 items-center justify-start hover:shadow-xl transition-all duration-300">
        <div class="w-full">
            <h2 class="text-2xl font-bold text-[#604c10] flex items-center gap-2">
                <i class="ph-fill ph-chat-circle-text text-[#FFAB00]"></i>
                Testimoni
            </h2>
        </div>

        {{-- Ratings Avg Box Stats --}}
        <div class="w-full px-6 py-6 bg-[#eccfae] flex gap-4 rounded-lg shadow-md">
            <div class="flex flex-col gap-2">
                <p class="text-[#7d6851] flex gap-2 items-end">
                    <span
                        class="text-3xl font-bold">{{ number_format($product->testimonies->avg('rating'), 2) ?? 0 }}</span>
                    <span class="text-lg">dari 5</span>
                    <span class="text-lg">({{ $product->testimonies->count() }})</span>
                </p>
                @include('components.general.products.stars-ratings-component', [
                    'ratingAvg' => $ratingAvg,
                    'size' => '24px',
                ])
            </div>
        </div>

        @if ($isTestimonyAllowed)
            <form
                class="flex flex-col justify-center rounded-xl shadow-lg items-center py-8 px-6 md:px-8 w-full bg-white hover:shadow-xl transition-all duration-300"
                method="POST" enctype="multipart/form-data"
                action="{{ route('customer.testimonies.store', ['slug' => $product->slug]) }}">
                <h1 class="text-2xl font-bold text-[#604c10] mb-2">Berikan Testimonimu!</h1>
                <p class="text-center text-[#604c10] mb-4">Berikan testimoni tentang produk ini berdasarkan pengalamanmu
                    selama pembelian produk ini.</p>
                <i class="ph-fill ph-user-circle text-[48px] text-[#FFAB00]"></i>
                <h2 class="text-[#604c10] font-semibold mb-6">{{ Auth::user()->username }}</h2>
                @csrf
                <div class="rating">
                    <input type="radio" id="star5" name="rate" value="5" required/>
                    <label for="star5" title="text"><svg viewBox="0 0 576 512" height="1em"
                            xmlns="http://www.w3.org/2000/svg" class="star-solid">
                            <path
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                            </path>
                        </svg></label>
                    <input type="radio" id="star4" name="rate" value="4" required/>
                    <label for="star4" title="text"><svg viewBox="0 0 576 512" height="1em"
                            xmlns="http://www.w3.org/2000/svg" class="star-solid">
                            <path
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                            </path>
                        </svg></label>
                    <input type="radio" id="star3" name="rate" value="3" required/>
                    <label for="star3" title="text"><svg viewBox="0 0 576 512" height="1em"
                            xmlns="http://www.w3.org/2000/svg" class="star-solid">
                            <path
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                            </path>
                        </svg></label>
                    <input type="radio" id="star2" name="rate" value="2" required/>
                    <label for="star2" title="text"><svg viewBox="0 0 576 512" height="1em"
                            xmlns="http://www.w3.org/2000/svg" class="star-solid">
                            <path
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                            </path>
                        </svg></label>
                    <input type="radio" id="star1" name="rate" value="1" required/>
                    <label for="star1" title="text"><svg viewBox="0 0 576 512" height="1em"
                            xmlns="http://www.w3.org/2000/svg" class="star-solid">
                            <path
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                            </path>
                        </svg></label>
                </div>

                <textarea placeholder="Menurut saya, produk ini..." name="testimony" required minlength="20"
                    class="mt-8 outline-none transition-all duration-200 shadow-lg focus:shadow-none focus:ring-2 focus:ring-[#FFAB00] w-full h-32 p-4 rounded-xl border border-[#cba67e] text-[#604c10]"></textarea>
                <p class="text-xs font-medium text-[#604c10]">*Minimal 20 Karakter</p>
                <p class="mt-4 text-[#604c10] font-medium">Sertakan gambar:</p>
                <label for="file"
                    class="file-upload-label overflow-hidden bg-[#fffaef] transition-all hover:bg-[#fff2d4]"
                    id="dropZone">
                    <div class="file-upload-design">
                        <svg viewBox="0 0 640 512" height="1em" class="text-[#FFAB00]">
                            <path
                                d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z">
                            </path>
                        </svg>
                        <p class="text-[#604c10]">Drag and Drop</p>
                        <p class="text-[#604c10]">or</p>
                        <span class="browse-button text-[#FFAB00]">Browse file</span>
                    </div>
                    <img id="previewImage" alt="Image Preview"
                        class="max-w-full max-h-full absolute top-0 left-0 w-full h-full object-contain hidden rounded-lg">
                    <input id="file" name="image" type="file" accept="image/*" />
                </label>

                <button type="submit" data-no-swup
                    class="bg-[#FFAB00] hover:bg-[#FFC107] transition-all text-white py-3 px-6 rounded-lg mt-8 font-semibold shadow-md hover:shadow-lg">
                    Kirim Testimoni
                </button>
            </form>
        @endif

        <div class="w-full flex flex-col divide-y divide-solid divide-[#cba67e] mt-8 gap-8">
            @foreach ($testimonies as $testimony)
                <div class="flex w-full pb-8 gap-4 items-start group">
                    <a href="/profile/{{ $testimony->user->username }}"
                        class="cursor-pointer group-hover:scale-110 transition-transform duration-300">
                        <i class="ph-fill ph-user-circle text-[48px]"></i>
                    </a>
                    <div class="flex-1">
                        <a class="cursor-pointer text-[#604c10] font-semibold hover:text-[#FFAB00] transition-colors duration-300"
                            href="/profile/{{ $testimony->user->username }}">{{ $testimony->user->username }}</a>
                        @include('components.general.products.stars-ratings-component', [
                            'ratingAvg' => $testimony->rating,
                            'size' => '16px',
                        ])
                        <p class="text-sm text-[#604c10]">
                            {{ $testimony->created_at->setTimezone('Asia/Jakarta')->format('d-m-Y H:i') }}</p>
                        <p class="mt-2 text-[#604c10]">{{ $testimony->testimony }}</p>
                        <img class="w-32 h-32 rounded-lg object-cover mt-3 hover:scale-105 transition-transform duration-300"
                            src="{{ asset('storage/' . $testimony->image) }}" alt="">
                    </div>
                </div>
            @endforeach
            <div class="px-4 py-4 rounded-xl bg-[#f5d689] shadow-md">
                {{ $testimonies->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</section>

<script>
    const fileInput = document.getElementById('file');
    const dropZone = document.getElementById('dropZone');
    const previewImage = document.getElementById('previewImage');
    const fileUploadDesign = document.querySelector('.file-upload-design');

    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('bg-[#fff2d4]');
        dropZone.classList.remove('bg-[#fffaef]');
    });

    dropZone.addEventListener('dragleave', (e) => {
        e.preventDefault();
        dropZone.classList.remove('bg-[#fff2d4]');
        dropZone.classList.add('bg-[#fffaef]');
    });

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('bg-[#fff2d4]');
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            previewFile(files[0]);
        }
    });

    fileInput.addEventListener('change', (e) => {
        if (fileInput.files.length > 0) {
            previewFile(fileInput.files[0]);
        }
    });

    function previewFile(file) {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImage.src = e.target.result;
                previewImage.classList.add('block');
                previewImage.classList.remove('hidden');
                fileUploadDesign.style.display = 'none';
            };
            reader.readAsDataURL(file);
        } else {
            alert('File yang dipilih bukan gambar!');
            previewImage.classList.add('hidden');
            fileUploadDesign.style.display = 'flex';
        }
    }
</script>
