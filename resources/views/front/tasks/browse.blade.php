@include('include.header')
    <main class="page-main">
        <div class="main-container page-container">
            <section class="new-task">
                <div class="new-task__wrapper">
                    <h1>Новые задания</h1>
                    @foreach($tasks as $task)
                        <x-task :task="$task"></x-task>
                    @endforeach
                <div class="new-task__pagination">
                    <ul class="new-task__pagination-list">
                        <li class="pagination__item"><a href="#"></a></li>
                        <li class="pagination__item pagination__item--current">
                            <a>1</a></li>
                        <li class="pagination__item"><a href="#">2</a></li>
                        <li class="pagination__item"><a href="#">3</a></li>
                        <li class="pagination__item"><a href="#"></a></li>
                    </ul>
                </div>
            </section>
            <section  class="search-task">
                <div class="search-task__wrapper">
                    <form class="search-task__form" name="test" method="post" action="#">
                        <fieldset class="search-task__categories">
                            <legend>Категории</legend>
                            @foreach($categories as $category)
                                <input class="visually-hidden checkbox__input" id="{{ $category->id }}" type="checkbox" name="{{ $category->alias }}" value="{{ $category->id }}" checked>
                                <label for="{{ $category->id }}">{{ $category->name }}</label>
                            @endforeach
                        </fieldset>
                        <fieldset class="search-task__categories">
                            <legend>Дополнительно</legend>
                            <input class="visually-hidden checkbox__input" id="6" type="checkbox" name="" value="">
                            <label for="6">Без откликов</label>
                           <input class="visually-hidden checkbox__input" id="7" type="checkbox" name="" value="" checked>
                            <label for="7">Удаленная работа </label>
                        </fieldset>
                       <label class="search-task__name" for="8">Период</label>
                           <select class="multiple-select input" id="8"size="1" name="time[]">
                            <option value="day">За день</option>
                            <option selected value="week">За неделю</option>
                            <option value="month">За месяц</option>
                        </select>
                        <label class="search-task__name" for="9">Поиск по названию</label>
                            <input class="input-middle input" id="9" type="search" name="q" placeholder="">
                        <button class="button" type="submit">Искать</button>
                    </form>
                </div>
            </section>
        </div>
    </main>
@guest
    @include('auth.signin')
@endguest
@include('include.footer')
