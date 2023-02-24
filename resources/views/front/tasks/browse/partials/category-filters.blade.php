<fieldset class="search-task__categories">
    <legend>Категории</legend>
    @foreach ($categories as $category)
        <input class="visually-hidden checkbox__input" id="{{ $category->id }}" type="checkbox" name="category[]"
            value="{{ $category->id }}" />
        <label for="{{ $category->id }}">{{ $category->title }}</label>
    @endforeach
</fieldset>
