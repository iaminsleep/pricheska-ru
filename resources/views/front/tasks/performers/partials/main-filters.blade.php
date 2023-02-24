<div class="user__search-link">
    <p>Сортировать по:</p>
    <ul class="user__search-list">
        @foreach ($main_filters as $filter)
            <li class="user__search-item user__search-item--current">
                <a href="/search-user?{{ $filter['alias'] }}=on" class="link-regular">
                    {{ $filter['name'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
