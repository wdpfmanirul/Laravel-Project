<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Original Logo Logic -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}"  class="text-2xl font-black tracking-tighter flex items-center">
                        @if(file_exists(public_path('images/logo.png')))
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-auto mr-2 rounded-lg">
                        @endif
                        <span class="text-blue-900">Job</span><span class="text-pink-600">Portal</span>
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('dashboard')" class="font-bold">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="font-bold">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('jobs.index')" :active="request()->routeIs('jobs.index')" class="font-bold">
                        {{ __('Find Jobs') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                

<div x-data="{ open: false }" class="relative mr-3">

    {{-- Bell Button --}}
    <button @click="open = !open"
    class="relative p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-xl">

    🔔

    @if($unreadCount > 0)
        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] px-1.5 rounded-full">
            {{ $unreadCount }}
        </span>
    @endif
</button>

    {{-- Dropdown --}}
    <div x-show="open" @click.away="open = false"
        class="absolute right-0 mt-2 bg-white shadow-lg rounded-lg w-80 z-50">

        @forelse($notifications as $note)
            <a href="{{ $note->data['url'] ?? '#' }}" class="block p-3 border-b hover:bg-gray-50">
                <p class="font-bold">{{ $note->data['title'] }}</p>
                <p class="text-sm text-gray-500">{{ $note->data['message'] }}</p>
            </a>
        @empty
            <p class="p-3 text-gray-500">No new notifications</p>
        @endforelse

    </div>
</div>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-gray-200 text-sm font-bold rounded-xl text-gray-700 bg-white hover:border-blue-300 transition shadow-sm">
                            <span class="mr-2">👤</span>
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="ms-2 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 text-[10px] text-gray-400 font-black uppercase tracking-widest border-b border-gray-50">
                            {{ Auth::user()->email }}
                        </div>
                        <x-dropdown-link :href="route('profile.edit')"> {{ __('My Profile Setting') }} </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-500 font-bold">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile menu button -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-md text-gray-400 hover:bg-gray-100 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>