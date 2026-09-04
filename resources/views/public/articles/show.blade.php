<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $article->title }} - Jersey Store</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

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

        /* ================= BREADCRUMB ================= */

        .breadcrumb {
            max-width: 1240px;
            margin: 24px auto 20px;
            padding: 0 32px;
            font-size: 14px;
            color: #64748B;
            white-space: nowrap;
            overflow: hidden;
        }

        .breadcrumb a {
            color: #64748B;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            color: #111827;
        }

        .breadcrumb .current {
            display: inline-block;
            max-width: 320px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            vertical-align: bottom;
        }

        /* ================= HERO (OVERLAY) ================= */

        .hero {
            max-width: 1240px;
            margin: 0 auto 28px;
            padding: 0 32px;
        }

        .hero-frame {
            position: relative;
            border-radius: 22px;
            overflow: hidden;
            min-height: 460px;
            background: #E5E7EB;
        }

        .hero-frame img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-frame .no-image {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748B;
            font-size: 15px;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(0deg, rgba(0,0,0,.78) 0%, rgba(0,0,0,.35) 45%, rgba(0,0,0,0) 75%);
        }

        .hero-text {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 44px 48px;
            max-width: 640px;
        }

        .hero-category {
            display: inline-block;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #F4B400;
            margin-bottom: 14px;
        }

        .hero-title {
            font-size: 44px;
            line-height: 1.08;
            font-weight: 800;
            letter-spacing: -0.02em;
            color: #FFFFFF;
            text-transform: uppercase;
            margin: 0 0 4px;
        }

        .hero-rule {
            width: 46px;
            height: 4px;
            background: #F4B400;
            border-radius: 2px;
            margin: 16px 0;
        }

        .hero-subtitle {
            font-size: 15px;
            line-height: 1.6;
            color: rgba(255,255,255,.82);
            max-width: 480px;
        }

        /* ================= META ROW ================= */

        .meta-row {
            max-width: 1240px;
            margin: 0 auto 44px;
            padding: 0 32px;
            display: flex;
            flex-wrap: wrap;
            gap: 28px;
            font-size: 13.5px;
            color: #64748B;
        }

        .meta-row .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* ================= CONTENT LAYOUT ================= */

        .content-layout {
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 32px;
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 64px;
            align-items: start;
        }

        .article-main {
            max-width: 760px;
        }

        .intro-block {
            display: grid;
            grid-template-columns: 1fr 260px;
            gap: 32px;
            align-items: start;
            margin-bottom: 8px;
        }

        .intro-text p {
            font-size: 17px;
            line-height: 1.8;
            color: #111827;
            margin: 0 0 20px;
        }

        .intro-text p strong {
            font-weight: 700;
        }

        .intro-image {
            border-radius: 16px;
            overflow: hidden;
            background: #E5E7EB;
        }

        .intro-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            aspect-ratio: 3 / 4;
        }

        .body-block {
            font-size: 17px;
            line-height: 1.8;
            color: #111827;
            margin: 0 0 20px;
        }

        .body-heading {
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -0.01em;
            color: #111827;
            margin: 40px 0 6px;
        }

        .body-heading-rule {
            width: 40px;
            height: 3px;
            background: #F4B400;
            border-radius: 2px;
            margin: 0 0 20px;
        }

        /* ================= FEATURE GRID ================= */

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin: 34px 0;
            padding: 26px;
            background: #F8FAFC;
            border-radius: 16px;
        }

        .feature-item .feature-icon {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .feature-item h4 {
            font-size: 13.5px;
            font-weight: 700;
            color: #111827;
            margin: 0 0 6px;
        }

        .feature-item p {
            font-size: 12.5px;
            color: #64748B;
            line-height: 1.5;
            margin: 0;
        }

        /* ================= PULL QUOTE ================= */

        .pull-quote {
            position: relative;
            overflow: hidden;
            margin: 40px 0;
            padding: 34px 36px;
            border-radius: 16px;
            background: #FEF6DC;
        }

        .pull-quote .quote-mark {
            position: absolute;
            top: -6px;
            right: 18px;
            font-size: 90px;
            font-weight: 800;
            color: rgba(244,180,0,.28);
            line-height: 1;
        }

        .pull-quote h4 {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: .6px;
            text-transform: uppercase;
            color: #92400E;
            margin: 0 0 12px;
        }

        .pull-quote p {
            position: relative;
            z-index: 1;
            font-size: 17px;
            line-height: 1.7;
            color: #111827;
            max-width: 520px;
            margin: 0;
        }

        /* ================= SIDEBAR ================= */

        .sidebar-title {
            font-size: 15px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 20px;
        }

        .sidebar-list {
            display: flex;
            flex-direction: column;
        }

        .sidebar-item {
            display: flex;
            gap: 12px;
            padding: 14px 0;
            border-bottom: 1px solid #E5E7EB;
            text-decoration: none;
            color: inherit;
        }

        .sidebar-item:first-child {
            padding-top: 0;
        }

        .sidebar-item:last-child {
            border-bottom: none;
        }

        .sidebar-thumb {
            width: 64px;
            height: 64px;
            border-radius: 10px;
            overflow: hidden;
            background: #E5E7EB;
            flex-shrink: 0;
        }

        .sidebar-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .sidebar-info h4 {
            margin: 0 0 6px;
            font-size: 14px;
            font-weight: 600;
            line-height: 1.4;
            color: #111827;
        }

        .sidebar-info span {
            font-size: 12.5px;
            color: #64748B;
        }

        /* ================= RELATED ================= */

        .related-section {
            max-width: 1240px;
            margin: 72px auto 0;
            padding: 0 32px;
        }

        .related-heading {
            font-size: 22px;
            font-weight: 700;
            color: #111827;
            margin: 0 0 24px;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .related-card {
            display: block;
            text-decoration: none;
            color: inherit;
            border: 1px solid #E5E7EB;
            border-radius: 14px;
            overflow: hidden;
            transition: transform .2s ease;
        }

        .related-card:hover {
            transform: translateY(-2px);
        }

        .related-thumb {
            height: 160px;
            background: #E5E7EB;
            overflow: hidden;
        }

        .related-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .related-body {
            padding: 16px;
        }

        .related-body h3 {
            margin: 0 0 8px;
            font-size: 15px;
            font-weight: 600;
            line-height: 1.4;
            color: #111827;
        }

        .related-date {
            font-size: 12.5px;
            color: #64748B;
            margin-bottom: 10px;
        }

        .related-link {
            font-size: 13px;
            font-weight: 600;
            color: #111827;
        }

        /* ================= CTA ================= */

        .cta-section {
            max-width: 1240px;
            margin: 72px auto 0;
            padding: 0 32px;
            text-align: center;
        }

        .cta-section h3 {
            font-size: 24px;
            font-weight: 700;
            color: #111827;
            margin: 0 0 10px;
        }

        .cta-section p {
            max-width: 480px;
            margin: 0 auto 24px;
            font-size: 14px;
            line-height: 1.7;
            color: #64748B;
        }

        .btn-cta {
            display: inline-block;
            padding: 13px 24px;
            border-radius: 8px;
            background: #F4B400;
            color: #111827;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
        }

        /* ================= FOOTER ================= */

        footer {
            margin-top: 90px;
            border-top: 1px solid #E5E7EB;
            padding: 48px 32px 24px;
        }

        .footer-grid {
            max-width: 1240px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.6fr 1fr 1.2fr;
            gap: 36px;
        }

        .footer-brand h2 {
            font-size: 17px;
            margin: 0 0 10px;
            color: #111827;
        }

        .footer-brand p {
            font-size: 14px;
            color: #64748B;
            max-width: 320px;
            margin: 0;
        }

        footer h3 {
            font-size: 14px;
            font-weight: 700;
            color: #111827;
            margin: 0 0 14px;
        }

        footer a.footer-link {
            display: block;
            color: #64748B;
            text-decoration: none;
            margin-bottom: 10px;
            font-size: 14px;
        }

        footer a.footer-link:hover {
            color: #111827;
        }

        .footer-info-item {
            font-size: 14px;
            color: #64748B;
            margin-bottom: 10px;
            line-height: 1.6;
        }

        .footer-info-item strong {
            display: block;
            color: #111827;
            font-size: 13px;
            margin-bottom: 2px;
        }

        .copyright {
            max-width: 1240px;
            margin: 32px auto 0;
            padding-top: 20px;
            border-top: 1px solid #E5E7EB;
            text-align: center;
            font-size: 13px;
            color: #64748B;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1024px) {

            .hero-title {
                font-size: 34px;
            }

            .intro-block {
                grid-template-columns: 1fr;
            }

            .intro-image {
                order: -1;
            }

            .intro-image img {
                aspect-ratio: 16 / 9;
            }

            .content-layout {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .feature-grid {
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

            .hero-frame {
                min-height: 360px;
            }

            .hero-text {
                padding: 28px 24px;
            }

            .related-grid {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 26px;
            }
        }

        @media (max-width: 640px) {

            .hero-title {
                font-size: 27px;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .hero,
            .meta-row,
            .content-layout,
            .related-section,
            .cta-section {
                padding-left: 20px;
                padding-right: 20px;
            }

            .navbar-inner,
            .breadcrumb,
            footer {
                padding-left: 20px;
                padding-right: 20px;
            }
        }
    </style>
</head>

<body>

@php
    // ---------------------------------------------------------
    // Bantuan tampilan murni dari Blade, tidak mengubah database.
    // ---------------------------------------------------------

    $rawContent = trim($article->content ?? '');

    // Pecah isi artikel per paragraf (baris kosong sebagai pemisah).
    $blocks = collect(preg_split('/\n\s*\n/', $rawContent))
        ->map(fn($b) => trim($b))
        ->filter(fn($b) => $b !== '')
        ->values();

    // Subjudul hero: kalimat pertama dari paragraf pertama.
    $firstBlock = $blocks->first() ?? '';
    $heroSubtitle = \Illuminate\Support\Str::limit(
        \Illuminate\Support\Str::before($firstBlock, '.'),
        140
    );

    // 2 paragraf pertama tampil sejajar dengan foto (intro),
    // sisanya tampil di bawah sebagai isi artikel penuh.
    $introBlocks = $blocks->take(2);
    $remainingBlocks = $blocks->slice(2)->values();

    // Kutipan besar (pull-quote): ambil salah satu paragraf isi
    // (bukan teks karangan), diprioritaskan paragraf ke-3 atau ke-4.
    $quoteSource = $blocks->get(2) ?? $blocks->get(1) ?? $firstBlock;
    $pullQuote = \Illuminate\Support\Str::limit($quoteSource, 220);

    $wordCount = str_word_count(strip_tags($rawContent));
    $readingMinutes = max(1, (int) ceil($wordCount / 200));

    // Heuristik heading: paragraf pendek (<= 65 karakter) yang
    // seluruhnya huruf kapital dianggap subjudul editorial.
    $isHeading = function (string $text): bool {
        return strlen($text) <= 65 && $text === mb_strtoupper($text, 'UTF-8');
    };
@endphp

<!-- ================= NAVBAR ================= -->
{{--
    Navbar disamakan persis dengan Home: logo gambar (bukan emoji),
    tidak ada tombol Login (hanya Dashboard jika sudah login).
--}}

<header class="navbar" id="navbar">
    <div class="navbar-inner">

        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Jersey Store" class="logo-icon">
            Jersey Store
        </a>

        <nav class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('public.products.index') }}">Produk</a>
            <a href="{{ route('public.articles.index') }}" class="active">Artikel</a>
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
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('public.products.index') }}">Produk</a>
    <a href="{{ route('public.articles.index') }}" class="active">Artikel</a>
    <a href="{{ route('contact') }}">Kontak</a>
</div>


<!-- ================= BREADCRUMB ================= -->

<div class="breadcrumb">
    <a href="{{ route('home') }}">Home</a>
    /
    <a href="{{ route('public.articles.index') }}">Artikel</a>
    /
    <span class="current">{{ $article->title }}</span>
</div>


<!-- ================= HERO (OVERLAY) ================= -->

<div class="hero">
    <div class="hero-frame">

        @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
        @else
            <div class="no-image">Gambar belum tersedia</div>
        @endif

        <div class="hero-overlay"></div>

        <div class="hero-text">
            <span class="hero-category">Football • Lifestyle</span>
            <h1 class="hero-title">{{ $article->title }}</h1>
            <div class="hero-rule"></div>

            @if($heroSubtitle)
                <p class="hero-subtitle">{{ $heroSubtitle }}.</p>
            @endif
        </div>

    </div>
</div>


<!-- ================= META ROW ================= -->

<div class="meta-row">
    <div class="meta-item">📅 {{ $article->created_at->format('d M Y') }}</div>
    <div class="meta-item">👤 Jersey Store</div>
    <div class="meta-item">🏷️ Fashion, Lifestyle</div>
    <div class="meta-item">⏱ {{ $readingMinutes }} menit baca</div>
</div>


<!-- ================= CONTENT + SIDEBAR ================= -->

<div class="content-layout">

    <div class="article-main">

        {{-- Intro: 2 paragraf pertama sejajar dengan foto artikel --}}
        <div class="intro-block">

            <div class="intro-text">
                @forelse($introBlocks as $block)
                    <p>{{ $block }}</p>
                @empty
                    <p>Artikel ini belum memiliki isi.</p>
                @endforelse
            </div>

            <div class="intro-image">
                @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                @endif
            </div>

        </div>

        {{-- Sisa isi artikel, dengan deteksi subjudul otomatis --}}
        @foreach($remainingBlocks as $index => $block)

            @if($isHeading($block))

                <h2 class="body-heading">{{ $block }}</h2>
                <div class="body-heading-rule"></div>

            @else

                <p class="body-block">{{ $block }}</p>

            @endif

            {{-- Sisipkan grid fitur setelah blok pertama isi tambahan --}}
            @if($index === 0)

                <div class="feature-grid">

                    <div class="feature-item">
                        <div class="feature-icon">👕</div>
                        <h4>Desain Ikonik</h4>
                        <p>Detail klasik dengan sentuhan modern yang selalu relevan.</p>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">🛡️</div>
                        <h4>Kualitas Premium</h4>
                        <p>Bahan nyaman, teknologi modern, dan tahan lama.</p>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">⭐</div>
                        <h4>Tampilan Fleksibel</h4>
                        <p>Cocok untuk matchday atau gaya sehari-hari yang stylish.</p>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">❤️</div>
                        <h4>Identitas & Kebanggaan</h4>
                        <p>Lebih dari sekadar pakaian, ini tentang rasa memiliki.</p>
                    </div>

                </div>

            @endif

        @endforeach

        {{-- Kutipan besar, diambil dari isi artikel sendiri --}}
        @if($pullQuote)
            <div class="pull-quote">
                <span class="quote-mark">&ldquo;</span>
                <h4>Sorotan Artikel</h4>
                <p>{{ $pullQuote }}</p>
            </div>
        @endif

    </div>

    @if(isset($relatedArticles) && $relatedArticles->count() > 0)

        <aside>

            <div class="sidebar-title">Artikel Terbaru</div>

            <div class="sidebar-list">

                @foreach($relatedArticles->take(4) as $item)

                    <a href="{{ route('public.articles.show', $item) }}" class="sidebar-item">

                        <div class="sidebar-thumb">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                            @endif
                        </div>

                        <div class="sidebar-info">
                            <h4>{{ $item->title }}</h4>
                            <span>{{ $item->created_at->format('d M Y') }}</span>
                        </div>

                    </a>

                @endforeach

            </div>

        </aside>

    @endif

</div>


<!-- ================= ARTIKEL TERKAIT ================= -->

@if(isset($relatedArticles) && $relatedArticles->count() > 0)

    <section class="related-section">

        <h2 class="related-heading">Artikel Terkait</h2>

        <div class="related-grid">

            @foreach($relatedArticles->take(3) as $related)

                <a href="{{ route('public.articles.show', $related) }}" class="related-card">

                    <div class="related-thumb">
                        @if($related->image)
                            <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}">
                        @endif
                    </div>

                    <div class="related-body">
                        <h3>{{ $related->title }}</h3>
                        <div class="related-date">{{ $related->created_at->format('d M Y') }}</div>
                        <div class="related-link">Baca Artikel →</div>
                    </div>

                </a>

            @endforeach

        </div>

    </section>

