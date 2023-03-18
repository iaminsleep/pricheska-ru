<div class="connect-desk__profile-mini">
    <div class="profile-mini__wrapper">
        <h3>Заказчик</h3>
        <div class="profile-mini__top">
            <img src="{{ $task->creator->getImage() }}" width="62" height="62" alt="Аватар заказчика">
            <div class="profile-mini__name five-stars__rate">
                <p>{{ $task->creator->name }} @if (auth()->user() && $task->creator->id === auth()->user()->id)
                        (Вы)
                    @endif
                </p>
            </div>
        </div>
        <p class="info-customer">
            <span>{{ $task_amount }} заказа</span>
            <span class="last-">
                {{ str_replace('назад', 'на сайте', Carbon\Carbon::parse($task->creator->created_at)->diffForHumans()) }}
            </span>
        </p>
        <a href="{{ route('users.single', ['id' => $task->creator->id]) }}" class="link-regular">
            Смотреть профиль
        </a>
    </div>
</div>
