@extends('layouts.admin')

@section('content')

    <div class="offset-2 col-8">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
            <h1 class="h2">Добавить Категорий</h1>
        </div>

        @include('inc.message')

        <form method="post" action="{{ route('admin.categories.store') }}">

            @csrf

            <div class="form-group">
                <lable for="title">Заголовок</lable>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                @error('title') <span style="color: red">{{ $message }}</span> @enderror
            </div>

            <br>

            <div class="form-group">
                <lable for="description">Описание</lable>
                <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
                @error('description') <span style="color: red">{{ $message }}</span> @enderror
            </div>

            <br>

            <button class="btn btn-success" type="submit">Сохранить</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Назад</a>

        </form>

    </div>

@endsection
