<div class="landing-task">
    <div class="landing-task-top task-{{ $task->category->alias }}"></div>
    <div class="landing-task-description">
        <h3 class="crop">
            <a href="{{ route('task.page', ['id' => $task->id]) }}" class="link-regular">
                {{ $task->title }}
            </a>
        </h3>
        <p class="crop">{{ $task->description }}</p>
    </div>
    <div class="landing-task-info">
        <div class="task-info-left">
            <p>
                <a href="/search?category_id={{ $task->category_id }}" class="link-regular">
                    {{ $task->category->name }}
                </a>
            </p>
            <p>
                {{ Carbon\Carbon::parse($task->created_at)->shiftTimezone($timezone)->diffForHumans() }}
            </p>
        </div>
        <span>{{ $task->budget }} <b>₽</b></span>
    </div>
</div>
