@extends('layouts.main')

@section('title') Главная @parent @endsection

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">News Aggregator</h1>
                <p class="lead text-muted">Этот веб-сайт разработал Аскар Маемгенов.
                    <br>
                    Использовал фреймворк - Laravel.
                </p>
                <div style="display: flex; flex-direction: column; ">
                    <a href="{{ route('news.index') }}" class="btn btn-secondary my-2">Просмотр новостей</a>
                    <a href="{{ route('admin.index') }}" class="btn btn-primary my-2">Кабинет Админ</a>
                    <p style="color: gray">
                        Кабинет Админ доступен только для Администратора. <br>
                        Если вы нажмете на нее, не являясь Админом <br>
                        Вас закинет на 404!
                    </p>
                </div>
            </div>
    </section>
@endsection
