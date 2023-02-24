<div class="search-task__categories account_checkbox--bottom">
    @foreach ($categories as $category)
        <input class="visually-hidden checkbox__input" id="{{ $category->alias }}" type="checkbox" name="specialization[]"
            value="{{ $category->id }}" @if ($user->specialization && in_array($category->id, json_decode($user->specialization, true))) checked @endif>
        <label for="{{ $category->alias }}">{{ $category->name }}</label>
    @endforeach
</div>
