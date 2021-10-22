@extends('user-views.layouts.app')

@section('name')
Categories
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
                {{-- <div class="flex-column offcanvas-mobile w-300px w-xl-325px" id="kt_profile_aside"
                    data-sticky-container>
                    <!--begin::Forms Widget 15-->
                    <div class="card card-custom sticky" data-sticky="true" data-margin-top="140px"
                        data-sticky-for="1023" data-sticky-class="kt-sticky">
                        <div class="card card-custom gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Form-->
                                <form action="#" method="get">
                                    <!--begin::Categories-->
                                    <div class="form-group mb-11">
                                        <label class="font-size-h2 font-weight-bolder text-dark">{{ $categories }}</label>
                <div class="separator separator-solid separator-border-3"></div>
            </div>
            <!--end::Categories-->
            <!--begin::Prices-->
            <div class="form-group mb-7">
                <label class="font-size-h5 font-weight-bolder text-dark ">Harga</label>
                <!--begin::Radio list-->
                <div class="form-group" style="margin-bottom: 10px">
                    <label>Min</label>
                    <input type="number" name="min" class="form-control form-control-lg" placeholder="Large input" />
                    @if ($categories != 'Terbaru' && $categories != 'Terlaris')
                    <input type="hidden" name="cat" class="form-control form-control-lg" value="{{ $categories }}" />

                    @endif
                </div>
                <div class="form-group " style="margin-bottom: 10px">
                    <label>Maks</label>
                    <input type=" number" name="max" class="form-control form-control-lg" placeholder="Large input" />
                </div>

                <!--end::Radio list-->
            </div>
            <!--end::Prices-->

            <!--begin::sort-->
            <div class="form-group mb-7">
                <label class="font-size-h5 font-weight-bolder text-dark ">Urutkan
                    Menurut</label>
                <!--begin::Radio list-->
                <select class="custom-select form-control" name="urutan">
                    <option value="terbaru">Terbaru</option>
                    <option value="terlaris">Terlaris</option>
                </select>

                <!--end::Radio sort-->
            </div>
            <!--end::Prices-->
            <button type="submit" class="btn btn-primary font-weight-bolder mr-2 px-8">Tampilkan</button>
            <button type="reset" class="btn btn-clear font-weight-bolder text-muted px-8">Reset</button>
            </form>
            <!--end::Form-->
        </div>
    </div>

    <!--end::Body-->
</div>
<!--end::Forms Widget 15-->
</div> --}}
<!--end::Aside-->
<!--begin::Layout-->
<div class="flex-row-fluid ml-lg-12">
    <!--begin::Card-->
    <div class="card card-custom card-stretch gutter-b">
        <div class="card-body">
            <label class="font-size-h2 font-weight-bolder text-dark">{{ $categories }}</label>
            <!--begin::Section-->
            <div class="row mb-7">
                @forelse ($sparepart as $item)

                @php
                $average = 0;
                $rating = 0;
                $count = 1;
                @endphp

                @foreach ($item->Rating as $star)
                @php

                if($star->rating){
                $rating += $star->rating;
                $average = $rating/$count;
                $count += 1;

                }
                @endphp
                @endforeach
                <!--begin::Product-->
                <div class="col-md-4 col-xxl-3 col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom card-shadowless">
                        <div class="card-body p-0">
                            <!--begin::Image-->
                            <div class="overlay">
                                <div class="overlay-wrapper rounded bg-light text-center">
                                    @if ($item ->Galleries_one)
                                    <img src="https://inventory.bengkel-kuy.com/image/{{ $item ->Galleries_one->photo}}" alt=""
                                        class="mh-100 h-200px mw-100 w-200px" />
                                    @endif

                                </div>
                                <div class="overlay-layer">
                                    <a href="{{ route('detail', $item->slug) }}"
                                        class="btn font-weight-bolder btn-sm btn-primary mr-2">Lihat</a>
                                    @auth
                                    <form action="{{ route('detail-add', $item->id_detail_sparepart) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <!--begin: Item-->
                                        <div class="d-flex align-items-center flex-lg my-1">
                                            <span class="">
                                                <button type="submit"
                                                    class="btn font-weight-bolder btn-sm btn-light-primary">Tambah
                                                    Ke Keranjang</button> </span>

                                        </div>
                                        <!--end: Item-->
                                    </form>
                                    @else
                                    <a href="{{ route('login') }}"
                                        class="btn font-weight-bolder btn-sm btn-light-primary">Tambah
                                        Ke Keranjang</a>
                                    @endauth
                                </div>
                            </div>
                            <!--end::Image-->
                            <!--begin::Details-->
                            <div
                                class="text-center mt-2 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                                <a href="{{ route('detail', $item->slug) }}"
                                    class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary">{{ $item -> nama_sparepart }}</a>
                                <span class="font-size-sm">{{ $item ->Bengkel['nama_bengkel'] }}</span>

                                <div class="d-flex align-items-center flex-wrap">
                                    <!--begin: Item-->
                                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                        <div class="d-flex flex-column text-dark-75">
                                            <span
                                                class="font-weight-bolder label label-l label-light-primary label-inline px-2 py-4 min-w-40px"> <i class="flaticon-star text-primary"></i>{{ round($average, 1) }}</span>
                                        </div>
                                    </div>
                                    <!--end: Item-->

                                    <!--begin: Item-->
                                    <div class="d-flex align-items-right  my-1">
                                        <div class="d-flex flex-column text-dark-75 ">
                                            <span class="font-weight-bolder font-size-h5"><span
                                                    class="text-dark-50  font-weight-bold">Rp </span>{{ number_format($item->harga_market, 0, ",", ".") }}</span>
                                        </div>
                                    </div>
                                    <!--end: Item-->
                                </div>
                            </div>
                            <!--end::Details-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Product-->


                @empty

                @endforelse
            </div>
            {{ $sparepart->appends(['search' => request()->query('search')])->links() }}
            <!--end::Section-->
            {{-- <div class="text-center">
                                <button type="button"
                                    class="btn btn-outline-success btn-lg align-items-lg-center">Tampilkan Lebih
                                    Bnayk</button>
                            </div> --}}
        </div>
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
<script src="user-assets/assets/js/pages/widgets.js"></script>
<!--end::Page Scripts-->
<!--begin::Page Scripts(used by this page)-->
<script src="user-assets/assets/js/pages/features/miscellaneous/sticky-panels.js?v=7.0.6"></script>
<!--end::Page Scripts-->
@endpush
