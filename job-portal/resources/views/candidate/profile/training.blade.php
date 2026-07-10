<x-app-layout>
<div class="flex min-h-screen bg-gray-50">
    @include('candidate.layouts.sidebar')

    <div class="ml-64 w-full py-10 px-8">
        <div class="max-w-5xl mx-auto">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Trainings & Certifications</h1>
                <p class="text-gray-500">Step 4 of 4: Professional growth</p>
                <div class="w-full bg-gray-200 rounded-full h-2 mt-4">
                    <div class="bg-blue-600 h-2 rounded-full transition-all" style="width: 80%"></div>
                </div>
            </div>

            <form method="POST" action="{{ route('candidate.profile.training.store') }}">
                @csrf
                <!-- এই কন্টেইনারের ভেতর নতুন রো যোগ হবে -->
<div id="training-container">
    @forelse($trainings as $item)
        <div class="training-item bg-white p-6 rounded-2xl border border-gray-100 shadow-sm mb-6 relative group">
            <button type="button" onclick="this.parentElement.remove()" class="absolute top-4 right-4 text-red-500 font-bold">Remove</button>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="text-xs font-bold text-gray-400">Training Title</label>
                    <input name="training_title[]" value="{{ $item->training_title }}" class="w-full border-gray-200 rounded-xl">
                </div>
                <input name="institution[]" value="{{ $item->institution }}" placeholder="Institution" class="border-gray-200 rounded-xl">
                <div class="grid grid-cols-2 gap-4">
                    <input name="duration[]" value="{{ $item->duration }}" placeholder="Duration" class="border-gray-200 rounded-xl">
                    <input name="passing_year[]" value="{{ $item->passing_year }}" placeholder="Year" class="border-gray-200 rounded-xl">
                </div>
            </div>
        </div>
    @empty
        <!-- যদি ডাটা না থাকে তবে পেজ লোড হওয়ার সময় জাভাস্ক্রিপ্ট দিয়ে একটি রো যোগ হবে অথবা নিচে খালি রো দিন -->
        <div id="empty-state-placeholder"></div>
    @endforelse
</div>

<!-- বাটন -->
<button type="button" onclick="addTrainingRow()" class="bg-gray-800 text-white px-6 py-2.5 rounded-xl font-bold shadow-md">
    + Add Training
</button>
                <div class="flex justify-between mt-10 border-t pt-8">
                    <a href="{{ route('candidate.profile.experience') }}" class="font-bold text-gray-500">← Back</a>
                    <button type="submit" class="bg-blue-600 text-white px-10 py-3.5 rounded-xl font-bold">Go to Preview</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function addTrainingRow() {
    // কন্টেইনার খুঁজে বের করা
    const container = document.getElementById('training-container');
    
    // নতুন রো এর HTML
    const html = `
    <div class="training-item bg-white p-6 rounded-2xl border border-gray-100 shadow-sm mb-6 relative group">
        <button type="button" onclick="this.parentElement.remove()" class="absolute top-4 right-4 text-red-500 font-bold hover:text-red-700 transition">
            Remove
        </button>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="md:col-span-2">
                <label class="text-xs font-bold text-gray-400 uppercase">Training / Course Title</label>
                <input name="training_title[]" required class="w-full border-gray-200 rounded-xl mt-1 focus:ring-blue-500">
            </div>
            <div>
                <label class="text-xs font-bold text-gray-400 uppercase">Institution</label>
                <input name="institution[]" placeholder="Institution Name" class="w-full border-gray-200 rounded-xl mt-1">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase">Duration</label>
                    <input name="duration[]" placeholder="e.g. 3 Months" class="w-full border-gray-200 rounded-xl mt-1">
                </div>
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase">Year</label>
                    <input name="passing_year[]" placeholder="Year" class="w-full border-gray-200 rounded-xl mt-1">
                </div>
            </div>
        </div>
    </div>`;

    // কন্টেইনারের শেষে HTML টি যোগ করা
    container.insertAdjacentHTML('beforeend', html);
}

// যদি আগে থেকে কোনো ডাটা না থাকে, তবে পেজ লোড হলে একটি খালি রো দেখানোর জন্য
@if(count($trainings) == 0)
    window.onload = function() {
        addTrainingRow();
    };
@endif
</script>
</x-app-layout>