<div class="account__redaction-section-wrapper account_section--bottom">
    <div class="search-task__categories account_checkbox--bottom">
        @foreach ($notification_settings as $setting)
            <input class="visually-hidden checkbox__input" id="{{ $setting['value'] }}" type="checkbox"
                name="notification_settings[]" value="{{ $setting['id'] }}"
                @if ($user->notification_settings && in_array($setting['id'], json_decode($user->notification_settings, true))) checked @endif>
            <label for="{{ $setting['value'] }}">{{ $setting['name'] }}</label>
        @endforeach
    </div>
</div>
