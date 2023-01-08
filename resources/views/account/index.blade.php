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

        .href {
            text-decoration: none;
            color: white;
            padding: 7px;
            background-color: #383838;
            border: 2px solid gray;
            border-radius: 15px;
        }

        .href:hover {
            color: white;
            background-color: #262626;
            box-shadow: black;
        }

        .hrefAdmin {
            text-decoration: none;
            color: white;
            padding: 7px;
            background-color: #fdc007;
            border: 2px solid #faeec6;
            border-radius: 15px;
        }

        .hrefAdmin:hover {
            color: white;
            background-color: #fdc719;
            box-shadow: 0 0 10px white;
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
            position: fixed;
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
                    <p class="title textP">Вход с Сайта</p>
                @elseif(stristr(Auth::user()->avatar , 'https://') === false)
                    <img class="img" src="{{ Storage::disk('public')->url(Auth::user()->avatar) }}" alt="DISK">
                    <p class="title textP">Вход с {{ Auth::user()->from }}</p>
                @else
                    <img class="img" src="{{ Auth::user()->avatar }}" alt="AVATAR">
                    <p class="title textP">Вход с {{ Auth::user()->from }}</p>
                @endif

                <form method="post" action="{{ route('user.update', [$user]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @if(Auth::user()->id == 1)
                        @if(Auth::user()->is_admin !== true )
                            <input type="text" name="is_admin" id="is_admin" value="1" style="display: none">
                            <input type="text" name="password" id="password" value="12345678" style="display: none">
                            <button class="btn btn-outline-warning" type="submit"> &#10048; Стать Администратором
                                &#10048;
                            </button>
                        @endif
                    @endif
                </form>

            </div>

            <div class="text">
                <h2 class="title">Добро пожаловать </h2>
                <h2 class="title">{{ Auth::user()->name }} </h2>
            </div>

            <div class="butt">
                @if(Auth::user()->is_admin === true)
                    <h5 class="h5_text">
                        <a href="{{ route('admin.resources.index') }}" class="hrefAdmin">&#10048; &nbsp;GO TO ADMIN&nbsp;</a>
                    </h5>
                    <hr>
                    <h5 class="h5_text">
                        <a href="/" class="href">&nbsp; NewsAggregator &nbsp;</a>
                    </h5>
                @else
                    <h5 class="h5_text">
                        <a href="/" class="href">&nbsp; NewsAggregator &nbsp;</a>
                    </h5>
                @endif

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
