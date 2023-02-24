<fieldset class="search-task__categories">
    <legend>Дополнительно</legend>
    @foreach ($optional_filters as $optional_filter)
        <input class="visually-hidden checkbox__input" id="{{ $optional_filter['alias'] }}" type="checkbox"
            name="{{ $optional_filter['alias'] }}" />
        <label for="{{ $optional_filter['alias'] }}">{{ $optional_filter['name'] }}</label>
    @endforeach
</fieldset>
