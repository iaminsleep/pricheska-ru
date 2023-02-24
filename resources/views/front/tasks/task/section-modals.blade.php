@if (auth()->user()->id === $task->user->id)
    <x-modal-forms.completion taskId="{{ $task->id}}" performerId="{{ $task->performer_id }}"></x-modal-forms.completion>
@else
    <x-modal-forms.response taskId="{{ $task->id}}"></x-modal-forms.response>
    <x-modal-forms.refusal taskId="{{ $task->id}}"></x-modal-forms.refusal>
@endif
