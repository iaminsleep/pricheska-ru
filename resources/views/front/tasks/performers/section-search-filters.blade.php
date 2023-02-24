<section class="search-task">
    <div class="search-task__wrapper">
        <form class="search-task__form" method="get" action="{{ route('user.search') }}">
            @include('performers.partials.category-filters')
            @include('performers.partials.optional-filters')
            @include('performers.partials.name-filter')
            <button class="button" type="submit">Искать</button>
        </form>
    </div>
</section>
