<?php
use App\Models\User;
use Illuminate\Support\Facades\Config;

function type($request)
{

    $user = $request->user();

    if ($user) {
        $user = User::find($user->id);

        if ($user instanceof User){
        //    foreach($user->roles as $details)
            Config::set('type.global_auth_value', $user->roles[0]->name);
            return true;
        }
        return false;
    }
    return false;
}
