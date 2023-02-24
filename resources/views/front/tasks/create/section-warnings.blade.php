<div class="create__warnings">
    @include('create.partials.create-rules')
    @if ($errors->any())
        @include('create.partials.create-errors')
    @endif
</div>
