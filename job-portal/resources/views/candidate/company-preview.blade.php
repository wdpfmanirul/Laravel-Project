<x-app-layout>

    <div class="bg-gray-50 min-h-screen py-12">

        <div class="max-w-7xl mx-auto px-6">

            {{-- Company Header --}}
            <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm overflow-hidden">

                {{-- Cover --}}
                <div class="h-56 bg-gradient-to-r from-indigo-600 via-violet-600 to-purple-600"></div>

                <div class="px-8 pb-10 relative">

                    {{-- Logo --}}
                    <div class="-mt-16">

                        <div class="w-32 h-32 rounded-[2rem] bg-white shadow-xl border-4 border-white overflow-hidden">

                            @if($company->company_logo)

                                <img
                                    src="{{ asset('storage/' . $company->company_logo) }}"
                                    class="w-full h-full object-cover">

                            @else

                                <div class="w-full h-full flex items-center justify-center bg-indigo-100 text-indigo-600 text-5xl font-black">

                                    {{ strtoupper(substr($company->company_name, 0, 1)) }}

                                </div>

                            @endif

                        </div>

                    </div>

                    {{-- Company Info --}}
                    <div class="mt-6 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                        <div>

                            <h1 class="text-4xl font-black text-gray-900">
                                {{ $company->company_name }}
                            </h1>

                            <div class="flex flex-wrap items-center gap-3 mt-4">

                                @if($company->industry_type)

                                    <div class="px-4 py-2 bg-indigo-100 text-indigo-700 rounded-xl text-sm font-bold">
                                        {{ $company->industry_type }}
                                    </div>

                                @endif

                                @if($company->company_size)

                                    <div class="px-4 py-2 bg-gray-100 text-gray-700 rounded-xl text-sm font-bold">
                                        {{ $company->company_size }} Employees
                                    </div>

                                @endif

                                @if($company->founded_year)

                                    <div class="px-4 py-2 bg-green-100 text-green-700 rounded-xl text-sm font-bold">
                                        Founded {{ $company->founded_year }}
                                    </div>

                                @endif

                            </div>

                        </div>

                        {{-- Website --}}
                        @if($company->website)

                            <a
                                href="{{ $company->website }}"
                                target="_blank"
                                class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-bold transition">

                                Visit Website

                            </a>

                        @endif

                    </div>

                </div>

            </div>

            {{-- Main Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-8">

                {{-- LEFT --}}
                <div class="lg:col-span-2 space-y-8">

                    {{-- About --}}
                    <div class="bg-white rounded-[2rem] border border-gray-100 p-8 shadow-sm">

                        <h2 class="text-2xl font-black text-gray-900 mb-6">
                            About Company
                        </h2>

                        <div class="text-gray-600 leading-8 whitespace-pre-line">
                            {{ $company->description ?? 'No company description added yet.' }}
                        </div>

                    </div>

                    {{-- Mission --}}
                    @if($company->mission)

                        <div class="bg-white rounded-[2rem] border border-gray-100 p-8 shadow-sm">

                            <h2 class="text-2xl font-black text-gray-900 mb-6">
                                Mission & Vision
                            </h2>

                            <div class="text-gray-600 leading-8 whitespace-pre-line">
                                {{ $company->mission }}
                            </div>

                        </div>

                    @endif

                </div>

                {{-- RIGHT --}}
                <div class="space-y-8">

                    {{-- Company Details --}}
                    <div class="bg-white rounded-[2rem] border border-gray-100 p-8 shadow-sm">

                        <h3 class="text-xl font-black text-gray-900 mb-6">
                            Company Details
                        </h3>

                        <div class="space-y-5">

                            @if($company->company_email)

                                <div>

                                    <p class="text-xs uppercase tracking-widest text-gray-400 font-black">
                                        Email
                                    </p>

                                    <p class="text-gray-700 font-semibold mt-1 break-all">
                                        {{ $company->company_email }}
                                    </p>

                                </div>

                            @endif

                            @if($company->company_phone)

                                <div>

                                    <p class="text-xs uppercase tracking-widest text-gray-400 font-black">
                                        Phone
                                    </p>

                                    <p class="text-gray-700 font-semibold mt-1">
                                        {{ $company->company_phone }}
                                    </p>

                                </div>

                            @endif

                            @if($company->address)

                                <div>

                                    <p class="text-xs uppercase tracking-widest text-gray-400 font-black">
                                        Address
                                    </p>

                                    <p class="text-gray-700 font-semibold mt-1 leading-7">
                                        {{ $company->address }}
                                    </p>

                                </div>

                            @endif

                            @if($company->total_employees)

                                <div>

                                    <p class="text-xs uppercase tracking-widest text-gray-400 font-black">
                                        Total Employees
                                    </p>

                                    <p class="text-gray-700 font-semibold mt-1">
                                        {{ $company->total_employees }}
                                    </p>

                                </div>

                            @endif

                        </div>

                    </div>

                    {{-- Social Links --}}
                    <div class="bg-white rounded-[2rem] border border-gray-100 p-8 shadow-sm">

                        <h3 class="text-xl font-black text-gray-900 mb-6">
                            Social Links
                        </h3>

                        <div class="space-y-4">

                            @if($company->linkedin)

                                <a href="{{ $company->linkedin }}"
                                   target="_blank"
                                   class="block px-5 py-4 rounded-2xl bg-gray-50 hover:bg-indigo-50 text-gray-700 hover:text-indigo-700 font-bold transition">

                                    LinkedIn

                                </a>

                            @endif

                            @if($company->facebook)

                                <a href="{{ $company->facebook }}"
                                   target="_blank"
                                   class="block px-5 py-4 rounded-2xl bg-gray-50 hover:bg-indigo-50 text-gray-700 hover:text-indigo-700 font-bold transition">

                                    Facebook

                                </a>

                            @endif

                            @if($company->youtube)

                                <a href="{{ $company->youtube }}"
                                   target="_blank"
                                   class="block px-5 py-4 rounded-2xl bg-gray-50 hover:bg-indigo-50 text-gray-700 hover:text-indigo-700 font-bold transition">

                                    YouTube

                                </a>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>