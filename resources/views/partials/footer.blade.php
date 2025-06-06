<footer class="bg-linear-to-b/oklch pt-12 from-[#FFEAC5] to-[#ffd6b6]">
    <div class="lg:mx-20 bg-[#8b5224] drop-shadow-lg rounded-t-[40px]">
        <div class="relative mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8 lg:pt-24">
            <div class="absolute end-4 top-4 sm:end-6 sm:top-6 lg:end-8 lg:top-8">
                <a class="inline-block rounded-full bg-[#5C3A1E] p-2 text-white shadow-sm transition hover:bg-[#3b2b1e] hover:scale-110 duration-300 sm:p-3 lg:p-4"
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
                <div class="text-center lg:text-left">
                    <div class="flex gap-4 px-2 items-center justify-center lg:justify-start">
                        <img src="{{ asset('assets/img/logo-doa-bunda.jpg') }}" alt="logo doa bunda"
                            class="rounded-full w-16 h-16 border-4 border-[#5C3A1E] shadow-lg hover:scale-105 transition duration-300">
                        <h1 class="font-bold text-2xl text-white">DoaBunda</h1>
                    </div>

                    <p class="mx-auto mt-6 max-w-md text-center leading-relaxed text-gray-200 lg:text-left">
                        Edgy. Langka. Original. Kalo lo ngerti, lo ngerti.
                    </p>

                    <div class="mt-6 flex justify-center lg:justify-start space-x-4">
                        <a href="#" class="text-gray-200 hover:text-white transition-colors">
                            <i class="ph text-2xl ph-whatsapp-logo"></i>
                        </a>
                        <a href="#" class="text-gray-200 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <ul class="mt-12 flex flex-wrap justify-center gap-6 md:gap-8 lg:mt-0 lg:justify-end lg:gap-12">
                    <li>
                        <a class="text-gray-200 hover:text-white transition-colors duration-300" href="{{ route('general.home') }}"> Home </a>
                    </li>

                    <li>
                        <a class="text-gray-200 hover:text-white transition-colors duration-300" href="{{ route('general.products.index') }}"> Product </a>
                    </li>

                    <li>
                        <a class="text-gray-200 hover:text-white transition-colors duration-300" href="{{ route('general.about') }}"> About </a>
                    </li>

                    <li>
                        <a class="text-gray-200 hover:text-white transition-colors duration-300" href="{{ route('general.contact') }}"> Contact </a>
                    </li>
                </ul>
            </div>

            <div class="mt-12 border-t border-gray-700 pt-8">
                <p class="text-center text-sm text-gray-300 lg:text-right">
                    DoaBunda &copy; 2025. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>
