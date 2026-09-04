<header class="js-navbar">

    <div class="js-navbar-container">

        {{-- =====================================================
             LOGO
        ====================================================== --}}

        <a href="{{ route('home') }}" class="js-brand">

            <div class="js-brand-logo">
                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Jersey Store"
                >
            </div>

            <span class="js-brand-name">
                Jersey Store
            </span>

        </a>


        {{-- =====================================================
             NAVIGASI TENGAH
        ====================================================== --}}

        <nav class="js-nav-menu">

            {{-- HOME --}}
            <a
                href="{{ route('home') }}"
                class="{{ request()->routeIs('home') ? 'active' : '' }}"
            >
                Home
            </a>


            {{-- PRODUK --}}
            <a
                href="{{ route('public.products.index') }}"
                class="{{ request()->routeIs('public.products.*') ? 'active' : '' }}"
            >
                Produk
            </a>


            {{-- ARTIKEL --}}
            <a
                href="{{ route('public.articles.index') }}"
                class="{{ request()->routeIs('public.articles.*') ? 'active' : '' }}"
            >
                Artikel
            </a>


            {{-- KONTAK --}}
            <a
                href="{{ route('kontak') }}"
                class="{{ request()->routeIs('kontak') || request()->routeIs('contact') ? 'active' : '' }}"
            >
                Kontak
            </a>

        </nav>


        {{-- =====================================================
             WISHLIST + KERANJANG
             MUNCUL DI HOME DAN PRODUK
        ====================================================== --}}

        <div class="js-actions">

            {{-- WISHLIST --}}
            <a
                href="{{ route('wishlist.index') }}"
                class="js-action"
                title="Wishlist"
                aria-label="Wishlist"
            >
                <span>♡</span>
            </a>


            {{-- KERANJANG --}}
            <a
                href="{{ route('cart.index') }}"
                class="js-action"
                title="Keranjang"
                aria-label="Keranjang"
            >
                <span>🛒</span>
            </a>

        </div>

    </div>

</header>


<style>

/* ==========================================================
   NAVBAR
========================================================== */

.js-navbar {
    width: 100%;
    height: 72px;

    background: #ffffff;

    border-bottom: 1px solid #eeeeee;

    position: relative;

    z-index: 1000;
}


/* ==========================================================
   CONTAINER
========================================================== */

.js-navbar-container {
    position: relative;

    width: 100%;
    max-width: 1200px;

    height: 72px;

    margin: 0 auto;

    padding: 0 24px;

    display: flex;
    align-items: center;
}


/* ==========================================================
   LOGO
========================================================== */

.js-brand {
    display: flex;

    align-items: center;

    gap: 10px;

    color: #111827;

    text-decoration: none;

    flex-shrink: 0;
}


.js-brand-logo {
    width: 42px;
    height: 42px;

    display: flex;

    align-items: center;
    justify-content: center;

    overflow: hidden;
}


.js-brand-logo img {
    width: 100%;
    height: 100%;

    object-fit: contain;

    display: block;
}


.js-brand-name {
    color: #111827;

    font-size: 20px;

    font-weight: 800;

    white-space: nowrap;
}


/* ==========================================================
   NAVIGASI TENGAH
========================================================== */

.js-nav-menu {
    position: absolute;

    left: 50%;
    top: 50%;

    transform: translate(-50%, -50%);

    display: flex;

    align-items: center;

    gap: 34px;
}


.js-nav-menu a {
    position: relative;

    display: flex;

    align-items: center;

    height: 40px;

    padding: 0;

    color: #111827;

    background: transparent;

    text-decoration: none;

    font-size: 15px;

    font-weight: 500;

    border-radius: 0;

    transition: color 0.2s ease;
}


/* HOVER */

.js-nav-menu a:hover {
    color: #c87500;
}


/* MENU AKTIF */

.js-nav-menu a.active {
    color: #c87500;

    background: transparent;
}


/* GARIS AKTIF */

.js-nav-menu a.active::after {
    content: "";

    position: absolute;

    left: 0;
    right: 0;

    bottom: 2px;

    height: 2px;

    background: #c87500;

    border-radius: 0;
}


/* ==========================================================
   WISHLIST + KERANJANG
========================================================== */

.js-actions {
    position: absolute;

    right: 24px;

    top: 50%;

    transform: translateY(-50%);

    display: flex;

    align-items: center;

    gap: 12px;
}


/* ==========================================================
   ICON BUTTON
========================================================== */

.js-action {
    width: 42px;
    height: 42px;

    display: flex;

    align-items: center;
    justify-content: center;

    color: #111827;

    background: #f8fafc;

    border-radius: 50%;

    text-decoration: none;

    transition:
        color 0.2s ease,
        background 0.2s ease,
        transform 0.2s ease;

    cursor: pointer;
}


.js-action span {
    display: flex;

    align-items: center;
    justify-content: center;

    line-height: 1;

    font-size: 21px;
}


/* ==========================================================
   HOVER ICON
========================================================== */

.js-action:hover {
    color: #c87500;

    background: #f1f5f9;

    transform: translateY(-2px);
}


/* ==========================================================
   RESPONSIVE
========================================================== */

@media (max-width: 768px) {

    .js-navbar {
        height: auto;
    }


    .js-navbar-container {
        height: auto;

        min-height: 72px;

        padding: 12px 16px;

        flex-direction: column;

        gap: 10px;
    }


    .js-brand {
        width: 100%;

        justify-content: center;
    }


    .js-nav-menu {
        position: static;

        transform: none;

        width: 100%;

        justify-content: center;

        flex-wrap: wrap;

        gap: 22px;
    }


    .js-nav-menu a {
        height: 36px;

        font-size: 14px;
    }


    .js-actions {
        position: static;

        transform: none;

        margin-top: 2px;
    }

}


/* ==========================================================
   HP KECIL
========================================================== */

@media (max-width: 480px) {

    .js-brand-name {
        font-size: 18px;
    }


    .js-nav-menu {
        gap: 16px;
    }


    .js-nav-menu a {
        font-size: 13px;
    }


    .js-action {
        width: 38px;
        height: 38px;
    }


    .js-action span {
        font-size: 19px;
    }

}

</style>