@extends('layouts.app')
@push('addon-style')
<style>
    .slider {
        width: 640px;
        /*Same as width of the large image*/
        position: relative;
        /*Instead of height we will use padding*/
        padding-top: 320px;
        /*That helps bring the labels down*/

        margin: 10px auto;

        /*Lets add a shadow*/
    }

    .slider>img {
        position: absolute;
        left: 0;
        top: 0;
        transition: all 0.5s;
    }

    .slider input[name='slide_switch'] {
        display: none;
    }

    .slider label {
        /*Lets add some spacing for the thumbnails*/
        margin: 18px 0 0 18px;
        border: 3px solid #999;

        float: left;
        cursor: pointer;
        transition: all 0.5s;

        /*Default style = low opacity*/
        opacity: 0.6;
    }

    .slider label img {
        display: block;
    }

    .slider input[name='slide_switch']:checked+label {
        border-color: #666;
        opacity: 1;
    }

    /*Clicking any thumbnail now should change its opacity(style)*/
    /*Time to work on the main images*/
    .slider input[name='slide_switch']~img {
        opacity: 0;
        transform: scale(1.1);
    }

    .slider input[name='slide_switch']:checked+label+img {
        opacity: 1;
        transform: scale(1);
    }

</style>
@endpush

@section('name')
Bengkel Detail
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
                <!--begin::Layout-->
                <div class="flex-row-fluid">
                    <!--begin::Section-->
                    <div class="row">
                        <div class="col-md-6 col-lg-12 col-xxl-6">
                            <!--begin::Engage Widget 14-->
                            <div class="card card-custom gutter-b gutter-b">
                                <div class="slider">
                                    <input type="radio" name="slide_switch" id="id1" />
                                    <label for="id1">
                                        <img src="http://thecodeplayer.com/uploads/media/3yiC6Yq.jpg" width="100" />
                                    </label>
                                    <img src="http://thecodeplayer.com/uploads/media/3yiC6Yq.jpg" />

                                    <!--Lets show the second image by default on page load-->
                                    <input type="radio" name="slide_switch" id="id2" checked="checked" />
                                    <label for="id2">
                                        <img src="http://thecodeplayer.com/uploads/media/40Ly3VB.jpg" width="100" />
                                    </label>
                                    <img src="http://thecodeplayer.com/uploads/media/40Ly3VB.jpg" />

                                    <input type="radio" name="slide_switch" id="id3" />
                                    <label for="id3">
                                        <img src="http://thecodeplayer.com/uploads/media/00kih8g.jpg" width="100" />
                                    </label>
                                    <img src="http://thecodeplayer.com/uploads/media/00kih8g.jpg" />

                                    <input type="radio" name="slide_switch" id="id4" />
                                    <label for="id4">
                                        <img src="http://thecodeplayer.com/uploads/media/2rT2vdx.jpg" width="100" />
                                    </label>
                                    <img src="http://thecodeplayer.com/uploads/media/2rT2vdx.jpg" />

                                    <input type="radio" name="slide_switch" id="id5" />
                                    <label for="id5">
                                        <img src="http://thecodeplayer.com/uploads/media/8k3N3EL.jpg" width="100" />
                                    </label>
                                    <img src="http://thecodeplayer.com/uploads/media/8k3N3EL.jpg" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xxl-6">
                            <div class="card card-custom card-stretch gutter-b">
                                <!--begin::Card Body-->
                                <div class="card-body">
                                    <h3 class="font-weight-bold font-size-h2 text-dark-75 mb-3">Bengkel Satu
                                        Hati</h3>

                                    <div class="row">

                                        <div class="col-9">
                                            <div class="separator separator-solid separator-border-4"></div>


                                            <p class="font-size-h6">Jalan nusan gang nuri 4 no 15 sebelah cocomart pagar
                                                kuning</p>
                                            <p class="font-size-h6">08.00 - 24.00</p>
                                            <p class="font-size-h6">081 934 630 073</p>

                                        </div>
                                        <div class="col-3">
                                            <a href="#" class="btn btn-light-success font-weight-bold mr-3 mb-5 btn-block">MAPS</a>
                                            <a href="#" class="btn btn-light-success font-weight-bold mr-3 mb-5 btn-block">FAQ</a>
                                            <a href="#" class="btn btn-light-success font-weight-bold mr-3 mb-5 btn-block ">Reservasi</a>

                                        </div>
                                    </div>



                                    <!--begin::Info-->

                                    <!--end::Info-->

                                </div>

                                <!--end::Card Body-->
                            </div>
                            <!--end::Card-->
                            <!--end::Stats Widget 33-->
                        </div>

                        <div class="col-md-6 col-lg-12 col-xxl-6">
                            <!--begin::List Widget 19-->
                            <div class="card card-custom example example-compact gutter-b">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">Sparepart</h3>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="scroll scroll-pull ps ps--active-y" data-scroll="true"
                                        style="height: 400px; overflow: hidden;">
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid" style=" margin:auto">
                                                <!--begin::Info-->
                                                <div class=" flex-wrap" >
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <div class="separator separator-solid separator-border-2"></div>
                                                    
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">Reply</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">Reply</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">Reply</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">Reply</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">Reply</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">Reply</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">Reply</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">Reply</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">Reply</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">Reply</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                    </div>
                                    <!--begin: Example code-->

                                </div>
                            </div>


                        </div>
                        <div class="col-md-6 col-lg-12 col-xxl-6">
                            <!--begin::List Widget 19-->
                            <div class="card card-custom example example-compact gutter-b">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">Perbaikan</h3>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="scroll scroll-pull ps ps--active-y" data-scroll="true"
                                        style="height: 400px; overflow: hidden;">
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span class="text-muted font-weight-normal font-size-sm">4</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">Reply</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">Reply</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">Reply</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">Reply</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">Reply</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">Reply</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">Reply</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">Reply</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">Reply</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">Mr.
                                                        Anderson</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">1
                                                        Day ago</span>
                                                    <span
                                                        class="text-muted font-weight-normal font-size-sm">Reply</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">Long
                                                    before you sit dow to put digital pen to paper you need to make
                                                    sure
                                                    you have to sit down and write.</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                    </div>
                                    <!--begin: Example code-->

                                </div>
                            </div>


                        </div>

                    </div>

                </div>
                <!--end::Section-->
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

@push('addon-style')
<script src="http://thecodeplayer.com/uploads/js/prefixfree.js" type="text/javascript"></script>
@endpush
