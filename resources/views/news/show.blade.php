@extends('layouts.main')

@section('title') {{ $news->title }} @parent @endsection

@section('content')
<div style="border: 1px solid green">
    <h2>{{ $news->title }}</h2>
    <p>{{ $news->author }} - {{ $news->created_at }}</p>
    <p>{!! $news->description !!}</p>
    <p>{{ $news->status }}</p>
    <a href="{{ route('news.index') }}" class="btn btn-success" style="float: right">Назад</a>

</div>

@endsection
