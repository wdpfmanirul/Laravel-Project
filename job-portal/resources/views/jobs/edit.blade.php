<x-app-layout>
    <div class="py-12 bg-[#F8FAFC] min-h-screen font-sans antialiased">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col lg:flex-row gap-8 items-start">
                
                <!-- Sidebar -->
                <div class="w-full lg:w-72 sticky top-8">
                    @include('employer.sidebar')
                </div>

                <!-- Main Content Area -->
                <div class="flex-1 w-full space-y-8">
                    
                    <!-- Header Bar (Glassmorphic Style) -->
                    <div class="bg-white/70 backdrop-blur-md sticky top-6 z-10 px-8 py-5 rounded-3xl shadow-sm border border-white/50 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="p-3 bg-indigo-600 rounded-2xl shadow-lg shadow-indigo-200">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-extrabold text-slate-900 tracking-tight">Edit Vacancy</h2>
                                <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-widest mt-0.5">Modifying: <span class="text-indigo-600">{{ $job->title }}</span></p>
                            </div>
                        </div>
                        <a href="{{ url()->previous() }}" class="group flex items-center gap-2 px-4 py-2 rounded-xl hover:bg-slate-100 text-slate-400 hover:text-slate-600 transition-all duration-300">
                            <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            <span class="text-[10px] font-bold uppercase tracking-wider">Back to List</span>
                        </a>
                    </div>

                    <!-- Main Form Card -->
                    <form action="{{ route('employer.jobs.update', $job->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
                            <div class="p-8 lg:p-12">
                                
                                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                                    
                                    <!-- Left Column: Core Details -->
                                    <div class="lg:col-span-7 space-y-8">
                                        <div>
                                            <label class="flex items-center gap-2 text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-4">
                                                <span class="w-5 h-5 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center text-[9px]">01</span>
                                                Update Position Information
                                            </label>
                                            
                                            <div class="space-y-5">
                                                <div class="group">
                                                    <label class="block text-xs font-bold text-slate-700 mb-2 ml-1">Official Job Title</label>
                                                    <input type="text" name="title" value="{{ old('title', $job->title) }}" 
                                                        class="w-full bg-slate-50/50 border-slate-100 rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 p-4 text-sm font-medium transition-all" required>
                                                </div>

                                                <div class="grid grid-cols-2 gap-5">
                                                    <div>
                                                        <label class="block text-xs font-bold text-slate-700 mb-2 ml-1">Industry Category</label>
                                                        <select name="category_id" class="w-full bg-slate-50/50 border-slate-100 rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 p-4 text-sm font-medium cursor-pointer transition-all">
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}" {{ $job->category_id == $category->id ? 'selected' : '' }}>
                                                                    {{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label class="block text-xs font-bold text-slate-700 mb-2 ml-1">Work Mode</label>
                                                        <select name="type" class="w-full bg-slate-50/50 border-slate-100 rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 p-4 text-sm font-medium cursor-pointer transition-all">
                                                            @foreach(['Full-time', 'Part-time', 'Remote', 'Contract'] as $type)
                                                                <option value="{{ $type }}" {{ $job->type == $type ? 'selected' : '' }}>{{ $type }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div>
                                                    <label class="block text-xs font-bold text-slate-700 mb-2 ml-1">Required Skills (Comma separated)</label>
                                                    <input type="text" name="skills" value="{{ old('skills', $job->skills ?? '') }}" 
                                                        class="w-full bg-slate-50/50 border-slate-100 rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 p-4 text-sm font-medium transition-all" 
                                                        placeholder="e.g. PHP, Laravel, Tailwind CSS">
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="flex items-center gap-2 text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-4">
                                                <span class="w-5 h-5 rounded-full bg-violet-50 text-violet-600 flex items-center justify-center text-[9px]">02</span>
                                                Job Description & Responsibilities
                                            </label>
                                            <textarea name="description" rows="8" 
                                                class="w-full bg-slate-50/50 border-slate-100 rounded-3xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 p-6 text-sm font-medium leading-relaxed resize-none transition-all" required>{{ old('description', $job->description) }}</textarea>
                                        </div>
                                    </div>

                                    <!-- Right Column: Logistics & Meta -->
                                    <div class="lg:col-span-5 space-y-8">
                                        <div class="bg-slate-50/50 rounded-[2rem] p-8 border border-slate-100 space-y-6">
                                            <label class="flex items-center gap-2 text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em]">
                                                <span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center text-[9px]">03</span>
                                                Logistics & Budget
                                            </label>

                                            <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                    <label class="block text-[10px] font-black text-slate-500 uppercase mb-2 ml-1">Openings</label>
                                                    <input type="number" name="vacancy" value="{{ old('vacancy', $job->vacancy) }}" class="w-full bg-white border-slate-100 rounded-xl focus:ring-4 focus:ring-emerald-500/10 p-3.5 text-sm font-bold transition-all">
                                                </div>
                                                <div>
                                                    <label class="block text-[10px] font-black text-slate-500 uppercase mb-2 ml-1">Salary Range</label>
                                                    <input type="text" name="salary_range" value="{{ old('salary_range', $job->salary_range) }}" class="w-full bg-white border-slate-100 rounded-xl focus:ring-4 focus:ring-emerald-500/10 p-3.5 text-sm font-bold transition-all">
                                                </div>
                                            </div>

                                            <div>
                                                <label class="block text-[10px] font-black text-slate-500 uppercase mb-2 ml-1">Location</label>
                                                <div class="relative group">
                                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-indigo-500 transition-colors">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                                    </span>
                                                    <input type="text" name="location" value="{{ old('location', $job->location) }}" class="w-full bg-white border-slate-100 rounded-xl focus:ring-4 focus:ring-indigo-500/10 p-3.5 pl-11 text-sm font-bold transition-all">
                                                </div>
                                            </div>

                                            <div>
                                                <label class="block text-[10px] font-black text-slate-500 uppercase mb-2 ml-1">Application Deadline</label>
                                                <input type="date" name="deadline" value="{{ old('deadline', $job->deadline) }}" class="w-full bg-white border-slate-100 rounded-xl focus:ring-4 focus:ring-indigo-500/10 p-3.5 text-sm font-bold text-slate-600 cursor-pointer transition-all">
                                            </div>

                                            <div class="pt-4 mt-4 border-t border-slate-200/50">
                                                <p class="text-[10px] font-bold leading-tight uppercase tracking-tight text-slate-400">
                                                    Updating this post will notify <span class="text-indigo-600">interested applicants</span> of the changes.
                                                </p>
                                            </div>
                                        </div>

                                        <button type="submit" class="group w-full bg-indigo-600 text-white p-5 rounded-2xl font-bold text-sm uppercase tracking-widest shadow-xl shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-1 active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                                            <span>Update Job Circular</span>
                                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                        </button>
                                        
                                        <a href="{{ route('dashboard') }}" class="block text-center text-[11px] font-bold text-slate-400 uppercase tracking-widest hover:text-red-500 transition-colors">
                                            Cancel Editing
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Error Handling -->
                    @if ($errors->any())
                        <div class="fixed bottom-10 right-10 z-50 animate-slide-in">
                            <div class="bg-white border-l-4 border-red-500 shadow-2xl rounded-2xl p-5 flex items-start gap-4 max-w-md">
                                <div class="p-2 bg-red-50 rounded-lg">
                                    <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-900">Please fix the following:</h4>
                                    <ul class="mt-1 space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li class="text-[11px] font-medium text-slate-500">• {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes slide-in {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        .animate-slide-in {
            animation: slide-in 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</x-app-layout>