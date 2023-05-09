@if ($user->isHairdresser())
    <div class="content-view__feedback">
        <h2>Отзывы @if ($receivedFeedbacks->count() > 0)
                <span>({{ $receivedFeedbacks->count() }})</span>
            @endif
        </h2>
        <div class="content-view__feedback-wrapper reviews-wrapper">
            @forelse($receivedFeedbacks as $feedback)
                <x-cards.feedback :feedback="$feedback"></x-cards.feedback>
            @empty
                @if ($user->id === auth()->user()->id)
                    <p>Вам ещё никто не оставлял отзыв!</p>
                @else
                    <p>У данного пользователя нету отзывов.</p>
                @endif
            @endforelse
        </div>
    </div>
@else
    <div class="content-view__feedback">
        <h2>Заказы @if ($user->tasks->count() > 0)
                <span>({{ $user->tasks->count() }})</span>
            @endif
        </h2>
        <div class="content-view__feedback-wrapper reviews-wrapper">
            @forelse($user->tasks as $task)
                <div class="feedback-card__reviews">
                    <p class="link-task link">Заказ
                        <a href="{{ route('tasks.single', ['id' => $task->id]) }}" class="link-regular">
                            «{{ $task->title }}»
                        </a>
                    </p>
                    <div class="card__review">
                        <a href="{{ route('users.single', ['id' => $task->creator->id]) }}">
                            <img src="{{ $task->creator->getImage() }}" width="55" height="54">
                        </a>
                        <div class="feedback-card__reviews-content">
                            <p class="link-name link">
                                <a href="{{ route('users.single', ['id' => $task->creator->id]) }}"
                                    class="link-regular">
                                    {{ $task->creator->name }}
                                </a>
                            </p>
                            <p class="review-text">
                                {{ $task->description }}
                            </p>
                        </div>
                        <b class="new-task__price new-task__price--translation"
                            style="    padding-right: 50px;">{{ $task->budget }}<b>
                                ₽</b></b>
                    </div>
                </div>
            @empty
                @if ($user->id === auth()->user()->id)
                    <p>Вы ещё не создавали заказы!</p>
                @else
                    <p>У данного пользователя нету созданных заказов.</p>
                @endif
            @endforelse
        </div>
    </div>
@endif
