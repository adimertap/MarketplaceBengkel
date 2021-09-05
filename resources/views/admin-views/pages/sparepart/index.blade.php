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
    {{-- MAIN PAGE CONTENT --}}
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-bottom">
                <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="overview-tab" href="#overview" data-toggle="tab" role="tab"
                            aria-controls="overview" aria-selected="true">Master Sparepart</a>
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
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 50px;">Set Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Actions: activate to sort column ascending"
                                                        style="width: 90px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($sparepart as $item)
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
                                                        @if ($item->status_sparepart == 'Tidak Aktif')
                                                        <form
                                                            action="{{ route('sparepart-aktif', $item->id_sparepart) }}"
                                                            method="POST" id="form1" class="d-inline">
                                                            @csrf
                                                            <div class="">
                                                                <input class="checkaktif"
                                                                    onclick="tidakaktif(event, {{ $item->id_sparepart }})"
                                                                    id="sparepart-{{ $item->id_sparepart }}"
                                                                    type="checkbox" />
                                                                <label class="" for="customCheck1">Tidak Aktif</label>
                                                            </div>
                                                        </form>
                                                        @else
                                                        <form
                                                            action="{{ route('sparepart-tidak-aktif', $item->id_sparepart) }}"
                                                            method="POST" id="form1" class="d-inline">
                                                            @csrf
                                                            <div class="">
                                                                <input class="checktidakaktif"
                                                                    onclick="tidakaktif(event, {{ $item->id_sparepart }})"
                                                                    id="sparepart-{{ $item->id_sparepart }}"
                                                                    type="checkbox" checked />
                                                                <label class="" for="customCheck1">Aktif</label>
                                                            </div>
                                                        </form>
                                                        @endif
                                                    </td>
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
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="kode_sparepart">Kode Sparepart</label>
                                            <input class="form-control" id="kode_sparepart" type="text"
                                                name="kode_sparepart" placeholder="Input Kode Sparepart"
                                                value="{{ $kode_sparepart }}" readonly />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="nama_sparepart">Nama
                                                Sparepart</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="nama_sparepart" type="text"
                                                name="nama_sparepart" placeholder="Input Nama Sparepart"
                                                value="{{ old('nama_sparepart') }}"
                                                class="form-control @error('nama_sparepart') is-invalid @enderror" />
                                            @error('nama_sparepart')<div class="text-danger small mb-1">{{ $message }}
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
                                            <label class="small mb-1 mr-1" for="jenis_barang">Jenis Barang</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <select name="jenis_barang" id="jenis_barang" class="form-control"
                                                class="form-control @error('jenis_barang') is-invalid @enderror">
                                                <option value="{{ old('jenis_barang')}}"> Pilih Jenis Barang</option>
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
                                            @error('dimensi_berat')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label class="small mb-1 mr-1" for="id_supplier">Pilih Supplier Asal</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                        <select class="form-control" name="id_supplier" id="id_supplier"
                                            class="form-control @error('id_supplier') is-invalid @enderror">
                                            <option> Pilih Supplier</option>
                                            @foreach ($supplier as $item)
                                            <option value="{{ $item->id_supplier }}">{{ $item->nama_supplier }}
                                    </option>
                                    @endforeach
                                    </select>
                                    @error('id_supplier')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                            </div> --}}
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
                                    <table class="table table-bordered table-hover dataTable" id="dataTable2"
                                        width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 30px;">No</th>
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
                                                    style="width: 50px;">Satuan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 50px;">Kemasan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 50px;">Jenis Barang</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 50px;">Lifetime</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 50px;">Approved</th>

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
    @if (count($errors) > 0)
    <button id="validasierror" style="display: none" type="button" data-toggle="modal" data-target="#Modaltambah">Open
        Modal</button>
    @endif
</main>



@endsection

@push('addon-script')
<script>
    function tidakaktif(event, id_sparepart) {
        var form1 = $('#form1')
        var _token = form1.find('input[name="_token"]').val()
        var check = $(`#sparepart-${id_sparepart}`).each(function (index, element) {
            var value = $(element).is(':checked')
            if (value == true) {
                var data = {
                    _token: _token,
                    id_sparepart: id_sparepart
                }

                $.ajax({
                    method: 'post',
                    url: '/admin/sparepart/' + id_sparepart + '/Aktif',
                    data: data,
                    success: function (response) {
                        window.location.href = '/admin/sparepart'

                    },
                    error: function (response) {
                        console.log(response)
                    }
                });
            } else if (value == false) {
                var data = {
                    _token: _token,
                    id_sparepart: id_sparepart
                }

                $.ajax({
                    method: 'post',
                    url: '/admin/sparepart/' + id_sparepart + '/TidakAktif',
                    data: data,
                    success: function (response) {
                        window.location.href = '/admin/sparepart'

                    },
                    error: function (response) {
                        console.log(response)
                    }
                });
            }
        })

    }


    $(document).ready(function () {
        $('#validasierror').click();

        $('select[name="id_jenis_sparepart"]').on('change', function () {
            var id_jenis_sparepart = $(this).val();
            if (id_jenis_sparepart) {
                $.ajax({
                    url: '/admin/sparepart/getmerk/' + id_jenis_sparepart,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
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
