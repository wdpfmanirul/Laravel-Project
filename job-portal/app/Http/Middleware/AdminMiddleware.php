<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // চেক করবে ইউজার লগইন করা আছে কিনা এবং তার রোল 'admin' কিনা
        if (auth()->check() && auth()->user()->role == 'admin') {
            return $next($request);
        }

        // অ্যাডমিন না হলে হোমপেজে পাঠিয়ে দেবে
        return redirect('/')->with('error', 'You do not have admin access.');
    }
}