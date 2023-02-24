<div class="content-view__headline user__card-bookmark @if(auth()->user() && auth()->user()->favourites->contains('favouritable_id', $user->id)) {{ 'user__card-bookmark--current' }} @endif">
    @if(Cache::has('user-is-online-' . $user->id))
        <span class="online">● Онлайн</span>
    @else
        <span style="padding:10px;">
            Был(а) на сайте {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
        </span>
    @endif
    @auth
        @if(auth()->user()->id !== $user->id)
            <form action="@if(auth()->user()->favourites->contains('favouritable_id', $user->id)) {{ route('favourites.delete', ['id' => $user->id]) }} @else {{ route('favourites.add', ['id' => $user->id]) }} @endif" method="post">
                <button type="submit" class="no-button">
                    <a style="cursor:pointer;"><b></b></a>
                </button>
                @csrf
                @if(auth()->user()->favourites->contains('favouritable_id', $user->id))
                    @method('DELETE')
                @endif
            </form>
        @endif
    @else
        <div>
            <a style="cursor:pointer;" class="open-modal" data-for="enter-form">
                <b></b>
            </a>
        </div>
    @endauth
</div>
