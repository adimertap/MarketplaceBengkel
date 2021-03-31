@extends('layouts.app')

@section('name')
FAQ
@endsection
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Page Layout-->
            <div class="d-flex flex-row">
                <!--begin::Aside-->
                <div class="col-5" id="kt_profile_aside" data-sticky-container>
                    <!--begin::Forms Widget 15-->
                    <div class="card card-custom sticky" data-sticky="true" data-margin-top="140px"
                        data-sticky-for="1023" data-sticky-class="kt-sticky">
                        <div class="card card-custom gutter-b">
                            <!--begin::Body-->
                            <div class="card card-custom bg-light gutter-b">
                                <!--begin::Header-->
                                <div class="card-header border-0">
                                    <h3 class="card-title font-weight-bold text-dark">Send Message</h3>

                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body pt-2">
                                    <!--begin::Form-->
                                    <form class="form" id="kt_form_1">
                                        <div class="form-group">
                                            <textarea class="form-control border-0" name="memo" rows="4"
                                                placeholder="Message" id="kt_forms_widget_1_input"
                                                style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 94px;"></textarea>
                                        </div>
                                        <div class="mt-10">
                                            <button class="btn btn-primary font-weight-bold">Kirim</button>
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>

                        <!--end::Body-->
                    </div>
                    <!--end::Forms Widget 15-->
                </div>
                <!--end::Aside-->
                <!--begin::Layout-->
                <div class="flex-row-fluid ml-lg-7">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Container-->
                            <div>
                                <!--begin::Header-->
                                <div class="d-flex align-items-center pb-4">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40 symbol-light-success mr-5">
                                        <span class="symbol-label">
                                            <img src="assets/media/svg/avatars/018-girl-9.svg"
                                                class="h-75 align-self-end" alt="">
                                        </span>
                                    </div>
                                    <!--end::Symbol-->

                                    <!--begin::Info-->
                                    <div class="d-flex flex-column flex-grow-1">
                                        <a href="#"
                                            class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Grace
                                            Logan</a>
                                        <span class="text-muted font-weight-bold">Yestarday at 5:06 PM</span>
                                    </div>
                                    <!--end::Info-->

                                  
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div>
                                    <!--begin::Text-->
                                    <p class="text-dark-75 font-size-lg font-weight-normal">
                                        Outlines keep you honest. They stop you from indulging in
                                        poorly thought-out metaphors about driving and keep you
                                        focused on the overall structure of your post
                                    </p>
                                    <!--end::Text-->

                                 
                                
                                    <!--begin::Item-->
                                    <div class="d-flex">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                            <span class="symbol-label">
                                                <img src="assets/media/svg/avatars/003-girl-1.svg"
                                                    class="h-75 align-self-end" alt="">
                                            </span>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Info-->
                                        <div class="d-flex flex-column flex-row-fluid">
                                            <!--begin::Info-->
                                            <div class="d-flex align-items-center flex-wrap">
                                                <a href="#"
                                                    class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mrs.
                                                    Anderson</a>
                                                <span class="text-muted font-weight-normal flex-grow-1 font-size-sm">2
                                                    Days ago</span>
                                            </div>

                                            <span class="text-dark-75 font-size-sm font-weight-normal pt-1">
                                                Long before you sit down to put digital pen to paper
                                            </span>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Container-->

                            <!--begin::Separator-->
                            <div class="separator separator-solid mt-5 mb-4"></div>
                            <!--end::Separator-->

                           
                        </div>


                        <!--end::Body-->
                    </div>
                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Container-->
                            <div>
                                <!--begin::Header-->
                                <div class="d-flex align-items-center pb-4">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40 symbol-light-success mr-5">
                                        <span class="symbol-label">
                                            <img src="assets/media/svg/avatars/018-girl-9.svg"
                                                class="h-75 align-self-end" alt="">
                                        </span>
                                    </div>
                                    <!--end::Symbol-->

                                    <!--begin::Info-->
                                    <div class="d-flex flex-column flex-grow-1">
                                        <a href="#"
                                            class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Grace
                                            Logan</a>
                                        <span class="text-muted font-weight-bold">Yestarday at 5:06 PM</span>
                                    </div>
                                    <!--end::Info-->

                                  
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div>
                                    <!--begin::Text-->
                                    <p class="text-dark-75 font-size-lg font-weight-normal">
                                        Outlines keep you honest. They stop you from indulging in
                                        poorly thought-out metaphors about driving and keep you
                                        focused on the overall structure of your post
                                    </p>
                                    <!--end::Text-->

                                 
                                
                                    <!--begin::Item-->
                                    <div class="d-flex">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                            <span class="symbol-label">
                                                <img src="assets/media/svg/avatars/003-girl-1.svg"
                                                    class="h-75 align-self-end" alt="">
                                            </span>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Info-->
                                        <div class="d-flex flex-column flex-row-fluid">
                                            <!--begin::Info-->
                                            <div class="d-flex align-items-center flex-wrap">
                                                <a href="#"
                                                    class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mrs.
                                                    Anderson</a>
                                                <span class="text-muted font-weight-normal flex-grow-1 font-size-sm">2
                                                    Days ago</span>
                                            </div>

                                            <span class="text-dark-75 font-size-sm font-weight-normal pt-1">
                                                Long before you sit down to put digital pen to paper
                                            </span>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Container-->

                            <!--begin::Separator-->
                            <div class="separator separator-solid mt-5 mb-4"></div>
                            <!--end::Separator-->

                           
                        </div>

                        
                        <!--end::Body-->
                    </div>
                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Container-->
                            <div>
                                <!--begin::Header-->
                                <div class="d-flex align-items-center pb-4">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40 symbol-light-success mr-5">
                                        <span class="symbol-label">
                                            <img src="assets/media/svg/avatars/018-girl-9.svg"
                                                class="h-75 align-self-end" alt="">
                                        </span>
                                    </div>
                                    <!--end::Symbol-->

                                    <!--begin::Info-->
                                    <div class="d-flex flex-column flex-grow-1">
                                        <a href="#"
                                            class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Grace
                                            Logan</a>
                                        <span class="text-muted font-weight-bold">Yestarday at 5:06 PM</span>
                                    </div>
                                    <!--end::Info-->

                                  
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div>
                                    <!--begin::Text-->
                                    <p class="text-dark-75 font-size-lg font-weight-normal">
                                        Outlines keep you honest. They stop you from indulging in
                                        poorly thought-out metaphors about driving and keep you
                                        focused on the overall structure of your post
                                    </p>
                                    <!--end::Text-->

                                 
                                
                                    <!--begin::Item-->
                                    <div class="d-flex">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                            <span class="symbol-label">
                                                <img src="assets/media/svg/avatars/003-girl-1.svg"
                                                    class="h-75 align-self-end" alt="">
                                            </span>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Info-->
                                        <div class="d-flex flex-column flex-row-fluid">
                                            <!--begin::Info-->
                                            <div class="d-flex align-items-center flex-wrap">
                                                <a href="#"
                                                    class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mrs.
                                                    Anderson</a>
                                                <span class="text-muted font-weight-normal flex-grow-1 font-size-sm">2
                                                    Days ago</span>
                                            </div>

                                            <span class="text-dark-75 font-size-sm font-weight-normal pt-1">
                                                Long before you sit down to put digital pen to paper
                                            </span>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Container-->

                            <!--begin::Separator-->
                            <div class="separator separator-solid mt-5 mb-4"></div>
                            <!--end::Separator-->

                           
                        </div>

                        
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Layout-->
            </div>
            <!--end::Page Layout-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->
@endsection

@push('addon-script')
<!--begin::Page Scripts(used by this page)-->
<script src="user/assets/js/pages/widgets.js"></script>
<!--end::Page Scripts-->
<!--begin::Page Scripts(used by this page)-->
<script src="user/assets/js/pages/features/miscellaneous/sticky-panels.js?v=7.0.6"></script>
<!--end::Page Scripts-->
@endpush
