<?php
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
   Route::get('dashboard', [VendorController::class, 'index'])->name('dashboard');
   Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
   Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
   Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

?>
