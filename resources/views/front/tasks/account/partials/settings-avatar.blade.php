<div class="account__redaction-avatar">
    <img src="/img/avatars/{{ $user->avatar }}" width="156" height="156">
    <input type="file" name="avatar" id="upload-avatar">
    <label for="upload-avatar" class="link-regular">Сменить аватар</label>
    @error('avatar')
        <span class="upload-error">{{ $errors->first('avatar') }}</span>
    @enderror
</div>
