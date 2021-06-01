@extends('user-views.layouts.app')
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
                <!--begin::Layout-->
                <div class="flex-row-fluid">
                    <!--begin::Section-->
                    <div class="row">
                        <div class="col-md-7 col-lg-12 col-xxl-7">
                            <!--begin::Engage Widget 14-->
                            <div class="card card-custom gutter-b gutter-b">
                                <h2 class="font-weight-bolder text-dark text-center"
                                    style="font-size: 32px; margin-top: 10px;">{{ $sparepart -> nama_sparepart}}</h2>
                                <small
                                    class="font-weight-bolder text-dark text-center">{{ $sparepart -> Bengkel['nama_bengkel'] }}</small>
                                <!--begin::Polygon Background-->
                                <div class="slider">

                                    @forelse ($sparepart->Galleries as $key => $item)
                                    @if ($key==0)
                                    <input type="radio" name="slide_switch" id="{{ $item->id_gallery }}"
                                        checked='checked' />
                                    <label for="{{ $item->id_gallery }}">
                                        <img src="https://bengkel-kuy.com/image/{{ $item['photo'] }}" width="100" height="80" />
                                    </label>
                                    <img src="https://bengkel-kuy.com/image/{{ $item['photo'] }} " height="320" />
                                    @else
                                    <input type="radio" name="slide_switch" id="{{ $item->id_gallery }}" />
                                    <label for="{{ $item->id_gallery }}">
                                        <img src="https://bengkel-kuy.com/image/{{ $item['photo'] }}" width="100" height="80" />
                                    </label>
                                    <img src="https://bengkel-kuy.com/image/{{ $item['photo'] }} " height="320" />
                                    @endif

                                    @empty

                                    @endforelse

                                </div>
                            </div>
                            <!--end::Engage Widget 14-->
                            <div class="col-md-12 col-lg-12 col-xxl-12" style="
                                    padding-right: 0px;
                                    padding-left: 0px;
                                ">
                                <!--begin::Stats Widget 33-->
                                <!--begin::Card-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Card Body-->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <h3 class="font-weight-bold font-size-h2 text-dark-75 mb-3">Product
                                                    Details</h3>

                                            </div>

                                        </div>
                                        <div class="font-size-lg mb-6">{{ $sparepart -> keterangan }}</div>
                                        <!--begin::Info-->

                                        <!--end::Info-->

                                    </div>

                                    <!--end::Card Body-->
                                </div>
                                <!--end::Card-->
                                <!--end::Stats Widget 33-->
                            </div>

                        </div>
                        <div class="col-md-5 col-lg-12 col-xxl-5">
                            <!--begin::List Widget 19-->
                            <div class="card card-custom  gutter-b">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">Ulasan</h3>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="scroll scroll-pull ps ps--active-y" data-scroll="true"
                                        style="height: 400px; overflow: hidden;">
                                        @foreach ($sparepart->Detailtransaksi as $review)
                                        @if ($review->rating)
                                             <div class="d-flex py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
                                                <span class="symbol-label">
                                                    <img src="user-assets/assets/media/svg/avatars/009-boy-4.svg"
                                                        class="h-75 align-self-end" alt="">
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-column flex-row-fluid">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <a href="#"
                                                        class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">{{ $review->Transaksi->User->nama_user }}</a>
                                                    <span
                                                        class="text-muted font-weight-normal flex-grow-1 font-size-sm">{{ date_format($review->updated_at,"d F Y ")}}</span>
                                                    <span class="font-weight-bolder label label-l label-light-success label-inline px-2 py-4 min-w-40px" >{{ $review->rating }}</span>
                                                </div>
                                                <span class="text-dark-75 font-size-sm font-weight-normal pt-1">{{ $review->review }}</span>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        @endif
                                       
                                        @endforeach
                                    </div>
                                    <!--begin: Example code-->

                                </div>
                            </div>

                            <div class="card card-custom gutter-b" style="
                                        background-color: #fff0f0;
                                    ">
                                <div class="card-body">

                                    <!--begin::Bottom-->
                                    <div class="d-flex align-items-center flex-wrap">
                                        <!--begin: Item-->
                                        <div class="d-flex align-items-center flex-lg-fill my-1">

                                            <div class="d-flex flex-column text-dark-75">
                                                <span class="font-weight-bolder font-size-sm">{{ $sparepart -> stock }}
                                                    Tersedia</span>
                                                <span class="font-weight-bolder font-size-h1">
                                                    <span class="text-dark-50 font-weight-bold">Rp
                                                    </span>{{ number_format($sparepart -> Harga['harga_jual']) }}</span>
                                            </div>
                                        </div>
                                        <!--end: Item-->

                                        @auth
                                        <form action="{{ route('detail-add', $sparepart->id_sparepart) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <!--begin: Item-->
                                            <div class="d-flex align-items-center flex-lg my-1">
                                                <span class="">
                                                    <button href="#" type="submit"
                                                        class="btn btn-block btn-sm btn-light-primary font-weight-bolder text-uppercase py-4">Tambah
                                                        Ke Keranjang</button> </span>

                                            </div>
                                            <!--end: Item-->
                                        </form>
                                        @else
                                        <!--begin: Item-->
                                        <div class="d-flex align-items-center flex-lg my-1">
                                            <span class="">
                                                <a href="{{ route('login') }}"
                                                    class="btn btn-block btn-sm btn-light-primary font-weight-bolder text-uppercase py-4">Tambah
                                                    Ke Keranjang</a> </span>

                                        </div>
                                        <!--end: Item-->
                                        @endauth


                                    </div>
                                    <!--end::Bottom-->
                                </div>
                            </div>


                            <!--end::List Widget 19-->
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

@push('addon-script')
<script src="http://thecodeplayer.com/uploads/js/prefixfree.js" type="text/javascript"></script>
@endpush
