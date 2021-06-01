<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('name')</title>
    <link rel="icon" type="image/x-icon" href="admin-assets/assets/img/favicon.png" />

    {{-- style --}}
    @stack('prepend-style')
    @include('admin-views.includes.style')
    @stack('addon-style')
</head>

<body class="nav-fixed">

    @include('admin-views.includes.navbar')
    <div id="layoutSidenav">
        @include('admin-views.includes.sidebar')
        <div id="layoutSidenav_content">
            @yield('content')
            @include('admin-views.includes.footer')

        </div>
    </div>
    @stack('prepend-script')
    @include('admin-views.includes.script')
    @stack('addon-script')
</body>

</html>
