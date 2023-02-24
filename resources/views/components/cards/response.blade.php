<div class="content-view__feedback-wrapper">
    <div class="content-view__feedback-card">
        <div class="feedback-card__top">
            <a href="{{ route('user.page', ['id' => $response->user->id]) }}" style="margin-right:25px;">
                <img src="/img/avatars/{{ $response->user->avatar }}" width="55" height="55">
            </a>
            <div class="feedback-card__top--name">
                <p>
                    <a href="{{ route('user.page', ['id' => $response->user->id]) }}" class="link-regular">
                        {{ $response->user->name }}
                    </a>
                </p>
                <x-rating :rating="$response->user->rating"></x-rating>
                <b>{{ $response->user->rating }}</b>
            </div>
            <span class="new-task__time">
                {{ Carbon\Carbon::parse($response->created_at)->timezone($timezone)->diffForHumans() }}
            </span>
        </div>
        <div class="feedback-card__content">
            <p> {{ $response->comment }} </p>
            <span>{{ $response->payment }} ₽</span>
        </div>
        @auth
            <div class="feedback-card__actions">
                @if ($response->task->status->id === 1 && auth()->user()->id === $response->task->user_id && !$response->task->performer_id)
                    <form action="{{ route('response.accept', ['responseId' => $response->id]) }}" method="post">
                        @method('PUT')
                        <button class="button__small-color request-button button" type="submit">
                            Подтвердить
                        </button>
                        @csrf
                    </form>
                    <form action="{{ route('response.delete', ['responseId' => $response->id]) }}" method="post">
                        @method('DELETE')
                        <button class="button__small-color refusal-button button" type="submit">
                            Отказать
                        </button>
                        @csrf
                    </form>
                @elseif($response->task->status->id === 1 && auth()->user()->id === $response->user_id && auth()->user()->id !== $response->task->performer_id)
                    <form action="{{ route('response.delete', ['responseId' => $response->id]) }}" method="post">
                        @method('DELETE')
                        <button class="button__small-color refusal-button button" type="submit">
                            Удалить отклик
                        </button>
                        @csrf
                    </form>
                @endif
            </div>
        @endauth
    </div>
</div>
