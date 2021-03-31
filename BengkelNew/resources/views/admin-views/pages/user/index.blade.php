@extends('admin-views.layouts.app')

@section('name')
Dashboard
@endsection

@push('prepend-style')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />
<link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet"
    crossorigin="anonymous" />
<link rel="icon" type="image/x-icon" href="/admin-assets/assets/img/favicon.png" />
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
            <div class="card card-header-actions">
                <div class="card-header">List User
                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal"
                        data-target="#Modaltambah">Tambah
                        User</button>

                </div>
            </div>
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
                                                style="width: 77px;">Provinsi</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">Kabupaten</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">No Hp</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">Kode Pos</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($user as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->provinsi }}</td>
                                            <td>{{ $item->kabupaten }}</td>
                                            <td>{{ $item->nohp }}</td>
                                            <td>{{ $item->kodepos }}</td>
                                            <td>{{ $item->role }}</td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-datatable  mr-2" type="button"
                                                    data-toggle="modal" data-target="#Modaledit-{{ $item->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-datatable  mr-2" type="button"
                                                    data-toggle="modal" data-target="#Modalhapus-{{ $item->id }}">
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


        {{-- MODAL Tambah -------------------------------------------------------------------------------------------}}
        <div class="modal fade" id="Modaltambah" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah User</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <form action="{{ route('user.store')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label class="small mb-1">Isikan Form Dibawah Ini</label>
                            <div class="form-group">
                                <label class="small mb-1" for="name">Nama</label>
                                <input class="form-control" name="name" type="text" placeholder="Input Nama"
                                    class="form-control @error('nama') is-invalid @enderror">
                                @error('nama')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="email">Email</label>
                                <input class="form-control" name="email" type="text" placeholder="Input Email"
                                    class="form-control @error('email') is-invalid @enderror">
                                @error('email')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="alamat">Alamat</label>
                                <input class="form-control" name="alamat" type="text" placeholder="Input Alamat"
                                    class="form-control @error('alamat') is-invalid @enderror">
                                @error('alamat')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="provinsi">Provinsi</label>
                                <input class="form-control" name="provinsi" type="text" placeholder="Input Provinsi"
                                    class="form-control @error('provinsi') is-invalid @enderror">
                                @error('provinsi')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="kabupaten">Kabupaten</label>
                                <input class="form-control" name="kabupaten" type="text" placeholder="Input Kabupaten"
                                    class="form-control @error('kabupaten') is-invalid @enderror">
                                @error('kabupaten')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="nohp">No Hp</label>
                                <input class="form-control" name="nohp" type="text" placeholder="Input No Hp"
                                    class="form-control @error('nohp') is-invalid @enderror">
                                @error('nohp')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="kodepos">Kode Pos</label>
                                <input class="form-control" name="kodepos" type="text" placeholder="Input Kode Pos"
                                    class="form-control @error('kodepos') is-invalid @enderror">
                                @error('kodepos')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>

                            <div class="form-group">
                                <label class="small mb-1" for="kodepos">Role</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="role">
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="USER">USER</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="small mb-1" for="password">Password</label>
                                <input class="form-control" name="password" type="password" placeholder="Input Password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')<div class="text-danger small mb-1">{{ $message }}
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
        @forelse ($user as $item)
        <div class="modal fade" id="Modaledit-{{ $item->id}}" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit User</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <form action="{{ route('user.update', $item->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="small" for="id">Id</label>
                                <input class="form-control" name="id" type="text"
                                    value="{{ $item->id }}" />
                            </div>
                            <div class="form-group">
                                <label class="small" for="name">Nama</label>
                                <input class="form-control" name="name" type="text"
                                    value="{{ $item->name }}" />
                            </div>
                            <div class="form-group">
                                <label class="small" for="email">Email</label>
                                <input class="form-control" name="email" type="text"
                                    value="{{ $item->email }}" />
                            </div>
                            <div class="form-group">
                                <label class="small" for="alamat">Alamat</label>
                                <input class="form-control" name="alamat" type="text"
                                    value="{{ $item->alamat }}" />
                            </div>
                            <div class="form-group">
                                <label class="small" for="Provinsi">Provinsi</label>
                                <input class="form-control" name="provinsi" type="text"
                                    value="{{ $item->provinsi }}" />
                            </div>
                            <div class="form-group">
                                <label class="small" for="kabupaten">Kabupaten</label>
                                <input class="form-control" name="kabupaten" type="text"
                                    value="{{ $item->kabupaten }}" />
                            </div>
                            <div class="form-group">
                                <label class="small" for="nohp">No Hp</label>
                                <input class="form-control" name="nohp" type="text"
                                    value="{{ $item->nohp }}" />
                            </div>
                            <div class="form-group">
                                <label class="small" for="kodepos">Kodepos</label>
                                <input class="form-control" name="kodepos" type="text"
                                    value="{{ $item->kodepos }}" />
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
                            <button class="btn btn-primary" type="Submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @empty

        @endforelse

        {{-- MODAL DELETE ------------------------------------------------------------------------------}}
        @forelse ($user as $item)
        <div class="modal fade" id="Modalhapus-{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <form action="{{ route('user.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <div class="modal-body">Apakah Anda Yakin Menghapus Data User {{ $item->name }}?
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
