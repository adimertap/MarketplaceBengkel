@extends('user-views.layouts.app')

@push('prepend-style')
<link href="user-assets/assets/css/star-rating.css" rel="stylesheet" type="text/css" />
@endpush

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
                        {{-- <ul class="nav nav-light-success nav-pills " id="myTab3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="semua-tab-3" data-toggle="tab" href="#semua-3">
                                    <span class="nav-icon"><i class="flaticon2-chat-1"></i></span>
                                    <span class="nav-text">Semua</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="pending-tab-3" data-toggle="tab" href="#pending-3"
                                    aria-controls="profile">
                                    <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                    <span class="nav-text">pending</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="dikirm-tab-3" data-toggle="tab" href="#dikirim-3"
                                    aria-controls="profile">
                                    <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                    <span class="nav-text">dikirim</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="selesai-tab-3" data-toggle="tab" href="#selesai-3"
                                    aria-controls="profile">
                                    <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                    <span class="nav-text">selesai</span>
                                </a>
                            </li>
                        </ul> --}}

                        <div class="tab-content mt-5" id="myTabContent3">
                            @forelse ($transaksi as $item)
                            <div class="tab-pane fade active show" id="semua-3 {{ ( $item->transaksi_status == "PENDING") ? 'pending-3' : '' }}
                                {{ ( $item->transaksi_status == "DIKIRIM") ? 'dikirim-3' : '' }} {{ ( $item->transaksi_status == "DITERIMA") ? 'selesai-3' : '' }}" role="tabpanel"
                                aria-labelledby="semua-tab-3 {{ ( $item->transaksi_status == "PENDING") ? 'pending-tab-3' : '' }}
                                {{ ( $item->transaksi_status == "DIKIRIM") ? 'dikirim-tab-3' : '' }} {{ ( $item->transaksi_status == "DITERIMA") ? 'selesai-tab-3' : '' }}">
                                <!--begin::Section-->
                                <div class="card card-custom gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span
                                                class="card-label font-weight-bolder font-size-h3 text-dark">{{ $item->Detailtransaksi->first()->bengkel->nama_bengkel }}</span>
                                        </h3>
                                        <div class="card-toolbar">
                                            <div class="dropdown dropdown-inline">
                                                <a href="#"
                                                    class="btn btn-primary font-weight-bolder font-size-sm">{{ $item->transaksi_status }}</a>
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
                                                    {{-- <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th class="text-right">Harga Total</th>
                                                        </tr>
                                                    </thead> --}}
                                                    <!--end::Cart Header-->


                                                    <tbody>
                                                        @forelse ($item->Detailtransaksi as $sparepart)
                                                        <!--begin::Cart Content-->
                                                        <tr>
                                                            <td class="d-flex align-items-center font-weight-bolder">
                                                                <!--begin::Symbol-->
                                                                <div
                                                                    class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                                                    @if ($sparepart->Galleries_one)
                                                                        <div class="symbol-label"
                                                                        style="background-image: url(https://bengkel-kuy.com/image/{{ $sparepart->Galleries_one->photo }})">
                                                                    </div>
                                                                    @endif
                                                                    
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <a href="#"
                                                                    class="text-dark text-hover-primary">{{ $sparepart->nama_sparepart }}
                                                                    x {{ $sparepart->pivot->jumlah_produk }}</a>
                                                            </td>

                                                            <td
                                                                class="text-right align-middle font-weight-bolder font-size-h5">
                                                                Rp.{{ number_format(($sparepart->harga_market) * ($sparepart->pivot->jumlah_produk))}}
                                                            </td>

                                                        </tr>
                                                        <!--end::Cart Content-->
                                                        @empty

                                                        @endforelse


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
                                                                    class="text-muted text-hover-primary">{{ $item->nama_penerima }}</span>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-between align-items-cente my-1">
                                                                <span
                                                                    class="text-dark-75 font-weight-bolder mr-2">Alamat:</span>
                                                                <span
                                                                    class="text-muted text-hover-primary">{{ $item->alamat_penerima }}</span>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-between align-items-center">
                                                                <span class="text-dark-75 font-weight-bolder mr-2">No
                                                                    HP:</span>
                                                                <span
                                                                    class="text-muted font-weight-bold">{{ $item->nohp_penerima }}</span>
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
                                                                    Rp. {{ number_format($item->harga_total) }}
                                                                </span>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-between align-items-cente my-1">
                                                                <span
                                                                    class="text-dark-75 font-weight-bolder mr-2">Pengiriman
                                                                    {{ $item->kurir_pengiriman }}</span>
                                                                <span
                                                                    class="text-right align-middle font-weight-bolder font-size-h5">
                                                                    Rp. {{ number_format($item->harga_pengiriman) }}
                                                                </span>
                                                            </div>
                                                            <div
                                                                class="separator separator-solid separator-border-2 separator-dark">
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-between align-items-center ">
                                                                <span class="text-dark-75 font-weight-bolder mr-2">TOTAL
                                                                    :</span>
                                                                <span
                                                                    class="text-right align-middle font-weight-bolder font-size-h5">
                                                                    Rp.
                                                                    {{ number_format(($item->harga_total)+($item->harga_pengiriman)) }}
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

                                        @if ($item->transaksi_status == 'DIKIRIM')
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <!--begin::Card-->
                                                <div class="card card-custom gutter-b card-stretch">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
                                                        <!--begin::Content-->
                                                        <div
                                                            class="btn btn-text-dark btn-hover-light-dark font-weight-bold mr-2 btn-block modalresi">
                                                            Resi : <span class='resi'>{{ $item->resi }}</span>
                                                            <span class="courir" style="visibility: hidden">{{ $item->kurir_pengiriman }}</span>
                                                        </div>

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
                                                        <form action="{{ route('diterima')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id_transaksi_online"
                                                                value="{{ $item->id_transaksi_online }}" />
                                                            <button type="submit"
                                                                class="btn btn-light-success btn-block font-weight-bold mr-2">Barang
                                                                Diterima</button>
                                                        </form>

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
                                                        <a href="https://wa.me/{{ $item->Detailtransaksi->first()->Bengkel->nohp_bengkel }}?text=Permisi mau komplain terkait pesanan dengan kode {{$item->code_transaksi}}"
                                                            class="btn btn-light-danger btn-block font-weight-bold mr-2">Komplain</a>
                                                        <!--end::Content-->

                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                        </div>
                                        @elseif ($item->transaksi_status == 'MENUNGGU')
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <!--begin::Card-->
                                                <div class="card card-custom gutter-b card-stretch">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
                                                        <!--begin::Content-->
                                                        <a href=""
                                                            class="btn btn-light-success btn-block font-weight-bold mr-2">Menunggu Dibayar</a>
                                                        <!--end::Content-->

                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>

                                        </div>
                                        @elseif ($item->transaksi_status == 'CANCELLED')
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <!--begin::Card-->
                                                <div class="card card-custom gutter-b card-stretch">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
                                                        <!--begin::Content-->
                                                        <div class="btn btn-light-danger btn-block font-weight-bold mr-2">DIBATALKAN</div>
                                                        <!--end::Content-->

                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>

                                        </div>
                                        @elseif ($item->transaksi_status == 'DIBAYAR')
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <!--begin::Card-->
                                                <div class="card card-custom gutter-b card-stretch">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
                                                        <!--begin::Content-->
                                                        <div class="btn btn-light-success btn-block font-weight-bold mr-2">MENUNGGU DIKIRIM</div>
                                                        <!--end::Content-->

                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>

                                        </div>
                                        @elseif ($item->transaksi_status == 'DITERIMA')
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Card-->
                                                <div class="card card-custom gutter-b card-stretch">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
                                                        <!--begin::Content-->
                                                        <div
                                                            class="btn btn-text-dark btn-hover-light-dark font-weight-bold mr-2 btn-block modalresi">
                                                            Resi
                                                            : <span class='resi'>{{ $item->resi }}</span>
                                                            <span class="courir" style="visibility: hidden">{{ $item->kurir_pengiriman }}</span>
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
                                                        <button type="button" data-toggle="modal"
                                                            data-target="#staticBackdrop-{{ $item->id_transaksi_online }}"
                                                            class="btn btn-light-success btn-block font-weight-bold mr-2">Berikan
                                                            Ulasan</button>
                                                        <!--end::Content-->

                                                        <!-- Modal-->
                                                        <div class="modal fade"
                                                            id="staticBackdrop-{{ $item->id_transaksi_online }}"
                                                            data-backdrop="static" tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            {{ $item->Detailtransaksi->first()->Bengkel->nama_bengkel }}
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <i aria-hidden="true"
                                                                                class="ki ki-close"></i>
                                                                        </button>
                                                                    </div>
                                                                    <form action="{{ route('review')}}" method="POST">
                                                                        @csrf
                                                                        <div class="modal-body pt-0">
                                                                            <!--begin::Shopping Cart-->
                                                                            <div class="table-responsive">
                                                                                <table class="table">
                                                                                    <!--begin::Cart Header-->
                                                                                    {{-- <thead>
                                                                                        <tr>
                                                                                            <th>Product</th>

                                                                                        </tr>
                                                                                    </thead> --}}
                                                                                    <!--end::Cart Header-->
                                                                                    <tbody>
                                                                                        <!--begin::Cart Content-->
                                                                                        @foreach ($item->Detailtransaksi
                                                                                        as $sparepart)
                                                                                        <tr>
                                                                                            <td
                                                                                                class="d-flex align-items-center font-weight-bolder">
                                                                                                <div class="row">
                                                                                                    <div class="col-12">
                                                                                                        <!--begin::Symbol-->
                                                                                                        <div
                                                                                                            class="row">
                                                                                                            <div
                                                                                                                class="symbol symbol-60 flex-shrink-0 mr-4 bg-light ml-4">
                                                                                                                @if ($sparepart->Galleries_one)
                                                                                                                    <div class="symbol-label"
                                                                                                                    style="background-image: url(https://bengkel-kuy.com/image/{{$sparepart->Galleries_one->photo }})">
                                                                                                                </div>
                                                                                                                @endif
                                                                                                                
                                                                                                            </div>
                                                                                                            <!--end::Symbol-->
                                                                                                            <div
                                                                                                                class="align-middle pb-4">
                                                                                                                <a href="{{ route('detail', $sparepart->slug) }}"
                                                                                                                    class="font-size-lg font-weight-bolder text-dark-75 mb-1">{{ $sparepart->nama_sparepart}}</a>
                                                                                                                <div
                                                                                                                    class="font-weight-bold text-muted">
                                                                                                                    Rp.
                                                                                                                    {{ number_format($sparepart->harga_market )}}
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div class="col-12">
                                                                                                        <select
                                                                                                            name="rating[]"
                                                                                                            class="star-rating">
                                                                                                            <option
                                                                                                                value="">
                                                                                                                Select a
                                                                                                                rating
                                                                                                            </option>
                                                                                                            <option
                                                                                                                {{ ( $sparepart->pivot->rating == 5) ? 'selected' : '' }}
                                                                                                                value="5">
                                                                                                                Excellent
                                                                                                            </option>
                                                                                                            <option
                                                                                                                {{ ( $sparepart->pivot->rating == 4) ? 'selected' : '' }}
                                                                                                                value="4">
                                                                                                                Very
                                                                                                                Good
                                                                                                            </option>
                                                                                                            <option
                                                                                                                {{ ( $sparepart->pivot->rating == 3) ? 'selected' : '' }}
                                                                                                                value="3">
                                                                                                                Average
                                                                                                            </option>
                                                                                                            <option
                                                                                                                {{ ( $sparepart->pivot->rating == 2) ? 'selected' : '' }}
                                                                                                                value="2">
                                                                                                                Poor
                                                                                                            </option>
                                                                                                            <option
                                                                                                                {{ ( $sparepart->pivot->rating == 1) ? 'selected' : '' }}
                                                                                                                value="1">
                                                                                                                Terrible
                                                                                                            </option>
                                                                                                        </select>
                                                                                                        <div
                                                                                                            class="form-group mb-1">
                                                                                                            <textarea
                                                                                                                name="review[]"
                                                                                                                class="form-control"
                                                                                                                id="exampleTextarea"
                                                                                                                rows="3">{{ $sparepart->pivot->review }}</textarea>
                                                                                                        </div>

                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="id_detail_transaksi[]"
                                                                                                            value="{{ $sparepart->pivot->id_detail_transaksi }}" />
                                                                                                        <!--end::Form-->
                                                                                                    </div>
                                                                                                </div>

                                                                                            </td>

                                                                                        </tr>
                                                                                        @endforeach
                                                                                        <!--end::Cart Content-->
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <!--end::Shopping Cart-->
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-light-primary font-weight-bold"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary font-weight-bold">Save
                                                                                changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>

                                        </div>
                                        @endif
                                        

                                    </div>
                                </div>
                                <!--end::Section-->
                            </div>

                            @empty

                            @endforelse

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

