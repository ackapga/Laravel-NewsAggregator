<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Routing\Redirector;
use App\Services\Contracts\Social;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Contracts\Foundation\Application;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;

class SocialController extends Controller
{
    public function redirect(string $driver): SymfonyRedirectResponse|RedirectResponse
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver, Social $social): Redirector|Application|RedirectResponse
    {
        if ($driver === 'vkontakte') {
            return redirect(
                $social->loginOrRegisterIfNullVk(Socialite::driver($driver)->user())
            );
        } elseif ($driver === 'github') {
            return redirect(
                $social->loginOrRegisterIfNullGitHub(Socialite::driver($driver)->user())
            );
        } elseif ($driver === 'google') {
            return redirect(
                $social->loginOrRegisterIfNullGoogle(Socialite::driver($driver)->user())
            );
        }
        return dd($driver) ;
    }
}
