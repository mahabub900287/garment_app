<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\SocialAccount;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirectToSocialProvider(string $provider)
    {
        return Socialite::driver($provider)
            ->with(['prompt' => 'select_account'])
            ->redirect();
    }

    public function socialProviderCallback(string $provider)
    {
        try {
            $social_user = Socialite::driver($provider)->user();
            $account = SocialAccount::where([
                'provider_name' => $provider,
                'provider_id' => $social_user->getId(),
            ])->first();

            if ($account) {
                auth()->login($account->user);
                auth()->user()->save();

                return redirect()->route('front.home');
            }

            $user = User::where([
                'email' => $social_user->getEmail(),

            ])->first();
            $name = $social_user->getName();
            if (!$user) {
                $user = User::create([
                    'email' => $social_user->getEmail(),
                    'name' => $social_user->getName(),
                    'username' => Str::slug($name),
                    'last_name' => $social_user->getNickname(),
                    'type' => 'user',
                    'status' => 'active',
                    'email_verified_at' => Carbon::now(),
                    'password' => Hash::make(12345678),
                ]);

                // Save the profile image from the social provider (Google or Facebook)
                $image = file_get_contents($social_user->getAvatar());
                $imageName = time() . '_' . $social_user->getId() . '.' . 'jpg'; // You can adjust the image extension based on the file type from the social provider.
                $imagePath = 'user/' . $imageName;
                Storage::put($imagePath, $image);

                // Update the user's profile image path in the database
                $user->avatar = $imageName;

                $user->save();
            }

            $user->socialAccounts()->create([
                'provider_id' => $social_user->getId(),
                'provider_name' => $provider,
            ]);
            // event(new Registered($user));
            auth()->login($user);
            auth()->user()->save();

            return redirect()->route('front.home');
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }
}
