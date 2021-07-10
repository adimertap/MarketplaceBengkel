<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <div class="sidenav-menu-heading">Menu</div>
                <a class="nav-link {{ (request()-> is('admin/sparepart*')) ?'active' :''}}"
                    href={{ route('sparepart.index') }}>
                    <div class="nav-link-icon"><span class="svg-icon svg-icon-primary svg-icon-2x">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo5\dist/../src/media/svg/icons\Tools\Screwdriver.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M8.46446609,11.2928932 L7.40380592,10.232233 C7.20854378,10.0369709 7.20854378,9.72038841 7.40380592,9.52512627 L8.1109127,8.81801948 C8.30617485,8.62275734 8.62275734,8.62275734 8.81801948,8.81801948 L15.1819805,15.1819805 C15.3772427,15.3772427 15.3772427,15.6938252 15.1819805,15.8890873 L14.4748737,16.5961941 C14.2796116,16.7914562 13.9630291,16.7914562 13.767767,16.5961941 L12.7071068,15.5355339 L7.05025253,21.1923882 C6.26920395,21.9734367 5.00287399,21.9734367 4.22182541,21.1923882 L2.80761184,19.7781746 C2.02656326,18.997126 2.02656326,17.7307961 2.80761184,16.9497475 L8.46446609,11.2928932 Z M4.5753788,18.0104076 C4.38011665,18.2056698 4.38011665,18.5222523 4.5753788,18.7175144 C4.77064094,18.9127766 5.08722343,18.9127766 5.28248558,18.7175144 L9.52512627,14.4748737 C9.72038841,14.2796116 9.72038841,13.9630291 9.52512627,13.767767 C9.32986412,13.5725048 9.01328163,13.5725048 8.81801948,13.767767 L4.5753788,18.0104076 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M16.9497475,5.63603897 L16.7788182,5.4651097 C16.5835561,5.26984755 16.5835561,4.95326506 16.7788182,4.75800292 C16.8266988,4.71012232 16.8838059,4.67246608 16.9466763,4.64731796 L19.4720576,3.63716542 C19.657766,3.56288206 19.869875,3.60641908 20.0113063,3.74785037 L20.2521496,3.98869366 C20.3935809,4.13012495 20.4371179,4.342234 20.3628346,4.52794239 L19.352682,7.05332375 C19.2501253,7.30971551 18.9591401,7.43442346 18.7027484,7.33186676 C18.6398781,7.30671864 18.5827709,7.2690624 18.5348903,7.2211818 L18.363961,7.05025253 L12.7071068,12.7071068 L11.2928932,11.2928932 L16.9497475,5.63603897 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon--></span></div>
                    Sparepart
                </a>
                <a class="nav-link {{ (request()-> is('admin/user*')) ?'active' :''}}" href={{ route('user.index') }}>
                    <div class="nav-link-icon"><span class="svg-icon svg-icon-primary svg-icon-2x">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo5\dist/../src/media/svg/icons\Communication\Delete-user.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z M21,8 L17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L21,6 C21.5522847,6 22,6.44771525 22,7 C22,7.55228475 21.5522847,8 21,8 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path
                                        d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg>
                            <!--end::Svg Icon--></span></div>
                    User
                </a>
                <a class="nav-link {{ (request()-> is('admin/category*')) ?'active' :''}}"
                    href={{ route('category.index') }}>
                    <div class="nav-link-icon"><span class="svg-icon svg-icon-primary svg-icon-2x">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo5\dist/../src/media/svg/icons\Communication\Clipboard-list.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                        fill="#000000" />
                                    <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1" />
                                </g>
                            </svg>
                            <!--end::Svg Icon--></span></div>
                    Kategori
                </a>
                <a class="nav-link {{ (request()-> is('admin/bengkel*')) ?'active' :''}}"
                    href={{ route('bengkel.index') }}>
                    <div class="nav-link-icon"><span class="svg-icon svg-icon-primary svg-icon-2x">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo5\dist/../src/media/svg/icons\Home\Home.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon--></span></div>
                    Bengkel
                </a>
                <a class="nav-link {{ (request()-> is('admin/keuangan*')) ?'active' :''}}"
                    href={{ route('keuangan.index') }}>
                    <div class="nav-link-icon"><span class="svg-icon svg-icon-primary svg-icon-2x">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo5\dist/../src/media/svg/icons\Shopping\Wallet2.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <rect fill="#000000" opacity="0.3" x="2" y="2" width="10" height="12" rx="2" />
                                    <path
                                        d="M4,6 L20,6 C21.1045695,6 22,6.8954305 22,8 L22,20 C22,21.1045695 21.1045695,22 20,22 L4,22 C2.8954305,22 2,21.1045695 2,20 L2,8 C2,6.8954305 2.8954305,6 4,6 Z M18,16 C19.1045695,16 20,15.1045695 20,14 C20,12.8954305 19.1045695,12 18,12 C16.8954305,12 16,12.8954305 16,14 C16,15.1045695 16.8954305,16 18,16 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon--></span></div>
                    Penarikan Saldo
                </a>
            </div>
        </div>
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">{{ Auth::user()->nama_user }}</div>
            </div>
        </div>
    </nav>
</div>