<!-- Modal-->
<div class="modal fade" id="staticBackdropresi" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Status Pengiriman
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>

            <div class="modal-body pt-0">
                <!--begin::Shopping Cart-->
                <div class="d-flex justify-content-between align-items-cente my-2">
                    <span class="text-dark-75 font-weight-bolder mr-2">No Resi:</span>
                    <span class="text-muted text-hover-primary" id="resi">52(43)56254826</span>
                </div>
                <div class="d-flex justify-content-between align-items-cente my-2">
                    <span class="text-dark-75 font-weight-bolder mr-2">Status:</span>
                    <span class="text-muted text-hover-primary" id="status">52(43)56254826</span>
                </div>
                <div class="d-flex justify-content-between align-items-cente my-2">
                    <span class="text-dark-75 font-weight-bolder mr-2">Tanggal terakhir:</span>
                    <span class="text-muted text-hover-primary" id="tanggal">52(43)56254826</span>
                </div>
                <div class="d-flex justify-content-between align-items-cente my-2">
                    <span class="text-dark-75 font-weight-bolder mr-2">Pengirim:</span>
                    <span class="text-muted text-hover-primary" id="pengirim">52(43)56254826</span>
                </div>
                <div class="d-flex justify-content-between align-items-cente my-2">
                    <span class="text-dark-75 font-weight-bolder mr-2">Tujuan:</span>
                    <span class="text-muted text-hover-primary" id="tujuan">52(43)56254826</span>
                </div>
                <table class="table" id="tableresi">
                    <!--begin::Cart Header-->
                    <thead>
                        <tr>
                            <th>Waktu</th>
                            <th class="text-center">Keterangan</th>
                        </tr>
                    </thead>
                    <!--end::Cart Header-->
                    <tbody>
                        <!--begin::Cart Content-->
                        
                        <!--end::Cart Content-->
                    </tbody>
                </table>
                <!--end::Shopping Cart-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('addon-script')
