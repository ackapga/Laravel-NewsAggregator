<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use App\Services\Contracts\Social;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Contracts\User as SocialUser;

class SocialService implements Social
{

    /**
     * @param SocialUser $socialUser
     * @return string
     * @throws Exception
     */
    public function loginOrRegisterIfNull(SocialUser $socialUser): string
    {
        $user = User::query()->where('email', '=', $socialUser->getEmail())->first();

        if ($user === null) {

            $name = $socialUser->getName();
            $email = $socialUser->getEmail();
            $avatar = $socialUser->getAvatar();
            $password = Hash::make('12345678');

            $vk = User::create([
                'from' => 'VK',
                'name' => $name,
                'email' => $email,
                'avatar' => $avatar,
                'password' => $password,
            ]);

            Auth::login($vk);

            return route('account');
        }

        $user->name = $socialUser->getName();
        $user->avatar = $socialUser->getAvatar();

        if ($user->save()) {
            Auth::loginUsingId($user->id);
            return route('account');
        }
        throw new Exception('Ошибка! Пользователь не сохранился!');
    }
}
