<section class="search-task">
    <div class="search-task__wrapper">
        <form class="search-task__form" method="get" action="{{ route('users.search') }}">
            @include('front.tasks.performers.partials.category-filters')
            @include('front.tasks.performers.partials.optional-filters')
            @include('front.tasks.performers.partials.name-filter')
            <button class="button" type="submit">Искать</button>
        </form>
    </div>
</section>
