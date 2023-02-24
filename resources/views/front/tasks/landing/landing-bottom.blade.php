<div class="landing-bottom">
    <div class="landing-bottom-container">
        <h2>Популярные задания на сайте</h2>
        @forelse($tasks as $task)
            <x-cards.landing-task :task="$task"></x-cards.landing-task>
        @empty
            <p>Здесь пусто...</p>
        @endforelse
    </div>
    <div class="landing-bottom-container">
        <a href="{{ route('browse.page') }}">
            <button type="button" class="button red-button">
                смотреть все задания
            </button>
        </a>
    </div>
</div>
