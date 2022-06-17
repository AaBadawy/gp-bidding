@if(auth()->user()->isAdmin())
    <button class="btn btn-outline-info btn-sm" wire:click="inactivate">{{$switchActivation}}</button>
@else
    <div></div>
@endif
