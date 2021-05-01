<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../" />
    <meta charset="utf-8" />
    <title>@yield('name')</title>
    <meta name="description" content="No subheader example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- style --}}
    @stack('prepend-style')
    @include('user-views.includes.style')
    @stack('addon-style')

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body"
    class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed aside-enabled aside-static page-loading">
    @include('user-views.includes.navbar')

    @yield('content')

    @include('user-views.includes.footer')

    @stack('prepend-script')
    @include('user-views.includes.script')
    @stack('addon-script')
    

</body>
<!--end::Body-->

</html>
