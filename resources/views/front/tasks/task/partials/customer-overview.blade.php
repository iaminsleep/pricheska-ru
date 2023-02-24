<div class="connect-desk__profile-mini">
    <div class="profile-mini__wrapper">
        <h3>Заказчик</h3>
        <div class="profile-mini__top">
            <img src="/img/avatars/{{ $task->user->avatar }}" width="62" height="62" alt="Аватар заказчика">
            <div class="profile-mini__name five-stars__rate">
                <p>{{ $task->user->name }}</p>
            </div>
        </div>
        <p class="info-customer">
            <span>{{ $task_amount }}</span>
            <span class="last-">
                {{ str_replace('назад', 'на сайте', Carbon\Carbon::parse($task->user->created_at)
                    ->timezone($timezone)
                    ->diffForHumans())
                }}
            </span>
        </p>
        <a href="{{ route('user.page', ['id' => $task->user->id]) }}" class="link-regular">
            Смотреть профиль
        </a>
    </div>
</div>
