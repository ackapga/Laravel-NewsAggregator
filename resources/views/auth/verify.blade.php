@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"
                         style="background-color: rgba(var(--bs-dark-rgb), var(--bs-bg-opacity)) !important;color: white; display: flex; justify-content: space-between">
                        Подтвердите свой Email адрес
                        <style>
                            .mail {
                                color: #c3eac0;
                                text-decoration: none;
                            }

                            .mail:hover {
                                color: #00e5a7;
                                text-shadow: 0 0 5px #1a2e44;
                            }
                        </style>
                        <div>
                            Ссылка для подтверждения пароля будет отправлена на
                            <a href="https://mailtrap.io/inboxes" target="_blank" class="mail">
                                Mailtrap.io
                            </a>
                        </div>
                    </div>

                    <div class="card-body" style="display: flex; flex-direction: column; align-items: center">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                На ваш адрес электронной почты отправлена новая ссылка для подтверждения.
                            </div>
                        @endif
                        <div style="text-align: center">
                            Прежде чем получить доступ к вашему аккаунту на нашем сайте,
                            <br>
                            Подтвердите свою электронную почту: {{ Auth::user()->email }}.
                            <br><br>
                            Если вы не получили письмо
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit"
                                        class="btn btn-secondary">{{ __('Нажмите, чтобы получить письмо') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
