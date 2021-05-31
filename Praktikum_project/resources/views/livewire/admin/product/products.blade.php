

<div>
    @if($mode == 'index')
        @include('livewire.index')
    @elseif($mode == 'create')
        @include('livewire.create')
    @endif
</div>