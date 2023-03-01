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
    <div style="display:flex; margin-bottom: 18px">
        <div style="width:300px; height:300px; margin-right: 50px;">
            <img style='height: 100%; width: 100%; object-fit: cover' src="{{ $task->getImage() }}"
                alt="{{ $task->title }}" />
        </div>
        <div class="content-view__description" style="width: 350px;">
            <h3 class="content-view__h3">Общее описание</h3>
            <p style="    word-wrap: break-word;"> {{ $task->description }} </p>
        </div>
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
    <div>
        @if ($task->tags->count())
            <div class="tag-cloud-single">
                <h3 class="content-view__h3" style="margin-top: 20px;">Тэги</h3>
                @foreach ($task->tags as $tag)
                    <small>
                        #<a href="{{ route('tags.single', ['slug' => $tag->slug]) }}"
                            title="{{ $tag->title }}">{{ $tag->title }}</a>
                    </small>
                @endforeach
            </div><!-- end meta -->
        @endif
    </div>
</div>
