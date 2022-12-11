@extends('layouts.main')

@section('content')

    <style>
        .enter_column {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 5px;
            margin-bottom: 20px;
        }

        .logo_to {
            width: 25px;
            margin-left: 25px;
        }

        .logo_to:hover {
            padding: 1px 2px 1px 2px;
            box-shadow: 0 0 10px rgba(217, 217, 217, 0.29);
        }

        .card_add {
            background-color: rgba(var(--bs-dark-rgb), var(--bs-bg-opacity)) !important;
            color: white;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card_add">{{ __('Авторизация') }}</div>
                    <div class="card-body">
                        <div class="enter_column">

                            <a href="{{ route('social.auth.redirect', ['driver' => 'google']) }}">
                                <img
                                    src="https://freesvg.org/img/1534129544.png"
                                    class="logo_to"
                                    alt="Google">
                            </a>

                            <a href="{{ route('social.auth.redirect', ['driver' => 'vkontakte']) }}">
                                <img
                                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/VK_Compact_Logo_%282021-present%29.svg/2048px-VK_Compact_Logo_%282021-present%29.svg.png"
                                    class="logo_to"
                                    alt="VK">
                            </a>

                            <a href="{{ route('social.auth.redirect', ['driver' => 'github']) }}">
                                <img
                                    src="https://upload.wikimedia.org/wikipedia/commons/9/91/Octicons-mark-github.svg"
                                    class="logo_to"
                                    alt="GitHub">
                            </a>

                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Email адрес') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Пароль') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Запомнить меня') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        &nbsp; Вход &nbsp;
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Забыли пароль?(ПОКА НЕ РАБОТАЕТ СКОРО СДЕЛАЮ)') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
