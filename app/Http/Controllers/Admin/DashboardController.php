<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard');
    }
    public function adminLogin()
    {
        return Inertia::location('admin/dashboard');
    }
}
