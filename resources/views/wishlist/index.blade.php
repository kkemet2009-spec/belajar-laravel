<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Wishlist - Jersey Store</title>

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

        /* ================= NAVBAR (sama persis dengan Home) ================= */

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

        .nav-right {
            justify-self: end;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .icon-btn {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: none;
            background: #F8FAFC;
            color: #111827;
            font-size: 16px;
            text-decoration: none;
            cursor: pointer;
        }

        .icon-btn:hover {
            background: #F1F5F9;
        }

        .icon-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            min-width: 17px;
            height: 17px;
            padding: 0 4px;
            border-radius: 50px;
            background: #F4B400;
            color: #111827;
            font-size: 10px;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
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

        /* ================= CONTAINER ================= */

        .container {
            max-width: 1240px;
            margin: 0 auto;
            padding: 44px 32px 90px;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            font-weight: 700;
            color: #111827;
            margin: 0 0 8px;
        }

        .page-subtitle {
            color: #6B7280;
            font-size: 14.5px;
            margin: 0 0 32px;
        }

        .alert {
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 13.5px;
            font-weight: 600;
        }

        .alert-success {
            background: #DCFCE7;
            color: #15803D;
        }

        .alert-error {
            background: #FEE2E2;
            color: #B91C1C;
        }

        /* ================= WISHLIST GRID ================= */

        .wishlist-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
        }

        .wishlist-card {
            display: flex;
            flex-direction: column;
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 16px;
            overflow: hidden;
        }

        .wishlist-image {
            height: 200px;
            background: #F8FAFC;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .wishlist-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .wishlist-image span {
            font-size: 12px;
            color: #9CA3AF;
        }

        .wishlist-body {
            padding: 16px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .wishlist-name {
            font-size: 14.5px;
            font-weight: 700;
            color: #111827;
            margin: 0 0 8px;
            line-height: 1.4;
        }

        .wishlist-price {
            font-size: 16px;
            font-weight: 800;
            color: #111827;
            margin-bottom: 16px;
        }

        .wishlist-actions {
            margin-top: auto;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .btn {
            display: block;
            width: 100%;
            border: none;
            border-radius: 999px;
            padding: 11px 14px;
            font-size: 12.5px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: transform .2s ease, background .2s ease, color .2s ease;
            font-family: inherit;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-view {
            background: #111827;
            color: #FFFFFF;
        }

        .btn-view:hover {
            background: #F4B400;
            color: #111827;
        }

        .btn-remove {
            background: #FEF2F2;
            color: #B91C1C;
        }

        .btn-remove:hover {
            background: #FEE2E2;
        }

        /* ================= EMPTY ================= */

        .empty {
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 18px;
            padding: 70px 30px;
            text-align: center;
        }

        .empty-icon {
            font-size: 54px;
            margin-bottom: 18px;
            opacity: .6;
        }

        .empty h2 {
            font-size: 20px;
            color: #111827;
            margin: 0 0 8px;
        }

        .empty p {
            color: #6B7280;
            font-size: 14px;
            margin: 0 0 26px;
        }

        .empty a {
            display: inline-flex;
            padding: 13px 26px;
            border-radius: 999px;
            background: #111827;
            color: #FFFFFF;
            text-decoration: none;
            font-weight: 700;
            font-size: 13.5px;
            transition: background .2s ease;
        }

        .empty a:hover {
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

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1024px) {
            .wishlist-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 600px) {
            .container {
                padding: 32px 20px 60px;
            }

            .navbar-inner,
            footer {
                padding-left: 20px;
                padding-right: 20px;
            }

            .wishlist-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 26px;
            }
        }
    </style>
</head>

<body>

@php
    $cartCount = collect(session('cart', []))->sum(function ($item) {
        return is_array($item) ? ($item['quantity'] ?? 0) : 0;
    });
@endphp

<!-- ================= NAVBAR ================= -->

<header class="navbar" id="navbar">
    <div class="navbar-inner">

        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Jersey Store" class="logo-icon">
        </a>

        <nav class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('public.products.index') }}">Produk</a>
            <a href="{{ route('public.articles.index') }}">Artikel</a>
            <a href="{{ route('contact') }}">Kontak</a>
        </nav>

        <div class="nav-right">

            <a href="{{ route('wishlist.index') }}" class="icon-btn active" title="Wishlist">
                ♥
            </a>

            <a href="{{ route('cart.index') }}" class="icon-btn" title="Keranjang">
                🛒
                @if($cartCount > 0)
                    <span class="icon-badge">{{ $cartCount }}</span>
                @endif
            </a>

            <button class="hamburger" id="hamburgerBtn" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

        </div>

    </div>
</header>

<div class="mobile-menu" id="mobileMenu">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('public.products.index') }}">Produk</a>
    <a href="{{ route('public.articles.index') }}">Artikel</a>
    <a href="{{ route('contact') }}">Kontak</a>
</div>


<!-- ================= CONTENT ================= -->

<main class="container">

    <h1 class="page-title">Wishlist Kamu</h1>
    <p class="page-subtitle">Produk yang sudah kamu tandai untuk dibeli nanti.</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    @if(empty($wishlist))

        <div class="empty">
            <div class="empty-icon">♡</div>
            <h2>Wishlist Kamu Kosong</h2>
            <p>Belum ada jersey yang kamu tandai. Yuk jelajahi koleksi kami.</p>
            <a href="{{ route('public.products.index') }}">Lihat Koleksi Jersey</a>
        </div>

    @else

        <div class="wishlist-grid">

            @foreach($wishlist as $item)

                <div class="wishlist-card">

                    <div class="wishlist-image">
                        @if(!empty($item['image']))
                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}">
                        @else
                            <span>No Image</span>
                        @endif
                    </div>

                    <div class="wishlist-body">

                        <h3 class="wishlist-name">{{ $item['name'] }}</h3>

                        <div class="wishlist-price">
                            Rp {{ number_format($item['price'], 0, ',', '.') }}
                        </div>

                        <div class="wishlist-actions">

                            <a href="{{ route('public.products.show', $item['id']) }}" class="btn btn-view">
                                Lihat Produk
                            </a>

                            <form action="{{ route('wishlist.toggle', $item['id']) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-remove">Hapus dari Wishlist</button>
                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</main>


<!-- ================= FOOTER ================= -->

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
    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    if (hamburgerBtn && mobileMenu) {
        hamburgerBtn.addEventListener('click', function () {
            mobileMenu.classList.toggle('open');
        });
    }
</script>

</body>
</html>