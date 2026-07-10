@extends('admin.layouts.app')

@section('content')
<div class="p-6 sm:p-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto">
        
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-800">Companies</h2>
                <p class="text-sm text-gray-500 font-medium">Manage and monitor registered organizations</p>
            </div>
            <div class="bg-indigo-600 text-white px-4 py-2 rounded-xl shadow-md text-sm font-bold">
                Total: {{ $companies->total() }}
            </div>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="p-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Company & Owner</th>
                            <th class="p-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Contact Info</th>
                            <th class="p-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Location</th>
                            <th class="p-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($companies as $company)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-4">
                                <div class="flex items-center gap-4">
                                    <div class="h-12 w-12 flex-shrink-0">
                                        @if($company->company_logo)
                                            <img src="{{ asset('storage/'.$company->company_logo) }}" 
                                                 class="h-12 w-12 rounded-xl object-cover shadow-sm border border-gray-100">
                                        @else
                                            <div class="h-12 w-12 rounded-xl bg-gray-100 flex items-center justify-center text-gray-400">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-gray-900">{{ $company->company_name }}</div>
                                        <div class="text-xs text-indigo-600 font-medium italic">Owner: {{ $company->user->name ?? '-' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <div class="text-sm text-gray-700 font-medium">{{ $company->company_email }}</div>
                                <div class="text-xs text-gray-400">{{ $company->company_phone }}</div>
                            </td>
                            <td class="p-4">
                                <span class="px-3 py-1 bg-slate-100 text-slate-600 rounded-full text-xs font-bold uppercase">
                                    {{ $company->district }}
                                </span>
                            </td>
                            <td class="p-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.companies.show',$company->id) }}" 
                                       class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-all border border-transparent hover:border-blue-100">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.companies.delete',$company->id) }}" class="inline">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Delete Company?')" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-all">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-12 text-center text-gray-400">No companies found in the database.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-6 border-t border-gray-50">
                {{ $companies->links() }}
            </div>
        </div>
    </div>
</div>
@endsection