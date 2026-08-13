<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kontak - Jersey Store</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
            background: #f7f8fa;
            color: #171717;
            -webkit-font-smoothing: antialiased;
        }

        a {
            font-family: inherit;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            position: sticky;
            top: 0;
            z-index: 100;

            display: flex;
            align-items: center;
            justify-content: space-between;

            height: 74px;
            padding: 0 5%;

            background: rgba(17,24,39,.96);
            backdrop-filter: blur(6px);

            transition: box-shadow .25s ease, background .25s ease;
        }

        .navbar.scrolled {
            background: #111827;
            box-shadow: 0 6px 18px rgba(0,0,0,.15);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 11px;
            color: white;
            font-size: 18px;
            font-weight: 800;
            letter-spacing: .3px;
        }

        .logo-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: #1f2937;
            border: 1px solid rgba(255,255,255,.08);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 34px;
        }

        .nav-links a {
            position: relative;
            color: rgba(255,255,255,.75);
            text-decoration: none;
            font-size: 14.5px;
            font-weight: 600;
            padding: 6px 0;
            transition: color .2s ease;
        }

        .nav-links a:hover {
            color: white;
        }

        .nav-links a.active {
            color: white;
        }

        .nav-links a.active::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: -4px;
            height: 2px;
            border-radius: 2px;
            background: #facc15;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 16px;
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
            background: white;
            border-radius: 2px;
        }

        .mobile-menu {
            display: none;
            flex-direction: column;
            background: #111827;
            padding: 10px 5% 18px;
        }

        .mobile-menu.open {
            display: flex;
        }

        .mobile-menu a {
            color: rgba(255,255,255,.8);
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255,255,255,.06);
        }

        .mobile-menu a.active {
            color: #facc15;
        }

        /* ================= HERO ================= */

        .hero {
            position: relative;
            overflow: hidden;

            background: linear-gradient(135deg, #111827, #1f2937);
            color: white;
            text-align: center;
            padding: 70px 20px 78px;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 260px;
            height: 260px;
            right: -90px;
            top: -110px;
            border-radius: 50%;
            background: rgba(250,204,21,.06);
        }

        .hero-badge {
            position: relative;
            z-index: 2;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.14);
            padding: 8px 16px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .5px;
            margin-bottom: 20px;
        }

        .hero h1 {
            position: relative;
            z-index: 2;
            font-size: 40px;
            font-weight: 800;
            letter-spacing: -.5px;
            margin-bottom: 14px;
        }

        .hero p {
            position: relative;
            z-index: 2;
            max-width: 600px;
            margin: 0 auto;
            color: rgba(255,255,255,.72);
            font-size: 15.5px;
            line-height: 1.75;
        }

        /* ================= CONTAINER ================= */

        .container {
            width: 90%;
            max-width: 1140px;
            margin: 0 auto;
            padding: 56px 0 80px;
        }

        .section-heading {
            margin-bottom: 24px;
        }

        .section-heading h2 {
            font-size: 21px;
            font-weight: 800;
            color: #111827;
            margin-bottom: 4px;
        }

        .section-heading p {
            color: #6b7280;
            font-size: 13.5px;
        }

        /* ================= STORE INFO ================= */

        .info-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 56px;
        }

        .info-card {
            background: white;
            border: 1px solid #eef0f3;
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
            background: #f4f5f7;
            color: #111827;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-bottom: 14px;
        }

        .info-card h3 {
            font-size: 14.5px;
            font-weight: 750;
            color: #111827;
            margin-bottom: 6px;
        }

        .info-card p {
            color: #6b7280;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 12px;
        }

        .info-value {
            font-size: 13px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 12px;
        }

        .info-note {
            font-size: 11px;
            color: #b0b7c3;
            font-style: italic;
            margin-bottom: 12px;
        }

        .mini-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 12.5px;
            font-weight: 700;
            text-decoration: none;
            transition: transform .2s ease, opacity .2s ease;
        }

        .mini-btn:hover {
            transform: translateY(-1px);
        }

        .mini-btn.whatsapp {
            background: #16a34a;
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
            background: white;
            border: 1px solid #eef0f3;
            border-radius: 18px;
            padding: 30px;
        }

        .card h2 {
            font-size: 20px;
            font-weight: 800;
            color: #111827;
            margin-bottom: 8px;
        }

        .card-description {
            color: #6b7280;
            font-size: 13.5px;
            line-height: 1.65;
            margin-bottom: 24px;
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
            border: 1px solid #e2e5ea;
            border-radius: 10px;
            font-size: 14px;
            font-family: inherit;
            outline: none;
            background: #fafbfc;
            transition: border-color .2s ease, background .2s ease, box-shadow .2s ease;
        }

        input:focus,
        textarea:focus {
            border-color: #111827;
            background: white;
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
            border-radius: 10px;
            font-size: 14.5px;
            font-weight: 700;
            cursor: pointer;
            font-family: inherit;
            transition: background .2s ease, transform .2s ease;
        }

        .btn-submit:hover {
            background: #1f2937;
            transform: translateY(-1px);
        }

        .form-status {
            margin-top: 14px;
            padding: 12px 14px;
            border-radius: 10px;
            background: #fef9c3;
            border: 1px solid #fde68a;
            color: #78350f;
            font-size: 12.5px;
            line-height: 1.6;
            display: none;
        }

        .form-status.show {
            display: block;
        }

        /* ================= MAP ================= */

        .map-placeholder {
            height: 100%;
            min-height: 300px;
            border-radius: 14px;
            background:
                repeating-linear-gradient(
                    45deg,
                    #f4f5f7,
                    #f4f5f7 10px,
                    #eef0f3 10px,
                    #eef0f3 20px
                );
            border: 1px dashed #d1d5db;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #9ca3af;
            font-size: 13.5px;
            font-weight: 600;
            padding: 20px;
        }

        /* ================= WHY SECTION ================= */

        .why-section {
            margin-top: 60px;
        }

        .why-title {
            text-align: center;
            margin-bottom: 26px;
        }

        .why-title h2 {
            font-size: 24px;
            font-weight: 800;
            color: #111827;
            margin-bottom: 8px;
        }

        .why-title p {
            color: #6b7280;
            font-size: 14px;
        }

        .why-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .why-card {
            background: white;
            padding: 26px 20px;
            border-radius: 16px;
            border: 1px solid #eef0f3;
            text-align: center;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .why-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 28px rgba(15,23,42,.07);
        }

        .why-icon {
            font-size: 30px;
            margin-bottom: 12px;
        }

        .why-card h3 {
            font-size: 15px;
            font-weight: 750;
            color: #111827;
            margin-bottom: 8px;
        }

        .why-card p {
            color: #6b7280;
            font-size: 13px;
            line-height: 1.6;
        }

        /* ================= FOOTER ================= */

        footer {
            background: #111827;
            color: white;
            padding: 46px 5% 24px;
        }

        .footer-grid {
            max-width: 1140px;
            margin: auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 40px;
        }

        .footer-brand h2 {
            font-size: 18px;
            margin-bottom: 12px;
        }

        .footer-brand p {
            color: #9ca3af;
            line-height: 1.7;
            max-width: 380px;
            font-size: 13.5px;
        }

        footer h3 {
            font-size: 14px;
            margin-bottom: 14px;
        }

        footer a {
            display: block;
            color: #9ca3af;
            text-decoration: none;
            margin-bottom: 10px;
            font-size: 13.5px;
        }

        footer a:hover {
            color: white;
        }

        .copyright {
            max-width: 1140px;
            margin: 32px auto 0;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,.08);
            text-align: center;
            color: #9ca3af;
            font-size: 12.5px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1000px) {
            .info-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .main-grid {
                grid-template-columns: 1fr;
            }

            .map-placeholder {
                min-height: 220px;
            }
        }

        @media (max-width: 800px) {

            .nav-links {
                display: none;
            }

            .hamburger {
                display: flex;
            }

            .hero h1 {
                font-size: 30px;
            }

            .why-grid {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 28px;
            }
        }

        @media (max-width: 560px) {
            .info-grid {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 22px;
            }
        }
    </style>
