@extends('admin.layouts.app')

@section('content')

<div class="p-6 bg-slate-50 min-h-screen">

    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                Admin <span class="text-indigo-600">Dashboard</span>
            </h1>
            <p class="text-slate-500 font-medium flex items-center gap-2 mt-1">
                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                Welcome back, {{ auth()->user()->name }}
            </p>
        </div>

        <div class="flex items-center gap-3 bg-white p-2 px-4 rounded-2xl shadow-sm border border-slate-200">
            <div class="text-right">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Today's Date</p>
                <p class="text-sm font-semibold text-slate-700">{{ now()->format('d M, Y') }}</p>
            </div>
            <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-calendar-alt"></i>
            </div>
        </div>
    </div>

    {{-- Main Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        
        @php
            $stats = [
                ['label' => 'Total Candidates', 'value' => $totalCandidates, 'icon' => 'fa-users', 'color' => 'blue', 'trend' => '+12%'],
                ['label' => 'Active Employers', 'value' => $totalEmployers, 'icon' => 'fa-building', 'color' => 'emerald', 'trend' => '+5%'],
                ['label' => 'Live Jobs', 'value' => $totalJobs, 'icon' => 'fa-briefcase', 'color' => 'violet', 'trend' => '+18%'],
                ['label' => 'Applications', 'value' => $totalApplications, 'icon' => 'fa-file-signature', 'color' => 'rose', 'trend' => '+24%'],
            ];
        @endphp

        @foreach($stats as $stat)
        <div class="group bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <div class="flex justify-between items-start">
                <div class="space-y-3">
                    <div class="p-3 inline-flex rounded-2xl bg-{{ $stat['color'] }}-50 text-{{ $stat['color'] }}-600 group-hover:bg-{{ $stat['color'] }}-600 group-hover:text-white transition-colors duration-300">
                        <i class="fas {{ $stat['icon'] }} text-xl"></i>
                    </div>
                    <p class="text-sm font-medium text-slate-500 uppercase tracking-wide">{{ $stat['label'] }}</p>
                </div>
                <span class="text-xs font-bold px-2 py-1 bg-green-50 text-green-600 rounded-lg">{{ $stat['trend'] }}</span>
            </div>
            <h2 class="text-3xl font-black text-slate-800 mt-4 tracking-tight">
                {{ number_format($stat['value']) }}
            </h2>
        </div>
        @endforeach
    </div>

    {{-- Recruitment Pipeline --}}
    <div class="mb-10">
        <h3 class="text-lg font-bold text-slate-800 mb-5 flex items-center gap-2">
            <i class="fas fa-chart-pie text-indigo-500"></i> Recruitment Pipeline
        </h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            
            <div class="bg-white border-l-4 border-emerald-500 p-5 rounded-2xl shadow-sm">
                <p class="text-slate-500 text-xs font-bold uppercase">Shortlisted</p>
                <p class="text-2xl font-black text-slate-800">{{ $shortlisted }}</p>
            </div>

            <div class="bg-white border-l-4 border-blue-500 p-5 rounded-2xl shadow-sm">
                <p class="text-slate-500 text-xs font-bold uppercase">Interviews</p>
                <p class="text-2xl font-black text-slate-800">{{ $interviews }}</p>
            </div>

            <div class="bg-white border-l-4 border-indigo-500 p-5 rounded-2xl shadow-sm">
                <p class="text-slate-500 text-xs font-bold uppercase">Joined</p>
                <p class="text-2xl font-black text-slate-800">{{ $joined }}</p>
            </div>

            <div class="bg-white border-l-4 border-rose-500 p-5 rounded-2xl shadow-sm">
                <p class="text-slate-500 text-xs font-bold uppercase">Rejected</p>
                <p class="text-2xl font-black text-slate-800">{{ $rejected }}</p>
            </div>

        </div>
    </div>

    {{-- Data Tables / Lists --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        {{-- Recent Jobs --}}
        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-6 border-b border-slate-50 flex justify-between items-center bg-slate-50/50">
                <h2 class="text-lg font-bold text-slate-800 italic">Recent Job Postings</h2>
                <a href="{{ route('admin.jobs') }}" class="text-xs font-bold text-indigo-600 hover:underline underline-offset-4">View All</a>
            </div>

            <div class="divide-y divide-slate-50">
                @forelse($recentJobs as $job)
                <div class="p-5 hover:bg-slate-50 transition-colors group">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-slate-100 rounded-xl flex items-center justify-center text-slate-400 group-hover:bg-indigo-100 group-hover:text-indigo-600 transition-all">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">
                                {{ $job->title }}
                            </h3>
                            <div class="flex items-center gap-3 mt-1">
                                <span class="text-xs font-medium text-slate-500">{{ $job->category }}</span>
                                <span class="text-[10px] text-slate-300">•</span>
                                <span class="text-xs text-slate-400">{{ $job->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-slate-300 text-sm opacity-0 group-hover:opacity-100 transition-all"></i>
                    </div>
                </div>
                @empty
                <div class="p-10 text-center text-slate-400 italic">
                    <i class="fas fa-box-open block text-3xl mb-2"></i>
                    No jobs found.
                </div>
                @endforelse
            </div>
        </div>

        {{-- Recent Applications --}}
        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-6 border-b border-slate-50 flex justify-between items-center bg-slate-50/50">
                <h2 class="text-lg font-bold text-slate-800 italic">Recent Applications</h2>
                <a href="{{ route('admin.applications') }}" class="text-xs font-bold text-indigo-600 hover:underline underline-offset-4">Manage All</a>
            </div>

            <div class="divide-y divide-slate-50">
                @forelse($recentApplications as $application)
                <div class="p-5 hover:bg-slate-50 transition-colors">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-gradient-to-tr from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-xs">
                                {{ strtoupper(substr($application->user->name ?? 'U', 0, 2)) }}
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-800">
                                    {{ $application->user->name ?? 'Unknown User' }}
                                </h3>
                                <p class="text-xs text-slate-400">{{ $application->created_at->format('h:i A, d M') }}</p>
                            </div>
                        </div>
                        
                        @php
                            $statusClasses = [
                                'pending' => 'bg-amber-50 text-amber-600 border-amber-100',
                                'accepted' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                'rejected' => 'bg-rose-50 text-rose-600 border-rose-100',
                            ];
                            $statusClass = $statusClasses[strtolower($application->status)] ?? 'bg-slate-50 text-slate-600 border-slate-100';
                        @endphp

                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase border {{ $statusClass }}">
                            {{ $application->status }}
                        </span>
                    </div>
                </div>
                @empty
                <div class="p-10 text-center text-slate-400 italic">
                    <i class="fas fa-user-slash block text-3xl mb-2"></i>
                    No applications found.
                </div>
                @endforelse
            </div>
        </div>

    </div>
</div>

@endsection