<x-app-layout>

<div class="flex min-h-screen bg-gray-50">

    @include('candidate.layouts.sidebar')

    <div class="flex-1 lg:ml-64 p-6 lg:p-10">

        <div class="max-w-4xl mx-auto">

            <div class="mb-8">
                <h1 class="text-3xl font-black text-gray-900">
                    Notifications
                </h1>

                <p class="text-sm text-gray-500 mt-2">
                    Stay updated with your applications and interviews.
                </p>
            </div>

            <div class="space-y-4">

                @forelse($notifications as $notification)

                    <a href="{{ $notification->data['url'] ?? '#' }}"
                       class="block bg-white border border-gray-100 rounded-2xl p-5 hover:shadow-md transition">

                        <div class="flex items-start justify-between gap-4">

                            <div>

                                <h2 class="font-black text-gray-900">
                                    {{ $notification->data['title'] }}
                                </h2>

                                <p class="text-sm text-gray-600 mt-1">
                                    {{ $notification->data['message'] }}
                                </p>

                            </div>

                            @if(is_null($notification->read_at))

                                <span class="w-3 h-3 rounded-full bg-blue-600 mt-2"></span>

                            @endif

                        </div>

                    </a>

                @empty

                    <div class="bg-white rounded-2xl p-10 text-center border border-dashed border-gray-200">

                        <p class="text-gray-500">
                            No notifications available.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

</x-app-layout>