@endif


<!-- ================= CTA ================= -->

<div class="cta-section">
    <h3>Temukan Jersey Favoritmu</h3>
    <p>Lengkapi koleksi dan gaya harianmu dengan jersey pilihan dari Jersey Store.</p>
    <a href="{{ route('public.products.index') }}" class="btn-cta">Lihat Koleksi Jersey</a>
</div>


<!-- ================= FOOTER ================= -->

<footer>

    <div class="footer-grid">

        <div class="footer-brand">
            <h2>Jersey Store</h2>
            <p>Jersey pilihan untuk football enthusiast.</p>
        </div>

        <div>
            <h3>Navigasi</h3>
            <a href="{{ route('home') }}" class="footer-link">Home</a>
            <a href="{{ route('public.products.index') }}" class="footer-link">Produk</a>
            <a href="{{ route('public.articles.index') }}" class="footer-link">Artikel</a>
            <a href="{{ route('contact') }}" class="footer-link">Kontak</a>
        </div>

        <div>
            <h3>Informasi</h3>

            {{-- TODO: ganti dengan nomor WhatsApp toko yang asli --}}
            <div class="footer-info-item">
                <strong>WhatsApp</strong>
                Nomor WhatsApp Toko
            </div>

            {{-- TODO: ganti dengan email toko yang asli --}}
            <div class="footer-info-item">
                <strong>Email</strong>
                Email Toko
            </div>

            <div class="footer-info-item">
                <strong>Jam Operasional</strong>
                Senin - Sabtu: 09.00 - 21.00<br>
                Minggu: 10.00 - 18.00
            </div>
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
</script>

</body>
</html>