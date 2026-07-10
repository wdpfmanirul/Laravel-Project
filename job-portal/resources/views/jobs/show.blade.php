<x-app-layout>
    <x-slot name="header">
        <nav class="flex items-center gap-2 text-sm mb-3">
            <a href="{{ route('dashboard') }}" class="text-indigo-600 hover:text-indigo-800 transition-colors font-medium">Dashboard</a>
            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <span class="text-gray-500 underline underline-offset-4 decoration-indigo-200">Job Details</span>
        </nav>
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <h2 class="font-extrabold text-3xl text-gray-900 tracking-tight leading-tight">
                {{ __('Job Details') }}
            </h2>
            <a href="{{ url()->previous() }}" class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Listings
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Main Content (Left Column) -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                        <!-- Header Section -->
                        <div class="p-8 border-b border-gray-50">
                            <div class="flex items-start justify-between">
                                <div>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-indigo-50 text-indigo-700 uppercase tracking-wider mb-4">
                                        {{ $job->category }}
                                    </span>
                                    <h1 class="text-3xl font-black text-gray-900 mb-2">{{ $job->title }}</h1>
                                    <p class="text-gray-500 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                        {{ $job->company_name ?? 'Company Confidential' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Description Section -->
                        <div class="p-8">
                            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                                <span class="w-1.5 h-6 bg-indigo-600 rounded-full mr-3"></span>
                                Job Description
                            </h3>
                            <div class="prose prose-indigo max-w-none text-gray-600 leading-relaxed whitespace-pre-line">
                                {{ $job->description }}
                            </div>
                        </div>
                    </div>

                    <!-- Application Form - Updated to Expected Salary -->
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                        @if(auth()->user()->role == 'candidate')
                            <div class="mb-8">
                                <h3 class="text-xl font-bold text-gray-900">Interested in this role?</h3>
                                <p class="text-gray-500 text-sm mt-1">Please provide your expected salary to complete the application.</p>
                            </div>
                            
                            <form action="{{ route('jobs.apply', $job->id) }}" method="POST" class="space-y-6">
                                @csrf
                                <div>
                                    <label class="block text-xs font-black text-gray-400 uppercase tracking-[0.2em] mb-3">
                                        Expected Monthly Salary (BDT)
                                    </label>
                                    <div class="relative group">
                                        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-gray-400 font-bold group-focus-within:text-indigo-600 transition-colors">
                                            ৳
                                        </div>
                                        <input type="number" 
                                               name="expected_salary" 
                                               required
                                               min="0"
                                               class="w-full bg-slate-50 border-gray-200 rounded-2xl py-4 pl-10 pr-5 shadow-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white transition-all font-bold text-lg text-gray-900 placeholder:font-normal placeholder:text-gray-400" 
                                               placeholder="e.g. 35000">
                                    </div>
                                    <p class="mt-2 text-xs text-gray-400 italic font-medium">Enter amount in digits only</p>
                                </div>
                                
                                <button type="submit" class="group w-full md:w-auto bg-indigo-600 text-white px-10 py-4 rounded-2xl font-black uppercase tracking-widest text-sm hover:bg-indigo-700 transition-all shadow-xl shadow-indigo-200 flex items-center justify-center gap-3 active:scale-95">
                                    <span>Submit Application</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        @else
                            {{-- Employer Warning --}}
                            <div class="flex items-center gap-4 bg-amber-50 text-amber-800 p-6 rounded-2xl border border-amber-100">
                                <div class="bg-amber-200/50 p-2.5 rounded-xl text-amber-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold text-sm">Employer Account</p>
                                    <p class="text-xs opacity-80 mt-0.5">Only candidates can apply. Please log in with a candidate account to proceed.</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar (Right Column) -->
                <div class="space-y-6">
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6">
                        <h4 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] mb-6">Job Overview</h4>
                        
                        <div class="space-y-6">
                            <div class="flex items-start gap-4 group">
                                <div class="bg-indigo-50 p-3 rounded-xl text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Salary Range</p>
                                    <p class="text-base font-extrabold text-gray-900 leading-tight mt-0.5">{{ $job->salary_range ?? 'Negotiable' }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 group">
                                <div class="bg-emerald-50 p-3 rounded-xl text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Location</p>
                                    <p class="text-base font-extrabold text-gray-900 leading-tight mt-0.5">{{ $job->location }}</p>
                                </div>
                            </div>
                            {{-- VACANCY INFO --}}
                        <div class="flex items-start gap-4 group">
                            <div class="bg-purple-50 p-3 rounded-xl text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Vacancy</p>
                                <p class="text-base font-extrabold text-gray-900 leading-tight mt-0.5">{{ $job->vacancy ?? '1' }} Position(s)</p>
                            </div>
                        </div>
                            <div class="flex items-start gap-4 group">
                                <div class="bg-blue-50 p-3 rounded-xl text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Date Posted</p>
                                    <p class="text-base font-extrabold text-gray-900 leading-tight mt-0.5">{{ $job->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>

                            @if($job->deadline)
                                <div class="flex items-start gap-4 group">
                                    <div class="bg-rose-50 p-3 rounded-xl text-rose-600 group-hover:bg-rose-600 group-hover:text-white transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <div>
                                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Deadline</p>
                                        <p class="text-base font-extrabold text-rose-600 leading-tight mt-0.5">{{ \Carbon\Carbon::parse($job->deadline)->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="mt-8 pt-8 border-t border-gray-50 text-center">
                             <p class="text-[10px] text-gray-300 font-bold tracking-widest uppercase">Ref ID: #{{ $job->id }}</p>
                        </div>
                    </div>
                    
                    <!-- Safety Tip -->
                    <div class="bg-slate-900 rounded-3xl p-6 text-white shadow-xl shadow-slate-200">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="bg-indigo-500 p-1.5 rounded-lg">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            </div>
                            <h5 class="text-sm font-black uppercase tracking-wider text-indigo-400">Safety Tip</h5>
                        </div>
                        <p class="text-xs leading-relaxed text-slate-400 font-medium">
                            Never pay any money to employers. A legitimate employer will never ask for payment to process your application.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>