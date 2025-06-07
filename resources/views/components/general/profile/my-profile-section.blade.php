<section class="pt-24 lg:pt-16 flex flex-col justify-center items-center w-full px-12 lg:px-24">
    {{-- Header of my profile --}}
    <header class="w-full text-center mb-8">
        <h1 class="text-3xl font-semibold text-[#604c10] relative inline-block">
            My Profile
            <div
                class="absolute -bottom-2 left-0 w-full h-1 bg-gradient-to-r from-[#FFAB00] via-[#FFC107] to-[#FFAB00] rounded-full">
            </div>
        </h1>
    </header>

    {{-- Main content of my profile --}}
    <main x-data="{ isEdit: false }"
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
            <button x-on:click="isEdit = !isEdit" x-text="isEdit ? 'Cancel' : 'Edit Profile'"
                x-bind:class="isEdit ? 'bg-red-500 hover:bg-red-600' : 'bg-[#FFAB00] hover:bg-[#FFC107]'"
                class="w-full px-4 py-2 rounded-lg text-white font-medium shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                Edit Profile
            </button>
            <a class="w-full bg-red-500 flex gap-4 justify-center items-center px-4 py-2 rounded-lg text-white font-medium shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5" href="{{ route('general.auth.signout') }}">
                <i class="ph ph-sign-out text-[24px]"></i><span>Sign Out</span>
            </a>
        </div>

        <div class="flex flex-2 w-full flex-col px-4 lg:px-8 py-4 lg:py-8 justify-center items-center relative z-10">
            <form class="w-full flex flex-col gap-4" action="{{ route('general.profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="w-full flex flex-col justify-start items-start">
                    <label for="username" class="mb-1 text-gray-800 font-medium flex items-center gap-2">
                        <i class="ph ph-user text-[#604c10]"></i>
                        Username
                    </label>
                    <input type="text" name="username"
                        x-bind:class="isEdit ? 'bg-white border-[#FFAB00] focus:border-[#FFC107]' : 'bg-gray-100 text-gray-600'"
                        class="py-2 px-3 rounded-xl w-full text-[#322603] border-2 focus:outline-none focus:ring-2 focus:ring-[#FFC107]/20 transition-all duration-300"
                        placeholder="Username..." value="{{ $user->username }}" x-bind:disabled="!isEdit" required>
                </div>

                <div class="w-full flex flex-col justify-start items-start">
                    <label for="email" class="mb-1 text-gray-800 font-medium flex items-center gap-2">
                        <i class="ph ph-envelope text-[#604c10]"></i>
                        Email
                    </label>
                    <p class="py-2 bg-gray-100 text-gray-600 px-3 rounded-xl w-full border-2 border-transparent">
                        {{ $user->email }}
                    </p>
                </div>

                <div class="w-full flex flex-col justify-start items-start">
                    <label for="password" class="mb-1 text-gray-800 font-medium flex items-center gap-2">
                        <i class="ph ph-lock text-[#604c10]"></i>
                        Password
                    </label>
                    <input type="password" name="password"
                        x-bind:class="isEdit ? 'bg-white border-[#FFAB00] focus:border-[#FFC107]' : 'bg-gray-100 text-gray-600'"
                        class="py-2 px-3 rounded-xl w-full text-[#322603] border-2 focus:outline-none focus:ring-2 focus:ring-[#FFC107]/20 transition-all duration-300"
                        placeholder="Kosongkan jika tidak ingin mengganti password..." x-bind:disabled="!isEdit">
                </div>

                <button type="submit"
                    class="py-2 px-4 rounded-lg bg-emerald-500 text-white font-medium shadow-md hover:bg-green-600 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5"
                    x-transition.origin.top.duration.100 x-show="isEdit">
                    <span class="flex items-center justify-center gap-2">
                        <i class="ph ph-check"></i>
                        Save Changes
                    </span>
                </button>
            </form>
        </div>
    </main>
</section>
