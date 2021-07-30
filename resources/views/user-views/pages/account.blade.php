@extends('user-views.layouts.app')
@push('addon-style')

@endpush
@section('name')
Account
@endsection
@section('content')
<!--begin::Main-->
<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Profile Personal Information-->
            <div class="d-flex flex-row">
                <!--begin::Aside-->
                <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
                    <!--begin::Profile Card-->
                    <div class="card card-custom card-stretch">
                        <!--begin::Body-->
                        <div class="card-body pt-4">
                            <!--begin::User-->
                            <div class="d-flex align-items-center">
                                <div
                                    class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                    <div class="symbol-label"
                                        style="background-image:url({{ asset('/image/'.$user->foto )}})">
                                    </div>
                                    <i class="symbol-badge bg-success"></i>
                                </div>
                                <div>
                                    <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">
                                        {{ $user->nama_user }}
                                    </a>
                                    {{-- <div class="text-muted">
                                        Application Developer
                                    </div> --}}
                                    {{-- <div class="mt-2">
                                        <a href="#"
                                            class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1">Chat</a>
                                        <a href="#"
                                            class="btn btn-sm btn-success font-weight-bold py-2 px-3 px-xxl-5 my-1">Follow</a>
                                    </div> --}}
                                </div>
                            </div>
                            <!--end::User-->

                            <!--begin::Contact-->
                            <div class="py-9">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Email:</span>
                                    <a href="#" class="text-muted text-hover-primary">{{ $user->email }}</a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">No Hp:</span>
                                    <span class="text-muted">{{ $user->nohp_user }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="font-weight-bold mr-2">Alamat:</span>
                                    <span class="text-muted">{{ $user->alamat_user }},
                                        {{ $user->Desa->name }},
                                        {{ $user->Desa->Kecamatan->name }},
                                        {{ $user->Desa->Kecamatan->Kabupaten->name }},
                                        {{ $user->Desa->Kecamatan->Kabupaten->Provinsi->name }}
                                    </span>
                                </div>
                            </div>
                            <!--end::Contact-->

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Profile Card-->
                </div>
                <!--end::Aside-->
                <!--begin::Content-->
                <div class="flex-row-fluid ml-lg-8">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <!--begin::Header-->

                        <div class="card-header py-3">
                            <div class="card-title align-items-start flex-column">
                                <h3 class="card-label font-weight-bolder text-dark">Informasi Akun
                                </h3>
                                <span class="text-muted font-weight-bold font-size-sm mt-1">Ubah Informasi</span>
                            </div>
                        </div>
                        <!--end::Header-->

                        <!--begin::Form-->
                        <form class="form" id="kt_form" action="{{ route('account-update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-7">
                                        <h5 class="font-weight-bold mb-6">Informasi User</h5>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Foto</label>
                                    <div class="col-lg-9 col-xl-7">
                                        <div class="image-input image-input-outline" id="kt_profile_avatar"
                                            style="background-image: url(user-assets/assets/media/users/blank.png)">
                                            <div class="image-input-wrapper"
                                                style="background-image: url({{ asset('/image/'.$user->foto )}})">
                                            </div>

                                            <label
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="change" data-toggle="tooltip" title=""
                                                data-original-title="Change avatar">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="profile_avatar_remove" />
                                            </label>

                                            <span
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>

                                            <span
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                        <span class="form-text text-muted">File yang didukung: png, jpg,
                                            jpeg.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Nama</label>
                                    <div class="col-lg-9 col-xl-7">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                            name="nama_user" value="{{ $user->nama_user }}" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">E-mail</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="la la-at"></i></span></div>
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                name="email" value="{{ $user->email }}" placeholder="Email" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">No HP</label>
                                    <div class="col-lg-9 col-xl-7">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="la la-phone"></i></span></div>
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                name="nohp" value="{{ $user->nohp_user }}" placeholder="Phone" required />
                                        </div>
                                        {{-- <span class="form-text text-muted">We'll never share your phone
                                            with anyone else.</span> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Alamat</label>
                                    <div class="col-lg-9 col-xl-7">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                            name="alamat_user" value="{{ $user->alamat_user }}" required />
                                        <span class="form-text text-muted">Alamat ini akan digunakan sebagai pilihan
                                            tempat pengiriman</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Provinsi</label>
                                    <div class="col-lg-9 col-xl-7">
                                        <select class="form-control form-control-lg form-control-solid" name="provinsi" required>
                                            @foreach ($provinsi as $item)
                                            <option value="{{ $item->id_provinsi }}"
                                                {{ ( $user->Desa->Kecamatan->Kabupaten->Provinsi->id_provinsi == $item->id_provinsi) ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Kabupaten</label>
                                    <div class="col-lg-9 col-xl-7">
                                        <select class="form-control form-control-lg form-control-solid"
                                            name="id_kabupaten" required>
                                            @foreach ($kabupaten as $item)
                                            <option value="{{ $item->id_kabupaten }}"
                                                {{ ( $user->Desa->Kecamatan->Kabupaten->id_kabupaten == $item->id_kabupaten) ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Kecamatan</label>
                                    <div class="col-lg-9 col-xl-7">
                                        <select class="form-control form-control-lg form-control-solid"
                                            name="id_kecamatan" required>
                                            @foreach ($kecamatan as $item)
                                            <option value="{{ $item->id_kecamatan }}"
                                                {{ ( $user->Desa->Kecamatan->id_kecamatan == $item->id_kecamatan) ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Desa</label>
                                    <div class="col-lg-9 col-xl-7">
                                        <select class="form-control form-control-lg form-control-solid"
                                            name="id_desa" required>
                                            @foreach ($desa as $item)
                                            <option value="{{ $item->id_desa }}"
                                                {{ ( $user->Desa->id_desa == $item->id_desa) ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                    <div>
                                        <button type="submit"
                                            class="btn btn-primary font-weight-bold text-uppercase px-9 py-4"
                                            data-wizard-type="action-submit">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!--end::Body-->
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Profile Personal Information-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->
<!--end::Main-->
@endsection

@push('addon-script')
<!--begin::Page Scripts(used by this page)-->
<script src="user-assets/assets/js/pages/widgets.js?v=7.0.6"></script>
<script src="user-assets/assets/js/pages/custom/profile/profile.js?v=7.0.6"></script>

<script type="text/javascript">
   $(document).ready(function () {
            $('select[name="provinsi"]').on('change', function () {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: 'kabupaten/' + cityId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="id_kabupaten"]').empty();
                            $('select[name="id_kecamatan"]').empty();
                            $('select[name="id_desa"]').empty();
                            $('select[name="id_kabupaten"]').append(
                                '<option value="" holder>Pilih Kabupaten/Kota</option>');
                            $('select[name="id_kecamatan"]').append(
                                '<option value="" holder>Pilih Kecamatan</option>');
                            $('select[name="id_desa"]').append(
                                '<option value="" holder>Pilih Desa</option>');
                            $.each(data, function (key, value) {
                                $('select[name="id_kabupaten"]').append(
                                    '<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="id_kabupaten"]').empty();
                }
            });

        });

        $(document).ready(function () {
            $('select[name="id_kabupaten"]').on('change', function () {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: 'kecamatan/' + cityId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="id_kecamatan"]').empty();
                            $('select[name="id_desa"]').empty();

                            $('select[name="id_kecamatan"]').append(
                                '<option value="" holder>Pilih Kecamatan</option>'
                            );
                            $('select[name="id_desa"]').append(
                                '<option value="" holder>Pilih Desa</option>')

                            $.each(data, function (key, value) {
                                $('select[name="id_kecamatan"]').append(
                                    '<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="id_kecamatan"]').empty();
                }
            });

        });

        $(document).ready(function () {
            $('select[name="id_kecamatan"]').on('change', function () {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: 'desa/' + cityId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="id_desa"]').empty();
                            $('select[name="id_desa"]').append(
                                '<option value="" holder>Pilih Desa</option>')
                            $.each(data, function (key, value) {
                                $('select[name="id_desa"]').append(
                                    '<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="id_desa"]').empty();
                }
            });

        });
</script>
@if (session('status'))
<script>
    toastr.info("{{ session('status') }}");

</script>
@endif<!--end::Page Scripts-->
@endpush
