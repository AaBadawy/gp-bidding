<div class="d-flex flex-column mb-5 align-items-end" wire:ignore>
    <div class="d-flex align-items-center">
        <div>
            <span class="text-muted font-size-sm">{{$message->created_at->format("y-m-d h:m")}}</span>
            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
        </div>
        <div class="symbol symbol-circle symbol-40 ml-3">
            <img alt="Pic" src="{{asset('media/users/300_21.jpg')}}" />
        </div>
    </div>
    <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">{{$message->body}}</div>
</div>
