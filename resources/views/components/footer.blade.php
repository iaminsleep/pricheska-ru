<footer class="page-footer">
    <div class="main-container page-footer__container">
        <div class="page-footer__info">
            <p class="page-footer__info-copyright"
                @if (Request::is('blog/*') || Request::is('blog')) style="color: white;
font-family: 'Roboto', sans-serif !important;
font-weight: 300;
font-size: 12px;
line-height: 19px; margin-bottom: 1rem" @endif>
                © 2023, ООО «Причёска.ру»
                Все права защищены
            </p>
            <p class="page-footer__info-use"
                @if (Request::is('blog/*') || Request::is('blog')) style="color: white;
font-family: 'Roboto', sans-serif !important;
font-weight: 300;
font-size: 12px;
line-height: 19px; margin-bottom: 1rem" @endif>
                «Причёска.ру» — это сервис для поиска парикмахеров на разовые стрижки.
                mail@pricheskaru.com
            </p>
        </div>
        <div class="page-footer__links">
            <ul class="links__list">
                <li class="links__item">
                    <a href="{{ route('tasks.index') }}">Задания</a>
                </li>
                @auth
                    <li class="links__item">
                        <a href="{{ route('users.single', ['id' => auth()->id()]) }}">Мой профиль</a>
                    </li>
                @endauth
                <li class="links__item">
                    <a href="{{ route('users.index') }}">Парикмахеры</a>
                </li>
                <li class="links__item">
                    <a href="{{ route('task.create') }}">Создать задание</a>
                </li>
                <li class="links__item">
                    <a href="{{ route('posts.index') }}">Блог</a>
                </li>
            </ul>
        </div>
    </div>
</footer>
