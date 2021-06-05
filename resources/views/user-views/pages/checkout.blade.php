@extends('user-views.layouts.app')
@push('addon-style')
<!--begin::Page Custom Styles(used by this page)-->
<link href="user-assets/assets/css/pages/wizard/wizard-3.css?v=7.0.6" rel="stylesheet" type="text/css" />
<!--end::Page Custom Styles-->
@endpush

@section('name')
Checkout
@endsection
@section('content')
<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <div class="card card-custom">
                <div class="card-body p-0">
                    <!--begin: Wizard-->
                    <div class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first"
                        data-wizard-clickable="true">
                        <!--begin: Wizard Nav-->
                        <div class="wizard-nav">
                            <div class="wizard-steps px-8 py-8 px-lg-15 py-lg-3">
                                <!--begin::Wizard Step 1 Nav-->
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">
                                            <span>1.</span> Alamat
                                        </h3>
                                        <div class="wizard-bar"></div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 1 Nav-->

                                <!--begin::Wizard Step 2 Nav-->
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">
                                            <span>2.</span> Pengiriman
                                        </h3>
                                        <div class="wizard-bar"></div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 2 Nav-->


                            </div>
                        </div>
                        <!--end: Wizard Nav-->

                        <!--begin: Wizard Body-->
                        <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                            <div class="col-xl-12 col-xxl-9">
                                <!--begin: Wizard Form-->
                                <form class="form" id="kt_form" action="{{ route('checkout-process', $cart->id_carts) }}" method="post" target="_blank"
                                    <!--begin: Wizard Step 1-->
                                    @csrf
                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        <h4 class="mb-10 font-weight-bold text-dark">Detail Pengiriman
                                        </h4>
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Nama Penerim</label>
                                            <input type="text" class="form-control" name="nama penerima" id="nama_penerima"
                                                placeholder="Nama Penerima" value="{{ Auth::user()->nama_user }}" />
                                            <input type="hidden" class="form-control" name="id_cart" id="id_cart"
                                                 value="{{ $cart->id_carts }}" />
                                            <span class="form-text text-muted">Masukan nama penerima</span>
                                        </div>
                                        <!--end::Input-->

                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Alamat Penerima</label>
                                            <input type="text" class="form-control" name="alamat_penerima" id="alamat_penerima"
                                                placeholder="Address Line 2" value="{{ Auth::user()->alamat_user }}" />
                                            <span class="form-text text-muted">Masukan alamat </span>
                                        </div>
                                        <!--end::Input-->
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>No Hp</label>
                                                    <input type="text" class="form-control" name="nohp_penerima" id="nohp_penerima"
                                                        placeholder="City" value="{{ Auth::user()->nohp_user }}" />
                                                    <span class="form-text text-muted">Masukkan no hp</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Provinsi</label>
                                                    <select class="form-control" id="exampleSelect1" name="provinsi">
                                                        <option value="" holder>provinsi</option>
                                                        @foreach ($provinsi as $item)
                                                        <option value="{{ $item->id_provinsi }}">
                                                            {{ $item->nama_provinsi }}</option>
                                                        @endforeach

                                                    </select>
                                                    <span class="form-text text-muted">Provinsi</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-xl-8">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Kota</label>
                                                    <select class="form-control" id="exampleSelect1 id_kabupaten"
                                                        name="id_kabupaten">
                                                        <option value="" holder>Kota</option>
                                                    </select>
                                                    <span class="form-text text-muted">Kota</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-4">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Kurir</label>
                                                    <select class="form-control" id="exampleSelect1 kurir" name="kurir"
                                                        id="inputkurir">
                                                        <option value="">Pilih Salah Satu</option>
                                                        <option value="jne">JNE</option>
                                                        <option value="tiki">TIKI</option>
                                                        <option value="pos">POS</option>

                                                    </select>
                                                    <span class="form-text text-muted">pilih kurir</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-xl-8">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Paket Pengiriman</label>
                                                    <select class="form-control" id="exampleSelect1" name="expedisi">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- hidden input --}}
                                        <input type="hidden" name="harga_pengiriman" id="harga_pengiriman" value="" />
                                        <input type="hidden" name="harga_total" id="harga_total" value="" />
                                        <input type="hidden" name="kurir_pengiriman" id="kurir_pengiriman" value="" />



                                    </div>
                                    <!--end: Wizard Step 1-->

                                    <!--begin: Wizard Step 2-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <div class="card card-custom overflow-hidden">
                                            <div class="card-body p-0">
                                                <!-- begin: Invoice-->
                                                <!-- begin: Invoice header-->
                                                <div class="row justify-content-center bgi-size-cover bgi-no-repeat py-8 px-8 py-md-27 px-md-0"
                                                    style="background-image: url(user-assets/assets/media/bg/bg-6.jpg);">
                                                    <div class="col-md-9">
                                                        <div
                                                            class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                                                            <h1 class="display-4 text-white font-weight-boldest mb-10">
                                                                RANGKUMAN</h1>
                                                            <div class="d-flex flex-column align-items-md-end px-0">
                                                                <!--begin::Logo-->
                                                                <a href="#" class="mb-5">
                                                                    <img src="user-assets/assets/media/logos/logo-light.png"
                                                                        alt="">
                                                                </a>
                                                                <!--end::Logo-->
                                                                <span
                                                                    class="text-white d-flex flex-column align-items-md-end opacity-70">
                                                                    <span>{{ $cart->Bengkel->nama_bengkel }}</span>
                                                                    {{-- <span>081-123-123-123</span> --}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="border-bottom w-100 opacity-20"></div>

                                                    </div>
                                                </div>
                                                <!-- end: Invoice header-->

                                                <!-- begin: Invoice body-->
                                                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                                                    <div class="col-md-9">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th
                                                                            class="pl-0 font-weight-bold text-muted  text-uppercase">
                                                                            Nama Barang</th>
                                                                        <th
                                                                            class="text-right font-weight-bold text-muted text-uppercase">
                                                                            Harga</th>
                                                                        <th
                                                                            class="text-right font-weight-bold text-muted text-uppercase">
                                                                            Qty</th>
                                                                        <th
                                                                            class="text-right pr-0 font-weight-bold text-muted text-uppercase">
                                                                            Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                    $totalbarang = 0;
                                                                    $jumlahberat =0;
                                                                    @endphp
                                                                    @foreach ($items as $item)
                                                                    <tr
                                                                        class="font-weight-boldest border-bottom-0 font-size-lg">
                                                                        <td class="border-top-0 pl-0 py-4">
                                                                            {{ $item->Sparepart->nama_sparepart }}</td>
                                                                        <td class="border-top-0 text-right py-4">Rp.
                                                                            <span></span>
                                                                            {{ number_format($item->Sparepart->Harga['harga_jual']) }}
                                                                        </td>
                                                                        <td class="border-top-0 text-right py-4">
                                                                            {{ $item->jumlah }}
                                                                        </td>
                                                                        <td
                                                                            class="text-danger border-top-0 pr-0 py-4 text-right">
                                                                            Rp.
                                                                            {{ number_format($item->jumlah * $item->Sparepart->Harga['harga_jual']) }}
                                                                        </td>
                                                                        @php
                                                                        $jumlahberat +=
                                                                        $item->Sparepart->berat_sparepart;
                                                                        $totalbarang +=
                                                                        $item->jumlah*$item->Sparepart->Harga['harga_jual'];
                                                                        @endphp
                                                                    </tr>
                                                                    @endforeach

                                                                    <tr
                                                                        class="font-weight-boldest border-bottom-0 font-size-lg">
                                                                        <td class="border-top-0 pl-0 py-4"></td>
                                                                        <td class="border-top-0 text-right py-4">
                                                                        </td>
                                                                        <td class="border-top-0 text-right py-4">
                                                                            <div class="separator separator-dashed">
                                                                            </div>
                                                                            <div class="separator separator-solid">
                                                                            </div>
                                                                            Subtotal
                                                                        </td>
                                                                        <td
                                                                            class="text-danger border-top-0 pr-0 py-4 text-right">
                                                                            <div class="separator separator-dashed">
                                                                            </div>
                                                                            <div class="separator separator-solid">
                                                                            </div>Rp.
                                                                            <span name="subtotal"
                                                                                id="subtotal">{{number_format($totalbarang)}}</span>
                                                                        </td>

                                                                    </tr>
                                                                    <tr
                                                                        class="font-weight-boldest border-bottom-0 font-size-lg">
                                                                        <td class="border-top-0 pl-0 py-4"></td>
                                                                        <td class="border-top-0 text-right py-4">
                                                                        </td>
                                                                        <td class="border-top-0 text-right py-4">Ongkos
                                                                            Kirim ({{ $jumlahberat }} gram)
                                                                        </td>
                                                                        <td
                                                                            class="text-danger border-top-0 pr-0 py-4 text-right">
                                                                            Rp.

                                                                            <span name="ongkir" id="ongkir">o</span>
                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end: Invoice body-->

                                                <!-- begin: Invoice footer-->
                                                <div
                                                    class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                                                    <div class="col-md-9">
                                                        <div
                                                            class="d-flex justify-content-between flex-column flex-md-row font-size-lg">
                                                            <div class="d-flex flex-column mb-10 mb-md-0">
                                                                <div class="font-weight-bolder font-size-lg mb-3">
                                                                    Pengiriman</div>

                                                                <div class="d-flex justify-content-between mb-3">
                                                                    <span class="mr-15 font-weight-bold">Nama:</span>
                                                                    <span class="text-right" id="rangkumannama"></span>
                                                                </div>

                                                                <div class="d-flex justify-content-between mb-3">
                                                                    <span class="mr-15 font-weight-bold">Alamat:</span>
                                                                    <span class="text-right"
                                                                        id="rangkumanalamat"></span>
                                                                </div>
                                                                <div class="d-flex justify-content-between mb-3">
                                                                    <span class="mr-15 font-weight-bold">No Hp</span>
                                                                    <span class="text-right" id="rangkumannohp"></span>
                                                                </div>
                                                                <div class="d-flex justify-content-between">
                                                                    <span
                                                                        class="mr-15 font-weight-bold">Pengiriman</span>
                                                                    <span class="text-right" id="rangkumankurir"></span>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex flex-column text-md-right">
                                                                <span class="font-size-lg font-weight-bolder mb-1">TOTAL
                                                                    KESELURUHAN</span>
                                                                <span
                                                                    class="font-size-h2 font-weight-boldest text-danger mb-1">Rp.<span
                                                                        id="totalkeseluruhan"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end: Invoice footer-->
                                            </div>
                                        </div>

                                    </div>
                                    <!--end: Wizard Step 2-->

                                    <!--begin: Wizard Actions-->
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <div class="mr-2">
                                            <button type="button"
                                                class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4"
                                                data-wizard-type="action-prev">
                                                Previous
                                            </button>
                                        </div>
                                        <div>
                                            <button type="submit"
                                                class="btn btn-success font-weight-bold text-uppercase px-9 py-4"
                                                data-wizard-type="action-submit" id="sumbit">
                                                Submit
                                            </button>
                                            <button type="button" id="nextbtn"
                                                class="btn btn-primary font-weight-bold text-uppercase px-9 py-4"
                                                data-wizard-type="action-next">
                                                Next
                                            </button>
                                        </div>
                                    </div>
                                    <!--end: Wizard Actions-->
                                </form>
                                <!--end: Wizard Form-->
                            </div>

                        </div>
                        <!--end: Wizard Body-->
                    </div>
                    <!--end: Wizard-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->
@endsection

@push('addon-script')
<!--begin::Page Scripts(used by this page)-->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>

<script src="user-assets/assets/js/pages/custom/wizard/wizard-3.js?v=7.0.6"></script>
<script type="text/javascript">
    $(document).ready(function () {
        

        $('select[name="provinsi"]').on('change', function () {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: 'getkabupaten/' + cityId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="id_kabupaten"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="id_kabupaten"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="id_kabupaten"]').empty();
            }
        });

        $('select[name="kurir"]').on('change', function () {
            var thedestination = $('select[name=id_kabupaten] option').filter(':selected').val();
            var thecourier = $('select[name=kurir] option').filter(':selected').val();
            var id_cart = $("#id_cart").val();


            $.ajax({
                type: 'get',
                url: '/a',
                dataType: "json",
                data: {
                    kabupaten: thedestination,
                    kurir: thecourier,
                    id_cart: id_cart
                },
                success: function (data) {
                    $('select[name="expedisi"]').empty();

                    //jalan keluar ke-2 gunakan if statment
                    $.each(data, function (key, value) {
                        $('select[name="expedisi"]').append(
                            '<option value="' +
                            value.service + '">' + value.service +
                            "=> harga : Rp " + value.cost[0].value +
                            "=> estimasi sampai :" + value.cost[0].etd +
                            "hari" + '</option>');
                    });
                }
            });
        });



        $("#nextbtn").click(function () {
            var ongkir = parseInt($('select[name=expedisi] option').filter(':selected').text().split("Rp ")
                .pop()
                .split('=')[0]);
            var subtotal = parseInt($("#subtotal").text().split("Rp ").pop().replace(',', ''));
            var inputalamat = $("#alamat_penerima").val();
            var provinsi = $('select[name=provinsi] option').filter(':selected').text();
            var kabupaten = $('select[name=id_kabupaten] option').filter(':selected').text();
            var kurir = $('select[name=kurir] option').filter(':selected').text();
            var paket = $('select[name=expedisi] option').filter(':selected').text().slice(0, 3);


            // alert( kabupaten );
            $("#harga_pengiriman").val(ongkir);
            $("#harga_total").val(subtotal + ongkir);
            $("#kurir_pengiriman").val(kurir.concat(' ').concat(paket));

            $("#ongkir").text(ongkir);
            $("#totalkeseluruhan").text(subtotal + ongkir);

            $("#rangkumannama").text($("#nama_penerima").val());
            $("#rangkumanalamat").text(inputalamat.concat(', ').concat(kabupaten).concat(', ').concat(provinsi));
            $("#rangkumannohp").text($("#nohp_penerima").val());
            $("#rangkumankurir").text(kurir.concat(' ').concat(paket));

        });
    });

</script>
<!--end::Page Scripts-->
@endpush
