@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"
                         style="background-color: rgba(var(--bs-dark-rgb), var(--bs-bg-opacity)) !important;color: white; display: flex; justify-content: space-between">
                        <div>Сброс пароля</div>
                        <div>
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
                            Ссылка для сброса пароля будет отправлена на
                            <a href="https://mailtrap.io/inboxes" target="_blank" class="mail">
                                Mailtrap.io
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Email Адрес') }}</label>

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

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('Отправить ссылку для сброса пароля') }}
                                    </button>
                                    <a href="{{ route('login') }}" class="btn btn-secondary">Назад</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
