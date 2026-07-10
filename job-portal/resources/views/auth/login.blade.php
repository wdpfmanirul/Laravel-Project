<x-guest-layout>
    <!-- Slim Modern Header -->
    <nav class="absolute top-0 left-0 w-full px-6 py-3 flex justify-between items-center bg-white/90 backdrop-blur-sm border-b border-gray-100">
        <a href="/" class="text-xl font-extrabold flex items-center">
            @if(file_exists(public_path('images/logo.png')))
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-auto mr-2 rounded-lg">
            @endif
            <span class="text-blue-900 tracking-tighter">Job</span><span class="text-pink-600 tracking-tighter">Portal</span>
        </a>
        <a href="/" class="text-xs font-bold text-gray-500 hover:text-blue-600 transition flex items-center gap-1">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Back to Home
        </a>
    </nav>

    <div class="pt-6">
        <div class="mb-8 text-center">
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight italic">Welcome Back</h2>
            <p class="text-xs text-gray-500 mt-1 italic">Sign in to manage your account</p>
        </div>

        <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email Address')" class="text-gray-700 font-semibold text-sm" />
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" /></svg>
                    </div>
                    <x-text-input id="email" class="block w-full pl-9 border-gray-200 rounded-xl py-2.5 text-sm focus:ring-blue-500 focus:border-blue-500 shadow-sm" type="email" name="email" :value="old('email')" required autofocus placeholder="name@example.com" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <div>
                <div class="flex items-center justify-between mb-1">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold text-sm" />
                    @if (Route::has('password.request'))
                        <a class="text-[11px] font-bold text-blue-600 hover:text-blue-800" href="{{ route('password.request') }}">Forgot?</a>
                    @endif
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                    </div>
                    <x-text-input id="password" class="block w-full pl-9 border-gray-200 rounded-xl py-2.5 text-sm focus:ring-blue-500 focus:border-blue-500 shadow-sm" type="password" name="password" required placeholder="••••••••" />
                </div>
            </div>

            <div class="flex items-center">
                <input id="remember_me" type="checkbox" class="h-3.5 w-3.5 rounded border-gray-300 text-blue-600 focus:ring-blue-500 cursor-pointer" name="remember">
                <label for="remember_me" class="ml-2 block text-xs text-gray-500 cursor-pointer italic">Remember me</label>
            </div>

            <button type="submit" class="w-full flex justify-center py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-md transition-all active:scale-95 text-sm">
                Sign In
            </button>

            <p class="text-center text-xs text-gray-500 mt-6">
                New here? <a href="{{ route('register') }}" class="font-bold text-blue-600 hover:underline">Create account</a>
            </p>
        </form>
    </div>
</x-guest-layout>