<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jersey Store - Temukan Jersey Favoritmu</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --carbon:       #101114;
            --carbon-soft:  #1B1D22;
            --accent:       #0FA968;
            --accent-dark:  #0C8A56;
            --accent-soft:  #E7F7EF;
            --ink:          #111827;
            --gray-600:     #6B7280;
            --gray-300:     #E5E7EB;
            --gray-100:     #F5F6F8;
            --paper:        #FFFFFF;
            --transition:   220ms cubic-bezier(0.4, 0, 0.2, 1);
            --navbar-h:     72px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
            background: var(--paper);
            color: var(--ink);
            padding-top: var(--navbar-h);
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            max-width: 100%;
            display: block;
        }

        h1, h2, h3 {
            font-family: 'Space Grotesk', sans-serif;
        }

        /* ================= REVEAL ANIMATION ================= */

        .reveal {
            opacity: 0;
            transform: translateY(18px);
            transition: opacity 600ms ease, transform 600ms ease;
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (prefers-reduced-motion: reduce) {
            .reveal {
                opacity: 1;
                transform: none;
                transition: none;
            }
        }

        /* ================= NAVBAR ================= */

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            height: var(--navbar-h);

            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
            gap: 20px;

            padding: 0 6%;

            background: rgba(16, 17, 20, 0.92);
            backdrop-filter: blur(10px);
            transition: background var(--transition), box-shadow var(--transition), height var(--transition);
        }

        .navbar.is-scrolled {
            background: var(--carbon);
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.18);
        }

        .navbar__logo {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #FFFFFF;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.05rem;
            font-weight: 700;
            letter-spacing: 0.02em;
            justify-self: start;
        }

        .navbar__logo-mark {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 9px;
            background: var(--accent-soft);
            color: var(--accent-dark);
            font-size: 0.95rem;
        }

        .navbar__menu {
            display: flex;
            align-items: center;
            gap: 32px;
            justify-self: center;
        }

        .navbar__menu a {
            position: relative;
            color: rgba(255, 255, 255, 0.78);
            font-size: 0.88rem;
            font-weight: 500;
            padding: 6px 0;
            transition: color var(--transition);
        }

        .navbar__menu a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width var(--transition);
        }

        .navbar__menu a:hover {
            color: #FFFFFF;
        }

        .navbar__menu a:hover::after {
            width: 100%;
        }

        .navbar__actions {
            justify-self: end;
        }

        .navbar__toggle {
            display: none;
            justify-self: end;
            background: none;
            border: none;
            color: #FFFFFF;
            font-size: 1.25rem;
            cursor: pointer;
            padding: 6px;
        }

        /* Mobile nav */
        @media (max-width: 860px) {
            .navbar {
                grid-template-columns: 1fr auto;
            }

            .navbar__menu {
                position: fixed;
                top: var(--navbar-h);
                left: 0;
                right: 0;
                flex-direction: column;
                align-items: flex-start;
                gap: 4px;
                background: var(--carbon);
                padding: 12px 6% 20px;
                border-top: 1px solid rgba(255, 255, 255, 0.08);
                transform: translateY(-12px);
                opacity: 0;
                pointer-events: none;
                transition: opacity var(--transition), transform var(--transition);
            }

            .navbar__menu.is-open {
                transform: translateY(0);
                opacity: 1;
                pointer-events: auto;
            }

            .navbar__menu a {
                width: 100%;
                padding: 12px 0;
                border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            }

            .navbar__actions {
                display: none;
            }

            .navbar__toggle {
                display: inline-flex;
            }
        }

        /* ================= HERO ================= */

        .hero {
            background: var(--carbon);
            color: #FFFFFF;
            padding: 72px 6% 80px;
        }

        .hero__inner {
            max-width: 1180px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            align-items: center;
            gap: 56px;
        }

        .hero__badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 14px;
            border-radius: 50px;
            background: rgba(15, 169, 104, 0.16);
            border: 1px solid rgba(15, 169, 104, 0.35);
            color: var(--accent);
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            margin-bottom: 24px;
        }

        .hero h1 {
            font-size: 3rem;
            line-height: 1.14;
            font-weight: 700;
            letter-spacing: -0.01em;
            margin-bottom: 20px;
        }

        .hero h1 span {
            color: var(--accent);
        }

        .hero p {
            max-width: 480px;
            color: rgba(255, 255, 255, 0.66);
            font-size: 1rem;
            line-height: 1.75;
            margin-bottom: 32px;
        }

        .hero__buttons {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn-primary,
        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 24px;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 700;
            transition: background var(--transition), transform var(--transition), border-color var(--transition), color var(--transition);
        }

        .btn-primary {
            background: var(--accent);
            color: #06251B;
        }

        .btn-primary:hover {
            background: var(--accent-dark);
            transform: translateY(-2px);
        }

        .btn-outline {
            border: 1.5px solid rgba(255, 255, 255, 0.22);
            color: #FFFFFF;
        }

        .btn-outline:hover {
            border-color: #FFFFFF;
            transform: translateY(-2px);
        }

        .hero__visual {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero__visual-frame {
            position: relative;
            width: 100%;
            max-width: 400px;
            aspect-ratio: 1 / 1;
            border-radius: 24px;
            background: var(--carbon-soft);
            border: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .hero__visual-frame img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 28px;
        }

        .hero__visual-fallback {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.35);
        }

        .hero__visual-fallback i {
            font-size: 4.5rem;
        }

        .hero__visual-ring {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 460px;
            height: 460px;
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
            pointer-events: none;
        }

        /* ================= SECTION HEADING ================= */

        .section {
            padding: 84px 6%;
        }

        .section--muted {
            background: var(--gray-100);
        }

        .section-heading {
            max-width: 640px;
            margin: 0 auto 44px;
            text-align: center;
        }

        .section-heading span {
            display: inline-block;
            color: var(--accent-dark);
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .section-heading h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 12px;
            color: var(--ink);
        }

        .section-heading p {
            color: var(--gray-600);
            font-size: 0.95rem;
            line-height: 1.7;
        }

        /* ================= PRODUCTS ================= */

        .products-grid {
            max-width: 1180px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .product-card {
            background: var(--paper);
            border: 1px solid var(--gray-300);
            border-radius: 16px;
            overflow: hidden;
            transition: border-color var(--transition), box-shadow var(--transition), transform var(--transition);
        }

        .product-card:hover {
            transform: translateY(-4px);
            border-color: rgba(15, 169, 104, 0.35);
            box-shadow: 0 16px 32px -12px rgba(17, 24, 39, 0.16);
        }

        .product-card__image {
            width: 100%;
            height: 260px;
            background: var(--gray-100);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-card__image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 10px;
            transition: transform 400ms ease;
        }

        .product-card:hover .product-card__image img {
            transform: scale(1.05);
        }

        .product-card__image i {
            font-size: 2.75rem;
            color: #A3A8B0;
        }

        .product-card__body {
            padding: 20px;
        }

        .product-card__title {
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--ink);
        }

        .product-card__description {
            color: var(--gray-600);
            font-size: 0.82rem;
            line-height: 1.6;
            margin-bottom: 16px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-card__bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 14px;
            border-top: 1px solid var(--gray-100);
        }

        .product-card__price {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--ink);
        }

        .detail-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--carbon);
            color: #FFFFFF;
            padding: 9px 14px;
            border-radius: 8px;
            font-size: 0.78rem;
            font-weight: 700;
            transition: background var(--transition);
        }

        .detail-btn:hover {
            background: var(--accent-dark);
        }

        .empty-products {
            grid-column: 1 / -1;
            text-align: center;
            color: var(--gray-600);
            padding: 60px 20px;
            background: var(--gray-100);
            border-radius: 16px;
        }

        .empty-products h3 {
            color: var(--ink);
            margin-bottom: 8px;
            font-size: 1.1rem;
        }

        /* ================= PROMO ================= */

        .promo {
            max-width: 1180px;
            margin: 0 auto;
            padding: 56px 56px;
            border-radius: 20px;
            background: var(--carbon);
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            position: relative;
            overflow: hidden;
        }

        .promo::before {
            content: '';
            position: absolute;
            top: 50%;
            right: -140px;
            width: 380px;
            height: 380px;
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .promo__text {
            position: relative;
            z-index: 1;
            max-width: 560px;
        }

        .promo__badge {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 50px;
            background: rgba(15, 169, 104, 0.16);
            border: 1px solid rgba(15, 169, 104, 0.35);
            color: var(--accent);
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .promo__text h2 {
            font-size: 2rem;
            line-height: 1.25;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .promo__text p {
            color: rgba(255, 255, 255, 0.66);
            line-height: 1.7;
            font-size: 0.94rem;
            margin-bottom: 24px;
        }

        .promo__icon {
            position: relative;
            z-index: 1;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .promo__icon i {
            font-size: 2.75rem;
            color: var(--accent);
        }

        /* ================= FEATURES ================= */

        .features-grid {
            max-width: 1180px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .feature-card {
            background: var(--paper);
            padding: 28px 22px;
            border-radius: 16px;
            border: 1px solid var(--gray-300);
            transition: transform var(--transition), border-color var(--transition), box-shadow var(--transition);
        }

        .feature-card:hover {
            transform: translateY(-4px);
            border-color: rgba(15, 169, 104, 0.35);
            box-shadow: 0 16px 32px -12px rgba(17, 24, 39, 0.12);
        }

        .feature-card__icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: var(--accent-soft);
            color: var(--accent-dark);
            font-size: 1.15rem;
            margin-bottom: 18px;
        }

        .feature-card h3 {
            font-size: 1.02rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--ink);
        }

        .feature-card p {
            color: var(--gray-600);
            font-size: 0.85rem;
            line-height: 1.6;
        }

        /* ================= ARTICLES ================= */

        .articles-grid {
            max-width: 1180px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
        }

        .article-card {
            background: var(--paper);
            border: 1px solid var(--gray-300);
            border-radius: 16px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform var(--transition), border-color var(--transition), box-shadow var(--transition);
        }

        .article-card:hover {
            transform: translateY(-4px);
            border-color: rgba(15, 169, 104, 0.35);
            box-shadow: 0 16px 32px -12px rgba(17, 24, 39, 0.16);
        }

        .article-card__image {
            height: 200px;
            background: var(--gray-100);
            overflow: hidden;
        }

        .article-card__image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 400ms ease;
        }

        .article-card:hover .article-card__image img {
            transform: scale(1.05);
        }

        .article-card__body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .article-card__meta {
            display: flex;
            align-items: center;
            gap: 6px;
            color: var(--gray-600);
            font-size: 0.78rem;
            margin-bottom: 10px;
        }

        .article-card__meta i {
            color: var(--accent);
            font-size: 0.72rem;
        }

        .article-card__title {
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--ink);
        }

        .article-card__excerpt {
            color: #4B5160;
            font-size: 0.85rem;
            line-height: 1.6;
            margin-bottom: 18px;
            flex: 1;
        }

        .article-read {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: var(--accent-dark);
            font-size: 0.82rem;
            font-weight: 700;
            margin-top: auto;
            transition: gap var(--transition), color var(--transition);
        }

        .article-read:hover {
            color: var(--accent);
        }

        .article-read i {
            font-size: 0.72rem;
            transition: transform var(--transition);
        }

        .article-read:hover i {
            transform: translateX(3px);
        }

        /* ================= TESTIMONIALS ================= */

        .testimonial-grid {
            max-width: 1180px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .testimonial-card {
            background: var(--paper);
            padding: 28px;
            border-radius: 16px;
            border: 1px solid var(--gray-300);
        }

        .testimonial-card__stars {
            color: #F5A623;
            font-size: 0.85rem;
            letter-spacing: 3px;
            margin-bottom: 16px;
        }

        .testimonial-card__text {
            color: #4B5160;
            line-height: 1.7;
            font-size: 0.92rem;
            min-height: 80px;
        }

        .testimonial-card__customer {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 22px;
            padding-top: 18px;
            border-top: 1px solid var(--gray-100);
        }

        .testimonial-card__avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--carbon);
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.85rem;
            flex-shrink: 0;
        }

        .testimonial-card__customer strong {
            display: block;
            font-size: 0.88rem;
            color: var(--ink);
        }

        .testimonial-card__customer span {
            display: block;
            color: var(--gray-600);
            font-size: 0.76rem;
            margin-top: 2px;
        }

        /* ================= CONTACT CTA ================= */

        .contact-box {
            max-width: 1180px;
            margin: 0 auto;
            background: var(--paper);
            border: 1px solid var(--gray-300);
            padding: 56px 30px;
            border-radius: 20px;
            text-align: center;
        }

        .contact-box h2 {
            font-size: 1.7rem;
            font-weight: 700;
            margin-bottom: 12px;
            color: var(--ink);
        }

        .contact-box p {
            color: var(--gray-600);
            line-height: 1.7;
            margin-bottom: 26px;
        }

        /* ================= FOOTER ================= */

        footer {
            background: var(--carbon);
            color: #FFFFFF;
            padding: 52px 6% 24px;
        }

        .footer-content {
            max-width: 1180px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 40px;
            padding-bottom: 36px;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .footer-brand i {
            color: var(--accent);
        }

        .footer-column p {
            color: rgba(255, 255, 255, 0.55);
            line-height: 1.7;
            max-width: 380px;
            font-size: 0.88rem;
        }

        .footer-column h4 {
            font-size: 0.92rem;
            margin-bottom: 16px;
            font-weight: 700;
        }

        .footer-column a {
            display: block;
            color: rgba(255, 255, 255, 0.55);
            margin-bottom: 10px;
            font-size: 0.85rem;
            transition: color var(--transition);
        }

        .footer-column a:hover {
            color: #FFFFFF;
        }

        .footer-bottom {
            max-width: 1180px;
            margin: 0 auto;
            padding-top: 22px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.8rem;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1024px) {
            .hero__inner {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero p {
                max-width: 100%;
                margin-left: auto;
                margin-right: auto;
            }

            .hero__buttons {
                justify-content: center;
            }

            .hero__visual {
                order: -1;
            }

            .hero__visual-frame {
                max-width: 320px;
            }

            .products-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 700px) {
            .hero {
                padding: 52px 6% 60px;
            }

            .hero h1 {
                font-size: 2.15rem;
            }

            .hero p {
                font-size: 0.92rem;
            }

            .section {
                padding: 56px 6%;
            }

            .products-grid,
            .features-grid,
            .testimonial-grid {
                grid-template-columns: 1fr;
            }

            .promo {
                flex-direction: column;
                text-align: center;
                padding: 40px 26px;
            }

            .promo__text {
                max-width: 100%;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<!-- =====================================================
     NAVBAR
===================================================== -->
<nav class="navbar" id="navbar">

    <a href="{{ url('/') }}" class="navbar__logo">
        <span class="navbar__logo-mark">
            <i class="fa-solid fa-shirt"></i>
        </span>
        JERSEY STORE
    </a>

    <div class="navbar__menu" id="navMenu">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/produk') }}">Produk</a>
        <a href="{{ url('/artikel') }}">Artikel</a>
        <a href="{{ url('/kontak') }}">Kontak</a>
    </div>

    <div class="navbar__actions"></div>

    <button class="navbar__toggle" id="navToggle" aria-label="Buka menu" aria-expanded="false" aria-controls="navMenu">
        <i class="fa-solid fa-bars" id="navToggleIcon"></i>
    </button>

</nav>

<!-- =====================================================
     HERO
===================================================== -->
<section class="hero">
    <div class="hero__inner">

        <div class="hero__text reveal">
            <span class="hero-badge hero__badge">
                <i class="fa-solid fa-shirt"></i>
                Koleksi Jersey Terbaru
            </span>

            <h1>
                Jersey Pilihan Untuk<br>
                <span>Pecinta Sepak Bola</span>
            </h1>

            <p>
                Temukan jersey favoritmu dengan desain berkualitas dan nyaman
                digunakan. Cocok untuk latihan, pertandingan, maupun gaya
                sehari-hari.
            </p>

            <div class="hero__buttons">
                <a href="{{ url('/produk') }}" class="btn-primary">
                    <i class="fa-solid fa-shirt"></i>
                    Lihat Koleksi
                </a>
                <a href="{{ url('/produk') }}" class="btn-outline">
                    Jelajahi Produk
                </a>
            </div>
        </div>

        <div class="hero__visual reveal">
            <div class="hero__visual-ring" aria-hidden="true"></div>
            <div class="hero__visual-frame">

                @php
                    $heroProduct = $products->first();
                @endphp

                @if($heroProduct && $heroProduct->image)

                    @if(Str::startsWith($heroProduct->image, ['http://', 'https://']))
                        <img src="{{ $heroProduct->image }}" alt="{{ $heroProduct->name }}">
                    @else
                        <img src="{{ asset('storage/' . $heroProduct->image) }}" alt="{{ $heroProduct->name }}">
                    @endif

                @else
                    <div class="hero__visual-fallback">
                        <i class="fa-solid fa-shirt"></i>
                    </div>
                @endif

            </div>
        </div>

    </div>
</section>

<!-- =====================================================
     PRODUK TERBARU
===================================================== -->
<section class="section">

    <div class="section-heading reveal">
        <span>Koleksi Terbaru</span>
        <h2>Jersey Terbaru</h2>
        <p>Temukan jersey favoritmu dari koleksi terbaru Jersey Store.</p>
    </div>

    <div class="products-grid">

        @forelse($products as $product)

            <div class="product-card reveal">

                <div class="product-card__image">

                    @if($product->image)

                        @if(Str::startsWith($product->image, ['http://', 'https://']))
                            <img src="{{ $product->image }}" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        @endif

                    @else
                        <i class="fa-solid fa-shirt"></i>
                    @endif

                </div>

                <div class="product-card__body">

                    <h3 class="product-card__title">{{ $product->name }}</h3>

                    <p class="product-card__description">{{ $product->description }}</p>

                    <div class="product-card__bottom">

                        <div class="product-card__price">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>

                        <a href="{{ url('/produk/' . $product->id) }}" class="detail-btn">
                            Lihat Detail
                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="empty-products">
                <h3>Belum ada produk</h3>
                <p>Produk jersey akan segera tersedia.</p>
            </div>

        @endforelse

    </div>

</section>

<!-- =====================================================
     PROMO
===================================================== -->
<section class="section" style="padding-top: 0;">

    <div class="promo reveal">

        <div class="promo__text">
            <span class="promo__badge">Temukan Favoritmu</span>

            <h2>Lengkapi Koleksi Jerseymu Sekarang</h2>

            <p>
                Lengkapi koleksi jersey kamu dengan pilihan terbaik dari
                Jersey Store — desain berkualitas untuk setiap momen.
            </p>

            <a href="{{ url('/produk') }}" class="btn-primary">
                <i class="fa-solid fa-shirt"></i>
                Lihat Koleksi
            </a>
        </div>

        <div class="promo__icon" aria-hidden="true">
            <i class="fa-solid fa-shirt"></i>
        </div>

    </div>

</section>

<!-- =====================================================
     KEUNGGULAN
===================================================== -->
<section class="section section--muted">

    <div class="section-heading reveal">
        <span>Mengapa Kami</span>
        <h2>Kenapa Memilih Jersey Store?</h2>
        <p>Kami berusaha memberikan pengalaman terbaik untuk menemukan jersey favoritmu.</p>
    </div>

    <div class="features-grid">

        <div class="feature-card reveal">
            <div class="feature-card__icon">
                <i class="fa-solid fa-award"></i>
            </div>
            <h3>Produk Berkualitas</h3>
            <p>Jersey dengan desain menarik dan bahan yang nyaman digunakan sehari-hari.</p>
        </div>

        <div class="feature-card reveal">
            <div class="feature-card__icon">
                <i class="fa-solid fa-tags"></i>
            </div>
            <h3>Harga Bersahabat</h3>
            <p>Harga yang wajar dan sepadan dengan kualitas jersey yang kamu dapatkan.</p>
        </div>

        <div class="feature-card reveal">
            <div class="feature-card__icon">
                <i class="fa-solid fa-truck-fast"></i>
            </div>
            <h3>Pengiriman Cepat</h3>
            <p>Pesanan diproses dengan cepat agar jersey favoritmu segera sampai.</p>
        </div>

        <div class="feature-card reveal">
            <div class="feature-card__icon">
                <i class="fa-solid fa-headset"></i>
            </div>
            <h3>Pelayanan Terbaik</h3>
            <p>Tim kami siap membantu menjawab pertanyaan seputar produk yang kamu butuhkan.</p>
        </div>

    </div>

</section>

<!-- =====================================================
     ARTIKEL TERBARU (hanya tampil jika $articles dikirim)
===================================================== -->
@isset($articles)
<section class="section">

    <div class="section-heading reveal">
        <span>Baca Artikel</span>
        <h2>Artikel Terbaru</h2>
        <p>Informasi, tips, dan berita terbaru seputar jersey bola.</p>
    </div>

    <div class="articles-grid">

        @forelse($articles as $article)

            <article class="article-card reveal">

                <div class="article-card__image">

                    @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" loading="lazy">
                    @else
                        <div class="hero__visual-fallback" style="height:100%; justify-content:center;">
                            <i class="fa-solid fa-newspaper"></i>
                        </div>
                    @endif

                </div>

                <div class="article-card__body">

                    <div class="article-card__meta">
                        <i class="fa-solid fa-calendar-days"></i>
                        {{ $article->created_at->format('d M Y') }}
                    </div>

                    <h3 class="article-card__title">{{ $article->title }}</h3>

                    <p class="article-card__excerpt">
                        {{ Str::limit($article->content, 120) }}
                    </p>

                    <a href="{{ route('public.articles.show', $article) }}" class="article-read">
                        Baca Selengkapnya
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </div>

            </article>

        @empty

            <div class="empty-products">
                <h3>Belum ada artikel</h3>
                <p>Artikel akan segera tersedia.</p>
            </div>

        @endforelse

    </div>

</section>
@endisset

<!-- =====================================================
     TESTIMONI
===================================================== -->
<section class="section section--muted">

    <div class="section-heading reveal">
        <span>Testimoni Pelanggan</span>
        <h2>Apa Kata Pelanggan?</h2>
        <p>Pengalaman pelanggan setelah berbelanja di Jersey Store.</p>
    </div>

    <div class="testimonial-grid">

        <div class="testimonial-card reveal">
            <div class="testimonial-card__stars">★★★★★</div>
            <p class="testimonial-card__text">
                "Jerseynya bagus banget dan sesuai dengan foto. Bahannya juga nyaman dipakai untuk olahraga."
            </p>
            <div class="testimonial-card__customer">
                <div class="testimonial-card__avatar">A</div>
                <div>
                    <strong>Andi</strong>
                    <span>Pelanggan Jersey Store</span>
                </div>
            </div>
        </div>

        <div class="testimonial-card reveal">
            <div class="testimonial-card__stars">★★★★★</div>
            <p class="testimonial-card__text">
                "Desainnya keren dan proses pesanannya mudah. Saya cukup puas dengan produknya."
            </p>
            <div class="testimonial-card__customer">
                <div class="testimonial-card__avatar">R</div>
                <div>
                    <strong>Rizky</strong>
                    <span>Pelanggan Jersey Store</span>
                </div>
            </div>
        </div>

        <div class="testimonial-card reveal">
            <div class="testimonial-card__stars">★★★★★</div>
            <p class="testimonial-card__text">
                "Pelayanannya bagus dan jersey yang datang sesuai dengan pesanan. Bakal order lagi."
            </p>
            <div class="testimonial-card__customer">
                <div class="testimonial-card__avatar">F</div>
                <div>
                    <strong>Fajar</strong>
                    <span>Pelanggan Jersey Store</span>
                </div>
            </div>
        </div>

    </div>

</section>

<!-- =====================================================
     CONTACT CTA
===================================================== -->
<section class="section">

    <div class="contact-box reveal">
        <h2>Butuh Informasi?</h2>
        <p>Punya pertanyaan mengenai produk atau artikel? Hubungi kami melalui halaman kontak.</p>
        <a href="{{ url('/kontak') }}" class="btn-primary" style="background: var(--carbon); color: #FFFFFF;">
            Hubungi Kami
        </a>
    </div>

</section>

<!-- =====================================================
     FOOTER
===================================================== -->
<footer>

    <div class="footer-content">

        <div class="footer-column">
            <div class="footer-brand">
                <i class="fa-solid fa-shirt"></i>
                Jersey Store
            </div>
            <p>Toko jersey untuk kamu yang ingin tampil dengan gaya sendiri.</p>
        </div>

        <div class="footer-column">
            <h4>Navigasi</h4>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/produk') }}">Produk</a>
            <a href="{{ url('/artikel') }}">Artikel</a>
            <a href="{{ url('/kontak') }}">Kontak</a>
        </div>

        <div class="footer-column">
            <h4>Informasi</h4>
            <a href="{{ url('/produk') }}">Koleksi Jersey</a>
            <a href="{{ url('/artikel') }}">Artikel Terbaru</a>
            <a href="{{ url('/kontak') }}">Hubungi Kami</a>
        </div>

    </div>

    <div class="footer-bottom">
        &copy; {{ date('Y') }} Jersey Store. All Rights Reserved.
    </div>

</footer>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        // Sticky navbar solid state on scroll
        var navbar = document.getElementById('navbar');

        function updateNavbar() {
            if (window.scrollY > 12) {
                navbar.classList.add('is-scrolled');
            } else {
                navbar.classList.remove('is-scrolled');
            }
        }

        updateNavbar();
        window.addEventListener('scroll', updateNavbar, { passive: true });

        // Mobile hamburger menu
        var toggle = document.getElementById('navToggle');
        var toggleIcon = document.getElementById('navToggleIcon');
        var menu = document.getElementById('navMenu');

        if (toggle && menu) {
            toggle.addEventListener('click', function () {
                var isOpen = menu.classList.toggle('is-open');
                toggle.setAttribute('aria-expanded', String(isOpen));
                toggleIcon.classList.toggle('fa-bars', !isOpen);
                toggleIcon.classList.toggle('fa-xmark', isOpen);
            });

            menu.querySelectorAll('a').forEach(function (link) {
                link.addEventListener('click', function () {
                    menu.classList.remove('is-open');
                    toggle.setAttribute('aria-expanded', 'false');
                    toggleIcon.classList.add('fa-bars');
                    toggleIcon.classList.remove('fa-xmark');
                });
            });
        }

        // Fade-in reveal on scroll
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

            revealEls.forEach(function (el) {
                observer.observe(el);
            });
        } else {
            revealEls.forEach(function (el) {
                el.classList.add('is-visible');
            });
        }
    });
</script>

</body>
</html>