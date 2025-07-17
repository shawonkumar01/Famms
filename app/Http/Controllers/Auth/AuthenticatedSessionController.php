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
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (! Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->onlyInput('email');
    }

    $request->session()->regenerate();

    $user = Auth::user();

    // If email is not verified
    if (! $user->hasVerifiedEmail()) {
        return redirect()->route('verification.notice');
    }

    // Redirect based on usertype
    if ($user->usertype == 'admin') {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('home.userpage');
    }
}



    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    // app/Http/Controllers/Auth/AuthenticatedSessionController.php

    // app/Http/Controllers/Auth/AuthenticatedSessionController.php

}