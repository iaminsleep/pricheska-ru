@props(['taskId'])

<section class="modal response-form form-modal" id="response-form">
    <h2>Отклик на задание</h2>
    <form action="{{ route('response.store', ['taskId' => $taskId]) }}" method="post">
        @csrf
        <p>
            <label class="form-modal-description" for="response-payment">Ваша цена</label>
            <input class="response-form-payment input input-middle input-money" placeholder="1000"
            type="text" name="payment" id="response-payment" autocomplete="off"/>
        </p>
        @error('payment')
            <span class="upload-error">{{ $errors->first('payment') }}</span>
        @enderror
        <p>
            <label class="form-modal-description" for="response-comment">Комментарий</label>
            <textarea class="input textarea" rows="4" id="response-comment" name="comment"
            placeholder="Опишите, почему должны выбрать именно вас." autocomplete="off"></textarea>
        </p>
        @error('comment')
            <span class="upload-error">{{ $errors->first('comment') }}</span>
        @enderror
        <button class="button modal-button" type="submit">Отправить</button>
    </form>
    <button class="form-modal-close" type="button">Закрыть</button>
</section>
