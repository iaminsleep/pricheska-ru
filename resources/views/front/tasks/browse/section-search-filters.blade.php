<section class="search-task">
    <div class="search-task__wrapper">
        <form class="search-task__form" method="get" action="{{ route('task.search') }}">
            @include('front.tasks.browse.partials.category-filters')
            @include('front.tasks.browse.partials.optional-filters')
            @include('front.tasks.browse.partials.time-filters')
            @include('front.tasks.browse.partials.name-filter')
            <button class="button" type="submit">Искать</button>
        </form>
    </div>
</section>
