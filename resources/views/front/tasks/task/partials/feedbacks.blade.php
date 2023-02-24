<div class="content-view__feedback">
    <h2>Отклики <span>({{ $task->responses()->count() }})</span></h2>
    @forelse($task->responses as $response)
        <x-cards.response :response="$response"></x-cards.response>
    @empty
        @auth
            @if (auth()->user()->id !== $task->user->id)
                <p class="pd-l-20">Ещё никто не оставлял отклики к этому заданию. Станьте первым!</p>
            @elseif(auth()->user()->id === $task->user->id)
                <p class="pd-l-20">На данный момент нет у вашего задания нет откликов.</p>
            @endif
        @else
            <p class="pd-l-20">Ещё никто не оставлял отклики к этому заданию.</p>
        @endauth
    @endforelse
</div>
