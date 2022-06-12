
<div class="d-flex flex-row">
    @if(is_null($directTo))
    <livewire:chats.my-clients />
    @endif
    <!--begin::Content-->
    <div class="flex-row-fluid ml-lg-8" id="kt_chat_content">
    <!--begin::Card-->
        <livewire:chats.private-chat :chatWith="$directTo"/>
    <!--end::Card-->
    </div>
<!--end::Content-->
</div>
