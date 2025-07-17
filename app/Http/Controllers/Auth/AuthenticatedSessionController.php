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
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        // 🚨 Check email verified
        if (!$user->hasVerifiedEmail()) {
            return redirect()->route('verification.notice'); // shows the email/verify blade
        }

        // ✅ Redirect based on usertype
        return $user->usertype === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('home.userpage');
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