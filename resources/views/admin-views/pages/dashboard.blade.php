@extends('admin-views.layouts.app')

@section('name')
Dashboard
@endsection

@push('prepend-style')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />
<link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet"
    crossorigin="anonymous" />
<link rel="icon" type="image/x-icon" href="image/logo_new.png" />
@endpush

@section('content')
<main>
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Hallo</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 13rem;"
                                src="/backend/src/assets/img/ilustrasi/inventoryilustration.jpg" alt="">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 13rem;"
                                src="/backend/src/assets/img/ilustrasi/logistic.jpg" alt="">
                        </div>
                        <h2 class="m-0 font-weight-bold text-primary" style="text-align: center">Selamat Datang,
                            {{Auth::user()->nama_user}}</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-md-6 mb-4">
                <!-- Dashboard info widget 2-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-secondary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-secondary mb-1">Pengguna</div>
                                <div class="h6">Total: {{ $customer }}</div>
                            </div>
                            <div class="ml-2"><svg class="svg-inline--fa fa-shopping-cart fa-w-18"
                                    style="color: gainsboro;" aria-hidden="true" focusable="false" data-prefix="fas"
                                    data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z">
                                    </path>
                                </svg><!-- <i class="fas fa-shopping-cart" style="color: gainsboro"></i> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 mb-4">
                <!-- Dashboard info widget 4-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-info mb-1">Revenue</div>
                                <div class="h6">Total: {{ $revenue }}</div>
                            </div>
                            <div class="ml-2"><svg class="svg-inline--fa fa-box-open fa-w-20" style="color: gainsboro;"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="box-open"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M425.7 256c-16.9 0-32.8-9-41.4-23.4L320 126l-64.2 106.6c-8.7 14.5-24.6 23.5-41.5 23.5-4.5 0-9-.6-13.3-1.9L64 215v178c0 14.7 10 27.5 24.2 31l216.2 54.1c10.2 2.5 20.9 2.5 31 0L551.8 424c14.2-3.6 24.2-16.4 24.2-31V215l-137 39.1c-4.3 1.3-8.8 1.9-13.3 1.9zm212.6-112.2L586.8 41c-3.1-6.2-9.8-9.8-16.7-8.9L320 64l91.7 152.1c3.8 6.3 11.4 9.3 18.5 7.3l197.9-56.5c9.9-2.9 14.7-13.9 10.2-23.1zM53.2 41L1.7 143.8c-4.6 9.2.3 20.2 10.1 23l197.9 56.5c7.1 2 14.7-1 18.5-7.3L320 64 69.8 32.1c-6.9-.8-13.5 2.7-16.6 8.9z">
                                    </path>
                                </svg><!-- <i class="fas fa-box-open" style="color: gainsboro"></i> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 mb-4">
                <!-- Dashboard info widget 3-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-success h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-success mb-1">Transaksi</div>
                                <div class="h6">Total: {{ $transaction }}</div>
                            </div>
                            <div class="ml-2"><svg class="svg-inline--fa fa-truck-loading fa-w-20"
                                    style="color: gainsboro;" aria-hidden="true" focusable="false" data-prefix="fas"
                                    data-icon="truck-loading" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 640 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M50.2 375.6c2.3 8.5 11.1 13.6 19.6 11.3l216.4-58c8.5-2.3 13.6-11.1 11.3-19.6l-49.7-185.5c-2.3-8.5-11.1-13.6-19.6-11.3L151 133.3l24.8 92.7-61.8 16.5-24.8-92.7-77.3 20.7C3.4 172.8-1.7 181.6.6 190.1l49.6 185.5zM384 0c-17.7 0-32 14.3-32 32v323.6L5.9 450c-4.3 1.2-6.8 5.6-5.6 9.8l12.6 46.3c1.2 4.3 5.6 6.8 9.8 5.6l393.7-107.4C418.8 464.1 467.6 512 528 512c61.9 0 112-50.1 112-112V0H384zm144 448c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48z">
                                    </path>
                                </svg><!-- <i class="fas fa-truck-loading" style="color: gainsboro"></i> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
             <div class="col-xl-6 col-md-6 mb-4">
                <!-- Dashboard info widget 1-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-primary mb-1">Bengkel</div>
                                <div class="h6">Total: {{ $bengkel }}</div>
                            </div>
                            <div class="ml-2"><svg class="svg-inline--fa fa-cubes fa-w-16" style="color: gainsboro;"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cubes" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M488.6 250.2L392 214V105.5c0-15-9.3-28.4-23.4-33.7l-100-37.5c-8.1-3.1-17.1-3.1-25.3 0l-100 37.5c-14.1 5.3-23.4 18.7-23.4 33.7V214l-96.6 36.2C9.3 255.5 0 268.9 0 283.9V394c0 13.6 7.7 26.1 19.9 32.2l100 50c10.1 5.1 22.1 5.1 32.2 0l103.9-52 103.9 52c10.1 5.1 22.1 5.1 32.2 0l100-50c12.2-6.1 19.9-18.6 19.9-32.2V283.9c0-15-9.3-28.4-23.4-33.7zM358 214.8l-85 31.9v-68.2l85-37v73.3zM154 104.1l102-38.2 102 38.2v.6l-102 41.4-102-41.4v-.6zm84 291.1l-85 42.5v-79.1l85-38.8v75.4zm0-112l-102 41.4-102-41.4v-.6l102-38.2 102 38.2v.6zm240 112l-85 42.5v-79.1l85-38.8v75.4zm0-112l-102 41.4-102-41.4v-.6l102-38.2 102 38.2v.6z">
                                    </path>
                                </svg><!-- <i class="fas fa-cubes" style="color: gainsboro"></i> -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <p></p>
    </div>
</main>
@endsection

@push('addon-script')

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="admin-assets/assets/demo/datatables-demo.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
<script src="admin-assets/assets/demo/date-range-picker-demo.js"></script>
@endpush
