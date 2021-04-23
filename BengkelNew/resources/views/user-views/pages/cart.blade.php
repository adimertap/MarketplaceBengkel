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
                                            <th class="text-right">Total Harga</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <!--end::Cart Header-->
                                    <tbody>
                                        <!--begin::Cart Content-->
                                        @php
                                        $totalharga = 0
                                        @endphp

                                        @foreach ($cart as $item)
                                        <tr>
                                            <td class="d-flex align-items-center font-weight-bolder">
                                                <!--begin::Symbol-->
                                                @if ($item->Sparepart->Galleries)
                                                <div class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                                    <div class="symbol-label"
                                                        style="background-image: url({{  asset('/image/'.$item->Sparepart->Galleries->first()['photo'] ) }})">
                                                    </div>

                                                </div>
                                                @endif
                                                <!--end::Symbol-->
                                                <div class="align-middle pb-4">
                                                    <a href="{{ route('detail', $item->Sparepart->slug) }}"
                                                        class="font-size-lg font-weight-bolder text-dark-75 mb-1">{{ $item ->Sparepart->nama_sparepart}}</a>
                                                    <div class="font-weight-bold text-muted">Rp.
                                                        {{ number_format($item->Sparepart->Harga->last()['harga_jual'] )}}
                                                    </div>
                                                </div>


                                            </td>
                                            <td class="text-center align-middle" width="130px">
                                                <div class="input-group quantity">
                                                    <div
                                                        class="btn btn-xs btn-light-success btn-icon mr-2 mt-2 decrement-btn">
                                                        <i class="ki ki-minus icon-xs"></i>
                                                    </div>
                                                    <input type="text" class="qty-input form-control" maxlength="2"
                                                        value="{{ $item->jumlah }}">
                                                    <div class="btn btn-xs btn-light-success btn-icon increment-btn increment-btn mt-2 ml-2"
                                                        style="cursor: pointer">
                                                        <i class="ki ki-plus icon-xs"></i>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-right align-middle font-weight-bolder font-size-h5">Rp 
                                                {{ number_format(($item->Sparepart->Harga->last()['harga_jual'] ) * ($item->jumlah))}}
                                            </td>
                                            <td class="text-right align-middle">

                                                <form action="{{ route('cart-delete', $item->id_cart) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-danger font-weight-bolder font-size-sm">Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @php
                                        $totalharga += ($item->Sparepart->Harga->last()['harga_jual'] ) * ($item->jumlah)
                                        @endphp
                                        @endforeach


                                        <!--end::Cart Content-->
                                        <!--begin::Cart Footer-->
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="font-weight-bolder font-size-h4 text-right">Subtotal</td>
                                            <td class="font-weight-bolder font-size-h4 text-right">Rp.
                                                {{ number_format($totalharga ?? 0) }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="border-0 text-muted text-right pt-0">Belum Termasuk
                                                Ongkos Kirim</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="border-0 pt-10">

                                            </td>
                                            <td colspan="2" class="border-0 text-right pt-10">
                                                <a href="{{ route('checkout') }}"
                                                    class="btn btn-success font-weight-bolder px-8">Proceed to
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
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('.increment-btn').click(function (e) {
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
                value++;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }

        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });

    });

</script>
@endpush
