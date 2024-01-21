<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
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

        $user = $request->user();

        if ($user) {
            $user = User::find($user->id);
            if ($user instanceof User) {

                foreach ($user->roles as $details) {

                    toastr()->success('welcome ' . auth()->user()->name, 'Congrats', ['timeOut' => 5000]);

                    if ($details->name == 'admin')
                        return redirect()->intended(RouteServiceProvider::ADMIN);
                    if ($details->name == 'vendor')
                        return redirect()->intended(RouteServiceProvider::VENDOR);
                    return redirect()->intended(RouteServiceProvider::HOME);
                }
            }
            abort(401, 'not found');
        }
        abort(403, 'unauthorized');

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
}
