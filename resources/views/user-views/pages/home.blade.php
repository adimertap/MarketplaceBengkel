@extends('user-views.layouts.app')

@section('name')
Marketplace Homepage
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
                <div class="flex-row-fluid ml-12">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-body">
                            <!--begin::Engage Widget 15-->
                            <div id="carouselExampleIndicators" class="carousel slide mb-11" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <a href="{{ route("maps") }}">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="../image/map.png" alt="First slide">
                                        </div>
                                    </a>
                                    <a href="{{ route("maps") }}">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="../image/map.png" alt="First slide">
                                        </div>
                                    </a>

                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <!--end::Engage Widget 15-->

                            <!--begin::Section-->
                            <div class="mb-8">
                                <!--begin::Heading-->
                                <div class="d-flex justify-content-between align-items-center mb-7">
                                    <h2 class="font-weight-bolder text-dark font-size-h3 mb-0">Produk Terbaru</h2>
                                    <a href="{{ route('categories-terbaru') }}"
                                        class="btn btn-light-primary btn-sm font-weight-bolder">Lihat
                                        Selengkapnya</a>
                                </div>
                                <!--end::Heading-->
                                <!--begin::Products-->
                                <div class="row">
                                    @forelse ($sparepart as $item)
                                    <!--begin::Product-->
                                    <div class="col-md-4 col-xxl-3 col-12">
                                        <!--begin::Card-->
                                        <div class="card card-custom card-shadowless">
                                            <div class="card-body p-0">
                                                <!--begin::Image-->
                                                <div class="overlay">
                                                    <div class="overlay-wrapper rounded bg-light text-center">
                                                        @if ($item->Galleries_one)
                                                        <img src="https://bengkel-kuy.com/image/{{ $item->Galleries_one->photo }}"
                                                            alt="" class="mh-100 h-200px mw-100 w-200px" />
                                                        @endif


                                                    </div>
                                                    <div class="overlay-layer">
                                                        <a href="{{ route('detail', $item->slug) }}"
                                                            class="btn font-weight-bolder btn-sm btn-primary mr-2">Lihat</a>
                                                        @auth
                                                        <form action="{{ route('detail-add', $item->id_detail_sparepart) }}"
                                                            method="post" enctype="multipart/form-data">
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

                                                <div
                                                    class="text-center mt-2 mb-md-0 mb-5 mb-md-0 mb-5 mb-0 mb-5 d-flex flex-column">
                                                    <a href="{{ route('detail', $item->slug) }}"
                                                        class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary">{{ $item ->nama_sparepart }}</a>
                                                    <a href="{{ route('bengkel', $item->Bengkel->slug) }}"
                                                        class="font-size-sm">{{ $item ->Bengkel['nama_bengkel'] }}</a>

                                                    <div class="d-flex align-items-center flex-wrap">
                                                        <!--begin: Item-->
                                                        <div class="d-flex align-items-center flex-fill mr-5 my-1">
                                                            <div class="d-flex flex-column text-dark-75">
                                                                <span
                                                                    class="font-weight-bolder label label-l label-light-primary label-inline px-2 py-4 min-w-40px">
                                                                    <i
                                                                        class="flaticon-star text-primary"></i>{{ round($average, 1) }}</span>
                                                            </div>
                                                        </div>
                                                        <!--end: Item-->

                                                        <!--begin: Item-->
                                                        <div class="d-flex align-items-right  my-1">
                                                            <div class="d-flex flex-column text-dark-75 ">
                                                                <span class="font-weight-bolder font-size-h5"><span
                                                                        class="text-dark-50  font-weight-bold">Rp.</span>{{ $item ->harga_market }}</span>
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
                                <!--end::Products-->
                            </div>
                            <!--end::Section-->

                            <!--begin::Section-->
                            <div class="mb-8">
                                <!--begin::Heading-->
                                <div class="d-flex justify-content-between align-items-center mb-7">
                                    <h2 class="font-weight-bolder text-dark font-size-h3 mb-0">Produk Terlaris</h2>
                                    <a href="{{ route('categories-terlaris') }}"
                                        class="btn btn-light-primary btn-sm font-weight-bolder">Lihat
                                        Selengkapnya</a>
                                </div>
                                <!--end::Heading-->
                                <!--begin::Products-->
                                {{-- <div class="row">
                                    @forelse ($terlaris as $item)

                                    @php
                                    $average = 0;
                                    $rating = 0;
                                    $count = 1;
                                    @endphp

                                    @foreach ($item->Sparepart->Rating as $star)
                                    @php

                                    if($star->rating){
                                    $rating += $star->rating;
                                    $average = $rating/$count;
                                    $count += 1;

                                    }
                                    @endphp
                                    @endforeach
                                    <!--begin::Product-->
                                    <div class="col-md-4 col-xxl-3 col-12">
                                        <!--begin::Card-->
                                        <div class="card card-custom card-shadowless">
                                            <div class="card-body p-0">
                                                <!--begin::Image-->
                                                <div class="overlay">
                                                    <div class="overlay-wrapper rounded bg-light text-center">
                                                        @if ($item->Sparepart ->Galleries_one)
                                                        <img src="https://bengkel-kuy.com/image/{{ $item->Sparepart ->Galleries_one->photo }}"
                                                            alt="" class="mh-100 h-200px mw-100 w-200px" />
                                                        @endif

                                                    </div>
                                                    <div class="overlay-layer">
                                                        <a href="{{ route('detail', $item->Sparepart->slug) }}"
                                                            class="btn font-weight-bolder btn-sm btn-primary mr-2">Lihat</a>
                                                        @auth
                                                        <form
                                                            action="{{ route('detail-add', $item->sparepart->id_detail_sparepart) }}"
                                                            method="post" enctype="multipart/form-data">
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
                                                    class="text-center mt-2 mb-md-0 mb-5 mb-md-0 mb-5 mb-0 mb-5 d-flex flex-column">
                                                    <a href="{{ route('detail', $item->Sparepart->slug) }}"
                                                        class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary">{{ $item->Sparepart->nama_sparepart }}</a>
                                                    <a href="{{ route('bengkel', $item->Sparepart->Bengkel->slug) }}"
                                                        class="font-size-sm">{{ $item ->Sparepart->Bengkel['nama_bengkel'] }}</a>

                                                    <div class="d-flex align-items-center flex-wrap">
                                                        <!--begin: Item-->
                                                        <div class="d-flex align-items-center flex-fill mr-5 my-1">
                                                            <div class="d-flex flex-column text-dark-75">
                                                                <span
                                                                    class="font-weight-bolder label label-l label-light-primary label-inline px-2 py-4 min-w-40px">
                                                                    <i
                                                                        class="flaticon-star text-primary"></i>{{ round($average, 1) }}</span>
                                                            </div>
                                                        </div>
                                                        <!--end: Item-->

                                                        <!--begin: Item-->
                                                        <div class="d-flex align-items-right  my-1">
                                                            <div class="d-flex flex-column text-dark-75 ">
                                                                <span class="font-weight-bolder font-size-h5"><span
                                                                        class="text-dark-50  font-weight-bold">Rp.</span>{{ $item->Sparepart->harga_market }}</span>
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
                                </div> --}}
                                <!--end::Products-->
                            </div>
                            <!--end::Section-->

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
@endsection
