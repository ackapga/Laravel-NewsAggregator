@extends('layouts.main')
@section('content')
    <div class="offset-2" style="
    background: linear-gradient(to top, white, #fcd43b);
    display: flex;
    justify-content: space-around;
    padding: 30px;
">
        <h2>Welcome {{ Auth::user()->name }}</h2>

        @if(Auth::user()->is_admin === true)
            <h5>
                <a href="{{ route('admin.index') }}"
                   style="
               text-decoration: none;
               color: gray;

                        ">GO IN ADMIN</a>
            </h5>
        @endif
    </div>
@endsection
