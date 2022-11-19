@extends('layouts.admin')

@section('content')

    <div class="offset-2 col-8">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
            <h1 class="h2">Добавить Новость</h1>
        </div>

        @if($errors->any())
            @foreach($errors->all() as $error)
                @include('inc.message', ['message' => $error])
            @endforeach
        @endif

        <form method="post" action="{{ route('admin.news.store') }}">

            @csrf

            <div class="form-group">
                <lable for="title">Наименование</lable>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <lable for="author">Автор</lable>
                <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}">
            </div>

            <div class="form-group">
                <lable for="description">Описание</lable>
                <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
            </div>

            <br>

            <button class="btn btn-success" type="submit">Сохранить</button>
            <a href="{{ route('admin.news.index') }}" class="btn btn-primary">Назад</a>

        </form>

    </div>

@endsection
