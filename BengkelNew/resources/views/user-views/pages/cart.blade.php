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
                    @forelse ($carts as $cart)
                        <div class="card card-custom gutter-b">
                        <!--begin::Header-->
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder font-size-h3 text-dark">{{$cart->Bengkel->nama_bengkel}}</span>
                            </h3>
                            <div class="card-toolbar">
                                <div class="dropdown dropdown-inline">
                                    <a href="{{ route('home') }}" class="btn btn-primary font-weight-bolder font-size-sm">Continue
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

                                        @foreach ($cart->Detailcarts as $item)
                                        <tr>
                                            <div class="qqquantity">
                                                
                                                <td class="d-flex align-items-center font-weight-bolder">
                                                    <!--begin::Symbol-->
                                                    @if ($item->Sparepart->Galleries_one)
                                                    <div class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                                        <div class="symbol-label"
                                                            style="background-image: url({{  asset('/image/'.$item->Sparepart->Galleries_one->photo ) }})">
                                                        </div>

                                                    </div>
                                                    @endif
                                                    <!--end::Symbol-->
                                                    <div class="align-middle pb-4">
                                                        <a href="{{ route('detail', $item->Sparepart->slug) }}"
                                                            class="font-size-lg font-weight-bolder text-dark-75 mb-1">{{ $item ->Sparepart->nama_sparepart}}</a>
                                                        <div class="font-weight-bold text-muted">Rp.
                                                            {{ number_format($item->Sparepart->Harga['harga_jual'] )}}
                                                        </div>
                                                    </div>


                                                </td>
                                                <td class="text-center align-middle qquantity" width="130px">
                                                    <div class="input-group quantity">
                                                        <div
                                                            class="btn btn-xs btn-light-success btn-icon mr-2 mt-2 decrement-btn">
                                                            <i class="ki ki-minus icon-xs"></i>
                                                        </div>
                                                        <input type="text" name="qty" class="qty-input form-control"
                                                            maxlength="2" value="{{ $item->jumlah }}">
                                                        <input type="hidden" class="qty-id"
                                                            value="{{ $item->id_detail_carts }}">
                                                        <input type="hidden" class="qty-harga"
                                                            value="{{ $item->Sparepart->Harga['harga_jual'] }}">

                                                        <div class="btn btn-xs btn-light-success btn-icon increment-btn increment-btn mt-2 ml-2"
                                                            style="cursor: pointer">
                                                            <i class="ki ki-plus icon-xs"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class=" text-right align-middle font-weight-bolder font-size-h5">
                                                    <span>
                                                        Rp.
                                                    </span>
                                                    <span id="totali{{ $item->id_detail_carts }}">
                                                        {{ ($item->Sparepart->Harga['harga_jual'] ) * ($item->jumlah)}}

                                                    </span>
                                                </td>
                                                <td class="text-right align-middle">
                                                    <form action="{{ route('cart-delete', $item->id_detail_carts) }}"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-danger font-weight-bolder font-size-sm">Remove</button>
                                                    </form>
                                                </td>
                                            </div>

                                        </tr>
                                        @php
                                        $totalharga += ($item->Sparepart->Harga['harga_jual'] ) *
                                        ($item->jumlah)
                                        @endphp
                                        @endforeach


                                        <!--end::Cart Content-->
                                        <!--begin::Cart Footer-->
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="font-weight-bolder font-size-h4 text-right">Subtotal</td>
                                            <td class="font-weight-bolder font-size-h4 text-right">Rp.
                                                <span id="subtotal">{{ $totalharga }}</span>
                                               </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="border-0 text-muted text-right pt-0">Belum Termasuk
                                                Ongkos Kirim</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="border-0 pt-10">

                                            </td>
                                            <td colspan="2" class="border-0 text-right pt-10">
                                                <a href="{{ route('checkout', $cart->id_carts) }}"
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
                    @empty
                        
                    @endforelse
                    
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
            var id_detail_carts = $(this).parents('.quantity').find('.qty-id').val();
            var _token = $('meta[name="csrf-token"]').attr('content');
            var value = parseInt(incre_value, 10);
            var qty_harga = $(this).parents('.quantity').find('.qty-harga').val();
            var harga = parseInt(qty_harga, 10);
            var subtotal = $("#subtotal").text();
            var totalcart = parseInt(subtotal, 10);
            var value_before = parseInt(incre_value, 10);

            value = isNaN(value) ? 0 : value;
            value++;
            var totali = "#totali"+id_detail_carts;
            $(this).parents('.quantity').find('.qty-input').val(value);
            $(totali).text(harga*value);
            $('#subtotal').text(totalcart+((value-value_before)*harga));

            $.ajax({
                type: 'post',
                url: '/updateqty',
                dataType: "json",
                data: {
                    id_detail_carts: id_detail_carts,
                    qty: value,
                    _token: _token
                },
                success: function (data) {

                }
            });
        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var id_detail_carts = $(this).parents('.quantity').find('.qty-id').val();
            var _token = $('meta[name="csrf-token"]').attr('content');
            var value = parseInt(decre_value, 10);
            var qty_harga = $(this).parents('.quantity').find('.qty-harga').val();
            var harga = parseInt(qty_harga, 10);
            var subtotal = $("#subtotal").text();
            var totalcart = parseInt(subtotal, 10);
            var value_before = parseInt(decre_value, 10);


            value = isNaN(value) ? 0 : value;
            value--;
            var totali = "#totali"+id_detail_carts;
            $(this).parents('.quantity').find('.qty-input').val(value);
            $(totali).text(harga*value);
            $('#subtotal').text(totalcart+((value-value_before)*harga));
            $.ajax({
                type: 'post',
                url: '/updateqty',
                dataType: "json",
                data: {
                    id_detail_carts: id_detail_carts,
                    qty: value,
                    _token: _token
                },
                success: function (data) {

                }
            });
        });

        $('input[name="qty"]').on('change', function () {
            var decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var id_detail_carts = $(this).parents('.quantity').find('.qty-id').val();
            var _token = $('meta[name="csrf-token"]').attr('content');
            var value = parseInt(decre_value, 10);
            var qty_harga = $(this).parents('.quantity').find('.qty-harga').val();
            var harga = parseInt(qty_harga, 10);
            var subtotal = $("#subtotal").text();
            var totalcart = parseInt(subtotal, 10);
            var totali = "#totali"+id_detail_carts;
            var value_before = $(totali).text();
            var harga_before = parseInt(value_before, 10)



            value = isNaN(value) ? 0 : value;
            $(this).parents('.quantity').find('.qty-input').val(value);
            $(totali).text(harga*value);
            $('#subtotal').text(totalcart-harga_before+(harga*value));
            $.ajax({
                type: 'post',
                url: '/updateqty',
                dataType: "json",
                data: {
                    id_detail_carts: id_detail_carts,
                    qty: value,
                    _token: _token
                },
                success: function (data) {

                }
            });
        });

    });

</script>
@endpush
