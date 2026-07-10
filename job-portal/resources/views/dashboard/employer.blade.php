<x-app-layout>  

<div class="flex min-h-screen bg-slate-50">

    <!-- SIDEBAR (Fixed & Independent Scroll) -->
    <aside class="fixed inset-y-0 left-0 w-72 bg-white border-r border-slate-200 z-50 flex flex-col">
        
        <!-- Logo Area (Fixed at Top) -->
        <div class="p-8 flex-shrink-0 bg-white">
            <span class="text-2xl font-black text-slate-900 tracking-tight">Job<span class="text-indigo-600">Portal</span></span>
        </div>
        
        <!-- Menu Area (Scrollable if content is long) -->
        <div class="flex-1 overflow-y-auto px-4 no-scrollbar">
           
            @include('employer.sidebar')
        </div>
        
    </aside>

    <!-- MAIN CONTENT AREA -->
    <main class="ml-72 w-full min-h-screen pb-12">
        
        <!-- TOP HEADER -->
        <header class="sticky top-0 z-40 bg-slate-50/80 backdrop-blur-md border-b border-slate-200 px-10 py-5 flex justify-between items-center">
            <div>
                <h1 class="text-xl font-extrabold text-slate-800">Employer Dashboard</h1>
                <p class="text-xs text-slate-500 font-medium">Welcome back, {{ auth()->user()->name }} 👋</p>
            </div>

            <div class="flex items-center gap-4">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-bold text-slate-800 leading-none">{{ auth()->user()->name }}</p>
                    <p class="text-[10px] font-bold text-emerald-500 uppercase tracking-wider mt-1">Verified Employer</p>
                </div>
                <div class="w-11 h-11 bg-indigo-600 rounded-2xl flex items-center justify-center text-white font-bold shadow-lg shadow-indigo-100">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
            </div>
        </header>

        <div class="px-10 mt-10">
            
            <!-- STATS CARDS -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
                <div class="bg-indigo-600 p-8 rounded-[2.5rem] shadow-xl shadow-indigo-100 relative overflow-hidden">
                    <div class="relative z-10 text-white">
                        <p class="text-indigo-100 text-xs font-bold uppercase tracking-widest">Total Applications</p>
                        <h3 class="text-5xl font-black mt-3">{{ number_format($totalApplications) }}</h3>
                        <p class="mt-4 text-indigo-100/80 text-xs font-medium">Combined across all active jobs</p>
                    </div>
                    <i class="fas fa-users absolute -right-6 -bottom-6 text-[10rem] text-white/10 rotate-12"></i>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-200 relative overflow-hidden group">
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">Live Vacancies</p>
                    <h3 class="text-5xl font-black text-slate-800 mt-3">{{ number_format($activeJobs) }}</h3>
                    <div class="mt-6">
                        <a href="{{ route('employer.jobs.create') }}" class="inline-flex items-center gap-2 text-indigo-600 font-bold hover:gap-3 transition-all">
                            Post new job <i class="fas fa-plus-circle"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- HIRING PIPELINE -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                @php
                    $stats = [
                        ['label' => 'Shortlisted', 'val' => $shortlistedCount, 'clr' => 'blue'],
                        ['label' => 'Interviews', 'val' => $interviewsCount, 'clr' => 'indigo'],
                        ['label' => 'Joined', 'val' => $joinedCount, 'clr' => 'emerald'],
                        ['label' => 'Rejected', 'val' => $rejectedCount, 'clr' => 'rose'],
                    ];
                @endphp

                @foreach($stats as $s)
                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm transition-all hover:shadow-md">
                    <p class="text-[10px] font-black text-{{ $s['clr'] }}-500 uppercase tracking-widest mb-1">{{ $s['label'] }}</p>
                    <p class="text-3xl font-black text-slate-800">{{ $s['val'] }}</p>
                </div>
                @endforeach
            </div>

            <!-- RECENT JOBS TABLE -->
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-200 overflow-hidden">
                <div class="p-8 border-b border-slate-50">
                    <h4 class="text-xl font-black text-slate-800 tracking-tight">Recent Job Postings</h4>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-slate-50/50">
                                <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase">Position</th>
                                <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase text-center">Applicants</th>
                                <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach($jobs->take(5) as $job)
                            <tr class="hover:bg-slate-50/50 transition-all group">
                                <td class="px-8 py-6">
                                    <p class="font-bold text-slate-800 text-base">{{ $job->title }}</p>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase">{{ $job->jobCategory->name ?? 'N/A' }}</p>
                                </td>
                                <td class="px-8 py-6 text-center">
                                    <span class="inline-flex px-4 py-1.5 rounded-full bg-slate-100 text-slate-700 font-bold text-xs">
                                        {{ $job->applications_count }} Candidates
                                    </span>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <a href="{{ route('jobs.show', $job->id) }}" class="inline-flex items-center justify-center w-9 h-9 bg-white border border-slate-200 text-slate-400 hover:text-indigo-600 rounded-xl transition-all">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
</div>

<style>
  
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

</x-app-layout>