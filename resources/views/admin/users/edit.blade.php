@extends('layouts.admin')

@section('content')

    <div class="offset-2 col-8">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
            <h1 class="h2">Редактировать Профиль</h1>
        </div>

        @include('inc.message')

        <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}" enctype="multipart/form-data">

            @csrf

            @method('put')

            <h5>Зарегистрировался через: {{ $user->from }}</h5>

            <p>Email: {{ $user->email }}</p>
            <p>Дата регистраций: {{ $user->created_at }}</p>

            <style>
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
            </style>
            <div style="position: absolute; top: 10%; left: 19%">
                @if($user->avatar == null)
                    <img class="img_cat" src="https://b3.dd.icdn.ru/m/mink_blue/6/imgsrc.ru_74126546vFm.webp" alt="CAT">
                @elseif(stristr($user->avatar , 'https://') === false)
                    <img class="img" src="{{ Storage::disk('public')->url(Auth::user()->avatar) }}" alt="DISK">
                @else
                    <img class="img" src="{{ $user->avatar }}" alt="AVATAR">
                @endif
            </div>

            <div class="form-group">
                <lable for="is_admin">Права на Администратора</lable>
                <select class="form-control" name="is_admin" id="is_admin">
                    <option value="{{ $user->is_admin }}" style="color: #b9b9b9">
                        @if($user->is_admin == 1)Администратор @endif
                        @if($user->is_admin == 0)Пользователь @endif
                    </option>
                    <option value="1" style="color: green">Сделать Администратором</option>
                    <option value="0" style="color: red">Убрать права</option>
                </select>
            </div>

            <div class="form-group">
                <lable for="name">Имя</lable>
                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                @error('name') <span style="color: red">{{ $message }}</span> @enderror
            </div>

            <input type="text" style="display: none" name="password" id="password" value="{{ $user->password }}">

            <div style="display: none">
                <input type="text" name="from" id="from" value="{{ $user->from }}">
            </div>


            <br>

            <button class="btn btn-success" type="submit">Сохранить</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Назад</a>

        </form>

    </div>

@endsection
