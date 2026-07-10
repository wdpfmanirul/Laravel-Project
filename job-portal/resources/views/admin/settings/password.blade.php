@extends('admin.layouts.app')

@section('title', 'Change Password')

@section('content')

<!-- Lucide Icons Library -->
<script src="https://unpkg.com/lucide@latest"></script>

<div class="max-w-3xl mx-auto py-10 px-4">
    
    <!-- Breadcrumb or Back Link (Optional) -->
    <div class="mb-6">
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight flex items-center">
            <span class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-3">
                <i data-lucide="shield-check" class="w-6 h-6"></i>
            </span>
            Security Settings
        </h1>
        <p class="text-slate-500 mt-2 ml-14">Update your password to keep your account secure.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 flex items-center p-4 text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-2xl animate-fade-in">
            <i data-lucide="check-circle" class="w-5 h-5 mr-3"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white rounded-3xl border border-slate-100 shadow-xl shadow-slate-200/50 overflow-hidden">
        <div class="p-8">
            <form method="POST" action="{{ route('admin.settings.password.update') }}" class="space-y-6">
                @csrf

                <!-- Current Password -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Current Password</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                            <i data-lucide="lock" class="w-5 h-5"></i>
                        </div>
                        <input
                            type="password"
                            name="current_password"
                            placeholder="••••••••"
                            class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none"
                        >
                    </div>
                    @error('current_password')
                        <p class="text-red-500 text-xs mt-2 flex items-center">
                            <i data-lucide="alert-circle" class="w-3 h-3 mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <hr class="border-slate-100">

                <!-- New Password -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">New Password</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                            <i data-lucide="key-round" class="w-5 h-5"></i>
                        </div>
                        <input
                            type="password"
                            name="password"
                            placeholder="At least 8 characters"
                            class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none"
                        >
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-2 flex items-center">
                            <i data-lucide="alert-circle" class="w-3 h-3 mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Confirm New Password</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                            <i data-lucide="check-square" class="w-5 h-5"></i>
                        </div>
                        <input
                            type="password"
                            name="password_confirmation"
                            placeholder="Repeat new password"
                            class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all outline-none"
                        >
                    </div>
                </div>

                <!-- Password Requirements Tip -->
                <div class="bg-blue-50/50 rounded-2xl p-4 border border-blue-100">
                    <h4 class="text-sm font-bold text-blue-800 mb-1 flex items-center">
                        <i data-lucide="info" class="w-4 h-4 mr-2"></i> Password Requirements
                    </h4>
                    <ul class="text-xs text-blue-600 space-y-1 ml-6 list-disc">
                        <li>Minimum 8 characters long</li>
                        <li>Include at least one special character</li>
                        <li>Mix of letters and numbers</li>
                    </ul>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button
                        type="submit"
                        class="w-full flex items-center justify-center space-x-2 bg-slate-900 hover:bg-slate-800 text-white px-8 py-4 rounded-2xl font-bold shadow-lg shadow-slate-200 transform transition active:scale-[0.98]"
                    >
                        <i data-lucide="refresh-cw" class="w-5 h-5"></i>
                        <span>Update Security Password</span>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    // Initialize Lucide Icons
    lucide.createIcons();
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