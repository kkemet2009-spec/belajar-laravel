<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Jersey Store')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif;
            background: #FFFFFF;
            color: #171717;
            -webkit-font-smoothing: antialiased;
        }

        img {
            max-width: 100%;
            display: block;
        }

        a {
            font-family: inherit;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            position: sticky;
            top: 0;
            z-index: 100;
            height: 80px;
            background: #FFFFFF;
            border-bottom: 1px solid #E5E7EB;
        }

        .navbar-inner {
            max-width: 1240px;
            height: 100%;
            margin: 0 auto;
            padding: 0 32px;
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
        }

        .logo {
            justify-self: start;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #111827;
            text-decoration: none;
            font-size: 18px;
            font-weight: 800;
        }

        .logo-icon {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
        }

        .nav-links {
            justify-self: center;
            display: flex;
            align-items: center;
            gap: 32px;
        }

        .nav-links a {
            position: relative;
            color: #111827;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            padding-bottom: 6px;
        }

        .nav-links a.active {
            font-weight: 600;
            color: #92400E;
        }

        .nav-links a.active::after {
            content: "";
            position: absolute;
            left: 0; right: 0; bottom: 0;
            height: 2px;
            background: #F4B400;
        }

        .nav-right {
            justify-self: end;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .nav-cta {
            padding: 10px 18px;
            border-radius: 999px;
            background: #111827;
            color: #FFFFFF;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 6px;
        }

        .hamburger span {
            width: 22px;
            height: 2px;
            background: #111827;
        }

        .mobile-menu {
            display: none;
            flex-direction: column;
            background: #FFFFFF;
            border-bottom: 1px solid #E5E7EB;
            padding: 8px 32px 16px;
        }

        .mobile-menu.open {
            display: flex;
        }

        .mobile-menu a {
            color: #111827;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            padding: 12px 0;
            border-bottom: 1px solid #E5E7EB;
        }

        .mobile-menu a.active {
            color: #92400E;
            font-weight: 700;
        }

        @media (max-width: 800px) {
            .nav-links {
                display: none;
            }

            .hamburger {
                display: flex;
            }

            .navbar-inner {
                grid-template-columns: 1fr auto;
            }
        }

        /* ================= GENERIC HELPERS ================= */

        .btn {
            display: inline-block;
            background: #111827;
            color: #FFFFFF;
            border: none;
            padding: 12px 20px;
            border-radius: 999px;
            text-decoration: none;
            cursor: pointer;
            font-size: 13.5px;
            font-weight: 700;
        }

        .btn:hover {
            background: #F4B400;
            color: #111827;
        }

        /* ================= FOOTER ================= */

        footer {
            background: #111827;
            color: #FFFFFF;
            padding: 48px 32px 24px;
            margin-top: 60px;
        }

        .footer-grid {
            max-width: 1240px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 36px;
        }

        .footer-brand h2 {
            font-size: 17px;
            margin: 0 0 10px;
        }

        .footer-brand p {
            color: #9CA3AF;
            font-size: 13.5px;
            line-height: 1.7;
            max-width: 320px;
            margin: 0;
        }

        footer h4 {
            font-size: 13.5px;
            margin: 0 0 14px;
            color: #E5E7EB;
        }

        footer a.footer-link {
            display: block;
            color: #9CA3AF;
            text-decoration: none;
            margin-bottom: 10px;
            font-size: 13px;
        }

        footer a.footer-link:hover {
            color: #FFFFFF;
        }

        .copyright {
            max-width: 1240px;
            margin: 32px auto 0;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,.08);
            text-align: center;
            color: #9CA3AF;
            font-size: 12.5px;
        }

        @media (max-width: 800px) {
            .footer-grid {
                grid-template-columns: 1fr;
                gap: 26px;
            }
        }

        @media (max-width: 640px) {
            .navbar-inner,
            footer {
                padding-left: 20px;
                padding-right: 20px;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <header class="navbar" id="navbar">
        <div class="navbar-inner">

            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Jersey Store" class="logo-icon">
            </a>

            <nav class="nav-links">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('public.products.index') }}" class="{{ request()->routeIs('public.products.*') ? 'active' : '' }}">Produk</a>
                <a href="{{ route('public.articles.index') }}" class="{{ request()->routeIs('public.articles.*') ? 'active' : '' }}">Artikel</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a>
            </nav>

            <div class="nav-right">

                @auth
                    @if(Route::has('dashboard'))
                        <a href="{{ route('dashboard') }}" class="nav-cta">Dashboard</a>
                    @endif
                @endauth

                <button class="hamburger" id="hamburgerBtn" aria-label="Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

            </div>

        </div>
    </header>

    <div class="mobile-menu" id="mobileMenu">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
        <a href="{{ route('public.products.index') }}" class="{{ request()->routeIs('public.products.*') ? 'active' : '' }}">Produk</a>
        <a href="{{ route('public.articles.index') }}" class="{{ request()->routeIs('public.articles.*') ? 'active' : '' }}">Artikel</a>
        <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a>
    </div>


    {{-- ISI HALAMAN --}}
    @yield('content')


    {{-- FOOTER --}}
    <footer>

        <div class="footer-grid">

            <div class="footer-brand">
                <h2>Jersey Store</h2>
                <p>Jersey pilihan untuk pecinta sepak bola.</p>
            </div>

            <div>
                <h4>Shop</h4>
                <a href="{{ route('public.products.index') }}" class="footer-link">Produk</a>
                <a href="{{ route('public.articles.index') }}" class="footer-link">Artikel</a>
            </div>

            <div>
                <h4>Company</h4>
                <a href="{{ route('home') }}" class="footer-link">Home</a>
                <a href="{{ route('contact') }}" class="footer-link">Kontak</a>
            </div>

        </div>

        <div class="copyright">
            © {{ date('Y') }} Jersey Store. All Rights Reserved.
        </div>

    </footer>

    <script>
        var hamburgerBtn = document.getElementById('hamburgerBtn');
        var mobileMenu = document.getElementById('mobileMenu');
        if (hamburgerBtn && mobileMenu) {
            hamburgerBtn.addEventListener('click', function () {
                mobileMenu.classList.toggle('open');
            });
        }
    </script>

</body>
</html>