<aside class="fixed left-0 top-0 h-screen w-72 bg-slate-950 text-slate-300 border-r border-slate-800 flex flex-col shadow-2xl z-50">

    <!-- Logo Section -->
    <div class="px-8 py-8">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
            <div class="flex-shrink-0">
                <img src="{{ asset('images/logo.png') }}" 
                     alt="Logo" 
                     class="h-10 w-auto object-contain transition-transform duration-300 group-hover:scale-110">
            </div>
            <div>
                <h2 class="font-bold text-xl text-white tracking-tight leading-none">
                    Job<span class="text-indigo-500">Portal</span>
                </h2>
                <p class="text-[10px] uppercase tracking-[2px] text-slate-500 font-semibold mt-1">
                    Admin Panel
                </p>
            </div>
        </a>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 px-4 space-y-6 overflow-y-auto custom-scrollbar">
        
        <!-- Main Group -->
        <div>
            <p class="px-4 text-[11px] font-bold text-slate-600 uppercase tracking-widest mb-3">Main Menu</p>
            <div class="space-y-1">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/20' : 'hover:bg-slate-900 hover:text-white' }}">
                    <i class="fas fa-chart-pie w-5"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
            </div>
        </div>

        <!-- Management Group -->
        <div>
            <p class="px-4 text-[11px] font-bold text-slate-600 uppercase tracking-widest mb-3">Management</p>
            <div class="space-y-1">
                <a href="{{ route('admin.candidates') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-900 hover:text-white transition-all">
                    <i class="fas fa-users text-slate-500 w-5"></i>
                    <span class="font-medium">Candidates</span>
                </a>

                <a href="{{ route('admin.companies') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-900 hover:text-white transition-all">
                    <i class="fas fa-building text-slate-500 w-5"></i>
                    <span class="font-medium">Companies</span>
                </a>

                <a href="{{ route('admin.jobs') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-900 hover:text-white transition-all">
                    <i class="fas fa-briefcase text-slate-500 w-5"></i>
                    <span class="font-medium">Jobs</span>
                </a>

                <a href="{{ route('admin.applications') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-900 hover:text-white transition-all">
                    <i class="fas fa-file-alt text-slate-500 w-5"></i>
                    <span class="font-medium">Applications</span>
                </a>

                
            </div>
        </div>

        <!-- System Group -->
        <div>
            <p class="px-4 text-[11px] font-bold text-slate-600 uppercase tracking-widest mb-3">System</p>
            <div class="space-y-1">
                <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-900 hover:text-white transition-all">
                    <i class="fas fa-tags text-slate-500 w-5"></i>
                    <span class="font-medium">Job Categories</span>
                </a>

                <a href="{{ route('admin.notifications') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-900 hover:text-white transition-all relative">
                    <i class="fas fa-bell text-slate-500 w-5"></i>
                    <span class="font-medium">Notifications</span>
                    <span class="absolute right-4 top-1/2 -translate-y-1/2 w-2 h-2 bg-red-500 rounded-full shadow-[0_0_8px_rgba(239,68,68,0.8)]"></span>
                </a>

               <!-- SETTINGS DROPDOWN -->
                <div x-data="{ openSettings: {{ request()->routeIs('admin.settings.*') ? 'true' : 'false' }} }">
                    <button
                        @click="openSettings = !openSettings"
                        class="w-full flex items-center justify-between px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.settings.*') ? 'bg-slate-900 text-white' : 'hover:bg-slate-900 hover:text-white' }}">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-cog text-slate-500 w-5"></i>
                            <span class="font-medium">Settings</span>
                        </div>
                        <i class="fas fa-chevron-down text-[10px] transition-transform duration-300"
                           :class="{ 'rotate-180': openSettings }"></i>
                    </button>

                    <div x-show="openSettings" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="ml-9 mt-2 space-y-1 border-l border-slate-800">
                        
                        <a href="{{ route('admin.settings.profile') }}"
                           class="block px-4 py-2 text-sm transition-colors {{ request()->routeIs('admin.settings.profile') ? 'text-indigo-400 font-semibold' : 'text-slate-500 hover:text-white' }}">
                            Profile Settings
                        </a>

                        <a href="{{ route('admin.settings.password') }}"
                           class="block px-4 py-2 text-sm transition-colors {{ request()->routeIs('admin.settings.password') ? 'text-indigo-400 font-semibold' : 'text-slate-500 hover:text-white' }}">
                            Change Password
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Bottom Profile & Logout Section -->
    <div class="mt-auto p-4 border-t border-slate-800 bg-slate-950/80 backdrop-blur-md">
        <div class="flex items-center gap-3 px-3 py-3 mb-3 bg-slate-900/50 rounded-2xl border border-slate-800/50">
            <!-- Dynamic Profile Image -->
            <div class="relative flex-shrink-0">
                <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=6366f1&color=fff' }}" 
                     alt="Admin Avatar" 
                     class="h-11 w-11 rounded-full object-cover border-2 border-indigo-500/30">
                <span class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-500 border-2 border-slate-950 rounded-full"></span>
            </div>
            
            <div class="overflow-hidden">
                <p class="text-sm font-bold text-white truncate leading-none mb-1">
                    {{ auth()->user()->name }}
                </p>
                <p class="text-[11px] text-slate-500 truncate italic">
                    {{ auth()->user()->email }}
                </p>
            </div>
        </div>

        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
        </form>

    <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
            class="w-full flex items-center justify-center gap-3 px-4 py-3 rounded-xl text-slate-400 bg-slate-900 hover:bg-red-500/10 hover:text-red-500 border border-slate-800 hover:border-red-500/20 transition-all duration-300 group">
        <i class="fas fa-power-off text-sm group-hover:scale-110 transition-transform"></i>
        <span class="font-bold text-sm uppercase tracking-wider">Logout System</span>
    </button>
        
    </div>

</aside>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #1e293b;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #334155;
    }
</style>