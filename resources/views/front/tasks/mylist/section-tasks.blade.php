<section class="my-list">
    <div class="my-list__wrapper">
        <h1>Мои задания</h1>
        @forelse($tasks as $task)
            <x-cards.profile-task :task="$task"></x-cards.profile-task>
        @empty
            <p>Заданий в данной категории не было найдено!</p>
        @endforelse
    </div>
</section>
