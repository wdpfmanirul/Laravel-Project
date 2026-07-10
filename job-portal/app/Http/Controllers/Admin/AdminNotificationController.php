<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminNotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()
            ->user()
            ->notifications()
            ->latest()
            ->paginate(20);

        return view(
            'admin.notifications.index',
            compact('notifications')
        );
    }

    public function markAsRead($id)
    {
        $notification =
            auth()->user()
            ->notifications()
            ->findOrFail($id);

        $notification->markAsRead();

        return back();
    }

    public function markAllRead()
    {
        auth()
            ->user()
            ->unreadNotifications
            ->markAsRead();

        return back();
    }
}