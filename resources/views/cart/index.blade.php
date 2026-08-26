<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Keranjang - DEV STORE
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

            text-decoration:
                none;

            color:
                var(--primary);

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

            background:
                var(--accent);

            color:
                var(--primary);

            width:
                21px;

            height:
                21px;

            border-radius:
                50%;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            font-size:
                11px;

            font-weight:
                bold;

        }


        /* =========================
           CONTAINER
        ========================= */

        .container {

            width:
                92%;

            max-width:
                1200px;

            margin:
                50px auto 80px;

        }


        .page-title {

            font-size:
                38px;

            margin-bottom:
                10px;

        }


        .page-subtitle {

            color:
                var(--muted);

            margin-bottom:
                35px;

        }


        /* =========================
           ALERT
        ========================= */

        .alert {

            padding:
                15px 18px;

            border-radius:
                12px;

            margin-bottom:
                20px;

            font-size:
                14px;

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
           CART
        ========================= */

        .cart-layout {

            display:
                grid;

            grid-template-columns:
                1fr 350px;

            gap:
                25px;

        }


        .cart-card {

            background:
                var(--white);

            border:
                1px solid var(--border);

            border-radius:
                18px;

            overflow:
                hidden;

        }


        .cart-item {

            display:
                grid;

            grid-template-columns:
                120px 1fr auto;

            gap:
                20px;

            align-items:
                center;

            padding:
                22px;

            border-bottom:
                1px solid var(--border);

        }


        .cart-item:last-child {

            border-bottom:
                none;

        }


        .product-image {

            width:
                120px;

            height:
                120px;

            background:
                #f7f7f5;

            border-radius:
                14px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            overflow:
                hidden;

        }


        .product-image img {

            width:
                100%;

            height:
                100%;

            object-fit:
                contain;

        }


        .product-name {

            font-size:
                18px;

            font-weight:
                700;

            margin-bottom:
                8px;

        }


        .product-price {

            color:
                var(--accent);

            font-weight:
                700;

            margin-bottom:
                14px;

        }


        .quantity-form {

            display:
                inline-flex;

            align-items:
                center;

            border:
                1px solid var(--border);

            border-radius:
                10px;

            overflow:
                hidden;

        }


        .quantity-form button {

            width:
                35px;

            height:
                35px;

            border:
                none;

            background:
                #f7f7f7;

            cursor:
                pointer;

            font-size:
                17px;

        }


        .quantity-form input {

            width:
                45px;

            height:
                35px;

            border:
                none;

            border-left:
                1px solid var(--border);

            border-right:
                1px solid var(--border);

            text-align:
                center;

        }


        .item-total {

            text-align:
                right;

        }


        .total-price {

            font-weight:
                800;

            font-size:
                17px;

            margin-bottom:
                14px;

        }


        .remove-btn {

            border:
                none;

            background:
                #fff1f1;

            color:
                #c62828;

            padding:
                9px 13px;

            border-radius:
                9px;

            cursor:
                pointer;

            font-weight:
                600;

        }


        /* =========================
           SUMMARY
        ========================= */

        .summary {

            background:
                var(--white);

            border:
                1px solid var(--border);

            border-radius:
                18px;

            padding:
                28px;

            height:
                fit-content;

            position:
                sticky;

            top:
                100px;

        }


        .summary h2 {

            font-size:
                22px;

            margin-bottom:
                25px;

        }


        .summary-row {

            display:
                flex;

            justify-content:
                space-between;

            margin-bottom:
                15px;

            color:
                var(--muted);

        }


        .summary-total {

            border-top:
                1px solid var(--border);

            padding-top:
                18px;

            margin-top:
                20px;

            display:
                flex;

            justify-content:
                space-between;

            font-size:
                20px;

            font-weight:
                800;

        }


        .btn {

            width:
                100%;

            min-height:
                48px;

            border:
                none;

            border-radius:
                12px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            text-decoration:
                none;

            cursor:
                pointer;

            font-size:
                15px;

            font-weight:
                700;

            margin-top:
                14px;

        }


        .btn-checkout {

            background:
                var(--accent);

            color:
                var(--primary);

        }


        .btn-checkout:hover {

            background:
                #b88d18;

            color:
                white;

        }


        .btn-continue {

            background:
                var(--primary);

            color:
                white;

        }


        .btn-clear {

            background:
                #fef2f2;

            color:
                #b91c1c;

        }


        /* =========================
           EMPTY
        ========================= */

        .empty {

            background:
                var(--white);

            border:
                1px solid var(--border);

            border-radius:
                18px;

            padding:
                70px 30px;

            text-align:
                center;

        }


        .empty-icon {

            font-size:
                60px;

            margin-bottom:
                20px;

        }


        .empty h2 {

            margin-bottom:
                10px;

        }


        .empty p {

            color:
                var(--muted);

            margin-bottom:
                25px;

        }


        .empty a {

            display:
                inline-flex;

            padding:
                13px 25px;

            border-radius:
                12px;

            background:
                var(--primary);

            color:
                white;

            text-decoration:
                none;

            font-weight:
                700;

        }


        /* =========================
           FOOTER
        ========================= */

        footer {

            background:
                var(--primary);

            color:
                white;

            text-align:
                center;

            padding:
                30px;

        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media(max-width: 850px) {

            .cart-layout {

                grid-template-columns:
                    1fr;

            }

            .summary {

                position:
                    static;

            }

        }


        @media(max-width: 600px) {

            .nav-container {

                flex-direction:
                    column;

                gap:
                    12px;

                padding:
                    10px 0;

            }

            .navbar {

                height:
                    auto;

            }

            .nav-menu {

                gap:
                    16px;

                flex-wrap:
                    wrap;

                justify-content:
                    center;

            }

            .cart-item {

                grid-template-columns:
                    80px 1fr;

            }

            .product-image {

                width:
                    80px;

                height:
                    80px;

            }

            .item-total {

                grid-column:
                    2;

                text-align:
                    left;

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

                    foreach (session('cart', []) as $item) {
                        $cartCount += $item['quantity'];
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


    <h1 class="page-title">
        Keranjang Belanja
    </h1>

    <p class="page-subtitle">
        Periksa kembali produk yang ingin kamu beli.
    </p>


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    @if(session('error'))

        <div class="alert alert-error">
            {{ session('error') }}
        </div>

    @endif


    @if(empty($cart))

        <div class="empty">

            <div class="empty-icon">
                🛒
            </div>

            <h2>
                Keranjang masih kosong
            </h2>

            <p>
                Yuk pilih jersey favoritmu terlebih dahulu.
            </p>

            <a href="{{ route('products.index') }}">
                Belanja Sekarang
            </a>

        </div>

    @else


        <div class="cart-layout">


            {{-- =========================
                 ITEM
            ========================= --}}

            <div class="cart-card">

                @foreach($cart as $item)

                    <div class="cart-item">


                        <div class="product-image">

                            @if($item['image'])

                                <img
                                    src="{{ asset('storage/' . $item['image']) }}"
                                    alt="{{ $item['name'] }}"
                                >

                            @else

                                <span>
                                    No Image
                                </span>

                            @endif

                        </div>


                        <div>

                            <div class="product-name">
                                {{ $item['name'] }}
                            </div>

                            <div class="product-price">

                                Rp
                                {{ number_format($item['price'], 0, ',', '.') }}

                            </div>


                            <form
                                action="{{ route('cart.update', $item['id']) }}"
                                method="POST"
                                class="quantity-form"
                            >

                                @csrf

                                @method('PATCH')


                                <button
                                    type="button"
                                    onclick="ubahJumlah(this, -1)"
                                >
                                    −
                                </button>


                                <input
                                    type="number"
                                    name="quantity"
                                    value="{{ $item['quantity'] }}"
                                    min="1"
                                >


                                <button
                                    type="button"
                                    onclick="ubahJumlah(this, 1)"
                                >
                                    +
                                </button>

                            </form>

                        </div>


                        <div class="item-total">

                            <div class="total-price">

                                Rp
                                {{ number_format(
                                    $item['price'] * $item['quantity'],
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </div>


                            <form
                                action="{{ route('cart.remove', $item['id']) }}"
                                method="POST"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="remove-btn"
                                >
                                    🗑 Hapus
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>



            {{-- =========================
                 SUMMARY
            ========================= --}}

            <div class="summary">

                <h2>
                    Ringkasan Pesanan
                </h2>


                <div class="summary-row">

                    <span>
                        Produk
                    </span>

                    <span>
                        {{ count($cart) }} item
                    </span>

                </div>


                <div class="summary-row">

                    <span>
                        Pengiriman
                    </span>

                    <span>
                        Gratis
                    </span>

                </div>


                <div class="summary-total">

                    <span>
                        Total
                    </span>

                    <span>

                        Rp
                        {{ number_format(
                            $total,
                            0,
                            ',',
                            '.'
                        ) }}

                    </span>

                </div>


                <a
                    href="{{ route('checkout.index') }}"
                    class="btn btn-checkout"
                >
                    ⚡ Lanjut Checkout
                </a>


                <a
                    href="{{ route('products.index') }}"
                    class="btn btn-continue"
                >
                    ← Lanjut Belanja
                </a>


                <form
                    action="{{ route('cart.clear') }}"
                    method="POST"
                    onsubmit="return confirm('Kosongkan seluruh keranjang?')"
                >

                    @csrf

                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-clear"
                    >
                        🗑 Kosongkan Keranjang
                    </button>

                </form>

            </div>


        </div>

    @endif


</main>


<footer>

    <strong>
        ⚽ DEV STORE
    </strong>

    <p>
        © {{ date('Y') }} DEV STORE. All Rights Reserved.
    </p>

</footer>



<script>

function ubahJumlah(button, perubahan)
{
    const form =
        button.closest('form');

    const input =
        form.querySelector('input[name="quantity"]');

    let jumlah =
        parseInt(input.value) || 1;

    jumlah += perubahan;

    if (jumlah < 1) {
        jumlah = 1;
    }

    input.value = jumlah;

    form.submit();
}

</script>


</body>

</html>