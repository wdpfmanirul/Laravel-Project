@extends('admin.layouts.app')

@section('title', 'Profile Settings')

@section('content')

<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest"></script>

<div class="max-w-5xl mx-auto py-10 px-4">
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Account Settings</h1>
        <p class="text-slate-500 mt-2">Update your personal information and profile picture.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 flex items-center p-4 text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-2xl animate-fade-in">
            <i data-lucide="check-circle" class="w-5 h-5 mr-3"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.settings.profile.update') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Side: Profile Preview/Photo Upload -->
            <div class="lg:col-span-1">
                <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm text-center">
                    <div class="relative w-32 h-32 mx-auto mb-6">
                        <!-- Profile Image Preview -->
                        <img id="preview" 
                             src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&background=0D8ABC&color=fff' }}" 
                             alt="Avatar" 
                             class="w-full h-full object-cover rounded-full ring-4 ring-slate-50 shadow-md">
                        
                        <!-- Camera Upload Button -->
                        <label for="image" class="absolute bottom-1 right-1 bg-blue-600 hover:bg-blue-700 p-2.5 rounded-full text-white border-4 border-white cursor-pointer shadow-lg transition-all transform hover:scale-110">
                            <i data-lucide="camera" class="w-5 h-5"></i>
                            <input type="file" name="image" id="image" class="hidden" accept="image/*" onchange="previewImage(event)">
                        </label>
                    </div>

                    <h2 class="text-xl font-bold text-slate-800">{{ auth()->user()->name }}</h2>
                    <p class="text-slate-500 text-sm mb-4">{{ auth()->user()->role }}</p>
                    
                    <div class="text-xs text-slate-400 bg-slate-50 p-3 rounded-xl border border-dashed border-slate-200">
                        Allowed: JPG, PNG, JPEG. <br> Max size: 2MB
                    </div>

                    @error('image')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Right Side: Form Details -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-8">
                        <div class="space-y-6">
                            
                            <!-- Full Name Field -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Full Name</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                        <i data-lucide="user" class="w-5 h-5"></i>
                                    </div>
                                    <input
                                        type="text"
                                        name="name"
                                        value="{{ old('name', auth()->user()->name) }}"
                                        class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none"
                                    >
                                </div>
                                @error('name')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email Address Field -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Email Address</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                        <i data-lucide="mail" class="w-5 h-5"></i>
                                    </div>
                                    <input
                                        type="email"
                                        name="email"
                                        value="{{ old('email', auth()->user()->email) }}"
                                        class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none"
                                    >
                                </div>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-4 flex items-center justify-end">
                                <button
                                    type="submit"
                                    class="flex items-center space-x-2 bg-slate-900 hover:bg-slate-800 text-white px-10 py-4 rounded-2xl font-bold shadow-lg shadow-slate-200 transform transition active:scale-95"
                                >
                                    <i data-lucide="save" class="w-5 h-5"></i>
                                    <span>Save Changes</span>
                                </button>
                            </div>

                        </div>
                    </div>

                    <!-- Footer Note -->
                    <div class="bg-slate-50 px-8 py-4 border-t border-slate-100 text-xs text-slate-500 flex items-center">
                        <i data-lucide="info" class="w-4 h-4 mr-2 text-blue-500"></i>
                        Make sure your email address is valid to receive system notifications.
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

<!-- Scripts -->
<script>
    // Initialize Lucide Icons
    lucide.createIcons();

    // Image Preview Function
    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();
        reader.onload = function(){
            const dataURL = reader.result;
            const preview = document.getElementById('preview');
            preview.src = dataURL;
        };
        if(input.files[0]){
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fade-in 0.4s ease-out forwards;
    }
</style>

@endsection