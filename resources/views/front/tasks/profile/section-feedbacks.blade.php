<div class="content-view__feedback">
    <h2>Отзывы @if($receivedFeedbacks->count() > 0)<span>({{ $receivedFeedbacks->count() }})</span>@endif</h2>
    <div class="content-view__feedback-wrapper reviews-wrapper">
        @forelse($receivedFeedbacks as $feedback)
            <x-cards.feedback :feedback="$feedback"></x-cards.feedback>
        @empty
            @if($user->id === auth()->user()->id)
                <p>Вам ещё никто не оставлял отзыв!</p>
            @else
                <p>У данного пользователя нету отзывов.</p>
            @endif
        @endforelse
    </div>
</div>
