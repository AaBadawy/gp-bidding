<nav wire:click="routeTo" @class(["d-flex  align-items-center rounded p-5 gutter-b bg-hover-light-primary", "bg-primary" => is_null($notification->read_at), "bg-light-primary" => $notification->read_at])>
                    <span class="svg-icon svg-icon-warning mr-5">
                        {{ \App\Classes\Theme\Metronic::getSVG("media/svg/icons/Home/Library.svg", "svg-icon-lg") }}
                    </span>
    <div class="d-flex flex-column flex-grow-1 mr-2">
        <h5 class="font-weight-normal text-dark-75 text-hover-info font-size-lg mb-1">{{$notification->data['title']}}</h5>
        <span class="text-dark-25 font-size-sm">{{$notification->data['content']}}</span>
    </div>
</nav>
