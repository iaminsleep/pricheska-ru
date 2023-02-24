<div class="account__input">
    <label for="214">Skype</label>
    <input class="input textarea" id="214" name="skype" value="{{ $user->skype }}" placeholder="@DenisT">
    @error('skype')
        <span class="upload-error">{{ $errors->first('skype') }}</span>
    @enderror
</div>
