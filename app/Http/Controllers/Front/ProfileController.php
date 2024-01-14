<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Services\Admin\User\UserService;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\Admin\ProfileRequest;

class ProfileController extends Controller
{
    protected $userservice;

    public function __construct(UserService $userservice)
    {
        $this->userservice = $userservice;
    }
    //
    public function index(): Response
    {
        return Inertia::render('Frontend/Profile');
    }
    public function rewards(): Response
    {
        return Inertia::render('Frontend/Profile/Reward');
    }
    public function communication(): Response
    {
        return Inertia::render('Frontend/Profile/Communication');
    }
    public function update(ProfileRequest $request, $id): RedirectResponse
    {
        $data = $request->validated();
        try {
            $this->userservice->storeOrUpdate($data, $id);
            return back();
        } catch (\Exception $e) {
            return back();
        }
    }
    public function UserPasswordUpdate(Request $request, $id): RedirectResponse
    {
        $user = Auth::user();
        $validated = $request->validate([
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('current password does not match.');
                    }
                },
            ],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);
        $user->fill([
            'password' => Hash::make($validated['password']),
        ])->save();

        return back();
    }
    public function UserImageUpdate(Request $request, $id): RedirectResponse
    {
        $data = $validated = $request->validate([
            'avatar'  => ['nullable']
        ]);
        try {
            $this->userservice->storeOrUpdate($data, $id);
            return back();
        } catch (\Exception $e) {
            return back();
        }
    }
    public function UserDeleteAccount(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json('true');
    }
}
