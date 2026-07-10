@extends('admin.layouts.app')

@section('content')
<div class="p-6 sm:p-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto">
        
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Applications Management</h2>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 border-b border-gray-100">
                        <tr>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase">Candidate</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase">Job</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase text-center">Salary</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase text-center">Status</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase text-center">Shortlisted</th>                            
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($applications as $application)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-4">
                                <span class="font-bold text-gray-800">{{ $application->user->name ?? 'N/A' }}</span>
                            </td>
                            <td class="p-4 text-sm text-gray-600">
                                {{ $application->job->title ?? 'N/A' }}
                            </td>
                            <td class="p-4 text-center text-sm font-mono font-medium">
                                {{ $application->expected_salary }}
                            </td>
                            <td class="p-4 text-center">
                                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase {{ $application->status == 'approved' ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700' }}">
                                    {{ ucfirst($application->status) }}
                                </span>
                            </td>
                            <td class="p-4 text-center">
                                @if($application->is_shortlisted)
                                    <span class="text-green-600 font-bold text-sm inline-flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path></svg> Yes
                                    </span>
                                @else
                                    <span class="text-red-500 text-sm">No</span>
                                @endif
                            </td>
                            
                            <td class="p-4 text-right">
                                <a href="{{ route('admin.applications.show', $application->id) }}" 
                                   class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-xs font-bold transition-all shadow-sm">
                                    View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-6 border-t border-gray-50">
                {{ $applications->links() }}
            </div>
        </div>
    </div>
</div>
@endsection