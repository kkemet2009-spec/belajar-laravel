@extends('layouts.app')

@section('title', 'Jersey Store - Home')

@section('content')

<style>
    .hero {
        background: linear-gradient(135deg, #111 0%, #222 50%, #444 100%);
        color: white;
        padding: 90px 20px;
    }

    .hero-content {
        max-width: 1100px;
        margin: auto;
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        gap: 50px;
        align-items: center;
    }

    .hero-text h1 {
        font-size: 52px;
        line-height: 1.1;
        margin-bottom: 20px;
    }

    .hero-text h1 span {
        color: #ddd;
    }

    .hero-text p {
        color: #ccc;
        font-size: 18px;
        line-height: 1.7;
        margin-bottom: 30px;
    }

    .hero-buttons {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .btn-light {
        display: inline-block;
        background: white;
        color: #111;
        padding: 13px 22px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
    }

    .btn-light:hover {
        background: #ddd;
    }

    .btn-outline {
        display: inline-block;
        border: 1px solid white;
        color: white;
        padding: 13px 22px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
    }

    .btn-outline:hover {
        background: white;
        color: #111;
    }

    .hero-jersey {
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.15);
        border-radius: 20px;
        padding: 50px 30px;
        text-align: center;
        font-size: 130px;
    }

    .section {
        max-width: 1100px;
        margin: auto;
        padding: 70px 20px;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        gap: 20px;
    }

    .section-header h2 {
        font-size: 32px;
    }

    .section-header p {
        color: #666;
        margin-top: 7px;
    }

    .see-all {
        color: #111;
        text-decoration: none;
        font-weight: bold;
        white-space: nowrap;
    }

    .products {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .product-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: 0.3s;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }

    .product-image {
        width: 100%;
        height: 240px;
        background: #eee;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .no-image {
        color: #999;
        font-size: 15px;
    }

    .product-info {
        padding: 18px;
    }

    .product-info h3 {
        font-size: 18px;
        margin-bottom: 8px;
    }

    .product-info p {
        color: #666;
        font-size: 14px;
        line-height: 1.5;
    }

    .price {
        font-size: 20px;
        font-weight: bold;
        margin: 15px 0;
    }

    .product-button {
        display: block;
        text-align: center;
        background: #111;
        color: white;
        padding: 10px;
        border-radius: 7px;
        text-decoration: none;
    }

    .product-button:hover {
        background: #333;
    }

    .articles {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
    }

    .article-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: 0.3s;
    }

    .article-card:hover {
        transform: translateY(-5px);
    }

    .article-image {
        height: 190px;
        background: #eee;
        overflow: hidden;
    }

    .article-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .article-content {
        padding: 20px;
    }

    .article-content h3 {
        font-size: 19px;
        margin-bottom: 10px;
    }

    .article-content p {
        color: #666;
        line-height: 1.6;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .article-link {
        color: #111;
        text-decoration: none;
        font-weight: bold;
    }

    .empty {
        background: white;
        padding: 30px;
        text-align: center;
        border-radius: 10px;
        color: #777;
        grid-column: 1 / -1;
    }

    .features {
        background: #111;
        color: white;
    }

    .feature-grid {
        max-width: 1100px;
        margin: auto;
        padding: 60px 20px;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }

    .feature {
        text-align: center;
        padding: 20px;
    }

    .feature-icon {
        font-size: 40px;
        margin-bottom: 15px;
    }

    .feature h3 {
        margin-bottom: 10px;
    }

    .feature p {
        color: #bbb;
        line-height: 1.6;
    }

    .contact-box {
        background: white;
        border-radius: 15px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .contact-box h2 {
        font-size: 30px;
        margin-bottom: 12px;
    }

    .contact-box p {
        color: #666;
        margin-bottom: 25px;
        line-height: 1.6;
    }

    @media (max-width: 900px) {

        .hero-content {
            grid-template-columns: 1fr;
        }

        .hero-jersey {
            font-size: 100px;
        }

        .products {
            grid-template-columns: repeat(2, 1fr);
        }

        .articles {
            grid-template-columns: 1fr;
        }

        .feature-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 600px) {

        .hero {
            padding: 60px 20px;
        }

        .hero-text h1 {
            font-size: 38px;
        }

        .products {
            grid-template-columns: 1fr;
        }

        .section {
            padding: 50px 20px;
        }

        .section-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .contact-box {
            padding: 30px 20px;
        }
    }
</style>


{{-- ========================================================= --}}
{{-- HERO --}}
{{-- ========================================================= --}}

<section class="hero">

    <div class="hero-content">

        <div class="hero-text">

            <h1>
                Jersey Bola
                <br>
                <span>Favoritmu Ada Di Sini ⚽</span>
            </h1>

            <p>
                Temukan berbagai jersey bola berkualitas
                untuk klub dan tim favoritmu.
                Desain keren, nyaman digunakan,
                dan cocok untuk pecinta sepak bola.
            </p>

            <div class="hero-buttons">

                <a href="{{ route('public.products.index') }}"
                   class="btn-light">
                    Lihat Produk
                </a>

                <a href="{{ route('public.articles.index') }}"
                   class="btn-outline">
                    Baca Artikel
                </a>

            </div>

        </div>


        <div class="hero-jersey">
            ⚽
        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- PRODUK TERBARU --}}
{{-- ========================================================= --}}

