<div class="flex-row-auto offcanvas-mobile w-30px w-xl-350px col-xxl-3" id="kt_profile_aside">
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <!--begin::Body-->
        @if(is_null($lastBidder))
            <div class="card-body pt-4">
                No Involved Clients Yet
            </div>
        @else
            <div class="card-body pt-4">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end">
                    <div class="dropdown dropdown-inline">
                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ki ki-bold-more-hor"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <!--begin::Navigation-->
                            <ul class="navi navi-hover py-5">
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-drop"></i>
																		</span>
                                        <span class="navi-text">New Group</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-list-3"></i>
																		</span>
                                        <span class="navi-text">Contacts</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
                                        <span class="navi-text">Groups</span>
                                        <span class="navi-link-badge">
																			<span class="label label-light-primary label-inline font-weight-bold">new</span>
																		</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-bell-2"></i>
																		</span>
                                        <span class="navi-text">Calls</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-gear"></i>
																		</span>
                                        <span class="navi-text">Settings</span>
                                    </a>
                                </li>
                                <li class="navi-separator my-3"></li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-magnifier-tool"></i>
																		</span>
                                        <span class="navi-text">Help</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-bell-2"></i>
																		</span>
                                        <span class="navi-text">Privacy</span>
                                        <span class="navi-link-badge">
																			<span class="label label-light-danger label-rounded font-weight-bold">5</span>
																		</span>
                                    </a>
                                </li>
                            </ul>
                            <!--end::Navigation-->
                        </div>
                    </div>
                </div>
                <!--end::Toolbar-->
                <!--begin::User-->
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                        <div class="symbol-label" style="background-image:url({{asset_metronic('media/users/300_13.jpg')}})"></div>
                        <i class="symbol-badge bg-success"></i>
                    </div>
                    <div>
                        <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{$lastBidder?->name}}</a>
                        {{--                    <div class="text-muted">Application Developer</div>--}}
                        <div class="mt-2">
                            <a href="#" class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1">Chat</a>
                            <a href="#" class="btn btn-sm btn-success font-weight-bold py-2 px-3 px-xxl-5 my-1" wire:click="do">Block</a>
                        </div>
                    </div>
                </div>
                <!--end::User-->
                <!--begin::Contact-->
                <div class="pt-8 pb-6">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">Email:</span>
                        <a href="#" class="text-muted text-hover-primary">{{$lastBidder?->email}}</a>
                    </div>
                </div>
                <!--end::Contact-->
                <!--begin::Contact-->
                <!--end::Contact-->
                <a href="#" class="btn btn-light-success font-weight-bold py-3 px-6 mb-2 text-center btn-block">Profile Overview</a>
            </div>
        @endif
        <!--end::Body-->
    </div>
    <!--end::Card-->
</div>
