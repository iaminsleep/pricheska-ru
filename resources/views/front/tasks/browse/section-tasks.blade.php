<section class="new-task" style=" border-radius: 10px">
    <div class="new-task__wrapper">
        <h1>Новые заказы</h1>
        @forelse($tasks as $task)
            <x-cards.task :task="$task"></x-cards.task>
        @empty
            <p>На данный момент активных заказов нет!</p>
        @endforelse
        {{ $tasks->links('front.tasks.vendor.pagination.bootstrap-4') }}
</section>
