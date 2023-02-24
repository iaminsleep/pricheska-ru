<div class="content-view__feedback-card user__search-wrapper">
    <div class="feedback-card__top">
        <div class="user__search-icon">
            <a href="{{ route('user.page', ['id' => $user->id]) }}">
                <img src="/img/avatars/{{ $user->avatar }}" width="65" height="65">
            </a>
            <span>{{ $user->tasks()->count() }}
                @if ($user->tasks()->count() === 1)
                    {{ 'задание' }}
                @elseif($user->tasks()->count() > 1 && $user->tasks()->count() <= 4)
                    {{ 'задания' }}
                @elseif($user->tasks()->count() > 4)
                    {{ 'заданий' }}
                @endif
            </span>
            <span>{{ $user->received_feedbacks->count() }} отзывов</span>
        </div>
        <div class="feedback-card__top--name user__search-card">
            <p class="link-name">
                <a href="{{ route('user.page', ['id' => $user->id]) }}" class="link-regular">
                    {{ $user->name }}
                </a>
            </p>
            <x-rating :rating="$user->rating"></x-rating>
            <b>{{ $user->rating }}</b>
            <p class="user__search-content">{{ $user->description }}</p>
        </div>
        @if (Cache::has('user-is-online-' . $user->id))
            <span class="new-task__time online">● Онлайн</span>
        @else
            <span class="new-task__time">
                Был(а) на сайте {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
            </span>
        @endif
    </div>
    @if ($user->specialization)
        <div class="link-specialization user__search-link--bottom">
            @foreach (json_decode($user->specialization, true) as $specialization)
                <a href="/search-user?specialization_id={{ $specialization }}" class="link-regular">
                    {{ $categories->toArray()[$specialization]['name'] }}
                </a>
            @endforeach
        </div>
    @endif
</div>
