<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsLetterController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\Setting\SettingsController;

//login route
Route::get('/admin/login', [DashboardController::class, 'adminLogin'])->name('admin.login');
Route::prefix('admin')->as('admin.')->middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //admin Profile
    Route::get('/profile', [AdminProfileController::class, 'AdminProfile'])->name('profile');
    Route::get('/edit-profile', [AdminProfileController::class, 'AdminProfileEdit'])->name('profile.edit');
    Route::post('/profile/update/{id}', [AdminProfileController::class, 'update'])->name('profile.update');
    //user
    Route::resource('users', UserController::class);
    // newsletter
    Route::resource('newsletter', NewsLetterController::class);
    //setting
    Route::get('/setting', [SettingsController::class, 'index'])->name('setting.index');
    Route::post('/setting/store', [SettingsController::class, 'SettingStore'])->name('setting.store');
    //coupon api data store 
    Route::get('/coupon', [CouponController::class, 'couponStore'])->name('coupon');
});
