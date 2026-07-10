<x-guest-layout>
    <!-- Header Section -->
    <div class="text-center mb-8">
        <!-- Security Shield Icon -->
        <div class="inline-flex items-center justify-center w-16 h-16 bg-red-50 rounded-full mb-4 text-red-600">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m0 0v3m0-3h3m-3 0H9m12-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
        </div>

        <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Security Check</h2>
        <p class="mt-2 text-sm text-gray-500 px-6">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
        @csrf

        <!-- Password Field -->
        <div>
            <x-input-label for="password" :value="__('Enter Password')" class="text-gray-700 font-semibold" />
            
            <div class="relative mt-1">
                <x-text-input id="password" 
                    class="block w-full border-gray-300 focus:ring-red-500 focus:border-red-500 rounded-xl shadow-sm py-3 px-4"
                    type="password"
                    name="password"
                    placeholder="Your current password"
                    required 
                    autocomplete="current-password" />
            </div>
            
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col space-y-3">
            <x-primary-button class="w-full flex justify-center py-3 bg-red-600 hover:bg-red-700 text-white font-bold rounded-xl shadow-lg transition-all duration-300 transform active:scale-[0.98]">
                {{ __('Confirm & Continue') }}
            </x-primary-button>
            
            <a href="javascript:history.back()" class="text-center text-sm font-semibold text-gray-500 hover:text-gray-800 transition-colors duration-200">
                Cancel and go back
            </a>
        </div>
    </form>
</x-guest-layout>