@extends('user-views.layouts.app')
@push('addon-style')

@endpush

@section('name')
Product Detail
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
                    <!--begin::Section-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Header-->
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder font-size-h3 text-dark">Toko Bengkel
                                    AA</span>
                            </h3>
                            <div class="card-toolbar">
                                <div class="dropdown dropdown-inline">
                                    <a href="#" class="btn btn-primary font-weight-bolder font-size-sm">Continue
                                        Shopping</a>
                                </div>
                            </div>
                        </div>
                        <!--end::Header-->
                        <div class="card-body">
                            <!--begin::Shopping Cart-->
                            <div class="table-responsive">
                                <table class="table">
                                    <!--begin::Cart Header-->
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th class="text-center">Qty</th>
                                            <th class="text-right">Price</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <!--end::Cart Header-->
                                    <tbody>
                                        <!--begin::Cart Content-->
                                        <tr>
                                            <td class="d-flex align-items-center font-weight-bolder">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                                    <div class="symbol-label"
                                                        style="background-image: url('user-assets/assets/media/products/11.png')">
                                                    </div>
                                                </div>
                                                <!--end::Symbol-->
                                                <a href="#" class="text-dark text-hover-primary">Street Sneakers</a>
                                            </td>
                                            <td class="text-center align-middle">
                                                <a href="javascript:;"
                                                    class="btn btn-xs btn-light-success btn-icon mr-2">
                                                    <i class="ki ki-minus icon-xs"></i>
                                                </a>
                                                <span class="mr-2 font-weight-bolder">1</span>
                                                <a href="javascript:;" class="btn btn-xs btn-light-success btn-icon">
                                                    <i class="ki ki-plus icon-xs"></i>
                                                </a>
                                            </td>
                                            <td class="text-right align-middle font-weight-bolder font-size-h5">$90.00
                                            </td>
                                            <td class="text-right align-middle">
                                                <a href="#"
                                                    class="btn btn-danger font-weight-bolder font-size-sm">Remove</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="d-flex align-items-center font-weight-bolder">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                                    <div class="symbol-label"
                                                        style="background-image: url('user-assets/assets/media/products/2.png')">
                                                    </div>
                                                </div>
                                                <!--end::Symbol-->
                                                <a href="#" class="text-dark text-hover-primary">Headphones</a>
                                            </td>
                                            <td class="text-center align-middle">
                                                <a href="javascript:;"
                                                    class="btn btn-xs btn-light-success btn-icon mr-2">
                                                    <i class="ki ki-minus icon-xs"></i>
                                                </a>
                                                <span class="mr-2 font-weight-bolder">1</span>
                                                <a href="javascript:;" class="btn btn-xs btn-light-success btn-icon">
                                                    <i class="ki ki-plus icon-xs"></i>
                                                </a>
                                            </td>
                                            <td class="text-right align-middle font-weight-bolder font-size-h5">$449.00
                                            </td>
                                            <td class="text-right align-middle">
                                                <a href="#"
                                                    class="btn btn-danger font-weight-bolder font-size-sm">Remove</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="d-flex align-items-center font-weight-bolder">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                                    <div class="symbol-label"
                                                        style="background-image: url('user-assets/assets/media/products/1.png')">
                                                    </div>
                                                </div>
                                                <!--end::Symbol-->
                                                <a href="#" class="text-dark text-hover-primary">Smartwatch</a>
                                            </td>
                                            <td class="text-center align-middle">
                                                <a href="javascript:;"
                                                    class="btn btn-xs btn-light-success btn-icon mr-2">
                                                    <i class="ki ki-minus icon-xs"></i>
                                                </a>
                                                <span class="mr-2 font-weight-bolder">1</span>
                                                <a href="javascript:;" class="btn btn-xs btn-light-success btn-icon">
                                                    <i class="ki ki-plus icon-xs"></i>
                                                </a>
                                            </td>
                                            <td class="text-right align-middle font-weight-bolder font-size-h5">$999.00
                                            </td>
                                            <td class="text-right align-middle">
                                                <a href="#"
                                                    class="btn btn-danger font-weight-bolder font-size-sm">Remove</a>
                                            </td>
                                        </tr>
                                        <!--end::Cart Content-->
                                        <!--begin::Cart Footer-->
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="font-weight-bolder font-size-h4 text-right">Subtotal</td>
                                            <td class="font-weight-bolder font-size-h4 text-right">$1538.00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="border-0 text-muted text-right pt-0">Excludes
                                                Delivery. GST Included</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="border-0 pt-10">

                                            </td>
                                            <td colspan="2" class="border-0 text-right pt-10">
                                                <a href="#" class="btn btn-success font-weight-bolder px-8">Proceed to
                                                    Checkout</a>
                                            </td>
                                        </tr>
                                        <!--end::Cart Footer-->
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Shopping Cart-->
                        </div>
                    </div>
                    <!--end::Section-->

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

@push('addon-style')
@endpush
