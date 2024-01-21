<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {

            if (Auth::guard($guard)->check()) {

                $user = User::with('roles')->get()->toArray();
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
                    return $next($request);
                }
                return $next($request);
            }
            return $next($request);
        }
        return $next($request);


    }
}
