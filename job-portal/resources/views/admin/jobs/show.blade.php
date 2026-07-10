@extends('admin.layouts.app')

@section('content')
<div class="p-6 sm:p-8 bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto">
        
        <!-- Top Action Nav -->
        <div class="flex justify-between items-center mb-6">
            <a href="{{ url()->previous() }}" class="flex items-center gap-1 text-indigo-600 font-bold text-sm hover:translate-x-[-4px] transition-transform">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Jobs
            </a>
            <div class="flex gap-3">
                <form method="POST" action="{{ route('admin.jobs.delete',$job->id) }}">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Delete this job?')" class="px-4 py-2 bg-red-50 text-red-600 font-bold rounded-xl text-sm border border-red-100 hover:bg-red-600 hover:text-white transition-all shadow-sm">
                        Delete Job
                    </button>
                </form>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <!-- Hero Header -->
            <div class="bg-slate-900 p-8 md:p-10 text-white">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                    <div>
                        <span class="inline-block px-3 py-1 bg-indigo-500/20 text-indigo-300 rounded-full text-[10px] font-bold tracking-widest uppercase mb-3">
                            {{ $job->category }}
                        </span>
                        <h1 class="text-3xl md:text-4xl font-extrabold">{{ $job->title }}</h1>
                        <p class="text-slate-400 mt-2 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a2 2 0 002 2h2a2 2 0 002-2v-2a1 1 0 112 0v2a2 2 0 002 2h2a2 2 0 002-2v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                            Employer: {{ optional($job->employer)->name }}
                        </p>
                    </div>
                    @if($job->status == 'active')
                        <div class="bg-green-500/10 border border-green-500/30 text-green-400 px-6 py-2 rounded-2xl">
                            <span class="text-xs font-bold uppercase tracking-widest block opacity-70">Status</span>
                            <span class="text-lg font-bold uppercase">Active</span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="p-8 md:p-10">
                <!-- Info Grid -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10 pb-10 border-b border-gray-100">
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Location</label>
                        <p class="text-gray-800 font-bold flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                            {{ $job->location }}
                        </p>
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Job Type</label>
                        <p class="text-gray-800 font-bold flex items-center gap-1.5 text-sm">
                             <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            {{ $job->type }}
                        </p>
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Salary Range</label>
                        <p class="text-indigo-600 font-extrabold">
                            {{ $job->salary_range }}
                        </p>
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Deadline</label>
                        <p class="text-red-500 font-bold flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ $job->deadline }}
                        </p>
                    </div>
                </div>

                <!-- Description Section -->
                <div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <span class="w-1.5 h-6 bg-indigo-600 rounded-full"></span>
                        Job Description
                    </h3>
                    <div class="bg-gray-50/50 p-6 rounded-2xl border border-gray-100 text-gray-700 leading-relaxed prose prose-indigo max-w-none">
                        {!! nl2br(e($job->description)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection