<section class="p-6 md:p-10 border border-red-50 rounded-[2rem]">
    <header class="flex items-center gap-5 mb-8 pb-6 border-b border-gray-50">
        <!-- Warning Icon -->
        <div class="h-14 w-14 bg-gradient-to-tr from-rose-500 to-red-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-red-100 shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </div>
        <div>
            <h2 class="text-xl font-black text-gray-900 tracking-tight">
                {{ __('Delete Account') }}
            </h2>
            <p class="mt-1 text-sm text-gray-500 leading-relaxed max-w-2xl">
                {{ __('Once your account is deleted, all of its resources and data will be permanently removed. Before proceeding, please download any important data.') }}
            </p>
        </div>
    </header>

    <div class="pt-2">
        <x-danger-button
            class="px-6 py-3.5 rounded-xl font-bold bg-rose-600 hover:bg-rose-700 transition-all shadow-md shadow-rose-100 hover:shadow-lg active:scale-95"
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
            </svg>
            {{ __('Permanently Delete Account') }}
        </x-danger-button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 md:p-10 bg-white rounded-3xl">
            @csrf
            @method('delete')

            <div class="text-center mb-6">
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-2xl bg-red-50 text-red-600 mb-4 shadow-sm">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-black text-gray-900 tracking-tight">
                    {{ __('Final Warning!') }}
                </h2>
                <p class="mt-3 text-sm text-gray-500 max-w-md mx-auto leading-relaxed">
                    {{ __('Are you absolutely sure? This action cannot be undone. Please enter your password to confirm account deletion.') }}
                </p>
            </div>

            <div class="mt-6 max-w-md mx-auto">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="block w-full px-5 py-3.5 border-gray-200 rounded-2xl focus:ring-rose-500 focus:border-rose-500 placeholder-gray-300"
                    placeholder="{{ __('Verify your account password') }}"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-xs" />
            </div>

            <div class="mt-8 flex flex-col sm:flex-row justify-center gap-3 max-w-md mx-auto">
                <x-secondary-button x-on:click="$dispatch('close')" class="w-full sm:w-auto px-6 py-3.5 rounded-xl font-bold justify-center border-gray-200 text-gray-700 hover:bg-gray-50 transition-all">
                    {{ __('Keep My Account') }}
                </x-secondary-button>

                <x-danger-button class="w-full sm:w-auto px-6 py-3.5 rounded-xl font-bold bg-rose-600 hover:bg-rose-700 justify-center shadow-lg shadow-rose-100 transition-all active:scale-95">
                    {{ __('Yes, Delete It') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>