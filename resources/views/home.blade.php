<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jersey Store - Wear The Game, Live The Culture</title>

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
            color: #111827;
            -webkit-font-smoothing: antialiased;
        }

        img {
            max-width: 100%;
            display: block;
        }

        a {
            font-family: inherit;
        }

        /* ================= REVEAL ================= */

        .reveal {
            opacity: 0;
            transform: translateY(16px);
            transition: opacity .5s ease, transform .5s ease;
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (prefers-reduced-motion: reduce) {
            .reveal { opacity: 1; transform: none; transition: none; }
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
            border-radius: 8px;
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
            color: #F4B400;
            font-weight: 700;
        }

        /* ================= HERO ================= */

        .hero {
            background: #F1F1EF;
            color: #171717;
        }

        .hero-inner {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            min-height: 560px;
        }

        .hero-text {
            padding: 40px 5% 40px 6%;
        }

        .hero-label {
            display: block;
            font-size: 15px;
            font-weight: 500;
            color: #4B5563;
            margin-bottom: 14px;
        }

        .hero h1 {
            font-family: 'Playfair Display', 'Inter', serif;
            font-size: 64px;
            line-height: 1.05;
            font-weight: 700;
            letter-spacing: -.01em;
            color: #171717;
            margin: 0 0 22px;
        }

        .hero p {
            max-width: 400px;
            color: #4B5563;
            font-size: 15.5px;
            line-height: 1.7;
            margin: 0 0 32px;
        }

        .hero-buttons {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn-primary,
        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 15px 30px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: .3px;
            text-transform: uppercase;
            text-decoration: none;
            transition: transform .2s ease, background .2s ease, border-color .2s ease;
        }

        .btn-primary {
            background: #171717;
            color: #FFFFFF;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            background: #F4B400;
            color: #171717;
        }

        .btn-outline {
            border: 1.5px solid #D1D5DB;
            color: #171717;
        }

        .btn-outline:hover {
            border-color: #171717;
            transform: translateY(-2px);
        }

        .hero-visual {
            position: relative;
            height: 100%;
            min-height: 460px;
            overflow: hidden;
        }

        .hero-visual img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top center;
        }

        .hero-visual-fallback {
            width: 100%;
            height: 100%;
            min-height: 460px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #E5E7EB;
            color: #9CA3AF;
            font-size: 14px;
            text-align: center;
        }

        /* ================= SECTION HEADING ================= */

        .section {
            padding: 84px 32px;
        }

        .section--muted {
            background: #F8FAFC;
        }

        .section-heading {
            max-width: 620px;
            margin: 0 auto 44px;
            text-align: center;
        }

        .section-heading span {
            display: inline-block;
            color: #92400E;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .section-heading h2 {
            font-size: 30px;
            font-weight: 800;
            letter-spacing: -.01em;
            margin: 0 0 12px;
            color: #111827;
        }

        .section-heading p {
            color: #64748B;
            font-size: 14.5px;
            line-height: 1.7;
            margin: 0;
        }

        /* ================= PRODUCTS ================= */

        .products-grid {
            max-width: 1240px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
        }

        .product-card {
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 12px;
            overflow: hidden;
            transition: border-color .2s ease, transform .2s ease;
        }

        .product-card:hover {
            transform: translateY(-3px);
            border-color: #D1D5DB;
        }

        .product-card-image {
            width: 100%;
            height: 220px;
            background: #F8FAFC;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-card-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 10px;
            transition: transform .35s ease;
        }

        .product-card:hover .product-card-image img {
            transform: scale(1.04);
        }

        .product-card-image .no-image {
            font-size: 12.5px;
            color: #9CA3AF;
        }

        .product-card-body {
            padding: 18px;
        }

        .product-card-title {
            font-size: 14.5px;
            font-weight: 700;
            margin: 0 0 10px;
            color: #111827;
        }

        .product-card-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 12px;
            border-top: 1px solid #F1F5F9;
        }

        .product-card-price {
            font-size: 15px;
            font-weight: 800;
            color: #111827;
        }

        .view-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #111827;
            color: #FFFFFF;
            text-decoration: none;
            padding: 8px 13px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 700;
        }

        .empty-box {
            grid-column: 1 / -1;
            text-align: center;
            color: #64748B;
            padding: 56px 20px;
            background: #F8FAFC;
            border-radius: 14px;
        }

        .empty-box h3 {
            color: #111827;
            margin: 0 0 8px;
            font-size: 16px;
        }

        .empty-box p {
            margin: 0;
            font-size: 13.5px;
        }

        /* ================= SHOP BY CLUB (BANNER) ================= */

        .club-banner {
            max-width: 1240px;
            margin: 0 auto;
            border-radius: 20px;
            background: #111827;
            padding: 56px 48px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 32px;
            flex-wrap: wrap;
        }

        .club-banner-text span {
            display: inline-block;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: #F4B400;
            margin-bottom: 12px;
        }

        .club-banner-text h2 {
            font-size: 26px;
            font-weight: 800;
            color: #FFFFFF;
            margin: 0 0 8px;
        }

        .club-banner-text p {
            color: rgba(255,255,255,.65);
            font-size: 14px;
            max-width: 440px;
            margin: 0;
        }

        .club-banner .btn-primary {
            flex-shrink: 0;
        }

        /* ================= WHY JERSEY STORE ================= */

        .why-grid {
            max-width: 1240px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 32px;
        }

        .why-item {
            border-top: 2px solid #E5E7EB;
            padding-top: 20px;
        }

        .why-number {
            font-size: 13px;
            font-weight: 700;
            color: #F4B400;
            margin-bottom: 12px;
        }

        .why-item h3 {
            font-size: 16px;
            font-weight: 700;
            color: #111827;
            margin: 0 0 8px;
        }

        .why-item p {
            font-size: 13.5px;
            color: #64748B;
            line-height: 1.6;
            margin: 0;
        }

        /* ================= ARTICLES ================= */

        .articles-grid {
            max-width: 1240px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .article-card {
            display: flex;
            flex-direction: column;
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 14px;
            overflow: hidden;
            transition: transform .2s ease, border-color .2s ease;
        }

        .article-card:hover {
            transform: translateY(-4px);
            border-color: #D1D5DB;
        }

        .article-card-image {
            height: 180px;
            background: #F8FAFC;
            overflow: hidden;
        }

        .article-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .35s ease;
        }

        .article-card:hover .article-card-image img {
            transform: scale(1.05);
        }

        .article-card-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .article-card-meta {
            font-size: 12px;
            color: #9CA3AF;
            margin-bottom: 10px;
        }

        .article-card-title {
            font-size: 15.5px;
            font-weight: 700;
            color: #111827;
            margin: 0 0 10px;
            line-height: 1.4;
        }

        .article-card-excerpt {
            font-size: 13px;
            color: #64748B;
            line-height: 1.6;
            margin: 0 0 16px;
            flex: 1;
        }

        .article-read {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #111827;
            text-decoration: none;
            font-size: 12.5px;
            font-weight: 700;
        }

        /* ================= BRAND STATEMENT ================= */

        .statement {
            max-width: 780px;
            margin: 0 auto;
            text-align: center;
        }

        .statement h2 {
            font-size: 34px;
            line-height: 1.2;
            font-weight: 800;
            letter-spacing: -.01em;
            color: #111827;
            margin: 0 0 20px;
        }

        .statement p {
            font-size: 15.5px;
            line-height: 1.8;
            color: #64748B;
            margin: 0;
        }

        /* ================= CTA ================= */

        .cta-section {
            max-width: 1240px;
            margin: 0 auto;
            text-align: center;
        }

        .cta-section h2 {
            font-size: 28px;
            font-weight: 800;
            color: #111827;
            margin: 0 0 10px;
        }

        .cta-section p {
            color: #64748B;
            font-size: 14.5px;
            margin: 0 0 26px;
        }

        .btn-cta {
            display: inline-block;
            padding: 14px 26px;
            border-radius: 10px;
            background: #F4B400;
            color: #111827;
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 800;
        }

        /* ================= FOOTER ================= */

        footer {
            background: #111827;
            color: #FFFFFF;
            padding: 48px 32px 24px;
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

            .hero-inner {
                grid-template-columns: 1fr;
                min-height: 0;
            }

            .hero-visual {
                order: -1;
                min-height: 340px;
            }

            .hero-visual-fallback {
                min-height: 340px;
            }

            .hero h1 {
                font-size: 46px;
            }

            .products-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .why-grid {
                grid-template-columns: repeat(2, 1fr);
                row-gap: 26px;
            }

            .articles-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
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

        @media (max-width: 640px) {

            .hero-text {
                padding: 36px 20px;
            }

            .hero h1 {
                font-size: 36px;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: stretch;
            }

            .hero-buttons a {
                justify-content: center;
            }

            .section {
                padding: 56px 20px;
            }

            .products-grid,
            .why-grid,
            .articles-grid {
                grid-template-columns: 1fr;
            }

            .club-banner {
                flex-direction: column;
                text-align: center;
                padding: 40px 26px;
            }

            .statement h2 {
                font-size: 26px;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 26px;
            }

            .navbar-inner,
            footer {
                padding-left: 20px;
                padding-right: 20px;
            }
        }
    </style>
</head>

<body>

@php
    $heroProduct = $products->first();
@endphp

<!-- ================= NAVBAR ================= -->

<header class="navbar" id="navbar">
    <div class="navbar-inner">

        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Jersey Store" class="logo-icon">
            Jersey Store
        </a>

        <nav class="nav-links">
            <a href="{{ route('home') }}" class="active">Home</a>
            <a href="{{ route('public.products.index') }}">Produk</a>
            <a href="{{ route('public.articles.index') }}">Artikel</a>
            <a href="{{ route('contact') }}">Kontak</a>
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
    <a href="{{ route('home') }}" class="active">Home</a>
    <a href="{{ route('public.products.index') }}">Produk</a>
    <a href="{{ route('public.articles.index') }}">Artikel</a>
    <a href="{{ route('contact') }}">Kontak</a>
</div>


<!-- ================= HERO ================= -->

<section class="hero">
    <div class="hero-inner">

        <div class="hero-text reveal">
            <span class="hero-label">Koleksi Jersey 2026</span>

            <h1>New<br>Season.</h1>

            <p>
                Jersey pilihan untuk pertandingan, koleksi, dan gaya
                sehari-hari — dari Jersey Store.
            </p>

            <div class="hero-buttons">
                <a href="{{ route('public.products.index') }}" class="btn-primary">Shop Now</a>
                <a href="{{ route('public.articles.index') }}" class="btn-outline">Explore Articles</a>
            </div>
        </div>

        <div class="hero-visual reveal">

            @if($heroProduct && $heroProduct->image)
                <img src="{{ asset('storage/' . $heroProduct->image) }}" alt="{{ $heroProduct->name }}">
            @else
                <div class="hero-visual-fallback">Gambar produk<br>belum tersedia</div>
            @endif

        </div>

    </div>
</section>


<!-- ================= FEATURED COLLECTION ================= -->

<section class="section">

    <div class="section-heading reveal">
        <span>Featured Collection</span>
        <h2>Koleksi Pilihan</h2>
        <p>Jersey pilihan untuk setiap cerita di dalam dan di luar lapangan.</p>
    </div>

    <div class="products-grid">

        @forelse($products as $product)

            <div class="product-card reveal">

                <div class="product-card-image">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    @else
                        <span class="no-image">Tidak ada gambar</span>
                    @endif
                </div>

                <div class="product-card-body">

                    <h3 class="product-card-title">{{ $product->name }}</h3>

                    <div class="product-card-bottom">
                        <div class="product-card-price">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>

                        <a href="{{ route('public.products.show', $product) }}" class="view-btn">
                            View Product
                        </a>
                    </div>

                </div>

            </div>

        @empty

            <div class="empty-box">
                <h3>Belum ada produk</h3>
                <p>Produk jersey akan segera tersedia.</p>
            </div>

        @endforelse

    </div>

</section>


<!-- ================= SHOP BY CLUB ================= -->

<section class="section" style="padding-top: 0;">

    <div class="club-banner reveal">

        <div class="club-banner-text">
            <span>Shop By Club</span>
            <h2>Temukan Jersey Klub Favoritmu</h2>
            <p>Jelajahi seluruh koleksi jersey dari berbagai klub yang tersedia di Jersey Store.</p>
        </div>

        <a href="{{ route('public.products.index') }}" class="btn-primary">Explore Collection</a>

    </div>

</section>


<!-- ================= WHY JERSEY STORE ================= -->

<section class="section section--muted">

    <div class="section-heading reveal">
        <span>Mengapa Kami</span>
        <h2>Why Jersey Store?</h2>
        <p>Alasan kenapa Jersey Store menjadi pilihan tepat untuk kebutuhan jerseymu.</p>
    </div>

    <div class="why-grid">

        <div class="why-item reveal">
            <div class="why-number">01</div>
            <h3>Curated Collection</h3>
            <p>Jersey dipilih dengan memperhatikan desain dan relevansi tren terkini.</p>
        </div>

        <div class="why-item reveal">
            <div class="why-number">02</div>
            <h3>Quality First</h3>
            <p>Bahan nyaman dan tahan lama untuk pemakaian setiap hari.</p>
        </div>

        <div class="why-item reveal">
            <div class="why-number">03</div>
            <h3>Easy Shopping</h3>
            <p>Proses memilih dan menemukan jersey favoritmu jadi lebih mudah.</p>
        </div>

        <div class="why-item reveal">
            <div class="why-number">04</div>
            <h3>Football Culture</h3>
            <p>Lebih dari produk — bagian dari identitas dan budaya sepak bola.</p>
        </div>

    </div>

</section>


<!-- ================= FROM THE EDITORIAL ================= -->

@if(isset($articles) && $articles->count() > 0)

<section class="section">

    <div class="section-heading reveal">
        <span>From The Editorial</span>
        <h2>Artikel Terbaru</h2>
        <p>Cerita, tips, dan informasi seputar jersey dan budaya sepak bola.</p>
    </div>

    <div class="articles-grid">

        @foreach($articles as $article)

            <article class="article-card reveal">

                <div class="article-card-image">
                    @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" loading="lazy">
                    @endif
                </div>

                <div class="article-card-body">

                    <div class="article-card-meta">
                        {{ $article->created_at->format('d M Y') }}
                    </div>

                    <h3 class="article-card-title">{{ $article->title }}</h3>

                    <p class="article-card-excerpt">
                        {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 110) }}
                    </p>

                    <a href="{{ route('public.articles.show', $article) }}" class="article-read">
                        Read Article →
                    </a>

                </div>

            </article>

        @endforeach

    </div>

