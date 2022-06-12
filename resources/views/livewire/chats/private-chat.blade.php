<div class="card card-custom">
    <!--begin::Header-->
    <div class="card-header align-items-center px-4 py-3">
        <div class="text-left flex-grow-1">
            <!--begin::Aside Mobile Toggle-->
            <!--end::Aside Mobile Toggle-->
            <!--begin::Dropdown Menu-->
            <div class="dropdown dropdown-inline">
                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md m-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Go Back
                </button>
            </div>
            <!--end::Dropdown Menu-->
        </div>
        <div class="text-center flex-grow-1">
            <div class="text-dark-75 font-weight-bold font-size-h5">{{$chatWith->name}}</div>
            <div>
{{--                <span class="label label-sm label-dot label-success"></span>--}}
{{--                <span class="font-weight-bold text-muted font-size-sm">Active</span>--}}
            </div>
        </div>
        <div class="text-right flex-grow-1">
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body">
        <!--begin::Scroll-->
        <div class="scroll scroll-pull" data-mobile-height="350">
            <!--begin::Messages-->
            <div class="messages">
                @foreach($chatMessages as $message)
                    @if($message->isIn())
                        <livewire:chats.message-in :message="$message" :wire:key="$message->id"/>
                    @else
                        <livewire:chats.message-out :message="$message" :wire:key="$message->id"/>
                    @endif
                @endforeach
            </div>
            <!--end::Messages-->
        </div>
        <!--end::Scroll-->
    </div>
    <!--end::Body-->
    <!--begin::Footer-->
    <div class="card-footer align-items-center">
        <!--begin::Compose-->
        <textarea class="form-control border-0 p-0" rows="2" placeholder="Type a message" wire:model="body"></textarea>
        <div class="d-flex align-items-center justify-content-between mt-5">
            <div>
                <button type="button" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6" wire:click="send">Send</button>
            </div>
        </div>
        <!--begin::Compose-->
    </div>
    <!--end::Footer-->
</div>
