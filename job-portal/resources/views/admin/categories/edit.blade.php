@extends('admin.layouts.app')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <div class="max-w-2xl mx-auto">
        <!-- Back button -->
        <a href="{{ route('admin.categories.index') }}" class="flex items-center text-sm text-blue-600 font-medium mb-4 hover:underline">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            Back to List
        </a>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8 border-b border-gray-100 bg-gray-50/30">
                <h1 class="text-2xl font-bold text-gray-900">Edit Category</h1>
                <p class="text-sm text-gray-500 mt-1">Modify the category details below.</p>
            </div>

            <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="p-8 space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Category Name</label>
                        <input type="text" name="name" value="{{ old('name', $category->name) }}" 
                               class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition outline-none">
                        @error('name')
                            <p class="text-rose-500 text-xs mt-2 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Icon Class</label>
                        <input type="text" name="icon" id="iconInputEdit" value="{{ old('icon', $category->icon) }}" 
                               class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition outline-none">
                        @error('icon')
                            <p class="text-rose-500 text-xs mt-2 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="bg-blue-50 rounded-xl p-4 flex items-center justify-center border border-blue-100">
                        <div class="text-center">
                            <p class="text-[10px] uppercase font-bold text-blue-400 mb-1 tracking-widest">Live Preview</p>
                            <i id="iconPreviewEdit" class="{{ $category->icon }} text-3xl text-blue-600"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-xl p-5 border border-dashed border-gray-200">
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2 tracking-widest">URL Slug (Auto-generated)</label>
                    <div class="flex items-center text-gray-600 font-mono text-sm">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                        {{ $category->slug }}
                    </div>
                </div>

                <div class="pt-4 flex items-center gap-3">
                    <button type="submit" 
                            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl transition duration-300 shadow-lg shadow-blue-100">
                        Update Category
                    </button>
                    <a href="{{ route('admin.categories.index') }}" 
                       class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold rounded-xl transition">
                        Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('iconInputEdit').addEventListener('input', function(e) {
        document.getElementById('iconPreviewEdit').className = e.target.value + ' text-3xl text-blue-600';
    });
</script>
@endsection