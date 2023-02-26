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
    <script src="/js/messenger.js"></script>
@endsection

@section('page-content')
    <div class="main-container page-container" @if ($task->status->id !== 1 && $task->status->id !== 4) style="opacity: 0.7" @endif>
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
                @endif
            @endauth
        </section>
    </div>
    @auth
        @include('front.tasks.task.section-modals')
    @endauth
@endsection
