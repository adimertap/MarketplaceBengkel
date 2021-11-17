<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <div class="sidenav-menu-heading">Master Data</div>
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse"
                    data-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                    <div class="nav-link-icon"><i class="fas fa-cubes"></i></div>
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
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse"
                    data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="nav-link-icon"><i class="fas fa-users"></i></div>
                    Kepegawaian
                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>
                <div class="collapse" id="collapsePages" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                        <a class="nav-link " href="{{ route('jabatan.index') }}">
                            <div class="nav-link-icon"><i class="fas fa-database"></i></div>
                            Jabatan
                        </a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse"
                    data-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
                    <div class="nav-link-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                    Payroll
                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>
                <div class="collapse" id="collapseUtilities" data-parent="#accordionSidenav" style="">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('pph21.index') }}">
                            <div class="nav-link-icon"><i class="fas fa-database"></i></div>
                            PPH21
                        </a>
                        <a class="nav-link" href="{{ route('ptkp.index') }}">
                            <div class="nav-link-icon"><i class="fas fa-database"></i></div>
                            PTKP
                        </a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse"
                    data-target="#collapseComponents" aria-expanded="false" aria-controls="collapseComponents">
                    <div class="nav-link-icon"><i class="fas fa-calculator"></i></div>
                    Accounting
                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>
                <div class="collapse" id="collapseComponents" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link " href="{{ route('jenistransaksi.index') }}">
                            <div class="nav-link-icon"><i class="fas fa-database"></i></div>
                            Jenis Transaksi
                        </a>
                        <a class="nav-link " href="{{ route('fop.index') }}">
                            <div class="nav-link-icon"><i class="fas fa-database"></i></div>
                            Form of Payment
                        </a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse"
                    data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="nav-link-icon"><i class="fas fa-wrench"></i></div>
                    Jasa Perbaikan
                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                        <a class="nav-link " href="{{ route('jenisperbaikan.index') }}">
                            <div class="nav-link-icon"><i class="fas fa-database"></i></div>
                            Jenis Perbaikan
                        </a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse"
                    data-target="#collapseFlows" aria-expanded="false" aria-controls="collapseFlows">
                    <div class="nav-link-icon"><i class="fas fa-car"></i></div>
                    Kendaraan
                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>
                <div class="collapse" id="collapseFlows" data-parent="#accordionSidenav" style="">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link " href="{{ route('jenis-kendaraan.index') }}">
                            <div class="nav-link-icon"><i class="fas fa-database"></i></div>
                            Jenis Kendaraan
                        </a>
                        <a class="nav-link " href="{{ route('merkkendaraan.index') }}">
                            <div class="nav-link-icon"><i class="fas fa-database"></i></div>
                            Merk Kendaraan
                        </a>
                        <a class="nav-link " href="{{ route('kendaraan.index') }}">
                            <div class="nav-link-icon"><i class="fas fa-database"></i></div>
                            Kendaraan
                        </a>
                    </nav>
                </div>
                <a class="nav-link {{ (request()-> is('admin/bengkel*')) ?'active' :''}}"
                    href={{ route('diskon.index') }}>
                    <div class="nav-link-icon"><i class="fas fa-percent"></i></div>
                    Diskon
                </a>
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
                <a class="nav-link {{ (request()-> is('admin/kategori*')) ?'active' :''}}"
                    href={{ route('kategori.index') }}>
                    <div class="nav-link-icon"><i class="fas fa-warehouse"></i></div>
                    Kategori
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
