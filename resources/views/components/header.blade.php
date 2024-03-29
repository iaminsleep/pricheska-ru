<header class="page-header" style="background-color:#816450">
    <div class="main-container page-header__container">
        <div class="page-header__logo" style="height:70px; margin-left: 35px;">
            <a href="{{ route('home') }}">
                <img src="{{ asset('/public/assets/front/tasks/img/logo.png') }}" style="width: 100%;">
            </a>
        </div>
        <div class="header__nav" style="margin-left:10%">
            <ul class="header-nav__list site-list">
                <li class="site-list__item @if (Route::currentRouteName() === 'tasks.index') {{ 'site-list__item--active' }} @endif">
                    <a style="color: #ffffff !important; font-weight: normal"
                        href="{{ route('tasks.index') }}">Задания</a>
                </li>
                <li class="site-list__item @if (Route::currentRouteName() === 'users.index') {{ 'site-list__item--active' }} @endif">
                    <a style="color: #ffffff !important; font-weight: normal"
                        href="{{ route('users.index') }}">Парикмахеры</a>
                </li>
                @auth
                    @if (!auth()->user()->isHairdresser())
                        <li
                            class="site-list__item @if (Route::currentRouteName() === 'task.create') {{ 'site-list__item--active' }} @endif">
                            <a style="color: #ffffff !important; font-weight: normal"
                                href="{{ route('task.create') }}">Создать заказ</a>
                        </li>
                    @else
                        <li
                            class="site-list__item @if (Route::currentRouteName() === 'task.create') {{ 'site-list__item--active' }} @endif">
                            <a style="color: #ffffff !important; font-weight: normal"
                                href="{{ route('service.create') }}">Создать услугу</a>
                        </li>
                    @endif
                    <li class="site-list__item @if (Route::currentRouteName() === 'users.single') {{ 'site-list__item--active' }} @endif">
                        <a style="color: #ffffff !important; font-weight: normal"
                            href="{{ route('users.single', ['id' => auth()->id()]) }}">Мой
                            профиль</a>
                    </li>
                @endauth
                <li class="site-list__item  @if (Route::currentRouteName() === 'posts.index') {{ 'site-list__item--active' }} @endif">
                    <a style="color: #ffffff !important; font-weight: normal"
                        href="{{ route('posts.index') }}">Блог</a>
                </li>
            </ul>
        </div>
        @auth
            <div class="header__lightbulb @if (auth()->user()->unreadNotifications->count()) has-notifications @endif"
                @if (auth()->user()->unreadNotifications->count()) data-count="{{ auth()->user()->unreadNotifications->count() }}" @endif>
                <div class="lightbulb__pop-up">
                    <h3>Новые события</h3>
                    @forelse(auth()->user()->unreadNotifications as $notification)
                        <p class="lightbulb__new-task lightbulb__new-task--{{ $notification->data['type'] }}">
                            {{ $notification->data['message'] }}
                            <a href="{{ route('tasks.single', ['id' => $notification->data['task_id']]) }}"
                                class="link-regular">
                                «{{ $notification->data['task_name'] }}»
                            </a>
                        </p>
                    @empty
                        <p>У вас нет новых уведомлений!</p>
                    @endforelse
                    @if (auth()->user()->unreadNotifications->count())
                        <div class="read-button-container">
                            <a class="read-button" href="{{ route('notifications.read') }}">Пометить как прочитанные</a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="header__account">
                <a class="header__account-photo" style="width: 44px; height: 44px;">
                    <img src="{{ auth()->user()->getImage() }}" style="width: 100%; height: 100%; object-fit:cover"
                        alt="Аватар пользователя {{ auth()->user()->name }}">
                </a>
                <span class="header__account-name" style="font-weight: normal">
                    {{ auth()->user()->name }}
                </span>
            </div>
        @endauth
        @guest
            <div class="header__account--index guest">
                <a href="{{ route('login.create') }}" data-for="enter-form">
                    <span class="header__account-enter">Вход</span>
                </a> или
                <a href="{{ route('register.create') }}" class="header__account-registration">
                    Регистрация
                </a>
            </div>
        @endguest
        <div class="account__pop-up">
            <ul class="account__pop-up-list">
                <li>
                    <a href="{{ route('mylist.index') }}">Мои задания</a>
                </li>
                <li>
                    <a href="{{ route('account.index') }}">Настройки</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">Выход</a>
                </li>
            </ul>
        </div>
    </div>
</header>
