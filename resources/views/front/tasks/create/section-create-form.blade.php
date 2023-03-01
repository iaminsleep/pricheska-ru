<form class="create__task-form form-create" method="post" action="{{ route('task.store') }}" enctype="multipart/form-data"
    id="task-form">
    @include('front.tasks.create.partials.task-title')
    @include('front.tasks.create.partials.task-description')
    @include('front.tasks.create.partials.task-category')
    @include('front.tasks.create.partials.task-address')
    <div class="create__price-time">
        @include('front.tasks.create.partials.task-budget')
        @include('front.tasks.create.partials.task-deadline')
    </div>
    <label for="16">Превью</label>
    <input id="16" class="" type="file" name="image" value="{{ old('image') }}" />
    <span style="margin-top:10px; margin-bottom: 20px;">Выберите изображение</span>
    <div class="form-group">
        <label for="tags">Тэги</label>
        <select name="tags[]" id="tags" class="select2" multiple="multiple" data-placeholder="Выберите тэги"
            style="width: 100%;">
            @foreach ($tags as $key => $value)
                <option value="{{ $key }}" @if (old('tags') && in_array($key, old('tags'))) selected @endif>
                    {{ $value }}</option>
            @endforeach
        </select>
    </div>
    @csrf
</form>
