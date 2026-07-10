<x-guest-layout>
    <!-- Navigation Bar -->
    <nav class="absolute top-0 left-0 w-full px-6 py-4 flex justify-between items-center bg-white/80 backdrop-blur-md border-b border-gray-100">
        <a href="/" class="text-xl font-black flex items-center tracking-tight group">
            @if(file_exists(public_path('images/logo.png')))
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-9 w-auto mr-2 rounded-lg transform group-hover:scale-105 transition-all duration-200">
            @endif
            <span class="text-rose-700 font-extrabold">Admin</span>
            <span class="text-gray-900 ml-1">Portal</span>
        </a>

        <a href="/" class="text-xs font-bold text-gray-400 hover:text-rose-600 flex items-center gap-1 transition-colors duration-200 bg-gray-50 hover:bg-rose-50 px-3 py-1.5 rounded-lg border border-gray-100">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Home
        </a>
    </nav>

    <!-- Main Content Area -->
    <div class="pt-14 pb-4">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-14 h-14 bg-rose-50 text-rose-600 rounded-2xl mb-4 border border-rose-100 shadow-sm shadow-rose-100/50">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>

            <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight">
                Administrator Login
            </h2>

            <p class="text-xs text-gray-400 mt-1.5 font-medium tracking-wide uppercase">
                Secure Control Panel Access
            </p>
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('admin.login.store') }}" class="space-y-5">
            @csrf

            <!-- Email Input -->
            <div>
                <x-input-label for="email" value="Admin Email" class="text-xs font-bold text-gray-600 uppercase tracking-wider mb-1" />

                <div class="relative">
                    <x-text-input
                        id="email"
                        class="block w-full rounded-xl border-gray-200 bg-gray-50/50 focus:bg-white focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10 transition-all duration-200 text-sm py-3 px-4"
                        type="email"
                        name="email"
                        required
                        autofocus
                        placeholder="name@domain.com"
                    />
                </div>

                <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs font-medium" />
            </div>

            <!-- Password Input -->
            <div>
                <div class="flex justify-between items-center mb-1">
                    <x-input-label for="password" value="Password" class="text-xs font-bold text-gray-600 uppercase tracking-wider" />
                    
                    <a href="{{ route('password.request') }}" class="text-xs font-bold text-rose-600 hover:text-rose-700 transition-colors duration-150">
                        Forgot Password?
                    </a>
                </div>

                <div class="relative">
                    <x-text-input
                        id="password"
                        class="block w-full rounded-xl border-gray-200 bg-gray-50/50 focus:bg-white focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10 transition-all duration-200 text-sm py-3 px-4"
                        type="password"
                        name="password"
                        required
                        placeholder="••••••••"
                    />
                </div>

                <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs font-medium" />
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="w-full bg-rose-600 hover:bg-rose-700 active:bg-rose-800 text-white font-bold py-3.5 px-4 rounded-xl shadow-md shadow-rose-600/10 hover:shadow-lg hover:shadow-rose-600/20 active:scale-[0.99] transition-all duration-150 text-sm tracking-wide"
            >
                Login to Admin Panel
            </button>
        </form>
    </div>
</x-guest-layout>