<section class="section">

    <div class="section-header">

        <div>
            <h2>
                Produk Terbaru
            </h2>

            <p>
                Koleksi jersey terbaru dari Jersey Store.
            </p>
        </div>

        <a href="{{ route('public.products.index') }}"
           class="see-all">
            Lihat Semua →
        </a>

    </div>


    <div class="products">

        @forelse($products as $product)

            <div class="product-card">

                <div class="product-image">

                    @if($product->image)

                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                        >

                    @else

                        <div class="no-image">
                            Tidak ada gambar
                        </div>

                    @endif

                </div>


                <div class="product-info">

                    <h3>
                        {{ $product->name }}
                    </h3>

                    @if(isset($product->description))

                        <p>
                            {{ Str::limit($product->description, 80) }}
                        </p>

                    @endif


                    <div class="price">

                        Rp {{ number_format($product->price, 0, ',', '.') }}

                    </div>


                    <a
                        href="{{ route('public.products.show', $product) }}"
                        class="product-button"
                    >
                        Lihat Detail
                    </a>

                </div>

            </div>

        @empty

            <div class="empty">

                Belum ada produk tersedia.

            </div>

        @endforelse

    </div>

</section>



{{-- ========================================================= --}}
{{-- KEUNGGULAN --}}
{{-- ========================================================= --}}

<section class="features">

    <div class="feature-grid">

        <div class="feature">

            <div class="feature-icon">
                ⚽
            </div>

            <h3>
                Jersey Berkualitas
            </h3>

            <p>
                Produk dipilih dengan kualitas
                yang nyaman untuk digunakan.
            </p>

        </div>


        <div class="feature">

            <div class="feature-icon">
                🚚
            </div>

            <h3>
                Pengiriman Aman
            </h3>

            <p>
                Pesanan dikemas dengan baik
                agar sampai dengan aman.
            </p>

        </div>


        <div class="feature">

            <div class="feature-icon">
                ⭐
            </div>

            <h3>
                Pilihan Terbaik
            </h3>

            <p>
                Temukan jersey klub favoritmu
                di Jersey Store.
            </p>

        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- ARTIKEL TERBARU --}}
{{-- ========================================================= --}}

<section class="section">

    <div class="section-header">

        <div>

            <h2>
                Artikel Terbaru
            </h2>

            <p>
                Berita dan informasi seputar dunia sepak bola.
            </p>

        </div>


        <a
            href="{{ route('public.articles.index') }}"
            class="see-all"
        >
            Lihat Semua →
        </a>

    </div>


    <div class="articles">

        @forelse($articles as $article)

            <div class="article-card">

                <div class="article-image">

                    @if($article->image)

                        <img
                            src="{{ asset('storage/' . $article->image) }}"
                            alt="{{ $article->title }}"
                        >

                    @else

                        <div class="no-image">
                            Tidak ada gambar
                        </div>

                    @endif

                </div>


                <div class="article-content">

                    <h3>
                        {{ $article->title }}
                    </h3>


                    @if(isset($article->content))

                        <p>
                            {{ Str::limit(strip_tags($article->content), 120) }}
                        </p>

                    @endif


                    <a
                        href="{{ route('public.articles.show', $article) }}"
                        class="article-link"
                    >
                        Baca Selengkapnya →
                    </a>

                </div>

            </div>

        @empty

            <div class="empty">

                Belum ada artikel tersedia.

            </div>

        @endforelse

    </div>

</section>



{{-- ========================================================= --}}
{{-- CONTACT --}}
{{-- ========================================================= --}}

<section class="section">

    <div class="contact-box">

        <h2>
            Butuh Informasi?
        </h2>

        <p>
            Punya pertanyaan mengenai produk atau artikel?
            Hubungi kami melalui halaman kontak.
        </p>

        <a
            href="{{ route('contact') }}"
            class="btn"
        >
            Hubungi Kami
        </a>

    </div>

</section>

@endsection