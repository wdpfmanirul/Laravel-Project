<x-app-layout>

<div class="flex h-screen bg-[#f8fafc] overflow-hidden font-sans">

    <!-- SIDEBAR -->
    @include('candidate.layouts.sidebar')

    <!-- MAIN CONTENT -->
    <div class="ml-64 flex-1 overflow-y-auto scroll-smooth">

        <div class="p-6 lg:p-10 max-w-6xl mx-auto">

            <!-- HEADER SECTION -->
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                        Applied Jobs
                    </h1>
                    <p class="text-gray-500 mt-2 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                        You have applied for <span class="font-bold text-blue-600">{{ $applications->count() }}</span> positions
                    </p>
                </div>
                
                <a href="{{ route('jobs.index') }}" class="inline-flex items-center gap-2 bg-white border border-gray-200 text-gray-700 px-5 py-2.5 rounded-xl font-semibold shadow-sm hover:bg-gray-50 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Find More Jobs
                </a>
            </div>

            <!-- JOB LIST -->
            <div class="space-y-5">

                @forelse($applications as $application)

                    <div class="group bg-white rounded-2xl border border-gray-100 p-5 lg:p-6 hover:shadow-xl hover:border-blue-100 transition-all duration-300 relative overflow-hidden">
                        
                        <!-- Top Accent Line -->
                        <div class="absolute top-0 left-0 w-1 h-full 
                            @if($application->status == 'pending') bg-yellow-400 
                            @elseif($application->status == 'shortlisted') bg-blue-500 
                            @elseif($application->status == 'rejected') bg-red-500 
                            @else bg-green-500 @endif">
                        </div>

                        <div class="flex flex-col lg:flex-row gap-6">
                            
                            <!-- Company Logo Placeholder -->
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl border border-gray-100 flex items-center justify-center text-gray-400 group-hover:scale-105 transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                            </div>

                            <!-- JOB CONTENT -->
                            <div class="flex-1">
                                <div class="flex flex-wrap items-start justify-between gap-4">
                                    <div>
                                        <h2 class="text-xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors">
                                            {{ $application->job->title ?? 'Job Deleted' }}
                                        </h2>
                                        <div class="flex items-center gap-3 mt-1 text-gray-500 text-sm">
                                            <span class="flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                {{ $application->job->location ?? 'Remote' }}
                                            </span>
                                            <span>•</span>
                                            <span class="font-medium text-gray-600">{{ $application->job->company_name ?? 'Tech Corp' }}</span>
                                        </div>
                                    </div>

                                    <!-- STATUS BADGE -->
                                    <div>
                                        @php
                                            $statusClasses = [
                                                'pending' => 'bg-yellow-50 text-yellow-700 border-yellow-100',
                                                'shortlisted' => 'bg-blue-50 text-blue-700 border-blue-100',
                                                'rejected' => 'bg-red-50 text-red-700 border-red-100',
                                                'accepted' => 'bg-green-50 text-green-700 border-green-100',
                                            ];
                                            $currentStatus = $application->status;
                                            $class = $statusClasses[$currentStatus] ?? 'bg-gray-50 text-gray-700 border-gray-100';
                                        @endphp

                                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider border {{ $class }}">
                                            <span class="w-2 h-2 rounded-full mr-2 
                                                @if($currentStatus == 'pending') bg-yellow-400 
                                                @elseif($currentStatus == 'shortlisted') bg-blue-500 
                                                @elseif($currentStatus == 'rejected') bg-red-500 
                                                @else bg-green-500 @endif">
                                            </span>
                                            {{ $currentStatus }}
                                        </span>
                                    </div>
                                </div>

                                <!-- INFO GRID -->
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-6">
                                    <div class="flex flex-col">
                                        <span class="text-[11px] text-gray-400 uppercase font-bold tracking-widest">Salary</span>
                                        <span class="text-gray-700 font-semibold mt-0.5 flex items-center gap-1 text-sm md:text-base">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ $application->job->salary_range ?? 'Negotiable' }}
                                        </span>
                                    </div>
                                    <div class="flex flex-col border-l border-gray-100 pl-4">
                                        <span class="text-[11px] text-gray-400 uppercase font-bold tracking-widest">Job Type</span>
                                        <span class="text-gray-700 font-semibold mt-0.5 flex items-center gap-1 text-sm md:text-base">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            {{ $application->job->type ?? '-' }}
                                        </span>
                                    </div>
                                    <div class="flex flex-col border-l border-gray-100 pl-4 col-span-2 md:col-span-1">
                                        <span class="text-[11px] text-gray-400 uppercase font-bold tracking-widest">Applied On</span>
                                        <span class="text-gray-700 font-semibold mt-0.5 flex items-center gap-1 text-sm md:text-base">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z" />
                                            </svg>
                                            {{ $application->created_at->format('d M, Y') }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- ACTION BUTTON -->
                            <div class="flex flex-row lg:flex-col justify-end items-center gap-3">
                                <a href="{{ route('jobs.show', $application->job->id) }}"
                                   class="w-full lg:w-auto text-center bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl font-bold shadow-lg shadow-blue-100 transition-all active:scale-95 whitespace-nowrap">
                                    View Details
                                </a>
                            </div>

                        </div>
                    </div>

                @empty
                    <!-- EMPTY STATE -->
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-16 text-center">
                        <div class="w-24 h-24 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">No applications yet</h2>
                        <p class="text-gray-500 mb-8 max-w-sm mx-auto">
                            You haven't applied for any jobs yet. Your career journey starts with the first application!
                        </p>
                        <a href="{{ route('jobs.index') }}"
                           class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-2xl font-bold shadow-xl shadow-blue-100 transition-all hover:-translate-y-1">
                            Browse Jobs Now
                        </a>
                    </div>
                @endforelse

            </div>

        </div>

    </div>

</div>

</x-app-layout>