<div class="feedback-card__reviews">
    <p class="link-task link">Задание
        <a href="{{ route('tasks.single', ['id' => $feedback->task->id]) }}" class="link-regular">
            «{{ $feedback->task->title }}»
        </a>
    </p>
    <div class="card__review">
        <a href="{{ route('users.single', ['id' => $feedback->author->id]) }}">
            <img src="{{ $feedback->author->getImage() }}" width="55" height="54">
        </a>
        <div class="feedback-card__reviews-content">
            <p class="link-name link">
                <a href="{{ route('users.single', ['id' => $feedback->author->id]) }}" class="link-regular">
                    {{ $feedback->author->name }}
                </a>
            </p>
            <p class="review-text">
                {{ $feedback->comment }}
            </p>
        </div>
        <div class="card__review-rate">
            <p class="@if ($feedback->rating <= 3) {{ 'three-rate' }} @else {{ 'five-rate' }} @endif big-rate">
                {{ $feedback->rating }}<span></span>
            </p>
        </div>
    </div>
</div>
