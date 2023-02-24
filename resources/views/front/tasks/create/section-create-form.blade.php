<form class="create__task-form form-create" method="post" action="{{ route('task-create.perform') }}"
    enctype="multipart/form-data" id="task-form">
    @include('create.partials.task-title')
    @include('create.partials.task-description')
    @include('create.partials.task-category')
    @include('create.partials.task-files')
    @include('create.partials.task-address')
    <div class="create__price-time">
        @include('create.partials.task-budget')
        @include('create.partials.task-deadline')
    </div>
    @csrf
</form>
