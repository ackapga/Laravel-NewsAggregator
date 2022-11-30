<header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">

            <a href="/" class="navbar-brand d-flex align-items-center">
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

                    <li>
                        <img src="" alt="" style="height: 30px; width: 30px; background-color: red; margin-right: 20px; margin-top: 4px; border-radius: 15px">
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"
                             style="position: absolute; z-index: 1">
                            @if(Auth::user()->is_admin === true)
                                <a class="dropdown-item" href="{{ route('admin.index') }}">Админка</a>
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
