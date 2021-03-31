@extends('user-views.layouts.app')

@section('name')
REgister
@endsection

@push('prepend-style')
<link href="user/assets/css/pages/login/login-4.css?v=7.0.6" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid wizard" id="kt_login">
        <!--begin::Content-->
        <div
            class="login-container d-flex flex-center flex-row flex-row-fluid order-2 order-lg-1 flex-row-fluid bg-white py-lg-0 pb-lg-0 pt-15 pb-12">
            <!--begin::Container-->
            <div class="login-content login-content-signup d-flex flex-column">
                <!--begin::Aside Top-->
                <div class="d-flex flex-column-auto flex-column px-10">
                    <!--begin: Wizard Nav-->
                    <div class="wizard-nav pt-5 pt-lg-15 pb-10">
                        <!--begin::Wizard Steps-->
                        <div class="wizard-steps d-flex flex-column flex-sm-row">
                            <!--begin::Wizard Step 1 Nav-->
                            <div class="wizard-step flex-grow-1 flex-basis-0" data-wizard-type="step"
                                data-wizard-state="current">
                                <div class="wizard-wrapper pr-7">
                                    <div class="wizard-icon">
                                        <i class="wizard-check ki ki-check"></i>
                                        <span class="wizard-number">1</span>
                                    </div>
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">
                                            Personal Information
                                        </h3>
                                        <div class="wizard-desc">
                                            informasi pribadi
                                        </div>
                                    </div>
                                    <span class="svg-icon pl-6">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <rect fill="#000000" opacity="0.3"
                                                    transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000) "
                                                    x="7.5" y="7.5" width="2" height="9" rx="1" />
                                                <path
                                                    d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) " />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <!--end::Wizard Step 1 Nav-->

                            <!--begin::Wizard Step 2 Nav-->
                            <div class="wizard-step flex-grow-1 flex-basis-0" data-wizard-type="step">
                                <div class="wizard-wrapper pr-7">
                                    <div class="wizard-icon">
                                        <i class="wizard-check ki ki-check"></i>
                                        <span class="wizard-number">2</span>
                                    </div>
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">
                                            Address
                                        </h3>
                                        <div class="wizard-desc">
                                            Alamat
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--end::Wizard Step 2 Nav-->


                        </div>
                        <!--end::Wizard Steps-->
                    </div>
                    <!--end: Wizard Nav-->
                </div>
                <!--end::Aside Top-->

                <!--begin::Signin-->
                <div class="login-form">
                    <!--begin::Form-->
                    <form class="form px-10" novalidate="novalidate" id="kt_login_signup_form">
                        <!--begin: Wizard Step 1-->
                        <div class=" " data-wizard-type="step-content" data-wizard-state="current">
                            <!--begin::Title-->
                            <div class="pb-10 pb-lg-12">
                                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Buat Akun
                                </h3>
                                <div class="text-muted font-weight-bold font-size-h4">
                                    Sudah punya Akun?
                                    <a href="custom/pages/login/login-4/signin.html"
                                        class="text-primary font-weight-bolder">Sign In</a>
                                </div>
                            </div>
                            <!--begin::Title-->

                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Nama Lengkap</label>
                                <input type="text"
                                    class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6"
                                    name="namalengkap" placeholder="Nama Lengkap" value="" />
                            </div>
                            <!--end::Form Group-->

                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">E-mail</label>
                                <input type="text"
                                    class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6"
                                    name="email" placeholder="E-mail" value="" />
                            </div>
                            <!--end::Form Group-->

                            <!--begin::Form Group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">No Hp</label>
                                <input type="number"
                                    class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6"
                                    name="nohp" placeholder="No Hp" value="" />
                            </div>
                            <!--end::Form Group-->
                        </div>
                        <!--end: Wizard Step 1-->

                        <!--begin: Wizard Step 2-->
                        <div class="pb-5" data-wizard-type="step-content">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Alamat Lengkap</label>
                                <input type="text"
                                    class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6"
                                    name="alamatlengkap" placeholder="Alamat Lengkap" />
                                <span class="form-text text-muted">Masukkan alamat lengkap</span>
                            </div>
                            <!--end::Input-->
                            <!--begin::Input-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Kode Pos</label>
                                <input type="text"
                                    class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6"
                                    name="kodepos" placeholder="kode pos" />
                                <span class="form-text text-muted">masukkan kode pos</span>
                            </div>
                            <!--end::Input-->
                            <!--begin::Row-->
                            <div class="row">
                                <div class="col-xl-6">
                                    <!--begin::Select-->
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Provinsi</label>
                                        <select name="provinsi"
                                            class="form-control form-control-solid h-auto py-7 px-5 border-0 rounded-lg font-size-h6">
                                            <option value="">Select</option>
                                            @foreach ($provinsi as $item)
                                            <option value="{{ $item->id }}">{{ $item->province }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <div class="col-xl-6">
                                    <!--begin::Select-->
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Kota</label>
                                        <select name="kota"
                                            class="form-control form-control-solid h-auto py-7 px-5 border-0 rounded-lg font-size-h6">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Row-->

                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Password</label>
                                <input type="password"
                                    class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6"
                                    name="password" placeholder="kode pos" />
                                <span class="form-text text-muted">masukkan password</span>
                            </div>
                        </div>
                        <!--end: Wizard Step 2-->



                        <!--begin: Wizard Actions-->
                        <div class="d-flex justify-content-between pt-7">
                            <div class="mr-2">
                                <button type="button"
                                    class="btn btn-light-primary font-weight-bolder font-size-h6 pr-8 pl-6 py-4 my-3 mr-3"
                                    data-wizard-type="action-prev">
                                    <span class="svg-icon svg-icon-md mr-2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Left-2.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <rect fill="#000000" opacity="0.3"
                                                    transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) "
                                                    x="14" y="7" width="2" height="10" rx="1" />
                                                <path
                                                    d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) " />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span> Previous
                                </button>
                            </div>
                            <div>
                                <button type="button"
                                    class="btn btn-primary font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3"
                                    data-wizard-type="action-submit" type="submit"
                                    id="kt_login_signup_form_submit_button">
                                    Submit
                                    <span class="svg-icon svg-icon-md ml-2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Right-2.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <rect fill="#000000" opacity="0.3"
                                                    transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000) "
                                                    x="7.5" y="7.5" width="2" height="9" rx="1" />
                                                <path
                                                    d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) " />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span> </button>

                                <button type="button"
                                    class="btn btn-primary font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3"
                                    data-wizard-type="action-next">
                                    Next
                                    <span class="svg-icon svg-icon-md ml-2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Right-2.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <rect fill="#000000" opacity="0.3"
                                                    transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000) "
                                                    x="7.5" y="7.5" width="2" height="9" rx="1" />
                                                <path
                                                    d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) " />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span> </button>
                            </div>
                        </div>
                        <!--end: Wizard Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Signin-->
            </div>
            <!--end::Container-->
        </div>
        <!--begin::Content-->

        <!--begin::Aside-->
        <div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right">
            <div class="login-conteiner bgi-no-repeat bgi-position-x-right bgi-position-y-bottom"
                style="background-image: url(assets/media/svg/illustrations/login-visual-4.svg);">
                <!--begin::Aside title-->
                <h3
                    class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 py-20 m-0 d-flex justify-content-lg-start font-weight-boldest display5 display1-lg text-white">
                    We Got<br />
                    A Surprise<br />
                    For You
                </h3>
                <!--end::Aside title-->
            </div>
        </div>
        <!--end::Aside-->
    </div>
    <!--end::Login-->
</div>

<div class="container hide">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('addon-script')
<script src="user/assets/js/pages/custom/login/login-4.js?v=7.0.6"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('select[name="provinsi"]').on('change', function () {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: 'getcity/ajax/' + cityId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="kota"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="kota"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="kota"]').empty();
            }
        });
    });

</script>
@endpush
