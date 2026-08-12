@extends('layouts.app')

@section('title', 'Produk Jersey - Jersey Store')

@section('content')

<style>
    * {
        box-sizing: border-box;
    }

    .products-page {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px 70px;
    }

    /* ==============================
       HERO
    ============================== */

    .products-hero {
        position: relative;
        overflow: hidden;

        padding: 55px 40px;
        margin-bottom: 40px;

        border-radius: 24px;

        background:
            linear-gradient(
                135deg,
                #111827,
                #1d4ed8
            );

        color: white;

        box-shadow:
            0 15px 40px rgba(15, 23, 42, .15);
    }

    .products-hero::before {
        content: "";

        position: absolute;

        width: 300px;
        height: 300px;

        right: -100px;
        top: -130px;

        background:
            rgba(255,255,255,.08);

        border-radius: 50%;
    }

    .products-hero::after {
        content: "";

        position: absolute;

        width: 180px;
        height: 180px;

        right: 180px;
        bottom: -110px;

        background:
            rgba(255,255,255,.06);

        border-radius: 50%;
    }

    .hero-content {
        position: relative;
        z-index: 2;

        max-width: 700px;
    }

    .hero-badge {
        display: inline-block;

        padding: 7px 14px;

        margin-bottom: 15px;

        border-radius: 50px;

        background:
            rgba(255,255,255,.12);

        border:
            1px solid rgba(255,255,255,.2);

        font-size: 12px;

        font-weight: 700;

        letter-spacing: .5px;
    }

    .products-hero h1 {
        margin: 0;

        font-size: 40px;

        line-height: 1.15;

        font-weight: 800;
    }

    .products-hero p {
        margin: 15px 0 0;

        color:
            rgba(255,255,255,.8);

        font-size: 16px;

        line-height: 1.7;
    }


    /* ==============================
       HEADER
    ============================== */

    .section-header {
        display: flex;

        justify-content: space-between;

        align-items: end;

        margin-bottom: 24px;
    }

    .section-header h2 {
        margin: 0;

        font-size: 26px;

        color: #111827;
    }

    .section-header p {
        margin: 6px 0 0;

        color: #6b7280;

        font-size: 14px;
    }


    /* ==============================
       PRODUCT GRID
    ============================== */

    .product-grid {
        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 24px;
    }


    /* ==============================
       PRODUCT CARD
    ============================== */

    .product-card {
        overflow: hidden;

        background: white;

        border:
            1px solid #e5e7eb;

        border-radius: 18px;

        box-shadow:
            0 6px 20px rgba(15,23,42,.05);

        transition:
            transform .25s ease,
            box-shadow .25s ease;
    }

    .product-card:hover {
        transform:
            translateY(-7px);

        box-shadow:
            0 18px 35px rgba(15,23,42,.12);
    }


    /* ==============================
       PRODUCT IMAGE
    ============================== */

    .product-image {
        position: relative;

        height: 270px;

        overflow: hidden;

        background:
            #f1f5f9;
    }

    .product-image img {
        width: 100%;
        height: 100%;

        display: block;

        object-fit: cover;

        transition:
            transform .4s ease;
    }

    .product-card:hover
    .product-image img {
        transform:
            scale(1.06);
    }


    .image-placeholder {
        width: 100%;
        height: 100%;

        display: flex;

        align-items: center;
        justify-content: center;

        flex-direction: column;

        color: #94a3b8;

        background:
            linear-gradient(
                135deg,
                #f8fafc,
                #e2e8f0
            );
    }

    .image-placeholder span {
        font-size: 55px;

        margin-bottom: 8px;
    }

    .image-placeholder small {
        font-size: 12px;
    }


    /* ==============================
       STOCK BADGE
    ============================== */

    .stock-badge {
        position: absolute;

        top: 14px;
        left: 14px;

        padding: 7px 11px;

        border-radius: 8px;

        background:
            rgba(17,24,39,.88);

        color: white;

        font-size: 11px;

        font-weight: 700;

        backdrop-filter:
            blur(5px);
    }


    /* ==============================
       BODY
    ============================== */

    .product-body {
        padding: 20px;
    }

    .product-title {
        margin: 0 0 9px;

        font-size: 19px;

        line-height: 1.4;

        font-weight: 750;

        color: #111827;
    }

    .product-description {
        margin: 0 0 16px;

        color: #6b7280;

        font-size: 13px;

        line-height: 1.6;

        display: -webkit-box;

        -webkit-line-clamp: 2;

        -webkit-box-orient: vertical;

        overflow: hidden;
    }


    /* ==============================
       PRICE
    ============================== */

    .product-price {
        margin-bottom: 16px;

        font-size: 22px;

        font-weight: 800;

        color: #1d4ed8;
    }


    /* ==============================
       BUTTON
    ============================== */

    .product-footer {
        padding-top: 15px;

        border-top:
            1px solid #f1f5f9;
    }

    .detail-button {
        display: flex;

        align-items: center;

        justify-content: center;

        gap: 8px;

        width: 100%;

        padding: 11px 16px;

        border-radius: 10px;

        background:
            #111827;

        color: white;

        text-decoration: none;

        font-size: 13px;

        font-weight: 700;

        transition:
            background .2s ease,
            transform .2s ease;
    }

    .detail-button:hover {
        background:
            #1d4ed8;

        transform:
            translateY(-1px);
    }


    /* ==============================
       EMPTY
    ============================== */

    .empty-state {
        padding: 70px 25px;

        text-align: center;

        background: white;

        border:
            1px solid #e5e7eb;

        border-radius: 20px;

        box-shadow:
            0 6px 20px rgba(15,23,42,.04);
    }

    .empty-icon {
        font-size: 55px;

        margin-bottom: 15px;
    }

    .empty-state h3 {
        margin: 0 0 8px;

        font-size: 20px;

        color: #111827;
    }

    .empty-state p {
        margin: 0;

        color: #6b7280;

        font-size: 14px;
    }


    /* ==============================
       RESPONSIVE
    ============================== */

    @media (max-width: 900px) {

        .product-grid {
            grid-template-columns:
                repeat(2, 1fr);
        }

        .products-hero h1 {
            font-size: 34px;
        }
    }


    @media (max-width: 600px) {

        .products-page {
            padding:
                25px 15px 50px;
        }

        .products-hero {
            padding: 35px 25px;

            border-radius: 18px;
        }

        .products-hero h1 {
            font-size: 29px;
        }

        .products-hero p {
            font-size: 14px;
        }

        .product-grid {
            grid-template-columns: 1fr;
        }

        .product-image {
            height: 250px;
        }
    }

