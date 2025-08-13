<x-guest-layout>
   <!-- Main container - ensures full viewport coverage -->
    <div class="fixed inset-0 h-screen w-screen overflow-hidden">
        <!-- Background container -->
        <div class="absolute inset-0">
            <!-- Background image - full screen with cover -->
            <img src="/images/bg.jpg" alt="Background" 
                 class="absolute inset-0 w-full h-full object-cover object-center">
            <!-- Dark overlay for better readability -->
            <div class="absolute inset-0 bg-black/20"></div>
        </div>

        <!-- Content container - centers card vertically and horizontally -->
        <div class="relative h-full w-full flex items-center justify-center p-4">
            <!-- Login card with glass effect -->
            <div class="w-full max-w-md bg-white bg-opacity-75 rounded-xl shadow-2xl border border-amber-200/50 overflow-hidden transition-all">
                <div class="p-8">
                    <!-- Logo section -->
                    <div class="text-center mb-8">
                        <div class="flex justify-center space-x-4 mb-6">
                            <div class="bg-white/90 p-3 rounded-full border border-amber-200/50 shadow-md">
                                <img src="/images/logo-kkn.png" alt="Logo KKN" class="h-14 w-auto">
                            </div>
                            <div class="bg-white/90 p-3 rounded-full border border-amber-200/50 shadow-md">
                                <img src="/images/logo-kabupaten.png" alt="Logo Kabupaten" class="h-14 w-auto">
                            </div>
                        </div>
                        <h1 class="text-4xl font-extrabold text-amber-700">SIPADES</h1>
                        <p class="text-lg text-amber-600 mt-2">Sistem Pengelolaan Aset Desa</p>
                    </div>

                    <!-- Login form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-lg font-medium text-amber-800 mb-1">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input id="email"
                            class="block w-full pl-10 pr-3 py-2 border border-amber-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500"
                            type="email" name="email" :value="old('email')" required autofocus
                            autocomplete="username" placeholder="email@desa.digital">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-lg font-medium text-amber-800 mb-1">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input id="password"
                            class="block w-full pl-10 pr-3 py-2 border border-amber-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500"
                            type="password" name="password" required autocomplete="current-password"
                            placeholder="••••••••">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600" />
                </div>
                <!-- Login Button -->
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 mt-8 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-a-500 transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
