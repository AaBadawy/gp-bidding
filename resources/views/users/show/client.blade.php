@extends('layout.default')

@section('content')
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Profile 2-->
        <div class="d-flex flex-row">
            <!--begin::Aside-->
            <div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
                <!--begin::Card-->
                <div class="card card-custom">
                    <!--begin::Body-->
                    <div class="card-body pt-15">
                        <!--begin::User-->
                        <div class="text-center mb-10">
                            <div class="symbol symbol-60 symbol-circle symbol-xl-90">
                                <div class="symbol-label" style="background-image:url({{asset('media/users/300_21.jpg')}})"></div>
                                <i class="symbol-badge symbol-badge-bottom bg-success"></i>
                            </div>
                            <h4 class="font-weight-bold my-2">{{$user->name}}</h4>
                            <div class="text-muted mb-2">{{$user->email}}</div>

                            <x-datatable.column-type :columns="['active' => 'info','inactive' => 'warning']" :type="$user->status" :class="'label label-light-${$bootstrap_color} label-inline font-weight-bold label-lg'"/>
{{--                            <span class="label label-light-warning label-inline font-weight-bold label-lg">{{$user->status}}</span>--}}
                        </div>
                        <!--end::User-->
                        <!--begin::Contact-->
                        <div class="mb-10 text-center">
                            <a href="#" class="btn btn-icon btn-circle btn-light-facebook mr-2">
                                <i class="socicon-facebook"></i>
                            </a>
                            <a href="#" class="btn btn-icon btn-circle btn-light-twitter mr-2">
                                <i class="socicon-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-icon btn-circle btn-light-google">
                                <i class="socicon-google"></i>
                            </a>
                        </div>
                        <!--end::Contact-->
                        <!--begin::Nav-->
                        <a href="#" class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block active">Profile Overview</a>
                        <a href="#" class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Personal info</a>
                        <a href="#" class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Account Info</a>
                        <a href="#" class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Change Passwort</a>
                        <a href="#" class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Email Settings</a>
                        <a href="#" class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Saved Credit Cards</a>
                        <a href="#" class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Tax information</a>
                        <!--end::Nav-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Aside-->
            <!--begin::Content-->
            <div class="flex-row-fluid ml-lg-8">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-6">
                        <!--begin::List Widget 10-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0">
                                <h3 class="card-title font-weight-bolder text-dark">Notifications</h3>
                                <div class="card-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-ver"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                            <!--begin::Naviigation-->
                                            <ul class="navi">
                                                <li class="navi-header font-weight-bold py-5">
                                                    <span class="font-size-lg">Add New:</span>
                                                    <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                                                </li>
                                                <li class="navi-separator mb-3 opacity-70"></li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                                            <span class="navi-icon">
                                                                                <i class="flaticon2-shopping-cart-1"></i>
                                                                            </span>
                                                        <span class="navi-text">Order</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                                            <span class="navi-icon">
                                                                                <i class="navi-icon flaticon2-calendar-8"></i>
                                                                            </span>
                                                        <span class="navi-text">Members</span>
                                                        <span class="navi-label">
                                                                                <span class="label label-light-danger label-rounded font-weight-bold">3</span>
                                                                            </span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                                            <span class="navi-icon">
                                                                                <i class="navi-icon flaticon2-telegram-logo"></i>
                                                                            </span>
                                                        <span class="navi-text">Project</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                                            <span class="navi-icon">
                                                                                <i class="navi-icon flaticon2-new-email"></i>
                                                                            </span>
                                                        <span class="navi-text">Record</span>
                                                        <span class="navi-label">
                                                                                <span class="label label-light-success label-rounded font-weight-bold">5</span>
                                                                            </span>
                                                    </a>
                                                </li>
                                                <li class="navi-separator mt-3 opacity-70"></li>
                                                <li class="navi-footer pt-5 pb-4">
                                                    <a class="btn btn-light-primary font-weight-bolder btn-sm" href="#">More options</a>
                                                    <a class="btn btn-clean font-weight-bold btn-sm d-none" href="#" data-toggle="tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                                                </li>
                                            </ul>
                                            <!--end::Naviigation-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-0">
                                <!--begin::Item-->
                                <div class="mb-6">
                                    <!--begin::Content-->
                                    <div class="d-flex align-items-center flex-grow-1">
                                        <!--begin::Checkbox-->
                                        <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                            <input type="checkbox" value="1" />
                                            <span></span>
                                        </label>
                                        <!--end::Checkbox-->
                                        <!--begin::Section-->
                                        <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                <!--begin::Title-->
                                                <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Daily Standup Meeting</a>
                                                <!--end::Title-->
                                                <!--begin::Data-->
                                                <span class="text-muted font-weight-bold">Due in 2 Days</span>
                                                <!--end::Data-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Label-->
                                            <span class="label label-lg label-light-primary label-inline font-weight-bold py-4">Approved</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="mb-6">
                                    <!--begin::Content-->
                                    <div class="d-flex align-items-center flex-grow-1">
                                        <!--begin::Checkbox-->
                                        <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                            <input type="checkbox" value="1" />
                                            <span></span>
                                        </label>
                                        <!--end::Checkbox-->
                                        <!--begin::Section-->
                                        <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                <!--begin::Title-->
                                                <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Group Town Hall Meet-up with showcase</a>
                                                <!--end::Title-->
                                                <!--begin::Data-->
                                                <span class="text-muted font-weight-bold">Due in 2 Days</span>
                                                <!--end::Data-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Label-->
                                            <span class="label label-lg label-light-warning label-inline font-weight-bold py-4">In Progress</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="mb-6">
                                    <!--begin::Content-->
                                    <div class="d-flex align-items-center flex-grow-1">
                                        <!--begin::Checkbox-->
                                        <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                            <input type="checkbox" value="1" />
                                            <span></span>
                                        </label>
                                        <!--end::Checkbox-->
                                        <!--begin::Section-->
                                        <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                <!--begin::Title-->
                                                <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Next sprint planning and estimations</a>
                                                <!--end::Title-->
                                                <!--begin::Data-->
                                                <span class="text-muted font-weight-bold">Due in 2 Days</span>
                                                <!--end::Data-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Label-->
                                            <span class="label label-lg label-light-success label-inline font-weight-bold py-4">Success</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="mb-6">
                                    <!--begin::Content-->
                                    <div class="d-flex align-items-center flex-grow-1">
                                        <!--begin::Checkbox-->
                                        <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                            <input type="checkbox" value="1" />
                                            <span></span>
                                        </label>
                                        <!--end::Checkbox-->
                                        <!--begin::Section-->
                                        <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                <!--begin::Title-->
                                                <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Sprint delivery and project deployment</a>
                                                <!--end::Title-->
                                                <!--begin::Data-->
                                                <span class="text-muted font-weight-bold">Due in 2 Days</span>
                                                <!--end::Data-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Label-->
                                            <span class="label label-lg label-light-danger label-inline font-weight-bold py-4">Rejected</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end: Item-->
                                <!--begin: Item-->
                                <div class="">
                                    <!--begin::Content-->
                                    <div class="d-flex align-items-center flex-grow-1">
                                        <!--begin::Checkbox-->
                                        <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                            <input type="checkbox" value="1" />
                                            <span></span>
                                        </label>
                                        <!--end::Checkbox-->
                                        <!--begin::Section-->
                                        <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                <!--begin::Title-->
                                                <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Data analytics research showcase</a>
                                                <!--end::Title-->
                                                <!--begin::Data-->
                                                <span class="text-muted font-weight-bold">Due in 2 Days</span>
                                                <!--end::Data-->
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Label-->
                                            <span class="label label-lg label-light-warning label-inline font-weight-bold py-4">In Progress</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end: Item-->
                            </div>
                            <!--end: Card Body-->
                        </div>
                        <!--end: Card-->
                        <!--end: List Widget 10-->
                    </div>
                    <div class="col-lg-6">
                        <!--begin::Mixed Widget 5-->
                        <div class="card card-custom bg-radial-gradient-primary card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title font-weight-bolder text-white">Auction Stats</h3>
                                <div class="card-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <a href="#" class="btn btn-text-white btn-hover-white btn-sm btn-icon border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-hor"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover">
                                                <li class="navi-header font-weight-bold py-4">
                                                    <span class="font-size-lg">Choose Label:</span>
                                                    <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                                                </li>
                                                <li class="navi-separator mb-3 opacity-70"></li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                                            <span class="navi-text">
                                                                                <span class="label label-xl label-inline label-light-success">Customer</span>
                                                                            </span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                                            <span class="navi-text">
                                                                                <span class="label label-xl label-inline label-light-danger">Partner</span>
                                                                            </span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                                            <span class="navi-text">
                                                                                <span class="label label-xl label-inline label-light-warning">Suplier</span>
                                                                            </span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                                            <span class="navi-text">
                                                                                <span class="label label-xl label-inline label-light-primary">Member</span>
                                                                            </span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                                            <span class="navi-text">
                                                                                <span class="label label-xl label-inline label-light-dark">Staff</span>
                                                                            </span>
                                                    </a>
                                                </li>
                                                <li class="navi-separator mt-3 opacity-70"></li>
                                                <li class="navi-footer py-4">
                                                    <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                                                        <i class="ki ki-plus icon-sm"></i>Add new</a>
                                                </li>
                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body d-flex flex-column p-0">
                                <!--begin::Chart-->
                                <div id="kt_mixed_widget_5_chart" style="height: 200px"></div>
                                <!--end::Chart-->
                                <!--begin::Stats-->
                                <div class="card-spacer bg-white card-rounded flex-grow-1">
                                    <!--begin::Row-->
                                    <div class="row m-0">
                                        <div class="col px-8 py-6 mr-8">
                                            <div class="font-size-sm text-muted font-weight-bold">auction paid</div>
                                            <div class="font-size-h4 font-weight-bolder">$ {{$user->won_auctions_sum_current_price}}</div>
                                        </div>
                                        <div class="col px-8 py-6">
                                            <div class="font-size-sm text-muted font-weight-bold">num of Won Auctions</div>
                                            <div class="font-size-h4 font-weight-bolder">{{$user->won_auctions_count}}</div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <!--end::Row-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Mixed Widget 5-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Advance Table Widget 5-->
                <div class="card card-custom gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 py-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bolder text-dark">Agents Stats</span>
                            <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
                        </h3>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-info font-weight-bolder font-size-sm">New Report</a>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_2">
                                <thead>
                                <tr class="text-uppercase">
                                    <th class="pl-0" style="width: 40px">
                                        <label class="checkbox checkbox-lg checkbox-inline mr-2">
                                            <input type="checkbox" value="1" />
                                            <span></span>
                                        </label>
                                    </th>
                                    <th class="pl-0" style="min-width: 100px">order id</th>
                                    <th style="min-width: 120px">country</th>
                                    <th style="min-width: 150px">
                                        <span class="text-primary">Data &amp; status</span>
                                        <span class="svg-icon svg-icon-sm svg-icon-primary">
                                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Down-2.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                                            <rect fill="#000000" opacity="0.3" x="11" y="4" width="2" height="10" rx="1" />
                                                                            <path d="M6.70710678,19.7071068 C6.31658249,20.0976311 5.68341751,20.0976311 5.29289322,19.7071068 C4.90236893,19.3165825 4.90236893,18.6834175 5.29289322,18.2928932 L11.2928932,12.2928932 C11.6714722,11.9143143 12.2810586,11.9010687 12.6757246,12.2628459 L18.6757246,17.7628459 C19.0828436,18.1360383 19.1103465,18.7686056 18.7371541,19.1757246 C18.3639617,19.5828436 17.7313944,19.6103465 17.3242754,19.2371541 L12.0300757,14.3841378 L6.70710678,19.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 15.999999) scale(1, -1) translate(-12.000003, -15.999999)" />
                                                                        </g>
                                                                    </svg>
                                            <!--end::Svg Icon-->
                                                                </span>
                                    </th>
                                    <th style="min-width: 150px">company</th>
                                    <th style="min-width: 130px">status</th>
                                    <th class="pr-0 text-right" style="min-width: 160px">action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="pl-0 py-6">
                                        <label class="checkbox checkbox-lg checkbox-inline">
                                            <input type="checkbox" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td class="pl-0">
                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">56037-XDER</a>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Brasil</span>
                                        <span class="text-muted font-weight-bold">Code: BR</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">05/28/2020</span>
                                        <span class="text-muted font-weight-bold">Paid</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                                        <span class="text-muted font-weight-bold">Web, UI/UX Design</span>
                                    </td>
                                    <td>
                                        <span class="label label-lg label-light-primary label-inline">Approved</span>
                                    </td>
                                    <td class="pr-0 text-right">
                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                                                <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                        </a>
                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                        </a>
                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-0 py-6">
                                        <label class="checkbox checkbox-lg checkbox-inline">
                                            <input type="checkbox" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td class="pl-0">
                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">05822-FXSP</a>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Belarus</span>
                                        <span class="text-muted font-weight-bold">Code: BY</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">02/04/2020</span>
                                        <span class="text-muted font-weight-bold">Rejected</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Agoda</span>
                                        <span class="text-muted font-weight-bold">Houses &amp; Hotels</span>
                                    </td>
                                    <td>
                                        <span class="label label-lg label-light-warning label-inline">In Progress</span>
                                    </td>
                                    <td class="pr-0 text-right">
                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                                                <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                        </a>
                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                        </a>
                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-0 py-6">
                                        <label class="checkbox checkbox-lg checkbox-inline">
                                            <input type="checkbox" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td class="pl-0">
                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary ont-size-lg">00347-BCLQ</a>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Phillipines</span>
                                        <span class="text-muted font-weight-bold">Code: PH</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">23/12/2020</span>
                                        <span class="text-muted font-weight-bold">Paid</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">RoadGee</span>
                                        <span class="text-muted font-weight-bold">Transportation</span>
                                    </td>
                                    <td>
                                        <span class="label label-lg label-light-success label-inline">Success</span>
                                    </td>
                                    <td class="pr-0 text-right">
                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                                                <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                        </a>
                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                        </a>
                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-0 py-6">
                                        <label class="checkbox checkbox-lg checkbox-inline">
                                            <input type="checkbox" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td class="pl-0">
                                        <a href="#" class="text-dark font-weight-bolder text-hover-primary font-size-lg">4472-QREX</a>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Argentina</span>
                                        <span class="text-muted font-weight-bold">Code: AR</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">17/09/2021</span>
                                        <span class="text-muted font-weight-bold">Pending</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">The Hill</span>
                                        <span class="text-muted font-weight-bold">Insurance</span>
                                    </td>
                                    <td>
                                        <span class="label label-lg label-light-danger label-inline">Rejected</span>
                                    </td>
                                    <td class="pr-0 text-right">
                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                                                <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                        </a>
                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                        </a>
                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Advance Table Widget 5-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Profile 2-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
@endsection
