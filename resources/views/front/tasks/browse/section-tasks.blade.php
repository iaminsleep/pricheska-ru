<section class="new-task">
    <div class="new-task__wrapper">
        <h1>Новые задания</h1>
        @forelse($tasks as $task)
            <x-cards.task :task="$task"></x-cards.task>
        @empty
            <p>На данный момент активных заданий нет!</p>
        @endforelse
        {{ $tasks->links('front.tasks.vendor.pagination.bootstrap-4') }}
</section>
