<!-- resources/views/companies/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Companies | JobPortal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> <!-- Alpine.js for Nav -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-blue': '#2563eb',
                        'accent-pink': '#e91e63',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
        .company-card { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); border: 1px solid #f1f5f9; }
        .company-card:hover { transform: translateY(-8px); border-color: #2563eb; box-shadow: 0 20px 40px -15px rgba(37, 99, 235, 0.1); }
    </style>
</head>
<body class="antialiased">

<!-- ১. ইনক্লুড নেভিগেশন -->
@include('layouts.navigation')

<main class="max-w-7xl mx-auto px-6 py-16">
    <!-- ২. HERO SECTION -->
    <div class="text-center mb-16 space-y-4">
        <span class="bg-blue-50 text-blue-600 px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-widest border border-blue-100">Official Partners</span>
        <h1 class="text-4xl md:text-6xl font-extrabold text-slate-900 tracking-tight italic">Explore Top Employers</h1>
        <p class="text-slate-500 text-lg max-w-2xl mx-auto leading-relaxed font-medium">
            Discover and connect with world-class organizations. Learn about their culture, vision, and career opportunities.
        </p>
    </div>

    <!-- ৩. SEARCH COMPANIES -->
    <div class="max-w-3xl mx-auto mb-20">
        <form action="" class="bg-white p-2.5 rounded-[2rem] shadow-xl shadow-blue-900/5 border border-slate-100 flex flex-col md:flex-row gap-2">
            <div class="flex-1 flex items-center px-4">
                <span class="text-slate-400 mr-2 text-xl">🔍</span>
                <input type="text" placeholder="Search company by name or industry..." class="w-full py-3 px-3 focus:outline-none font-bold text-slate-600 text-sm">
            </div>
            <button class="bg-primary-blue text-white px-10 py-4 rounded-[1.5rem] font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-200">
                Search Directory
            </button>
        </form>
    </div>

    <!-- ৪. COMPANIES GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse($companies as $company)
            <div class="company-card bg-white p-8 rounded-[2.5rem] relative overflow-hidden group">
                {{-- Featured Badge --}}
                @if($company->is_featured ?? true)
                    <div class="absolute top-0 right-0 p-6">
                        <span class="bg-green-50 text-green-600 text-[10px] font-black uppercase px-3 py-1 rounded-full border border-green-100">
                            Actively Hiring
                        </span>
                    </div>
                @endif

                {{-- Logo --}}
                <div class="w-20 h-20 bg-slate-50 rounded-3xl flex items-center justify-center overflow-hidden mb-6 group-hover:scale-110 transition-transform duration-500 border border-slate-100 p-3">
                    @if($company->logo)
                        <img src="{{ asset('storage/' . $company->logo) }}" class="w-full h-full object-contain">
                    @else
                        <span class="text-4xl">🏢</span>
                    @endif
                </div>

                <h3 class="text-2xl font-extrabold text-slate-900 group-hover:text-primary-blue transition-colors">
                    {{ $company->company_name }}
                </h3>

                <p class="text-slate-400 text-sm font-bold mt-1 mb-8 flex items-center">
                    <span class="w-2 h-2 bg-blue-400 rounded-full mr-2"></span>
                    {{ $company->industry ?? 'Technology & IT' }}
                </p>

               <a href="{{ route('companies.jobs', $company->user_id) }}"
   class="flex items-center justify-between mb-8 pb-8 border-b border-slate-50 hover:bg-slate-50 transition rounded-2xl p-2 -m-2">

    <div class="text-left">
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">
            Open Roles
        </p>

        <p class="text-xl font-black text-slate-900 italic">
            {{ $company->jobs()->where('status', 'active')->count() }} Positions
        </p>
    </div>

    <div class="bg-blue-50 p-3 rounded-2xl">
        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M13 7l5 5m0 0l-5 5m5-5H6"
                  stroke-width="2.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>
    </div>

</a>

                <a href="{{ route('candidate.company.show', $company->user_id) }}"
                   class="inline-flex items-center justify-center w-full py-4 bg-slate-900 text-white text-xs font-black rounded-2xl hover:bg-primary-blue transition-all uppercase tracking-[0.15em]">
                    View Company Profile
                </a>
            </div>
        @empty
            <div class="col-span-full text-center py-24">
                <div class="bg-slate-100 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-4xl">📂</span>
                </div>
                <h2 class="text-2xl font-black text-slate-800">No Companies Found</h2>
                <p class="text-slate-400 mt-2 font-medium italic">We couldn't find any companies matching your search.</p>
            </div>
        @endforelse
    </div>
</main>

<footer class="bg-white border-t border-slate-100 py-12 mt-20">
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
        <p class="text-sm text-slate-400 font-bold italic">© 2026 <span class="text-slate-900">JobPortal</span>. Next-Gen Career Platform.</p>
        <div class="flex space-x-8 text-[10px] font-black text-slate-400 uppercase tracking-widest">
            <a href="#" class="hover:text-blue-600 transition">Privacy Policy</a>
            <a href="#" class="hover:text-blue-600 transition">Terms of Service</a>
            <a href="#" class="hover:text-blue-600 transition">Help Center</a>
        </div>
    </div>
</footer>

</body>
</html>