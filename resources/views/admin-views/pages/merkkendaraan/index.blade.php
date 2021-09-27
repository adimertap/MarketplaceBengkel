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
                            Master Data Merk Kendaraan
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-bottom">
                <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="overview-tab" href="#overview" data-toggle="tab" role="tab"
                            aria-controls="overview" aria-selected="true">Master Merk Kendaraan Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tes-tab" href="#tes" data-toggle="tab" role="tab"
                            aria-controls="tes" aria-selected="false">Master Merk Kendaraan Motor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" type="button" data-toggle="modal" data-target="#Modaltambah" role="tab"
                            aria-selected="false">Tambah Data Merk</a>
                    </li>
                </ul>
            </div>

            {{-- -------------------------------------------------------------------------------------------------------------------- --}}
            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                        <div class="datatable">
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
                                        <table class="table table-bordered table-hover dataTable" id="dataTable" width="100%"
                                            cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                        colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 30px;">No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 70px;">Kode Merk Kendaraan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 170px;">Merk Kendaraan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                        colspan="1" aria-label="Actions: activate to sort column ascending"
                                                        style="width: 77px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($merkmobil as $item)
                                                <tr role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">
                                                        {{ $loop->iteration}}</th>
                                                    <td>{{ $item->kode_merk_kendaraan }}</td>
                                                    <td>{{ $item->merk_kendaraan }}</td>
                                                    <td>
                                                        <a href="" class="btn btn-primary btn-datatable  mr-2" type="button"
                                                            data-toggle="modal"
                                                            data-target="#Modaledit-{{ $item->id_merk_kendaraan }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="" class="btn btn-danger btn-datatable" type="button"
                                                            data-toggle="modal"
                                                            data-target="#Modalhapus-{{ $item->id_merk_kendaraan }}">
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

                    <div class="tab-pane fade" id="tes" role="tabpanel" aria-labelledby="tes-tab">
                        <div class="datatable">
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
                                        <table class="table table-bordered table-hover dataTable" id="dataTable" width="100%"
                                            cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                        colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 30px;">No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 70px;">Kode Merk Kendaraan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 170px;">Merk Kendaraan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                        colspan="1" aria-label="Actions: activate to sort column ascending"
                                                        style="width: 77px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($merkmotor as $item)
                                                <tr role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">
                                                        {{ $loop->iteration}}</th>
                                                    <td>{{ $item->kode_merk_kendaraan }}</td>
                                                    <td>{{ $item->merk_kendaraan }}</td>
                                                    <td>
                                                        <a href="" class="btn btn-primary btn-datatable  mr-2" type="button"
                                                            data-toggle="modal"
                                                            data-target="#Modaledit-{{ $item->id_merk_kendaraan }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="" class="btn btn-danger btn-datatable" type="button"
                                                            data-toggle="modal"
                                                            data-target="#Modalhapus-{{ $item->id_merk_kendaraan }}">
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
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Merk Kendaraan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('merkkendaraan.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="kode_merk_kendaraan">Kode Merk Kendaraan</label><span
                            class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" name="kode_merk_kendaraan" type="text" id="kode_merk_kendaraan"
                            placeholder="Input Nama Kemasan" value="{{ $kode_merk }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="id_jenis_bengkel">Jenis Kegunaan</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <select class="form-control" name="id_jenis_bengkel" id="id_jenis_bengkel"
                            class="form-control @error('id_jenis_bengkel') is-invalid @enderror">
                            <option>Pilih Jenis Kegunaan</option>
                            @foreach ($jenis_bengkel as $items)
                            <option value="{{ $items->id_jenis_bengkel }}">{{ $items->nama_jenis_bengkel }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_jenis_bengkel')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="merk_kendaraan">Merk Kendaraan</label><span
                            class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" name="merk_kendaraan" type="text" id="merk_kendaraan"
                            placeholder="Input Nama Merk Kendaraan" value="{{ old('merk_kendaraan') }}">
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
@forelse ($merkmobil as $item)
<div class="modal fade" id="Modaledit-{{ $item->id_merk_kendaraan }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Merk Kendaraan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('merkkendaraan.update', $item->id_merk_kendaraan) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="kode_merk_kendaraan">Kode Merk Kendaraan</label><span
                            class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" name="kode_merk_kendaraan" type="text" id="kode_merk_kendaraan"
                            placeholder="Input Nama Kemasan" value="{{ $item->kode_merk_kendaraan }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="id_jenis_bengkel">Jenis Kegunaan</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <select class="form-control" name="id_jenis_bengkel" id="id_jenis_bengkel"
                            class="form-control @error('id_jenis_bengkel') is-invalid @enderror">
                            <option value="{{ $item->Jenisbengkel->id_jenis_bengkel }}">
                                {{ $item->Jenisbengkel->nama_jenis_bengkel }}</option>
                            @foreach ($jenis_bengkel as $itemz)
                            <option value="{{ $itemz->id_jenis_bengkel }}">{{ $itemz->nama_jenis_bengkel }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_jenis_bengkel')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="merk_kendaraan">Merk Kendaraan</label><span
                            class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" name="merk_kendaraan" type="text" id="merk_kendaraan"
                            placeholder="Input Nama Merk Kendaraan" value="{{ $item->merk_kendaraan }}">
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

@forelse ($merkmotor as $item)
<div class="modal fade" id="Modaledit-{{ $item->id_merk_kendaraan }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Merk Kendaraan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('merkkendaraan.update', $item->id_merk_kendaraan) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="kode_merk_kendaraan">Kode Merk Kendaraan</label><span
                            class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" name="kode_merk_kendaraan" type="text" id="kode_merk_kendaraan"
                            placeholder="Input Nama Kemasan" value="{{ $item->kode_merk_kendaraan }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="id_jenis_bengkel">Jenis Kegunaan</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <select class="form-control" name="id_jenis_bengkel" id="id_jenis_bengkel"
                            class="form-control @error('id_jenis_bengkel') is-invalid @enderror">
                            <option value="{{ $item->Jenisbengkel->id_jenis_bengkel }}">
                                {{ $item->Jenisbengkel->nama_jenis_bengkel }}</option>
                            @foreach ($jenis_bengkel as $itemz)
                            <option value="{{ $itemz->id_jenis_bengkel }}">{{ $itemz->nama_jenis_bengkel }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_jenis_bengkel')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="merk_kendaraan">Merk Kendaraan</label><span
                            class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" name="merk_kendaraan" type="text" id="merk_kendaraan"
                            placeholder="Input Nama Merk Kendaraan" value="{{ $item->merk_kendaraan }}">
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
@forelse ($merkmobil as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_merk_kendaraan }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('merkkendaraan.destroy', $item->id_merk_kendaraan) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body">Apakah Anda Yakin Menghapus Data Merk Kendaraan {{ $item->nama_kemasan }}?</div>
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

@forelse ($merkmotor as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_merk_kendaraan }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('merkkendaraan.destroy', $item->id_merk_kendaraan) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body">Apakah Anda Yakin Menghapus Data Merk Kendaraan {{ $item->nama_kemasan }}?</div>
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
