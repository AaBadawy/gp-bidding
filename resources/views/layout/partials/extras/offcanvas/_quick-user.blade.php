@php
	$direction = config('layout.extras.user.offcanvas.direction', 'right');
@endphp
 {{-- User Panel --}}
<div id="kt_quick_user" class="offcanvas offcanvas-{{ $direction }} p-10">
	{{-- Header --}}
	<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
		<h3 class="font-weight-bold m-0">
			User Profile
			<small class="text-muted font-size-sm ml-2">{{auth()->user()->receivedMessages()->groupBy("from_id")->count()}} messages</small>
		</h3>
		<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
			<i class="ki ki-close icon-xs text-muted"></i>
		</a>
	</div>

	{{-- Content --}}
    <div class="offcanvas-content pr-5 mr-n5">
		{{-- Header --}}
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <div class="symbol-label" style="background-image:url('{{ ! empty(auth()->user()->getFirstMediaUrl('profile_image')) ? auth()->user()->getFirstMediaUrl('profile_image') : asset('media/users/300_21.jpg') }}')"></div>
				<i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
                    {{auth()->user()->name}}
				</a>
                <div class="text-muted mt-1">
                    {{auth()->user()->email}}
                </div>
            </div>
        </div>

		{{-- Separator --}}
		<div class="separator separator-dashed mt-8 mb-5"></div>

		{{-- Nav --}}
		<div class="navi navi-spacer-x-0 p-0">
{{--		    --}}{{-- Item --}}
{{--		    <a href="#" class="navi-item">--}}
{{--		        <div class="navi-link">--}}
{{--		            <div class="symbol symbol-40 bg-light mr-3">--}}
{{--		                <div class="symbol-label">--}}
{{--							{{ \App\Classes\Theme\Metronic::getSVG("media/svg/icons/General/Notification2.svg", "svg-icon-md svg-icon-success") }}--}}
{{--						</div>--}}
{{--		            </div>--}}
{{--		            <div class="navi-text">--}}
{{--		                <div class="font-weight-bold">--}}
{{--		                    My Profile--}}
{{--		                </div>--}}
{{--		                <div class="text-muted">--}}
{{--		                    Account settings and more--}}
{{--		                    <span class="label label-light-danger label-inline font-weight-bold">update</span>--}}
{{--		                </div>--}}
{{--		            </div>--}}
{{--		        </div>--}}
{{--		    </a>--}}

		    {{-- Item --}}
		    <a href="{{route('dashboard.my-chats')}}"  class="navi-item">
		        <div class="navi-link">
					<div class="symbol symbol-40 bg-light mr-3">
						<div class="symbol-label">
 						   {{ \App\Classes\Theme\Metronic::getSVG("media/svg/icons/Shopping/Chart-bar1.svg", "svg-icon-md svg-icon-warning") }}
 					   </div>
				   	</div>
		            <nav class="navi-text">
		                <div class="font-weight-bold">
		                    My Messages
		                </div>
		                <div class="text-muted">
                            all chats
		                </div>
		            </nav>
		        </div>
		    </a>
		</div>

		{{-- Separator --}}
		<div class="separator separator-dashed my-7"></div>

		{{-- Notifications --}}
		<div>
			{{-- Heading --}}
        	<h5 class="mb-5">
            	Recent Notifications
        	</h5>

            @foreach(auth()->user()->notifications()->latest()->limit(6)->get() as $notification)
                <livewire:dashboard.notification :notification="$notification" />
            @endforeach

		</div>
    </div>
</div>
