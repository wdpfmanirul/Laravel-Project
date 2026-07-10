<x-app-layout>   

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="p-8 text-gray-900">
                    
                    @if(auth()->user()->role == 'employer')
                        @include('dashboard.employer')
                    @elseif(auth()->user()->role == 'candidate')
                        @include('dashboard.candidate')
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>