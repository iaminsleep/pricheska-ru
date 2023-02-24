<h3 class="div-line">Настройки аккаунта</h3>
<div class="account__redaction-section-wrapper">
    @include('account.partials.settings-avatar')
    <div class="account__redaction">
        @include('account.partials.settings-name')
        @include('account.partials.settings-email')
        @include('account.partials.settings-city')
        @include('account.partials.settings-birthdate')
        @include('account.partials.settings-description')
    </div>
</div>
