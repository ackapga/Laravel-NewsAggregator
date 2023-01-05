<style>
    .fon:hover {
        color: #d9d9d9;
    }

    .img_little {
        object-fit: cover;
        width: 40px;
        margin-right: 10px;
        border-radius: 25px;
        border: 1px solid rgba(128, 128, 128, 0.18);
    }

    .img_cat_little {
        object-fit: cover;
        width: 40px;
        margin-right: 10px;
        border-radius: 20px;
        border: 1px solid rgba(128, 128, 128, 0.18);
    }
</style>
<header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">

            <a href="/" class="navbar-brand d-flex align-items-center fon">
                <strong>&#9776; NewsAggregator</strong>
            </a>

            <ul class="navbar-nav ms-auto">
                <div style="display: flex;">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Авторизация') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item" style="padding-left: 10px">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                            </li>
                        @endif
                    @else
                </div>

                <div style="display: flex">

                    @if(Auth::user()->avatar == null)
                        <img class="img_cat_little" src="https://b3.dd.icdn.ru/m/mink_blue/6/imgsrc.ru_74126546vFm.webp"
                             alt="CAT">
                    @elseif(stristr(Auth::user()->avatar , 'https://') === false)
                        <img class="img_little" src="{{ Storage::disk('public')->url(Auth::user()->avatar) }}"
                             alt="DISK">)
                    @elseif(Auth::user()->avatar)
                        <img class="img_little" src="{{ Auth::user()->avatar }}" alt="AVATAR">
                    @endif

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"
                             style="position: absolute; z-index: 1">
                            @if(Auth::user()->is_admin === true)
                                <a class="dropdown-item" href="{{ route('admin.resources.index') }}">Админка</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('account') }}">Кабинет</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Выйти') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>
                </div>
                @endguest
            </ul>

        </div>
    </div>
</header>
