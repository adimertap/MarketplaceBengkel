<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../" />
    <meta charset="utf-8" />
    <title>@yield('name')</title>
    <meta name="description" content="No subheader example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    {{-- style --}}
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body"
    class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed aside-enabled aside-static page-loading">
    @include('includes.navbar')

    @yield('content')

    @include('includes.footer')

    @stack('prepend-style')
    @include('includes.script')
    @stack('addon-style')
    

</body>
<!--end::Body-->

</html>
