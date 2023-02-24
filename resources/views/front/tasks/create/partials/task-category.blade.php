<label for="12">Категория</label>
<select class="multiple-select input multiple-select-big" id="12" size="1" name="category_id">
    @foreach ($categories as $category)
        <option value="{{ $category->id }}" @if ((int) old('category_id') === $category->id) selected @endif>
            {{ $category->name }}
        </option>
    @endforeach
</select>
<span>Выберите категорию</span>
