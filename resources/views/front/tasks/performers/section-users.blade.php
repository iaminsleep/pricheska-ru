<section class="user__search" style="border-radius: 10px">
    @include('front.tasks.performers.partials.main-filters')
    @forelse($users as $user)
        <x-cards.user :user="$user"></x-cards.user>
    @empty
        <p>Здесь пусто...</p>
    @endforelse
    {{ $users->links() }}
</section>
