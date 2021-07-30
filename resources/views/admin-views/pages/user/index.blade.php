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
                            Master Data User
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{-- MAIN PAGE CONTENT --}}
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-body">
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
                                                style="width: 230px;">Nama</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 200px;">Email</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">Alamat</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">No Hp</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">Role</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td>{{ $item->nama_user }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->alamat_user }}</td>
                                            <td>{{ $item->nohp_user }}</td>
                                            <td>{{ $item->role }}</td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-datatable  mr-2" type="button"
                                                    data-toggle="modal" data-target="#Modaledit-{{ $item->id_user }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-datatable  mr-2" type="button"
                                                    data-toggle="modal" data-target="#Modalhapus-{{ $item->id_user }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="tex-center">
                                                Data User Kosong
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- MODAL EDIT -------------------------------------------------------------------------------------------}}
        @forelse ($users as $item)
        <div class="modal fade" id="Modaledit-{{ $item->id_user}}" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit User</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <form action="{{ route('user.update', $item->id_user) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="small" for="nama_user">Nama</label>
                                <input class="form-control" name="nama_user" type="text"
                                    value="{{ $item->nama_user }}" required/>
                            </div>
                            <div class="form-group">
                                <label class="small" for="email">Email</label>
                                <input class="form-control" name="email" type="text"
                                    value="{{ $item->email }}" required/>
                            </div>
                            <div class="form-group">
                                <label class="small" for="alamat_user">Alamat</label>
                                <input class="form-control" name="alamat_user" type="text"
                                    value="{{ $item->alamat_user }}" required/>
                            </div>
                            <div class="form-group">
                                <label class="small" for="nohp_user">No Hp</label>
                                <input class="form-control" name="nohp_user" type="text"
                                    value="{{ $item->nohp_user }}" required/>
                            </div>

                            <div class="form-group">
                                <label class="small" for="role">Role</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="role">
                                    <option value="{{ $item->role }}" selected>Tidak Diganti</option>
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="USER">USER</option>
                                </select>
                            </div>
                             <div class="form-group">
                                <label class="small mb-1" for="password">Password</label>
                                <input class="form-control" name="password" type="password" placeholder="Input Password"
                                    class="form-control">
                                <small>Kosongkan Jika Tidak Ingin Ganti Password</small>
                            </div>
                           
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="Submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @empty

        @endforelse

        {{-- MODAL DELETE ------------------------------------------------------------------------------}}
        @forelse ($users as $item)
        <div class="modal fade" id="Modalhapus-{{ $item->id_user }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <form action="{{ route('user.destroy', $item->id_user) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <div class="modal-body">Apakah Anda Yakin Menghapus Data User {{ $item->nama_user }}?
                        </div>
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

        <button id="validasierror" style="display: none" type="button" data-toggle="modal"
            data-target="#Modaltambah">Open
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
