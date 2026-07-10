<section class="p-6 md:p-10">
    <header class="flex items-center gap-5 mb-8 pb-6 border-b border-gray-50">
        <!-- Security Icon -->
        <div class="h-14 w-14 bg-gradient-to-tr from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-orange-100 shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>
        <div>
            <h2 class="text-xl font-black text-gray-900 tracking-tight">
                {{ __('Update Password') }}
            </h2>
            <p class="text-sm text-gray-500 mt-1 leading-relaxed">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        </div>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6 max-w-xl">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="group">
            <x-input-label for="update_password_current_password" class="font-bold text-sm text-gray-700 mb-2 ml-1" :value="__('Current Password')" />
            <div class="relative">
                <x-text-input id="update_password_current_password" name="current_password" type="password" 
                    class="block w-full px-5 py-3.5 border-gray-200 rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-gray-50/40 group-focus-within:bg-white placeholder-gray-300 font-medium" 
                    autocomplete="current-password" placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-xs" />
        </div>

        <!-- New Password -->
        <div class="group">
            <x-input-label for="update_password_password" class="font-bold text-sm text-gray-700 mb-2 ml-1" :value="__('New Password')" />
            <div class="relative">
                <x-text-input id="update_password_password" name="password" type="password" 
                    class="block w-full px-5 py-3.5 border-gray-200 rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-gray-50/40 group-focus-within:bg-white placeholder-gray-300 font-medium" 
                    autocomplete="new-password" placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-xs" />
        </div>

        <!-- Confirm Password -->
        <div class="group">
            <x-input-label for="update_password_password_confirmation" class="font-bold text-sm text-gray-700 mb-2 ml-1" :value="__('Confirm New Password')" />
            <div class="relative">
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                    class="block w-full px-5 py-3.5 border-gray-200 rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-gray-50/40 group-focus-within:bg-white placeholder-gray-300 font-medium" 
                    autocomplete="new-password" placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-xs" />
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-5 pt-4 border-t border-gray-50">
            <x-primary-button class="px-8 py-3.5 rounded-xl font-bold bg-indigo-600 hover:bg-indigo-700 shadow-md shadow-indigo-100 transition-all hover:shadow-lg active:scale-95">
                {{ __('Update Password') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center text-sm font-bold text-emerald-600 bg-emerald-50 px-4 py-2 rounded-xl border border-emerald-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ __('Password Secured.') }}
                </div>
            @endif
        </div>
    </form>
</section>