<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class RoleMiddleware
{

    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = $request->user();
        if ($user) {
            $user = User::find($user->id);
            if ($user instanceof User) {
                foreach ($user->roles as $details) {
                    if ($details->name == $role) {
                        Session::put('type', $role);

                        return $next($request);
                    }
                }
            }
            return redirect()->route('loginregister');
        }
        // abort(403, 'unauthorized');
        return redirect()->route('loginregister');
    }
}
