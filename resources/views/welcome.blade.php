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
                <p>
                    <a href="{{ route('admin.index') }}" class="btn btn-primary my-2">Кабинет Админ</a>
                    <a href="{{ route('news.index') }}" class="btn btn-secondary my-2">Просмотр новостей</a>
                </p>
            </div>
        </div>
    </section>
@endsection
