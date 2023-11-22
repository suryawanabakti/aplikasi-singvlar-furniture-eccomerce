{{--  --}}
<header class="navbar navbar-expand-md d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            Singvlar Furniture
        </h1>
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item d-none d-md-flex me-3">
                <div class="btn-list">

                    </a>
                </div>
            </div>
            <div class="nav-item d-none d-md-flex me-3">
                <a href="#" class="nav-link px-0 show" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                    aria-controls="offcanvasRight" tabindex="-1" aria-expanded="true">
                    <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                        <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                        <path d="M17 17h-11v-14h-2"></path>
                        <path d="M6 5l14 1l-1 7h-13"></path>
                    </svg>
                    @if ($carts->count() > 0)
                        <span class="badge bg-warning">{{ $carts->count() }}</span>
                    @endif
                </a>
            </div>
            <div class="d-none d-md-flex me-3">
                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                    </svg>
                </a>
                <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                        <path
                            d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                    </svg>
                </a>

            </div>
            <div class="nav-item d-md-flex me-3">
                @auth
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0 show" data-bs-toggle="dropdown"
                        aria-label="Open user menu" aria-expanded="true">

                        <span class="avatar avatar-sm"
                            style="background-image: url(https://ui-avatars.com/api/?name={{ auth()->user()->name }})"></span>
                        <div class="d-none d-xl-block ps-2">
                            <div class="text-capitalize">{{ auth()->user()->name }}</div>
                            <div class="mt-1 small text-secondary text-capitalize">{{ auth()->user()->roles[0]->name }}
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow " data-bs-popper="static">
                        <a href="/transactions" class="dropdown-item">Transaksi</a>
                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                            aria-controls="offcanvasRight" class="dropdown-item">Keranjang</a>
                        {{-- <a href="#" class="dropdown-item">Feedback</a> --}}
                        <div class="dropdown-divider"></div>
                        {{-- <a href="./settings.html" class="dropdown-item">Settings</a> --}}
                        <a href="/logout" class="dropdown-item">Logout</a>
                    </div>
                @endauth
                @guest
                    <a href="/register" class="nav-link d-flex lh-1 text-reset p-0 show" aria-label="Open user menu"
                        aria-expanded="true">Daftar</a>
                    </a>
                @endguest

            </div>
            <div class="nav-item d-md-flex me-3">
                @guest
                    <a href="/login" class="nav-link d-flex lh-1 text-reset p-0 show" aria-label="Open user menu"
                        aria-expanded="true">Login</a>
                    </a>
                @endguest
            </div>
        </div>
    </div>
</header>
<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="/">
                            <span
                                class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Beranda
                            </span>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->is('event') ? 'active' : '' }}">
                        <a class="nav-link" href="/event">
                            <span
                                class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-speakerphone" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M18 8a3 3 0 0 1 0 6"></path>
                                    <path d="M10 8v11a1 1 0 0 1 -1 1h-1a1 1 0 0 1 -1 -1v-5"></path>
                                    <path
                                        d="M12 8h0l4.524 -3.77a.9 .9 0 0 1 1.476 .692v12.156a.9 .9 0 0 1 -1.476 .692l-4.524 -3.77h-8a1 1 0 0 1 -1 -1v-4a1 1 0 0 1 1 -1h8">
                                    </path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Promo
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('tokos/1') ? 'active' : '' }}">
                        <a class="nav-link" href="/tokos/1">
                            <span
                                class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-registered" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                    <path d="M10 15v-6h2a2 2 0 1 1 0 4h-2"></path>
                                    <path d="M14 15l-2 -2"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Tentang Kami
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('kontak') ? 'active' : '' }}">
                        <a class="nav-link" href="/kontak">
                            <span
                                class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                                    </path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Kontak Kami
                            </span>
                        </a>
                    </li>
                    @auth
                        <li class="nav-item {{ request()->is('live-chat') ? 'active' : '' }}">
                            <a class="nav-link" href="/live-chat">
                                <span
                                    class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-headset"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 14v-3a8 8 0 1 1 16 0v3"></path>
                                        <path d="M18 19c0 1.657 -2.686 3 -6 3"></path>
                                        <path
                                            d="M4 14a2 2 0 0 1 2 -2h1a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-1a2 2 0 0 1 -2 -2v-3z">
                                        </path>
                                        <path
                                            d="M15 14a2 2 0 0 1 2 -2h1a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-1a2 2 0 0 1 -2 -2v-3z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Live Chat
                                </span>
                            </a>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </div>
</header>

@section('offcanvas')
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Keranjang Saya</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            @auth
                @forelse ($carts as $cart)
                    <div class="row">

                        <div class="col-md-6">
                            <img src="{{ asset('uploads/image/' . $cart->product->image) }}" class="img img-fluid ">
                        </div>
                        <div class="col-md-6">
                            <b>{{ $cart->product->name }} </b> <br><span
                                class="blockquote-footer">{{ $cart->created_at->diffForHumans() }}</span> <br>
                            {{ $cart->created_at->format('') }}
                            <span>Tgl.Pengembalian : <br>
                                {{ \Carbon\Carbon::createFromdate($cart->tgl_pengembalian)->format('d M Y') }}</span>
                            <br><br>

                            <span>IDR {{ $cart->product->price }} x {{ $cart->jumlah }} pcs.</span>
                            <span> Total : IDR {{ number_format($cart->total) }}</span>
                        </div>
                    </div>

                    <hr>
                @empty
                    @php
                        $hidden = 'hidden';
                    @endphp
                    <p>Belum ada isi keranjang ...</p>
                @endforelse
                <div class="row " {{ $hidden ?? '' }}>
                    <div class="col-md-12">
                        Total Bayar : {{ $carts->sum('total') }} <br>
                        <a href="/carts">Lihat Keranjang</a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
@endsection
