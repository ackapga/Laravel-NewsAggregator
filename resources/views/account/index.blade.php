@extends('layouts.main')

@section('title')Account: {{ Auth::user()->name }}  @endsection

@section('content')
    <style>
        .back-yellow {
            background: linear-gradient(to top, white, #fcd43b);
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

        .img {
            width: 20vh;
            border-radius: 100px;
            box-shadow: 0 0 25px grey;
            border: 2px solid rgba(255, 255, 164, 0.2);
        }

        .img_cat {
            width: 20vh;
            border-radius: 100px;
            box-shadow: 0 0 25px grey;
            border: 2px solid rgba(255, 255, 164, 0.2);
        }

        .text {
            text-align: center;
        }

        .head {
            border: 1px solid black;

            display: flex;
            justify-content: space-around;
            padding: 30px;
            align-items: center;
        }

    </style>

    <div class="back-yellow">

        <div class="head">
            @if(Auth::user()->avatar)
                <img class="img" src="{{ Auth::user()->avatar }}" alt="avatar">
            @else
                <img class="img_cat" src="https://b3.dd.icdn.ru/m/mink_blue/6/imgsrc.ru_74126546vFm.webp" alt="">
            @endif

            <div class="text">
                <h2 class="title">Добро пожаловать </h2>
                <h2 class="title">{{ Auth::user()->name }} </h2>
            </div>

            @if(Auth::user()->is_admin === true)
                <h5 class="h5_text">
                    <a href="{{ route('admin.index') }}" class="href">&#10048; &nbsp;GO TO ADMIN </a>
                </h5>
            @else
                <h5 class="h5_text">
                    <a href="/" class="href">&nbsp; NewsAggregator &nbsp;</a>
                </h5>
            @endif
        </div>

    </div>
@endsection
