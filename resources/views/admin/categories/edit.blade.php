@extends('layouts.admin')

@section('content')

    <div class="offset-2 col-8">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
            <h1 class="h2">Редактировать Категорий</h1>
        </div>

        @include('inc.message')

        <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">

            @csrf

            @method('put')

            <div class="form-group">
                <lable for="title">Заголовок</lable>
                <input type="text" class="form-control" name="title" id="title" value="{{ $category->title }}">
                @error('title') <span style="color: red">{{ $message }}</span> @enderror
            </div>

            <br>

            <div class="form-group">
                <lable for="description">Описание</lable>
                <textarea class="form-control" name="description" id="description">{!! $category->description !!}</textarea>
                @error('description') <span style="color: red">{{ $message }}</span> @enderror
            </div>

            <br>

            <button class="btn btn-success" type="submit">Сохранить</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Назад</a>

        </form>

    </div>

@endsection

@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
