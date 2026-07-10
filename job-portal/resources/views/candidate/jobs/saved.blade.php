<x-app-layout>

<div class="flex h-screen bg-[#f8fafc] overflow-hidden">

    {{-- SIDEBAR --}}
    @include('candidate.layouts.sidebar')

    {{-- MAIN CONTENT --}}
    <div class="ml-64 flex-1 overflow-y-auto scroll-smooth">

        <div class="p-6 lg:p-10 max-w-5xl mx-auto">

            {{-- HEADER SECTION --}}
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5v14l7-3 7 3V5a2 2 0 00-2-2H7a2 2 0 00-2 2z" />
                        </svg>
                        Saved Jobs
                    </h1>
                    <p class="text-gray-500 mt-1">
                        Manage all the opportunities you've bookmarked for later
                    </p>
                </div>

                <a href="{{ route('jobs.index') }}" class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 px-5 py-2.5 rounded-xl font-bold hover:bg-blue-100 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Search Jobs
                </a>
            </div>

            {{-- JOBS LIST --}}
            <div class="grid gap-6">

    @forelse($savedJobs as $saved)

        <div class="group bg-white rounded-3xl border border-gray-100 p-6 hover:shadow-xl hover:shadow-blue-500/5 transition-all duration-300 relative">
            
            <div class="flex flex-col sm:flex-row sm:items-center gap-6">
                
                {{-- Company Icon/Logo Placeholder --}}
                <div class="flex-shrink-0">
                    <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 group-hover:scale-110 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>

                <div class="flex-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors">
                                {{ $saved->job->title ?? 'Job Not Found' }}
                            </h2>
                            <p class="text-blue-600 font-medium text-sm mt-0.5">
                                {{ $saved->job->company_name ?? 'Tech Solutions Ltd.' }}
                            </p>
                        </div>

                        {{-- REMOVE BUTTON (Trash Icon) --}}
                        <form method="POST" action="{{ route('candidate.unsave.job', $saved->job_id) }}" 
                              onsubmit="return confirm('Remove this job from saved list?')">
                            @csrf
                            @method('DELETE')
                            <button class="p-2 text-gray-300 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all" title="Remove Bookmark">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5v14l7-3 7 3V5a2 2 0 00-2-2H7a2 2 0 00-2 2z" />
                                </svg>
                            </button>
                        </form>
                    </div>

                    {{-- META TAGS --}}
                    <div class="flex flex-wrap gap-2 mt-4">
                        @if(isset($saved->job) && $saved->job->user_id)
                            <a href="{{ route('candidate.company.show', $saved->job->user_id) }}" 
                            class="flex items-center gap-1 bg-indigo-50 text-indigo-600 hover:bg-indigo-100 px-3 py-1 rounded-lg text-xs font-semibold transition duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                View Company
                            </a>
                        @endif
                        
                        <span class="flex items-center gap-1 bg-gray-50 text-gray-600 px-3 py-1 rounded-lg text-xs font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            {{ $saved->job->location ?? 'N/A' }}
                        </span>
                        

                        <span class="flex items-center gap-1 bg-blue-50 text-blue-600 px-3 py-1 rounded-lg text-xs font-semibold uppercase tracking-wider">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            {{ $saved->job->type ?? 'N/A' }}
                        </span>
                            {{-- VACANCY BADGE --}}
                        <span class="flex items-center gap-1 bg-purple-50 text-purple-700 px-3 py-1 rounded-lg text-xs font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Vacancy: {{ $saved->job->vacancy ?? '1' }}
                        </span>
                        <span class="flex items-center gap-1 bg-green-50 text-green-700 px-3 py-1 rounded-lg text-xs font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $saved->job->salary_range ?? 'Negotiable' }}
                        </span>

                        {{-- DEADLINE BADGE --}}
                        @if(isset($saved->job) && $saved->job->deadline)
                            <span class="flex items-center gap-1 bg-red-50 text-red-600 px-3 py-1 rounded-lg text-xs font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z" />
                                </svg>
                                Deadline: {{ \Carbon\Carbon::parse($saved->job->deadline)->format('d M Y') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- CARD FOOTER --}}
            <div class="mt-6 pt-5 border-t border-gray-50 flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-2 text-gray-400 text-sm italic">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Saved on {{ $saved->created_at->format('M d, Y') }}
                </div>

                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <a href="{{ route('jobs.show', $saved->job_id) }}"
                       class="flex-1 sm:flex-none text-center bg-blue-600 hover:bg-blue-700 text-white px-8 py-2.5 rounded-xl text-sm font-bold shadow-lg shadow-blue-100 transition-all hover:-translate-y-0.5">
                        View Details
                    </a>

                    <a href="{{ route('jobs.show', $saved->job_id) }}"
                       class="flex-1 sm:flex-none text-center bg-green-600 hover:bg-green-700 text-white px-8 py-2.5 rounded-xl text-sm font-bold shadow-lg shadow-green-100 transition-all hover:-translate-y-0.5">
                        Apply Now
                    </a>
                </div>
            </div>

        </div>

    @empty

        {{-- EMPTY STATE --}}
        <div class="bg-white rounded-[2rem] border border-dashed border-gray-200 p-16 text-center shadow-sm">
            <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5v14l7-3 7 3V5a2 2 0 00-2-2H7a2 2 0 00-2 2z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Your Saved List is Empty</h2>
            <p class="text-gray-500 mb-8 max-w-xs mx-auto">
                Haven't found anything interesting yet? Start browsing to save jobs for later!
            </p>
            <a href="{{ route('jobs.index') }}"
               class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-10 py-3.5 rounded-2xl font-bold shadow-xl shadow-blue-100 transition-all">
                Browse Opportunities
            </a>
        </div>

    @endforelse

</div>

        </div>

    </div>

</div>

</x-app-layout>