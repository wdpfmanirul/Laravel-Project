@extends('admin.layouts.app')

@section('content')
<div class="p-6 sm:p-8 bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto">
        
        <!-- Header & Back Navigation -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-extrabold text-gray-800 tracking-tight">Application Details</h1>
            <a href="{{ url()->previous() }}" class="text-indigo-600 hover:text-indigo-800 font-bold text-sm flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <!-- Top Section: Basic Info -->
            <div class="bg-slate-900 p-8 text-white">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-slate-400 text-xs uppercase font-bold tracking-widest mb-1">Candidate Name</p>
                        <h2 class="text-3xl font-bold">{{ $application->user->name }}</h2>
                        <p class="text-slate-300 mt-1 flex items-center gap-2">
                            <svg class="w-4 h-4 text-indigo-400" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                            {{ $application->user->email }}
                        </p>
                    </div>
                    <div class="flex md:justify-end items-center">
                        <div class="bg-white/10 px-6 py-3 rounded-2xl backdrop-blur-sm border border-white/10">
                            <p class="text-slate-400 text-xs font-bold uppercase">Current Status</p>
                            <p class="text-xl font-bold text-indigo-400">{{ ucfirst($application->status) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <!-- Application & Job Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-12">
                    <div class="space-y-6">
                        <h3 class="text-lg font-bold text-gray-800 border-b pb-2 flex items-center gap-2">
                            <span class="w-2 h-6 bg-indigo-600 rounded-full"></span> Job Information
                        </h3>
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label class="text-xs font-bold text-gray-400 uppercase">Applying For</label>
                                <p class="text-gray-800 font-semibold text-lg">{{ $application->job->title ?? '-' }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-400 uppercase">Expected Salary</label>
                                <p class="text-indigo-600 font-bold text-xl">{{ $application->expected_salary }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-400 uppercase">Final Status</label>
                                <p class="text-gray-700 font-medium">{{ $application->final_status ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    @if($application->candidateProfile)
                    <div class="space-y-6">
                        <h3 class="text-lg font-bold text-gray-800 border-b pb-2 flex items-center gap-2">
                            <span class="w-2 h-6 bg-green-500 rounded-full"></span> Personal Information
                        </h3>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="text-xs font-bold text-gray-400 uppercase tracking-tighter">Phone</label>
                                <p class="text-gray-800 font-medium">{{ $application->candidateProfile->phone }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-400 uppercase tracking-tighter">District</label>
                                <p class="text-gray-800 font-medium">{{ $application->candidateProfile->district }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-400 uppercase tracking-tighter">Gender</label>
                                <p class="text-gray-800 font-medium">{{ $application->candidateProfile->gender }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-400 uppercase tracking-tighter">Nationality</label>
                                <p class="text-gray-800 font-medium">{{ $application->candidateProfile->nationality }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Footer Actions -->
                <div class="flex flex-wrap items-center gap-4 pt-8 border-t border-gray-100">
                    <form method="POST" action="{{ route('admin.applications.approve', $application->id) }}">
                        @csrf
                        <button class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-green-100 transition-transform active:scale-95">
                            Approve
                        </button>
                    </form>

                    <form method="POST" action="{{ route('admin.applications.reject', $application->id) }}">
                        @csrf
                        <button class="bg-red-500 hover:bg-red-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-red-100 transition-transform active:scale-95">
                            Reject
                        </button>
                    </form>

                    <form method="POST" action="{{ route('admin.applications.delete', $application->id) }}" class="ml-auto">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Delete Application?')" 
                                class="text-gray-400 hover:text-red-600 font-bold px-4 py-2 rounded-lg transition-colors border border-transparent hover:border-red-100">
                            Delete Application
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection