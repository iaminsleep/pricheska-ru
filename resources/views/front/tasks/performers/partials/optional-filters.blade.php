<fieldset class="search-task__categories">
    <legend>Дополнительно</legend>
    @foreach ($optional_filters as $filter)
        <input class="visually-hidden checkbox__input" id="{{ $filter['alias'] }}" type="checkbox"
            name="{{ $filter['alias'] }}">
        <label for="{{ $filter['alias'] }}">{{ $filter['name'] }}</label>
    @endforeach
    @auth
        <input class="visually-hidden checkbox__input" id="in_favourites" type="checkbox" name="in_favourites">
        <label for="in_favourites">В избранном</label>
    @endauth
</fieldset>
