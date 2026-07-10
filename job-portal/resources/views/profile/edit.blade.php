<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-indigo-50 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <h2 class="font-black text-xl text-gray-900 tracking-tight leading-tight">
                {{ __('Account Settings') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6 bg-gray-50/50 min-h-[calc(100vh-64px)]" 
         x-data="{ 
            activeTab: '{{ session('status') === 'password-updated' || $errors->updatePassword->isNotEmpty() ? 'password' : ( $errors->userDeletion->isNotEmpty() ? 'delete' : 'profile' ) }}' 
         }">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Grid Layout: Left Sidebar Buttons, Right Dynamic Content -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
                
                <!-- Left Navigation Panel -->
                <div class="md:col-span-1 bg-white p-3 rounded-2xl border border-gray-100 shadow-sm space-y-1">
                    <!-- Profile Info -->
                    <button @click="activeTab = 'profile'" 
                            :class="activeTab === 'profile' ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50'"
                            class="w-full py-3 px-4 rounded-xl font-bold text-sm transition-all duration-150 flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>Profile Info</span>
                    </button>

                    <!-- Password -->
                    <button @click="activeTab = 'password'" 
                            :class="activeTab === 'password' ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50'"
                            class="w-full py-3 px-4 rounded-xl font-bold text-sm transition-all duration-150 flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        <span>Password</span>
                    </button>

                    <!-- Danger Zone -->
                    <button @click="activeTab = 'delete'" 
                            :class="activeTab === 'delete' ? 'bg-rose-50 text-rose-700' : 'text-gray-600 hover:text-rose-600 hover:bg-rose-50/30'"
                            class="w-full py-3 px-4 rounded-xl font-bold text-sm transition-all duration-150 flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        <span>Danger Zone</span>
                    </button>
                </div>

                <!-- Right Form Content Panel -->
                <div class="md:col-span-3 bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden min-h-[400px]">
                    <!-- Profile Information Panel -->
                    <div x-show="activeTab === 'profile'" 
                         x-transition:enter="transition ease-out duration-150">
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    <!-- Password Update Panel -->
                    <div x-show="activeTab === 'password'" 
                         x-cloak
                         x-transition:enter="transition ease-out duration-150">
                        @include('profile.partials.update-password-form')
                    </div>

                    <!-- Account Deletion Panel -->
                    <div x-show="activeTab === 'delete'" 
                         x-cloak
                         x-transition:enter="transition ease-out duration-150">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>