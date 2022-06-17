<div class="d-flex flex-column mb-5 align-items-start" wire:ignore>
    <div class="d-flex align-items-center">
        <div class="symbol symbol-circle symbol-40 mr-3">
            <img alt="Pic" src="{{! empty($message->to->getFirstMediaUrl('profile_image')) ? $message->to->getFirstMediaUrl('profile_image') : asset('media/users/300_12.jpg')}}" />
        </div>
        <div>
            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">{{$message->to->name}}</a>
            <span class="text-muted font-size-sm">{{$message->created_at->format("y-m-d h:m")}}</span>
        </div>
    </div>
    <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">{{$message->body}}</div>
</div>
