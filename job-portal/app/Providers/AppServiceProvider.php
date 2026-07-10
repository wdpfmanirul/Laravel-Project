<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    
    public function register(): void
    {
        //
    }

    
    public function boot(): void
{
    View::composer('layouts.navigation', function ($view) {

        if (auth()->check()) {

            $user = auth()->user();

            $view->with('notifications',
                $user->notifications()->latest()->take(10)->get()
            );

            $view->with('unreadCount',
                $user->unreadNotifications()->count()
            );

        } else {

            $view->with('notifications', collect());
            $view->with('unreadCount', 0);
        }
    });
}
}
