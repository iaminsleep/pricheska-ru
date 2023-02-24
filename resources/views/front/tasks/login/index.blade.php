<section class="modal enter-form form-modal" id="enter-form">
    <h2>Вход на сайт</h2>
    <form method="post" action="{{ route('login.perform') }}">
        @csrf
        <p>
            <label class="form-modal-description
            @if($errors->has('email') || $errors->has('auth-error')) {{ 'input-danger' }} @endif" for="enter-email">
                Email
            </label>
            <input class="enter-form-email input input-middle @if($errors->has('email') || $errors->has('auth-error')) {{ 'login-danger' }} @endif" name="email" id="enter-email" autocomplete="off" value="{{ old('email') }}">
            @error('email')
                <span class="fs-12"> {{ $errors->first('email') }} </span>
            @enderror
            @error('auth-error')
                <span class="fs-12"> {{ $errors->first('auth-error') }} </span>
            @enderror
        </p>
        <p>
            <label class="form-modal-description
            @if($errors->has('password') || $errors->has('auth-error')) {{ 'input-danger' }} @endif" for="enter-password">
                Пароль
            </label>
            <input class="enter-form-email input input-middle  @if($errors->has('password')) {{ 'login-danger' }} @endif"
            type="password" name="password" id="enter-password" autocomplete="off" value="{{ old('password') }}">
            @error('password')
                <span class="fs-12">{{ $errors->first('password') }}</span>
            @enderror
        </p>
        <button class="button" type="submit">Войти</button>
    </form>
    <button class="form-modal-close" type="button">Закрыть</button>
</section>
