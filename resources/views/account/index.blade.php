@extends('layouts.main')

@section('title')Account: {{ Auth::user()->name }}  @endsection

@section('content')
    <style>
        .back {
            background: linear-gradient(to top, white, #fcd43b);
            display: flex;
            justify-content: space-around;
            padding: 30px;
        }

        .title {
            text-shadow: black;
            color: gray;
        }

        .href {
            text-decoration: none;
            color: white;
            padding: 7px;
            background-color: #383838;
            border: 2px solid gray;
            border-radius: 15px;
        }

        .href:hover {
            color: white;
            background-color: #262626;
            box-shadow: black;
        }
    </style>

    <div class="back">
        <h2 class="title">Welcome {{ Auth::user()->name }} </h2>

        @if(Auth::user()->is_admin === true)
            <h5>
                <a href="{{ route('admin.index') }}" class="href">&#10048; &nbsp;GO TO ADMIN </a>
            </h5>
        @endif
    </div>
@endsection
