<div class="content-view__headline">
    <h1>{{ $user->name }}</h1>
    @if ($user->birth_date)
        <p>
            {{ \Carbon\Carbon::parse($user->birth_date)->diff(\Carbon\Carbon::now())->format('%y лет') }}
        </p>
    @endif
    <div class="profile-mini__name five-stars__rate">
        <x-rating :rating="$user->averageRating()"></x-rating>
        <b>{{ $user->averageRating() }}</b>
    </div>
    <b class="done-task">Выполнил(а) {{ $completedTasksCount }} заказов</b><br>
    <b class="done-review">Получил(а) {{ $receivedFeedbacks->count() }} отзывов</b>

</div>
