@extends('layouts.main')

@section('title') {{ $news['title'] }} @parent @endsection

@section('content')
<div style="border: 1px solid green">
    <h2>{{ $news['title'] }}</h2>
    <p>{{ $news['author'] }} - {{ $news['create_at']->format('d-m-Y H:i') }}</p>
    <p>{!! $news['description'] !!}</p>
    <p>{{ $news['status'] }}</p>
</div>
@endsection
