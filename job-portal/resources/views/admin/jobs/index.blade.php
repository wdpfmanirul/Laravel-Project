@extends('admin.layouts.app')

@section('content')
<div class="p-6 sm:p-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-800 tracking-tight">Jobs Management</h2>
                <p class="text-sm text-gray-500">Overview of all posted job opportunities</p>
            </div>
            <div class="bg-indigo-50 border border-indigo-100 text-indigo-700 px-4 py-2 rounded-xl text-sm font-bold shadow-sm">
                Total Jobs: {{ $jobs->total() }}
            </div>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="p-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Job Details</th>
                            <th class="p-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Employer</th>
                            <th class="p-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Applications</th>
                            <th class="p-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Type & Status</th>
                            <th class="p-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($jobs as $job)
                        <tr class="hover:bg-indigo-50/10 transition-colors">
                            <td class="p-4">
                                <div class="text-sm font-bold text-gray-900 mb-1">{{ $job->title }}</div>
                                <div class="flex items-center gap-2 text-xs text-gray-500 font-medium">
                                    <span class="flex items-center gap-0.5">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                        {{ $job->category }}
                                    </span>
                                    <span class="text-gray-300">•</span>
                                    <span class="flex items-center gap-0.5">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        {{ $job->location }}
                                    </span>
                                </div>
                            </td>
                            <td class="p-4 text-sm font-medium text-indigo-600">
                                {{ optional($job->employer)->name ?? 'N/A' }}
                            </td>
                            <td class="p-4 text-center">
                                <span class="bg-slate-100 text-slate-700 px-2.5 py-1 rounded-lg text-xs font-bold border border-slate-200">
                                    {{ $job->applications->count() }}
                                </span>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex flex-col items-center gap-1.5">
                                    <span class="px-2 py-0.5 bg-blue-50 text-blue-600 rounded text-[10px] font-bold uppercase tracking-tight">
                                        {{ $job->type }}
                                    </span>
                                    @if($job->status == 'active')
                                        <span class="px-2 py-0.5 bg-green-100 text-green-700 rounded-full text-[10px] font-extrabold uppercase">Active</span>
                                    @else
                                        <span class="px-2 py-0.5 bg-red-100 text-red-700 rounded-full text-[10px] font-extrabold uppercase">Inactive</span>
                                    @endif
                                </div>
                            </td>
                            <td class="p-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.jobs.show',$job->id) }}" 
                                       class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-all" title="View Job">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.jobs.delete',$job->id) }}" class="inline">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Delete this job?')" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-all" title="Delete Job">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-12 text-center text-gray-400 font-medium">No jobs found in system.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-6 border-t border-gray-50">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection