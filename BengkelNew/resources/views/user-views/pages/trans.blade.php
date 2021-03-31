@extends('layouts.app')

@section('name')
Trnansaction
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
                <div class="flex-row-fluid ml-lg-8">
                    <div class="example-preview ">
                        <ul class="nav nav-light-success nav-pills " id="myTab3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab-3" data-toggle="tab" href="#semua-3">
                                    <span class="nav-icon"><i class="flaticon2-chat-1"></i></span>
                                    <span class="nav-text">Semua</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="selesai-tab-3" data-toggle="tab" href="#selesai-3"
                                    aria-controls="profile">
                                    <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                    <span class="nav-text">Selesai</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="profile-tab-3" data-toggle="tab" href="#diproses-3"
                                    aria-controls="profile">
                                    <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                    <span class="nav-text">Diproses</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="profile-tab-3" data-toggle="tab" href="#dibatalkan-3"
                                    aria-controls="profile">
                                    <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                    <span class="nav-text">Dibatalkan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="profile-tab-3" data-toggle="tab" href="#dikirim-3"
                                    aria-controls="profile">
                                    <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                    <span class="nav-text">Dikirim</span>
                                </a>
                            </li>

                        </ul>

                        <div class="tab-content mt-5" id="myTabContent3">
                            <div class="tab-pane fade active show" id="semua-3" role="tabpanel"
                                aria-labelledby="semua-tab-3">
                                <!--begin::Section-->
                                <div class="card card-custom gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label font-weight-bolder font-size-h3 text-dark">Toko
                                                Bengkel
                                                AA</span>
                                        </h3>
                                        <div class="card-toolbar">
                                            <div class="dropdown dropdown-inline">
                                                <a href="#"
                                                    class="btn btn-primary font-weight-bolder font-size-sm">Menunggu
                                                    Pembayaran</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Header-->

                                    <div class="card-body" style="
                                                padding-bottom: 0px;
                                                padding-top: 0px;
                                            ">
                                        <!--begin::Shopping Cart-->
                                        <div class="table-responsive">
                                            <div class="card-body" style="
                                                    padding-bottom: 0px;
                                                    padding-top: 0px;
                                                ">
                                                <table class="table">
                                                    <!--begin::Cart Header-->
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th class="text-right">Harga Total</th>
                                                        </tr>
                                                    </thead>
                                                    <!--end::Cart Header-->
                                                    <tbody>
                                                        <!--begin::Cart Content-->
                                                        <tr>
                                                            <td class="d-flex align-items-center font-weight-bolder">
                                                                <!--begin::Symbol-->
                                                                <div
                                                                    class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                                                    <div class="symbol-label"
                                                                        style="background-image: url('assets/media/products/11.png')">
                                                                    </div>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <a href="#" class="text-dark text-hover-primary">Street
                                                                    Sneakers x1</a>
                                                            </td>

                                                            <td
                                                                class="text-right align-middle font-weight-bolder font-size-h5">
                                                                $90.00
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td class="d-flex align-items-center font-weight-bolder">
                                                                <!--begin::Symbol-->
                                                                <div
                                                                    class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                                                    <div class="symbol-label"
                                                                        style="background-image: url('assets/media/products/2.png')">
                                                                    </div>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <a href="#"
                                                                    class="text-dark text-hover-primary">Headphones</a>
                                                            </td>
                                                            <td
                                                                class="text-right align-middle font-weight-bolder font-size-h5">
                                                                $449.00
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td class="d-flex align-items-center font-weight-bolder">
                                                                <!--begin::Symbol-->
                                                                <div
                                                                    class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                                                    <div class="symbol-label"
                                                                        style="background-image: url('assets/media/products/1.png')">
                                                                    </div>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <a href="#"
                                                                    class="text-dark text-hover-primary">Smartwatch</a>
                                                            </td>
                                                            <td
                                                                class="text-right align-middle font-weight-bolder font-size-h5">
                                                                $999.00
                                                            </td>

                                                        </tr>
                                                        <!--end::Cart Content-->
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                        <!--end::Shopping Cart-->
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Card-->
                                                <div class="card card-custom gutter-b card-stretch">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
                                                        <!--begin::Content-->
                                                        <div class="">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center">
                                                                <span
                                                                    class="text-dark-75 font-weight-bolder mr-2">Nama:</span>
                                                                <span
                                                                    class="text-muted text-hover-primary">Hallooo</span>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-between align-items-cente my-1">
                                                                <span
                                                                    class="text-dark-75 font-weight-bolder mr-2">Alamat:</span>
                                                                <span
                                                                    class="text-muted text-hover-primary">asdasdpoqwdoqpwdj</span>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-between align-items-center">
                                                                <span class="text-dark-75 font-weight-bolder mr-2">No
                                                                    HP:</span>
                                                                <span class="text-muted font-weight-bold">081 081 093
                                                                    032</span>
                                                            </div>
                                                        </div>
                                                        <!--end::Content-->

                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <div class="col-xl-6">
                                                <!--begin::Card-->
                                                <div class="card card-custom gutter-b card-stretch">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
                                                        <!--begin::Content-->
                                                        <div class="">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center">
                                                                <span class="text-dark-75 font-weight-bolder mr-2">Sub
                                                                    Total:</span>
                                                                <span
                                                                    class="text-right align-middle font-weight-bolder font-size-h5">
                                                                    Rp 100.000
                                                                </span>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-between align-items-cente my-1">
                                                                <span
                                                                    class="text-dark-75 font-weight-bolder mr-2">Pengiriman
                                                                    JNT YES</span>
                                                                <span
                                                                    class="text-right align-middle font-weight-bolder font-size-h5">
                                                                    Rp 100.000
                                                                </span>
                                                            </div>
                                                            <div
                                                                class="separator separator-solid separator-border-2 separator-dark">
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-between align-items-center">
                                                                <span class="text-dark-75 font-weight-bolder mr-2">TOTAL
                                                                    :</span>
                                                                <span
                                                                    class="text-right align-middle font-weight-bolder font-size-h5">
                                                                    Rp 200.000
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!--end::Content-->

                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <!--begin::Card-->
                                                <div class="card card-custom gutter-b card-stretch">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
                                                        <!--begin::Content-->
                                                        <a href="#"
                                                            class="btn btn-text-dark btn-hover-light-dark font-weight-bold mr-2 btn-block">Resi
                                                            : JNR12312</a>

                                                        <!--end::Content-->

                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <div class="col-xl-4">
                                                <!--begin::Card-->
                                                <div class="card card-custom gutter-b card-stretch">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
                                                        <!--begin::Content-->
                                                        <a href="#"
                                                            class="btn btn-light-success btn-block font-weight-bold mr-2">Barang
                                                            Diterima</a>
                                                        <!--end::Content-->

                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <div class="col-xl-4">
                                                <!--begin::Card-->
                                                <div class="card card-custom gutter-b card-stretch">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
                                                        <!--begin::Content-->
                                                        <a href="#"
                                                            class="btn btn-light-danger btn-block font-weight-bold mr-2">Komplain</a>
                                                        <!--end::Content-->

                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Section-->
                            </div>
                            <div class="tab-pane fade active show" id="selesai-3" role="tabpanel"
                                aria-labelledby="selesai-tab-3">
                                <!--begin::Section-->
                                <div class="card card-custom gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label font-weight-bolder font-size-h3 text-dark">Toko
                                                Bengkel
                                                AA</span>
                                        </h3>
                                        <div class="card-toolbar">
                                            <div class="dropdown dropdown-inline">
                                                <a href="#"
                                                    class="btn btn-primary font-weight-bolder font-size-sm">Selesai</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Header-->

                                    <div class="card-body" style="
                                                padding-bottom: 0px;
                                                padding-top: 0px;
                                            ">
                                        <!--begin::Shopping Cart-->
                                        <div class="table-responsive">
                                            <div class="card-body" style="
                                                    padding-bottom: 0px;
                                                     padding-top: 0px;
                                                ">
                                                <table class="table">
                                                    <!--begin::Cart Header-->
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th class="text-right">Harga Total</th>
                                                        </tr>
                                                    </thead>
                                                    <!--end::Cart Header-->
                                                    <tbody>
                                                        <!--begin::Cart Content-->
                                                        <tr>
                                                            <td class="d-flex align-items-center font-weight-bolder">
                                                                <!--begin::Symbol-->
                                                                <div
                                                                    class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                                                    <div class="symbol-label"
                                                                        style="background-image: url('assets/media/products/11.png')">
                                                                    </div>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <a href="#" class="text-dark text-hover-primary">Street
                                                                    Sneakers x1</a>
                                                            </td>

                                                            <td
                                                                class="text-right align-middle font-weight-bolder font-size-h5">
                                                                $90.00
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td class="d-flex align-items-center font-weight-bolder">
                                                                <!--begin::Symbol-->
                                                                <div
                                                                    class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                                                    <div class="symbol-label"
                                                                        style="background-image: url('assets/media/products/2.png')">
                                                                    </div>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <a href="#"
                                                                    class="text-dark text-hover-primary">Headphones</a>
                                                            </td>
                                                            <td
                                                                class="text-right align-middle font-weight-bolder font-size-h5">
                                                                $449.00
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td class="d-flex align-items-center font-weight-bolder">
                                                                <!--begin::Symbol-->
                                                                <div
                                                                    class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                                                    <div class="symbol-label"
                                                                        style="background-image: url('assets/media/products/1.png')">
                                                                    </div>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <a href="#"
                                                                    class="text-dark text-hover-primary">Smartwatch</a>
                                                            </td>
                                                            <td
                                                                class="text-right align-middle font-weight-bolder font-size-h5">
                                                                $999.00
                                                            </td>

                                                        </tr>
                                                        <!--end::Cart Content-->
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                        <!--end::Shopping Cart-->
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Card-->
                                                <div class="card card-custom gutter-b card-stretch">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
                                                        <!--begin::Content-->
                                                        <div class="">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center">
                                                                <span
                                                                    class="text-dark-75 font-weight-bolder mr-2">Nama:</span>
                                                                <span
                                                                    class="text-muted text-hover-primary">Hallooo</span>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-between align-items-cente my-1">
                                                                <span
                                                                    class="text-dark-75 font-weight-bolder mr-2">Alamat:</span>
                                                                <span
                                                                    class="text-muted text-hover-primary">asdasdpoqwdoqpwdj</span>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-between align-items-center">
                                                                <span class="text-dark-75 font-weight-bolder mr-2">No
                                                                    HP:</span>
                                                                <span class="text-muted font-weight-bold">081 081 093
                                                                    032</span>
                                                            </div>
                                                        </div>
                                                        <!--end::Content-->

                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <div class="col-xl-6">
                                                <!--begin::Card-->
                                                <div class="card card-custom gutter-b card-stretch">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
                                                        <!--begin::Content-->
                                                        <div class="">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center">
                                                                <span class="text-dark-75 font-weight-bolder mr-2">Sub
                                                                    Total:</span>
                                                                <span
                                                                    class="text-right align-middle font-weight-bolder font-size-h5">
                                                                    Rp 100.000
                                                                </span>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-between align-items-cente my-1">
                                                                <span
                                                                    class="text-dark-75 font-weight-bolder mr-2">Pengiriman
                                                                    JNT YES</span>
                                                                <span
                                                                    class="text-right align-middle font-weight-bolder font-size-h5">
                                                                    Rp 100.000
                                                                </span>
                                                            </div>
                                                            <div
                                                                class="separator separator-solid separator-border-2 separator-dark">
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-between align-items-center">
                                                                <span class="text-dark-75 font-weight-bolder mr-2">TOTAL
                                                                    :</span>
                                                                <span
                                                                    class="text-right align-middle font-weight-bolder font-size-h5">
                                                                    Rp 200.000
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!--end::Content-->

                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <!--begin::Card-->
                                                <div class="card card-custom gutter-b card-stretch">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Ulasan</label>
                                                            <div class="col-8">
                                                                <textarea class="form-control form-control-solid"
                                                                    rows="3"></textarea>
                                                            </div>
                                                            <div class="col-2">
                                                                <button type="button"
                                                            class="btn btn-primary btn-lg btn-block ">Kirim</button>
                                                            </div>
                                                             
                                                        </div>
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Section-->
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!--end::Page Layout-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->
@endsection
