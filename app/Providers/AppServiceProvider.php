<?php

namespace App\Providers;

use App\Queries\NewsQueryBuilder;
use App\Services\Contracts\Parser;
use App\Services\Contracts\Social;
use App\Services\ParsesService;
use App\Services\SocialService;
use App\Services\UploadService;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(NewsQueryBuilder::class);

        $this->app->bind(Parser::class, ParsesService::class);
        $this->app->bind(Social::class, SocialService::class);
        $this->app->bind(UploadService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject(Lang::get('Подтвердите адрес электронной почты'))
                ->line(Lang::get('Нажмите кнопку ниже, чтобы подтвердить свой адрес электронной почты.'))
                ->action(Lang::get('Подтвердите адрес электронной почты'), $url)
                ->line(Lang::get('Если вы не создавали учетную запись, никаких дальнейших действий не требуется.'));
        });

        ResetPassword::toMailUsing(function ($notifiable, $token) {
            return (new MailMessage())
                ->subject(Lang::get('Уведомление о сбросе пароля'))
                ->line(Lang::get('Вы получили это письмо, потому что мы получили запрос на сброс пароля для вашей учетной записи.'))
                ->action(Lang::get('Сброс пароля'), url(config('app.url').route('password.reset', $token, false)))
                ->line(Lang::get('Срок действия этой ссылки для сброса пароля истекает через :count минут.', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]))
                ->line(Lang::get('Если вы не запрашивали сброс пароля, никаких дальнейших действий не требуется.'));
        });
    }
}
