@extends('layouts.main')

@section('title') Главная @parent @endsection

@section('content')

    <style>
        .ackapga {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #6c757d;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: .5s;
            margin-top: 25px;
            letter-spacing: 4px;
        }

        .ackapga:hover {
            background: #6c757d;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px #6c757d,
            0 0 25px #6c757d,
            0 0 50px #6c757d,
            0 0 100px #6c757d;
        }

        .ackapga .ackapga-span {
            position: absolute;
            display: block;
        }

        .ackapga .ackapga-span:nth-child(1) {
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #6c757d);
            animation: btn-anim-1 1s linear infinite;
        }

        @keyframes btn-anim-1 {
            0% {
                left: -100%;
            }
            50%, 100% {
                left: 100%;
            }
        }

        .ackapga .ackapga-span:nth-child(2) {
            top: -100%;
            right: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(180deg, transparent, #6c757d);
            animation: btn-anim-2 1s linear infinite;
            animation-delay: .25s;
        }

        @keyframes btn-anim-2 {
            0% {
                top: -100%;
            }
            50%, 100% {
                top: 100%;
            }
        }

        .ackapga .ackapga-span:nth-child(3) {
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(270deg, transparent, #6c757d);
            animation: btn-anim-3 1s linear infinite;
            animation-delay: .5s;
        }

        @keyframes btn-anim-3 {
            0% {
                right: -100%;
            }
            50%, 100% {
                right: 100%;
            }
        }

        .ackapga .ackapga-span:nth-child(4) {
            bottom: -100%;
            left: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(360deg, transparent, #6c757d);
            animation: btn-anim-4 1s linear infinite;
            animation-delay: .75s;
        }

        @keyframes btn-anim-4 {
            0% {
                bottom: -100%;
            }
            50%, 100% {
                bottom: 100%;
            }
        }


        .ackapga-yellow {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #fdc007;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: .5s;
            margin-top: 25px;
            letter-spacing: 4px;
            margin-right: 10px;
        }

        .ackapga-yellow:hover {
            background: #fdc007;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px #fdc007,
            0 0 25px #fdc007,
            0 0 50px #fdc007,
            0 0 100px #fdc007;
        }

        .ackapga-yellow .ackapga-yellow-span {
            position: absolute;
            display: block;
        }

        .ackapga-yellow .ackapga-yellow-span:nth-child(1) {
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #fdc007);
            animation: btn-anim-1 1s linear infinite;
        }

        @keyframes btn-anim-1 {
            0% {
                left: -100%;
            }
            50%, 100% {
                left: 100%;
            }
        }

        .ackapga-yellow .ackapga-yellow-span:nth-child(2) {
            top: -100%;
            right: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(180deg, transparent, #fdc007);
            animation: btn-anim-2 1s linear infinite;
            animation-delay: .25s;
        }

        @keyframes btn-anim-2 {
            0% {
                top: -100%;
            }
            50%, 100% {
                top: 100%;
            }
        }

        .ackapga-yellow .ackapga-yellow-span:nth-child(3) {
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(270deg, transparent, #fdc007);
            animation: btn-anim-3 1s linear infinite;
            animation-delay: .5s;
        }

        @keyframes btn-anim-3 {
            0% {
                right: -100%;
            }
            50%, 100% {
                right: 100%;
            }
        }

        .ackapga-yellow .ackapga-yellow-span:nth-child(4) {
            bottom: -100%;
            left: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(360deg, transparent, #fdc007);
            animation: btn-anim-4 1s linear infinite;
            animation-delay: .75s;
        }

        @keyframes btn-anim-4 {
            0% {
                bottom: -100%;
            }
            50%, 100% {
                bottom: 100%;
            }
        }


        .ackapga-red {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #db3545;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: .5s;
            margin-top: 25px;
            letter-spacing: 4px;
        }

        .ackapga-red:hover {
            background: #db3545;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px #db3545,
            0 0 25px #db3545,
            0 0 50px #db3545,
            0 0 100px #db3545;
        }

        .ackapga-red .ackapga-red-span {
            position: absolute;
            display: block;
        }

        .ackapga-red .ackapga-red-span:nth-child(1) {
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #db3545);
            animation: btn-anim-1 1s linear infinite;
        }

        @keyframes btn-anim-1 {
            0% {
                left: -100%;
            }
            50%, 100% {
                left: 100%;
            }
        }

        .ackapga-red .ackapga-red-span:nth-child(2) {
            top: -100%;
            right: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(180deg, transparent, #db3545);
            animation: btn-anim-2 1s linear infinite;
            animation-delay: .25s;
        }

        @keyframes btn-anim-2 {
            0% {
                top: -100%;
            }
            50%, 100% {
                top: 100%;
            }
        }

        .ackapga-red .ackapga-red-span:nth-child(3) {
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(270deg, transparent, #db3545);
            animation: btn-anim-3 1s linear infinite;
            animation-delay: .5s;
        }

        @keyframes btn-anim-3 {
            0% {
                right: -100%;
            }
            50%, 100% {
                right: 100%;
            }
        }

        .ackapga-red .ackapga-red-span:nth-child(4) {
            bottom: -100%;
            left: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(360deg, transparent, #db3545);
            animation: btn-anim-4 1s linear infinite;
            animation-delay: .75s;
        }

        @keyframes btn-anim-4 {
            0% {
                bottom: -100%;
            }
            50%, 100% {
                bottom: 100%;
            }
        }

        .ackapga-name {
            font-weight: 300;
            animation: open 2s linear infinite;
        }

        @keyframes open {
            0% {
                letter-spacing: 3px;
            }
            50% {
                letter-spacing: 4px;
            }
            100% {
                letter-spacing: 3px;
            }
        }
    </style>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="ackapga-name">News Aggregator</h1>
                <p class="lead text-muted">Этот веб-сайт разработал Аскар Маемгенов.
                    <br>
                    Использовал фреймворк - Laravel.
                </p>
                @guest
                    <a href="{{ route('news.index') }}" class="ackapga">
                        <span class="ackapga-span"></span>
                        <span class="ackapga-span"></span>
                        <span class="ackapga-span"></span>
                        <span class="ackapga-span"></span>
                        Просмотр новостей
                    </a>
                @else
                    <a href="{{ route('news.index') }}" class="ackapga">
                        <span class="ackapga-span"></span>
                        <span class="ackapga-span"></span>
                        <span class="ackapga-span"></span>
                        <span class="ackapga-span"></span>
                        Просмотр новостей
                    </a>
                    <div>
                        <a href="{{ route('account') }}" class="ackapga-yellow">
                            <span class="ackapga-yellow-span"></span>
                            <span class="ackapga-yellow-span"></span>
                            <span class="ackapga-yellow-span"></span>
                            <span class="ackapga-yellow-span"></span>
                            Кабинет
                        </a>
                        @if(Auth::user()->is_admin == true)
                            <a href="{{ route('admin.resources.index') }}" class="ackapga-red">
                                <span class="ackapga-red-span"></span>
                                <span class="ackapga-red-span"></span>
                                <span class="ackapga-red-span"></span>
                                <span class="ackapga-red-span"></span>
                                Админка
                            </a>
                        @endif
                    </div>

                @endguest
            </div>
        </div>
    </section>
@endsection


