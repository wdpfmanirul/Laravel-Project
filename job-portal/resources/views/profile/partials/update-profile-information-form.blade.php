<section class="p-6 md:p-10">
    <header class="flex items-center gap-5 mb-8 pb-6 border-b border-gray-50">
        <!-- Profile Icon/Avatar -->
        <div class="h-14 w-14 bg-gradient-to-tr from-indigo-600 to-violet-500 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-indigo-100 shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </div>
        <div>
            <h2 class="text-xl font-black text-gray-900 tracking-tight">
                {{ __('Profile Information') }}
            </h2>
            <p class="text-sm text-gray-500 mt-1 leading-relaxed">
                {{ __("Update your account's public identity and contact details.") }}
            </p>
        </div>
    </header>

    <!-- Verification Logic Form -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6 max-w-xl">
        @csrf
        @method('patch')

        <!-- Full Name Field -->
        <div class="group">
            <x-input-label for="name" class="font-bold text-sm text-gray-700 mb-2 ml-1" :value="__('Full Name')" />
            <div class="relative">
                <x-text-input id="name" name="name" type="text" 
                    class="block w-full px-5 py-3.5 border-gray-200 rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-gray-50/40 group-focus-within:bg-white text-gray-800 font-medium" 
                    :value="old('name', $user->name)" required autofocus autocomplete="name" />
            </div>
            <x-input-error class="mt-2 text-xs" :messages="$errors->get('name')" />
        </div>

        <!-- Email Address Field -->
        <div class="group">
            <x-input-label for="email" class="font-bold text-sm text-gray-700 mb-2 ml-1" :value="__('Email Address')" />
            <div class="relative">
                <x-text-input id="email" name="email" type="email" 
                    class="block w-full px-5 py-3.5 border-gray-200 rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-gray-50/40 group-focus-within:bg-white text-gray-800 font-medium" 
                    :value="old('email', $user->email)" required autocomplete="username" />
            </div>
            <x-input-error class="mt-2 text-xs" :messages="$errors->get('email')" />

            <!-- Email Verification Logic -->
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-4 bg-amber-50/70 rounded-2xl border border-amber-100">
                    <p class="text-sm text-amber-800 flex items-center gap-2 font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600 shrink-0" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                        {{ __('Your email address is unverified.') }}
                    </p>

                    <button form="send-verification" class="mt-2 ml-7 text-sm font-bold text-indigo-600 hover:text-indigo-800 hover:underline transition">
                        {{ __('Re-send verification email?') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 ml-7 font-bold text-xs text-emerald-600 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            {{ __('Verification link has been sent.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center gap-5 pt-4 border-t border-gray-50">
            <x-primary-button class="px-8 py-3.5 rounded-xl font-bold bg-indigo-600 hover:bg-indigo-700 shadow-md shadow-indigo-100 transition-all hover:shadow-lg active:scale-95">
                {{ __('Save Changes') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center text-sm font-bold text-emerald-600 bg-emerald-50 px-4 py-2 rounded-xl border border-emerald-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ __('Saved Details.') }}
                </div>
            @endif
        </div>
    </form>
</section>