<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $product->name }} - Jersey Store</title>

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

        /* ================= FLASH MESSAGE ================= */

        .flash {
            max-width: 1240px;
            margin: 20px auto 0;
            padding: 0 32px;
        }

        .flash-box {
            border-radius: 12px;
            padding: 13px 18px;
            font-size: 13.5px;
            font-weight: 600;
        }

        .flash-success {
            background: #DCFCE7;
            color: #15803D;
        }

        .flash-error {
            background: #FEE2E2;
            color: #B91C1C;
        }

        /* ================= CONTAINER ================= */

        .container {
            max-width: 1240px;
            margin: 0 auto;
            padding: 40px 32px 90px;
        }

        .back {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            text-decoration: none;
            color: #6B7280;
            font-weight: 600;
            font-size: 13.5px;
            margin-bottom: 24px;
        }

        .back:hover {
            color: #111827;
        }

        /* ================= PRODUCT LAYOUT ================= */

        .product-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 56px;
            align-items: start;
        }

        /* ================= IMAGE ================= */

        .product-image {
            border-radius: 20px;
            overflow: hidden;
            background: #F8FAFC;
            min-height: 480px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            border: 1px solid #E5E7EB;
        }

        .product-image img {
            width: 100%;
            max-width: 440px;
            max-height: 480px;
            object-fit: contain;
            transition: transform .3s ease;
        }

        .product-image img:hover {
            transform: scale(1.03);
        }

        .no-image {
            color: #9CA3AF;
            text-align: center;
            font-size: 13.5px;
        }

        .no-image-icon {
            font-size: 60px;
            margin-bottom: 12px;
        }

        /* ================= INFO ================= */

        .badge {
            display: inline-block;
            width: fit-content;
            background: #F8FAFC;
            border: 1px solid #E5E7EB;
            color: #6B7280;
            padding: 7px 14px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .4px;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .product-title {
            font-family: 'Playfair Display', serif;
            font-size: 34px;
            line-height: 1.2;
            font-weight: 700;
            color: #111827;
            margin: 0 0 16px;
        }

        .price {
            font-size: 30px;
            font-weight: 800;
            color: #111827;
            margin-bottom: 16px;
        }

        .stock {
            display: inline-flex;
            width: fit-content;
            padding: 8px 14px;
            border-radius: 999px;
            font-weight: 700;
            font-size: 13px;
            margin-bottom: 26px;
        }

        .stock.available {
            background: #DCFCE7;
            color: #15803D;
        }

        .stock.empty {
            background: #FEE2E2;
            color: #B91C1C;
        }

        .section-title {
            font-size: 15px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 8px;
        }

        .description {
            color: #6B7280;
            line-height: 1.8;
            font-size: 14.5px;
            margin-bottom: 30px;
        }

        /* ================= PURCHASE ================= */

        .purchase-box {
            border-top: 1px solid #E5E7EB;
            padding-top: 26px;
        }

        .quantity-label {
            font-weight: 700;
            font-size: 13.5px;
            margin-bottom: 10px;
            display: block;
            color: #111827;
        }

        .quantity {
            display: flex;
            align-items: center;
            width: 135px;
            height: 46px;
            border: 1px solid #E5E7EB;
            border-radius: 999px;
            overflow: hidden;
            margin-bottom: 22px;
        }

        .quantity button {
            width: 40px;
            height: 100%;
            border: none;
            background: #F8FAFC;
            font-size: 18px;
            cursor: pointer;
            color: #111827;
        }

        .quantity button:hover {
            background: #F1F5F9;
        }

        .quantity input {
            width: 55px;
            height: 100%;
            border: none;
            text-align: center;
            font-size: 15px;
            outline: none;
            font-family: inherit;
        }

        .buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .buttons form {
            flex: 1;
            min-width: 150px;
        }

        .btn {
            display: block;
            width: 100%;
            border: none;
            border-radius: 999px;
            padding: 14px 20px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: transform .2s ease, background .2s ease, color .2s ease;
            font-family: inherit;
        }

        .btn-cart {
            background: #111827;
            color: #FFFFFF;
        }

        .btn-cart:hover:not(:disabled) {
            background: #F4B400;
            color: #111827;
        }

        .btn-buy {
            background: #F4B400;
            color: #111827;
        }

        .btn-buy:hover:not(:disabled) {
            background: #111827;
            color: #FFFFFF;
        }

        .btn-wishlist {
            background: #FFFFFF;
            color: #111827;
            border: 1.5px solid #E5E7EB;
        }

        .btn-wishlist:hover {
            border-color: #F4B400;
            color: #92400E;
        }

        .btn:disabled {
            background: #E5E7EB;
            color: #9CA3AF;
            cursor: not-allowed;
            transform: none;
        }

        .btn:hover:not(:disabled) {
            transform: translateY(-1px);
        }

        /* ================= GUARANTEE ================= */

        .guarantee {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-top: 26px;
        }

        .guarantee-item {
            background: #F8FAFC;
            padding: 14px;
            border-radius: 12px;
            text-align: center;
            font-size: 12px;
            color: #6B7280;
        }

        .guarantee-icon {
            display: block;
            font-size: 20px;
            margin-bottom: 6px;
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

        @media (max-width: 900px) {

            .product-layout {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .product-image {
                min-height: 360px;
                padding: 24px;
            }

            .product-title {
                font-size: 27px;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 640px) {

            .container {
                padding: 28px 20px 60px;
            }

            .navbar-inner,
            .flash,
            footer {
                padding-left: 20px;
                padding-right: 20px;
            }

            .price {
                font-size: 25px;
            }

            .buttons {
                flex-direction: column;
            }

            .buttons form {
                min-width: 0;
            }

            .guarantee {
                grid-template-columns: 1fr;
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
    // Jumlah item di keranjang, dari session cart (dipakai untuk badge navbar).
    // Asumsi struktur: session('cart') = [product_id => ['quantity' => n, ...]]
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
            <a href="{{ route('public.products.index') }}" class="active">Produk</a>
            <a href="{{ route('public.articles.index') }}">Artikel</a>
            <a href="{{ route('contact') }}">Kontak</a>
        </nav>

        <div class="nav-right">

            <a href="{{ route('wishlist.index') }}" class="icon-btn" title="Wishlist">
                ♡
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
    <a href="{{ route('public.products.index') }}" class="active">Produk</a>
    <a href="{{ route('public.articles.index') }}">Artikel</a>
    <a href="{{ route('contact') }}">Kontak</a>
</div>


<!-- ================= FLASH MESSAGE ================= -->

@if(session('success') || session('error'))
    <div class="flash">
        @if(session('success'))
            <div class="flash-box flash-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="flash-box flash-error">{{ session('error') }}</div>
        @endif
    </div>
@endif


<!-- ================= CONTENT ================= -->

<main class="container">

    <a href="{{ route('public.products.index') }}" class="back">
        ← Kembali ke Katalog
    </a>

    <div class="product-layout">

        <!-- FOTO PRODUK -->

        <div class="product-image">

            @if($product->image)

                <img
                    src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->name }}"
                >

            @else

                <div class="no-image">
                    <div class="no-image-icon">👕</div>
                    <p>Foto produk belum tersedia</p>
                </div>

            @endif

        </div>


        <!-- INFORMASI PRODUK -->

        <div>

            <span class="badge">Jersey Original</span>

            <h1 class="product-title">{{ $product->name }}</h1>

            <div class="price">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </div>

            @if($product->stock > 0)
                <div class="stock available">✓ {{ $product->stock }} tersedia</div>
            @else
                <div class="stock empty">✕ Stok habis</div>
            @endif

            <h3 class="section-title">Deskripsi Produk</h3>

            <p class="description">
                {{ $product->description ?: 'Jersey berkualitas dengan desain terbaru. Cocok digunakan untuk olahraga, koleksi, maupun aktivitas sehari-hari.' }}
            </p>


            <!-- PEMBELIAN -->

            <div class="purchase-box">

                @if($product->stock > 0)

                    <label class="quantity-label">Jumlah</label>

                    <div class="quantity">

                        <button type="button" onclick="kurang()">−</button>

                        <input
                            type="number"
                            id="quantity"
                            value="1"
                            min="1"
                            max="{{ $product->stock }}"
                            oninput="syncQuantity()"
                        >

                        <button type="button" onclick="tambah()">+</button>

                    </div>

                    <div class="buttons">

                        {{-- TAMBAH KERANJANG: route cart.add yang sudah ada --}}
                        <form action="{{ route('cart.add', $product) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" id="cart-quantity-input" value="1">
                            <button type="submit" class="btn btn-cart">🛒 Tambah Keranjang</button>
                        </form>

                        {{-- BELI SEKARANG: route checkout.buy yang sudah ada --}}
                        <form action="{{ route('checkout.buy', $product) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" id="buy-quantity-input" value="1">
                            <button type="submit" class="btn btn-buy">⚡ Beli Sekarang</button>
                        </form>

                    </div>

                    {{-- WISHLIST: route wishlist.toggle yang sudah ada --}}
                    <form action="{{ route('wishlist.toggle', $product) }}" method="POST" style="margin-top: 12px;">
                        @csrf
                        <button type="submit" class="btn btn-wishlist">♡ Tambah ke Wishlist</button>
                    </form>

                @else

                    <button class="btn" disabled>Stok Produk Habis</button>

                    <form action="{{ route('wishlist.toggle', $product) }}" method="POST" style="margin-top: 12px;">
                        @csrf
                        <button type="submit" class="btn btn-wishlist">♡ Tambah ke Wishlist</button>
                    </form>

                @endif

            </div>


            <!-- JAMINAN -->

            <div class="guarantee">
                <div class="guarantee-item">
                    <span class="guarantee-icon">🚚</span>
                    Pengiriman Cepat
                </div>
                <div class="guarantee-item">
                    <span class="guarantee-icon">🛡️</span>
                    Produk Berkualitas
                </div>
                <div class="guarantee-item">
                    <span class="guarantee-icon">💬</span>
                    Layanan Pelanggan
                </div>
            </div>

        </div>

    </div>

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

    const stock = {{ (int) $product->stock }};

    function kurang() {
        const input = document.getElementById('quantity');
        let jumlah = parseInt(input.value) || 1;
        if (jumlah > 1) {
            input.value = jumlah - 1;
        }
        syncQuantity();
    }

    function tambah() {
        const input = document.getElementById('quantity');
        let jumlah = parseInt(input.value) || 1;
        if (jumlah < stock) {
            input.value = jumlah + 1;
        }
        syncQuantity();
    }

    // Menyalin nilai quantity ke hidden input di form
    // "Tambah Keranjang" dan "Beli Sekarang" sebelum dikirim.
    function syncQuantity() {
        const input = document.getElementById('quantity');
        let jumlah = parseInt(input.value) || 1;

        if (jumlah < 1) jumlah = 1;
        if (jumlah > stock) jumlah = stock;

        const cartInput = document.getElementById('cart-quantity-input');
        const buyInput = document.getElementById('buy-quantity-input');

        if (cartInput) cartInput.value = jumlah;
        if (buyInput) buyInput.value = jumlah;
    }

    // Hamburger menu (mobile)
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