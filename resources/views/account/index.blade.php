@extends('layouts.main')

@section('title')Account: {{ Auth::user()->name }}  @endsection

@section('content')
    <style>
        .back-yellow {
            background: linear-gradient(to top, white, #fcd43b);
        }

        .title {
            text-shadow: black;
            color: gray;
        }

        .img {
            width: 20vh;
            border-radius: 100px;
            box-shadow: 0 0 25px grey;
            border: 2px solid rgba(255, 255, 164, 0.2);
        }

        .img_cat {
            width: 20vh;
            border-radius: 100px;
            box-shadow: 0 0 25px grey;
            border: 2px solid rgba(255, 255, 164, 0.2);
        }

        .text {
            text-align: center;
        }

        .head {

            display: flex;
            justify-content: space-around;
            padding: 30px;
            align-items: center;
        }

        .center {
            text-align: center;
        }

        .textP {
            margin-top: 15px;
        }

        .change {
            background: linear-gradient(to bottom, #ffffff, #a1eaf8);
            color: #59c0e8;
        }

        .butt {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .menu {
            position: absolute;
            right: 7%;
            top: 13%;
            padding: 10px;
            background: #ffc107;
            border: 1px solid rgba(255, 255, 255, 0.55);
            border-radius: 10px;
            color: white;
            text-decoration: none;
        }

        .menu:hover {
            background: red;
            color: white;
            border: 1px solid rgb(255, 136, 136);
            object-fit: cover;
        }

        .ackapga {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #6c757d;
            background: rgba(108, 117, 125, 0.10);
            border-radius: 5px;
            text-decoration: none;
            overflow: hidden;
            transition: .5s;
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

        .ackapga-red {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #db3545;
            background: rgba(219, 53, 69, 0.1);
            border-radius: 5px;
            text-decoration: none;
            overflow: hidden;
            transition: .5s;
            margin-top: 25px;
            letter-spacing: 2px;
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

    </style>

    <div class="back-yellow">
        <a class="menu" href="{{ route('logout') }}"
           onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Выйти
        </a>
        <div class="head">
            <div class="center">
                @if(Auth::user()->avatar == null)
                    <img class="img_cat" src="https://b3.dd.icdn.ru/m/mink_blue/6/imgsrc.ru_74126546vFm.webp" alt="CAT">
                @elseif(stristr(Auth::user()->avatar , 'https://') === false)
                    <img class="img" src="{{ Storage::disk('public')->url(Auth::user()->avatar) }}" alt="DISK">
                @else
                    <img class="img" src="{{ Auth::user()->avatar }}" alt="AVATAR">
                @endif
                <p class="title textP">Вход с {{ Auth::user()->from }}</p>

                @if(Auth::user()->id == 1 && Auth::user()->is_admin !== true)
                        <form method="post" action="{{ route('user.update', [$user]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <input type="text" name="is_admin" id="is_admin" value="1" style="display: none">
                            <input type="text" name="password" id="password" value="12345678" style="display: none">
                            <button class="btn btn-outline-warning" type="submit"> &#10048; Стать Администратором
                                &#10048;
                            </button>
                            <p style="color: #fdc007; font-size: 12px">Внимание пароль поменяется на: 12345678</p>
                        </form>
                @endif

            </div>

            <div class="text">
                <h2 class="title" style="font-weight: 300; text-transform: uppercase;">Добро пожаловать </h2>
                <h2 class="title" style="font-weight: 300;">{{ Auth::user()->name }} </h2>
            </div>

            <div class="butt">
                @if(Auth::user()->is_admin === true)
                    <a href="{{ route('admin.resources.index') }}" class="ackapga-red">
                        <span class="ackapga-red-span"></span>
                        <span class="ackapga-red-span"></span>
                        <span class="ackapga-red-span"></span>
                        <span class="ackapga-red-span"></span>
                        GO TO ADMIN
                    </a>
                    <hr>
                @endif
                <a href="/" class="ackapga">
                    <span class="ackapga-span"></span>
                    <span class="ackapga-span"></span>
                    <span class="ackapga-span"></span>
                    <span class="ackapga-span"></span>
                    &nbsp; NewsAggregator &nbsp;
                </a>
                <hr>
                <button type="button" class="btn btn-info" data-bs-toggle="collapse" data-bs-target="#edit"
                        aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation"
                        style="color: white">
                    <span>Профиль &#9776;</span>
                </button>
            </div>
        </div>
    </div>
    @include('inc.message')
    <div class="change collapse" id="edit">

        <div class="offset-2 col-8">

            <h3>Редактировать профиль</h3>

            <form method="post" action="{{ route('user.update', [$user]) }}" enctype="multipart/form-data">

                @csrf

                @method('put')

                <input type="text" name="from" id="from" value="{{ $user->from }}" style="display: none">


                <div class="form-group">
                    <lable for="name">Имя</lable>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                    @error('name') <span style="color: red">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <lable for="email">Email</lable>
                    <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
                    @error('email') <span style="color: red">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <lable for="password">Пароль</lable>
                    <input type="password" class="form-control" name="password" id="password"
                           placeholder="Поменять на Новый пароль" required>
                    @error('password') <span style="color: red">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <lable for="avatar">Изображение</lable>
                    <input type="file" class="form-control" name="avatar" id="avatar" value="{{ $user->avatar }}">
                </div>

                <br>

                <button class="btn btn-success" type="submit">Редактировать</button>
                <a href="{{ route('account') }}" class="btn btn-danger">Отменить</a>

            </form>

            <br><br><br>


        </div>

    </div>

@endsection
