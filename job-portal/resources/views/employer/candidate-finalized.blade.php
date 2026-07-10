<x-app-layout>
    <div class="py-12 bg-slate-50 min-h-screen overflow-x-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">
                
                <div class="lg:col-span-1 w-full min-w-0">
                    @include('employer.sidebar')
                </div>

                <div class="lg:col-span-3 w-full min-w-0 space-y-6">

                    <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/40 border border-gray-100 p-6 md:p-8">
                        <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6">
                            
                            <div class="space-y-1 min-w-0">
                                <p class="text-[10px] sm:text-xs font-black uppercase tracking-[0.2em] text-indigo-500 flex items-center gap-2">
                                    <span class="w-3 h-[2px] bg-indigo-500"></span> Hiring Management
                                </p>
                                <h1 class="text-xl sm:text-2xl md:text-3xl font-black text-slate-900 tracking-tight">
                                    Finalized Candidates
                                </h1>
                                <p class="text-xs font-medium text-slate-400">
                                    Manage shortlisted candidates and finalize hiring decisions efficiently.
                                </p>
                            </div>

                            <div class="grid grid-cols-3 sm:flex items-center gap-2 sm:gap-4 w-full xl:w-auto">
                                <div class="bg-indigo-50/60 border border-indigo-100/40 rounded-2xl p-3 sm:px-5 sm:py-3.5 flex-1 sm:flex-none sm:min-w-[10px] text-center">
                                    <p class="text-[9px] sm:text-[10px] font-black uppercase tracking-wider text-indigo-500 mb-0.5">Total</p>
                                    <p class="text-lg sm:text-2xl font-black text-indigo-700">{{ $applications->count() }}</p>
                                </div>

                                <div class="bg-emerald-50/60 border border-emerald-100/40 rounded-2xl p-3 sm:px-5 sm:py-3.5 flex-1 sm:flex-none sm:min-w-[110px] text-center">
                                    <p class="text-[9px] sm:text-[10px] font-black uppercase tracking-wider text-emerald-600 mb-0.5">Joined</p>
                                    <p class="text-lg sm:text-2xl font-black text-emerald-700">{{ $applications->where('final_status','joined')->count() }}</p>
                                </div>

                                <div class="bg-rose-50/60 border border-rose-100/40 rounded-2xl p-3 sm:px-5 sm:py-3.5 flex-1 sm:flex-none sm:min-w-[110px] text-center">
                                    <p class="text-[9px] sm:text-[10px] font-black uppercase tracking-wider text-rose-600 mb-0.5">Rejected</p>
                                    <p class="text-lg sm:text-2xl font-black text-rose-700">{{ $applications->where('final_status','rejected')->count() }}</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    @if(session('success'))
                        <div class="bg-emerald-50 border border-emerald-100 text-emerald-700 px-5 py-4 rounded-2xl font-bold text-xs flex items-center gap-3 shadow-sm break-words">
                            <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="flex items-center justify-between">
                        <h2 class="text-xs sm:text-sm font-black text-slate-900 uppercase tracking-wider flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-indigo-600"></span> Candidate Directory
                        </h2>
                    </div>

                    @if($applications->count())
                        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
                            @foreach($applications as $app)
                                <div class="bg-white rounded-[2rem] border border-gray-100 shadow-xl shadow-slate-200/30 overflow-hidden flex flex-col justify-between hover:border-indigo-100 hover:shadow-2xl hover:shadow-slate-200/50 transition-all duration-300 p-6 space-y-5">
                                    
                                    <div class="flex items-start gap-3">
                                        <div class="w-11 h-11 flex-shrink-0 rounded-2xl bg-indigo-50/70 border border-indigo-100/50 flex items-center justify-center font-black text-indigo-700 text-sm uppercase">
                                            {{ Illuminate\Support\Str::upper(Illuminate\Support\Str::substr($app->user->name ?? 'NN', 0, 2)) }}
                                        </div>
                                        <div class="min-w-0">
                                            <h4 class="font-black text-sm text-slate-900 leading-snug truncate">
                                                {{ $app->user->name ?? 'N/A' }}
                                            </h4>
                                            <p class="text-xs text-slate-400 font-bold tracking-tight truncate mt-0.5">
                                                {{ $app->user->email ?? '' }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="bg-slate-50/70 rounded-2xl p-4 space-y-2.5 text-xs">
                                        <div class="flex items-center justify-between gap-2">
                                            <span class="text-slate-400 font-bold uppercase tracking-wider text-[10px]">Position:</span>
                                            <span class="font-black text-slate-800 truncate max-w-[150px]">{{ $app->job->title ?? 'N/A' }}</span>
                                        </div>
                                        <div class="flex items-center justify-between gap-2">
                                            <span class="text-slate-400 font-bold uppercase tracking-wider text-[10px]">Category:</span>
                                            <span class="inline-flex px-2 py-0.5 rounded-md bg-indigo-100/60 text-indigo-700 font-bold text-[10px]">
                                                {{ $app->job->categoryRelation->name ?? 'N/A' }}
                                            </span>
                                        </div>
                                        <div class="flex items-center justify-between gap-2">
                                            <span class="text-slate-400 font-bold uppercase tracking-wider text-[10px]">Applied:</span>
                                            <span class="font-bold text-slate-600">{{ $app->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>

                                    <div class="pt-2 border-t border-slate-50 flex flex-col justify-end gap-3 flex-1">
                                        
                                        <div class="flex items-center justify-between gap-2 text-xs">
                                            <span class="text-slate-400 font-bold uppercase tracking-wider text-[10px]">Offer Flow:</span>
                                            @if($app->final_status == 'joined')
                                                @if($app->appointment_mail_sent)
                                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-700 text-[9px] font-black uppercase tracking-wider">
                                                        <span class="w-1 h-1 rounded-full bg-emerald-500"></span> Letter Sent
                                                    </span>
                                                @else
                                                    <form method="POST" action="{{ route('employer.applications.appointment', $app->id) }}" class="w-full">
                                                        @csrf
                                                        <button class="w-full justify-center px-3 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-[10px] font-black uppercase tracking-wider shadow-md shadow-indigo-100 transition-all flex items-center gap-1.5">
                                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 19v-8.93a2 2 0 01.89-1.664l8-5.333a2 2 0 012.22 0l8 5.333A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-2.25-1.5a2 2 0 00-2.22 0l-2.25 1.5"></path></svg>
                                                            Send Letter
                                                        </button>
                                                    </form>
                                                @endif
                                            @else
                                                <span class="text-[11px] font-bold text-slate-400 italic">No offer active</span>
                                            @endif
                                        </div>

                                        @if($app->final_status == 'pending')
                                            <div class="grid grid-cols-2 gap-2 w-full">
                                                <form method="POST" action="{{ route('employer.applications.joined', $app->id) }}">
                                                    @csrf
                                                    <button class="w-full py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-[10px] font-black uppercase tracking-wider rounded-xl shadow-md transition-all">
                                                        Joined
                                                    </button>
                                                </form>

                                                <form method="POST" action="{{ route('employer.applications.reject', $app->id) }}">
                                                    @csrf
                                                    <button class="w-full py-2 bg-rose-50 hover:bg-rose-100 text-rose-600 text-[10px] font-black uppercase tracking-wider rounded-xl transition-all">
                                                        Reject
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                            <div class="w-full py-1.5 bg-slate-50 border border-slate-100 rounded-xl text-center text-[10px] font-black uppercase tracking-widest text-slate-400 flex items-center justify-center gap-1.5">
                                                <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                                Process Finalized
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="py-24 text-center max-w-sm mx-auto space-y-4 bg-white rounded-[2rem] border border-gray-100 shadow-sm p-8">
                            <div class="w-16 h-16 bg-slate-50 border border-slate-100 rounded-2xl flex items-center justify-center text-3xl shadow-sm mx-auto">
                                👥
                            </div>
                            <div class="space-y-1">
                                <h3 class="text-base font-black text-slate-900">
                                    No Finalized Candidates Yet
                                </h3>
                                <p class="text-xs font-medium text-slate-400 leading-normal">
                                    Shortlisted or processed candidate records will populate here automatically.
                                </p>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>