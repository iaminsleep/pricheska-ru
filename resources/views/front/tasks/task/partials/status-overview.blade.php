<div class="connect-desk__profile-mini">
    <div class="profile-mini__wrapper">
        <h3 style="margin-bottom: 5px">Статус:</h3>
        <div class="profile-mini__name five-stars__rate">
            <p class="{{ $task->status->codename }}-status-text">{{ $task->status->name }}</p>
        </div>
    </div>
    @auth
        @if (auth()->user()->id === $task->creator->id)
            <div class="profile-mini__wrapper" style="margin-top: 15px;">
                <h3>Действия:</h3>
                <div class="profile-mini__name five-stars__rate" style="display:flex; flex-direction: column">
                    <a style="margin-bottom: 5px; text-decoration:none; color: green;font-size: 15px;"
                        href="{{ route('task.edit', ['id' => $task->id]) }}"><i class='fa fa-edit'></i>
                        Редактировать</a>
                    <form action="{{ route('task.delete', ['id' => $task->id]) }}" method="post"
                        onsubmit="return confirm('Вы уверены?')" style="text-decoration:none; color: #bb0e0e">
                        <i class='fa fa-trash' style="padding-right: 3px;"></i>
                        <button type="submit"
                            style="background: none;
	color: inherit;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;">Удалить</button>
                        @method('DELETE')
                        @csrf
                    </form>
                </div>
            </div>
        @endif
    @endauth
</div>
