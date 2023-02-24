<div class="account__input account__input--name">
    <label for="200">Ваше имя</label>
    <input class="input textarea" id="200" name="name" value="{{ $user->name }}" placeholder="Денис Титов">
    @error('name')
        <span class="upload-error">{{ $errors->first('name') }}</span>
    @enderror
</div>
