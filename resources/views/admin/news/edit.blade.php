@extends('layouts.admin')

@section('content')

    <div class="offset-2 col-8">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
            <h1 class="h2">Редактировать Новость</h1>
        </div>

        @include('inc.message')

        <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}" enctype="multipart/form-data">

            @csrf

            @method('put')

            <div class="form-group">
                <lable for="category_id">Выбрать Категорию</lable>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="0">Выбрать Категорию</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @if($news->category_id === $category->id) selected @endif>{{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category_id') <span style="color: red">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <lable for="title">Наименование</lable>
                <input type="text" class="form-control" name="title" id="title" value="{{ $news->title }}">
                @error('title') <span style="color: red">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <lable for="author">Автор</lable>
                <input type="text" class="form-control" name="author" id="author" value="{{ $news->author }}">
                @error('author') <span style="color: red">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <lable for="Status">Статус</lable>
                <select class="form-control" name="status" id="status">
                    <option @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if($news->status === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
            </div>

            <div class="form-group">
                <lable for="image">Изображение</lable>
                <input type="file" class="form-control" name="image" id="image">
            </div>

            <div class="form-group">
                <lable for="description">Описание</lable>
                <textarea class="form-control" name="description" id="description">{!! $news->description !!}</textarea>
                @error('description') <span style="color: red">{{ $message }}</span> @enderror
            </div>

            <br>

            <button class="btn btn-success" type="submit">Сохранить</button>
            <a href="{{ route('admin.news.index') }}" class="btn btn-primary">Назад</a>

        </form>

    </div>

@endsection
