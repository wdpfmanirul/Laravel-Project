<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    
    public function create(): View
    {
        return view('auth.login');
    }

       public function store(LoginRequest $request): RedirectResponse
{
    
    $request->authenticate();

    $request->session()->regenerate();

    $user = Auth::user();

    if ($user->role === 'admin') {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return back()->withErrors([
            'email' => 'Admins must login from the Admin Login page.',
        ]);
    }

    if ($user->role === 'employer') {
        return redirect()->route('employer.dashboard');
    }

    if ($user->role === 'candidate') {
        return redirect()->route('candidate.dashboard');
    }

    return redirect('/');
}
   
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}