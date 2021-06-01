<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->
    <head>
        <base href="../../" />
        <meta charset="utf-8" />
        <title>@yield('name')</title>
        <meta name="description" content="No subheader example" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        
        {{-- style --}}
        @stack('prepend-style')
        @include('user-views.includes.style')
        @stack('addon-style')

    </head>
    <!--end::Head-->

    <!--begin::Body-->
    <body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed aside-enabled aside-static page-loading" >
        @yield('content')

        @include('user-views.includes.footer')

        @stack('prepend-script')
        @include('user-views.includes.script')
        @stack('addon-script')

    </body>
    <!--end::Body-->
</html>
