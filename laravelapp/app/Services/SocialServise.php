<?php

namespace App\Services;

use App\Services\Contract\Social;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;
use \App\Models\User;

class SocialServise implements Social
{

    public function loginOrRegisterViaSocialNet(SocialUser $socialUser): string
    {
        $user = User::where('email', $socialUser->getEmail())->first();
        if ($user) {
            $user->name = $socialUser->getName();
            $user->avatar = $socialUser->getAvatar();
            if($user->save())
                Auth::loginUsingId($user->id);
                return route('account');
        } else
            return route('register');

        throw new ModelNotFoundException('Model not found');
    }
}