<script src="user-assets/assets/js/star-rating.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script> --}}
<script>
    var stars = new StarRating('.star-rating');
</script>
<script>
    $(document).ready(function () {

        $('.modalresi').click(function (e) {
            e.preventDefault();
            var resi = $(this).children('.resi').text();
            var kurir = $(this).children('.courir').text().substring(0, 3);
            if(kurir == 'TIK'){
                kurir='TIKI'
            }
            $.ajax({
                type: 'get',
                url: '/cekresi',
                dataType: "json",
                data: {
                    kurir: kurir,
                    resi: resi
                },
        success: function (data) {
                    $('#resi').text(data['summary'].awb);
                    $('#status').text(data['summary'].status);
                    $('#tanggal').text(data['summary'].date);
                    $('#pengirim').text(data['detail'].shipper);
                    $('#tujuan').text(data['detail'].receiver);

                    //jalan keluar ke-2 gunakan if statment
                    $.each(data['history'], function (key, value) {
                        $('#tableresi').append(
                            ' <tr><td class=" text-left align-middle"><span class="text-dark-75 font-weight-bolder mr-2">'+value.date +
                                '</span></td><td class=" text-left align-middle "><span class="text-muted text-hover-primary">'
                                +value.desc+ '</span></td></tr>'                             
                            );
                    });
                    $('#staticBackdropresi').modal("show");

                }
            });
        });
    });

</script>

@endpush
