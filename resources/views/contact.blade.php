<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kontak - Jersey Store</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

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

        /* ================= HERO ================= */

        .hero {
            background: #111827;
            color: #FFFFFF;
            text-align: center;
            padding: 64px 32px 56px;
        }

        .hero-badge {
            display: inline-block;
            margin-bottom: 16px;
            padding: 7px 15px;
            border-radius: 999px;
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.16);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .5px;
            color: #F4B400;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 38px;
            font-weight: 700;
            margin: 0 0 14px;
        }

        .hero p {
            max-width: 560px;
            margin: 0 auto;
            color: rgba(255,255,255,.7);
            font-size: 14.5px;
            line-height: 1.75;
        }

        /* ================= CONTAINER ================= */

        .container {
            max-width: 1240px;
            margin: 0 auto;
            padding: 56px 32px 90px;
        }

        .section-heading {
            margin-bottom: 24px;
        }

        .section-heading h2 {
            font-size: 20px;
            font-weight: 700;
            color: #111827;
            margin: 0 0 4px;
        }

        .section-heading p {
            font-size: 13.5px;
            color: #6B7280;
            margin: 0;
        }

        /* ================= INFO CARDS ================= */

        .info-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 56px;
        }

        .info-card {
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 16px;
            padding: 22px 20px;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .info-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 28px rgba(15,23,42,.07);
        }

        .info-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: #F8FAFC;
            color: #111827;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-bottom: 14px;
        }

        .info-card h3 {
            font-size: 14.5px;
            font-weight: 700;
            color: #111827;
            margin: 0 0 6px;
        }

        .info-card p {
            color: #6B7280;
            font-size: 13px;
            line-height: 1.6;
            margin: 0 0 14px;
        }

        .info-value {
            font-size: 13px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 12px;
        }

        .info-note {
            font-size: 11px;
            color: #B0B7C3;
            font-style: italic;
            margin-bottom: 12px;
        }

        .mini-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 15px;
            border-radius: 999px;
            font-size: 12.5px;
            font-weight: 700;
            text-decoration: none;
            transition: transform .2s ease, opacity .2s ease;
        }

        .mini-btn:hover {
            transform: translateY(-1px);
        }

        .mini-btn.whatsapp {
            background: #16A34A;
            color: white;
        }

        .mini-btn.email {
            background: #111827;
            color: white;
        }

        /* ================= MAIN GRID (FORM + MAP) ================= */

        .main-grid {
            display: grid;
            grid-template-columns: 1.05fr 1fr;
            gap: 26px;
        }

        .card {
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 18px;
            padding: 30px;
        }

        .card h2 {
            font-size: 20px;
            font-weight: 700;
            color: #111827;
            margin: 0 0 8px;
        }

        .card-description {
            color: #6B7280;
            font-size: 13.5px;
            line-height: 1.65;
            margin: 0 0 24px;
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

        .alert-error ul {
            margin: 6px 0 0;
            padding-left: 18px;
        }

        /* ================= FORM ================= */

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #374151;
            margin-bottom: 7px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #E2E5EA;
            border-radius: 10px;
            font-size: 14px;
            font-family: inherit;
            outline: none;
            background: #FAFBFC;
            transition: border-color .2s ease, background .2s ease, box-shadow .2s ease;
        }

        input:focus,
        textarea:focus {
            border-color: #111827;
            background: #FFFFFF;
            box-shadow: 0 0 0 3px rgba(17,24,39,.06);
        }

        textarea {
            min-height: 130px;
            resize: vertical;
        }

        .btn-submit {
            width: 100%;
            border: none;
            background: #111827;
            color: white;
            padding: 14px;
            border-radius: 999px;
            font-size: 14.5px;
            font-weight: 700;
            cursor: pointer;
            font-family: inherit;
            transition: background .2s ease, transform .2s ease;
        }

        .btn-submit:hover {
            background: #F4B400;
            color: #111827;
            transform: translateY(-1px);
        }

        /* ================= MAP ================= */

        .map-placeholder {
            height: 100%;
            min-height: 300px;
            border-radius: 14px;
            background:
                repeating-linear-gradient(
                    45deg,
                    #F4F5F7,
                    #F4F5F7 10px,
                    #EEF0F3 10px,
                    #EEF0F3 20px
                );
            border: 1px dashed #D1D5DB;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #9CA3AF;
            font-size: 13.5px;
            font-weight: 600;
            padding: 20px;
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
            .info-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .main-grid {
                grid-template-columns: 1fr;
            }

            .map-placeholder {
                min-height: 220px;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 800px) {
            .hero h1 {
                font-size: 29px;
            }
        }

        @media (max-width: 600px) {
            .container,
            .hero {
                padding-left: 20px;
                padding-right: 20px;
            }

            .navbar-inner,
            footer {
                padding-left: 20px;
                padding-right: 20px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 22px;
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
            <a href="{{ route('contact') }}" class="active">Kontak</a>
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
    <a href="{{ route('public.products.index') }}">Produk</a>
    <a href="{{ route('public.articles.index') }}">Artikel</a>
    <a href="{{ route('contact') }}" class="active">Kontak</a>
</div>


<!-- ================= HERO ================= -->

<section class="hero">
    <span class="hero-badge">Hubungi Kami</span>
    <h1>Hubungi Jersey Store</h1>
    <p>
        Punya pertanyaan tentang produk, ukuran, pesanan, atau ingin
        mengetahui informasi lainnya? Kami siap membantu.
    </p>
</section>


<div class="container">

    <!-- ================= INFORMASI TOKO ================= -->

    <div class="section-heading">
        <h2>Informasi Toko</h2>
        <p>Beberapa cara untuk menghubungi kami</p>
    </div>

    <div class="info-grid">

        {{-- WHATSAPP --}}
        {{--
            TODO: ganti "Nomor WhatsApp Toko" dan link wa.me di bawah
            dengan nomor WhatsApp asli toko, format: https://wa.me/62XXXXXXXXXXX
        --}}
        <div class="info-card">
            <div class="info-icon">📱</div>
            <h3>WhatsApp</h3>
            <p>Hubungi kami melalui WhatsApp untuk respon yang lebih cepat.</p>
            <div class="info-value">Nomor WhatsApp Toko</div>
            <a href="https://wa.me/62XXXXXXXXXXX" target="_blank" rel="noopener" class="mini-btn whatsapp">
                💬 Chat WhatsApp
            </a>
        </div>

        {{-- EMAIL --}}
        {{--
            TODO: ganti "Email Toko" dan alamat mailto di bawah
            dengan email asli toko.
        --}}
        <div class="info-card">
            <div class="info-icon">📧</div>
            <h3>Email</h3>
            <p>Gunakan email untuk pertanyaan atau kebutuhan lainnya.</p>
            <div class="info-value">Email Toko</div>
            <a href="mailto:email@jerseystore.com" class="mini-btn email">
                ✉️ Kirim Email
            </a>
        </div>

        {{-- ALAMAT --}}
        {{--
            TODO: ganti teks "Alamat Toko" di bawah dengan alamat asli toko
            jika sudah tersedia.
        --}}
        <div class="info-card">
            <div class="info-icon">📍</div>
            <h3>Alamat</h3>
            <p>Kunjungi toko kami secara langsung.</p>
            <div class="info-value">Alamat Toko</div>
            <div class="info-note">Alamat akan ditampilkan di sini</div>
        </div>

        {{-- JAM OPERASIONAL --}}
        <div class="info-card">
            <div class="info-icon">🕐</div>
            <h3>Jam Operasional</h3>
            <p>Waktu kami siap melayani kamu.</p>
            <div class="info-value">
                Senin - Sabtu<br>
                09.00 - 21.00
            </div>
        </div>

    </div>


    <!-- ================= FORM + LOKASI ================= -->

    <div class="main-grid">

        {{-- FORM HUBUNGI KAMI --}}
        <div class="card">

            <h2>Hubungi Kami</h2>

            <p class="card-description">
                Isi formulir di bawah ini dan sampaikan pertanyaan atau
                kebutuhan kamu kepada kami.
            </p>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    Periksa kembali data yang kamu isi:
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST">

                @csrf

                <div class="form-row">

                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama kamu" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="contoh@email.com" required>
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group">
                        <label for="phone">Nomor WhatsApp</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="08xxxxxxxxxx" required>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subjek</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" placeholder="Contoh: Pertanyaan Produk" required>
                    </div>

                </div>

                <div class="form-group">
                    <label for="message">Pesan</label>
                    <textarea id="message" name="message" placeholder="Tuliskan pesan kamu...">{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="btn-submit">Kirim Pesan</button>

            </form>

        </div>

        {{-- LOKASI TOKO --}}
        <div class="card">

            <h2>Lokasi Toko</h2>

            <p class="card-description">
                Kunjungi kami langsung di lokasi toko.
            </p>

            {{--
                TODO: Jika alamat dan koordinat toko sudah tersedia,
                ganti div.map-placeholder di bawah dengan embed Google Maps, contoh:

                <iframe
                    src="https://www.google.com/maps/embed?pb=..."
                    width="100%" height="100%" style="border:0; border-radius:14px;"
                    allowfullscreen loading="lazy">
                </iframe>
            --}}
            <div class="map-placeholder">
                <iframe 
                src="https://www.google.com/maps/embed?pb=!1m16!1m11!1m3!1d3!2d110.09091190046358!3d-7.537351261185795!2m2!1f0!2f90!3m2!1i1024!2i768!4f75!3m3!1m2!1s0x2e7a910a20ddffb9%3A0xfe61144fa3ee6700!2sJembatan%20Lingseng!4v1788147855252" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin">
                </iframe>
            </div>

        </div>

    </div>

</div>


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