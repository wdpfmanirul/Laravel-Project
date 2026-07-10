@extends('admin.layouts.app')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <div class="max-w-2xl mx-auto">
        <!-- Breadcrumb / Back button -->
        <a href="{{ route('admin.categories.index') }}" class="flex items-center text-sm text-blue-600 font-medium mb-4 hover:underline">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            Back to Categories
        </a>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8 border-b border-gray-100 bg-white">
                <h1 class="text-2xl font-bold text-gray-900">Create New Category</h1>
                <p class="text-sm text-gray-500 mt-1">Fill in the details to add a new job category.</p>
            </div>

            <form action="{{ route('admin.categories.store') }}" method="POST" class="p-8 space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Category Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" 
                           placeholder="e.g. Graphic Design"
                           class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition outline-none">
                    @error('name')
                        <p class="text-rose-500 text-xs mt-2 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Font Awesome Icon Class</label>
                    <div class="relative">
                        <input type="text" name="icon" id="iconInput" value="{{ old('icon') }}" 
                               placeholder="fas fa-palette"
                               class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition outline-none">
                        <div class="absolute right-4 top-3 text-gray-400">
                             <i id="iconPreview" class="fas fa-icons text-xl transition"></i>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 mt-2 italic flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"></path></svg>
                        Browse icon classes at FontAwesome.com
                    </p>
                    @error('icon')
                        <p class="text-rose-500 text-xs mt-2 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4 flex items-center gap-3">
                    <button type="submit" 
                            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl transition duration-300 shadow-lg shadow-blue-100">
                        Create Category
                    </button>
                    <a href="{{ route('admin.categories.index') }}" 
                       class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold rounded-xl transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Simple icon previewer
    document.getElementById('iconInput').addEventListener('input', function(e) {
        const preview = document.getElementById('iconPreview');
        preview.className = e.target.value || 'fas fa-icons';
    });
</script>
@endsection