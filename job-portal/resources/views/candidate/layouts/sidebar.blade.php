<!-- Sidebar Container -->
<div class="w-64 bg-white shadow-2xl h-screen fixed border-r border-gray-100 flex flex-col">
   
    <!-- 2. NAVIGATION (Scrollable area) -->
    <nav class="flex-1 overflow-y-auto p-4 space-y-1 custom-scrollbar">
        
        <!-- MAIN MENU -->
        <div class="pt-2 pb-2">
            <p class="text-[11px] font-bold text-gray-400 uppercase px-3 mb-2 tracking-wider">Main Menu</p>
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all duration-200 group
               {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-blue-200 shadow-lg' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3"/>
                </svg>
                <span class="font-medium">Dashboard</span>
            </a>
        </div>

        <!-- PROFILE SETUP -->
        <div class="pt-4 pb-2">
            <p class="text-[11px] font-bold text-gray-400 uppercase px-3 mb-2 tracking-wider">Profile Setup</p>
            <a href="{{ route('candidate.profile.personal') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all duration-200 mb-1
               {{ request()->is('candidate/profile/*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                <span class="font-medium">Edit Profile</span>
            </a>
            <a href="{{ route('candidate.cv') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all duration-200
               {{ request()->routeIs('candidate.cv') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586l5.414 5.414V19a2 2 0 01-2 2z"/>
                </svg>
                <span class="font-medium">My Professional CV</span>
            </a>
        </div>

        <!-- JOB ACTIVITIES -->
        <div class="pt-4 pb-2">
            <p class="text-[11px] font-bold text-gray-400 uppercase px-3 mb-2 tracking-wider">Job Activities</p>
            <a href="{{ route('candidate.applied.jobs') }}" 
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all duration-200 mb-1
               {{ request()->routeIs('candidate.applied.jobs') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/>
                </svg>
                <span class="font-medium">Applied Jobs</span>
            </a>
            <a href="{{ route('candidate.saved.jobs') }}" 
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all duration-200 mb-1
               {{ request()->routeIs('candidate.saved.jobs') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5v14l7-3 7 3V5a2 2 0 00-2-2H7a2 2 0 00-2 2z"/>
                </svg>
                <span class="font-medium">Saved Jobs</span>
            </a>
            <a href="{{ route('candidate.interview.schedule') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all duration-200 mb-1
               {{ request()->routeIs('candidate.interview.schedule') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <!-- English Comment: Update 'candidate.interview.schedule' route if needed -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/>
                </svg>
                <span class="font-medium">Interview Schedule</span>
            </a>
        </div>

        <!-- ACCOUNT -->
        <div class="pt-4 pb-2">
            <p class="text-[11px] font-bold text-gray-400 uppercase px-3 mb-2 tracking-wider">Account</p>
            <a href="{{ route('profile.edit') }}" 
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all duration-200
               {{ request()->routeIs('profile.edit') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="font-medium">Settings</span>
            </a>
        </div>
    </nav>

    <!-- 3. FOOTER SECTION (Logout) -->
    <div class="p-4 border-t border-gray-100 bg-gray-50/50">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="w-full flex items-center justify-center gap-3 px-4 py-3 rounded-xl text-white bg-red-500 hover:bg-red-600 shadow-md shadow-red-100 transition duration-300 font-semibold text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V7"/>
                </svg>
                Logout Account
            </button>
        </form>
        
        <!-- User Minimal Info -->
        <div class="mt-4 flex items-center gap-3 px-2">
            <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xs capitalize">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div class="overflow-hidden">
                <p class="text-xs font-bold text-gray-800 truncate">{{ Auth::user()->name }}</p>
                <p class="text-[10px] text-gray-500 truncate italic">Candidate Account</p>
            </div>
        </div>
    </div>
</div>

<style>
    /* সুন্দর স্ক্রলবার এর জন্য */
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #e5e7eb;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #d1d5db;
    }
</style>