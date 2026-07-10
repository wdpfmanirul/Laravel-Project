<x-app-layout>
    <div class="py-12 bg-gray-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">

                @include('employer.sidebar')                    
                <div class="flex-1">
                    @if(session('success'))
                        <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-5 py-4 rounded-2xl font-bold">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl font-bold">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl">
                            <ul class="list-disc pl-5 text-sm">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-indigo-50 rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-black text-gray-900 tracking-tight">Shortlisted Candidates</h2>
                    </div>
                        
                    <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left">
                                <thead class="bg-gray-50/70 border-b border-gray-100 text-gray-600 uppercase tracking-wider text-[11px] font-bold">
                                    <tr>
                                        <th class="p-5 text-center w-16">#</th>
                                        <th class="py-5 px-4 w-20 text-center">Choice</th>
                                        <th class="py-5 px-4">Candidate</th>
                                        <th class="py-5 px-4">Applied Position</th>
                                        <th class="py-5 px-4">Contact Info</th>
                                        <th class="py-5 px-5 text-right">Action</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-50">
                                @forelse($applications as $key => $app)
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <td class="p-5 text-center font-bold text-gray-400">{{ $key + 1 }}</td>
                                        <td class="py-5 px-4 text-center">
                                            <span class="inline-flex items-center justify-center px-2.5 py-1 rounded-xl bg-indigo-50 text-indigo-700 font-black text-xs min-w-[32px] border border-indigo-100/50">
                                                {{ $app->choice_order ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="py-5 px-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-600 to-violet-500 text-white flex items-center justify-center font-black text-sm shadow-md shadow-indigo-100 shrink-0">
                                                    {{ strtoupper(substr($app->user->name, 0, 1)) }}
                                                </div>
                                                <div>
                                                    <p class="font-bold text-gray-900 leading-none mb-1">{{ $app->user->name }}</p>
                                                    <p class="text-xs text-gray-400">{{ $app->user->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-5 px-4 font-semibold text-gray-700">{{ $app->job->title }}</td>
                                        <td class="py-5 px-4 text-gray-600 font-medium">
                                            <span class="inline-flex items-center gap-1.5">
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                                </svg>
                                                {{ optional($app->user->profile)->phone ?? $app->user->phone ?? 'N/A' }}
                                            </span>
                                        </td>
                                        <td class="py-5 px-5 text-right">                                            
                                            <button onclick="openWindow({{ $app->id }})"
                                                    class="inline-flex items-center gap-1.5 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition-all shadow-md shadow-emerald-100 hover:shadow-lg active:scale-95">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                </svg>
                                                Send Email
                                            </button>
                                        </td>
                                    </tr>

                                    @push('modals')
                                    <div id="window-{{ $app->id }}" class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-gray-900/40 backdrop-blur-sm p-4">
    <div class="bg-white rounded-[2rem] text-left shadow-2xl transform transition-all max-w-2xl w-full border border-gray-100 overflow-hidden">
        
        <div class="flex items-center justify-between px-6 py-5 md:px-8 md:py-6 border-b border-gray-100 bg-gray-50/50">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-amber-50 rounded-xl">
                    <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-black text-gray-900">Schedule Interview Invitation</h3>
                    <p class="text-xs text-gray-400 mt-0.5">Sending to: <span class="font-bold text-gray-600">{{ $app->user->name }}</span></p>
                </div>
            </div>
            <button type="button" onclick="closeWindow({{ $app->id }})" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-xl transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <form method="POST" action="{{ route('employer.applications.sendInterview', $app->id) }}" class="block p-6 md:p-8 space-y-5 bg-white">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 w-full">
                <div class="block w-full">
                    <label class="block text-xs font-bold text-gray-600 mb-2 ml-0.5">Interview Date</label>
                    <input type="date" name="interview_date" class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all bg-gray-50/50 font-medium text-gray-700" required>
                </div>
                <div class="block w-full">
                    <label class="block text-xs font-bold text-gray-600 mb-2 ml-0.5">Interview Time</label>
                    <input type="time" name="interview_time" class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all bg-gray-50/50 font-medium text-gray-700" required>
                </div>
            </div>

            <div class="block w-full">
                <label class="block text-xs font-bold text-gray-600 mb-2 ml-0.5">Send To Email</label>
                <input type="email" name="send_email" value="{{ old('send_email', $app->user->email) }}" class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all bg-gray-50/50 font-medium text-gray-700" required>
                <p class="text-xs text-gray-400 mt-1.5 ml-0.5">Default candidate email is selected. You may change it.</p>
            </div>

            <div class="block w-full">
                <label class="block text-xs font-bold text-gray-600 mb-2 ml-0.5">Location / Meeting Link</label>
                <input type="text" name="interview_location" placeholder="Office location or Zoom/Meet Link" class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all bg-gray-50/50 font-medium text-gray-700 placeholder-gray-400" required>
            </div>

            <div class="block w-full">
                <label class="block text-xs font-bold text-gray-600 mb-2 ml-0.5">Custom Invitation Message (Optional)</label>
                <textarea name="interview_message" rows="4" class="block w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all bg-gray-50/50 font-medium text-gray-700 placeholder-gray-400" placeholder="Provide any extra details or instructions for the candidate here..."></textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="closeWindow({{ $app->id }})" class="px-5 py-2.5 text-xs font-bold border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 transition-all">
                    Cancel
                </button>
                <button type="submit" class="px-6 py-2.5 text-xs font-bold bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl transition-all shadow-md shadow-indigo-100 active:scale-95 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                    Send Invitation
                </button>
            </div>
        </form>

    </div>
</div>
                                    @endpush

                                @empty
                                    <tr>
                                        <td colspan="6" class="p-16 text-center">
                                            <p class="font-bold text-gray-800 text-sm">No shortlisted candidates</p>
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

    <script>
    function openWindow(id) {
        const win = document.getElementById('window-' + id);
        if(win) {
            win.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; 
        }
    }

    function closeWindow(id) {
        const win = document.getElementById('window-' + id);
        if(win) {
            win.classList.add('hidden');
            document.body.style.overflow = ''; 
        }
    }
    </script>
</x-app-layout>