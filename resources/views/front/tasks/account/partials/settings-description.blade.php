<div class="account__input account__input--info">
    <label for="204">Информация о себе</label>
    <textarea class="input textarea" rows="7" id="204" name="description">{{ $user->description }}</textarea>
    @error('description')
        <span class="upload-error">{{ $errors->first('description') }}</span>
    @enderror
</div>
