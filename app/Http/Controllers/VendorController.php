<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class VendorController extends Controller
{
    public function index()
    {

        return view("frontend.vendor.dashboard");
    }
}
