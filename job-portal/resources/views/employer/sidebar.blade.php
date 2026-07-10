<aside class="w-full lg:w-64 flex-shrink-0">
    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-6 sticky top-8">
        <!-- Profile Mini Card -->
        <div class="flex items-center gap-3 pb-6 mb-6 border-b border-gray-50">

    <div class="h-12 w-12 rounded-2xl bg-indigo-600 flex items-center justify-center text-white font-black shadow-lg shadow-indigo-200 overflow-hidden">

       @if(auth()->user()->companyProfile && auth()->user()->companyProfile->company_logo)

            <img
                src="{{ asset('storage/' . auth()->user()->companyProfile->company_logo) }}"
                alt="Company Logo"
                class="w-full h-full object-cover">

        @else

            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

        @endif

    </div>

    <div>

        <p class="text-sm font-black text-gray-900 leading-tight">

            {{ auth()->user()->companyProfile->company_name ?? auth()->user()->name }}

        </p>

        <p class="text-[10px] font-bold text-indigo-500 uppercase tracking-widest">

            Premium Employer

        </p>

    </div>

</div>

        <!-- Navigation Links -->
        <nav class="space-y-2">
            <a href="{{ route('dashboard') }}" 
               class="flex items-center gap-3 px-4 py-3.5 rounded-2xl text-sm font-bold transition-all {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Dashboard
            </a>

            <a href="{{ route('employer.jobs.create') }}" 
               class="flex items-center gap-3 px-4 py-3.5 rounded-2xl text-sm font-bold text-gray-500 hover:bg-gray-50 hover:text-gray-700 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Post New Job

            </a>

            <a href="{{ route('employer.applications') }}"
            class="flex items-center gap-3 px-4 py-3.5 rounded-2xl text-sm font-bold transition-all {{ request()->routeIs('employer.applications') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>

                Manage Applications
            </a>

                <a href="{{ route('employer.chosen.applicants') }}"
                class="flex items-center gap-3 px-4 py-3.5 rounded-2xl text-sm font-bold transition-all
                {{ request()->routeIs('employer.chosen.applicants') 
                        ? 'bg-indigo-50 text-indigo-600' 
                        : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7">
                        </path>
                    </svg>

                    Chosen Applicants
                </a>


                <a href="{{ route('employer.shortlisted.applicants') }}"
                class="flex items-center gap-3 px-4 py-3.5 rounded-2xl text-sm font-bold transition-all {{ request()->routeIs('employer.shortlisted') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5-2a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>

                    Shortlisted Applicants
                </a>

                 <a href="{{ route('employer.finalized.candidates') }}"
                class="flex items-center gap-3 px-4 py-3.5 rounded-2xl text-sm font-bold text-gray-500 hover:bg-gray-50 hover:text-gray-700 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Finalized Candidates
                </a>
                

            <a href="{{ route('employer.company.profile') }}"
               class="flex items-center gap-3 px-4 py-3.5 rounded-2xl text-sm font-bold text-gray-500 hover:bg-gray-50 hover:text-gray-700 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Company Profile
            </a>


            <!-- Added Settings Button -->
            <a href="{{ route('profile.edit') }}" 
               class="flex items-center gap-3 px-4 py-3.5 rounded-2xl text-sm font-bold transition-all {{ request()->routeIs('profile.edit') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Settings
            </a>


            <div class="pt-4 mt-4 border-t border-gray-50">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-2xl text-sm font-bold text-red-400 hover:bg-red-50 hover:text-red-600 transition-all text-left">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Logout
                    </button>
                </form>
            </div>
        </nav>
    </div>
</aside>