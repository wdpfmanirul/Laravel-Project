<x-app-layout>

    <div class="flex min-h-screen bg-[#f8fafc] overflow-hidden">

        {{-- Sidebar --}}
        @include('candidate.layouts.sidebar')

        {{-- Main Content --}}
        <div class="flex-1 lg:ml-64 overflow-y-auto">

            <div class="p-6 lg:p-10 max-w-7xl mx-auto">

                {{-- Header --}}
                <div class="mb-10">

                    <div class="flex items-center gap-4 mb-3">

                        <div class="w-14 h-14 rounded-2xl bg-blue-600 text-white flex items-center justify-center shadow-lg shadow-blue-100">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-7 w-7"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/>
                            </svg>
                        </div>

                        <div>
                            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                                Interview Schedule
                            </h1>

                            <p class="text-gray-500 mt-1 text-sm">
                                View all your upcoming interview invitations and schedules.
                            </p>
                        </div>

                    </div>

                </div>

                {{-- Interview Cards --}}
                @if($applications->count() > 0)

                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-7">

                        @foreach($applications as $app)

                            <div class="group bg-white rounded-[2rem] border border-gray-100 overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-100/40 transition-all duration-300">

                                {{-- Top Section --}}
                                <div class="p-6 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-gray-100">

                                    <div class="flex items-start justify-between gap-4">

                                        <div class="flex items-center gap-4">

                                            {{-- Company Logo --}}
                                            @if(optional($app->job->company)->company_logo)

                                                <img
                                                    src="{{ asset('storage/' . $app->job->company->company_logo) }}"
                                                    alt="Company Logo"
                                                    class="w-16 h-16 rounded-2xl object-cover border border-white shadow-md bg-white p-1"
                                                >

                                            @else

                                                <div class="w-16 h-16 rounded-2xl bg-blue-600 text-white flex items-center justify-center font-black text-xl shadow-lg shadow-blue-100">
                                                    {{ strtoupper(substr(optional($app->job->company)->company_name ?? 'C', 0, 1)) }}
                                                </div>

                                            @endif

                                            <div>

                                                <h2 class="text-xl font-black text-gray-900 leading-tight">
                                                    {{ $app->job->title }}
                                                </h2>

                                                <p class="text-sm text-gray-500 mt-1">
                                                    {{ optional($app->job->company)->company_name ?? 'Company Name' }}
                                                </p>

                                            </div>

                                        </div>

                                        <span class="inline-flex items-center px-4 py-1.5 rounded-xl bg-emerald-100 text-emerald-700 text-xs font-black border border-emerald-200">
                                            Scheduled
                                        </span>

                                    </div>

                                </div>

                                {{-- Body --}}
                                <div class="p-6 space-y-5">

                                    {{-- Date & Time --}}
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                        {{-- Date --}}
                                        <div class="rounded-2xl border border-gray-100 bg-gray-50 p-5">

                                            <div class="flex items-center gap-2 mb-3">

                                                <div class="w-9 h-9 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10"/>
                                                    </svg>
                                                </div>

                                                <p class="text-xs font-black uppercase tracking-wider text-gray-500">
                                                    Interview Date
                                                </p>

                                            </div>

                                            <p class="text-lg font-black text-gray-900">
                                                {{ \Carbon\Carbon::parse($app->interview_date)->format('d F, Y') }}
                                            </p>

                                        </div>

                                        {{-- Time --}}
                                        <div class="rounded-2xl border border-gray-100 bg-gray-50 p-5">

                                            <div class="flex items-center gap-2 mb-3">

                                                <div class="w-9 h-9 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3"/>
                                                    </svg>
                                                </div>

                                                <p class="text-xs font-black uppercase tracking-wider text-gray-500">
                                                    Interview Time
                                                </p>

                                            </div>

                                            <p class="text-lg font-black text-gray-900">
                                                {{ \Carbon\Carbon::parse($app->interview_time)->format('h:i A') }}
                                            </p>

                                        </div>

                                    </div>

                                    {{-- Location --}}
                                    <div class="rounded-2xl border border-blue-100 bg-blue-50 p-5">

                                        <div class="flex items-center gap-2 mb-3">

                                            <div class="w-9 h-9 rounded-xl bg-white text-blue-600 flex items-center justify-center shadow-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                </svg>
                                            </div>

                                            <p class="text-xs font-black uppercase tracking-wider text-blue-700">
                                                Interview Location / Meeting Link
                                            </p>

                                        </div>

                                        <p class="text-sm text-gray-700 leading-relaxed break-all">
                                            {{ $app->interview_location }}
                                        </p>

                                    </div>

                                    {{-- Message --}}
                                    @if($app->interview_message)

                                        <div class="rounded-2xl border border-gray-100 bg-gray-50 p-5">

                                            <div class="flex items-center gap-2 mb-3">

                                                <div class="w-9 h-9 rounded-xl bg-white text-gray-700 flex items-center justify-center shadow-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                                    </svg>
                                                </div>

                                                <p class="text-xs font-black uppercase tracking-wider text-gray-600">
                                                    Employer Message
                                                </p>

                                            </div>

                                            <p class="text-sm text-gray-700 leading-relaxed whitespace-pre-line">
                                                {{ $app->interview_message }}
                                            </p>

                                        </div>

                                    @endif

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    {{-- Empty State --}}
                    <div class="bg-white rounded-[2rem] border border-dashed border-gray-200 p-16 text-center shadow-sm">

                        <div class="w-24 h-24 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-12 w-12 text-blue-600"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/>
                            </svg>

                        </div>

                        <h2 class="text-2xl font-black text-gray-900 mb-3">
                            No Interview Scheduled
                        </h2>

                        <p class="text-gray-500 text-sm max-w-md mx-auto leading-relaxed">
                            Your upcoming interview invitations will appear here once employers schedule them for you.
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>