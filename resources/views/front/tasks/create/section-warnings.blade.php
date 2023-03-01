<div class="create__warnings">
    @include('front.tasks.create.partials.create-rules')
    @if ($errors->any())
        @include('front.tasks.create.partials.create-errors')
    @endif
</div>
