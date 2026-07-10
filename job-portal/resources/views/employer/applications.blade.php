<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen font-sans antialiased">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Layout Grid -->
            <div class="flex flex-col lg:flex-row gap-8 items-start">

                <!-- Sidebar -->
                @include('employer.sidebar')

                <!-- Main Content -->
                <div class="flex-1 w-full space-y-8">

                    <!-- Header Section -->
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
                        <div>
                            <nav class="flex items-center gap-2 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">
                                <a href="{{ route('employer.dashboard') }}" class="hover:text-indigo-600 transition-colors">
                                    Dashboard
                                </a>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                                <span class="text-gray-600 font-bold">Applicants</span>
                            </nav>

                            <h2 class="text-2xl sm:text-3xl font-black text-gray-900 tracking-tight">
                                @if(isset($job))
                                    Applicants for: <span class="text-indigo-600">{{ $job->title }}</span>
                                @else
                                    All Job Applications
                                @endif
                            </h2>
                            <p class="text-sm text-gray-500 mt-1 italic">
                                Review and manage candidates who applied for your opportunities.
                            </p>
                        </div>

                    </div>
               <div class="flex flex-wrap gap-3 mt-4">

    {{-- ALL --}}
    <a href="{{ route('employer.applications') }}"
       class="px-4 py-2 rounded-xl text-sm font-bold
       {{ empty($category) ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-700' }}">
        All Applications
    </a>

    {{-- CATEGORY BUTTONS --}}
    @foreach($categories as $cat)

        <a href="{{ route('employer.applications', ['category' => $cat->id]) }}"
           class="px-4 py-2 rounded-xl text-sm font-bold
           {{ $category == $cat->id ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-700' }}">

            {{ $cat->name }}

        </a>

    @endforeach

</div>
                    <!-- Notification Message -->
                    @if(session('success'))
                        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-4 rounded-2xl font-semibold flex items-center gap-3 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Total</p>
                                <p class="text-2xl font-black text-gray-900">{{ $applications->count() }}</p>
                            </div>
                            <div class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                        </div>
                        
                        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">1st Choice</p>
                                <p class="text-2xl font-black text-emerald-600">{{ $applications->where('choice_order', 1)->count() }}</p>
                            </div>
                            <div class="p-2.5 bg-emerald-50 text-emerald-600 rounded-xl">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                            </div>
                        </div>

                        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">2nd Choice</p>
                                <p class="text-2xl font-black text-blue-600">{{ $applications->where('choice_order', 2)->count() }}</p>
                            </div>
                            <div class="p-2.5 bg-blue-50 text-blue-600 rounded-xl">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                        </div>

                        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">3rd Choice</p>
                                <p class="text-2xl font-black text-amber-500">{{ $applications->where('choice_order', 3)->count() }}</p>
                            </div>
                            <div class="p-2.5 bg-amber-50 text-amber-500 rounded-xl">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- Optimized 3-Column Applicants Card Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($applications as $app)
                            <div class="bg-white border border-gray-100 rounded-3xl p-5 shadow-sm hover:shadow-md hover:border-indigo-100 transition-all flex flex-col justify-between relative overflow-hidden group">
                                
                                <!-- Top: Header Info & Date -->
                                <div>
                                    <div class="flex items-start justify-between gap-3 mb-4">
                                        <div class="flex items-center gap-3 min-w-0">
                                            @if($app->candidateProfile && $app->candidateProfile->photo)
                                                <img src="{{ asset('storage/' . $app->candidateProfile->photo) }}"
                                                     class="h-12 w-12 rounded-2xl object-cover ring-4 ring-gray-50 group-hover:ring-indigo-50 transition-all shadow-sm shrink-0">
                                            @else
                                                <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-black text-sm shadow-sm shrink-0">
                                                    {{ strtoupper(substr($app->user->name ?? 'U', 0, 1)) }}
                                                </div>
                                            @endif
                                            <div class="min-w-0">
                                                <h3 class="text-sm font-bold text-gray-900 leading-snug group-hover:text-indigo-600 transition-colors truncate" title="{{ $app->user->name ?? 'Unknown Candidate' }}">
                                                    {{ $app->user->name ?? 'Unknown Candidate' }}
                                                </h3>
                                                <div class="flex items-center gap-1 text-[11px] text-gray-500 mt-0.5 font-medium">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                    </svg>
                                                    <span class="truncate" title="{{ $app->user->email }}">{{ $app->user->email ?? 'N/A' }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <span class="text-[10px] font-bold text-gray-400 bg-gray-50 px-2 py-0.5 rounded-md shrink-0">
                                            {{ $app->created_at->format('M d') }}
                                        </span>
                                    </div>

                                    <!-- Middle: Cover Message Box -->
                                   <div class="mb-4">
                                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.15em] mb-2">Expected Salary</p>
                                        
                                        {{-- এখানে $app->message এর বদলে $app->expected_salary দিন --}}
                                        @if($app->expected_salary)
                                            <div class="group flex items-center gap-3 bg-emerald-50/50 border border-emerald-100 p-3 rounded-2xl hover:bg-emerald-50 transition-colors">
                                                {{-- টাকা আইকন --}}
                                                <div class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center text-emerald-600 font-bold text-sm">
                                                    ৳
                                                </div>
                                                
                                                {{-- স্যালারি অ্যামাউন্ট --}}
                                                <div>
                                                    <p class="text-sm font-black text-emerald-700 leading-none">
                                                        {{-- এখানেও $app->expected_salary দিন --}}
                                                        {{ number_format($app->expected_salary, 0) }} <span class="text-[10px] font-bold uppercase text-emerald-500/70 ml-1">BDT</span>
                                                    </p>
                                                    <p class="text-[9px] font-bold text-emerald-600/60 uppercase tracking-tighter mt-1">Monthly (Negotiable)</p>
                                                </div>
                                            </div>
                                        @else
                                            <div class="bg-gray-50 border border-dashed border-gray-200 p-3 rounded-2xl flex items-center gap-2">
                                                <span class="text-gray-400 text-sm">🚫</span>
                                                <p class="text-xs text-gray-400 font-medium italic">Salary not specified</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Bottom: Action Buttons -->
                                <div class="border-t border-gray-50 pt-3.5 mt-auto space-y-3.5">
                                    <div class="flex items-center justify-between gap-2">
                                        <!-- View CV Button -->
                                        <a href="{{ route('employer.candidate.cv', $app->user->id) }}"
                                           target="_blank"
                                           class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-xl text-[11px] font-bold bg-indigo-50 text-indigo-700 hover:bg-indigo-600 hover:text-white transition-all shadow-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            Resume
                                        </a>

                                        <!-- Choice Status Badge -->
                                        @if($app->choice_order)
                                            <span class="text-[9px] font-black uppercase tracking-wider px-2 py-0.5 rounded-md shadow-sm shrink-0
                                                {{ $app->choice_order == 1 ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : '' }}
                                                {{ $app->choice_order == 2 ? 'bg-blue-50 text-blue-700 border border-blue-200' : '' }}
                                                {{ $app->choice_order == 3 ? 'bg-amber-50 text-amber-700 border border-amber-200' : '' }}">
                                                {{ $app->choice_order }}{{ $app->choice_order == 1 ? 'st' : ($app->choice_order == 2 ? 'nd' : 'rd') }} Choice
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Choice Selection Actions -->
                                    <div>
                                        <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1.5">Update Status</p>
                                        <div class="grid grid-cols-3 gap-1.5">
                                            <!-- 1st Choice -->
                                            <form method="POST" action="{{ route('employer.applications.choice', $app->id) }}" class="w-full">
                                                @csrf
                                                <input type="hidden" name="choice_order" value="1">
                                                <button type="submit" class="w-full text-center py-1 rounded-lg text-[10px] font-bold uppercase tracking-wider transition-all border
                                                    {{ $app->choice_order == 1 
                                                        ? 'bg-emerald-600 border-emerald-600 text-white shadow-sm font-black' 
                                                        : 'bg-white border-gray-100 text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 hover:border-emerald-200' }}">
                                                    1st
                                                </button>
                                            </form>

                                            <!-- 2nd Choice -->
                                            <form method="POST" action="{{ route('employer.applications.choice', $app->id) }}" class="w-full">
                                                @csrf
                                                <input type="hidden" name="choice_order" value="2">
                                                <button type="submit" class="w-full text-center py-1 rounded-lg text-[10px] font-bold uppercase tracking-wider transition-all border
                                                    {{ $app->choice_order == 2 
                                                        ? 'bg-blue-600 border-blue-600 text-white shadow-sm font-black' 
                                                        : 'bg-white border-gray-100 text-gray-600 hover:bg-blue-50 hover:text-blue-700 hover:border-blue-200' }}">
                                                    2nd
                                                </button>
                                            </form>

                                            <!-- 3rd Choice -->
                                            <form method="POST" action="{{ route('employer.applications.choice', $app->id) }}" class="w-full">
                                                @csrf
                                                <input type="hidden" name="choice_order" value="3">
                                                <button type="submit" class="w-full text-center py-1 rounded-lg text-[10px] font-bold uppercase tracking-wider transition-all border
                                                    {{ $app->choice_order == 3 
                                                        ? 'bg-amber-500 border-amber-500 text-white shadow-sm font-black' 
                                                        : 'bg-white border-gray-100 text-gray-600 hover:bg-amber-50 hover:text-amber-700 hover:border-amber-200' }}">
                                                    3rd
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @empty
                            <!-- Empty State Card -->
                            <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-white rounded-3xl border border-gray-100 py-20 text-center shadow-sm">
                                <div class="flex flex-col items-center max-w-xs mx-auto">
                                    <div class="p-4 bg-gray-50 rounded-2xl mb-4 text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-base font-bold text-gray-800">No Applications Yet</h3>
                                    <p class="text-xs text-gray-500 mt-1">No candidates have applied to this position. Once they do, they will appear right here.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>