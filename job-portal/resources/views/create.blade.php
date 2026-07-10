<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Post a New Job
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <form action="{{ route('jobs.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label>Job Title</label>
                        <input type="text" name="title" class="w-full border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label>Category</label>
                        <select name="category" class="w-full border-gray-300 rounded-md">
                            <option value="IT">IT & Software</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Design">Design</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label>Location</label>
                        <input type="text" name="location" class="w-full border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label>Description</label>
                        <textarea name="description" class="w-full border-gray-300 rounded-md" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Post Job</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>