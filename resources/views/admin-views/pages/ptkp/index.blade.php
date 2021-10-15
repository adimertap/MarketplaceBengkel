@extends('admin-views.layouts.app')

@section('name')
Dashboard
@endsection

@push('prepend-style')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />
<link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet"
    crossorigin="anonymous" />
<link rel="icon" type="image/x-icon" href="{{ url('image/logo_new.png') }}" />
@endpush

@section('content')
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-warehouse"></i></div>
                            Master Data PTKP
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">List PTKP
                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal"
                        data-target="#Modaltambah">Tambah PTKP</button>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                        <div class="datatable">
                            {{-- SHOW ENTRIES --}}
                            @if(session('messageberhasil'))
                            <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                                {{ session('messageberhasil') }}
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            @endif

                            @if(session('messagehapus'))
                            <div class="alert alert-danger" role="alert"> <i class="fas fa-check"></i>
                                {{ session('messagehapus') }}
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            @endif
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-hover dataTable" id="dataTable"
                                            width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                            style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 30px;">No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 80px;">Nama PTKP</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 180px;">Besaran PTKP</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 150px;">Keterangan PTKP</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Actions: activate to sort column ascending"
                                                        style="width: 77px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($ptkp as $item)
                                                <tr role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">
                                                        {{ $loop->iteration}}.</th>
                                                    <td>{{ $item->nama_ptkp }}</td>
                                                    <td>Rp {{ number_format($item->besaran_ptkp,2,',','.') }}</td>
                                                    <td>{{ $item->keterangan_ptkp }}</td>
                                                    <td>
                                                        <a href="" class="btn btn-primary btn-datatable  mr-2"
                                                            type="button" data-toggle="modal"
                                                            data-target="#Modaledit-{{ $item->id_ptkp }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="" class="btn btn-danger btn-datatable" type="button"
                                                            data-toggle="modal"
                                                            data-target="#Modalhapus-{{ $item->id_ptkp }}">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @empty

                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

{{-- MODAL Tambah -------------------------------------------------------------------------------------------}}
<div class="modal fade" id="Modaltambah" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data PTKP</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('ptkp.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="nama_ptkp">Nama PTKP</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="nama_ptkp" type="text" id="nama_ptkp"
                            placeholder="Input Nama PTKP" value="{{ old('nama_ptkp') }}"
                            class="form-control @error('nama_ptkp') is-invalid @enderror"></input>
                        @error('nama_ptkp')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="besaran_ptkp">Besaran PTKP</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="besaran_ptkp" type="number" id="besaran_ptkp"
                            placeholder="Input Besaran PTKP" value="{{ old('besaran_ptkp') }}"
                            class="form-control @error('besaran_ptkp') is-invalid @enderror"></input>
                        @error('besaran_ptkp')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="keterangan_ptkp">Keterangan PTKP</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="keterangan_ptkp" type="text" id="keterangan_ptkp"
                            placeholder="Input Keterangan PTKP" value="{{ old('keterangan_ptkp') }}"
                            class="form-control @error('keterangan_ptkp') is-invalid @enderror"></input>
                        @error('keterangan_ptkp')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                </div>

                {{-- Validasi Error --}}
                @if (count($errors) > 0)
                @endif
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="Submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- MODAL EDIT -------------------------------------------------------------------------------------------}}
@forelse ($ptkp as $item)
<div class="modal fade" id="Modaledit-{{ $item->id_ptkp }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Edit PTKP</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('ptkp.update', $item->id_ptkp) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="nama_ptkp">Nama PTKP</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="nama_ptkp" type="text" id="nama_ptkp"
                            placeholder="Input Nama PTKP" value="{{ $item->nama_ptkp }}" required>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="besaran_ptkp">Besaran PTKP</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="besaran_ptkp" type="number" id="besaran_ptkp"
                            placeholder="Input Besaran PTKP" value="{{ $item->besaran_ptkp }}" required>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="keterangan_ptkp">Keterangan PTKP</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="keterangan_ptkp" type="text" id="keterangan_ptkp"
                            placeholder="Input Keterangan PTKP" value="{{ $item->keterangan_ptkp }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="Submit">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse

{{-- MODAL DELETE ------------------------------------------------------------------------------}}
@forelse ($ptkp as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_ptkp }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('ptkp.destroy', $item->id_ptkp) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body">Apakah Anda Yakin Menghapus Data PTKP
                    <b>{{ $item->nama_ptkp }}</b> , dengan besaran <b>{{ $item->besaran_ptkp }}%</b> ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit">Ya! Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse



@if (count($errors) > 0)

<button id="validasierror" style="display: none" type="button" data-toggle="modal" data-target="#Modaltambah">Open
    Modal</button>
@endif


</main>
@endsection

@push('addon-script')
<script>
    $(document).ready(function () {
        $('#validasierror').click();
    });

</script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="/admin-assets/assets/demo/datatables-demo.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
<script src="/admin-assets/assets/demo/date-range-picker-demo.js"></script>
@endpush
