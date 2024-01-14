<?php

use App\Http\Controllers\Admin\DashboardController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\Front\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('front.home');

Route::get(
    'auth/{provider}/callback',
    [SocialLoginController::class, 'socialProviderCallback']
);
Route::get(
    'auth/{provider}',
    [SocialLoginController::class, 'redirectToSocialProvider']
)->name('social.redirect');

require __DIR__ . '/auth.php';
