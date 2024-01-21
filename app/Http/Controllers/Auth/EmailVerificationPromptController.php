<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        if ($request->user()->hasVerifiedEmail()) {
            $user = $request->user();
            if ($user) {
                $user = User::find($user->id);
                if ($user instanceof User) {
                    foreach ($user->roles as $details) {
                        if ($details->name == 'admin')
                            return redirect(RouteServiceProvider::ADMIN);
                        if ($details->name == 'vendor')
                            return redirect(RouteServiceProvider::VENDOR);
                        return redirect(RouteServiceProvider::HOME);
                    }
                }

            }
        }
        return view('auth.verify-email');


    }
}
