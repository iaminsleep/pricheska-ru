@props(['taskId'])

<section class="modal form-modal refusal-form" id="refuse-form">
    <form action="{{ route('task.refuse', ['taskId' => $taskId]) }}" method="post">
        @method('PUT')
        <h2>Отказ от задания</h2>
        <p>
            Вы собираетесь отказаться от выполнения задания.
            Это действие приведёт к снижению вашего рейтинга.
            Вы уверены?
        </p>
        <button class="button__form-modal button" id="close-modal"
                type="button">Отмена</button>
        <button class="button__form-modal refusal-button button"
                type="submit">Отказаться</button>
        <button class="form-modal-close" type="button">Закрыть</button>
        @csrf
    </form>
</section>
