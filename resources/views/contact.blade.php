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
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #171717;
        }

        /* ================= HEADER ================= */

        header {
            background: #111;
            color: white;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 5%;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 25px;
            font-weight: bold;
        }

        .logo-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        nav {
            display: flex;
            gap: 30px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            transition: 0.3s;
        }

        nav a:hover {
            color: #3b82f6;
        }

        /* ================= HERO ================= */

        .hero {
            background: linear-gradient(135deg, #111, #1d1d1d);
            color: white;
            text-align: center;
            padding: 75px 20px;
        }

        .hero-badge {
            display: inline-block;
            background: #2563eb;
            padding: 10px 18px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: 45px;
            margin-bottom: 15px;
        }

        .hero p {
            max-width: 650px;
            margin: auto;
            color: #cbd5e1;
            font-size: 18px;
            line-height: 1.7;
        }

        /* ================= CONTAINER ================= */

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 50px auto;
        }

        /* ================= CONTACT GRID ================= */

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1.3fr;
            gap: 30px;
        }

        .card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.06);
        }

        .card h2 {
            font-size: 25px;
            margin-bottom: 10px;
        }

        .card-description {
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        /* ================= INFO ================= */

        .info-item {
            display: flex;
            gap: 15px;
            padding: 18px 0;
            border-bottom: 1px solid #eee;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-icon {
            width: 45px;
            height: 45px;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .info-text h3 {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .info-text p {
            color: #64748b;
            line-height: 1.5;
        }

        /* ================= FORM ================= */

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
            transition: 0.3s;
        }

        input:focus,
        textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        .btn {
            width: 100%;
            border: none;
            background: #2563eb;
            color: white;
            padding: 14px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        /* ================= WHY US ================= */

        .why-section {
            margin-top: 40px;
        }

        .why-title {
            text-align: center;
            margin-bottom: 25px;
        }

        .why-title h2 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .why-title p {
            color: #64748b;
        }

        .why-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .why-card {
            background: white;
            padding: 25px;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 6px 20px rgba(0,0,0,0.05);
        }

        .why-icon {
            font-size: 35px;
            margin-bottom: 12px;
        }

        .why-card h3 {
            margin-bottom: 8px;
        }

        .why-card p {
            color: #64748b;
            line-height: 1.5;
        }

        /* ================= FOOTER ================= */

        footer {
            background: #111;
            color: white;
            margin-top: 70px;
            padding: 45px 5% 25px;
        }

        .footer-grid {
            max-width: 1100px;
            margin: auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 40px;
        }

        .footer-brand h2 {
            margin-bottom: 15px;
        }

        .footer-brand p {
            color: #94a3b8;
            line-height: 1.7;
            max-width: 400px;
        }

        footer h3 {
            margin-bottom: 15px;
        }

        footer a {
            display: block;
            color: #94a3b8;
            text-decoration: none;
            margin-bottom: 10px;
        }

        footer a:hover {
            color: white;
        }

        .copyright {
            max-width: 1100px;
            margin: 35px auto 0;
            padding-top: 20px;
            border-top: 1px solid #333;
            text-align: center;
            color: #94a3b8;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 800px) {

            header {
                height: auto;
                padding: 18px 5%;
                flex-direction: column;
                gap: 18px;
            }

            nav {
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero h1 {
                font-size: 35px;
            }

            .contact-grid {
                grid-template-columns: 1fr;
            }

            .why-grid {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<!-- ================= HEADER ================= -->

<header>

    <div class="logo">
        <div class="logo-icon">⚽</div>
        <span>Jersey Store</span>
    </div>

    <nav>
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/produk') }}">Produk</a>
        <a href="{{ url('/artikel') }}">Artikel</a>
        <a href="{{ url('/kontak') }}">Kontak</a>
    </nav>

</header>


<!-- ================= HERO ================= -->

<section class="hero">

    <div class="hero-badge">
        📞 HUBUNGI KAMI
    </div>

    <h1>Kontak Jersey Store</h1>

    <p>
        Punya pertanyaan tentang produk, pemesanan, atau ingin mengetahui
        informasi lebih lanjut? Kami siap membantu kamu.
    </p>

</section>


<!-- ================= CONTACT ================= -->

<div class="container">

    <div class="contact-grid">

        <!-- INFO TOKO -->

        <div class="card">

            <h2>Informasi Toko</h2>

            <p class="card-description">
                Jangan ragu untuk menghubungi kami. Tim Jersey Store
                siap memberikan informasi terbaik mengenai koleksi jersey kami.
            </p>

            <div class="info-item">

                <div class="info-icon">
                    📍
                </div>

                <div class="info-text">
                    <h3>Alamat</h3>
                    <p>
                        Indonesia
                    </p>
                </div>

            </div>


            <div class="info-item">

                <div class="info-icon">
                    📱
                </div>

                <div class="info-text">
                    <h3>WhatsApp</h3>
                    <p>
                        +62 812-3456-7890
                    </p>
                </div>

            </div>


            <div class="info-item">

                <div class="info-icon">
                    ✉️
                </div>

                <div class="info-text">
                    <h3>Email</h3>
                    <p>
                        jersey.store@email.com
                    </p>
                </div>

            </div>


            <div class="info-item">

                <div class="info-icon">
                    🕐
                </div>

                <div class="info-text">
                    <h3>Jam Operasional</h3>
                    <p>
                        Senin - Sabtu<br>
                        08.00 - 21.00 WIB
                    </p>
                </div>

            </div>

        </div>


        <!-- FORM KONTAK -->

        <div class="card">

            <h2>Kirim Pesan</h2>

            <p class="card-description">
                Isi formulir di bawah ini dan sampaikan pertanyaan atau
                kebutuhan kamu kepada kami.
            </p>

            <form
                action="#"
                method="POST"
                onsubmit="kirimPesan(event)"
            >

                @csrf

                <div class="form-group">

                    <label for="name">
                        Nama
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Masukkan nama kamu"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="contoh@email.com"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="subject">
                        Subjek
                    </label>

                    <input
                        type="text"
                        id="subject"
                        name="subject"
                        placeholder="Contoh: Pertanyaan Produk"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="message">
                        Pesan
                    </label>

                    <textarea
                        id="message"
                        name="message"
                        placeholder="Tuliskan pesan kamu..."
                        required
                    ></textarea>

                </div>


                <button
                    type="submit"
                    class="btn"
                >
                    💬 Kirim Pesan
                </button>

            </form>

        </div>

    </div>


    <!-- ================= KEUNGGULAN ================= -->

    <section class="why-section">

        <div class="why-title">

            <h2>Kenapa Menghubungi Kami?</h2>

            <p>
                Kami berusaha memberikan pelayanan terbaik untuk pelanggan.
            </p>

        </div>


        <div class="why-grid">

            <div class="why-card">

                <div class="why-icon">
                    ⚡
                </div>

                <h3>Respon Cepat</h3>

                <p>
                    Kami akan berusaha menjawab pertanyaan pelanggan
                    secepat mungkin.
                </p>

            </div>


            <div class="why-card">

                <div class="why-icon">
                    🛍️
                </div>

                <h3>Produk Berkualitas</h3>

                <p>
                    Koleksi jersey dipilih dengan memperhatikan
                    kualitas dan kenyamanan.
                </p>

            </div>


            <div class="why-card">

                <div class="why-icon">
                    🤝
                </div>

                <h3>Pelayanan Terbaik</h3>

                <p>
                    Kami siap membantu pelanggan mendapatkan produk
                    yang sesuai kebutuhan.
                </p>

            </div>

        </div>

    </section>

</div>


<!-- ================= FOOTER ================= -->

<footer>

    <div class="footer-grid">

        <div class="footer-brand">

            <h2>⚽ Jersey Store</h2>

            <p>
                Tempat menemukan berbagai jersey sepak bola dengan
                desain keren dan pilihan menarik untuk para pecinta
                sepak bola.
            </p>

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

        © {{ date('Y') }} Jersey Store. All Rights Reserved.

    </div>

</footer>


<script>

function kirimPesan(event) {

    event.preventDefault();

    const nama = document.getElementById('name').value;

    alert(
        'Terima kasih, ' +
        nama +
        '! Pesan kamu sudah diterima. Kami akan segera menghubungi kamu.'
    );

}

</script>

</body>
</html>