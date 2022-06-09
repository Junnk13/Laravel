<?php

namespace App\Services\Contract;

use Laravel\Socialite\Contracts\User;

interface Social
{
    public function loginOrRegisterViaSocialNet(User $socialUser): string;


}
