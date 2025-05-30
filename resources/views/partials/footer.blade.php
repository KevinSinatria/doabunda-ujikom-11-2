<footer class="bg-linear-to-b/oklch from-[#FFEAC5] to-[#a87751]">
    <div class="relative mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8 lg:pt-24">
        <div class="absolute end-4 top-4 sm:end-6 sm:top-6 lg:end-8 lg:top-8">
            <a class="inline-block rounded-full bg-[#5C3A1E] p-2 text-white shadow-sm transition hover:bg-[#3b2b1e] sm:p-3 lg:p-4"
                href="#">
                <span class="sr-only">Back to top</span>

                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        <div class="lg:flex lg:items-end lg:justify-between">
            <div>
                <div class="flex gap-4 px-2 items-center justify-center lg:justify-start">
                    <img src="{{ asset('assets/img/logo-doa-bunda.jpg') }}" alt="logo doa bunda"
                        class="rounded-full w-12 h-12 border-2 border-gray-500">
                    <h1 class="font-bold text-xl">DoaBunda</h1>
                </div>

                <p class="mx-auto mt-6 max-w-md text-center leading-relaxed text-gray-800 lg:text-left">
                    Edgy. Langka. Original. Kalo lo ngerti, lo ngerti.
                </p>
            </div>

            <ul class="mt-12 flex flex-wrap justify-center gap-6 md:gap-8 lg:mt-0 lg:justify-end lg:gap-12">
                <li>
                    <a class="text-gray-700 transition hover:text-gray-700/75" href="{{ route('general.home') }}"> Home
                    </a>
                </li>

                <li>
                    <a class="text-gray-700 transition hover:text-gray-700/75"
                        href="{{ route('general.products.index') }}"> Product </a>
                </li>

                <li>
                    <a class="text-gray-700 transition hover:text-gray-700/75" href="{{ route('general.about') }}">
                        About </a>
                </li>

                <li>
                    <a class="text-gray-700 transition hover:text-gray-700/75" href="{{ route('general.contact') }}">
                        Contact </a>
                </li>
            </ul>
        </div>

        <p class="mt-12 text-center text-sm text-gray-700 lg:text-right">
            DoaBunda &copy; 2025. All rights reserved.
        </p>
    </div>
</footer>
