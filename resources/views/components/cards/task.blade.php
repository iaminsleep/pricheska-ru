<div class="new-task__card">
    <div class="new-task__title">
        <a href="{{ route('tasks.single', ['id' => $task->id]) }}" class="link-regular">
            <h2>{{ $task->title }}</h2>
        </a>
        <form method="get" action="{{ route('task.search') }}">
            <a class="new-task__type link-regular" onclick="this.closest('form').submit()">
                <p>{{ $task->category->title }}</p>
                <input type="hidden" name="category_id" value="{{ $task->category->id }}" />
            </a>
        </form>
    </div>
    <div style="width:100px; height:100px;">
        <img style='height: 100%; width: 100%; object-fit: contain' src="{{ $task->getImage() }}"
            alt="{{ $task->title }}" />
    </div>
    <p class="new-task_description">{{ $task->description }}</p>
    <b class="new-task__price new-task__price--translation">{{ $task->budget }}<b> ₽</b></b>
    <span class="new-task__time"
        style="margin-bottom: 20px;">{{ Carbon\Carbon::parse($task->created_at)->diffForHumans() }}</span>
</div>
