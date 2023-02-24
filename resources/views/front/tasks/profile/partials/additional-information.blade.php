<div class="user__card-info">
    <h3 class="content-view__h3">Специализации</h3>
    @if ($user->specialization)
        <div class="link-specialization">
            @foreach (json_decode($user->specialization, true) as $specialization)
                <a href="/search-user?specialization_id={{ $specialization }}"
                    class="link-regular">{{ $categories->toArray()[$specialization]['name'] }}</a>
            @endforeach
        </div>
    @endif
    <h3 class="content-view__h3">Контакты</h3>
    <div class="user__card-link">
        @if ($user->phone)
            <a class="user__card-link--tel link-regular" href="tel:{{ $user->phone }}">{{ $user->phone }}</a>
        @endif
        <a class="user__card-link--email link-regular" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
        @if ($user->skype)
            <a class="user__card-link--skype link-regular"
                href="skype:{{ $user->skype }}?call">{{ $user->skype }}</a>
        @endif
    </div>
</div>
