@props(['taskId', 'performerId'])

<section class="modal completion-form form-modal" id="complete-form">
    <h2>Завершение задания</h2>
    <p class="form-modal-description">Задание выполнено?</p>
    <form action="{{ route('task.complete', ['taskId' => $taskId]) }}" method="post">
        @method('PUT')
        @csrf
        <input class="visually-hidden completion-input completion-input--yes" type="radio" id="completion-radio--yes" name="status" value="2">
        <label class="completion-label completion-label--yes" for="completion-radio--yes">Да</label>

        <input class="visually-hidden completion-input completion-input--difficult" type="radio" id="completion-radio--yet" name="status" value="3">
        <label class="completion-label completion-label--difficult" for="completion-radio--yet">Нет</label>

        @if($performerId)
            <p>
                <label class="form-modal-description" for="completion-comment">Комментарий</label>
                <textarea class="input textarea" rows="4" id="completion-comment" name="comment" placeholder="Напишите отзыв о качестве работе исполнителя"></textarea>
            </p>

            <p class="form-modal-description">
                Оценка
                <div class="feedback-card__top--name completion-form-star">
                    @for($i = 1; $i <= 5; $i++)
                        <span class="star-disabled">
                            <input type="radio" name="rating" style="opacity: 0; cursor: pointer" value="{{ $i }}"/>
                        </span>
                    @endfor
                </div>
            </p>
        @endif

        <button class="button modal-button" type="submit">Отправить</button>
    </form>
    <button class="form-modal-close" type="button">Закрыть</button>
</section>
