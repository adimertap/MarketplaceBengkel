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
                            List Sparepart
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <!-- Dashboard info widget 1-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-primary mb-1">Sparepart Mobil Aktif</div>
                                <div class="h6">Total: {{ $sparepartaktif }}</div>
                            </div>
                            <div class="ml-2"><i class="fas fa-cubes" style="color: gainsboro"></i> </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <!-- Dashboard info widget 1-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-warning h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-primary mb-1">Sparepart Motor Aktif</div>
                                <div class="h6">Total: {{ $sparepartaktifmotor }}</div>
                            </div>
                            <div class="ml-2"><i class="fas fa-cubes" style="color: gainsboro"></i> </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="col-xl-4 col-md-6 mb-4">
                <!-- Dashboard info widget 4-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-secondary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-secondary mb-1">Pengajuan Sparepart Baru</div>
                                <div class="h6">Total: {{ $sparepartpengajuan }}</div>
                            </div>
                            <div class="ml-2"><i class="fas fa-box-open" style="color: gainsboro"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- MAIN PAGE CONTENT --}}
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-bottom">
                <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="overview-tab" href="#overview" data-toggle="tab" role="tab"
                            aria-controls="overview" aria-selected="true">Sparepart Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tes-tab" href="#tes" data-toggle="tab" role="tab"
                            aria-controls="tes" aria-selected="false">Sparepart Motor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tambah-tab" href="#tambah" data-toggle="tab" role="tab"
                            aria-controls="tambah" aria-selected="false">Tambah Data Master</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="example-tab" href="#example" data-toggle="tab" role="tab"
                            aria-controls="example" aria-selected="false">Daftar Pengajuan Baru</a>
                    </li>
                </ul>
            </div>

            {{-- -------------------------------------------------------------------------------------------------------------------- --}}
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
                                                        style="width: 50px;">Kode</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 150px;">Nama Sparepart</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 70px;">Jenis</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 70px;">Merk</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 50px;">Satuan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 50px;">Kemasan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 50px;">Jenis Barang</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 50px;">Lifetime</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Actions: activate to sort column ascending"
                                                        style="width: 90px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($sparepartmobil as $item)
                                                <tr role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">
                                                        {{ $loop->iteration}}</th>
                                                    <td>{{ $item->kode_sparepart }}</td>
                                                    <td>{{ $item->nama_sparepart }}</td>
                                                    <td>{{ $item->Category->jenis_sparepart }}</td>
                                                    <td>{{ $item->Merk->merk_sparepart }}</td>
                                                    <td>{{ $item->Konversi->satuan }}</td>
                                                    <td>{{ $item->Kemasan->nama_kemasan }}</td>
                                                    <td>{{ $item->jenis_barang }}</td>
                                                    <td>{{ $item->lifetime }}</td>
                                                    <td>
                                                        <a href="{{ route('sparepart.edit', $item->id_sparepart) }}"
                                                            class="btn btn-primary btn-datatable" type="button">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="" class="btn btn-danger btn-datatable" type="button"
                                                            data-toggle="modal"
                                                            data-target="#Modalhapus-{{ $item->id_sparepart }}">
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
                                        <table class="table table-bordered table-hover dataTable" id="dataTableMotor"
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
                                                        style="width: 50px;">Kode</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 150px;">Nama Sparepart</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 70px;">Jenis</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 70px;">Merk</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 50px;">Satuan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 50px;">Kemasan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 50px;">Jenis Barang</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 50px;">Lifetime</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Actions: activate to sort column ascending"
                                                        style="width: 90px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($sparepartmotor as $item)
                                                <tr role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">
                                                        {{ $loop->iteration}}</th>
                                                    <td>{{ $item->kode_sparepart }}</td>
                                                    <td>{{ $item->nama_sparepart }}</td>
                                                    <td>{{ $item->Category->jenis_sparepart }}</td>
                                                    <td>{{ $item->Merk->merk_sparepart }}</td>
                                                    <td>{{ $item->Konversi->satuan }}</td>
                                                    <td>{{ $item->Kemasan->nama_kemasan }}</td>
                                                    <td>{{ $item->jenis_barang }}</td>
                                                    <td>{{ $item->lifetime }}</td>
                                                    <td>
                                                        <a href="{{ route('sparepart.edit', $item->id_sparepart) }}"
                                                            class="btn btn-primary btn-datatable" type="button">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="" class="btn btn-danger btn-datatable" type="button"
                                                            data-toggle="modal"
                                                            data-target="#Modalhapus-{{ $item->id_sparepart }}">
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
                    <div class="tab-pane fade" id="tambah" role="tabpanel" aria-labelledby="tambah-tab">
                        <div class="row justify-content-center mt-5">
                            <div class="col-xxl-6 col-xl-9">
                                <h3 class="text-primary">Sparepart</h3>
                                <h5 class="card-title">Input Formulir Sparepart</h5>
                                <form action="{{ route('sparepart.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="small mb-1" for="kode_sparepart">Kode Sparepart</label>
                                            <input class="form-control" id="kode_sparepart" type="text"
                                                name="kode_sparepart" placeholder="Input Kode Sparepart"
                                                value="{{ $kode_sparepart }}" readonly />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="id_jenis_bengkel">Jenis Kegunaan</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <select class="form-control" name="id_jenis_bengkel" id="id_jenis_bengkel"
                                                class="form-control @error('id_jenis_bengkel') is-invalid @enderror">
                                                <option>Pilih Jenis Kegunaan</option>
                                                @foreach ($jenis_bengkel as $item)
                                                <option value="{{ $item->id_jenis_bengkel }}">{{ $item->nama_jenis_bengkel }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_jenis_bengkel')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="small mb-1 mr-1" for="nama_sparepart">Nama
                                                Sparepart</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="nama_sparepart" type="text"
                                                name="nama_sparepart" placeholder="Input Nama Sparepart"
                                                value="{{ old('nama_sparepart') }}"
                                                class="form-control @error('nama_sparepart') is-invalid @enderror" />
                                            @error('nama_sparepart')<div class="text-danger small mb-1">
                                                {{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="id_jenis_sparepart">Pilih Jenis
                                                Sparepart</label><span class="mr-4 mb-3" style="color: red">*</span>

                                            <select class="form-control" name="id_jenis_sparepart"
                                                id="id_jenis_sparepart"
                                                class="form-control @error('id_jenis_transaksi') is-invalid @enderror">
                                                <option value="" holder>Pilih Jenis</option>
                                                @foreach ($jenis_sparepart as $item)
                                                <option value="{{ $item->id_jenis_sparepart }}">
                                                    {{ $item->jenis_sparepart }}
                                                </option>
                                                @endforeach
                                            </select>

                                            @error('id_jenis_sparepart')<div class="text-danger small mb-1">
                                                {{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="merk">Merk Sparepart</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <select class="form-control" name="id_merk" id="id_merk"
                                                class="form-control @error('id_merk') is-invalid @enderror">
                                                <option value="" holder>Pilih Merk</option>
                                            </select>
                                            <span class="small" style="font-size: 13px"
                                                style="color: rgb(117, 114, 114)">(Pilih jenis sparepart terlebih
                                                dahulu)</span>
                                            @error('id_merk')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="id_konversi">Konversi
                                                Satuan</label><span class="mr-4 mb-3" style="color: red">*</span>

                                            <select class="form-control" name="id_konversi" id="id_konversi"
                                                class="form-control @error('id_konversi') is-invalid @enderror">
                                                <option>Pilih Satuan</option>
                                                @foreach ($konversi as $item)
                                                <option value="{{ $item->id_konversi }}">{{ $item->satuan }}
                                                </option>
                                                @endforeach
                                            </select>

                                            @error('id_konversi')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="id_kemasan">Kemasan</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <select class="form-control" name="id_kemasan" id="id_kemasan"
                                                class="form-control @error('id_kemasan') is-invalid @enderror">
                                                <option>Pilih Kemasan</option>
                                                @foreach ($kemasan as $kemas)
                                                <option value="{{ $kemas->id_kemasan }}">{{ $kemas->nama_kemasan }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_kemasan')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="lifetime">Lifetime</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <select name="lifetime" id="lifetime" class="form-control"
                                                class="form-control @error('lifetime') is-invalid @enderror">
                                                <option value="{{ old('lifetime')}}"> Pilih Lifetime</option>
                                                <option value="Long">Long</option>
                                                <option value="Short">Short</option>
                                            </select>
                                            @error('lifetime')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="jenis_barang">Jenis
                                                Barang</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <select name="jenis_barang" id="jenis_barang" class="form-control"
                                                class="form-control @error('jenis_barang') is-invalid @enderror">
                                                <option value="{{ old('jenis_barang')}}"> Pilih Jenis Barang
                                                </option>
                                                <option value="Lokal">Lokal</option>
                                                <option value="Import">Import</option>
                                            </select>
                                            @error('jenis_barang')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="dimensi_berat">Dimensi
                                                Berat</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="dimensi_berat" type="number"
                                                name="dimensi_berat" placeholder="Input Dimensi Berat"
                                                value="{{ old('dimensi_berat') }}"
                                                class="form-control @error('dimensi_berat') is-invalid @enderror" />
                                            @error('dimensi_berat')<div class="text-danger small mb-1">
                                                {{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                            <hr class="my-4" />
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('sparepart.index') }}" class="btn btn-light">Kembali</a>
                                <button class="btn btn-primary" type="Submit">Tambah Data!</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- --------------------------------------------------------------------------------------------------------------------------------- --}}
                <div class="tab-pane fade" id="example" role="tabpanel" aria-labelledby="example-tab">
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
                                    <table class="table table-bordered table-hover dataTable" id="dataTablePengajuan"
                                        width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 10px;">No</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 50px;">Kode</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 150px;">Nama Sparepart</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 70px;">Jenis</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 70px;">Merk</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 30px;">Satuan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 50px;">Kemasan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 30px;">Jenis Barang</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 30px;">Lifetime</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 120px;">Status Approved</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($pengajuansparepart as $item)
                                            <tr role="row" class="odd">
                                                <th scope="row" class="small" class="sorting_1">
                                                    {{ $loop->iteration}}</th>
                                                <td>{{ $item->kode_sparepart }}</td>
                                                <td>{{ $item->nama_sparepart }}</td>
                                                <td>{{ $item->Category->jenis_sparepart }}</td>
                                                <td>{{ $item->Merk->merk_sparepart }}</td>
                                                <td>{{ $item->Konversi->satuan }}</td>
                                                <td>{{ $item->Kemasan->nama_kemasan }}</td>
                                                <td>{{ $item->jenis_barang }}</td>
                                                <td>{{ $item->lifetime }}</td>
                                                <td>
                                                    <a href="" class="btn btn-success btn-datatable" type="button"
                                                        data-toggle="modal"
                                                        data-target="#Modalkonfirmasisetuju-{{ $item->id_sparepart }}">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                    <a href="" class="btn btn-danger btn-datatable" type="button"
                                                        data-toggle="modal"
                                                        data-target="#Modalkonfirmasitolak-{{ $item->id_sparepart }}">
                                                        <i class="fas fa-times"></i>
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

    @forelse ($sparepartmobil as $items)
    <div class="modal fade" id="Modalkonfirmasisetuju-{{ $items->id_sparepart }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success-soft">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Setujui Pengajuan Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('sparepart-status-pengajuan', $items->id_sparepart) }}?status_sparepart=Aktif"
                    method="POST" class="d-inline">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">Apakah Anda Yakin Menyetujui Data Pengajuan Sparepart
                            <b>{{ $items->nama_sparepart }}</b> dengan kode {{ $items->kode_sparepart }} ?</div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-success" type="submit">Ya! Approve</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @empty
    @endforelse

    @forelse ($sparepartmotor as $items)
    <div class="modal fade" id="Modalkonfirmasisetuju-{{ $items->id_sparepart }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success-soft">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Setujui Pengajuan Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('sparepart-status-pengajuan', $items->id_sparepart) }}?status_sparepart=Aktif"
                    method="POST" class="d-inline">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">Apakah Anda Yakin Menyetujui Data Pengajuan Sparepart
                            <b>{{ $items->nama_sparepart }}</b> dengan kode {{ $items->kode_sparepart }} ?</div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-success" type="submit">Ya! Approve</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @empty
    @endforelse

    @forelse ($sparepartmobil as $itemz)
    <div class="modal fade" id="Modalkonfirmasitolak-{{ $itemz->id_sparepart }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger-soft">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Tolak Pengajuan Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('sparepart-status-pengajuan', $itemz->id_sparepart) }}?status_sparepart=Tidak Aktif"
                    method="POST" class="d-inline">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">Apakah Anda Yakin Menolak Data Pengajuan Sparepart
                            <b>{{ $itemz->nama_sparepart }}</b> dengan kode {{ $itemz->kode_sparepart }} ?</div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-danger" type="submit">Ya! Tolak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @empty
    @endforelse

    @forelse ($sparepartmotor as $itemz)
    <div class="modal fade" id="Modalkonfirmasitolak-{{ $itemz->id_sparepart }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger-soft">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Tolak Pengajuan Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('sparepart-status-pengajuan', $itemz->id_sparepart) }}?status_sparepart=Tidak Aktif"
                    method="POST" class="d-inline">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">Apakah Anda Yakin Menolak Data Pengajuan Sparepart
                            <b>{{ $itemz->nama_sparepart }}</b> dengan kode {{ $itemz->kode_sparepart }} ?</div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-danger" type="submit">Ya! Tolak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @empty
    @endforelse

    {{-- MODAL DELETE ------------------------------------------------------------------------------}}
    @forelse ($sparepartmobil as $item)
    <div class="modal fade" id="Modalhapus-{{ $item->id_sparepart }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger-soft">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('sparepart.destroy', $item->id_sparepart) }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <div class="modal-body">Apakah Anda Yakin Menghapus Data Sparepart
                        <b>{{ $item->nama_sparepart }}</b> , dengan kode <b>{{ $item->kode_sparepart }}</b> ?</div>
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

    {{-- MODAL DELETE ------------------------------------------------------------------------------}}
    @forelse ($sparepartmotor as $item)
    <div class="modal fade" id="Modalhapus-{{ $item->id_sparepart }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger-soft">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('sparepart.destroy', $item->id_sparepart) }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <div class="modal-body">Apakah Anda Yakin Menghapus Data Sparepart
                        <b>{{ $item->nama_sparepart }}</b> , dengan kode <b>{{ $item->kode_sparepart }}</b> ?</div>
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


</main>



@endsection

@push('addon-script')
<script>
   


    $(document).ready(function () {
        $('#validasierror').click();
        $('#dataTablePengajuan').DataTable();
        $('#dataTableMotor').DataTable();


        $('select[name="id_jenis_sparepart"]').on('change', function () {
            var id_jenis_sparepart = $(this).val();
            if (id_jenis_sparepart) {
                $.ajax({
                    url: '/admin/sparepart/getmerk/' + id_jenis_sparepart,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        onsole.log(data)
                        $('select[name="id_merk"]').empty();
                        $('select[name="id_merk"]').append(
                            '<option value="" holder>Pilih Merk</option>')
                        $.each(data, function (key, value) {
                            $('select[name="id_merk"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                    error: function (response) {
                        console.log(response)
                    }
                });
            } else {
                $('select[name="id_merk"]').empty();
            }
        });
    });

</script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="/admin-assets/assets/demo/datatables-demo.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
<script src="/admin-assets/assets/demo/date-range-picker-demo.js"></script>
@endpush
