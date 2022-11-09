<header class="market-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{ route('posts.index') }}"><img
                    src="{{ asset('public/assets/front/blog/images/version/market-logo.png') }}" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Блоги</a>
                    </li>
                </ul>
                <form class="form-inline" method="get" action="{{ route('search') }}">
                    <input name="search" class="form-control mr-sm-2 @error('search') is-invalid @enderror"
                        type="text" placeholder="How may I help?" required>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                @auth
                    <div class="header__account">
                        <a class="header__account-photo">
                            <img src="/img/avatars/{{ auth()->user()->avatar }}" width="43" height="44"
                                alt="Аватар пользователя {{ auth()->user()->name }}">
                        </a>
                        <span class="header__account-name">
                            {{ auth()->user()->name }}
                        </span>
                    </div>
                @endauth
                @guest
                    <div class="header__account--index guest">
                        <a href="{{ route('login.create') }}" class="header__account-registration">
                            Войти
                        </a>
                    </div>
                @endguest
            </div>
        </nav>
    </div><!-- end container-fluid -->

    <style>
        .market-header .form-inline .form-control.is-invalid {
            border: 2px solid red;
        }
    </style>
</header><!-- end market-header -->
