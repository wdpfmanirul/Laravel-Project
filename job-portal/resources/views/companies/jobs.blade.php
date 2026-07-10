<x-app-layout>

<div class="min-h-screen bg-[#f9fafb]">

    {{-- ১. মিনিমাল হিরো সেকশন --}}
    <div class="bg-white border-b border-slate-200">
        <div class="max-w-6xl mx-auto px-6 py-10">
            <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                
                {{-- লোগো: স্ট্যান্ডার্ড সাইজ --}}
                <div class="shrink-0">
                    <div class="w-24 h-24 md:w-28 md:h-28 rounded-2xl bg-white border border-slate-100 shadow-sm flex items-center justify-center p-3 overflow-hidden">
                        @if($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" 
                                 alt="{{ $company->company_name }}"
                                 class="w-full h-full object-contain">
                        @else
                            <span class="text-4xl">🏢</span>
                        @endif
                    </div>
                </div>

                {{-- কোম্পানির তথ্য: আরও গোছানো --}}
                <div class="flex-1 text-center md:text-left">
                    <div class="flex flex-col md:flex-row md:items-center gap-2 mb-2 justify-center md:justify-start">
                        <h1 class="text-2xl md:text-3xl font-bold text-slate-900 tracking-tight">
                            {{ $company->company_name }}
                        </h1>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-blue-50 text-blue-700 border border-blue-100 w-fit mx-auto md:mx-0">
                            VERIFIED
                        </span>
                    </div>

                    <div class="flex flex-wrap justify-center md:justify-start items-center gap-y-2 gap-x-4 text-sm text-slate-500 font-medium">
                        <div class="flex items-center gap-1.5">
                            <span class="text-slate-400">📁</span>
                            {{ $company->industry ?? 'Technology' }}
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="text-slate-400">💼</span>
                            {{ $jobs->count() }} Open Positions
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="text-slate-400">📍</span>
                            Global Office
                        </div>
                    </div>
                </div>

                {{-- ব্যাক বাটন: রাইট সাইড --}}
                <div class="shrink-0">
                    <a href="{{ route('companies.index') }}" 
                       class="text-sm font-bold text-slate-600 hover:text-blue-600 flex items-center gap-2 bg-slate-50 px-4 py-2 rounded-xl transition">
                        ← Back to Directory
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- ২. জব লিস্ট সেকশন --}}
    <div class="max-w-5xl mx-auto px-6 py-12">
        
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-xl font-bold text-slate-800">Current Openings</h2>
            <p class="text-sm text-slate-400 font-medium">Sort by: Newest First</p>
        </div>

        @forelse($jobs as $job)
            <div class="bg-white rounded-3xl border border-slate-200/60 p-6 mb-6 transition-all hover:border-blue-300 hover:shadow-lg hover:shadow-blue-500/5 group">
                <div class="flex flex-col lg:flex-row lg:items-center gap-6">
                    
                    {{-- বাম দিক: জবের তথ্য --}}
                    <div class="flex-1 space-y-3">
                        <div class="flex items-center gap-3">
                            <span class="text-[10px] font-black uppercase tracking-widest bg-emerald-50 text-emerald-600 px-2 py-1 rounded-md border border-emerald-100">
                                {{ $job->type ?? 'Full-time' }}
                            </span>
                            <span class="text-xs text-slate-400 font-semibold italic">
                                Posted {{ $job->created_at->diffForHumans() }}
                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors">
                            {{ $job->title }}
                        </h3>

                        <div class="flex flex-wrap items-center gap-x-5 gap-y-2 text-slate-500 font-semibold text-sm">
                            <div class="flex items-center gap-1.5">
                                <span class="text-xs">📍</span>
                                {{ $job->location ?? 'Remote' }}
                            </div>
                            <div class="flex items-center gap-1.5">
                                <span class="text-xs">💰</span>
                                {{ $job->salary_range ?? 'Competitive' }}
                            </div>
                        </div>

                        <p class="text-slate-500 text-sm leading-relaxed line-clamp-2">
                            {{ \Illuminate\Support\Str::limit(strip_tags($job->description), 160) }}
                        </p>
                    </div>

                    {{-- ডান দিক: অ্যাকশন বাটন --}}
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('jobs.show', $job->id) }}"
                           class="w-full md:w-auto inline-flex justify-center items-center gap-2 bg-slate-900 text-white font-bold text-sm px-8 py-3.5 rounded-2xl hover:bg-blue-600 transition-all shadow-md">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
        @empty
            {{-- জিরো স্টেট: যদি কোন জব না থাকে --}}
            <div class="bg-white rounded-[2rem] border border-slate-100 p-16 text-center shadow-sm">
                <div class="text-5xl mb-4">📂</div>
                <h2 class="text-xl font-bold text-slate-800 mb-2">No Active Openings</h2>
                <p class="text-slate-400 text-sm max-w-xs mx-auto">This company hasn't posted any jobs yet. Please check back later.</p>
            </div>
        @endforelse

    </div>
</div>

{{-- সিম্পল কাস্টম স্টাইল --}}
<style>
    body {
        -webkit-font-smoothing: antialiased;
    }
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;  
        overflow: hidden;
    }
</style>

</x-app-layout>