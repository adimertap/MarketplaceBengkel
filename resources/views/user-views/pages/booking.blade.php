@extends('user-views.layouts.app')
@push('addon-style')

@endpush

@section('name')
History Reservasi
@endsection
@section('content')
<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            Riwayat Reservasi

                            {{-- <span class="d-block text-muted pt-2 font-size-sm">Datatable initialized
												from HTML table</span> --}}
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Search Form-->
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="row align-items-center">
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="Search..."
                                                id="kt_datatable_search_query" />
                                            <span><i class="flaticon2-search-1 text-muted"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Search Form-->
                    <!--end: Search Form-->

                    <!--begin: Datatable-->
                    <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                        <thead>
                            <tr>
                                <th title="Field #1">Kode Reservasi</th>
                                <th title="Field #2">Tanggal Reservasi</th>

                                <th title="Field #3">Nama Bengkel</th>
                                <th title="Field #4">Kendaraan</th>
                                <th title="Field #5">No plat</th>
                                <th title="Field #6">Keluhan</th>
                                <th title="Field #7">Status Reservasi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($booking as $item)
                            <tr>
                                <td>{{ $item->kode_reservasi }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->Bengkel->nama_bengkel }}</td>
                                <td>{{ $item->Kendaraan->nama_kendaraan }}</td>
                                <td>{{ $item->no_plat }}</td>
                                <td>{{ $item->keluhan_kendaraan }}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                            @empty

                            @endforelse

                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->
@endsection


@push('addon-script')

<!--begin::Page Vendors(used by this page)-->
<script src="user-assets/assets/js/pages/crud/ktdatatable/base/html-table.js?v=7.0.6"></script>

</script>
@endpush
