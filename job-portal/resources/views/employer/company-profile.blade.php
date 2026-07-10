<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-slate-50 to-indigo-50/30 min-h-screen antialiased">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8 items-start">

                {{-- Sidebar Layout --}}
                <div class="w-full lg:w-1/4 sticky top-8">
                    @include('employer.sidebar')
                </div>

                {{-- Main Content Area --}}
                <div class="flex-1 w-full">

                    {{-- Dynamic Header Section --}}
                    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4 bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm">
                        <div>
                            <h1 class="text-3xl font-black tracking-tight text-slate-900 bg-gradient-to-r from-indigo-600 to-violet-600 bg-clip-text text-transparent">
                                Company Profile
                            </h1>
                            <p class="text-slate-500 mt-1 text-sm font-medium">
                                Build a powerful presence to attract industry-leading talent.
                            </p>
                        </div>
                        <div class="flex items-center gap-2 text-xs font-bold text-indigo-600 bg-indigo-50 px-4 py-2 rounded-full w-fit">
                            <span class="w-2 h-2 rounded-full bg-indigo-600 animate-pulse"></span>
                            Live on Profile
                        </div>
                    </div>

                    {{-- Session Notification Messages --}}
                    @if(session('success'))
                        <div class="mb-6 bg-emerald-50 border border-emerald-200/60 text-emerald-800 px-6 py-4 rounded-2xl font-semibold flex items-center gap-3 shadow-sm">
                            <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 bg-rose-50 border border-rose-200/60 text-rose-800 px-6 py-4 rounded-2xl shadow-sm">
                            <div class="flex items-center gap-2 font-bold text-rose-900 mb-2">
                                <svg class="w-5 h-5 text-rose-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                Please fix the following errors:
                            </div>
                            <ul class="list-disc pl-7 space-y-1 text-sm font-medium">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Main Profile Multi-Section Form Card --}}
                    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
                        <form
                            action="{{ route('employer.company.profile.update') }}"
                            method="POST"
                            enctype="multipart/form-data"
                            class="p-6 md:p-10 space-y-12">
                            
                            @csrf

                            {{-- SECTION 1: Identity & Brand --}}
                            <div class="border-l-4 border-indigo-600 pl-4 md:pl-6 space-y-8">
                                <div>
                                    <h2 class="text-xl font-bold text-slate-800">Company Identity</h2>
                                    <p class="text-xs text-slate-400 mt-0.5">Manage your core visual brand identity and legal business name.</p>
                                </div>

                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                                    
                                    {{-- Unified Logo Uploader with Fixed Preview Box --}}
                                    <div class="space-y-3">
                                        <label class="block text-sm font-bold text-slate-700">Company Logo</label>
                                        <div class="bg-slate-50 border-2 border-dashed border-slate-200 hover:border-indigo-400 rounded-3xl p-6 text-center transition-all duration-300">
                                            
                                            {{-- Main Preview Container --}}
                                            <div id="previewContainer" class="w-28 h-28 rounded-2xl mx-auto shadow-md border-2 border-white overflow-hidden bg-gradient-to-br from-indigo-50 to-violet-50 flex items-center justify-center">
                                                @if($company && $company->company_logo)
                                                    <img
                                                        id="logoPreview"
                                                        src="{{ asset('storage/' . $company->company_logo) }}"
                                                        class="w-full h-full object-cover">
                                                @else
                                                    <span id="initialsText" class="text-3xl font-black text-indigo-600">
                                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                                    </span>
                                                    <img
                                                        id="logoPreview"
                                                        src=""
                                                        class="w-full h-full object-cover hidden">
                                                @endif
                                            </div>

                                            <div class="mt-4">
                                                <label for="logoInput" class="cursor-pointer inline-flex items-center text-xs font-bold text-indigo-600 bg-indigo-50 hover:bg-indigo-100 px-4 py-2 rounded-xl transition">
                                                    Choose Image
                                                </label>
                                                {{-- Fixed name attribute according to your database column --}}
                                                <input type="file" name="company_logo" id="logoInput" accept="image/*" class="hidden">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Primary Text Inputs --}}
                                    <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="space-y-2">
                                            <label class="block text-sm font-bold text-slate-700">Company Name <span class="text-rose-500">*</span></label>
                                            <input
                                                type="text"
                                                name="company_name"
                                                value="{{ old('company_name', $company->company_name ?? '') }}"
                                                class="w-full h-12 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 text-slate-800 font-medium transition"
                                                required>
                                        </div>

                                        <div class="space-y-2">
                                            <label class="block text-sm font-bold text-slate-700">Industry Type</label>
                                            <input
                                                type="text"
                                                name="industry_type"
                                                value="{{ old('industry_type', $company->industry_type ?? '') }}"
                                                placeholder="e.g., Textiles, Software"
                                                class="w-full h-12 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 text-slate-800 font-medium transition">
                                        </div>

                                        <div class="space-y-2">
                                            <label class="block text-sm font-bold text-slate-700">Founded Year</label>
                                            <input
                                                type="number"
                                                name="founded_year"
                                                value="{{ old('founded_year', $company->founded_year ?? '') }}"
                                                placeholder="YYYY"
                                                class="w-full h-12 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 text-slate-800 font-medium transition">
                                        </div>

                                        <div class="space-y-2">
                                            <label class="block text-sm font-bold text-slate-700">Company Size</label>
                                            <select
                                                name="company_size"
                                                class="w-full h-12 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 text-slate-800 font-medium transition">
                                                <option value="">Select Corporate Scale</option>
                                                <option value="1-10" {{ (old('company_size', $company->company_size ?? '') == '1-10') ? 'selected' : '' }}>1-10 Employees</option>
                                                <option value="11-50" {{ (old('company_size', $company->company_size ?? '') == '11-50') ? 'selected' : '' }}>11-50 Employees</option>
                                                <option value="51-200" {{ (old('company_size', $company->company_size ?? '') == '51-200') ? 'selected' : '' }}>51-200 Employees</option>
                                                <option value="201-500" {{ (old('company_size', $company->company_size ?? '') == '201-500') ? 'selected' : '' }}>201-500 Employees</option>
                                                <option value="500+" {{ (old('company_size', $company->company_size ?? '') == '500+') ? 'selected' : '' }}>500+ Employees</option>
                                            </select>
                                        </div>

                                        {{-- Added: Total Employees Field --}}
                                        <div class="space-y-2 md:col-span-2">
                                            <label class="block text-sm font-bold text-slate-700">Total Employees (Exact Count)</label>
                                            <input
                                                type="number"
                                                name="total_employees"
                                                value="{{ old('total_employees', $company->total_employees ?? '') }}"
                                                placeholder="e.g., 1250"
                                                class="w-full h-12 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 text-slate-800 font-medium transition">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- SECTION 2: Communication Channels & Socials --}}
                            <div class="border-l-4 border-violet-500 pl-4 md:pl-6 space-y-6">
                                <div>
                                    <h2 class="text-xl font-bold text-slate-800">Contact & Social Channels</h2>
                                    <p class="text-xs text-slate-400 mt-0.5">Where candidates can connect and discover more about your company.</p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <label class="block text-sm font-bold text-slate-700">Official Email Address</label>
                                        <input
                                            type="email"
                                            name="company_email"
                                            value="{{ old('company_email', $company->company_email ?? '') }}"
                                            placeholder="hr@company.com"
                                            class="w-full h-12 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 text-slate-800 font-medium transition">
                                    </div>

                                    <div class="space-y-2">
                                        <label class="block text-sm font-bold text-slate-700">Phone Hotline</label>
                                        <input
                                            type="text"
                                            name="company_phone"
                                            value="{{ old('company_phone', $company->company_phone ?? '') }}"
                                            placeholder="+88017xxxxxxxx"
                                            class="w-full h-12 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 text-slate-800 font-medium transition">
                                    </div>

                                    <div class="space-y-2">
                                        <label class="block text-sm font-bold text-slate-700">Website URL</label>
                                        <input
                                            type="url"
                                            name="website"
                                            value="{{ old('website', $company->website ?? '') }}"
                                            placeholder="https://yourwebsite.com"
                                            class="w-full h-12 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 text-slate-800 font-medium transition">
                                    </div>

                                    <div class="space-y-2">
                                        <label class="block text-sm font-bold text-slate-700">LinkedIn Corporate Page</label>
                                        <input
                                            type="url"
                                            name="linkedin"
                                            value="{{ old('linkedin', $company->linkedin ?? '') }}"
                                            placeholder="https://linkedin.com/company/profile"
                                            class="w-full h-12 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 text-slate-800 font-medium transition">
                                    </div>

                                    {{-- Added: Facebook URL Field --}}
                                    <div class="space-y-2">
                                        <label class="block text-sm font-bold text-slate-700">Facebook Page URL</label>
                                        <input
                                            type="url"
                                            name="facebook"
                                            value="{{ old('facebook', $company->facebook ?? '') }}"
                                            placeholder="https://facebook.com/page"
                                            class="w-full h-12 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 text-slate-800 font-medium transition">
                                    </div>

                                    {{-- Added: YouTube URL Field --}}
                                    <div class="space-y-2">
                                        <label class="block text-sm font-bold text-slate-700">YouTube Channel URL</label>
                                        <input
                                            type="url"
                                            name="youtube"
                                            value="{{ old('youtube', $company->youtube ?? '') }}"
                                            placeholder="https://youtube.com/@channel"
                                            class="w-full h-12 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 text-slate-800 font-medium transition">
                                    </div>
                                </div>
                            </div>

                            {{-- SECTION 3: Location Details --}}
                            <div class="border-l-4 border-amber-500 pl-4 md:pl-6 space-y-6">
                                <div>
                                    <h2 class="text-xl font-bold text-slate-800">Location Area</h2>
                                    <p class="text-xs text-slate-400 mt-0.5">Specify regional information for target local job post filters.</p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    {{-- Added: Division --}}
                                    <div class="space-y-2">
                                        <label class="block text-sm font-bold text-slate-700">Division</label>
                                        <input
                                            type="text"
                                            name="division"
                                            value="{{ old('division', $company->division ?? '') }}"
                                            placeholder="e.g., Dhaka"
                                            class="w-full h-12 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 text-slate-800 font-medium transition">
                                    </div>

                                    {{-- Added: District --}}
                                    <div class="space-y-2">
                                        <label class="block text-sm font-bold text-slate-700">District</label>
                                        <input
                                            type="text"
                                            name="district"
                                            value="{{ old('district', $company->district ?? '') }}"
                                            placeholder="e.g., Dhaka"
                                            class="w-full h-12 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 text-slate-800 font-medium transition">
                                    </div>

                                    {{-- Added: Thana --}}
                                    <div class="space-y-2">
                                        <label class="block text-sm font-bold text-slate-700">Thana</label>
                                        <input
                                            type="text"
                                            name="thana"
                                            value="{{ old('thana', $company->thana ?? '') }}"
                                            placeholder="e.g., Uttara"
                                            class="w-full h-12 rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 text-slate-800 font-medium transition">
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-bold text-slate-700">Full Address</label>
                                    <textarea
                                        name="address"
                                        rows="3"
                                        placeholder="Full legal building or suite location..."
                                        class="w-full rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 text-slate-800 font-medium transition">{{ old('address', $company->address ?? '') }}</textarea>
                                </div>
                            </div>

                            {{-- SECTION 4: Brand Story (Mission, Vision & Description) --}}
                            <div class="border-l-4 border-fuchsia-500 pl-4 md:pl-6 space-y-6">
                                <div>
                                    <h2 class="text-xl font-bold text-slate-800">Our Story & Core Values</h2>
                                    <p class="text-xs text-slate-400 mt-0.5">Introduce your company culture, goals, and working ecosystem.</p>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-bold text-slate-700">Mission Statement</label>
                                    <textarea
                                        name="mission"
                                        rows="3"
                                        placeholder="What drives your company's mission?"
                                        class="w-full rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 text-slate-800 font-medium transition">{{ old('mission', $company->mission ?? '') }}</textarea>
                                </div>

                                {{-- Added: Vision Field --}}
                                <div class="space-y-2">
                                    <label class="block text-sm font-bold text-slate-700">Vision Statement</label>
                                    <textarea
                                        name="vision"
                                        rows="3"
                                        placeholder="What is your company's ultimate long-term vision?"
                                        class="w-full rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 text-slate-800 font-medium transition">{{ old('vision', $company->vision ?? '') }}</textarea>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-bold text-slate-700">In-Depth Company Description</label>
                                    <textarea
                                        name="description"
                                        rows="6"
                                        placeholder="Write an engaging overview detailing operations, background, work life, and benefits..."
                                        class="w-full rounded-xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 text-slate-800 font-medium transition">{{ old('description', $company->description ?? '') }}</textarea>
                                </div>
                            </div>

                            {{-- Form Submission Actions --}}
                            <div class="pt-6 border-t border-slate-100 flex justify-end">
                                <button
                                    type="submit"
                                    class="w-full sm:w-auto inline-flex items-center justify-center px-10 py-4 bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-700 hover:to-violet-700 text-white rounded-xl font-bold shadow-lg shadow-indigo-600/20 active:scale-[0.98] transition-all duration-200">
                                    Save Profile Changes
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        // Handle integrated live preview within the single avatar box component
        const logoInput = document.getElementById('logoInput');
        const logoPreview = document.getElementById('logoPreview');
        const initialsText = document.getElementById('initialsText');

        logoInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    logoPreview.src = event.target.result;
                    logoPreview.classList.remove('hidden');
                    
                    if (initialsText) {
                        initialsText.classList.add('hidden');
                    }
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>