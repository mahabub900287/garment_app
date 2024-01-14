<?php

namespace App\Http\Controllers\Front;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Front\NewsLetterService;
use App\Http\Requests\Front\NewsLetterRequest;

class HomeController extends Controller
{
    protected $newsletterService;

    public function __construct(NewsLetterService $newsletterService)
    {
        $this->newsletterService = $newsletterService;
    }
    public function index(): Response
    {
        return Inertia::render('Frontend/Home', [
            'status' => session('status'),
        ]);
    }

    public function newsletterSubbscribe(NewsLetterRequest $request)
    {
        $data = $request->validated();
        try {
            $this->newsletterService->storeOrUpdate($data);
            $notify[] = ['success', 'Subscribe successfully'];

            return redirect()->back()->withNotify($notify);
        } catch (\Exception $e) {
            // Handle the exception
        }

        return back();
    }
    public function topDeal(): Response
    {
        return Inertia::render('Frontend/TopDeals', [
            'status' => session('status'),
        ]);
    }
    public function Category(): Response
    {
        return Inertia::render('Frontend/Category', [
            'status' => session('status'),
        ]);
    }
    public function singlecategory($slug): Response
    {
        return Inertia::render('Frontend/SingleCategory', [
            'slug'     => $slug,
        ]);
    }
    public function community(): Response
    {
        return Inertia::render('Frontend/Community', [
            'status' => session('status'),
        ]);
    }
    public function priceComparison(): Response
    {
        return Inertia::render('Frontend/PriceComparison', [
            'status' => session('status'),
        ]);
    }
    public function cashback(): Response
    {

        return Inertia::render('Frontend/CashBack', [
            'status' => session('status'),
        ]);
    }
    //contact page
    public function contact(): Response
    {
        return Inertia::render('Frontend/ContactUs', [
            'status' => session('status'),
        ]);
    }

    //Blog
    public function blog(): Response
    {
        return Inertia::render('Frontend/Blog', [
            'status' => session('status'),
        ]);
    }
    //single Blog
    public function blogDetails($slug): Response
    {
        return Inertia::render('Frontend/SingleBlog', [
            'status' => session('status'),
        ]);
    }
    //about page
    public function about(): Response
    {
        return Inertia::render('Frontend/About', [
            'status' => session('status'),
        ]);
    }
    public function helpPage(): Response
    {
        return Inertia::render('Frontend/Help', [
            'status' => session('status'),
        ]);
    }
    //trams and condition
    public function tramsAndCondition(): Response
    {
        return Inertia::render('Frontend/Terms&Conditions', [
            'status' => session('status'),
        ]);
    }

    //trams and condition
    public function privacyPolicy(): Response
    {
        return Inertia::render('Frontend/PrivacyPolicy', [
            'status' => session('status'),
        ]);
    }
    public function faqPage(): Response
    {
        return Inertia::render('Frontend/FaqPage', [
            'status' => session('status'),
        ]);
    }
    public function allCoupon(): Response
    {
        return Inertia::render('Frontend/Coupon', [
            'status' => session('status'),
        ]);
    }
    public function communityCoupon(): Response
    {
        return Inertia::render('Frontend/CommunityCoupon', [
            'status' => session('status'),
        ]);
    }
    public function productPrice(): Response
    {
        return Inertia::render('Frontend/ProductPrice', [
            'status' => session('status'),
        ]);
    }
    public function CouponSubmit(): Response
    {
        return Inertia::render('Frontend/SubmitCoupon', [
            'status'        => session('status'),
        ]);
    }
}
