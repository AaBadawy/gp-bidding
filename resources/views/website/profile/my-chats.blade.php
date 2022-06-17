@extends("layout.default",['stopDisplaySide' => true,'stopDisplayHeader' => true])

@section("content")
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Chat-->
            <livewire:chats.my-chats :directTo="$directTo"/>
            <!--end::Chat-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
