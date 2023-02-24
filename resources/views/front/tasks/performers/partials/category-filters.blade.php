<fieldset class="search-task__categories">
    <legend>Категории</legend>
    @foreach ($categories as $category)
        <input class="visually-hidden checkbox__input" id="{{ $category->id }}" type="checkbox" name="specialization[]"
            value="{{ $category->id - 1 }}" />
        <label for="{{ $category->id }}">{{ $category->name }}</label>
    @endforeach
</fieldset>
