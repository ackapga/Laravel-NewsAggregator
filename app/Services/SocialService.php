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
    public function loginOrRegisterIfNullVk(SocialUser $socialUser): string
    {
        $user = User::query()->where('email', '=', $socialUser->getEmail())->first();
        if ($user === null) {
            $name = $socialUser->getName();
            $email = $socialUser->getEmail();
            $avatar = $socialUser->getAvatar();
            $password = Hash::make('VK' . $socialUser->getEmail());
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
        $user->from = 'VK';

        if ($user->save()) {
            Auth::loginUsingId($user->id);
            return route('account');
        }
        throw new Exception('Ошибка! Пользователь не сохранился через VK!');
    }

    /**
     * @param SocialUser $socialUser
     * @return string
     * @throws Exception
     */
    public function loginOrRegisterIfNullGitHub(SocialUser $socialUser): string
    {
        $user = User::query()->where('email', '=', $socialUser->getEmail())->first();
        if ($user === null) {
            $name = $socialUser->getName();
            $email = $socialUser->getEmail();
            $avatar = $socialUser->getAvatar();
            $password = Hash::make('GitHub' . $socialUser->getEmail());
            $vk = User::create([
                'from' => 'GitHub',
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
        $user->from = 'GitHub';
        if ($user->save()) {
            Auth::loginUsingId($user->id);
            return route('account');
        }
        throw new Exception('Ошибка! Пользователь не сохранился через GitHub!');
    }

    /**
     * @param SocialUser $socialUser
     * @return string
     * @throws Exception
     */
    public function loginOrRegisterIfNullGoogle(SocialUser $socialUser): string
    {
        $user = User::query()->where('email', '=', $socialUser->getEmail())->first();

        if ($user === null) {
            $name = $socialUser->getName();
            $email = $socialUser->getEmail();
            $avatar = $socialUser->getAvatar();
            $password = Hash::make('Google' . $socialUser->getEmail());
            $google = User::create([
                'from' => 'Google',
                'name' => $name,
                'email' => $email,
                'avatar' => $avatar,
                'password' => $password,

            ]);
            Auth::login($google);
            return route('account');
        }

        $user->name = $socialUser->getName();
        $user->avatar = $socialUser->getAvatar();
        $user->from = 'Google';
        if ($user->save()) {
            Auth::loginUsingId($user->id);
            return route('account');
        }
        throw new Exception('Ошибка! Пользователь не сохранился через Google!');
    }
}
