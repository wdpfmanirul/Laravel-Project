<x-app-layout>
<div class="flex min-h-screen bg-gray-50">
    @include('candidate.layouts.sidebar')

    <div class="ml-64 w-full py-10 px-8">
        <div class="max-w-5xl mx-auto">
            <!-- Header & Progress -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Personal Information</h1>
                <p class="text-gray-500">Step 1 of 3: Identity and Contact Details</p>
                <div class="w-full bg-gray-200 rounded-full h-2 mt-4">
                    <div class="bg-blue-600 h-2 rounded-full transition-all" style="width: 33%"></div>
                </div>
            </div>

            <form method="POST" action="{{ route('candidate.profile.personal.save') }}" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Photo Section -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-8">
                    <div class="relative group">
                        <img id="photoPreview" src="{{ $profile->photo ? asset('storage/' . $profile->photo) : 'https://via.placeholder.com/150' }}" 
                             class="w-32 h-32 rounded-2xl object-cover border-4 border-blue-50 shadow-md">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Profile Photo</label>
                        <input type="file" id="photoInput" name="photo" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        @error('photo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Identity Details -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                        <span class="w-2 h-6 bg-blue-600 rounded-full"></span> Identity Details
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-gray-600">Full Name *</label>
                            <input name="name" value="{{ old('name', auth()->user()->name) }}" class="w-full border-gray-200 rounded-xl focus:ring-blue-500 @error('name') border-red-500 @enderror">
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-gray-600">Father's Name</label>
                            <input name="father_name" value="{{ old('father_name', $profile->father_name) }}" class="w-full border-gray-200 rounded-xl focus:ring-blue-500">
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-gray-600">Mother's Name</label>
                            <input name="mother_name" value="{{ old('mother_name', $profile->mother_name) }}" class="w-full border-gray-200 rounded-xl focus:ring-blue-500">
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-gray-600">Gender</label>
                            <select name="gender" class="w-full border-gray-200 rounded-xl focus:ring-blue-500">
                                <option value="">Select Gender</option>
                                <option value="Male" {{ $profile->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $profile->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Others" {{ $profile->gender == 'Others' ? 'selected' : '' }}>Others</option>
                            </select>
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-gray-600">Date of Birth</label>
                            <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $profile->date_of_birth) }}" class="w-full border-gray-200 rounded-xl focus:ring-blue-500">
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-gray-600">Nationality</label>
                            <input name="nationality" value="{{ old('nationality', $profile->nationality ?? 'Bangladeshi') }}" class="w-full border-gray-200 rounded-xl focus:ring-blue-500">
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-gray-600">Marital Status</label>
                            <select name="marital_status" class="w-full border-gray-200 rounded-xl focus:ring-blue-500">
                                <option value="">Select Status</option>
                                <option value="Single" {{ $profile->marital_status == 'Single' ? 'selected' : '' }}>Single</option>
                                <option value="Married" {{ $profile->marital_status == 'Married' ? 'selected' : '' }}>Married</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                        <span class="w-2 h-6 bg-blue-600 rounded-full"></span> Contact Details
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-gray-600">Phone Number *</label>
                            <input name="phone" value="{{ old('phone', $profile->phone) }}" class="w-full border-gray-200 rounded-xl focus:ring-blue-500">
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-gray-600">Alternate Mobile</label>
                            <input name="alternate_mobile" value="{{ old('alternate_mobile', $profile->alternate_mobile) }}" class="w-full border-gray-200 rounded-xl focus:ring-blue-500">
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-gray-600">Email Address (Locked)</label>
                            <input value="{{ auth()->user()->email }}" disabled class="w-full border-gray-200 rounded-xl bg-gray-50 text-gray-400">
                        </div>
                    </div>
                </div>

                <!-- Address Details -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                        <span class="w-2 h-6 bg-blue-600 rounded-full"></span> Address
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <input name="district" value="{{ old('district', $profile->district) }}" placeholder="District" class="w-full border-gray-200 rounded-xl focus:ring-blue-500">
                        <input name="thana" value="{{ old('thana', $profile->thana) }}" placeholder="Thana/Upazila" class="w-full border-gray-200 rounded-xl focus:ring-blue-500">
                        <input name="post_office" value="{{ old('post_office', $profile->post_office) }}" placeholder="Post Office" class="w-full border-gray-200 rounded-xl focus:ring-blue-500">
                    </div>
                    <textarea name="present_address" placeholder="Full Present Address..." class="w-full border-gray-200 rounded-xl h-24 focus:ring-blue-500">{{ old('present_address', $profile->present_address) }}</textarea>
                </div>

                <!-- Action Button -->
                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-10 py-3.5 rounded-xl font-bold shadow-lg shadow-blue-200 transition-all flex items-center gap-2">
                        Save & Continue <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Photo Preview
    document.getElementById('photoInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('photoPreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
</x-app-layout>