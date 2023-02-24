<section class="user__search">
    @forelse($users as $user)
        <x-cards.user :user="$user"></x-cards.user>
    @empty
        <p>Здесь пусто...</p>
    @endforelse
    {{ $users->appends(Illuminate\Support\Facades\Request::all())->links() }}
</section>
