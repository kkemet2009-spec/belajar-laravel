<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $product->name }} - DEV STORE
    </title>


    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        :root {

            --primary: #111111;

            --accent: #D4A72C;

            --bg: #FAFAF8;

            --white: #ffffff;

            --border: #E5E7EB;

            --muted: #6B7280;

            --success: #168344;

        }


        body {

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background:
                var(--bg);

            color:
                var(--primary);

        }


        /* =========================
           NAVBAR
        ========================= */

        .navbar {

            background:
                var(--white);

            border-bottom:
                1px solid var(--border);

            height:
                76px;

            display:
                flex;

            align-items:
                center;

            position:
                sticky;

            top:
                0;

            z-index:
                1000;

        }


        .nav-container {

            width:
                92%;

            max-width:
                1250px;

            margin:
                auto;

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

        }


        .logo {

            display:
                flex;

            align-items:
                center;

            gap:
                12px;

            color:
                var(--primary);

            text-decoration:
                none;

            font-size:
                21px;

            font-weight:
                800;

        }


        .logo-image {

            width:
                48px;

            height:
                48px;

            object-fit:
                contain;

        }


        .nav-menu {

            display:
                flex;

            align-items:
                center;

            gap:
                34px;

        }


        .nav-menu a {

            color:
                var(--primary);

            text-decoration:
                none;

            font-size:
                16px;

            font-weight:
                500;

            transition:
                .2s;

        }


        .nav-menu a:hover {

            color:
                var(--accent);

        }


        .cart-link {

            position:
                relative;

        }


        .cart-count {

            position:
                absolute;

            top:
                -13px;

            right:
                -15px;

            width:
                21px;

            height:
                21px;

            border-radius:
                50%;

            background:
                var(--accent);

            color:
                var(--primary);

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            font-size:
                11px;

            font-weight:
                800;

        }


        /* =========================
           MAIN
        ========================= */

        .container {

            width:
                92%;

            max-width:
                1200px;

            margin:
                45px auto 80px;

        }


        .back {

            display:
                inline-flex;

            align-items:
                center;

            gap:
                8px;

            color:
                var(--muted);

            text-decoration:
                none;

            margin-bottom:
                22px;

            font-size:
                15px;

        }


        .back:hover {

            color:
                var(--primary);

        }


        /* =========================
           PRODUCT
        ========================= */

        .product-card {

            background:
                var(--white);

            border:
                1px solid var(--border);

            border-radius:
                22px;

            overflow:
                hidden;

            display:
                grid;

            grid-template-columns:
                48% 52%;

            box-shadow:
                0 15px 45px rgba(17, 17, 17, .06);

        }


        .product-image-section {

            background:
                #f4f4f1;

            min-height:
                620px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            padding:
                50px;

        }


        .product-image {

            width:
                100%;

            max-width:
                500px;

            max-height:
                570px;

            object-fit:
                contain;

        }


        .no-image {

            width:
                100%;

            height:
                400px;

            background:
                #eeeeeb;

            border-radius:
                16px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            color:
                var(--muted);

        }


        .product-detail {

            padding:
                50px;

        }


        .badge {

            display:
                inline-flex;

            align-items:
                center;

            gap:
                7px;

            background:
                #f7f0dc;

            color:
                #76590c;

            padding:
                8px 13px;

            border-radius:
                20px;

            font-size:
                13px;

            font-weight:
                700;

            margin-bottom:
                18px;

        }


        .product-name {

            font-size:
                38px;

            line-height:
                1.15;

            margin-bottom:
                15px;

            letter-spacing:
                -.8px;

        }


        .price {

            color:
                var(--accent);

            font-size:
                31px;

            font-weight:
                800;

            margin-bottom:
                28px;

        }


        /* =========================
           INFO
        ========================= */

        .info-list {

            border-top:
                1px solid var(--border);

            border-bottom:
                1px solid var(--border);

            margin-bottom:
                28px;

        }


        .info-item {

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            gap:
                20px;

            padding:
                15px 0;

            border-bottom:
                1px solid var(--border);

        }


        .info-item:last-child {

            border-bottom:
                none;

        }


        .info-label {

            color:
                var(--muted);

            font-size:
                14px;

        }


        .info-value {

            font-weight:
                700;

            text-align:
                right;

        }


        .stock-available {

            display:
                inline-block;

            background:
                #e7f7ed;

            color:
                var(--success);

            padding:
                7px 12px;

            border-radius:
                20px;

            font-size:
                13px;

        }


        .stock-empty {

            display:
                inline-block;

            background:
                #fde8e8;

            color:
                #c62828;

            padding:
                7px 12px;

            border-radius:
                20px;

            font-size:
                13px;

        }


        /* =========================
           DESCRIPTION
        ========================= */

        .description-title {

            font-size:
                20px;

            margin-bottom:
                12px;

        }


        .description {

            color:
                var(--muted);

            line-height:
                1.8;

            font-size:
                15px;

            margin-bottom:
                30px;

            white-space:
                pre-line;

        }


        /* =========================
           ACTION
        ========================= */

        .actions {

            display:
                grid;

            grid-template-columns:
                1fr 1fr 58px;

            gap:
                10px;

        }


        .action-form {

            margin:
                0;

        }


        .btn {

            width:
                100%;

            min-height:
                52px;

            border:
                none;

            border-radius:
                12px;

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            gap:
                8px;

            padding:
                12px 16px;

            font-size:
                14px;

            font-weight:
                800;

            text-decoration:
                none;

            cursor:
                pointer;

            transition:
                .2s;

        }


        .btn:hover {

            transform:
                translateY(-2px);

        }


        .btn-cart {

            background:
                var(--primary);

            color:
                white;

        }


        .btn-cart:hover {

            background:
                #252525;

        }


        .btn-buy {

            background:
                var(--accent);

            color:
                var(--primary);

        }


        .btn-buy:hover {

            background:
                #b88d18;

            color:
                white;

        }


        .btn-wishlist {

            background:
                #f3f3f1;

            color:
                var(--primary);

            font-size:
                23px;

        }


        .btn-wishlist.active {

            background:
                var(--primary);

            color:
                var(--accent);

        }


        .btn-disabled {

            background:
                #eeeeee;

            color:
                #999;

            cursor:
                not-allowed;

        }


        .service-grid {

            display:
                grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap:
                12px;

            margin-top:
                30px;

        }


        .service {

            background:
                #f8f8f6;

            border:
                1px solid #eeeeeb;

            border-radius:
                14px;

            padding:
                18px 12px;

            text-align:
                center;

        }


        .service-icon {

            font-size:
                25px;

            margin-bottom:
                8px;

        }


        .service-text {

            color:
                #555;

            font-size:
                13px;

        }


        /* =========================
           FOOTER
        ========================= */

        .footer {

            background:
                var(--primary);

            color:
                white;

            text-align:
                center;

            padding:
                30px 20px;

        }


        .footer-brand {

            font-weight:
                800;

            margin-bottom:
                8px;

        }


        .footer p {

            color:
                #cfcfcf;

            font-size:
                14px;

        }


        /* =========================
           ALERT
        ========================= */

        .alert {

            padding:
                14px 17px;

            border-radius:
                12px;

            margin-bottom:
                20px;

        }


        .alert-success {

            background:
                #ecfdf3;

            color:
                #087443;

        }


        .alert-error {

            background:
                #fef2f2;

            color:
                #b91c1c;

        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media(max-width: 850px) {

            .product-card {

                grid-template-columns:
                    1fr;

            }

            .product-image-section {

                min-height:
                    450px;

            }

            .product-detail {

                padding:
                    35px;

            }

        }


        @media(max-width: 600px) {

            .navbar {

                height:
                    auto;

                padding:
                    10px 0;

            }

            .nav-container {

                flex-direction:
                    column;

                gap:
                    10px;

            }

            .nav-menu {

                gap:
                    15px;

                flex-wrap:
                    wrap;

                justify-content:
                    center;

            }

            .container {

                width:
                    94%;

                margin:
                    25px auto 50px;

            }

            .product-image-section {

                min-height:
                    350px;

                padding:
                    25px;

            }

            .product-detail {

                padding:
                    25px;

            }

            .product-name {

                font-size:
                    29px;

            }

            .price {

                font-size:
                    26px;

            }

            .actions {

                grid-template-columns:
                    1fr;

            }

            .service-grid {

                grid-template-columns:
                    1fr;

            }

        }

    </style>

</head>


<body>


{{-- =========================
     NAVBAR
========================= --}}

<nav class="navbar">

    <div class="nav-container">


        <a
            href="{{ url('/') }}"
            class="logo"
        >

            <img
                src="{{ asset('images/logo-dev-store.png') }}"
                alt="DEV STORE"
                class="logo-image"
            >

            <span>
                DEV STORE
            </span>

        </a>


        <div class="nav-menu">

            <a href="{{ url('/') }}">
                Home
            </a>

            <a href="{{ route('products.index') }}">
                Produk
            </a>

            <a href="{{ route('articles.index') }}">
                Artikel
            </a>

            <a href="{{ url('/contact') }}">
                Kontak
            </a>


            <a
                href="{{ route('cart.index') }}"
                class="cart-link"
            >

                🛒

                @php

                    $cartCount = 0;

                    foreach (
                        session('cart', [])
                        as $cartItem
                    ) {

                        $cartCount +=
                            $cartItem['quantity'];

                    }

                @endphp


                @if($cartCount > 0)

                    <span class="cart-count">
                        {{ $cartCount }}
                    </span>

                @endif

            </a>

        </div>


    </div>

</nav>



<main class="container">


    {{-- =========================
         ALERT
    ========================= --}}

    @if(session('success'))

        <div class="alert alert-success">

            ✓
            {{ session('success') }}

        </div>

    @endif


    @if(session('error'))

        <div class="alert alert-error">

            !
            {{ session('error') }}

        </div>

    @endif



    {{-- =========================
         BACK
    ========================= --}}

    <a
        href="{{ route('products.index') }}"
        class="back"
    >
        ← Kembali ke Produk
    </a>



    {{-- =========================
         PRODUCT CARD
    ========================= --}}

    <div class="product-card">


        {{-- =========================
             IMAGE
        ========================= --}}

        <div class="product-image-section">


            @if($product->image)

                <img
                    src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->name }}"
                    class="product-image"
                >

            @else

                <div class="no-image">

                    Tidak ada gambar produk

                </div>

            @endif


        </div>



        {{-- =========================
             DETAIL
        ========================= --}}

        <div class="product-detail">


            <span class="badge">

                ⚽

                DEV STORE

            </span>


            <h1 class="product-name">

                {{ $product->name }}

            </h1>


            <div class="price">

                Rp
                {{ number_format(
                    $product->price,
                    0,
                    ',',
                    '.'
                ) }}

            </div>



            {{-- =========================
                 INFO
            ========================= --}}

            <div class="info-list">


                <div class="info-item">

                    <span class="info-label">
                        Stok
                    </span>


                    <span class="info-value">

                        @if($product->stock > 0)

                            <span class="stock-available">

                                ✓
                                {{ $product->stock }}
                                tersedia

                            </span>

                        @else

                            <span class="stock-empty">

                                Stok habis

                            </span>

                        @endif

                    </span>

                </div>


                <div class="info-item">

                    <span class="info-label">
                        Produk
                    </span>

                    <span class="info-value">
                        Jersey
                    </span>

                </div>


                <div class="info-item">

                    <span class="info-label">
                        Ditambahkan
                    </span>

                    <span class="info-value">

                        {{ $product->created_at
                            ? $product->created_at->format('d/m/Y')
                            : '-'
                        }}

                    </span>

                </div>


            </div>



            {{-- =========================
                 DESCRIPTION
            ========================= --}}

            <h2 class="description-title">

                Deskripsi Produk

            </h2>


            <div class="description">

                @if($product->description)

                    {{ $product->description }}

                @else

                    Belum ada deskripsi
                    untuk produk ini.

                @endif

            </div>



            {{-- =========================
                 ACTION BUTTON
            ========================= --}}

            <div class="actions">


                @if($product->stock > 0)


                    {{-- TAMBAH KERANJANG --}}

                    <form
                        action="{{ route(
                            'cart.add',
                            $product->id
                        ) }}"
                        method="POST"
                        class="action-form"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-cart"
                        >

                            🛒

                            Tambah Keranjang

                        </button>

                    </form>



                    {{-- BELI SEKARANG --}}

                    <form
                        action="{{ route(
                            'checkout.buy',
                            $product->id
                        ) }}"
                        method="POST"
                        class="action-form"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-buy"
                        >

                            ⚡

                            Beli Sekarang

                        </button>

                    </form>



                    {{-- WISHLIST --}}

                    <button
                        type="button"
                        class="btn btn-wishlist"
                        id="wishlistButton"
                        title="Wishlist"
                    >

                        ♡

                    </button>


                @else


                    <button
                        type="button"
                        class="btn btn-disabled"
                        disabled
                    >

                        Stok Habis

                    </button>


                    <button
                        type="button"
                        class="btn btn-disabled"
                        disabled
                    >

                        Tidak Tersedia

                    </button>


                    <button
                        type="button"
                        class="btn btn-wishlist"
                        id="wishlistButton"
                    >

                        ♡

                    </button>


                @endif


            </div>



            {{-- =========================
                 SERVICE
            ========================= --}}

            <div class="service-grid">


                <div class="service">

                    <div class="service-icon">
                        🚚
                    </div>

                    <div class="service-text">
                        Pengiriman Cepat
                    </div>

                </div>


                <div class="service">

                    <div class="service-icon">
                        🛡️
                    </div>

                    <div class="service-text">
                        Produk Berkualitas
                    </div>

                </div>


                <div class="service">

                    <div class="service-icon">
                        💬
                    </div>

                    <div class="service-text">
                        Layanan Pelanggan
                    </div>

                </div>


            </div>


        </div>


    </div>


