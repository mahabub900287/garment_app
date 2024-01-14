<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Dflydev\DotAccessData\Data;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate data
        $error_message = 'Incorrect email or password';
        $this->validate($request, [
            'email_or_username' => 'required',
            'password' => 'required',
        ]);

        $field = filter_var($request->email_or_username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [$field => $request->email_or_username, 'password' => $request->password];
        if (auth()->attempt($credentials, $request->has('remember'))) {
            $data = $request->session()->regenerate();
            $user = auth()->user();
            if ($user->type == User::USER_TYPE_ADMIN) {
                return redirect()->intended(RouteServiceProvider::ADMIN);
            }
            if ($user->type == User::USER_TYPE_USER) {
                return redirect()->intended(RouteServiceProvider::FrontendHome);
            }
        }

        // Return with error
        return redirect()->back()
            ->withInput($request->only('email_or_username', 'remember'))
            ->withErrors([
                'email_or_username' => $error_message,
            ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
