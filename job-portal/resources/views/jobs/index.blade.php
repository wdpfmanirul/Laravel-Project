@extends('layouts.app')

@section('content')

<header class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-6 py-10">
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900">
            Available <span class="text-blue-600">Opportunities</span>
        </h1>
        <p class="text-gray-500 mt-2 text-lg">
            Find the right job using smart filters and apply with ease.
        </p>
    </div>
</header>

<main class="max-w-7xl mx-auto px-6 py-10">

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

        {{-- FILTER SIDEBAR --}}
        <aside class="lg:col-span-1">
            <div class="bg-white border rounded-2xl p-6 sticky top-24 shadow-sm">

                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-gray-900">Filters</h3>
                    <a href="{{ route('jobs.index') }}" class="text-xs text-blue-600 font-semibold hover:underline">
                        Reset
                    </a>
                </div>

                <form method="GET" class="space-y-5">

                    <input type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search jobs..."
                        class="w-full rounded-xl bg-gray-50 border-gray-200 text-sm px-4 py-3 focus:ring-2 focus:ring-blue-500">

                    <input type="text"
                        name="location"
                        value="{{ request('location') }}"
                        placeholder="Location"
                        class="w-full rounded-xl bg-gray-50 border-gray-200 text-sm px-4 py-3 focus:ring-2 focus:ring-blue-500">

                    <select name="category"
                        class="w-full rounded-xl bg-gray-50 border-gray-200 text-sm px-4 py-3 focus:ring-2 focus:ring-blue-500">

                        <option value="">All Categories</option>
                        @foreach($categories ?? [] as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach

                    </select>

                    <select name="salary"
                        class="w-full rounded-xl bg-gray-50 border-gray-200 text-sm px-4 py-3 focus:ring-2 focus:ring-blue-500">

                        <option value="">Any Salary</option>
                        <option value="0-20000">Below 20,000</option>
                        <option value="20000-50000">20,000 - 50,000</option>
                        <option value="50000-100000">50,000 - 100,000</option>
                        <option value="100000+">100,000+</option>

                    </select>

                    <button type="submit"
                        class="w-full bg-gray-900 text-white py-3 rounded-xl font-semibold hover:bg-blue-600 transition">
                        Apply Filters
                    </button>

                </form>
            </div>
        </aside>

        {{-- JOB LIST --}}
        <section class="lg:col-span-3 space-y-4">

    @forelse($jobs as $job)

       <div class="bg-white border rounded-2xl p-6 flex flex-col md:flex-row justify-between gap-6 hover:shadow-md transition">

    {{-- LEFT --}}
    <div class="flex gap-4">

        <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-xl">
            🏢
        </div>

        <div>
            <h2 class="text-lg font-bold text-gray-900 hover:text-blue-600 transition">
                {{ $job->title }}
            </h2>

            <p class="text-sm text-gray-500 mb-2">
                {{ $job->company_name ?? 'Reputed Company' }}
            </p>

            <div class="mb-3">
                <a href="{{ route('candidate.company.show', $job->user_id) }}"
                   class="inline-flex items-center text-sm font-bold text-indigo-600 hover:text-indigo-800">
                    <i class="fas fa-building mr-1.5 text-xs"></i> View Company
                </a>
            </div>

            <div class="flex flex-wrap gap-2 mt-3 text-xs">

                <span class="bg-gray-100 px-3 py-1 rounded-lg">
                    📍 {{ $job->location }}
                </span>

                <span class="bg-blue-50 text-blue-700 px-3 py-1 rounded-lg font-semibold">
                    ৳ {{ $job->salary_range }}
                </span>

                @if($job->type)
                    <span class="bg-green-50 text-green-700 px-3 py-1 rounded-lg">
                        {{ $job->type }}
                    </span>
                @endif
                {{-- VACANCY BADGE --}}
                <span class="bg-violet-50 text-violet-700 px-3 py-1 rounded-lg font-medium">
                    👥 Vacancy: {{ $job->vacancy ?? '1' }}
                </span>
                {{-- DEADLINE BADGE --}}
                @if($job->deadline)
                    <span class="bg-rose-50 text-rose-700 px-3 py-1 rounded-lg font-medium">
                        ⏱️ Deadline: {{ \Carbon\Carbon::parse($job->deadline)->format('d M Y') }}
                    </span>
                @endif

            </div>
        </div>
    </div>

    {{-- ACTIONS --}}
    <div class="flex flex-col gap-2 w-full md:w-auto">

        @auth

            <a href="{{ route('jobs.show', $job->id) }}"
               class="text-center px-6 py-2 rounded-xl border border-gray-900 text-gray-900 text-xs font-bold hover:bg-gray-900 hover:text-white transition">
                View Details
            </a>

            @php
                $isSaved = auth()->user()->savedJobs()->where('job_id', $job->id)->exists();
            @endphp

            <button
                class="save-btn w-full px-6 py-2 rounded-xl text-xs font-bold transition
                {{ $isSaved ? 'bg-green-600 text-white' : 'bg-yellow-500 text-white' }}"
                data-id="{{ $job->id }}"
            >
                {{ $isSaved ? 'Saved' : 'Save Job' }}
            </button>

        @else

            <a href="{{ route('login') }}"
               class="text-center px-6 py-2 bg-pink-600 text-white rounded-xl text-xs font-bold hover:bg-pink-700">
                Login to Apply
            </a>

        @endauth

    </div>

</div>

    @empty

        <div class="text-center py-20 border rounded-2xl bg-white">
            <p class="text-gray-500">No jobs found</p>
            <a href="{{ route('jobs.index') }}" class="text-blue-600 mt-2 inline-block hover:underline">
                Clear filters
            </a>
        </div>

    @endforelse

    <div class="pt-6">
        {{ $jobs->appends(request()->query())->links() }}
    </div>

</section>
    </div>
</main>
<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.save-btn').forEach(button => {

        button.addEventListener('click', function () {

            let jobId = this.dataset.id;
            let btn = this;

            fetch(`/candidate/save-job/${jobId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {

                if (data.status === 'saved') {
                    btn.innerText = 'Saved';
                    btn.classList.remove('bg-yellow-500');
                    btn.classList.add('bg-green-600');
                }

                if (data.status === 'unsaved') {
                    btn.innerText = 'Save Job';
                    btn.classList.remove('bg-green-600');
                    btn.classList.add('bg-yellow-500');
                }

            });

        });

    });

});
</script>
@endsection