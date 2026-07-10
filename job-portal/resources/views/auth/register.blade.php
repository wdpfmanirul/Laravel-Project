<x-guest-layout>
    <nav class="absolute top-0 left-0 w-full px-6 py-3 flex justify-between items-center bg-white/90 backdrop-blur-sm border-b border-gray-100">
        <a href="/" class="text-xl font-extrabold flex items-center">
            @if(file_exists(public_path('images/logo.png')))
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-auto mr-2 rounded-lg">
            @endif
            <span class="text-blue-900 tracking-tighter">Job</span><span class="text-pink-600 tracking-tighter">Portal</span>
        </a>
        <a href="/" class="text-xs font-bold text-gray-500 hover:text-blue-600 transition flex items-center gap-1">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Back
        </a>
    </nav>

    <div class="pt-6">
        <div class="mb-6 text-center">
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight italic">Create Account</h2>
            <p class="text-xs text-gray-500 mt-1 italic">Join us and start your journey</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Full Name')" class="text-sm font-semibold" />
                <x-text-input id="name" class="block mt-1 w-full border-gray-200 rounded-xl py-2.5 text-sm" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div>
                <x-input-label :value="__('Join as a...')" class="text-sm font-semibold mb-2" />
                <div class="grid grid-cols-2 gap-3">
                    <label class="flex flex-col items-center p-3 border-2 border-gray-100 rounded-xl cursor-pointer hover:border-blue-200 has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50">
                        <input type="radio" name="role" value="candidate" class="hidden" required>
                        <span class="text-xl">🔍</span>
                        <span class="text-xs font-bold">Candidate</span>
                    </label>
                    <label class="flex flex-col items-center p-3 border-2 border-gray-100 rounded-xl cursor-pointer hover:border-blue-200 has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50">
                        <input type="radio" name="role" value="employer" class="hidden">
                        <span class="text-xl">💼</span>
                        <span class="text-xs font-bold">Employer</span>
                    </label>
                </div>
            </div>

            <div>
                <x-input-label for="email" :value="__('Email Address')" class="text-sm font-semibold" />
                <x-text-input id="email" class="block mt-1 w-full border-gray-200 rounded-xl py-2.5 text-sm" type="email" name="email" required />
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-sm font-semibold" />
                    <x-text-input id="password" class="block mt-1 w-full border-gray-200 rounded-xl py-2.5 text-sm" type="password" name="password" required />
                </div>
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm')" class="text-sm font-semibold" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-xl py-2.5 text-sm" type="password" name="password_confirmation" required />
                </div>
            </div>

            <button type="submit" class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-md transition-all text-sm">
                Register Now
            </button>
        </form>
    </div>
</x-guest-layout>