<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;
use App\Services\Admin\AdminService;

class AdminProfileController extends Controller
{
    protected $userservice;

    public function __construct(AdminService $userservice)
    {
        $this->userservice = $userservice;
    }

    //admin Profile
    public function AdminProfile()
    {
        $page_title = 'My Profile';

        return view('admin.admin.profile', compact('page_title'));
    }

    public function AdminProfileEdit()
    {
        $page_title = 'My Profile Edit';

        return view('admin.admin.edit', compact('page_title'));
    }

    public function update(ProfileRequest $request, $id)
    {
        $data = $request->validated();
        try {
            $this->userservice->storeOrUpdate($data, $id);
            $notify[] = ['success', 'Admin Profile Update successful'];

            return redirect()->route('admin.profile')->withNotify($notify);
        } catch (\Exception $e) {
            return back();
        }
    }
}
