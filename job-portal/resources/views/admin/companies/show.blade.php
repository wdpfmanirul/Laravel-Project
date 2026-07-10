@extends('admin.layouts.app')

@section('content')
<div class="p-6 sm:p-8 bg-gray-50 min-h-screen">
    <div class="max-w-5xl mx-auto">
        
        <!-- Navigation -->
        <div class="mb-6">
            <a href="{{ url()->previous() }}" class="inline-flex items-center text-indigo-600 font-bold hover:gap-2 transition-all gap-1 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg> 
                Back to Directory
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <!-- Header Section -->
            <div class="bg-slate-900 p-8 md:p-12 text-white relative">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    @if($company->company_logo)
                        <img src="{{ asset('storage/'.$company->company_logo) }}" 
                             class="w-32 h-32 rounded-2xl object-cover ring-4 ring-white/10 shadow-2xl">
                    @endif
                    <div class="text-center md:text-left">
                        <span class="inline-block px-3 py-1 bg-indigo-500/20 text-indigo-300 rounded-full text-xs font-bold tracking-widest uppercase mb-3">
                            {{ $company->industry_type }}
                        </span>
                        <h1 class="text-4xl font-extrabold">{{ $company->company_name }}</h1>
                        <p class="text-slate-400 mt-2 flex items-center justify-center md:justify-start gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                            {{ $company->district }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="p-8 md:p-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                    <!-- Sidebar Details -->
                    <div class="md:col-span-1 space-y-6">
                        <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100">
                            <h3 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-4">Quick Info</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="text-xs font-bold text-indigo-600 block">Website</label>
                                    <a href="{{ $company->website }}" target="_blank" class="text-gray-800 font-semibold break-words hover:underline">{{ $company->website }}</a>
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-indigo-600 block">Company Size</label>
                                    <p class="text-gray-800 font-semibold">{{ $company->company_size }}</p>
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-indigo-600 block">Total Employees</label>
                                    <p class="text-gray-800 font-semibold">{{ $company->total_employees }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-indigo-50 p-6 rounded-2xl border border-indigo-100">
                            <h3 class="text-sm font-bold text-indigo-400 uppercase tracking-widest mb-4">Contact Owner</h3>
                            <div class="space-y-3">
                                <p class="text-gray-800 font-bold">{{ $company->user->name ?? '-' }}</p>
                                <p class="text-sm text-gray-600">{{ $company->company_email }}</p>
                                <p class="text-sm text-gray-600">{{ $company->company_phone }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Main Content -->
                    <div class="md:col-span-2 space-y-8">
                        <section>
                            <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                                <span class="w-1.5 h-6 bg-indigo-600 rounded-full"></span>
                                About the Company
                            </h3>
                            <div class="bg-white p-6 rounded-2xl border border-gray-100 text-gray-600 leading-relaxed shadow-sm">
                                {{ $company->description }}
                            </div>
                        </section>

                        <!-- Actions Area -->
                        <div class="flex gap-4 pt-6">
                            <form method="POST" action="{{ route('admin.companies.delete',$company->id) }}">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Confirm Delete?')" 
                                        class="px-6 py-3 bg-red-50 text-red-600 font-bold rounded-xl hover:bg-red-600 hover:text-white transition-all">
                                    Delete Registration
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection