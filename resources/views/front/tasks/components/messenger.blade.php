<section class="modal response-form form-modal" id="response-form">
    <h2>Отклик на задание</h2>
    <form action="#" method="post">
        <p>
            <label class="form-modal-description" for="response-payment">Ваша цена</label>
            <input class="response-form-payment input input-middle input-money" type="text" name="response-payment" id="response-payment">
        </p>
        <p>
            <label class="form-modal-description" for="response-comment">Комментарий</label>
            <textarea class="input textarea" rows="4" id="response-comment" name="response-comment" placeholder="Place your text"></textarea>
        </p>
        <button class="button modal-button" type="submit">Отправить</button>
    </form>
    <button class="form-modal-close" type="button">Закрыть</button>
</section>
<section class="modal completion-form form-modal" id="complete-form">
<h2>Завершение задания</h2>
    <p class="form-modal-description">Задание выполнено?</p>
    <form action="#" method="post">
    <input class="visually-hidden completion-input completion-input--yes" type="radio" id="completion-radio--yes" name="completion" value="yes">
<label class="completion-label completion-label--yes" for="completion-radio--yes">Да</label>
    <input class="visually-hidden completion-input completion-input--difficult" type="radio" id="completion-radio--yet" name="completion" value="difficulties">
<label  class="completion-label completion-label--difficult" for="completion-radio--yet">Возникли проблемы</label>
    <p>
        <label class="form-modal-description" for="completion-comment">Комментарий</label>
        <textarea class="input textarea" rows="4" id="completion-comment" name="completion-comment" placeholder="Place your text"></textarea>
    </p>
    <p class="form-modal-description">
        Оценка
        <div class="feedback-card__top--name completion-form-star">
            <span class="star-disabled"></span>
            <span class="star-disabled"></span>
            <span class="star-disabled"></span>
            <span class="star-disabled"></span>
            <span class="star-disabled"></span>
        </div>
    </p>
    <input type="hidden" name="rating" id="rating">
        <button class="button modal-button" type="submit">Отправить</button>
    </form>
    <button class="form-modal-close" type="button">Закрыть</button>
</section>
<section class="modal form-modal refusal-form" id="refuse-form">
<h2>Отказ от задания</h2>
    <p>
        Вы собираетесь отказаться от выполнения задания.
        Это действие приведёт к снижению вашего рейтинга.
        Вы уверены?
    </p>
    <button class="button__form-modal button" id="close-modal"
            type="button">Отмена</button>
    <button class="button__form-modal refusal-button button"
            type="button">Отказаться</button>
    <button class="form-modal-close" type="button">Закрыть</button>
</section>
<script src="<?php echo url('public/js/messenger.js')?>"></script>