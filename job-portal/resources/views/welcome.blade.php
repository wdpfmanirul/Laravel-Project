<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobPortal | Connect to Your Future</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { font-family: 'Inter', sans-serif; }
        .glass-card {
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,0.5);
        }
        .hero-blur {
            background: radial-gradient(circle at 10% 20%, rgba(37, 99, 235, 0.08), rgba(236, 72, 153, 0.03));
        }
        .job-card-modern {
            transition: all 0.35s cubic-bezier(0.2, 0, 0, 1);
        }
        .job-card-modern:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 36px -16px rgba(0, 0, 0, 0.12), 0 0 0 1px rgba(59,130,246,0.15);
            border-color: rgba(59,130,246,0.3);
        }
        .category-tile {
            transition: all 0.25s ease;
        }
        .category-tile:hover {
            transform: translateY(-3px);
            background: white;
            border-color: #e2e8f0;
            box-shadow: 0 20px 30px -12px rgba(0,0,0,0.05);
        }
        .gradient-border {
            background: linear-gradient(135deg, #2563eb, #db2777);
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .animated-icon {
            transition: transform 0.2s;
        }
        .group:hover .animated-icon {
            transform: translateX(4px);
        }
        .badge-new {
            background: linear-gradient(135deg, #2563eb10, #db277710);
        }
    </style>
</head>
<body class="bg-[#fafbfe] text-gray-800 antialiased">

<!-- ================= 1. NAVIGATION (PREMIUM GLASS) ================= -->
<header class="sticky top-0 z-50 bg-white/75 backdrop-blur-xl border-b border-gray-200/50 shadow-sm">
    <div class="max-w-7xl mx-auto px-5 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">
            <!-- Logo -->
            <div class="flex items-center gap-2">
                <div class="flex items-center space-x-10">
                    <a href="/" class="text-2xl font-extrabold tracking-tight flex items-center">
                        <img src="/images/logo.png" alt="JobPortal Logo" class="h-10 w-auto mr-2 rounded-lg">
                        <span class="text-blue-900">Job</span><span class="text-pink-600">Portal</span>
                    </a>
                    <nav class="hidden lg:flex space-x-8 text-[15px] font-semibold text-gray-600">
                        <a href="/" class="hover:text-blue-600 transition">Home</a>
                        <a href="{{ route('jobs.index') }}" class="hover:text-blue-600 transition">Find Jobs</a>
                        <a href="{{ route('companies.index') }}" class="hover:text-blue-600 transition">Companies</a>
                    </nav>
                </div>                
            </div>

            <div class="flex items-center gap-3">
                @if (Route::has('login'))
                    @auth
                        <div class="flex items-center gap-3">
                            <a href="{{ route('dashboard') }}" class="text-sm font-semibold text-slate-700 px-4 py-2 rounded-full hover:bg-slate-100 transition">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-sm font-semibold text-rose-600 px-5 py-2 rounded-full border border-rose-200 hover:bg-rose-50 transition">Logout</button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-700 hover:text-indigo-600 transition">Sign In</a>
                        <a href="{{ route('register') }}" class="px-5 py-2.5 bg-indigo-600 text-white text-sm font-bold rounded-full shadow-md hover:bg-indigo-700 transition transform hover:scale-105">Register</a>
                    @endauth
                @endif
            </div>
        </div>
    </div>
</header>

<!-- ================= 2. HERO SECTION (FRESH, MODERN) ================= -->
<section class="relative overflow-hidden pt-14 pb-20 lg:pt-20 lg:pb-28 px-6 hero-blur">
    <div class="relative max-w-5xl mx-auto text-center z-2">
        <div class="inline-flex mb-5 gap-2 bg-white/60 backdrop-blur-md rounded-full py-1.5 px-4 border border-gray-200 shadow-sm">
            <span class="text-indigo-600 text-sm font-bold">✨ 15,000+ active jobs</span>
            <span class="text-gray-400 text-sm">|</span>
            <span class="text-gray-600 text-sm font-medium">Join 200+ companies</span>
        </div>
        <h1 class="text-5xl lg:text-7xl font-black tracking-tight text-gray-900 leading-[1.2] mb-6">
            Find your dream job <br> 
            <span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 bg-clip-text text-transparent">without boundaries.</span>
        </h1>
        <p class="text-gray-500 text-lg max-w-2xl mx-auto mb-10">Unlock opportunities that match your ambition — from startups to global leaders.</p>
        
        <!-- Enhanced Search Form -->
        <form action="{{ route('jobs.index') }}" method="GET" class="glass-card rounded-2xl shadow-2xl p-2 md:p-2.5 flex flex-col md:flex-row gap-2 bg-white border-gray-100">
            <div class="flex-1 flex items-center gap-2 px-5 py-3 rounded-xl bg-gray-50/80 focus-within:bg-white transition">
                <i class="fas fa-search text-gray-400 text-sm"></i>
                <input type="text" name="search" placeholder="Job title, keywords, or company" class="w-full bg-transparent focus:outline-none font-medium text-gray-700 placeholder:text-gray-400">
            </div>
            <div class="flex-1 flex items-center gap-2 px-5 py-3 rounded-xl bg-gray-50/80 focus-within:bg-white transition">
                <i class="fas fa-map-marker-alt text-gray-400 text-sm"></i>
                <input type="text" name="location" placeholder="City, state, or remote" class="w-full bg-transparent focus:outline-none font-medium text-gray-700">
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-8 py-3.5 rounded-xl font-bold hover:bg-indigo-700 transition-all shadow-md flex items-center justify-center gap-2">
                <span>Search Jobs</span>
                <i class="fas fa-arrow-right text-xs"></i>
            </button>
        </form>
        
        <!-- Trust Seal -->
        <div class="flex flex-wrap justify-center gap-6 mt-9 text-xs text-gray-400 font-medium">
            <span><i class="fas fa-check-circle text-indigo-400 mr-1"></i> Verified jobs</span>
            <span><i class="fas fa-chart-line text-indigo-400 mr-1"></i> Salary transparency</span>
            <span><i class="fas fa-shield-alt text-indigo-400 mr-1"></i> No spam</span>
        </div>
    </div>
    <div class="absolute -top-40 -right-40 w-80 h-80 bg-indigo-200/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-pink-200/20 rounded-full blur-3xl pointer-events-none"></div>
</section>

<!-- ================= 3. CATEGORIES SECTION (MODERN INTERACTIVE) ================= -->
<section class="py-16 lg:py-24 px-6 relative z-10">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white/70 backdrop-blur-md rounded-3xl shadow-xl border border-white/60 p-6 lg:p-10">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-indigo-50 rounded-full text-indigo-700 font-bold text-xs uppercase tracking-wider mb-4">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                            <span class="relative rounded-full h-2 w-2 bg-indigo-500"></span>
                        </span>
                        trending categories
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-extrabold tracking-tight text-slate-800">
                        Explore by <span class="bg-gradient-to-r from-indigo-600 to-pink-500 bg-clip-text text-transparent">Job Families</span>
                    </h2>
                </div>
                <div class="flex bg-slate-100 p-1 rounded-2xl border border-slate-200/60 shadow-inner">
                    <button onclick="switchTab('category')" id="btn-category" class="px-6 py-2.5 rounded-xl text-sm font-bold bg-white text-indigo-600 shadow-sm transition-all">By Category</button>
                    <button onclick="switchTab('industry')" id="btn-industry" class="px-6 py-2.5 rounded-xl text-sm font-bold text-slate-600 hover:text-slate-900 transition-all">By Industry</button>
                </div>
            </div>

            <!-- Category Grid -->
            <div id="category-content" class="transition-all duration-500">
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5">
                    @foreach($categories as $index => $category)
                    <a href="{{ route('jobs.index', ['category' => $category->id]) }}" 
                       class="category-item {{ $index >= 12 ? 'hidden' : '' }} group relative bg-white/50 hover:bg-white rounded-2xl border border-gray-100 hover:border-indigo-200 p-5 transition-all duration-300 block">
                        <div class="w-11 h-11 rounded-xl bg-indigo-50 group-hover:bg-indigo-100 flex items-center justify-center text-indigo-500 group-hover:text-indigo-700 mb-4 transition">
                            @if($category->icon)
                                <i class="{{ $category->icon }} text-lg"></i>
                            @else
                                <i class="fas fa-briefcase text-lg"></i>
                            @endif
                        </div>
                        <h3 class="font-bold text-slate-800 group-hover:text-indigo-700 text-sm leading-tight line-clamp-2">{{ $category->name }}</h3>
                        <div class="mt-3 flex items-center justify-between">
                            <span class="text-xs font-medium text-gray-400">{{ $category->jobs_count ?? 0 }} positions</span>
                            <i class="fas fa-chevron-right text-gray-300 group-hover:text-indigo-500 text-xs transition-transform group-hover:translate-x-1"></i>
                        </div>
                    </a>
                    @endforeach
                </div>
                @if(count($categories) > 12)
                <div class="mt-12 text-center">
                    <button id="view-all-btn" onclick="toggleCategories()" class="inline-flex items-center gap-2 px-6 py-3 bg-white border-2 border-gray-200 text-slate-700 font-bold rounded-xl hover:border-indigo-300 hover:text-indigo-600 transition-all shadow-sm">
                        <span id="btn-text">View All Categories</span>
                        <i id="btn-icon" class="fas fa-chevron-down text-xs transition-transform duration-300"></i>
                    </button>
                </div>
                @endif
            </div>

            <div id="industry-content" class="hidden text-center py-16">
                <div class="bg-gradient-to-r from-gray-50 to-indigo-50/30 rounded-2xl p-12 border border-dashed border-indigo-200">
                    <i class="fas fa-chart-network text-5xl text-indigo-300 mb-4 block"></i>
                    <h3 class="text-xl font-semibold text-gray-700">Industry Insights</h3>
                    <p class="text-gray-400 mt-2">Curated industry collections launching soon — stay tuned.</p>
                    <button class="mt-5 text-indigo-600 font-medium text-sm">Notify me <i class="fas fa-bell ml-1"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. LATEST JOBS SECTION (Premium Cards) ================= -->
<section class="py-16 bg-gradient-to-br from-gray-50 via-indigo-50/10 to-white lg:py-24 px-6">
    <div class="max-w-7xl mx-auto">

        <!-- SECTION HEADER -->
        <div class="flex flex-wrap items-end justify-between gap-6 mb-12 border-b border-gray-100 pb-6">
            <div>
                <span class="inline-flex items-center gap-2 px-3 py-1 bg-indigo-50 text-indigo-700 font-semibold text-xs tracking-wider uppercase rounded-full mb-3">
                    <i class="fas fa-fire-flame-text text-amber-500 animate-pulse"></i>
                    Fresh opportunities
                </span>
                <h2 class="text-3xl font-black text-gray-900 lg:text-4xl tracking-tight">
                    Latest <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-violet-600">Job Openings</span>
                </h2>
            </div>

            <a href="{{ route('jobs.index') }}" class="group flex items-center gap-2 text-indigo-600 font-bold text-sm transition-all hover:text-indigo-700">
                View all jobs
                <i class="fas fa-arrow-right text-xs transition-transform group-hover:translate-x-1"></i>
            </a>
        </div>

        <!-- JOB LIST GRID -->
       <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
    @foreach($jobs as $job)
        @php
            $isSaved = auth()->check() && auth()->user()->savedJobs()->where('job_id', $job->id)->exists();
        @endphp

        <div class="group relative flex flex-col justify-between p-6 bg-white border border-gray-200/80 rounded-2xl shadow-sm hover:shadow-md hover:border-indigo-200 transition-all duration-300 md:p-8">
            
            <div>
                <!-- TOP CARD ROW -->
                <div class="flex items-start justify-between gap-4 mb-4">
                    <div class="flex items-center gap-4">
                        <!-- COMPANY LOGO PLACEHOLDER -->
                        <div class="flex items-center justify-center shrink-0 w-14 h-14 bg-gradient-to-br from-indigo-50 to-violet-50 text-indigo-600 text-xl rounded-xl border border-indigo-100/50 group-hover:scale-105 transition-transform duration-300">
                            <i class="fas fa-building"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition-colors line-clamp-1">
                                {{ $job->title }}
                            </h3>
                            <p class="text-gray-500 text-sm font-medium flex items-center gap-1.5 mt-0.5">
                                <i class="fas fa-city text-gray-400 text-xs"></i>
                                {{ $job->company_name ?? 'Reputed Company' }}
                            </p>
                        </div>
                    </div>
                    
                    <!-- JOB TYPE BADGE -->
                    <span class="shrink-0 px-2.5 py-1 bg-indigo-50/60 text-indigo-700 text-xs font-bold rounded-lg border border-indigo-100/40">
                        {{ $job->type }}
                    </span>
                </div>

                <!-- JOB METADATA TAGS -->
                <div class="flex flex-wrap gap-2.5 my-5">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gray-50 text-gray-600 text-xs font-medium rounded-xl border border-gray-100">
                        <i class="fas fa-map-pin text-indigo-400"></i>
                        {{ $job->location }}
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-50/50 text-emerald-700 text-xs font-semibold rounded-xl border border-emerald-100/50">
                        <i class="fas fa-taka-sign text-emerald-500"></i>
                        ৳ {{ $job->salary_range }}
                    </span>
                    
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-50/50 text-blue-700 text-xs font-semibold rounded-xl border border-blue-100/40">
                        <i class="fas fa-users text-blue-500"></i>
                        Vacancy: {{ $job->vacancy ?? '1' }}
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-amber-50/40 text-amber-700 text-xs font-medium rounded-xl border border-amber-100/30">
                        <i class="far fa-calendar-alt text-amber-500"></i>
                        {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}
                    </span>

                    <!-- DEADLINE BADGE -->
                    @if($job->deadline)
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-rose-50/50 text-rose-700 text-xs font-semibold rounded-xl border border-rose-100/40 ml-auto md:ml-0">
                            <i class="far fa-clock text-rose-500"></i>
                            Deadline: {{ \Carbon\Carbon::parse($job->deadline)->format('d M Y') }}
                        </span>
                    @endif
                </div>
            </div>

            <!-- ACTION BUTTONS -->
          <div class="mt-4 pt-4 border-t border-gray-50">
    <div class="mb-3">
        <a href="{{ route('candidate.company.show', $job->user_id) }}"
           class="inline-flex items-center text-sm font-bold text-indigo-600 hover:text-indigo-800">
            <i class="fas fa-building mr-1.5 text-xs"></i> View Company
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
        @auth
            <a href="{{ route('jobs.show', $job->id) }}" class="w-full px-5 py-3 bg-gray-900 hover:bg-indigo-600 text-white text-center text-sm font-bold rounded-xl shadow-sm hover:shadow transition-all duration-200 order-1 sm:order-2">
                Apply Now <i class="fas fa-arrow-right text-xs ml-1"></i>
            </a>

            <button type="button" 
                    onclick="toggleSaveJob(this, {{ $job->id }})" 
                    class="w-full px-5 py-3 text-sm font-bold rounded-xl border transition-all duration-200 order-2 sm:order-1
                    {{ $isSaved ? 'bg-rose-50 border-rose-200 text-rose-600 hover:bg-rose-100' : 'bg-white border-gray-200 text-gray-700 hover:bg-gray-50' }}">
                <i class="{{ $isSaved ? 'fas fa-bookmark' : 'far fa-bookmark' }} mr-1.5"></i>
                {{ $isSaved ? 'Saved' : 'Save Job' }}
            </button>
        @else
            <a href="{{ route('login') }}" class="sm:col-span-2 w-full px-5 py-3 bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-700 hover:to-violet-700 text-white text-center text-sm font-bold rounded-xl shadow-md transition duration-200">
                <i class="fas fa-sign-in-alt mr-1.5"></i> Login to Apply
            </a>
        @endauth
    </div>
</div>

        </div>
    @endforeach
</div>

        <!-- EMPTY STATE -->
        @if($jobs->isEmpty())
            <div class="mt-12 py-24 bg-white border border-dashed border-gray-200 text-center rounded-3xl shadow-sm max-w-xl mx-auto">
                <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-folder-open text-gray-400 text-2xl"></i>
                </div>
                <h4 class="text-gray-900 font-bold text-lg">No jobs found</h4>
                <p class="text-gray-500 text-sm mt-1 max-w-xs mx-auto">
                    No active jobs at the moment. Check back soon for new opportunities!
                </p>
            </div>
        @endif

    </div>
</section>
<!-- ================= 5. FEATURED COMPANIES PREVIEW (BONUS) ================= -->
<section class="py-12 px-6 border-y border-gray-100 bg-white/50">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-8">
            <h3 class="text-2xl font-bold text-gray-800">Trusted by <span class="text-indigo-600">innovative teams</span></h3>
            <p class="text-gray-500 text-sm">Join 500+ companies using JobPortal to hire top talent</p>
        </div>
        <div class="flex flex-wrap justify-center gap-8 md:gap-12 opacity-70">
            <span class="font-mono font-bold text-gray-400 text-xl">Google</span>
            <span class="font-mono font-bold text-gray-400 text-xl">Stripe</span>
            <span class="font-mono font-bold text-gray-400 text-xl">Shopify</span>
            <span class="font-mono font-bold text-gray-400 text-xl">Microsoft</span>
            <span class="font-mono font-bold text-gray-400 text-xl">Atlassian</span>
        </div>
    </div>
</section>

<!-- ================= 6. FOOTER (MODERN DARK) ================= -->
<footer class="bg-slate-900 text-gray-300 pt-20 pb-10 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            <div class="space-y-5">
                <a href="/" class="text-2xl font-bold text-white flex items-center">
                    <img src="/images/logo.png" alt="JobPortal Logo" class="h-10 w-auto mr-2 rounded-lg">
                    <span>JobPortal</span>
                </a>
                <p class="text-sm text-gray-400 leading-relaxed">Connecting talent with purpose — next‑gen career platform for modern professionals.</p>
                <div class="flex gap-4 text-gray-500">
                    <i class="fab fa-linkedin hover:text-indigo-400 cursor-pointer transition"></i>
                    <i class="fab fa-twitter hover:text-indigo-400 cursor-pointer transition"></i>
                    <i class="fab fa-instagram hover:text-indigo-400 cursor-pointer transition"></i>
                </div>
            </div>
            <div>
                <h4 class="text-white font-bold text-md mb-5 tracking-wide">For Job Seekers</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="hover:text-indigo-300 transition">Browse Jobs</a></li>
                    <li><a href="#" class="hover:text-indigo-300 transition">Career Compass</a></li>
                    <li><a href="#" class="hover:text-indigo-300 transition">Salary Guide</a></li>
                    <li><a href="#" class="hover:text-indigo-300 transition">Resume Builder</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold text-md mb-5 tracking-wide">For Employers</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="hover:text-indigo-300 transition">Post a Job</a></li>
                    <li><a href="#" class="hover:text-indigo-300 transition">Talent Search</a></li>
                    <li><a href="#" class="hover:text-indigo-300 transition">Recruiting Solutions</a></li>
                    <li><a href="#" class="hover:text-indigo-300 transition">Pricing Plans</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold text-md mb-5 tracking-wide">Support</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="hover:text-indigo-300 transition">Help Center</a></li>
                    <li><a href="#" class="hover:text-indigo-300 transition">Privacy & Terms</a></li>
                    <li><a href="#" class="hover:text-indigo-300 transition">Contact Us</a></li>
                </ul>
                <div class="mt-6 bg-slate-800/50 rounded-xl p-3">
                    <p class="text-xs text-gray-400"><i class="fas fa-envelope mr-2"></i> support@jobportal.com</p>
                    <p class="text-xs text-gray-400 mt-1"><i class="fas fa-phone-alt mr-2"></i> +880 1234 567890</p>
                </div>
            </div>
        </div>
        <div class="border-t border-slate-800 mt-14 pt-8 text-center text-xs text-gray-500 flex flex-col md:flex-row justify-between gap-2">
            <span>© 2026 JobPortal — All rights reserved.</span>
            <span>Made with <i class="fas fa-heart text-rose-400 text-xs"></i> for career growth</span>
            <a href="{{ route('admin.login') }}"
                class="text-[11px] text-slate-600 hover:text-slate-400 transition">
                Administration
            </a>
        </div>
    </div>
</footer>

<script>
    // ---------- Tab Switching (Category / Industry) ----------
    function switchTab(type) {
        const catContent = document.getElementById('category-content');
        const indContent = document.getElementById('industry-content');
        const btnCat = document.getElementById('btn-category');
        const btnInd = document.getElementById('btn-industry');

        if (type === 'category') {
            catContent.classList.remove('hidden');
            indContent.classList.add('hidden');
            btnCat.classList.add('bg-white', 'text-indigo-600', 'shadow-sm');
            btnCat.classList.remove('text-slate-600');
            btnInd.classList.remove('bg-white', 'text-indigo-600', 'shadow-sm');
            btnInd.classList.add('text-slate-600');
        } else {
            catContent.classList.add('hidden');
            indContent.classList.remove('hidden');
            btnInd.classList.add('bg-white', 'text-indigo-600', 'shadow-sm');
            btnInd.classList.remove('text-slate-600');
            btnCat.classList.remove('bg-white', 'text-indigo-600', 'shadow-sm');
            btnCat.classList.add('text-slate-600');
        }
    }

    // ---------- Toggle All Categories (Show More / Less) ----------
    function toggleCategories() {
        const items = document.querySelectorAll('.category-item');
        const btnText = document.getElementById('btn-text');
        const btnIcon = document.getElementById('btn-icon');
        
        if(items.length === 0) return;
        const firstHidden = items[12];
        if(!firstHidden) return;
        
        const isCurrentlyHidden = firstHidden.classList.contains('hidden');
        
        items.forEach((item, idx) => {
            if(idx >= 12) {
                if(isCurrentlyHidden) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            }
        });
        
        if(isCurrentlyHidden) {
            btnText.innerText = 'Show Less';
            btnIcon.classList.add('rotate-180');
        } else {
            btnText.innerText = 'View All Categories';
            btnIcon.classList.remove('rotate-180');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
       
        const itemsAll = document.querySelectorAll('.category-item');
        if(itemsAll.length <= 12) {
            const viewBtn = document.getElementById('view-all-btn');
            if(viewBtn) viewBtn.style.display = 'none';
        }
        
    });
</script>
<script>
async function toggleSaveJob(button, jobId)
{
    try {

        let response = await fetch(`/candidate/save-job/${jobId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });

        let data = await response.json();

        if(data.status === 'saved') {

            button.innerHTML = '✓ Saved';

            button.classList.remove('bg-yellow-500', 'hover:bg-yellow-600');

            button.classList.add('bg-green-600', 'hover:bg-red-500');

        } else {

            button.innerHTML = 'Save Job';

            button.classList.remove('bg-green-600', 'hover:bg-red-500');

            button.classList.add('bg-yellow-500', 'hover:bg-yellow-600');
        }

    } catch(error) {
        console.log(error);
    }
}
</script>
</body>
</html>