<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <div class="sidenav-menu-heading">Master Data</div>
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse"
                    data-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                    <div class="nav-link-icon"><i class="fas fa-database"></i></div>
                    Inventory
                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>
                <div class="collapse" id="collapseDashboards" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link {{ (request()-> is('admin/sparepart*')) ?'active' :''}}"
                            href={{ route('sparepart.index') }}>
                            <div class="nav-link-icon"><i class="fas fa-database"></i></div>
                            Sparepart
                        </a>
                        <a class="nav-link {{ (request()-> is('admin/merk*')) ?'active' :''}}"
                            href={{ route('merk.index') }}>
                            <div class="nav-link-icon"><i class="fas fa-database"></i></div>
                            Merk Sparepart
                        </a>
                        <a class="nav-link {{ (request()-> is('admin/category*')) ?'active' :''}}"
                            href={{ route('category.index') }}>
                            <div class="nav-link-icon"><i class="fas fa-database"></i></div>
                            Jenis Sparepart
                        </a>
                        <a class="nav-link {{ (request()-> is('admin/konversi*')) ?'active' :''}}"
                            href={{ route('konversi.index') }}>
                            <div class="nav-link-icon"><i class="fas fa-database"></i></div>
                            Konversi
                        </a>
                        <a class="nav-link {{ (request()-> is('admin/kemasan*')) ?'active' :''}}"
                            href={{ route('kemasan.index') }}>
                            <div class="nav-link-icon"><i class="fas fa-database"></i></div>
                            Kemasan
                        </a>
                    </nav>
                </div>
            </div>
            <div class="nav accordion" id="accordionSidenav">
                <div class="sidenav-menu-heading">Menu</div>
                <a class="nav-link {{ (request()-> is('admin/user*')) ?'active' :''}}" href={{ route('user.index') }}>
                    <div class="nav-link-icon"><i class="fas fa-user"></i></div>
                    User
                </a>
                <a class="nav-link {{ (request()-> is('admin/bengkel*')) ?'active' :''}}"
                    href={{ route('bengkel.index') }}>
                    <div class="nav-link-icon"><i class="fas fa-warehouse"></i></div>
                    Bengkel
                </a>
                <a class="nav-link {{ (request()-> is('admin/keuangan*')) ?'active' :''}}"
                    href={{ route('keuangan.index') }}>
                    <div class="nav-link-icon"><i class="fas fa-wallet"></i></div>
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
