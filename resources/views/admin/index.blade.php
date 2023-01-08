@extends('layouts.admin')
@section('content')

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Панель управление</h4>
        <div style="position: fixed; margin-left: 20%; margin-top: 10px">@include('inc.message')</div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm" style="margin-bottom: 1px">
            <thead>
            <tr>
                <th scope="col" style="padding-left: 7%">RSS URL - Список</th>
                <th scope="col">Статус</th>
                <th scope="col" style="padding-left: 3%">Дата добавления</th>
                <th scope="col" style="padding-left: 3%">Дата обновление</th>
                <th scope="col">Удаление</th>
            </tr>
            </thead>

            <tbody style="border: 2px solid #dde1e5">
            @forelse($resources as $url)
                <tr>
                    <td>
                        <form style="display: flex; padding-left: 5%" method="post"
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
                    <td>
                        <style>
                            .td_style {
                                font-weight: bolder;
                                padding-top: 7px;
                                padding-left: 5px;
                            }

                            .new {
                                color: #16eb16;
                                text-shadow: 0 0 10px orange;
                                animation-name: new;
                                animation-duration: 4s;
                                animation-iteration-count: 10;
                                animation-direction: alternate-reverse;
                            }

                            .used {
                                color: red;
                                text-shadow: 0 0 10px orange;
                                animation-name: new;
                                animation-duration: 4s;
                                animation-iteration-count: 10;
                                animation-direction: alternate-reverse;
                            }

                            .update {
                                color: blue;
                                text-shadow: 0 0 10px orange;
                                animation-name: new;
                                animation-duration: 4s;
                                animation-iteration-count: 10;
                                animation-direction: alternate-reverse;
                            }

                            @keyframes new {
                                0% {
                                    text-shadow: 0 0 5px orange;
                                }
                                25% {
                                    text-shadow: 0 0 10px orange;
                                }
                                50% {
                                    text-shadow: 0 0 15px orange;
                                }
                                75% {
                                    text-shadow: 0 0 20px orange;
                                }
                                100% {
                                    text-shadow: 0 0 25px orange;
                                }
                            }

                        </style>
                        @if($url->status == \App\Models\Resources::NEW)
                            <p class="td_style new">{{ $url->status }}</p>
                        @elseif($url->status == \App\Models\Resources::USED)
                            <p class="td_style used">{{ $url->status }}</p>
                        @elseif($url->status == \App\Models\Resources::UPDATE)
                            <p class="td_style update">{{ $url->status }}</p>
                        @endif
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
    </div>

    <div
        style="background-color: #f1f1f1; padding: 5px; border: 2px solid #dde1e5; display: flex; justify-content: space-between">
        <form method="post" action="{{ route('admin.resources.store') }}">
            @csrf
            <div style="display: flex; margin-right: 10px;">
                <input type="text" class="form-control" style="margin-right: 1%; margin-left: 8%; width: 65vh"
                       name="urlName" id="urlName"
                       value="{{ old('urlName') }}" placeholder="Добавить новый URL RSS">
                <button class="btn btn-success" type="submit">+Добавить</button>
            </div>
        </form>
        <a href="{{ route('admin.parser') }}" class="btn btn-info"
           style="width: 70vh; margin-right: 10vh; color: white">
            Добавить в очередь
        </a>
    </div>

    <hr>
    <br>

    <div style="display: flex; flex-direction: column">
        <a href="{{ route('admin.queue.index') }}" class="btn btn-secondary">
            Запустить очереди и остановить после выполнения!
        </a>

        <br>

        <a href="{{ route('admin.queue.create') }}" class="btn btn-warning" onclick="ask()">
            Запустить очереди в фоновом режиме!
        </a>

    </div>

    <br>
    <hr>

    <div style="display: flex; flex-direction: column">
        <h5>Мониторинг очередей:</h5>

        <style>
            .display {
                display: flex;
            }

            .pr {
                padding-right: 20px;
            }

            .pr2 {
                padding-right: 36px;
            }

            .w_href {
                color: black;
                text-decoration: none;
                animation-name: example;
                animation-duration: 10s;
                animation-direction: reverse;
            }

            @keyframes example {
                0% {
                    color: black;
                }
                25% {
                    color: orange;
                }
                50% {
                    color: red;
                }
                100% {
                    color: black;
                }
            }

            .w_href:hover {
                color: white;
                text-shadow: 0px 0px 2px black;
            }
        </style>

        <div
            style="border: 1px solid grey; padding: 10px; display: block; white-space: nowrap; overflow: hidden; margin-bottom: 3px; overflow-x: auto">
            <div class="display">
                <h6 class="pr">RSS URL В очереди:</h6>
                <a href="{{ route('admin.job')}}" class="w_href">Очистить список &#10805;</a>
            </div>

            @foreach($job as $js)
                <p style="text-overflow: ellipsis">{{ $js }}</p>
            @endforeach
        </div>

        <div
            style="border: 1px solid grey; padding: 10px; display: block; white-space: nowrap; overflow: hidden; overflow-x: auto">
            <div class="display">
                <h6 class="pr2">RSS URL Ошибки:</h6>
                <a href="{{ route('admin.jobFail')}}" class="w_href">Очистить список &#10805;</a>
            </div>
            @foreach($jobFailed as $jf)
                <p style="text-overflow: ellipsis">{{ $jf }}</p>
            @endforeach
        </div>


    </div>

    <br>
    <hr>
    <br>

    <script>
        function ask() {
            confirm('Очередь запушена! Рекомендуется обновить страницу.')
        }
    </script>


    @php
        Storage::disk('public')->url(Auth::user()->avatar)
    @endphp
@endsection
