<div class="account__input account__input--email">
    <label for="201">email</label>
    <input class="input textarea" id="201" name="email" value="{{ $user->email }}" placeholder="denis@email.com">
    @error('email')
        <span class="upload-error">{{ $errors->first('email') }}</span>
    @enderror
</div>
