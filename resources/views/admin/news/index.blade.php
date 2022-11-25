@extends('layouts.admin')

@section('content')

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список Новостей</h1>
    </div>

    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Добавить Новость</a><br><br>

    <div class="table-responsive">

        @include('inc.message')

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ID_Category</th>
                <th scope="col">Наименование</th>
                <th scope="col">Автор</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Дата обновление</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)
                <tr>
                    <td>{{ $news->id }}</td>
                    <td>{{ $news->category_id }}</td>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->author }}</td>
                    <td>{{ $news->status }}</td>
                    <td>{{ $news->created_at}}</td>
                    <td>{{ $news->updated_at}}</td>
                    <td>
                        <a href="{{ route('admin.news.edit', ['news' => $news->id])}}"
                           class="btn btn-primary btn btn-sm">Редактировать</a>
                        &nbsp;
                        <a href=""
                           class="btn btn-danger btn-sm">Удалить</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Записи не найдены!</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $newsList->links() }}

    </div>

@endsection
