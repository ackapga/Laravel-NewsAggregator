@extends('layouts.main')

@section('title') Новости @parent @endsection

@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse($newsList as $news)

            <div class="col">
                <div class="card shadow-sm">
                    @if(stristr($news->image, 'https://') === false)
                        <img class="bd-placeholder-img card-img-top" width="100%" height="225" style="object-fit: cover"
                             src="{{ Storage::disk('public')->url($news->image) }}" alt="{{ $news->title }}">
                    @else
                        <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                             src="{{ $news->image }}" alt="{{ $news->title }}">
                    @endif

                    <div class="card-body">
                        <h5 class="text-reset">{{ $news->title }}</h5>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">Категория:</small>
                            <small>{{ $news->category->title }}</small>
                        </div>
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">Статус:</small>
                            <small>{{ $news->status }}</small>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('news.show', ['id' => $news->id]) }}" type="button"
                                   class="btn btn-sm btn-outline-secondary">Смотреть подробнее</a>
                            </div>
                            <small class="text-muted">{{ $news->author }}
                                <br>
                                ({{ $news->created_at }})
                            </small>
                        </div>
                    </div>
                </div>
            </div>

        @empty
            <h1>Записей нет!</h1>
        @endforelse
    </div>

    <br>
    <hr>

    {{ $newsList->links() }}

@endsection
