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
                                        {{ $user->Kabupaten->nama_kabupaten }},
                                        {{ $user->Kabupaten->Provinsi->nama_provinsi }}</span>
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
                                <h3 class="card-label font-weight-bolder text-dark">Personal Information
                                </h3>
                                <span class="text-muted font-weight-bold font-size-sm mt-1">Update your
                                    personal informaiton</span>
                            </div>
                        </div>
                        <!--end::Header-->

                        <!--begin::Form-->
                        <form class="form" id="kt_form" action="{{ route('account-update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-7">
                                        <h5 class="font-weight-bold mb-6">Customer Info</h5>
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Avatar</label>
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
                                        <span class="form-text text-muted">Allowed file types: png, jpg,
                                            jpeg.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Nama</label>
                                    <div class="col-lg-9 col-xl-7">
                                        <input class="form-control form-control-lg form-control-solid" type="text" name="nama_user"
                                            value="{{ $user->nama_user }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Email
                                        Address</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="la la-at"></i></span></div>
                                            <input type="text" class="form-control form-control-lg form-control-solid" name="email"
                                                value="{{ $user->email }}" placeholder="Email" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Contact
                                        Phone</label>
                                    <div class="col-lg-9 col-xl-7">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="la la-phone"></i></span></div>
                                            <input type="text" class="form-control form-control-lg form-control-solid" name="nohp"
                                                value="{{ $user->nohp_user }}" placeholder="Phone" />
                                        </div>
                                        <span class="form-text text-muted">We'll never share your phone
                                            with anyone else.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Alamat</label>
                                    <div class="col-lg-9 col-xl-7">
                                        <input class="form-control form-control-lg form-control-solid" type="text" name="alamat_user"
                                            value="{{ $user->alamat_user }}" />
                                        <span class="form-text text-muted">If you want your invoices
                                            addressed to a company. Leave blank to use your full
                                            name.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Provinsi</label>
                                    <div class="col-lg-9 col-xl-7">
                                        <select class="form-control form-control-lg form-control-solid" name="provinsi">
                                            @foreach ($provinsi as $item) 
                                                <option value="{{ $item->id_provinsi }}" {{ ( $user->Kabupaten->Provinsi->id_provinsi == $item->id_provinsi) ? 'selected' : '' }}>{{ $item->nama_provinsi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Kabupaten</label>
                                    <div class="col-lg-9 col-xl-7">
                                        <select class="form-control form-control-lg form-control-solid" name="id_kabupaten">
                                            @foreach ($kabupaten as $item) 
                                                <option value="{{ $item->id_kabupaten }}"  {{ ( $user->Kabupaten->id_kabupaten == $item->id_kabupaten) ? 'selected' : '' }}>{{ $item->nama_kabupaten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <div>
                                            <button type="submit"
                                                class="btn btn-success font-weight-bold text-uppercase px-9 py-4"
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
                    url: 'getkabupaten/' + cityId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="id_kabupaten"]').empty();
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

</script>
<!--end::Page Scripts-->
@endpush
