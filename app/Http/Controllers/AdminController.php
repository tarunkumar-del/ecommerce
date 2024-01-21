<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {

        return view("admin.dashboard", [
            'user' => $request->user(),
        ]);
    }
    public function login(){
        return view("admin.login");
    }
    public function profile(Request $request){
        return view('admin.edit', [
            'user' =>$request->user(),
        ]);
    }

}
