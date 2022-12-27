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

            <div class="form-group">
                <lable for="is_admin">Права на Администратора</lable>
                <select class="form-control" name="is_admin" id="is_admin">
                    <option>{{ $user->is_admin }}</option>
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select>
            </div>

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
                <input type="password" class="form-control" name="password" id="password" placeholder="Поменять на Новый пароль">
                @error('password') <span style="color: red">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <lable for="avatar">Изображение</lable>
                <input type="file" class="form-control" name="avatar" id="avatar" value="{{ $user->avatar }}">
            </div>


            <div style="display: none">
                <input type="text" name="from" id="from" value="{{ $user->from }}">
            </div>


            <br>

            <button class="btn btn-success" type="submit">Сохранить</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Назад</a>

        </form>

    </div>

@endsection
