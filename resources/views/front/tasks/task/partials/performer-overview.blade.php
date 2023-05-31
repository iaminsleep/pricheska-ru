<div class="connect-desk__profile-mini" style="border-radius: 10px">
    <div class="profile-mini__wrapper">
        <h3>Исполнитель</h3>
        <div class="profile-mini__top">
            <img src="{{ $performer->getImage() }}" width="62" height="62" alt="Аватар заказчика">
            <div>
                <div class="profile-mini__name five-stars__rate">
                    <p>{{ $performer->name }}</p>
                </div>
                <div class="feedback-card__top--name">
                    <x-rating :rating="$performer->averageRating()"></x-rating>
                    <b>{{ $performer->averageRating() }}</b>
                </div>
            </div>
        </div>
        <a href="{{ route('users.single', ['id' => $performer->id]) }}" class="link-regular">
            Смотреть профиль
        </a>
    </div>
</div>
