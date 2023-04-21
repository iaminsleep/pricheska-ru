@extends('front.tasks.layout')

@section('title', 'Просмотр задания')

@section('head')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=3b001707-d3da-49cd-ae1b-bdd710add366"
        type="text/javascript"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('main-class', 'page-main')

@section('scripts')
    {{-- Yandex Maps --}}
    @if ($coordinates !== null)
        @include('front.tasks.task.ymaps')
    @endif

    {{-- Messenger --}}
    <script type="text/javascript">
        var authUserId = @json(auth()->user()->id ?? null); //pass authenticated user id to the messenger script
    </script>
    <script src="{{ asset('public/assets/front/tasks/js/front.js') }}"></script>
    <script src="{{ asset('public/assets/front/tasks/js/messenger.js') }}"></script>
@endsection

@section('page-content')
    <div class="main-container page-container" @if ($task->status->id !== 1 && $task->status->id !== 4) style="opacity: 0.7" @endif>
        <section class="search-task" style="margin-right: 20px; width: auto">
            <div class="search-task__wrapper">
                <h3 style="justify-content: center;
display: flex;">Рекомендации</h3>
                @foreach ($hairdressers as $hairdresser)
                    <div class="content-view__feedback-card user__search-wrapper"
                        style="border-left: 2px solid #d4d4d4; border-right: 2px solid #d4d4d4; padding-left: 5px;
padding-right: 5px;@if ($loop->iteration === 1) border-top: 2px solid #d4d4d4; @endif @if ($hairdresser->additiveCriterion() >= 0.9) background-color: #fff8d0 @endif">
                        <div class="feedback-card__top" style="flex-direction: column; align-items:center">
                            <div class="user__search-icon" style="align-items:center">
                                <a href="{{ route('users.single', ['id' => $hairdresser->id]) }}">
                                    <img src="{{ $hairdresser->getImage() }}" width="65" height="65">
                                </a>
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

        <section class="content-view">
            <div class="content-view__card">
                @include('front.tasks.task.partials.info-general')
                @include('front.tasks.task.partials.action-buttons')
            </div>
            @include('front.tasks.task.partials.feedbacks')
        </section>
        <section class="connect-desk">
            @include('front.tasks.task.partials.status-overview')
            @include('front.tasks.task.partials.customer-overview')
            @if ($task->performer_id)
                @include('front.tasks.task.partials.performer-overview')
            @endif
            @auth
                @if (
                    $task->status->id === 1 &&
                        $task->performer_id &&
                        ($task->performer_id === auth()->user()->id || $task->creator_id === auth()->user()->id))
                    @include('front.tasks.task.section-messenger')
                @endif @endauth
            </section>
        </div>
        @auth
            @include('front.tasks.task.section-modals')
        @endauth
    @endsection
