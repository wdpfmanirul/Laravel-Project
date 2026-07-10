<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen font-sans antialiased">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8 items-start">

                <!-- Sidebar -->
                @include('employer.sidebar')

                <!-- Main Content -->
                <div class="flex-1 w-full space-y-8">

                    <!-- Header Section -->
                    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div>
                            <nav class="flex items-center gap-2 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">
                                <a href="{{ route('employer.dashboard') }}" class="hover:text-indigo-600 transition-colors">
                                    Dashboard
                                </a>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                                <span class="text-gray-600 font-bold">Chosen</span>
                            </nav>
                            <h2 class="text-2xl sm:text-3xl font-black text-gray-900 tracking-tight">
                                Chosen Applicants
                            </h2>
                            <p class="text-sm text-gray-500 mt-1 italic">
                                Applicants selected as 1st, 2nd, or 3rd choice.
                            </p>
                        </div>
                    </div>

                    <!-- Success Notification Message -->
                    @if(session('success'))
                        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-4 rounded-2xl font-semibold flex items-center gap-3 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Premium Table Container -->
                    <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-gray-50/70 border-b border-gray-100">
                                        <th class="px-8 py-5 text-xs font-black text-gray-400 uppercase tracking-wider">Candidate</th>
                                        <th class="px-8 py-5 text-xs font-black text-gray-400 uppercase tracking-wider">Applied Job</th>
                                        <th class="px-8 py-5 text-xs font-black text-gray-400 uppercase tracking-wider">Choice Rank</th>
                                        <th class="px-8 py-5 text-xs font-black text-gray-400 uppercase tracking-wider">Status</th>
                                        <th class="px-8 py-5 text-xs font-black text-gray-400 uppercase tracking-wider text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    @forelse($applications as $app)
                                        <tr class="hover:bg-indigo-50/20 transition-all group">
                                            
                                            <!-- Candidate info with Photo -->
                                            <td class="px-8 py-5.5">
                                                <div class="flex items-center gap-4">
                                                    @if($app->candidateProfile && $app->candidateProfile->photo)
                                                        <img src="{{ asset('storage/' . $app->candidateProfile->photo) }}"
                                                             class="h-11 w-11 rounded-2xl object-cover ring-4 ring-gray-50 group-hover:ring-indigo-50 transition-all shadow-sm shrink-0">
                                                    @else
                                                        <div class="h-11 w-11 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-black text-sm shadow-sm shrink-0">
                                                            {{ strtoupper(substr($app->user->name ?? 'U', 0, 1)) }}
                                                        </div>
                                                    @endif
                                                    <div class="min-w-0">
                                                        <div class="font-bold text-gray-900 text-sm group-hover:text-indigo-600 transition-colors truncate">
                                                            {{ $app->user->name ?? 'Unknown Candidate' }}
                                                        </div>
                                                        <div class="text-[11px] text-gray-400 font-medium truncate mt-0.5">
                                                            {{ $app->user->email ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- Job Title -->
                                            <td class="px-8 py-5.5">
                                                <div class="font-bold text-gray-800 text-sm max-w-xs truncate" title="{{ $app->job->title ?? 'N/A' }}">
                                                    {{ $app->job->title ?? 'N/A' }}
                                                </div>
                                            </td>

                                            <!-- Choice Badge -->
                                            <td class="px-8 py-5.5">
                                                @if($app->choice_order == 1)
                                                    <span class="inline-flex items-center px-3 py-1 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-xl text-xs font-black uppercase tracking-wide shadow-sm">
                                                        1st Choice
                                                    </span>
                                                @elseif($app->choice_order == 2)
                                                    <span class="inline-flex items-center px-3 py-1 bg-blue-50 border border-blue-100 text-blue-700 rounded-xl text-xs font-black uppercase tracking-wide shadow-sm">
                                                        2nd Choice
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center px-3 py-1 bg-amber-50 border border-amber-100 text-amber-700 rounded-xl text-xs font-black uppercase tracking-wide shadow-sm">
                                                        3rd Choice
                                                    </span>
                                                @endif
                                            </td>

                                            <!-- Shortlist Status Badge -->
                                            <td class="px-8 py-5.5">
                                                @if($app->is_shortlisted)
                                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-purple-50 border border-purple-100 text-purple-700 rounded-xl text-xs font-bold shadow-sm">
                                                        <span class="h-1.5 w-1.5 rounded-full bg-purple-500 animate-pulse"></span>
                                                        Shortlisted
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-gray-50 border border-gray-100 text-gray-500 rounded-xl text-xs font-bold">
                                                        <span class="h-1.5 w-1.5 rounded-full bg-gray-400"></span>
                                                        Pending
                                                    </span>
                                                @endif
                                            </td>

                                            <!-- Action Button -->
                                            <td class="px-8 py-5.5 text-right">
                                                @if(!$app->is_shortlisted)
                                                    <form method="POST" action="{{ route('employer.applications.shortlist', $app->id) }}" class="inline-block">
                                                        @csrf
                                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-xs font-bold transition-all shadow-sm hover:shadow active:scale-95">
                                                            Shortlist
                                                        </button>
                                                    </form>
                                                @else
                                                    <span class="inline-flex items-center gap-1 text-emerald-600 font-bold text-xs bg-emerald-50/50 border border-emerald-100 px-3 py-1 rounded-xl">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                        </svg>
                                                        Accepted
                                                    </span>
                                                @endif
                                            </td>

                                        </tr>
                                    @empty
                                        <!-- Empty State Row -->
                                        <tr>
                                            <td colspan="5" class="py-20 text-center">
                                                <div class="flex flex-col items-center max-w-xs mx-auto">
                                                    <div class="p-4 bg-gray-50 rounded-2xl mb-4 text-gray-400">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        </svg>
                                                    </div>
                                                    <h3 class="text-base font-bold text-gray-800">No Chosen Applicants</h3>
                                                    <p class="text-xs text-gray-500 mt-1 leading-relaxed">You have not prioritized or selected any applicants yet.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>