@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список Категорий</h1>
</div>

<a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Добавить Категорию</a><br><br>

@endsection
