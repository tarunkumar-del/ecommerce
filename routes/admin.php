<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
   Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
   Route::get('profile', [AdminController::class, 'profile'])->name('profile');
   Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
// slider route
Route::resource('slider', SliderController::class);
//category route
Route::resource('category', CategoryController::class);
Route::put('category-status', [CategoryController::class,'categoryStatus'])->name('category.change-status');
// sub-category route
Route::resource('sub-category', SubCategoryController::class);
Route::put('sub-category-status', [SubCategoryController::class,'subCategoryStatus'])->name('sub-category.change-status');
// child-category route
Route::resource('child-category', ChildCategoryController::class);
Route::put('child-category-status', [ChildCategoryController::class,'childCategoryStatus'])->name('child-category.change-status');
