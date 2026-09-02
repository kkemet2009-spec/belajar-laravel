<header class="js-navbar">
    <div class="js-navbar-container">

        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="js-brand">
            <img
                src="{{ asset('images/logo.png') }}"
                alt="Jersey Store"
                class="js-brand-logo"
            >

            <span>Jersey Store</span>
        </a>

        {{-- NAVIGASI TENGAH --}}
        <nav class="js-nav-menu">

            <a
                href="{{ route('home') }}"
                class="{{ request()->routeIs('home') ? 'active' : '' }}"
            >
                Home
            </a>

            <a
                href="{{ route('public.products.index') }}"
                class="{{ request()->routeIs('public.products.*') ? 'active' : '' }}"
            >
                Produk
            </a>

            <a
                href="{{ route('public.articles.index') }}"
                class="{{ request()->routeIs('public.articles.*') ? 'active' : '' }}"
            >
                Artikel
            </a>

            <a
                href="{{ route('kontak') }}"
                class="{{ request()->routeIs('kontak') || request()->routeIs('contact') ? 'active' : '' }}"
            >
                Kontak
            </a>

        </nav>

        {{-- WISHLIST + KERANJANG HANYA DI PRODUK --}}
        @if(request()->routeIs('public.products.*'))
            <div class="js-actions">

                <a
                    href="{{ route('wishlist.index') }}"
                    class="js-action"
                    title="Wishlist"
                >
                    ♡
                </a>

                <a
                    href="{{ route('cart.index') }}"
                    class="js-action"
                    title="Keranjang"
                >
                    🛒
                </a>

            </div>
        @endif

    </div>
</header>

<style>
/* ==========================================
   NAVBAR — SAMA SEPERTI HOME
========================================== */

.js-navbar {
    position: sticky;
    top: 0;
    z-index: 1000;

    width: 100%;
    height: 80px;

    background: #FFFFFF;
    border-bottom: 1px solid #E5E7EB;
}

.js-navbar-container {
    width: 100%;
    max-width: 1240px;
    height: 100%;

    margin: 0 auto;
    padding: 0 32px;

    display: grid;
    grid-template-columns: 1fr auto 1fr;
    align-items: center;
}

/* ==========================================
   LOGO
========================================== */

.js-brand {
    justify-self: start;

    display: flex;
    align-items: center;
    gap: 10px;

    color: #111827;
    text-decoration: none;

    font-size: 18px;
    font-weight: 800;
}

.js-brand-logo {
    width: 46px;
    height: 46px;

    border-radius: 50%;

    object-fit: cover;
    flex-shrink: 0;
}

/* ==========================================
   NAVIGASI TENGAH
========================================== */

.js-nav-menu {
    justify-self: center;

    display: flex;
    align-items: center;

    gap: 32px;
}

.js-nav-menu a {
    position: relative;

    color: #111827;
    text-decoration: none;

    font-size: 15px;
    font-weight: 500;

    padding-bottom: 6px;

    transition: color 0.2s ease;
}

/* HOVER */

.js-nav-menu a:hover {
    color: #92400E;
}

/* MENU AKTIF */

.js-nav-menu a.active {
    color: #92400E;
    font-weight: 600;
}

/* GARIS KUNING SEPERTI HOME */

.js-nav-menu a.active::after {
    content: "";

    position: absolute;

    left: 0;
    right: 0;
    bottom: 0;

    height: 2px;

    background: #F4B400;
}

/* ==========================================
   ICON KANAN
========================================== */

.js-actions {
    justify-self: end;

    display: flex;
    align-items: center;

    gap: 16px;
}

.js-action {
    width: 42px;
    height: 42px;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #111827;
    background: #F8FAFC;

    border-radius: 50%;

    text-decoration: none;

    font-size: 20px;

    transition:
        color 0.2s ease,
        background 0.2s ease,
        transform 0.2s ease;
}

.js-action:hover {
    color: #92400E;
    background: #F1F5F9;

    transform: translateY(-2px);
}

/* ==========================================
   RESPONSIVE
========================================== */

@media (max-width: 800px) {

    .js-navbar {
        height: 80px;
    }

    .js-navbar-container {
        grid-template-columns: 1fr auto;

        padding: 0 20px;
    }

    .js-nav-menu {
        position: absolute;

        top: 80px;
        left: 0;
        right: 0;

        display: none;

        background: #FFFFFF;

        padding: 20px;

        border-bottom: 1px solid #E5E7EB;
    }

    .js-nav-menu a {
        font-size: 14px;
    }
}

@media (max-width: 640px) {

    .js-navbar-container {
        padding: 0 20px;
    }

    .js-brand span {
        display: none;
    }

    .js-nav-menu {
        gap: 20px;
    }

    .js-actions {
        gap: 8px;
    }

    .js-action {
        width: 38px;
        height: 38px;
        font-size: 18px;
    }
}
</style>