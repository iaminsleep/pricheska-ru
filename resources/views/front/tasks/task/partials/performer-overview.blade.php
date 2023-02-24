<div class="connect-desk__profile-mini">
    <div class="profile-mini__wrapper">
        <h3>Исполнитель</h3>
        <div class="profile-mini__top">
            <img src="/img/avatars/{{ $performer->avatar }}" width="62" height="62" alt="Аватар заказчика">
            <div>
                <div class="profile-mini__name five-stars__rate">
                    <p>{{ $performer->name }}</p>
                </div>
                <div class="feedback-card__top--name">
                    <x-rating :rating="$performer->rating"></x-rating>
                    <b>{{ $performer->rating }}</b>
                </div>
            </div>
        </div>
        <a href="{{ route('user.page', ['id' => $performer->id]) }}" class="link-regular">
            Смотреть профиль
        </a>
    </div>
</div>
