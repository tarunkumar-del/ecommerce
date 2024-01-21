<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Role_user;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function index()
    {
        $role = Role::where('status','active')->get();

        return view('frontend.login', ['role' => $role]);
    }
    public function create(): View
    {
        $role = Role::all();
        return view('frontend.login', ['role' => $role]);
        // return view('auth.register', ['role' => $role]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'category' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        if ($user->id > 0)
            Role_user::create([
                'user_id' => $user->id,
                'role_id' => $request->category
            ]);
        if ($request->category == 1)
            Session::put('type' , 'admin');
        if ($request->category == 2)
            Session::put('type', 'vendor');
        if ($request->category == 3)
            Session::put('type', 'user');
        event(new Registered($user));

        Auth::login($user);
        toastr()->success('Registration success', 'Congrats', ['timeOut' => 5000]);

        return redirect(RouteServiceProvider::HOME);
    }
}
