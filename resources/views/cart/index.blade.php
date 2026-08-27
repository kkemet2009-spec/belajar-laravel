<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Keranjang - Jersey Store</title>

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

        /* ================= ALERT ================= */

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

        /* ================= CART LAYOUT ================= */

        .cart-layout {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 26px;
            align-items: start;
        }

        .cart-card {
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 18px;
            overflow: hidden;
        }

        .cart-item {
            display: grid;
            grid-template-columns: 120px 1fr auto;
            gap: 20px;
            align-items: center;
            padding: 22px;
            border-bottom: 1px solid #E5E7EB;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .product-image {
            width: 120px;
            height: 120px;
            background: #F8FAFC;
            border: 1px solid #E5E7EB;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .product-image span {
            font-size: 11px;
            color: #9CA3AF;
        }

        .product-name {
            font-size: 16px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 6px;
        }

        .product-price {
            color: #92400E;
            font-weight: 700;
            font-size: 13.5px;
            margin-bottom: 14px;
        }

        .quantity-form {
            display: inline-flex;
            align-items: center;
            border: 1px solid #E5E7EB;
            border-radius: 999px;
            overflow: hidden;
        }

        .quantity-form button {
            width: 34px;
            height: 34px;
            border: none;
            background: #F8FAFC;
            cursor: pointer;
            font-size: 16px;
            color: #111827;
        }

        .quantity-form button:hover {
            background: #F1F5F9;
        }

        .quantity-form input {
            width: 42px;
            height: 34px;
            border: none;
            border-left: 1px solid #E5E7EB;
            border-right: 1px solid #E5E7EB;
            text-align: center;
            font-family: inherit;
            font-size: 13.5px;
        }

        .item-total {
            text-align: right;
        }

        .total-price {
            font-weight: 800;
            font-size: 16px;
            color: #111827;
            margin-bottom: 12px;
        }

        .remove-btn {
            border: none;
            background: #FEF2F2;
            color: #C62828;
            padding: 9px 13px;
            border-radius: 999px;
            cursor: pointer;
            font-weight: 700;
            font-size: 12.5px;
            font-family: inherit;
        }

        .remove-btn:hover {
            background: #FEE2E2;
        }

        /* ================= SUMMARY ================= */

        .summary {
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 18px;
            padding: 28px;
            height: fit-content;
            position: sticky;
            top: 100px;
        }

        .summary h2 {
            font-size: 19px;
            font-weight: 700;
            color: #111827;
            margin: 0 0 24px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 14px;
            color: #6B7280;
            font-size: 13.5px;
        }

        .summary-total {
            border-top: 1px solid #E5E7EB;
            padding-top: 18px;
            margin-top: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 22px;
            font-weight: 800;
            color: #111827;
        }

        .btn {
            width: 100%;
            min-height: 48px;
            border: none;
            border-radius: 999px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 700;
            margin-top: 12px;
            font-family: inherit;
            transition: transform .2s ease, background .2s ease, color .2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-checkout {
            background: #F4B400;
            color: #111827;
        }

        .btn-checkout:hover {
            background: #111827;
            color: #FFFFFF;
        }

        .btn-continue {
            background: #111827;
            color: #FFFFFF;
        }

        .btn-continue:hover {
            background: #F4B400;
            color: #111827;
        }

        .btn-clear {
            background: #FEF2F2;
            color: #B91C1C;
        }

        .btn-clear:hover {
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

        @media (max-width: 850px) {
            .cart-layout {
                grid-template-columns: 1fr;
            }

            .summary {
                position: static;
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

            .cart-item {
                grid-template-columns: 80px 1fr;
            }

            .product-image {
                width: 80px;
                height: 80px;
            }

            .item-total {
                grid-column: 2;
                text-align: left;
                margin-top: 10px;
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
    $cartCount = 0;
    foreach (session('cart', []) as $sessionItem) {
        $cartCount += $sessionItem['quantity'];
    }
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

            <a href="{{ route('wishlist.index') }}" class="icon-btn" title="Wishlist">
                ♡
            </a>

            <a href="{{ route('cart.index') }}" class="icon-btn active" title="Keranjang">
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

    <h1 class="page-title">Keranjang Belanja</h1>
    <p class="page-subtitle">Periksa kembali produk pilihanmu sebelum melanjutkan ke checkout.</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    @if(empty($cart))

        <div class="empty">
            <div class="empty-icon">🛒</div>
            <h2>Keranjang Kamu Kosong</h2>
            <p>Belum ada jersey yang kamu tambahkan ke keranjang.</p>
            <a href="{{ route('public.products.index') }}">Mulai Belanja</a>
        </div>

    @else

        <div class="cart-layout">

            {{-- =========================
                 ITEM
            ========================= --}}

            <div class="cart-card">

                @foreach($cart as $item)

                    <div class="cart-item">

                        <div class="product-image">
                            @if($item['image'])
                                <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}">
                            @else
                                <span>No Image</span>
                            @endif
                        </div>

                        <div>

                            <div class="product-name">{{ $item['name'] }}</div>

                            <div class="product-price">
                                Rp {{ number_format($item['price'], 0, ',', '.') }}
                            </div>

                            <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="quantity-form">
                                @csrf
                                @method('PATCH')

                                <button type="button" onclick="ubahJumlah(this, -1)">−</button>

                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">

                                <button type="button" onclick="ubahJumlah(this, 1)">+</button>
                            </form>

                        </div>

                        <div class="item-total">

                            <div class="total-price">
                                Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                            </div>

                            <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="remove-btn">🗑 Hapus</button>
                            </form>

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- =========================
                 SUMMARY
            ========================= --}}

            <div class="summary">

                <h2>Ringkasan Pesanan</h2>

                <div class="summary-row">
                    <span>Produk</span>
                    <span>{{ count($cart) }} item</span>
                </div>

                <div class="summary-row">
                    <span>Pengiriman</span>
                    <span>Gratis</span>
                </div>

                <div class="summary-total">
                    <span>Total</span>
                    <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>

                <a href="{{ route('checkout.index') }}" class="btn btn-checkout">
                    Lanjut ke Checkout →
                </a>

                <a href="{{ route('public.products.index') }}" class="btn btn-continue">
                    ← Lanjut Belanja
                </a>

                <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Kosongkan seluruh keranjang?')">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-clear">🗑 Kosongkan Keranjang</button>
                </form>

            </div>

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

function ubahJumlah(button, perubahan)
{
    const form = button.closest('form');
    const input = form.querySelector('input[name="quantity"]');

    let jumlah = parseInt(input.value) || 1;
    jumlah += perubahan;

    if (jumlah < 1) {
        jumlah = 1;
    }

    input.value = jumlah;
    form.submit();
}

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