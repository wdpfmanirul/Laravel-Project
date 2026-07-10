<x-app-layout>
<div class="flex min-h-screen bg-gray-50">
    @include('candidate.layouts.sidebar')

    <div class="ml-64 w-full py-10 px-8">
        <div class="max-w-5xl mx-auto">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Work Experience</h1>
                <p class="text-gray-500">Step 3 of 4: Your professional journey</p>
                <div class="w-full bg-gray-200 rounded-full h-2 mt-4">
                    <div class="bg-blue-600 h-2 rounded-full transition-all" style="width: 60%"></div>
                </div>
            </div>

            <form method="POST" action="{{ route('candidate.profile.experience.store') }}">
                @csrf
                <div id="experience-wrapper">
                    @forelse($experiences as $exp)
                        <div class="experience-item bg-white p-8 rounded-2xl border border-gray-100 shadow-sm mb-6 relative">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <input name="company_name[]" value="{{ $exp->company_name }}" placeholder="Company Name" class="w-full border-gray-200 rounded-xl md:col-span-2">
                                <input name="job_title[]" value="{{ $exp->job_title }}" placeholder="Job Title" class="w-full border-gray-200 rounded-xl">
                                <input type="date" name="start_date[]" value="{{ $exp->start_date }}" class="w-full border-gray-200 rounded-xl">
                                <textarea name="responsibilities[]" placeholder="Responsibilities" class="w-full border-gray-200 rounded-xl md:col-span-2">{{ $exp->responsibilities }}</textarea>
                            </div>
                        </div>
                    @empty
                        <!-- Script to add first row -->
                    @endforelse
                </div>
                <button type="button" onclick="addExperience()" class="bg-gray-800 text-white px-6 py-2.5 rounded-xl font-bold">+ Add Experience</button>
                <div class="flex justify-between mt-10 border-t pt-8">
                    <a href="{{ route('candidate.profile.education') }}" class="font-bold text-gray-500">← Back</a>
                    <button type="submit" class="bg-blue-600 text-white px-10 py-3.5 rounded-xl font-bold">Save & Continue</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

    function addExperience() {

        const wrapper = document.getElementById('experience-wrapper');

        const html = `
            <div class="experience-item bg-white p-8 rounded-2xl border border-gray-100 shadow-sm mb-6 relative">

                <button type="button"
                    onclick="this.parentElement.remove()"
                    class="absolute top-4 right-4 text-red-400 hover:text-red-600 font-bold">
                    Remove
                </button>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <input type="text"
                        name="company_name[]"
                        placeholder="Company Name"
                        class="w-full border-gray-200 rounded-xl md:col-span-2">

                    <input type="text"
                        name="job_title[]"
                        placeholder="Job Title"
                        class="w-full border-gray-200 rounded-xl">

                    <input type="date"
                        name="start_date[]"
                        class="w-full border-gray-200 rounded-xl">

                    <textarea
                        name="responsibilities[]"
                        placeholder="Responsibilities"
                        class="w-full border-gray-200 rounded-xl md:col-span-2"></textarea>

                </div>

            </div>
        `;

        wrapper.insertAdjacentHTML('beforeend', html);
    }

</script>
</x-app-layout>