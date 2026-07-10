<x-app-layout>

<div class="flex min-h-screen bg-gray-50">

    <!-- SIDEBAR -->
@include('candidate.layouts.sidebar')

<!-- MAIN CONTENT -->
<div class="ml-64 w-full py-10 px-6">

    <!-- HEADER -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Candidate Dashboard
        </h1>
        <p class="text-gray-500">
            Welcome back, build your career step by step.
        </p>
    </div>

    <!-- STATS -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

        <div class="bg-white p-6 rounded-2xl shadow">
            <p class="text-sm text-gray-500">Profile Completion</p>
            <h2 class="text-2xl font-bold text-indigo-600">
                {{ number_format($profileCompletion) }}%
            </h2>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <p class="text-sm text-gray-500">Applied Jobs</p>
            <h2 class="text-2xl font-bold">
                {{ $appliedJobsCount }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <p class="text-sm text-gray-500">Saved Jobs</p>
            <h2 class="text-2xl font-bold">
                {{ $savedJobsCount }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <p class="text-sm text-gray-500">Interviews</p>

            <h2 class="text-2xl font-bold">
                {{ $interviewsCount }}
            </h2>
        </div>

    </div>

    <!-- PROFILE PROGRESS -->
    <div class="bg-white p-6 rounded-2xl shadow mb-8">

        <div class="flex justify-between mb-2">
            <h3 class="font-semibold">Profile Strength</h3>
            <span class="text-indigo-600 font-bold">
                {{ number_format($profileCompletion) }}%
            </span>
        </div>

        <div class="w-full bg-gray-200 rounded-full h-3">
            <div class="bg-indigo-600 h-3 rounded-full"
                 style="width: {{ $profileCompletion }}%"></div>
        </div>

    </div>

    <!-- QUICK ACTIONS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <a href="{{ route('candidate.profile.personal') }}"
           class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <h3 class="font-bold">Complete Profile</h3>
            <p class="text-sm text-gray-500">Update your personal info</p>
        </a>

       

        <a href="{{ route('jobs.index') }}"
           class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <h3 class="font-bold">Find Jobs</h3>
            <p class="text-sm text-gray-500">Browse opportunities</p>
        </a>

    </div>

    <!-- RECOMMENDED JOBS -->
 <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">

    <h2 class="text-xl font-bold text-gray-900 mb-6 tracking-tight">
        Recommended Jobs
    </h2>

    <div class="grid md:grid-cols-2 gap-4">

        @forelse($recommendedJobs as $job)

            <div class="group border border-gray-150 rounded-2xl p-5 hover:border-indigo-200 hover:shadow-md hover:shadow-indigo-50/50 transition-all duration-300 bg-white">

                <h3 class="font-bold text-gray-800 group-hover:text-indigo-600 transition-colors duration-200 text-lg">
                    {{ $job->title }}
                </h3>

                <p class="text-sm text-gray-500 mt-1 flex items-center gap-1">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    {{ $job->location }}
                </p>

                <div class="flex items-center justify-between gap-3 mt-5 pt-3 border-t border-gray-50">

                    <div class="flex items-center gap-4">
                        <a href="{{ route('jobs.show', $job->id) }}"
                           class="text-indigo-600 hover:text-indigo-800 text-sm font-semibold tracking-wide transition-colors duration-200">
                            View Job
                        </a>

                        @if($job->user_id)
                            <a href="{{ route('candidate.company.show', $job->user_id) }}"
                               class="text-gray-500 hover:text-indigo-600 text-sm font-semibold tracking-wide transition-colors duration-200 flex items-center gap-1">
                                🏢 View Company
                            </a>
                        @endif
                    </div>

                    @php
                        $isSaved = auth()->user()
                            ? auth()->user()->savedJobs()->where('job_id', $job->id)->exists()
                            : false;
                    @endphp

                   <button
                        class="save-btn inline-flex items-center gap-1.5 text-xs font-bold px-4 py-2 rounded-xl transition-all duration-200 border cursor-pointer active:scale-95
                        {{ $isSaved
                            ? 'bg-emerald-50 text-emerald-700 border-emerald-200 hover:bg-emerald-100 hover:border-emerald-300'
                            : 'bg-indigo-50 text-indigo-700 border-indigo-150 hover:bg-indigo-100 hover:border-indigo-200'
                        }}"
                        data-id="{{ $job->id }}"
                    >
                        @if($isSaved)
                            <svg class="w-3.5 h-3.5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Saved</span>
                        @else
                            <svg class="w-3.5 h-3.5 text-indigo-650" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                            </svg>
                            <span>Save</span>
                        @endif
                    </button>

                </div>

            </div>

        @empty
            <div class="col-span-2 text-center py-8">
                <p class="text-gray-400">No recommended jobs available.</p>
            </div>
        @endforelse

    </div>

</div>

</div>

</div>
<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.save-btn').forEach(button => {

        button.addEventListener('click', function () {

            let jobId = this.getAttribute('data-id');
            let btn = this;

            fetch(`/candidate/save-job/${jobId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {

                if (data.status === 'saved') {
                    btn.innerText = 'Saved ✓';
                    btn.classList.remove('bg-white-500');
                    btn.classList.add('bg-green-600');
                }

                if (data.status === 'unsaved') {
                    btn.innerText = 'Save';
                    btn.classList.remove('bg-green-600');
                    btn.classList.add('bg-yellow-500');
                }

            })
            .catch(error => console.log(error));

        });

    });

});
</script>
</x-app-layout>