<div class="content-view__card-wrapper">
    <div class="content-view__header">
        <div class="content-view__headline">
            <h1>{{ $task->title }}</h1>
            <span>Размещено в категории
                <a href="/search?category_id={{ $task->category->id }}" class="link-regular">
                    {{ $task->category->name }}
                </a>
                {{ Carbon\Carbon::parse($task->created_at)->timezone($timezone)->diffForHumans() }}
            </span>
        </div>
        <b class="new-task__price new-task__price--clean content-view-price">
            {{ $task->budget }} <b>₽</b>
        </b>
        <div class="new-task__icon new-task__icon--clean content-view-icon"></div>
    </div>
    <div class="content-view__description">
        <h3 class="content-view__h3">Общее описание</h3>
        <p> {{ $task->description }} </p>
    </div>
    <div class="content-view__attach">
        <h3 class="content-view__h3">Вложения</h3>
        <div class="files">
            @forelse($task->files as $file)
                <a href="{{ route('file.download', ['fileId' => $file->id]) }}">
                    {{ $file->alias }}
                </a>
            @empty
                <p>Автор не прикрепил файлы к заданию</p>
            @endforelse
        </div>
    </div>
    <div class="content-view__location">
        <h3 class="content-view__h3">Расположение</h3>
        @if($coordinates !== null)
            <div class="content-view__location-wrapper">
                <div class="content-view__map">
                    <div id="map"></div>
                </div>
                <div class="content-view__address">
                    <span class="address__town">{{ $task->city->name }}</span><br>
                    <span>{{ $task->location }}</span>
                    <p>Срок выполнения: {{ $deadline }}</p>
                </div>
            </div>
        @else
            <p>Автор не указал адрес, работа считается удалённой.</p>
            <p>Срок выполнения: {{ $deadline }}</p>
        @endif
    </div>
</div>
