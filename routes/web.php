<?php

use App\Http\Controllers\Admin\DashboardController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\Front\ProfileController;

Route::prefix('user')->as('user.')->middleware(['auth', 'is_user', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('home');
    Route::get('/rewards',  [ProfileController::class, 'rewards'])->name('rewards');
    Route::get('/communication',  [ProfileController::class, 'communication'])->name('communication');
    Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/update-password/{id}', [ProfileController::class, 'UserPasswordUpdate'])->name('update-password');
    Route::post('/update-image/{id}', [ProfileController::class, 'UserImageUpdate'])->name('update-image');
    Route::delete('/delete-account/{id}', [ProfileController::class, 'UserDeleteAccount'])->name('delete.account');
});
Route::get('/', [HomeController::class, 'index'])->name('front.home');
Route::get('/top-deals', [HomeController::class, 'topDeal'])->name('front.top-deals');
Route::get('/category', [HomeController::class, 'Category'])->name('front.category');
Route::get('/single-category/{slug}', [HomeController::class, 'singlecategory'])->name('front.single-category');
Route::get('/cash-back', [HomeController::class, 'cashback'])->name('front.cashback');
Route::post('/newsletter', [HomeController::class, 'newsletterSubbscribe'])->name('front.newsletter');
//contact page
Route::get('/contact-us', [HomeController::class, 'contact'])->name('front.contact');
//about page
Route::get('/about-us', [HomeController::class, 'about'])->name('front.about');
//trams & condition page
Route::get('/trams-and-condition', [HomeController::class, 'tramsAndCondition'])->name('front.tram-and-condition');
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('front.privacypolicy');
Route::get('/faq', [HomeController::class, 'faqPage'])->name('front.faq');
Route::get('/community', [HomeController::class, 'community'])->name('front.community');

Route::get('/all-coupons', [HomeController::class, 'allCoupon'])->name('front.coupons');
Route::get('/community-coupon', [HomeController::class, 'communityCoupon'])->name('front.communitycoupon');
Route::get('/price-comparison', [HomeController::class, 'priceComparison'])->name('front.pricecomparison');
Route::get('/product-price', [HomeController::class, 'productPrice'])->name('front.productPrice');
Route::get('/help', [HomeController::class, 'helpPage'])->name('front.help');
Route::get('/submit-coupon', [HomeController::class, 'CouponSubmit'])->name('front.submit.coupon');
//blog page
Route::get('/blog', [HomeController::class, 'blog'])->name('front.blog');
Route::get('/blog/{slug}', [HomeController::class, 'blogDetails'])->name('front.single-blog');

Route::middleware('auth')->group(function () {
    Route::get('/profile',  [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get(
    'auth/{provider}/callback',
    [SocialLoginController::class, 'socialProviderCallback']
);
Route::get(
    'auth/{provider}',
    [SocialLoginController::class, 'redirectToSocialProvider']
)->name('social.redirect');

require __DIR__ . '/auth.php';
