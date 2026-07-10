@extends('admin.layouts.app')

@section('content')
<div class="p-6 sm:p-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto">
        
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-800 tracking-tight">Candidates Directory</h2>
                <p class="text-sm text-gray-500">Manage and view all registered candidates</p>
            </div>
            <div class="bg-white px-4 py-2 rounded-xl shadow-sm border border-gray-100">
                <span class="text-sm text-gray-500 font-medium">Total Candidates: </span>
                <span class="text-indigo-600 font-bold">{{ $candidates->total() }}</span>
            </div>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Candidate Info</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Contact</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Location</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Age/Gender</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($candidates as $candidate)
                        <tr class="hover:bg-indigo-50/20 transition-colors">
                            <!-- Photo & Name -->
                            <td class="p-4">
                                <div class="flex items-center">
                                    <div class="h-11 w-11 flex-shrink-0">
                                        @if(optional($candidate->candidateProfile)->photo)
                                            <img src="{{ asset('storage/' . $candidate->candidateProfile->photo) }}" 
                                                 class="h-11 w-11 rounded-full object-cover ring-2 ring-white shadow-sm">
                                        @else
                                            <div class="h-11 w-11 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold border border-indigo-200">
                                                {{ substr($candidate->name, 0, 1) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-bold text-gray-900">{{ $candidate->name }}</div>
                                        <div class="text-xs text-gray-400 font-medium">{{ $candidate->email }}</div>
                                    </div>
                                </div>
                            </td>

                            <!-- Phone -->
                            <td class="p-4 text-sm text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    {{ optional($candidate->candidateProfile)->phone ?? 'No Phone' }}
                                </div>
                            </td>

                            <!-- District -->
                            <td class="p-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">
                                    {{ optional($candidate->candidateProfile)->district ?? 'N/A' }}
                                </span>
                            </td>

                            <!-- Age & Gender -->
                            <td class="p-4 text-center">
                                <div class="text-sm font-semibold text-gray-700">
                                    {{ optional($candidate->candidateProfile)->age ?? '-' }} yrs
                                </div>
                                <div class="text-[10px] uppercase font-bold text-gray-400 tracking-tighter">
                                    {{ optional($candidate->candidateProfile)->gender ?? 'N/A' }}
                                </div>
                            </td>

                            <!-- Action -->
                            <td class="p-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.candidates.show',$candidate->id) }}"
                                       class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors shadow-sm border border-blue-50"
                                       title="View Details">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </a>

                                    <form method="POST" action="{{ route('admin.candidates.delete',$candidate->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure you want to delete this candidate?')"
                                                class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors border border-transparent hover:border-red-100"
                                                title="Delete Candidate">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="bg-gray-50 p-4 rounded-full mb-3">
                                        <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    </div>
                                    <h3 class="text-gray-500 font-bold">No Candidates Found</h3>
                                    <p class="text-gray-400 text-sm">There are no candidates registered in the system yet.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($candidates->hasPages())
            <div class="p-6 bg-white border-t border-gray-100">
                {{ $candidates->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection