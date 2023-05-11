<h3 class="div-line">Настройки аккаунта</h3>
<div class="account__redaction-section-wrapper">
    @include('front.tasks.account.partials.settings-avatar')
    <div class="account__redaction">
        @include('front.tasks.account.partials.settings-name')
        @include('front.tasks.account.partials.settings-email')
        {{-- @include('front.tasks.account.partials.settings-city') --}}
        @include('front.tasks.account.partials.settings-birthdate')
        @include('front.tasks.account.partials.settings-description')
    </div>
</div>