</head>

<body>

<!-- ================= NAVBAR ================= -->

<header class="navbar" id="navbar">

    <div class="logo">
        <div class="logo-icon">⚽</div>
        <span>Jersey Store</span>
    </div>

    <nav class="nav-links">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/produk') }}">Produk</a>
        <a href="{{ url('/artikel') }}">Artikel</a>
        <a href="{{ url('/kontak') }}" class="active">Kontak</a>
    </nav>

    <div class="nav-right">
        <button class="hamburger" id="hamburgerBtn" aria-label="Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

</header>

<div class="mobile-menu" id="mobileMenu">
    <a href="{{ url('/') }}">Home</a>
    <a href="{{ url('/produk') }}">Produk</a>
    <a href="{{ url('/artikel') }}">Artikel</a>
    <a href="{{ url('/kontak') }}" class="active">Kontak</a>
</div>


<!-- ================= HERO ================= -->

<section class="hero">

    <div class="hero-badge">⚽ HUBUNGI KAMI</div>

    <h1>Hubungi Jersey Store</h1>

    <p>
        Punya pertanyaan tentang produk, ukuran, pemesanan, atau ingin
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
            <a href="mailto:email@tokojersey.com" class="mini-btn email">
                ✉️ Kirim Email
            </a>
        </div>

        {{-- ALAMAT --}}
        {{--
            TODO: ganti teks "Alamat Toko" di bawah dengan alamat asli toko
            jika sudah tersedia di project.
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
                Senin - Sabtu: 09.00 - 21.00<br>
                Minggu: 10.00 - 18.00
            </div>
        </div>

    </div>


    <!-- ================= FORM + LOKASI ================= -->

    <div class="main-grid">

        {{-- FORM KIRIM PESAN --}}
        <div class="card">

            <h2>Kirim Pesan</h2>

            <p class="card-description">
                Isi formulir di bawah ini dan sampaikan pertanyaan atau
                kebutuhan kamu kepada kami.
            </p>

            {{--
                PENTING (backend belum tersedia):
                Form ini baru berupa TAMPILAN. Belum ada route/controller
                untuk memproses pengiriman pesan, jadi form belum benar-benar
                mengirim data ke mana pun.

                Untuk mengaktifkannya nanti, dibutuhkan:
                1. Route POST baru, misal: Route::post('/kontak', [ContactController::class, 'store']);
                2. Controller untuk menyimpan/mengirim pesan (database atau email).
                3. Ganti action="#" di bawah dengan route tersebut.

                Sesuai instruksi, saya tidak membuat route/controller baru di sini.
            --}}

            <form action="#" method="POST" id="contactForm" onsubmit="handleContactForm(event)">

                @csrf

                <div class="form-row">

                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" placeholder="Masukkan nama kamu" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="contoh@email.com" required>
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group">
                        <label for="whatsapp">Nomor WhatsApp</label>
                        <input type="text" id="whatsapp" name="whatsapp" placeholder="08xxxxxxxxxx">
                    </div>

                    <div class="form-group">
                        <label for="subject">Subjek</label>
                        <input type="text" id="subject" name="subject" placeholder="Contoh: Pertanyaan Produk" required>
                    </div>

                </div>

                <div class="form-group">
                    <label for="message">Pesan</label>
                    <textarea id="message" name="message" placeholder="Tuliskan pesan kamu..." required></textarea>
                </div>

                <button type="submit" class="btn-submit">Kirim Pesan</button>

                <div class="form-status" id="formStatus"></div>

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
                Google Maps akan ditampilkan di sini
            </div>

        </div>

    </div>


    <!-- ================= KEUNGGULAN ================= -->

    <section class="why-section">

        <div class="why-title">
            <h2>Kenapa Menghubungi Kami?</h2>
            <p>Kami berusaha memberikan pelayanan terbaik untuk pelanggan.</p>
        </div>

        <div class="why-grid">

            <div class="why-card">
                <div class="why-icon">⚡</div>
                <h3>Respon Cepat</h3>
                <p>Kami akan berusaha menjawab pertanyaan pelanggan secepat mungkin.</p>
            </div>

            <div class="why-card">
                <div class="why-icon">🛍️</div>
                <h3>Produk Berkualitas</h3>
                <p>Koleksi jersey dipilih dengan memperhatikan kualitas dan kenyamanan.</p>
            </div>

            <div class="why-card">
                <div class="why-icon">🤝</div>
                <h3>Pelayanan Terbaik</h3>
                <p>Kami siap membantu pelanggan mendapatkan produk yang sesuai kebutuhan.</p>
            </div>

        </div>

    </section>

</div>


<!-- ================= FOOTER ================= -->

<footer>

    <div class="footer-grid">

        <div class="footer-brand">
            <h2>⚽ Jersey Store</h2>
            <p>Jersey pilihan untuk pecinta sepak bola.</p>
        </div>

        <div>
            <h3>Navigasi</h3>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/produk') }}">Produk</a>
            <a href="{{ url('/artikel') }}">Artikel</a>
            <a href="{{ url('/kontak') }}">Kontak</a>
        </div>

        <div>
            <h3>Informasi</h3>
            <a href="{{ url('/produk') }}">Koleksi Jersey</a>
            <a href="{{ url('/artikel') }}">Artikel Terbaru</a>
            <a href="{{ url('/kontak') }}">Hubungi Kami</a>
        </div>

    </div>

    <div class="copyright">
        © {{ date('Y') }} Jersey Store. All rights reserved.
    </div>

</footer>


<script>

    // Navbar shadow saat discroll
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', function () {
        if (window.scrollY > 10) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Hamburger menu (mobile)
    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    hamburgerBtn.addEventListener('click', function () {
        mobileMenu.classList.toggle('open');
    });

    // Form kirim pesan
    // Backend/route pengiriman pesan belum tersedia, jadi form ini
    // TIDAK berpura-pura berhasil mengirim. Ini hanya tampilan sementara.
    function handleContactForm(event) {
        event.preventDefault();

        const status = document.getElementById('formStatus');
        status.textContent =
            'Form ini masih berupa tampilan — backend pengiriman pesan belum tersedia. ' +
            'Untuk saat ini, silakan hubungi kami langsung melalui WhatsApp atau Email di atas.';
        status.classList.add('show');
    }

</script>

</body>
</html>