@extends('front.tasks.layouts.layout')
@section('content')
    <main class="page-main">
        <div class="main-container page-container">
            <section class="new-task">
                <div class="new-task__wrapper">
                    <h1>Новые задания</h1>
                    @foreach ($tasks as $task)
                        <x-task :task="$task"></x-task>
                    @endforeach
                    <div class="new-task__pagination">
                        {{ $tasks->links() }}
                    </div>
            </section>
            @include('front.tasks.layouts.search')
        </div>
    </main>
@endsection
