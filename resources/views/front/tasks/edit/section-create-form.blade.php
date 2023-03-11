<form class="create__task-form form-create" method="post" action="{{ route('task.update', ['id' => $task->id]) }}"
    enctype="multipart/form-data" id="task-form">
    @include('front.tasks.edit.partials.task-title')
    @include('front.tasks.edit.partials.task-description')
    @include('front.tasks.edit.partials.task-category')
    @include('front.tasks.edit.partials.task-address')
    <div class="create__price-time">
        @include('front.tasks.edit.partials.task-budget')
        @include('front.tasks.edit.partials.task-deadline')
    </div>
    <label for="16">Превью</label>
    <input id="16" class="" type="file" name="image" value="{{ $task->image }}" />
    <span style="margin-top:10px; margin-bottom: 20px;">Выберите изображение</span>
    <div class="form-group">
        <label for="tags">Тэги</label>
        <select name="tags[]" id="tags" class="select2" multiple="multiple" data-placeholder="Выберите тэги"
            style="width: 100%;">
            @foreach ($tags as $key => $value)
                <option value="{{ $key }}" @if (in_array($key, $task->tags->pluck('id')->all())) selected @endif>
                    {{ $value }}</option>
            @endforeach
        </select>
    </div>
    @csrf
    @method('PUT')
</form>
