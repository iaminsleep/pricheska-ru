<section class="new-task">
    <div class="new-task__wrapper">
        <h1>Результаты поиска</h1>
        @forelse($tasks as $task)
            <x-cards.task :task="$task"></x-cards.task>
        @empty
            <p>Ни одно задание не подошло под заданные фильтры! Попробуйте ещё раз.</p>
        @endforelse
        {{ $tasks->appends(Illuminate\Support\Facades\Request::all())->links() }}
</section>
