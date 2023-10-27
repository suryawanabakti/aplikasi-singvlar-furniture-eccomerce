<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="#">SingvlarFurniture</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">SF</a>
    </div>
    <ul class="sidebar-menu">

        @role('super-admin')
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="{{ route('dashboardsuperadmin') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a></li>
            <li class="menu-header">Master Data</li>
            <li><a class="nav-link" href="{{ route('adminsuper.users.index') }}"><i class="fas fa-users"></i>
                    <span>Users</span></a></li>
            <li><a class="nav-link" href="{{ route('adminsuper.tokos.index') }}"><i class="fas fa-store"></i>
                    <span>Toko</span></a></li>
            <li><a class="nav-link" href="{{ route('adminsuper.categories.index') }}"><i class="fas fa-box"></i>
                    <span>Category</span></a></li>
            <li><a class="nav-link" href="{{ route('adminsuper.transactions.index') }}"><i class="fas fa-exchange-alt"></i>
                    <span>Transaction</span></a></li>
        @endrole

        @role('admintoko')
            <li class="menu-header">Dashboard</li>
            <li class=" {{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link "
                    href="{{ route('dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Master Data</li>
            <li class=" {{ Request::is('adminsuper/categories') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('adminsuper.categories.index') }}"><i class="fas fa-box"></i>
                    <span>Category</span></a></li>
            <li class=" {{ Request::is('admintoko/products*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admintoko.products.index') }}"><i class="fas fa-box"></i>
                    <span>Products</span></a></li>
            <li class=" {{ Request::is('admintoko/profile') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admintoko.profile.index') }}"><i class="fas fa-user"></i> <span>Profile</span></a>
            </li>
            <li class="menu-header">Transaction</li>
            <li class="{{ Request::is('admintoko/transactions') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admintoko.transactions.index') }}"><i class="fas fa-exchange-alt"></i>
                    <span>Transactions <sup
                            class="badge badge-primary">{{ DB::table('transactions')->where('status', 'process')->count() }}</sup></span></a>
            </li>
            <li class="menu-header">Misc</li>
            <li class=" {{ Request::is('admintoko/events') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admintoko.events.index') }}"><i class="fas fa-calendar-check"></i>
                    <span>Promo</span></a>
            </li>
            <li class=" {{ Request::is('admintoko/live-chat') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admintoko.live-chat.index') }}"><i class="fas fa-headphones"></i>
                    <span>Pengaduan</span></a>
            </li>
        @endrole

    </ul>

    <div class="mt-2 p-3 hide-sidebar-mini">
        <a href="/" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Halaman Utama
        </a>
    </div>
</aside>
