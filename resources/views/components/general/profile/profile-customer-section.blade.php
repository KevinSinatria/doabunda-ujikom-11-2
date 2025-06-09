<section class="pt-24 lg:pt-16 flex flex-col justify-center items-center w-full px-12 lg:px-24">
    {{-- Header of my profile --}}
    <header class="w-full text-center mb-8">
        <h1 class="text-3xl font-semibold text-[#604c10] relative inline-block">
            Profil {{ $user->username }}
            <div
                class="absolute -bottom-2 left-0 w-full h-1 bg-gradient-to-r from-[#FFAB00] via-[#FFC107] to-[#FFAB00] rounded-full">
            </div>
        </h1>
    </header>

    {{-- Main content of my profile --}}
    <main
        class="flex flex-col lg:flex-row gap-8 bg-gradient-to-br from-[#f0d693] to-[#ffd6b6] w-full max-w-lg sm:max-w-xl md:max-w-2xl lg:max-w-3xl xl:max-w-4xl rounded-xl shadow-lg py-8 px-8 relative overflow-hidden">

        {{-- Decorative Elements --}}
        <div
            class="absolute top-0 right-0 w-32 h-32 bg-[#FFAB00] opacity-10 rounded-full -translate-y-1/2 translate-x-1/2">
        </div>
        <div
            class="absolute bottom-0 left-0 w-24 h-24 bg-[#FFC107] opacity-10 rounded-full translate-y-1/2 -translate-x-1/2">
        </div>

        <div class="flex flex-1 flex-col gap-6 justify-center items-center relative z-10">
            <i
                class="ph ph-user text-[72px] bg-white rounded-full p-8 shadow-lg relative z-10 group-hover:scale-105 transition-transform duration-300"></i>
        </div>
        <div class="flex flex-2 w-full flex-col px-4 lg:px-8 py-4 lg:py-8 justify-center items-center relative z-10">
            <div class="w-full flex flex-col gap-4">
                <div class="w-full flex flex-col justify-start items-start">
                    <h2 for="email" class="mb-1 text-gray-800 font-medium flex items-center gap-2">
                        <i class="ph ph-user text-[#604c10]"></i>
                        Username
                    </h2>
                    <p class="py-2 bg-gray-100 text-gray-600 px-3 rounded-xl w-full border-2 border-transparent">
                        {{ $user->username }}
                    </p>
                </div>

                <div class="w-full flex flex-col justify-start items-start">
                    <h2 for="email" class="mb-1 text-gray-800 font-medium flex items-center gap-2">
                        <i class="ph ph-envelope text-[#604c10]"></i>
                        Email
                    </h2>
                    <p class="py-2 bg-gray-100 text-gray-600 px-3 rounded-xl w-full border-2 border-transparent">
                        {{ $user->email }}
                    </p>
                </div>
            </div>
        </div>
    </main>
</section>
