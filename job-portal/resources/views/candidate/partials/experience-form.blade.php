<div class="experience-item bg-white p-6 rounded-xl shadow-sm border border-gray-200 mb-6 relative">
    @if($index > 0 || $exp)
    <button type="button" onclick="this.parentElement.remove()" class="absolute top-4 right-4 text-red-500 hover:text-red-700">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
    </button>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Company Name *</label>
            <input type="text" name="company_name[{{ $index }}]" value="{{ $exp->company_name ?? '' }}" required class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Job Title *</label>
            <input type="text" name="job_title[{{ $index }}]" value="{{ $exp->job_title ?? '' }}" required class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Employment Type</label>
            <select name="employment_type[{{ $index }}]" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">Select Type</option>
                <option {{ ($exp->employment_type ?? '') == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                <option {{ ($exp->employment_type ?? '') == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                <option {{ ($exp->employment_type ?? '') == 'Internship' ? 'selected' : '' }}>Internship</option>
                <option {{ ($exp->employment_type ?? '') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
            <input type="date" name="start_date[{{ $index }}]" value="{{ $exp->start_date ?? '' }}" class="w-full border-gray-300 rounded-lg shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
            <input type="date" name="end_date[{{ $index }}]" value="{{ $exp->end_date ?? '' }}" {{ ($exp->currently_working ?? false) ? 'disabled' : '' }} class="w-full border-gray-300 rounded-lg shadow-sm end-date-input {{ ($exp->currently_working ?? false) ? 'bg-gray-100' : '' }}">
            <div class="mt-2 flex items-center">
                <input type="checkbox" name="currently_working[{{ $index }}]" onchange="toggleEndDate(this)" {{ ($exp->currently_working ?? false) ? 'checked' : '' }} class="rounded text-blue-600 focus:ring-blue-500 mr-2">
                <span class="text-xs text-gray-600">I currently work here</span>
            </div>
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Responsibilities</label>
            <textarea name="responsibilities[{{ $index }}]" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm">{{ $exp->responsibilities ?? '' }}</textarea>
        </div>
    </div>
</div>