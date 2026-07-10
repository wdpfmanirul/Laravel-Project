<header class="bg-white/80 backdrop-blur-md border-b border-slate-100 sticky top-0 z-40 px-8 py-4 flex items-center justify-between">
    
    <!-- Left Side: Title & Greeting -->
    <div>
        <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight leading-none">
            @yield('title', 'Dashboard')
        </h1>
        <p class="text-sm text-slate-500 mt-1.5 flex items-center gap-1">
            <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
            Welcome back, <span class="font-semibold text-slate-700">{{ auth()->user()->name }}</span>
        </p>
    </div>

    <!-- Right Side: Search, Notifications & Profile -->
    <div class="flex items-center gap-4 lg:gap-8">
        
        <!-- Search Bar (Hidden on small screens) -->
        <div class="hidden md:flex items-center relative group">
            <i class="fas fa-search absolute left-4 text-slate-400 group-focus-within:text-indigo-500 transition-colors"></i>
            <input type="text" 
                   placeholder="Search anything..." 
                   class="pl-11 pr-4 py-2.5 bg-slate-100 border-none rounded-2xl text-sm w-64 focus:ring-2 focus:ring-indigo-500/20 focus:bg-white transition-all outline-none text-slate-600">
        </div>

        <div class="flex items-center gap-3 lg:gap-5 border-l border-slate-100 pl-6">
            
            <!-- Notification Button -->
            <button class="relative p-2.5 bg-slate-50 text-slate-500 hover:bg-indigo-50 hover:text-indigo-600 rounded-xl transition-all duration-300">
                <i class="fas fa-bell text-lg"></i>
                <!-- Red Dot Notification -->
                <span class="absolute top-2 right-2.5 w-2.5 h-2.5 bg-red-500 border-2 border-white rounded-full"></span>
            </button>

            <!-- User Profile Link/Button -->
            <a href="{{ route('admin.settings.profile') }}" class="flex items-center gap-3 p-1 pr-3 hover:bg-slate-50 rounded-2xl transition-all duration-300 group">
                <!-- User Image -->
                <div class="relative">
                    <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=6366f1&color=fff' }}" 
                         alt="Admin Image" 
                         class="h-10 w-10 rounded-xl object-cover border-2 border-white shadow-sm transition-transform group-hover:scale-105">
                </div>

                <!-- User Info (Hidden on very small screens) -->
                <div class="hidden sm:block text-left">
                    <p class="text-sm font-bold text-slate-800 group-hover:text-indigo-600 transition-colors leading-none mb-1">
                        {{ auth()->user()->name }}
                    </p>
                    <div class="flex items-center gap-1">
                        <span class="text-[10px] px-1.5 py-0.5 bg-indigo-50 text-indigo-600 font-bold rounded uppercase tracking-wider">
                            {{ auth()->user()->role ?? 'Admin' }}
                        </span>
                    </div>
                </div>
                
                <!-- Down Arrow Icon -->
                <i class="fas fa-chevron-down text-[10px] text-slate-400 group-hover:text-slate-600"></i>
            </a>

        </div>

    </div>
</header>