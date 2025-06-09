<section class="mt-8 flex flex-col justify-center items-center w-full px-12 lg:px-24">
    <main
        class="flex flex-col items-center justify-center gap-8 bg-[#ffd9a8] w-full max-w-lg sm:max-w-xl md:max-w-2xl lg:max-w-3xl xl:max-w-4xl rounded-xl shadow-lg py-8 px-8 relative overflow-hidden">
        <!-- Decorative elements -->
        <div
            class="absolute top-0 left-0 w-32 h-32 bg-[#FFAB00] opacity-20 rounded-full -translate-x-16 -translate-y-16">
        </div>
        <div
            class="absolute bottom-0 right-0 w-32 h-32 bg-[#FFAB00] opacity-20 rounded-full translate-x-16 translate-y-16">
        </div>

        <h1 class="text-3xl font-bold text-[#604c10] relative inline-block group">
            <i class="fas fa-chart-line mr-2"></i>
            @if(request()->routeIs('general.profile'))
                Statistik Saya
            @else
                Statistik {{ $user->username }}
            @endif
            <div
                class="absolute -bottom-2 left-0 w-full h-[3px] bg-gradient-to-r from-[#FFAB00] via-[#FFC107] to-[#FFAB00] rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300">
            </div>
        </h1>

        <div
            class="w-full flex rounded-2xl divide-x-0 py-4 justify-center items-center divide-[#ffce64] divide-solid divide-y-2 lg:divide-x-2 lg:divide-y-0 flex-col shadow bg-[#fff0c5] lg:flex-row hover:shadow-xl transition-shadow duration-300">
            <div class="flex flex-col py-4 px-6 gap-2 flex-1 justify-center items-center group">
                <i
                    class="fas fa-heart text-[#FFAB00] text-2xl mb-2 group-hover:scale-110 transition-transform duration-300"></i>
                <span
                    class="text-[36px] font-bold text-[#604c10] group-hover:text-[#FFAB00] transition-colors duration-300">{{ $wishlistsCount }}</span>
                <p class="text-center text-[#604c10] font-medium">Total Wishlists</p>
            </div>
            <div class="flex flex-col py-4 px-6 gap-2 flex-1 justify-center items-center group">
                <i
                    class="fas fa-comment-alt text-[#FFAB00] text-2xl mb-2 group-hover:scale-110 transition-transform duration-300"></i>
                <span
                    class="text-[36px] font-bold text-[#604c10] group-hover:text-[#FFAB00] transition-colors duration-300">{{ $testimoniesCount }}</span>
                <p class="text-center text-[#604c10] font-medium">Kontribusi Testimoni</p>
            </div>
        </div>

        <div
            class="w-full items-center justify-center py-4 h-full flex flex-2 flex-col gap-4 bg-[#fff0c5] rounded-2xl shadow p-6">
            <h2 class="text-2xl font-bold text-[#604c10] flex items-center gap-2">
                <i class="fas fa-clock text-[#FFAB00]"></i>
                @if (request()->routeIs('general.profile'))
                    Umur Akun Kamu
                @else
                    Umur Akun
                @endif
            </h2>
            <div
                class="flex flex-col w-full h-full lg:flex-row py-4 px-6 flex-1 lg:flex-2 justify-center items-center divide-y-2 lg:divide-y-0 lg:divide-x-2 divide-[#ffce64] divide-solid">
                <div class="flex flex-col px-6 gap-2 items-center justify-center group">
                    <span
                        class="text-[36px] font-bold text-[#604c10] group-hover:text-[#FFAB00] transition-colors duration-300">{{ $accountAge['days'] }}</span>
                    <p class="text-[#604c10] font-medium">Hari</p>
                </div>
                <div class="flex flex-col px-6 gap-2 items-center justify-center group">
                    <span
                        class="text-[36px] font-bold text-[#604c10] group-hover:text-[#FFAB00] transition-colors duration-300">{{ $accountAge['hours'] }}</span>
                    <p class="text-[#604c10] font-medium">Jam</p>
                </div>
                <div class="flex flex-col px-6 gap-2 items-center justify-center group">
                    <span
                        class="text-[36px] font-bold text-[#604c10] group-hover:text-[#FFAB00] transition-colors duration-300">{{ $accountAge['minutes'] }}</span>
                    <p class="text-[#604c10] font-medium">Menit</p>
                </div>
                <div class="flex flex-col px-6 gap-2 items-center justify-center group">
                    <span
                        class="text-[36px] font-bold text-[#604c10] group-hover:text-[#FFAB00] transition-colors duration-300">{{ $accountAge['seconds'] }}</span>
                    <p class="text-[#604c10] font-medium">Detik</p>
                </div>
            </div>
        </div>
    </main>
</section>
