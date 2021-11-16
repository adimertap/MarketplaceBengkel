@extends('user-views.layouts.app')
@push('addon-style')

@endpush

@section('name')
Reservasi
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
                    <div class="card card-custom">
                        <div class="card-header">
                            <h3 class="card-title">
                                Input States
                            </h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" method="POST" action="{{ route("reservasi-kirim", $bengkel->slug) }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="id_bengkel" class="form-control form-control-solid"
                                        value="{{ $bengkel->id_bengkel}}" />
                                </div>
                                <div class="form-group">
                                    <label>Kode Reservasi</label>
                                    <input type="text" name="code" class="form-control form-control-solid"
                                        value="{{ $code }} " readonly />
                                </div>
                                <div class="form-group">
                                    <label>Nama Bengkel</label>
                                    <input type="text" class="form-control form-control-solid"
                                        value="{{ $bengkel->nama_bengkel }} " readonly />
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kendaraan</label>
                                    <select class="form-control form-control-solid" name="id_kendaraan" required
                                        <option>pilih kendaraan</option>

                                        @forelse ($kendaraan as $item)
                                        <option value="{{ $item->Kendaraan->id_kendaraan }}">{{ $item->Kendaraan->nama_kendaraan }}</option>
                                        @empty 
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>No Plat Kendaraan</label>
                                    <input type="text" class="form-control form-control-solid" name="no_plat" required/>
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea">Keluhan</label>
                                    <textarea class="form-control form-control-solid" rows="3" name="keluhan" required></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>
                        <!--end::Form-->
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
