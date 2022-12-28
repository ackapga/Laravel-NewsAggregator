@extends('layouts.admin')
@section('content')

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Список: URL RSS Ресурсов</h4>
        <div style="position: fixed; margin-left: 20%; margin-top: 10px">@include('inc.message')</div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col" style="padding-left: 7%">RSS URL</th>
                <th scope="col" style="padding-left: 3%">Дата добавления</th>
                <th scope="col" style="padding-left: 3%">Дата обновление</th>
                <th scope="col">Удаление</th>
            </tr>
            </thead>

            <tbody style="border: 2px solid #dde1e5">
            @forelse($resources as $url)
                <tr>
                    <td>{{ $url->id }}</td>
                    <td>
                        <form style="display: flex" method="post"
                              action="{{ route('admin.resources.update', [$url]) }}">
                            @csrf
                            @method('put')
                            <label for="urlName"></label>
                            <input style="display: none" name="id" id="id" value="{{ $url->id }}">
                            <input type="text" class="form-control" name="urlName" id="urlName"
                                   value="{{ $url->urlName }}">
                            &nbsp;&nbsp;&nbsp;
                            <button type="submit" class="btn btn-primary btn-sm">Редактировать</button>
                        </form>
                    </td>
                    <td style="padding-left: 3%">{{ $url->created_at }}</td>
                    <td style="padding-left: 3%">{{ $url->updated_at }}</td>
                    <th>
                        <form method="post" action="{{ route('admin.resources.destroy', [$url->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </th>
                </tr>
            @empty
                <tr>
                    <td colspan="5">URL RSS - Записей нет!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <a href="{{route('admin.parser')}}" class="btn btn-info"
           style="display: flex; flex-direction: column; margin-right: 50%; margin-bottom: 15px;">
            Парсит новости
        </a>
    </div>

    <div style="background-color: #f1f1f1; padding: 5px; border: 2px solid #dde1e5">
        <form method="post" action="{{ route('admin.resources.store') }}">
            @csrf
            <div style="display: flex; margin-right: 50%;">
                <input type="text" class="form-control" style="margin-right: 1%" name="urlName" id="urlName"
                       value="{{ old('urlName') }}" placeholder="Добавить новый URL RSS">
                <button class="btn btn-success" type="submit">Добавить</button>
            </div>
        </form>
    </div>

    <br>
    <hr>

@endsection