</style>


<div class="products-page">


    {{-- =========================================
         HERO
    ========================================== --}}

    <section class="products-hero">

        <div class="hero-content">

            <div class="hero-badge">
                ⚽ JERSEY STORE
            </div>

            <h1>
                Koleksi Jersey
                Terbaik
            </h1>

            <p>
                Temukan berbagai jersey favorit dengan
                desain berkualitas dan nyaman digunakan.
                Pilih jersey yang paling cocok untuk
                kamu dan lengkapi koleksimu.
            </p>

        </div>

    </section>


    {{-- =========================================
         SECTION HEADER
    ========================================== --}}

    <div class="section-header">

        <div>

            <h2>
                Koleksi Jersey
            </h2>

            <p>
                Pilih jersey favoritmu dari koleksi kami.
            </p>

        </div>

    </div>


    {{-- =========================================
         PRODUCT LIST
    ========================================== --}}

    @if($products->count() > 0)

        <div class="product-grid">


            @foreach($products as $product)


                <article class="product-card">


                    {{-- =========================
                         IMAGE
                    ========================== --}}

                    <a
                        href="{{ route(
                            'public.products.show',
                            $product
                        ) }}"
                        style="text-decoration:none;"
                    >

                        <div class="product-image">


                            @if($product->image)

                                <img
                                    src="{{ asset(
                                        'storage/' .
                                        $product->image
                                    ) }}"
                                    alt="{{ $product->name }}"
                                    loading="lazy"
                                >

                            @else

                                <div class="image-placeholder">

                                    <span>
                                        👕
                                    </span>

                                    <small>
                                        Tidak ada gambar
                                    </small>

                                </div>

                            @endif


                            <div class="stock-badge">

                                @if($product->stock > 0)

                                    ✓ Stok tersedia

                                @else

                                    Stok habis

                                @endif

                            </div>


                        </div>

                    </a>


                    {{-- =========================
                         BODY
                    ========================== --}}

                    <div class="product-body">


                        <h3 class="product-title">

                            {{ $product->name }}

                        </h3>


                        @if($product->description)

                            <p class="product-description">

                                {{ \Illuminate\Support\Str::limit(
                                    strip_tags($product->description),
                                    100
                                ) }}

                            </p>

                        @else

                            <p class="product-description">

                                Jersey berkualitas dengan
                                desain menarik dan nyaman
                                digunakan.

                            </p>

                        @endif


                        <div class="product-price">

                            Rp
                            {{ number_format(
                                $product->price,
                                0,
                                ',',
                                '.'
                            ) }}

                        </div>


                        <div class="product-footer">

                            <a
                                href="{{ route(
                                    'public.products.show',
                                    $product
                                ) }}"
                                class="detail-button"
                            >

                                Lihat Detail

                                <span>
                                    →
                                </span>

                            </a>

                        </div>


                    </div>


                </article>


            @endforeach


        </div>


    @else


        {{-- =====================================
             EMPTY STATE
        ====================================== --}}

        <div class="empty-state">

            <div class="empty-icon">
                👕
            </div>

            <h3>
                Belum Ada Produk
            </h3>

            <p>
                Saat ini belum ada jersey yang
                tersedia. Silakan kembali lagi nanti.
            </p>

        </div>


    @endif


</div>

@endsection