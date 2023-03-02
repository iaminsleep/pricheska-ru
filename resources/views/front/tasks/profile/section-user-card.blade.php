<div class="user__card-wrapper">
    <div class="user__card">
        <img src="{{ $user->getImage() }}" width="120" height="120" alt="Аватар пользователя">
        @include('front.tasks.profile.partials.headline-country-tasks')
        @include('front.tasks.profile.partials.headline-online-bookmark')
    </div>
    <div class="content-view__description">
        @if ($user->description)
        <p>{{ $user->description }}</p>@else<p>Этот пользователь не оставил описаниe.</p>
        @endif
    </div>
    {{-- <div class="user__card-general-information">
        @include('front.tasks.profile.partials.additional-information')
    </div> --}}
</div>
