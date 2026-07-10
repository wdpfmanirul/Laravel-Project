<x-app-layout>
<div class="flex min-h-screen bg-gray-50">
    @include('candidate.layouts.sidebar')

    <div class="ml-64 w-full py-10 px-8">
        <div class="max-w-5xl mx-auto">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Academic Background</h1>
                <p class="text-gray-500">Step 2 of 4: Educational qualifications</p>
                <div class="w-full bg-gray-200 rounded-full h-2 mt-4">
                    <div class="bg-blue-600 h-2 rounded-full transition-all" style="width: 40%"></div>
                </div>
            </div>

            <form method="POST" action="{{ route('candidate.profile.education.store') }}">
                @csrf
                <div id="education-container">
                    @forelse($educations as $edu)
                        <div class="education-item bg-white p-6 rounded-2xl border border-gray-100 shadow-sm mb-6 relative">
                            <button type="button" onclick="this.parentElement.remove()" class="absolute top-4 right-4 text-red-400 hover:text-red-600">Remove</button>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <select name="qualification_level[]" class="border-gray-200 rounded-xl">
                                    @foreach(['SSC','HSC','Honors','Masters','Others'] as $q)
                                        <option value="{{ $q }}" {{ $edu->qualification_level == $q ? 'selected' : '' }}>{{ $q }}</option>
                                    @endforeach
                                </select>
                                <input name="group_subject[]" value="{{ $edu->group_subject }}" placeholder="Subject" class="border-gray-200 rounded-xl">
                                <input name="institution_name[]" value="{{ $edu->institution_name }}" placeholder="Institution" class="border-gray-200 rounded-xl">
                                <input name="passing_year[]" value="{{ $edu->passing_year }}" placeholder="Year" class="border-gray-200 rounded-xl">
                                <input name="cgpa_grade[]" value="{{ $edu->cgpa_grade }}" placeholder="GPA" class="border-gray-200 rounded-xl">
                            </div>
                        </div>
                    @empty
                        <!-- Initial Row Here -->
                    @endforelse
                </div>

                <button type="button" onclick="addEducationRow()" class="bg-gray-800 text-white px-6 py-2.5 rounded-xl font-bold">+ Add Education</button>

                <div class="flex justify-between items-center border-t pt-8 mt-10">
                    <a href="{{ route('candidate.profile.personal') }}" class="text-gray-500 font-bold">← Back</a>
                    <button type="submit" class="bg-blue-600 text-white px-10 py-3.5 rounded-xl font-bold shadow-lg">Save & Continue</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function addEducationRow() {

        const container = document.getElementById('education-container');

        const html = `
            <div class="education-item bg-white p-6 rounded-2xl border border-gray-100 shadow-sm mb-6 relative">

                <button type="button"
                    onclick="this.parentElement.remove()"
                    class="absolute top-4 right-4 text-red-400 hover:text-red-600">
                    Remove
                </button>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                    <select name="qualification_level[]" class="border-gray-200 rounded-xl">
                        <option value="SSC">SSC</option>
                        <option value="HSC">HSC</option>
                        <option value="Honors">Honors</option>
                        <option value="Masters">Masters</option>
                        <option value="Others">Others</option>
                    </select>

                    <input type="text"
                        name="group_subject[]"
                        placeholder="Subject"
                        class="border-gray-200 rounded-xl">

                    <input type="text"
                        name="institution_name[]"
                        placeholder="Institution"
                        class="border-gray-200 rounded-xl">

                    <input type="text"
                        name="passing_year[]"
                        placeholder="Year"
                        class="border-gray-200 rounded-xl">

                    <input type="text"
                        name="cgpa_grade[]"
                        placeholder="GPA"
                        class="border-gray-200 rounded-xl">

                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', html);
    }
</script>
</x-app-layout>