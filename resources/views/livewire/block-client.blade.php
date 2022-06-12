@if(auth()->user()->isVendor())
    <button class="btn btn-outline-info btn-sm" wire:click="block">{{$switchBlock}}</button>
@else
    <div></div>
@endif