</section>

@endif


<!-- ================= BRAND STATEMENT ================= -->

<section class="section section--muted">

    <div class="statement reveal">
        <h2>More Than A Jersey.<br>It's Part Of The Game.</h2>
        <p>
            Jersey Store hadir untuk mereka yang melihat jersey bukan hanya
            sebagai pakaian, tetapi sebagai bagian dari identitas, cerita,
            dan budaya sepak bola.
        </p>
    </div>

</section>


<!-- ================= CTA ================= -->

<section class="section">

    <div class="cta-section reveal">
        <h2>Find Your Next Jersey</h2>
        <p>Temukan jersey yang paling mewakili gaya dan klub favoritmu.</p>
        <a href="{{ route('public.products.index') }}" class="btn-cta">Shop Collection</a>
    </div>

</section>


<!-- ================= FOOTER ================= -->

<footer>

    <div class="footer-grid">

        <div class="footer-brand">
            <h2>Jersey Store</h2>
            <p>Toko jersey untuk kamu yang ingin tampil dengan gaya sendiri.</p>
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
        © {{ date('Y') }} Jersey Store. All rights reserved.
    </div>

</footer>


<script>
    var hamburgerBtn = document.getElementById('hamburgerBtn');
    var mobileMenu = document.getElementById('mobileMenu');
    hamburgerBtn.addEventListener('click', function () {
        mobileMenu.classList.toggle('open');
    });

    var revealEls = document.querySelectorAll('.reveal');
    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });

        revealEls.forEach(function (el) { observer.observe(el); });
    } else {
        revealEls.forEach(function (el) { el.classList.add('is-visible'); });
    }
</script>

</body>
</html>