<div class="account__input">
    <label for="213">Телефон</label>
    <input class="input textarea" type="tel" id="213" name="phone" value="{{ $user->phone }}"
        placeholder="8 (555) 187 44 87">
    @error('phone')
        <span class="upload-error">{{ $errors->first('phone') }}</span>
    @enderror
</div>
