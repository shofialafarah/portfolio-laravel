<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        // hanya admin yang boleh login
        if ($googleUser->email !== 'shofia.lafarah74@gmail.com') {
            abort(403, 'Unauthorized');
        }

        $user = User::updateOrCreate(
            ['email' => $googleUser->email],
            [
                'name' => $googleUser->name,
                'google_id' => $googleUser->id,
                'avatar' => $googleUser->avatar,
                'email_verified_at' => now(),
            ]
        );

        Auth::login($user);

        // LANGSUNG KE DASHBOARD ADMIN
        return redirect()->route('admin.dashboard')
            ->with('success', 'Selamat datang Admin ✨');
    }
}
