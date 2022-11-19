@extends('layouts.admin')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список Новостей</h1>
    </div>

    <a href="{{ route('admin.news.create') }}" class="btn btn-primary"> Добавить Категорию</a><br><br>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Наименование</th>
                <th scope="col">Автор</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $key => $news)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $news['title'] }}</td>
                <td>{{ $news['author'] }}</td>
                <td>{{ $news['status'] }}</td>
                <td>{{ $news['create_at']->format('d-m-Y H:i') }}</td>
                <td><a href="{{ route('admin.news.edit', ['news' => $key])}}"><button type="button" class="btn btn-primary btn btn-sm">Редактировать</button></a>
                    &nbsp;
                    <a href=""><button type="button" class="btn btn-danger btn-sm">Удалить</button></a>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="6">Записи не найдены!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
