<div class="container-fluid col-12">
    @foreach($notifications as $notification)
        <livewire:dashboard.notification :notification="$notification" />
    @endforeach
    @if($notifications->hasPages())
            <button wire:click="loadMore" class="btn btn-outline-primary ">show more</button>
    @endif
</div>
