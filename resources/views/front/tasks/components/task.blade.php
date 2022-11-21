<div class="new-task__card">
    <div class="new-task__title">
        <a href="{{ route('tasks.single', ['id' => $task->id]) }}" class="link-regular">
            <h2>{{ $task->title }}</h2>
        </a>
        <a class="new-task__type link-regular" href="">
            <p>{{ $task->category->title }}</p>
        </a>
    </div>
    <div class="new-task__icon new-task__icon--{{ $task->category->slug }}"></div>
    <p class="new-task_description">{{ $task->description }}</p>
    <b class="new-task__price new-task__price--translation">{{ $task->budget }}<b> ₽</b></b>
    <span class="new-task__time">4 часа назад</span>
</div>
