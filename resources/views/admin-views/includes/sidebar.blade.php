<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <div class="sidenav-menu-heading">Menu</div>
                <a class="nav-link {{ (request()-> is('admin/sparepart*')) ?'active' :''}}" href={{ route('sparepart.index') }}>
                    <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                    Sparepart
                </a>
                <a class="nav-link {{ (request()-> is('admin/user*')) ?'active' :''}}" href={{ route('user.index') }}>
                    <div class="nav-link-icon"><i data-feather="filter"></i></div>
                    User
                </a>
                <a class="nav-link {{ (request()-> is('admin/category*')) ?'active' :''}}" href={{ route('category.index') }}>
                    <div class="nav-link-icon"><i data-feather="filter"></i></div>
                    Kategori
                </a>
                 <a class="nav-link {{ (request()-> is('admin/bengkel*')) ?'active' :''}}" href={{ route('bengkel.index') }}>
                    <div class="nav-link-icon"><i data-feather="filter"></i></div>
                    Bengkel
                </a>
                <a class="nav-link {{ (request()-> is('admin/bengkel*')) ?'active' :''}}" href={{ route('keuangan.index') }}>
                    <div class="nav-link-icon"><i data-feather="filter"></i></div>
                    Penarikan Saldo
                </a>
            </div>
        </div>
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">Valerie Luna</div>
            </div>
        </div>
    </nav>
</div>
