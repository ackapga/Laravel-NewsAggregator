@extends('layouts.admin')

@section('content')

    <div class="offset-2 col-8">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
            <h1 class="h2">Добавить Заметку</h1>
        </div>

        @include('inc.message')

        <form method="post" action="{{ route('admin.notes.store') }}" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <lable for="title">Название</lable>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                @error('title') <span style="color: red">{{ $message }}</span> @enderror
            </div>


            <div class="form-group">
                <lable for="content">Cодержание</lable>
                <textarea class="form-control" name="content" id="content">{!! old('content') !!}</textarea>
                @error('content') <span style="color: red">{{ $message }}</span> @enderror
            </div>

            <br>

            <button class="btn btn-success" type="submit" style="padding-left: 40px; padding-right: 40px">Сохранить</button>
            <a href="{{ route('admin.resources.index') }}" class="btn btn-danger">Отменить</a>

        </form>

    </div>

@endsection

@push('js')
    <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
    </script>
@endpush
