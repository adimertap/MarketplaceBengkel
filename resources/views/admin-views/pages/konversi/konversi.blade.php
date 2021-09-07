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
                            Master Data Konversi
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
                                <div class="small font-weight-bold text-primary mb-1">Tambah Data Konversi</div>
                                <button class="btn btn-sm btn-primary" type="button" data-toggle="modal"
                                    data-target="#Modaltambah">
                                    Tambah Data
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-arrow-right ml-1">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg>
                                </button>
                            </div>
                            <div class="ml-2"><i class="fas fa-cubes" style="color: gainsboro"></i> </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <!-- Dashboard info widget 1-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-primary mb-1">Konversi Aktif</div>
                                <div class="h6">Total: {{ $countkonversiaktif }}</div>
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
                                <div class="small font-weight-bold text-secondary mb-1">Pengajuan Konversi Baru</div>
                                <div class="h6">Total: {{ $countkonversidiajukan }}</div>
                            </div>
                            <div class="ml-2"><i class="fas fa-box-open" style="color: gainsboro"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-bottom">
                <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="overview-tab" href="#overview" data-toggle="tab" role="tab"
                            aria-controls="overview" aria-selected="true">Master Konversi</a>
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
                                                        style="width: 350px;">Satuan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Actions: activate to sort column ascending"
                                                        style="width: 77px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($konversi as $item)
                                                <tr role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">
                                                        {{ $loop->iteration}}</th>
                                                    <td>{{ $item->satuan }}</td>
                                                    <td>
                                                        <a href="" class="btn btn-primary btn-datatable  mr-2"
                                                            type="button" data-toggle="modal"
                                                            data-target="#Modaledit-{{ $item->id_konversi }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="" class="btn btn-danger btn-datatable" type="button"
                                                            data-toggle="modal"
                                                            data-target="#Modalhapus-{{ $item->id_konversi }}">
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
                                        <table class="table table-bordered table-hover dataTable"
                                            id="dataTablePengajuan" width="100%" cellspacing="0" role="grid"
                                            aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 30px;">No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 230px;">Satuan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Actions: activate to sort column ascending"
                                                        style="width: 77px;">Status Approved</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($konversidiajukan as $item)
                                                <tr role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">
                                                        {{ $loop->iteration}}</th>
                                                    <td>{{ $item->satuan }}</td>
                                                    <td>
                                                        <a href="" class="btn btn-success btn-datatable" type="button"
                                                            data-toggle="modal"
                                                            data-target="#Modalkonfirmasisetuju-{{ $item->id_konversi }}">
                                                            <i class="fas fa-check"></i>
                                                        </a>
                                                        <a href="" class="btn btn-danger btn-datatable" type="button"
                                                            data-toggle="modal"
                                                            data-target="#Modalkonfirmasitolak-{{ $item->id_konversi }}">
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

    {{-- MODAL Tambah -------------------------------------------------------------------------------------------}}
    <div class="modal fade" id="Modaltambah" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Satuan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('konversi.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label class="small mb-1">Isikan Form Dibawah Ini</label>
                        <hr>
                        </hr>
                        <div class="form-group">
                            <label class="small mb-1 mr-1" for="satuan">Satuan Konversi</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <input class="form-control" name="satuan" type="text" id="satuan"
                                placeholder="Input Satuan Konversi" value="{{ old('satuan') }}"
                                class="form-control @error('satuan') is-invalid @enderror"></input>
                            @error('satuan')<div class="text-danger small mb-1">{{ $message }}
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
    @forelse ($konversi as $item)
    <div class="modal fade" id="Modaledit-{{ $item->id_konversi }}" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Satuan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('konversi.update', $item->id_konversi) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <label class="small mb-1">Isikan Form Dibawah Ini</label>
                        <hr>
                        </hr>
                        <div class="form-group">
                            <label class="small mb-1 mr-1" for="satuan">Satuan Konversi</label><span class="mr-4 mb-3" style="color: red">*</span>
                            <input class="form-control" name="satuan" type="text" id="satuan"
                                value="{{ $item->satuan }}" required></input>
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
    @forelse ($konversi as $item)
    <div class="modal fade" id="Modalhapus-{{ $item->id_konversi }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger-soft">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('konversi.destroy', $item->id_konversi) }}" method="POST"
                    class="d-inline">
                    @csrf
                    @method('delete')
                    <div class="modal-body">Apakah Anda Yakin Menghapus Data Konversi {{ $item->satuan }}?</div>
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

    {{-- KONFIRMASI SETUJUI DATA --}}
    @forelse ($konversidiajukan as $items)
    <div class="modal fade" id="Modalkonfirmasisetuju-{{ $items->id_konversi }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success-soft">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Setujui Pengajuan Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('konversi-pengajuan', $items->id_konversi) }}?status_konversi=Aktif"
                    method="POST" class="d-inline">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">Apakah Anda Yakin Menyetujui Data Pengajuan Konversi Satuan
                            <b>{{ $items->satuan }}</b> ?</div>
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

    @forelse ($konversidiajukan as $itemz)
    <div class="modal fade" id="Modalkonfirmasitolak-{{ $itemz->id_konversi }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger-soft">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Tolak Pengajuan Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('konversi-pengajuan', $itemz->id_konversi) }}?status_konversi=Tidak Aktif"
                    method="POST" class="d-inline">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">Apakah Anda Yakin Menolak Data Pengajuan Konversi Satuan
                            <b>{{ $itemz->satuan }}</b> ?</div>
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
        $('#dataTablePengajuan').DataTable();

    });

</script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="/admin-assets/assets/demo/datatables-demo.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
<script src="/admin-assets/assets/demo/date-range-picker-demo.js"></script>
@endpush
