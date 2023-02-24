<section class="user__search">
    @include('performers.partials.main-filters')
    @forelse($users as $user)
        <x-cards.user :user="$user"></x-cards.user>
    @empty
        <p>Здесь пусто...</p>
    @endforelse
    {{ $users->links() }}
</section>
