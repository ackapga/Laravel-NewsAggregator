@extends('layouts.main')

@section('title') {{ $news->title }} @parent @endsection

@section('content')
    <style>
        .containerNews {
            width: 100%;
            border: 1px solid gray;
        }

        .blackNews {
            padding: 1em;
            color: white;
            background-color: #212529;
            clear: left;
            text-align: center;
        }

        .article {
            border-left: 1px solid gray;
            padding: 1em;
        }

        .contentNews {
            display: flex;
        }

        .back {
            padding-left: 100px;
            padding-right: 100px;
        }
    </style>

    <div class="containerNews">

        <header class="blackNews d-flex justify-content-around">
            <span>Категория: {{ $news->category->title }}</span>
            <span>Статус: {{ $news->status }}</span>
            <span>Автор: {{ $news->author }}</span>
            <span>Дата создания: {{ $news->created_at }}</span>
        </header>

        <div class="article">
            <h3 style="text-align: center">{{ $news->title }}</h3>
            <hr>
            <div class="contentNews">
                @if(stristr($news->image, 'https://') === false)
                    <img class="bd-placeholder-img card-img-top" style="object-fit: cover; margin-right: 30px; margin-left: 30px; width: 300px; border-radius: 150px"
                         src="{{ Storage::disk('public')->url($news->image) }}" alt="{{ $news->title }}">
                @else
                    <img class="bd-placeholder-img card-img-top" style="object-fit: cover; margin-right: 30px; margin-left: 30px; width: 300px; border-radius: 150px"
                         src="{{ $news->image }}" alt="{{ $news->title }}">
                @endif

                <div style="text-align: center; display: flex; flex-direction: column">{!! $news->description !!}</div>

            </div>

        </div>

        <footer class="blackNews">
            <a href="{{ route('news.index') }}" class="btn btn-dark back">Назад</a>
        </footer>

    </div>


@endsection
