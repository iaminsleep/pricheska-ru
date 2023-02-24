<div class="warning-item warning-item--error">
    <h2>Ошибки заполнения формы</h2>
    @foreach ($errors_array as $error)
        @error($error['alias'])
            <h3>{{ $error['name'] }}</h3>
            <p>{{ $errors->first($error['alias']) }}<br>
            @enderror
    @endforeach
</div>
