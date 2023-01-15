@extends('layouts.admin')

@section('content')

    <div
        class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Список Новостей</h2>
        <p style="margin-left: 15%; padding: 10px; background-color: #0d6efd; color: white; border-radius: 15px">Общее
            количество новостей: {{ $number }}</p>
        <div style="position: absolute; width: 80%">
            @include('inc.message')
        </div>
    </div>

    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Добавить Новость</a><br><br>

    <div class="table-responsive">

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Наименование</th>
                <th scope="col">Категория</th>
                <th scope="col">Автор</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Дата обновление</th>
                <th scope="col">Управление</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)
                <tr style="border-left: 1px solid #dde1e5; border-right: 1px solid #dde1e5;">
                    <td>{{ $news->id }}</td>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->category->title }}</td>
                    <td>{{ $news->author }}</td>
                    <td>{{ $news->status }}</td>
                    <td>{{ $news->created_at}}</td>
                    <td>{{ $news->updated_at}}</td>
                    <td>
                        <a href="{{ route('admin.news.edit', ['news' => $news->id]) }}">
                            <button type="button" class="btn btn-primary btn-sm">Редактор</button>
                        </a>
                    </td>
                    <td>
                        <form method="post" action={{ route('admin.news.destroy', [$news->id]) }}>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <style>
                    .haveNotDiv {
                        border: 1px solid #dde1e5;
                        overflow-x: hidden;
                    }

                    .haveNot {
                        padding-top: 1%;
                        font-weight: bold;
                        position: relative;
                        animation: example 10s infinite alternate;
                    }

                    @keyframes example {
                        from {
                            left: 10%;
                            color: black
                        }
                        to {
                            left: 75%;
                            color: red
                        }
                    }
                </style>
                <tr>
                    <td colspan="9" class="haveNotDiv">
                        <h5 class="haveNot">Записи не найдены!</h5>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <br>

    </div>

@endsection
