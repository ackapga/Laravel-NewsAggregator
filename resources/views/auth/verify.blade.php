@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"
                         style="background-color: rgba(var(--bs-dark-rgb), var(--bs-bg-opacity)) !important;color: white;"
                    >{{ __('Проверьте свой адрес электронной почты') }}</div>

                    <div class="card-body" style="display: flex; flex-direction: column; align-items: center">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('На ваш адрес электронной почты отправлена новая ссылка для подтверждения.') }}
                            </div>
                        @endif
                        <div style="text-align: center">
                            {{ __('Прежде чем продолжить, проверьте свою электронную почту на наличие ссылки для подтверждения.') }}
                            <br>
                            {{ __('Если вы не получили письмо') }}
                        </div>
                        <br>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                    class="btn btn-secondary">{{ __('Нажмите, чтобы запросить письмо') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
