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
                            <div class="page-header-icon"><i class="fas fa-cog"></i></div>
                            Edit Data Sparepart
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('sparepart.index') }}"
                            class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="nav nav-pills nav-justified flex-column flex-xl-row nav-wizard" id="cardTab" role="tablist">
                    <!-- Wizard navigation item 1-->
                    <a class="nav-item nav-link active" id="wizard1-tab" href="#wizard1" data-toggle="tab" role="tab"
                        aria-controls="wizard1" aria-selected="true">
                        <div class="wizard-step-icon"><i class="fas fa-plus"></i></div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Edit Formulir Sparepart</div>
                            <div class="wizard-step-text-details">Lengkapi formulir berikut</div>
                        </div>
                    </a>
                </div>
            </div>

            {{-- CARD 1 --}}
            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <!-- Wizard tab pane item 1-->
                    <div class="tab-pane py-5 py-xl-5 fade show active" id="wizard1" role="tabpanel"
                        aria-labelledby="wizard1-tab">
                        <div class="row justify-content-center">
                            <div class="col-xxl-6 col-xl-8">
                                <h3 class="text-primary">{{ $item->nama_sparepart }}</h3>
                                <h5 class="card-title">Ubah Data Sparepart</h5>
                                <form action="{{ route('sparepart.update',$item->id_sparepart) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="kode_sparepart">Kode Sparepart</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="kode_sparepart" type="text"
                                                name="kode_sparepart" value="{{ $item->kode_sparepart }}" readonly/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="nama_sparepart">Nama Sparepart</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="nama_sparepart" type="text" 
                                                name="nama_sparepart" value="{{ $item->nama_sparepart }}" 
                                                class="form-control @error('nama_sparepart') is-invalid @enderror" />
                                            @error('nama_sparepart')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="id_jenis_sparepart">Jenis Sparepart</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <select class="form-control" name="id_jenis_sparepart"
                                                id="id_jenis_sparepart">
                                                <option value="{{ $item->Category->id_jenis_sparepart }}">
                                                    {{ $item->Category->jenis_sparepart }}</option>
                                                @foreach ($jenis_sparepart as $jenissparepart)
                                                <option value="{{ $jenissparepart->id_jenis_sparepart }}">
                                                    {{ $jenissparepart->jenis_sparepart }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="id_merk">Merk Sparepart</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <select class="form-control" name="id_merk" id="id_merk">
                                                <option value="{{ $item->Merk->id_merk }}">
                                                    {{ $item->Merk->merk_sparepart }}</option>
                                                @foreach ($merk_sparepart as $merksparepart)
                                                <option value="{{ $merksparepart->id_merk }}">
                                                    {{ $merksparepart->merk_sparepart }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row"> 
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="id_konversi">Konversi Satuan</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <select class="form-control" name="id_konversi" id="id_konversi">
                                                <option value="{{ $item->Konversi->id_konversi }}">
                                                    {{ $item->Konversi->satuan }}</option>
                                                @foreach ($konversi as $konversisatuan)
                                                <option value="{{ $konversisatuan->id_konversi }}">
                                                    {{ $konversisatuan->satuan }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="id_kemasan">Kemasan</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <select class="form-control" name="id_kemasan" id="id_kemasan">
                                                <option value="{{ $item->Kemasan->id_kemasan }}">
                                                    {{ $item->Kemasan->nama_kemasan }}</option>
                                                @foreach ($kemasan as $kemas)
                                                <option value="{{ $kemas->id_kemasan }}">
                                                    {{ $kemas->nama_kemasan }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="lifetime">Lifetime</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <select name="lifetime" id="lifetime" class="form-control"
                                                class="form-control @error('lifetime') is-invalid @enderror">
                                                <option value="{{ $item->lifetime }}">{{ $item->lifetime }}</option>
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
                                                <option value="{{ $item->jenis_barang }}"> {{ $item->jenis_barang }}</option>
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
                                                value="{{ $item->dimensi_berat }}"
                                                class="form-control @error('dimensi_berat') is-invalid @enderror" />
                                            @error('dimensi_berat')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <button href="{{ route('sparepart.index') }}" class="btn btn-light" type="button">Back</button>
                                        <button class="btn btn-primary" type="Submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@push('addon-script')

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="/admin-assets/assets/demo/datatables-demo.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
<script src="/admin-assets/assets/demo/date-range-picker-demo.js"></script>
@endpush
