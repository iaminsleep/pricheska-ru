<label class="search-task__name" for="period">Время выполнения</label>
<select class="multiple-select input" id="period" size="1" name="time">
    <option disabled selected>Без периода</option>
    @foreach ($time_filters as $time_filter)
        <option value="{{ $time_filter['alias'] }}">{{ $time_filter['name'] }}</option>
    @endforeach
</select>
