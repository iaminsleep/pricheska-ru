<section class="search-task" style="margin-right: 20px; width: auto">
    <div class="search-task__wrapper">
        <h3>Рейтинг парикмахеров</h3>
        @foreach ($hairdressers as $hairdresser)
            <div class="content-view__feedback-card user__search-wrapper"
                style="border-left: 2px solid #d4d4d4;border-right: 2px solid #d4d4d4; @if ($loop->iteration === 1) border-top: 2px solid #d4d4d4; background-color: #fff8d0 @endif @if ($loop->iteration === 2) background-color: #E0E0E0 @endif @if ($loop->iteration === 3) background-color: #ECCFB2 @endif ">
                <div class="feedback-card__top" style="flex-direction: column; align-items:center">
                    <div class="user__search-icon" style="align-items:center">
                        <a href="{{ route('users.single', ['id' => $hairdresser->id]) }}"
                            class="@if ($loop->iteration === 1) first @endif @if ($loop->iteration === 2) second @endif @if ($loop->iteration === 3) third @endif">
                            <img src="{{ $hairdresser->getImage() }}" width="65" height="65">
                        </a>
                        <span>На сайте: {{ rand(5, 200) }} дней</span>
                        <span>{{ $hairdresser->received_feedbacks->count() }} отзыва</span>
                        <span>{{ $hairdresser->completedTasksCount() }} выполн. заказа</span>
                    </div>
                    <div class="feedback-card__top--name user__search-card">
                        <p class="link-name">
                            <a href="{{ route('users.single', ['id' => $hairdresser->id]) }}" class="link-regular">
                                {{ $hairdresser->name }}
                            </a>
                        </p>
                        <x-rating :rating="$hairdresser->averageRating()"></x-rating>
                        <b>{{ $hairdresser->averageRating() }}</b>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
