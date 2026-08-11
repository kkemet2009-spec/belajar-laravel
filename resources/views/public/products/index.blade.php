<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Katalog Jersey - Jersey Store</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            color: #171717;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            height: 80px;
            background: #111;
            color: white;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 5%;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;

            font-size: 27px;
            font-weight: 800;
        }

        .logo-icon {
            width: 40px;
            height: 40px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            background: linear-gradient(135deg, #2563eb, #7c3aed);

            font-size: 20px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-menu a {
            color: #fff;
            font-size: 16px;

            transition: 0.3s;
        }

        .nav-menu a:hover {
            color: #60a5fa;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            background:
                radial-gradient(circle at 20% 20%, rgba(37, 99, 235, .15), transparent 30%),
                radial-gradient(circle at 80% 70%, rgba(124, 58, 237, .15), transparent 30%),
                linear-gradient(135deg, #171717, #101010);

            color: white;

            min-height: 380px;

            display: flex;
            align-items: center;
            justify-content: center;

            text-align: center;

            padding: 70px 20px;
        }

        .hero-content {
            max-width: 850px;
        }

        .hero-badge {
            display: inline-block;

            background: #2563eb;

            padding: 10px 20px;

            border-radius: 30px;

            font-size: 14px;
            font-weight: bold;

            margin-bottom: 25px;
        }

        .hero h1 {
            font-size: 52px;
            line-height: 1.1;

            margin-bottom: 20px;
        }

        .hero p {
            font-size: 19px;
            line-height: 1.7;

            color: #d1d5db;
        }

        /* =========================
           CONTENT
        ========================= */

        .container {
            width: 90%;
            max-width: 1250px;

            margin: 0 auto;

            padding: 60px 0 80px;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 30px;
        }

        .section-title {
            font-size: 32px;
            font-weight: 800;

            display: flex;
            align-items: center;
            gap: 12px;
        }

        .product-count {
            color: #777;
            font-size: 15px;
        }

        /* =========================
           PRODUCT GRID
        ========================= */

        .products-grid {
            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 25px;
        }

        .product-card {
            background: white;

            border-radius: 18px;

            overflow: hidden;

            box-shadow:
                0 8px 25px rgba(0, 0, 0, .07);

            transition:
                transform .3s ease,
                box-shadow .3s ease;

            position: relative;
        }

        .product-card:hover {
            transform: translateY(-8px);

            box-shadow:
                0 18px 40px rgba(0, 0, 0, .13);
        }

        /* =========================
           IMAGE
        ========================= */

        .product-image {
            height: 330px;

            background: #f7f7f7;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;

            position: relative;
        }

        .product-image img {
            width: 100%;
            height: 100%;

            object-fit: contain;

            padding: 20px;

            transition: transform .4s ease;
        }

        .product-card:hover .product-image img {
            transform: scale(1.06);
        }

        .no-image {
            color: #999;

            text-align: center;

            font-size: 14px;
        }

        /* =========================
           PRODUCT INFO
        ========================= */

        .product-info {
            padding: 22px;
        }

        .product-name {
            font-size: 19px;
            font-weight: 700;

            line-height: 1.4;

            margin-bottom: 10px;

            min-height: 53px;
        }

        .product-price {
            font-size: 23px;
            font-weight: 800;

            color: #111;

            margin-bottom: 12px;
        }

        .stock {
            display: inline-flex;

            align-items: center;

            padding: 7px 12px;

            border-radius: 20px;

            font-size: 13px;
            font-weight: 700;

            margin-bottom: 18px;
        }

        .stock.available {
            background: #dcfce7;
            color: #15803d;
        }

        .stock.low {
            background: #fef3c7;
            color: #b45309;
        }

        .stock.empty {
            background: #fee2e2;
            color: #dc2626;
        }

        /* =========================
           BUTTON
        ========================= */

        .detail-button {
            width: 100%;

            display: flex;

            align-items: center;
            justify-content: center;

            gap: 8px;

            padding: 13px 18px;

            background: #111;
            color: white;

            border-radius: 10px;

            font-size: 15px;
            font-weight: 700;

            transition: .3s;
        }

        .detail-button:hover {
            background: #2563eb;

            transform: translateY(-2px);
        }

        /* =========================
           EMPTY
        ========================= */

        .empty-products {
            background: white;

            border-radius: 18px;

            padding: 70px 20px;

            text-align: center;

            box-shadow:
                0 8px 25px rgba(0, 0, 0, .06);
        }

        .empty-icon {
            font-size: 60px;

            margin-bottom: 15px;
        }

        .empty-products h2 {
            margin-bottom: 10px;
        }

        .empty-products p {
            color: #777;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            background: #111;

            color: white;

            text-align: center;

            padding: 30px 20px;

            font-size: 15px;
        }

        .footer p {
            color: #bbb;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .products-grid {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }

            .hero h1 {
                font-size: 42px;
            }

            .nav-menu {
                gap: 18px;
            }
        }

        @media (max-width: 650px) {

            .navbar {
                height: auto;

                padding: 18px 5%;

                flex-direction: column;

                gap: 18px;
            }

            .logo {
                font-size: 24px;
            }

            .nav-menu {
                width: 100%;

                justify-content: center;

                flex-wrap: wrap;

                gap: 18px;
            }

            .hero {
                min-height: 320px;

                padding: 55px 20px;
            }

            .hero h1 {
                font-size: 35px;
            }

            .hero p {
                font-size: 16px;
            }

            .container {
                width: 92%;

                padding-top: 40px;
            }

            .section-header {
                align-items: flex-start;

                flex-direction: column;

                gap: 10px;
            }

            .section-title {
                font-size: 27px;
            }

            .products-grid {
                grid-template-columns: 1fr;
            }

            .product-image {
                height: 350px;
            }
        }
    </style>
</head>

<body>

    {{-- =========================
         NAVBAR
    ========================== --}}

    <nav class="navbar">

        <a href="{{ url('/') }}" class="logo">

            <span class="logo-icon">
                ⚽
            </span>

            <span>Jersey Store</span>

        </a>

        <div class="nav-menu">

            <a href="{{ url('/') }}">
                Home
            </a>

            <a href="{{ url('/produk') }}">
                Produk
            </a>

            <a href="{{ url('/articles') }}">
                Artikel
            </a>

            <a href="{{ url('/kontak') }}">
                Kontak
            </a>

        </div>

    </nav>


    {{-- =========================
         HERO
    ========================== --}}

    <section class="hero">

        <div class="hero-content">

            <div class="hero-badge">
                ⚽ KOLEKSI TERBARU
            </div>

            <h1>
                Katalog Jersey
            </h1>

            <p>
                Temukan berbagai jersey sepak bola favoritmu
                dengan desain keren dan kualitas terbaik
                hanya di Jersey Store.
            </p>

        </div>

    </section>


    {{-- =========================
         PRODUCTS
    ========================== --}}

    <main class="container">

        <div class="section-header">

            <h2 class="section-title">
                🔥 Koleksi Jersey
            </h2>

            <div class="product-count">
                {{ $products->count() }} produk tersedia
            </div>

        </div>


        @if($products->count() > 0)

            <div class="products-grid">

                @foreach($products as $product)

                    <div class="product-card">

                        {{-- FOTO PRODUK --}}

                        <div class="product-image">

                            @if($product->image)

                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                    loading="lazy"
                                >

                            @else

                                <div class="no-image">
                                    📷<br>
                                    Foto belum tersedia
                                </div>

                            @endif

                        </div>


                        {{-- INFORMASI PRODUK --}}

                        <div class="product-info">

                            <h3 class="product-name">
                                {{ $product->name }}
                            </h3>


                            <div class="product-price">

                                Rp
                                {{ number_format($product->price, 0, ',', '.') }}

                            </div>


                            {{-- STATUS STOK --}}

                            @if($product->stock <= 0)

                                <div class="stock empty">
                                    ❌ Stok habis
                                </div>

                            @elseif($product->stock <= 5)

                                <div class="stock low">
                                    ⚠️ Tersisa {{ $product->stock }}
                                </div>

                            @else

                                <div class="stock available">
                                    ✓ {{ $product->stock }} tersedia
                                </div>

                            @endif


                            {{-- DETAIL --}}

                            <a
                                href="{{ url('/produk/' . $product->id) }}"
                                class="detail-button"
                            >
                                👁 Lihat Detail
                            </a>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty-products">

                <div class="empty-icon">
                    📦
                </div>

                <h2>
                    Belum Ada Produk
                </h2>

                <p>
                    Saat ini belum ada jersey yang tersedia
                    di katalog.
                </p>

            </div>

        @endif

    </main>


    {{-- =========================
         FOOTER
    ========================== --}}

    <footer class="footer">

        <p>
            © {{ date('Y') }} Jersey Store.
            All Rights Reserved.
        </p>

    </footer>


</body>
</html>