</main>



<footer class="footer">

    <div class="footer-brand">
        ⚽ DEV STORE
    </div>

    <p>
        © {{ date('Y') }}
        DEV STORE.
        All Rights Reserved.
    </p>

</footer>



<script>

/*
|--------------------------------------------------------------------------
| WISHLIST
|--------------------------------------------------------------------------
*/

const wishlistButton =
    document.getElementById(
        'wishlistButton'
    );


const productId =
    "{{ $product->id }}";


let wishlist =
    JSON.parse(
        localStorage.getItem(
            'dev_store_wishlist'
        ) || '[]'
    );


if (
    wishlist.includes(
        Number(productId)
    )
) {

    wishlistButton.innerHTML =
        '♥';

    wishlistButton.classList.add(
        'active'
    );

}


wishlistButton.addEventListener(
    'click',
    function()
    {

        const id =
            Number(productId);


        if (
            wishlist.includes(id)
        ) {

            wishlist =
                wishlist.filter(
                    item => item !== id
                );

            wishlistButton.innerHTML =
                '♡';

            wishlistButton.classList.remove(
                'active'
            );

        } else {

            wishlist.push(id);

            wishlistButton.innerHTML =
                '♥';

            wishlistButton.classList.add(
                'active'
            );

        }


        localStorage.setItem(
            'dev_store_wishlist',
            JSON.stringify(
                wishlist
            )
        );

    }
);

</script>


</body>

</html>