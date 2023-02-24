<div class="account__input account__input--name">
    <label for="202">Город</label>
    <select class="multiple-select input multiple-select-big" size="1" id="202" name="city_id">
        @foreach ($cities as $city)
            <option value="{{ $city->id }}" @if ((int) $user->city_id === $city->id) selected @endif>
                {{ $city->name }}
            </option>
        @endforeach
    </select>
</div>
