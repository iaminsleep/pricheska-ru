<div class="new-task__card">
    <div class="new-task__title">
        <a href="{{ route('tasks.single', ['id' => $task->id]) }}" class="link-regular">
            <h2>{{ $task->title }}</h2>
        </a>
        <a class="new-task__type link-regular" href="/search-task?category_id={{ $task->category->id }}">
            <p>{{ $task->category->title }}</p>
        </a>
    </div>
    <div class="task-status {{ $task->status->codename }}-status">{{ $task->status->name }}</div>
    <p class="new-task_description">{{ $task->description }}</p>
    @if ($task->performer)
        <div class="feedback-card__top">
            <a href="{{ route('users.single', ['id' => $task->performer->id]) }}">
                <img src="{{ $task->performer->getImage() }}" width="36" height="36">
            </a>
            <div class="feedback-card__top--name my-list__bottom">
                <p class="link-name">
                    <a href="{{ route('users.single', ['id' => $task->performer->id]) }}"
                        class="link-regular">{{ $task->performer->name }} @if (auth()->user()->id === $task->performer->id)
                            (Вы)
                        @endif
                    </a>
                </p>
                {{-- <a href="{{ route('tasks.single', ['id' => $task->id]) }}"
                    class="my-list__bottom-chat @if ($task->messages->whereNull('read_at')->count() > 0) {{ 'my-list__bottom-chat--new' }} @endif">
                    @if ($task->messages->whereNull('read_at')->count() > 0)
                        <b>{{ $task->messages->whereNull('read_at')->count() }}</b>
                    @endif
                </a> --}}
                <x-rating :rating="$task->performer->averageRating()"></x-rating>
                <b>{{ $task->performer->averageRating() }}</b>
            </div>
        </div>
    @else
        <div class="feedback-card__top">
            <div class="no-performer">
                <img src="{{ asset('/public/no-avatar.png') }}" width="36" height="36">
                <p class="no-performer-name">Исполнителя нет</p>
            </div>
        </div>
    @endif
</div>
