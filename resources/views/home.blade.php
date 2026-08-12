<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jersey Store - Home</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f6f8;
            color: #111827;
        }

        a {
            text-decoration: none;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            height: 80px;
            background: #111111;
            color: white;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 6%;

            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;

            color: white;
            font-size: 25px;
            font-weight: bold;
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
            color: white;
            font-size: 15px;
            transition: .3s;
        }

        .nav-menu a:hover {
            color: #60a5fa;
        }


        /* ================= HERO ================= */

        .hero {
            min-height: 520px;

            background:
                linear-gradient(
                    rgba(15, 15, 15, .88),
                    rgba(15, 15, 15, .96)
                );

            color: white;

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

            padding: 10px 18px;

            border-radius: 30px;

            font-size: 13px;
            font-weight: bold;

            margin-bottom: 25px;
        }

        .hero h1 {
            font-size: 60px;
            line-height: 1.1;

            margin-bottom: 25px;
        }

        .hero h1 span {
            color: #60a5fa;
        }

        .hero p {
            max-width: 700px;

            margin: auto;

            color: #d1d5db;

            font-size: 18px;
            line-height: 1.7;

            margin-bottom: 35px;
        }

        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-block;

            background: #2563eb;
            color: white;

            padding: 14px 25px;

            border-radius: 10px;

            font-weight: bold;

            transition: .3s;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-3px);
        }

        .btn-outline {
            display: inline-block;

            border: 1px solid #555;

            color: white;

            padding: 14px 25px;

            border-radius: 10px;

            font-weight: bold;

            transition: .3s;
        }

        .btn-outline:hover {
            background: white;
            color: #111;
        }


        /* ================= PRODUK ================= */

        .products-section {
            padding: 80px 6%;
        }

        .section-heading {
            max-width: 1150px;

            margin: auto;
            margin-bottom: 40px;

            text-align: center;
        }

        .section-heading span {
            color: #2563eb;

            font-size: 13px;
            font-weight: bold;
        }

        .section-heading h2 {
            font-size: 34px;

            margin: 10px 0;
        }

        .section-heading p {
            color: #6b7280;

            line-height: 1.6;
        }

        .products-grid {
            max-width: 1150px;

            margin: auto;

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 25px;
        }

        .product-card {
            background: white;

            border-radius: 18px;

            overflow: hidden;

            box-shadow:
                0 8px 25px rgba(0,0,0,.07);

            transition: .3s;
        }

        .product-card:hover {
            transform: translateY(-7px);
        }

        .product-image {
            width: 100%;
            height: 300px;

            background: #f3f4f6;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;

            object-fit: contain;

            transition: .4s;
        }

        .product-card:hover img {
            transform: scale(1.05);
        }

        .product-info {
            padding: 22px;
        }

        .product-info h3 {
            font-size: 18px;

            margin-bottom: 10px;
        }

        .product-description {
            color: #6b7280;

            font-size: 14px;

            line-height: 1.5;

            height: 42px;

            overflow: hidden;

            margin-bottom: 15px;
        }

        .product-bottom {
            display: flex;

            align-items: center;

            justify-content: space-between;
        }

        .product-price {
            font-size: 20px;

            font-weight: bold;

            color: #111;
        }

        .detail-btn {
            background: #111;

            color: white;

            padding: 9px 14px;

            border-radius: 8px;

            font-size: 13px;

            font-weight: bold;

            transition: .3s;
        }

        .detail-btn:hover {
            background: #2563eb;
        }

        .empty-products {
            text-align: center;

            color: #6b7280;

            padding: 50px;
        }


        /* ================= PROMO ================= */

        .promo-section {
            padding: 30px 6% 80px;
        }

        .promo-content {
            max-width: 1150px;

            margin: auto;

            padding: 55px 65px;

            border-radius: 25px;

            background:
                linear-gradient(
                    135deg,
                    #111111,
                    #242424
                );

            color: white;

            display: flex;

            align-items: center;

            justify-content: space-between;

            overflow: hidden;

            position: relative;
        }

        .promo-content::after {
            content: "";

            position: absolute;

            width: 300px;
            height: 300px;

            border-radius: 50%;

            background:
                rgba(255,255,255,.05);

            right: -80px;
            top: -100px;
        }

        .promo-text {
            position: relative;
            z-index: 2;
        }

        .promo-badge {
            display: inline-block;

            background: #2563eb;

            padding: 9px 16px;

            border-radius: 30px;

            font-size: 13px;

            font-weight: bold;

            margin-bottom: 18px;
        }

        .promo-text h2 {
            font-size: 40px;

            line-height: 1.2;

            margin-bottom: 15px;
        }

        .promo-text h2 span {
            color: #60a5fa;
        }

        .promo-text p {
            color: #d1d5db;

            max-width: 600px;

            line-height: 1.7;

            margin-bottom: 25px;
        }

        .promo-btn {
            display: inline-block;

            background: white;

            color: #111;

            padding: 13px 22px;

            border-radius: 10px;

            font-weight: bold;

            transition: .3s;
        }

        .promo-btn:hover {
            transform: translateY(-3px);
        }

        .promo-icon {
            font-size: 120px;

            position: relative;

            z-index: 2;
        }


        /* ================= KEUNGGULAN ================= */

        .features-section {
            padding: 80px 6%;

            background: #f8fafc;
        }

        .features-grid {
            max-width: 1150px;

            margin: auto;

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 20px;
        }

        .feature-card {
            background: white;

            padding: 30px 25px;

            border-radius: 18px;

            box-shadow:
                0 8px 25px rgba(0,0,0,.06);

            transition: .3s;
        }

        .feature-card:hover {
            transform: translateY(-7px);
        }

        .feature-icon {
            width: 55px;
            height: 55px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 14px;

            background: #eff6ff;

            font-size: 25px;

            margin-bottom: 20px;
        }

        .feature-card h3 {
            margin-bottom: 10px;

            font-size: 18px;
        }

        .feature-card p {
            color: #6b7280;

            line-height: 1.6;

            font-size: 14px;
        }


        /* ================= TESTIMONI ================= */

        .testimonial-section {
            padding: 80px 6%;
        }

        .testimonial-grid {
            max-width: 1150px;

            margin: auto;

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 25px;
        }

        .testimonial-card {
            background: white;

            padding: 30px;

            border-radius: 18px;

            box-shadow:
                0 8px 25px rgba(0,0,0,.06);

            border: 1px solid #eee;
        }

        .stars {
            color: #f59e0b;

            font-size: 20px;

            margin-bottom: 18px;

            letter-spacing: 2px;
        }

        .testimonial-text {
            color: #4b5563;

            line-height: 1.7;

            font-size: 15px;

            min-height: 80px;
        }

        .customer {
            display: flex;

            align-items: center;

            gap: 12px;

            margin-top: 25px;

            padding-top: 20px;

            border-top: 1px solid #eee;
        }

        .customer-avatar {
            width: 45px;
            height: 45px;

            border-radius: 50%;

            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #7c3aed
                );

            color: white;

            display: flex;

            align-items: center;
            justify-content: center;

            font-weight: bold;
        }

        .customer strong {
            display: block;

            font-size: 14px;
        }

        .customer span {
            display: block;

            color: #888;

            font-size: 12px;

            margin-top: 3px;
        }


        /* ================= CONTACT ================= */

        .contact-section {
            padding: 30px 6% 80px;
        }

        .contact-box {
            max-width: 1150px;

            margin: auto;

            background: white;

            padding: 60px 30px;

            border-radius: 22px;

            text-align: center;

            box-shadow:
                0 8px 25px rgba(0,0,0,.06);
        }

        .contact-box h2 {
            font-size: 32px;

            margin-bottom: 15px;
        }

        .contact-box p {
            color: #6b7280;

            line-height: 1.7;

            margin-bottom: 25px;
        }


        /* ================= FOOTER ================= */

        footer {
            background: #111111;

            color: white;

            padding: 45px 6% 25px;
        }

        .footer-content {
            max-width: 1150px;

            margin: auto;

            display: grid;

            grid-template-columns:
                2fr 1fr 1fr;

            gap: 40px;

            padding-bottom: 35px;
        }

        .footer-brand h3 {
            font-size: 22px;

            margin-bottom: 12px;
        }

        .footer-brand p {
            color: #9ca3af;

            line-height: 1.7;

            max-width: 400px;
        }

        .footer-column h4 {
            margin-bottom: 15px;
        }

        .footer-column a {
            display: block;

            color: #9ca3af;

            margin-bottom: 10px;

            font-size: 14px;
        }

        .footer-column a:hover {
            color: white;
        }

        .footer-bottom {
            max-width: 1150px;

            margin: auto;

            padding-top: 25px;

            border-top: 1px solid #333;

            text-align: center;

            color: #9ca3af;

            font-size: 14px;
        }


        /* ================= RESPONSIVE ================= */

        @media (max-width: 1000px) {

            .products-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

            .features-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

            .promo-text h2 {
                font-size: 34px;
            }

            .promo-icon {
                font-size: 90px;
            }
        }


        @media (max-width: 700px) {

            .navbar {
                height: auto;

                padding: 18px 20px;

                flex-direction: column;

                gap: 15px;
            }

            .nav-menu {
                gap: 15px;

                flex-wrap: wrap;

                justify-content: center;
            }

            .hero {
                min-height: 500px;
            }

            .hero h1 {
                font-size: 40px;
            }

            .hero p {
                font-size: 15px;
            }

            .products-grid {
                grid-template-columns: 1fr;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .testimonial-grid {
                grid-template-columns: 1fr;
            }

            .promo-content {
                padding: 40px 25px;
            }

            .promo-text h2 {
                font-size: 29px;
            }

            .promo-icon {
                display: none;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }

            .products-section,
            .features-section,
            .testimonial-section {
                padding-left: 20px;
                padding-right: 20px;
            }
        }
    </style>
</head>

<body>


<!-- =====================================================
     NAVBAR
===================================================== -->

<nav class="navbar">

    <a href="{{ url('/') }}" class="logo">

        <div class="logo-icon">
            ⚽
        </div>

        Jersey Store

    </a>


    <div class="nav-menu">

        <a href="{{ url('/') }}">
            Home
        </a>

        <a href="{{ url('/produk') }}">
            Produk
        </a>

        <a href="{{ url('/artikel') }}">
            Artikel
        </a>

        <a href="{{ url('/kontak') }}">
            Kontak
        </a>

    </div>

</nav>



<!-- =====================================================
     HERO
===================================================== -->

<section class="hero">

    <div class="hero-content">

        <span class="hero-badge">
            ⚽ KOLEKSI JERSEY TERBARU
        </span>

        <h1>
            Temukan Jersey<br>
            <span>Favoritmu</span>
        </h1>

        <p>
            Koleksi jersey sepak bola pilihan dengan
            desain keren, nyaman digunakan, dan cocok
            untuk para pecinta sepak bola.
        </p>

        <div class="hero-buttons">

            <a
                href="{{ url('/produk') }}"
                class="btn-primary"
            >
                🛒 Lihat Produk
            </a>

            <a
                href="{{ url('/artikel') }}"
                class="btn-outline"
            >
                📖 Baca Artikel
            </a>

        </div>

    </div>

</section>



<!-- =====================================================
     PRODUK TERBARU
===================================================== -->

<section class="products-section">

    <div class="section-heading">

        <span>
            🆕 KOLEKSI TERBARU
        </span>

        <h2>
            Produk Jersey
        </h2>

        <p>
            Temukan jersey favoritmu dari koleksi
            terbaru Jersey Store.
        </p>

    </div>


    <div class="products-grid">

        @forelse($products as $product)

            <div class="product-card">

                <div class="product-image">

                    @if($product->image)

                        @if(Str::startsWith($product->image, [
                            'http://',
                            'https://'
                        ]))

                            <img
                                src="{{ $product->image }}"
                                alt="{{ $product->name }}"
                            >

                        @else

                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                            >

                        @endif

                    @else

                        <div style="
                            font-size:60px;
                            color:#aaa;
                        ">
                            ⚽
                        </div>

                    @endif

                </div>


                <div class="product-info">

                    <h3>
                        {{ $product->name }}
                    </h3>


                    <p class="product-description">

                        {{ $product->description }}

                    </p>


                    <div class="product-bottom">

                        <div class="product-price">

                            Rp {{ number_format($product->price, 0, ',', '.') }}

                        </div>


                        <a
                            href="{{ url('/produk/' . $product->id) }}"
                            class="detail-btn"
                        >
                            Lihat Detail
                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="empty-products">

                <h3>
                    Belum ada produk
                </h3>

                <p>
                    Produk jersey akan segera tersedia.
                </p>

            </div>

        @endforelse

    </div>

</section>



<!-- =====================================================
     PROMO
===================================================== -->

<section class="promo-section">

    <div class="promo-content">

        <div class="promo-text">

            <span class="promo-badge">
                🔥 PROMO TERBATAS
            </span>

            <h2>
                Jersey Favoritmu,<br>
                <span>Harga Lebih Bersahabat</span>
            </h2>

            <p>
                Temukan berbagai jersey sepak bola
                terbaru dengan desain keren dan
                harga terbaik hanya di Jersey Store.
            </p>

            <a
                href="{{ url('/produk') }}"
                class="promo-btn"
            >
                🛒 Lihat Koleksi
            </a>

        </div>


        <div class="promo-icon">
            ⚽
        </div>

    </div>

</section>



<!-- =====================================================
     KEUNGGULAN
===================================================== -->

<section class="features-section">

    <div class="section-heading">

        <span>
            ✨ MENGAPA KAMI?
        </span>

        <h2>
            Kenapa Pilih Jersey Store?
        </h2>

        <p>
            Kami berusaha memberikan pengalaman terbaik
            untuk menemukan jersey favoritmu.
        </p>

    </div>


    <div class="features-grid">


        <div class="feature-card">

            <div class="feature-icon">
                🏆
            </div>

            <h3>
                Produk Berkualitas
            </h3>

            <p>
                Kami menyediakan jersey dengan desain
                menarik dan kualitas yang nyaman digunakan.
            </p>

        </div>



        <div class="feature-card">

            <div class="feature-icon">
                🚀
            </div>

            <h3>
                Pengiriman Cepat
            </h3>

            <p>
                Pesanan diproses dengan cepat agar jersey
                favoritmu segera sampai.
            </p>

        </div>



        <div class="feature-card">

            <div class="feature-icon">
                🔒
            </div>

            <h3>
                Belanja Aman
            </h3>

            <p>
                Informasi produk ditampilkan secara jelas
                sehingga kamu dapat berbelanja dengan nyaman.
            </p>

        </div>



        <div class="feature-card">

            <div class="feature-icon">
                💬
            </div>

            <h3>
                Pelayanan Ramah
            </h3>

            <p>
                Kami siap membantu memberikan informasi
                mengenai produk yang kamu butuhkan.
            </p>

        </div>


    </div>

</section>



<!-- =====================================================
     TESTIMONI
===================================================== -->

<section class="testimonial-section">

    <div class="section-heading">

        <span>
            💬 TESTIMONI PELANGGAN
        </span>

        <h2>
            Apa Kata Pelanggan?
        </h2>

        <p>
            Pengalaman pelanggan setelah berbelanja
            di Jersey Store.
        </p>

    </div>


    <div class="testimonial-grid">


        <div class="testimonial-card">

            <div class="stars">
                ★★★★★
            </div>

            <p class="testimonial-text">

                "Jerseynya bagus banget dan sesuai
                dengan foto. Bahannya juga nyaman
                dipakai untuk olahraga."

            </p>


            <div class="customer">

                <div class="customer-avatar">
                    A
                </div>

                <div>

                    <strong>
                        Andi
                    </strong>

                    <span>
                        Pelanggan Jersey Store
                    </span>

                </div>

            </div>

        </div>



        <div class="testimonial-card">

            <div class="stars">
                ★★★★★
            </div>

            <p class="testimonial-text">

                "Desainnya keren dan proses pesanannya
                mudah. Saya sangat puas dengan produknya."

            </p>


            <div class="customer">

                <div class="customer-avatar">
                    R
                </div>

                <div>

                    <strong>
                        Rizky
                    </strong>

                    <span>
                        Pelanggan Jersey Store
                    </span>

                </div>

            </div>

        </div>



        <div class="testimonial-card">

            <div class="stars">
                ★★★★★
            </div>

            <p class="testimonial-text">

                "Pelayanannya bagus dan jersey yang
                datang sesuai dengan pesanan.
                Recommended!"

            </p>


            <div class="customer">

                <div class="customer-avatar">
                    F
                </div>

                <div>

                    <strong>
                        Fajar
                    </strong>

                    <span>
                        Pelanggan Jersey Store
                    </span>

                </div>

            </div>

        </div>


    </div>

</section>



<!-- =====================================================
     CONTACT
===================================================== -->

<section class="contact-section">

    <div class="contact-box">

        <h2>
            Butuh Informasi?
        </h2>

        <p>
            Punya pertanyaan mengenai produk atau artikel?
            Hubungi kami melalui halaman kontak.
        </p>

        <a
            href="{{ url('/kontak') }}"
            class="btn-primary"
        >
            Hubungi Kami
        </a>

    </div>

</section>



<!-- =====================================================
     FOOTER
===================================================== -->

<footer>

    <div class="footer-content">


        <div class="footer-brand">

            <h3>
                ⚽ Jersey Store
            </h3>

            <p>
                Tempat menemukan berbagai jersey sepak bola
                dengan desain keren dan pilihan menarik
                untuk para pecinta sepak bola.
            </p>

        </div>



        <div class="footer-column">

            <h4>
                Navigasi
            </h4>

            <a href="{{ url('/') }}">
                Home
            </a>

            <a href="{{ url('/produk') }}">
                Produk
            </a>

            <a href="{{ url('/artikel') }}">
                Artikel
            </a>

            <a href="{{ url('/kontak') }}">
                Kontak
            </a>

        </div>



        <div class="footer-column">

            <h4>
                Informasi
            </h4>

            <a href="{{ url('/produk') }}">
                Koleksi Jersey
            </a>

            <a href="{{ url('/artikel') }}">
                Artikel Terbaru
            </a>

            <a href="{{ url('/kontak') }}">
                Hubungi Kami
            </a>

        </div>


    </div>


    <div class="footer-bottom">

        © {{ date('Y') }} Jersey Store.
        All Rights Reserved.

    </div>

</footer>


</body>
</html>