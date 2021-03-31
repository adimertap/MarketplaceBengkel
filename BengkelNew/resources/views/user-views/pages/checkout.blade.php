@extends('layouts.app')
@push('addon-style')
<!--begin::Page Custom Styles(used by this page)-->
<link href="user/assets/css/pages/wizard/wizard-3.css?v=7.0.6" rel="stylesheet" type="text/css" />
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
                                <form class="form" id="kt_form" action="{{ url('/a') }}" method="get">
                                    <!--begin: Wizard Step 1-->
                                    @csrf
                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        <h4 class="mb-10 font-weight-bold text-dark">Detail Pengiriman
                                        </h4>
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Nama Penerima</label>
                                            <input type="text" class="form-control" name="nama penerima"
                                                placeholder="Nama Penerima" value="nama penerima" />
                                            <span class="form-text text-muted">Masukan nama penerima</span>
                                        </div>
                                        <!--end::Input-->

                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Alamat Penerima</label>
                                            <input type="text" class="form-control" name="address2"
                                                placeholder="Address Line 2" value="Address Line 2" />
                                            <span class="form-text text-muted">Masukan alamat penerima</span>
                                        </div>
                                        <!--end::Input-->
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Kode Pos</label>
                                                    <input type="text" class="form-control" name="postcode"
                                                        placeholder="Postcode" value="3000" />
                                                    <span class="form-text text-muted">Masukan kode pos</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>No Hp</label>
                                                    <input type="text" class="form-control" name="no hp"
                                                        placeholder="City" value="no Hp" />
                                                    <span class="form-text text-muted">Masukkan no hp</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Input-->

                                                <div class="form-group">
                                                    <label>Provinsi</label>
                                                    <select class="form-control" id="exampleSelect1"
                                                        name="provinsi_asal">
                                                        <option value="" holder>provinsi</option>
                                                        @foreach ($provinsi as $item)
                                                        <option value="{{ $item->id }}">{{ $item->province }}</option>
                                                        @endforeach

                                                    </select>
                                                    <span class="form-text text-muted">Provinsi</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Kota</label>
                                                    <select class="form-control" id="exampleSelect1" name="kota_asal">
                                                        <option value="" holder>Kota</option>

                                                    </select>
                                                    <span class="form-text text-muted">Kota</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Provinsi</label>
                                                    <select class="form-control" id="exampleSelect1"
                                                        name="provinsi_tujuan">
                                                        <option value="" holder>Provinsi</option>

                                                        @foreach ($provinsi as $item)
                                                        <option value="{{ $item->id }}">{{ $item->province }}</option>
                                                        @endforeach

                                                    </select>
                                                    <span class="form-text text-muted">Provinsi</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Kota</label>
                                                    <select class="form-control" id="exampleSelect1" name="kota_tujuan">
                                                    </select>
                                                    <option value="" holder>Kota</option>

                                                    <span class="form-text text-muted">Kota</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Berat</label>
                                                    <input type="text" class="form-control" name="berat" placeholder=""
                                                        value="" />
                                                    <span class="form-text text-muted">Masukan kode pos</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Kurir</label>
                                                    <select class="form-control" id="exampleSelect1" name="kurir">
                                                        <option value="jne">JNE</option>
                                                        <option value="tiki">TIKI</option>
                                                        <option value="pos">POS</option>

                                                    </select>
                                                    <span class="form-text text-muted">Masukkan no hp</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelect1">Paket Pengiriman</label>
                                            <select class="form-control" id="exampleSelect1" name="aa">
                                            </select>
                                        </div>
                                    </div>
                                    <!--end: Wizard Step 1-->

                                    <!--begin: Wizard Step 2-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <div class="card card-custom overflow-hidden">
                                            <div class="card-body p-0">
                                                <!-- begin: Invoice-->
                                                <!-- begin: Invoice header-->
                                                <div class="row justify-content-center bgi-size-cover bgi-no-repeat py-8 px-8 py-md-27 px-md-0"
                                                    style="background-image: url(assets/media/bg/bg-6.jpg);">
                                                    <div class="col-md-9">
                                                        <div
                                                            class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                                                            <h1 class="display-4 text-white font-weight-boldest mb-10">
                                                                RANGKUMAN</h1>
                                                            <div class="d-flex flex-column align-items-md-end px-0">
                                                                <!--begin::Logo-->
                                                                <a href="#" class="mb-5">
                                                                    <img src="assets/media/logos/logo-light.png" alt="">
                                                                </a>
                                                                <!--end::Logo-->
                                                                <span
                                                                    class="text-white d-flex flex-column align-items-md-end opacity-70">
                                                                    <span>Toko Barang Bengkel</span>
                                                                    <span>081-123-123-123</span>
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
                                                                    <tr class="font-weight-boldest font-size-lg">
                                                                        <td class="pl-0 pt-7">Creative Design</td>
                                                                        <td class="text-right pt-7">80</td>
                                                                        <td class="text-right pt-7">$40.00</td>
                                                                        <td class="text-danger pr-0 pt-7 text-right">
                                                                            $3200.00</td>
                                                                    </tr>
                                                                    <tr
                                                                        class="font-weight-boldest border-bottom-0 font-size-lg">
                                                                        <td class="border-top-0 pl-0 py-4">Front-End
                                                                            Development</td>
                                                                        <td class="border-top-0 text-right py-4">120
                                                                        </td>
                                                                        <td class="border-top-0 text-right py-4">$40.00
                                                                        </td>
                                                                        <td
                                                                            class="text-danger border-top-0 pr-0 py-4 text-right">
                                                                            $4800.00</td>
                                                                    </tr>
                                                                    <tr
                                                                        class="font-weight-boldest border-bottom-0 font-size-lg">
                                                                        <td class="border-top-0 pl-0 py-4">Back-End
                                                                            Development</td>
                                                                        <td class="border-top-0 text-right py-4">210
                                                                        </td>
                                                                        <td class="border-top-0 text-right py-4">$60.00
                                                                        </td>
                                                                        <td
                                                                            class="text-danger border-top-0 pr-0 py-4 text-right">
                                                                            $1260ugiugig0.00</td>
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
                                                                <div class="font-weight-bolder font-size-lg mb-3">Pengiriman</div>

                                                                <div class="d-flex justify-content-between mb-3">
                                                                    <span class="mr-15 font-weight-bold">Nama:</span>
                                                                    <span class="text-right">Barclays UK</span>
                                                                </div>

                                                                <div class="d-flex justify-content-between mb-3">
                                                                    <span class="mr-15 font-weight-bold">Alamat:</span>
                                                                    <span class="text-right">jln asdasd</span>
                                                                </div>

                                                                <div class="d-flex justify-content-between">
                                                                    <span class="mr-15 font-weight-bold">No Hp</span>
                                                                    <span class="text-right">012-123-123-123</span>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-column text-md-right">
                                                                <span class="font-size-lg font-weight-bolder mb-1">TOTAL
                                                                    AMOUNT</span>
                                                                <span
                                                                    class="font-size-h2 font-weight-boldest text-danger mb-1">$20.600.00</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- end: Invoice footer-->

                                                <!-- begin: Invoice action-->
                                                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                                                    <div class="col-md-9">
                                                        <div class="d-flex justify-content-between">
                                                            <button type="button"
                                                                class="btn btn-light-primary font-weight-bold"
                                                                onclick="window.print();">Download Invoice</button>
                                                            <button type="button"
                                                                class="btn btn-primary font-weight-bold"
                                                                onclick="window.print();">Print Invoice</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end: Invoice action-->

                                                <!-- end: Invoice-->
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
                                                data-wizard-type="action-submit">
                                                Submit
                                            </button>
                                            <button type="button"
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

@push('addon-style')
<!--begin::Page Scripts(used by this page)-->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>

<script src="user/assets/js/pages/custom/wizard/wizard-3.js?v=7.0.6"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('select[name="provinsi_asal"]').on('change', function () {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: 'getcity/ajax/' + cityId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="kota_asal"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="kota_asal"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="kota_asal"]').empty();
            }
        });
        $('select[name="provinsi_tujuan"]').on('change', function () {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: 'getcity/ajax/' + cityId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="kota_tujuan"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="kota_tujuan"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="kota_tujuan"]').empty();
            }
        });
        $('select[name="kurir"]').on('change', function () {
            $.ajax({
                type: 'get',
                url: '/a',
                dataType: "json",
                data: $('form').serialize(),
                success: function (data) {
                    $('select[name="aa"]').empty();
                    //jalan keluar ke-2 gunakan if statment
                    $.each(data, function (key, value) {
                        $('select[name="aa"]').append(
                            '<option value="' +
                            value.service + '">' + value.service +
                            "=> harga : Rp " + value.cost[0].value +
                            "=> estimasi sampai :" + value.cost[0].etd +
                            "hari" + '</option>');
                    });
                }
            });
        });
    });

</script>
<!--end::Page Scripts-->
@endpush
