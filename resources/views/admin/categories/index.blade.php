@extends('layouts.admin')

@section('content')

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список Категорий</h1>
    </div>

    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Добавить Категорию</a><br><br>

    <div class="table-responsive">

        @include('inc.message')

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Наименование</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Дата обновление</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <th scope="col" style="display: flex">
                        <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">
                            <button type="button" class="btn btn-primary btn-sm">Редактор</button>
                        </a> &nbsp;
                        <form method="post" action={{ route('admin.categories.destroy', [$category->id]) }}>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                    </th>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Записи не найдены!</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <br>

        {{ $categories->links() }}

    </div>

@endsection
