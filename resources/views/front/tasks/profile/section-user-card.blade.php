<div class="user__card-wrapper">
    <div class="user__card">
        <img src="/img/avatars/{{ $user->avatar }}" width="120" height="120" alt="Аватар пользователя">
        @include('profile.partials.headline-country-tasks')
        @include('profile.partials.headline-online-bookmark')
    </div>
    <div class="content-view__description">
        <p>{{ $user->description }}</p>
    </div>
    <div class="user__card-general-information">
        @include('profile.partials.additional-information')
    </div>
</div>
