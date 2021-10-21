@extends('admin-views.layouts.app')

@section('name')
PPH21
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
                            Master Data Pph21 / Pajak Penghasilan
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">List Pph21
                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal"
                        data-target="#Modaltambah">Tambah Pph21</button>
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
                                                        style="width: 250px;">Nama Pph21</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 100px;">Kumulatif Tahunan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 60px;">Besaran Pph21</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Actions: activate to sort column ascending"
                                                        style="width: 77px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($pph21 as $item)
                                                <tr role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">
                                                        {{ $loop->iteration}}</th>
                                                    <td>{{ $item->nama_pph21 }}</td>
                                                    <td>Rp. {{ number_format($item->kumulatif_tahunan,2,',','.') }}</td>
                                                    <td class="text-center">{{ $item->besaran_pph21 }} <b>%</b></td>
                                                    <td>
                                                        <a href="" class="btn btn-primary btn-datatable  mr-2"
                                                            type="button" data-toggle="modal"
                                                            data-target="#Modaledit-{{ $item->id_pph21 }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="" class="btn btn-danger btn-datatable" type="button"
                                                            data-toggle="modal"
                                                            data-target="#Modalhapus-{{ $item->id_pph21 }}">
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
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Pph21</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('pph21.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="nama_pph21">Nama Pph21</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="nama_pph21" type="text" id="nama_pph21"
                            placeholder="Input Nama Pajak Penghasilan" value="{{ old('nama_pph21') }}"
                            class="form-control @error('nama_pph21') is-invalid @enderror"></input>
                        @error('nama_pph21')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="kumulatif_tahunan">Kumulatif Tahunan</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="kumulatif_tahunan" type="text" id="kumulatif_tahunan"
                            placeholder="Input Besaran Kumulatif Tahunan" value="{{ old('kumulatif_tahunan') }}"
                            class="form-control @error('kumulatif_tahunan') is-invalid @enderror"></input>
                        @error('kumulatif_tahunan')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="besaran_pph21">Besaran Pph21</label><span class="mr-4 mb-3"
                        style="color: red">*</span>
                        <div class="input-group input-group-joined">
                           
                            <div class="input-group-prepend">
                               
                                <span class="input-group-text mr-2">
                                    <i class="fas fa-percentage"></i>
                                </span>
                            </div>
                            <input class="form-control" id="besaran_pph21" type="number" name="besaran_pph21"
                            placeholder="Input Besaran Pajak Penghasilan" value="{{ old('besaran_pph21') }}">
                        </div>
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
@forelse ($pph21 as $item)
<div class="modal fade" id="Modaledit-{{ $item->id_pph21 }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Pph21</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('pph21.update', $item->id_pph21) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="nama_pph21">Nama Pph21</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="nama_pph21" type="text" id="nama_pph21"
                            placeholder="Input Nama Pajak Penghasilan" value="{{ $item->nama_pph21 }}" required>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="kumulatif_tahunan">Kumulatif Tahunan</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="kumulatif_tahunan" type="text" id="kumulatif_tahunan"
                            placeholder="Input Besaran Kumulatif Tahunan" value="{{ $item->kumulatif_tahunan }}" required>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="besaran_pph21">Besaran Pph21</label><span class="mr-4 mb-3"
                        style="color: red">*</span>
                        <div class="input-group input-group-joined">
                            <div class="input-group-prepend ">
                                
                                <span class="input-group-text  mr-2">
                                    <i class="fas fa-percentage"></i>
                                </span>
                            </div>
                            <input class="form-control" id="besaran_pph21" type="number" name="besaran_pph21"
                            placeholder="Input Besaran Pajak Penghasilan" value="{{ $item->besaran_pph21 }}" required>
                        </div>
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
@forelse ($pph21 as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_pph21 }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('pph21.destroy', $item->id_pph21) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body">Apakah Anda Yakin Menghapus Data Pajak Penghasilan <b>{{ $item->nama_pph21 }}</b> , dengan besaran <b>{{ $item->besaran_pph21 }}%</b> ?</div>
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
