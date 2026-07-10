@extends('admin.layouts.app')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto">
        
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-extrabold text-gray-800 tracking-tight flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                    Notifications
                </h1>
                <p class="text-gray-500 mt-1">Stay updated with the latest activities and alerts.</p>
            </div>

            @if($notifications->count() > 0)
            <form method="POST" action="{{ route('admin.notifications.read.all') }}">
                @csrf
                <button class="flex items-center gap-2 bg-white border border-gray-200 px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 hover:border-blue-300 hover:text-blue-600 transition duration-300 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    Mark All as Read
                </button>
            </form>
            @endif
        </div>

        <!-- Notifications List -->
        <div class="space-y-4">
            @forelse($notifications as $notification)
                <div class="relative group bg-white rounded-2xl border transition duration-300 
                    {{ is_null($notification->read_at) ? 'border-blue-100 shadow-md shadow-blue-50/50 bg-blue-50/30' : 'border-gray-100 shadow-sm hover:shadow-md' }}">
                    
                    <!-- Unread Indicator Dot -->
                    @if(is_null($notification->read_at))
                        <div class="absolute top-4 right-4 w-3 h-3 bg-blue-600 rounded-full border-2 border-white animate-pulse"></div>
                    @endif

                    <div class="p-5 flex items-start gap-4">
                        <!-- Icon Box -->
                        <div class="shrink-0 w-12 h-12 rounded-xl flex items-center justify-center 
                            {{ is_null($notification->read_at) ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-500' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        </div>

                        <!-- Content -->
                        <div class="flex-1">
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-1 mb-1">
                                <h3 class="font-bold text-gray-900 {{ is_null($notification->read_at) ? 'text-lg' : 'text-base' }}">
                                    {{ $notification->data['title'] }}
                                </h3>
                                <span class="text-xs font-medium text-gray-400 flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    {{ $notification->created_at->diffForHumans() }}
                                </span>
                            </div>
                            
                            <p class="text-gray-600 leading-relaxed">
                                {{ $notification->data['message'] }}
                            </p>

                            <!-- Actions -->
                            <div class="mt-4 flex items-center gap-4">
                                @if(!empty($notification->data['url']))
                                    <a href="{{ $notification->data['url'] }}"
                                       class="text-sm font-bold text-blue-600 hover:text-blue-800 flex items-center gap-1 group/link">
                                        View Details
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform group-hover/link:translate-x-1"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                    </a>
                                @endif

                                @if(is_null($notification->read_at))
                                    <form method="POST" action="{{ route('admin.notifications.read',$notification->id) }}">
                                        @csrf
                                        <button class="text-sm font-semibold text-emerald-600 hover:text-emerald-700 flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                            Mark as Read
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <!-- Empty State -->
                <div class="bg-white rounded-3xl border border-dashed border-gray-300 p-12 text-center">
                    <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">All caught up!</h3>
                    <p class="text-gray-500 mt-2 max-w-xs mx-auto">You have no new notifications at the moment. We'll let you know when something happens.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($notifications->hasPages())
        <div class="mt-8 bg-white p-4 rounded-2xl border border-gray-100 shadow-sm">
            {{ $notifications->links() }}
        </div>
        @endif

    </div>
</div>
@endsection