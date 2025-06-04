<section class="flex flex-col pt-18 px-6 sm:px-12 md:px-18 lg:px-24">
    <div class="flex flex-col bg-[#fff2d4] shadow-lg relative rounded-xl py-4 px-4 min-h-112 md:flex-row gap-8 items-center justify-center"
        x-data="{ isWishlist: {{ Auth::check() && Auth::user()->role == 'customer' && $isWishlist ? 'true' : 'false' }} }">
        {{-- Product Image --}}
        <div x-data="{ imageSrc: '{{ asset('storage/' . $product->images[0]->image_path) }}' }" class="flex flex-4 flex-col gap-8 justify-center items-center">
            <div class="w-full flex justify-center items-center">
                <img class="w-64 h-64 md:w-81 md:h-81 rounded-lg object-cover" :src="imageSrc" alt="Image Product">
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
                class="absolute cursor-pointer top-4 right-4 w-6 h-6">
            <img x-show="isWishlist"
                x-on:click="isWishlist = false; document.getElementById('delete-wishlist-form-{{ $product->id }}').submit()"
                src="{{ asset('assets/vector/heart-straight-fill.svg') }}" alt="Add to Wishlist"
                class="absolute cursor-pointer top-4 right-4 w-6 h-6">
        @endif
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

        @if ($isTestimonyAllowed)
            <form
                class="flex flex-col justify-center rounded-xl shadow-lg items-center py-8 px-4 md:px-8 w-full bg-white"
                method="POST" action="{{ route('customer.testimonies.store', ['slug' => $product->slug]) }}">
                <h1 class="text-xl font-semibold">Berikan Testimoni!</h1>
                <p class="text-center text-sm text-gray-600">Berikan testimoni tentang produk ini berdasarkan
                    pengalamanmu selama
                    pembelian produk ini.</p>
                <i class="ph-fill ph-user-circle text-[48px]"></i>
                <h2 class="text-gray-900">{{ Auth::user()->username }}</h2>
                @csrf
                <div class="rating">
                    <input type="radio" id="star5" name="rate" value="5" />
                    <label for="star5" title="text"><svg viewBox="0 0 576 512" height="1em"
                            xmlns="http://www.w3.org/2000/svg" class="star-solid">
                            <path
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                            </path>
                        </svg></label>
                    <input type="radio" id="star4" name="rate" value="4" />
                    <label for="star4" title="text"><svg viewBox="0 0 576 512" height="1em"
                            xmlns="http://www.w3.org/2000/svg" class="star-solid">
                            <path
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                            </path>
                        </svg></label>
                    <input type="radio" id="star3" name="rate" value="3" />
                    <label for="star3" title="text"><svg viewBox="0 0 576 512" height="1em"
                            xmlns="http://www.w3.org/2000/svg" class="star-solid">
                            <path
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                            </path>
                        </svg></label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text"><svg viewBox="0 0 576 512" height="1em"
                            xmlns="http://www.w3.org/2000/svg" class="star-solid">
                            <path
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                            </path>
                        </svg></label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text"><svg viewBox="0 0 576 512" height="1em"
                            xmlns="http://www.w3.org/2000/svg" class="star-solid">
                            <path
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                            </path>
                        </svg></label>
                </div>

                <textarea placeholder="Menurut saya, produk ini..." name="testimony"
                    class="mt-8 outline-none transition-all duration-200 shadow-lg focus:shadow-none focus:ring-2 focus:ring-amber-600 w-full h-32 p-4 rounded-xl border border-[#cba67e]"></textarea>
                <p class="mt-4">Sertakan gambar:</p>
                <label for="file" class="file-upload-label overflow-hidden bg-[#ddd] transition-all" id="dropZone">
                    <div class="file-upload-design">
                        <svg viewBox="0 0 640 512" height="1em">
                            <path
                                d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z">
                            </path>
                        </svg>
                        <p>Drag and Drop</p>
                        <p>or</p>
                        <span class="browse-button">Browse file</span>
                    </div>
                    <img id="previewImage" alt="Image Preview"
                        class="max-w-full max-h-full absolute top-0 left-0 w-full h-full object-contain hidden rounded-lg">
                    <input id="file" type="file" accept="image/*" />
                </label>

                <button type="submit"
                    class="bg-[#bd8c22] hover:bg-[#dfac3c] transition-all text-white py-2 px-4 rounded-lg mt-8">Kirim
                    Testimoni</button>
            </form>
        @endif

        <div class="w-full flex flex-col divide-y divide-solid divide-[#cba67e] mt-8 gap-8">
            @foreach ($testimonies as $testimony)
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
            <div class="px-4 py-4 rounded-xl bg-[#f5d689]">
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
        dropZone.classList.add('bg-gray-300');
        dropZone.classList.remove('bg-[#ddd]');
    });

    dropZone.addEventListener('dragleave', (e) => {
        e.preventDefault();
        dropZone.classList.remove('bg-gray-300');
        dropZone.classList.add('bg-[#ddd]');
    });

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('bg-gray-300');
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
