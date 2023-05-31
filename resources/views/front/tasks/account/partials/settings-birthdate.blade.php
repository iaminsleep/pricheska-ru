<div class="account__input account__input--date" style="margin-left: 30px;">
    <label for="203">День рождения</label>
    <input id="203" class="input-middle input" type="date" name="birth_date" value="{{ $user->birth_date }}">
    @error('birth_date')
        <span class="upload-error">{{ $errors->first('birth_date') }}</span>
    @enderror
</div>
