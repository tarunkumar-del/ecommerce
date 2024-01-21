<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
   Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
   Route::get('profile', [AdminController::class, 'profile'])->name('profile');
   Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
// slider route
Route::resource('slider', SliderController::class);

