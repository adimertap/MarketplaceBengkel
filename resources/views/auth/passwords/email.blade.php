@extends('user-views.layouts.app-withoutheader')
@push('addon-style')
<link href="user-assets/assets/css/pages/login/login-3.css?v=7.0.6" rel="stylesheet" type="text/css" />

@endpush
@section('name')
Lupa Password
@endsection
@section('content')
<!--begin::Login-->
{{-- @if (session('status'))
<div class="alert alert-custom alert-light-primary fade show mb-5" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">{{ session('status') }}</div>
<div class="alert-close">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="ki ki-close"></i></span>
    </button>
</div>
</div>
</div>
@endif --}}
<div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid">
    <!--begin::Aside-->
    <div class="login-aside d-flex flex-column flex-row-auto">
        <!--begin::Aside Top-->
        <div class="d-flex flex-column-auto flex-column">
            <!--begin::Aside Header-->
            <a href="#" class="login-logo text-center pt-lg-25">
                <img src="image/logo_new.png" class="max-h-100px" alt="" />
            </a>
            <!--end::Aside Header-->

            <!--begin::Aside Title-->
            <h3 class="font-weight-bolder text-center font-size-h4 text-dark-50  line-height-xl">
                Marketplace Terintegrasi Sistem Bengkel<br />
                Next Generation of Marketplace
            </h3>
            <!--end::Aside Title-->
        </div>
        <!--end::Aside Top-->

        <!--begin::Aside Bottom-->
        <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center"
            style="background-position-y: calc(100% + 5rem); background-image: url(image/loginku.png)">
        </div>
        <!--end::Aside Bottom-->
    </div>
    <!--begin::Aside-->


    <!--begin::Content-->
    <div class="login-content flex-column-fluid d-flex flex-column p-10">
        <!--begin::Top-->
        {{-- <div class="text-right d-flex justify-content-center">
                    <div class="top-forgot text-right d-flex justify-content-end pt-5 pb-lg-0 pb-10">
                        <span class="font-weight-bold text-muted font-size-h4">Having issues?</span>
                        <a href="javascript:;" class="font-weight-bold text-primary font-size-h4 ml-2"
                            id="kt_login_signup">Get Help</a>
                    </div>
                </div> --}}
        <!--end::Top-->

        <!--begin::Wrapper-->
        <div class="d-flex flex-row-fluid flex-center">
            <!--begin::Forgot-->
            <div class="login-form">
                <!--begin::Form-->
                <form id="" method="POST" action="{{ route('password.email') }}">
                    <!--begin::Title-->
                    @csrf
                    <div class="pb-5 pb-lg-15">
                        <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Lupa Password
                            ?</h3>
                        <p class="text-muted font-weight-bold font-size-h4">Masukkan e-mail untuk mengganti password</p>
                    </div>
                    <!--end::Title-->

                    <!--begin::Form group-->
                    <div class="form-group">
                        <input id="email" type="email"
                            class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6 @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!--end::Form group-->

                    <!--begin::Form group-->
                    <div class="form-group d-flex flex-wrap">
                        <button type="submit" id="kt_login_forgot_form_submit_button"
                            class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Kirim</button>
                        <a href="{{ route('login') }}" id="kt_login_forgot_cancel"
                            class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Login</a>
                    </div>
                    <!--end::Form group-->
                </form>

                <!--end::Form-->
            </div>
            <!--end::Forgot-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Content-->
</div>
<!--end::Login-->
{{-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div> --}}
@endsection

@push('addon-script')
<script src="user-assets/assets/js/pages/custom/login/login-3.js?v=7.0.6"></script>
@if (session('status'))
<script>
    toastr.info("{{ session('status') }}");

</script>
@endif

@endpush
