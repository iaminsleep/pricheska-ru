<section class="modal enter-form form-modal" id="enter-form">
    <h2>Вход на сайт</h2>
    <form method="post" action="{{ route('login.perform') }}">
        {{ csrf_field() }}
        <p>
            <label class="form-modal-description" for="enter-email">Email</label>
            <input class="enter-form-email input input-middle" name="email" id="enter-email">
        </p>
        <p>
            <label class="form-modal-description" for="enter-password">Пароль</label>
            <input class="enter-form-email input input-middle" type="password" name="password" id="enter-password">
        </p>
        <button class="button" type="submit">Войти</button>
    </form>
    <button class="form-modal-close" type="button">Закрыть</button>
</section>