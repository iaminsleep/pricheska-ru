<div class="content-view__card-wrapper">
    <div class="content-view__header">
        <div class="content-view__headline">
            <h1>{{ $task->title }}</h1>
            <span>Размещено в категории
                <a href="/search?category_id={{ $task->category->id }}" class="link-regular">
                    {{ $task->category->title }}
                </a>
                {{ Carbon\Carbon::parse($task->created_at)->diffForHumans() }}
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
    <div class="content-view__location">
        <h3 class="content-view__h3">Расположение</h3>
        <div class="content-view__location-wrapper">
            <div class="content-view__map">
                <div id="map"></div>
            </div>
            <div class="content-view__address">
                <span>{{ $task->address }}</span>
                <p>Срок выполнения: {{ $deadline }}</p>
            </div>
        </div>
    </div>
</div>
