<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $product->name }} - Jersey Store</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f6f8;
            color: #171717;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            background: #111;
            height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
            color: white;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 25px;
            font-weight: bold;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        .nav-menu {
            display: flex;
            gap: 30px;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            transition: 0.2s;
        }

        .nav-menu a:hover {
            color: #3b82f6;
        }

        /* ================= CONTAINER ================= */

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .back {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            text-decoration: none;
            color: #555;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .back:hover {
            color: #2563eb;
        }

        /* ================= PRODUCT ================= */

        .product-card {
            background: white;
            border-radius: 22px;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr 1fr;
            box-shadow: 0 10px 35px rgba(0,0,0,0.08);
        }

        /* ================= IMAGE ================= */

        .product-image {
            background: #f1f1f1;
            min-height: 560px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 45px;
        }

        .product-image img {
            width: 100%;
            max-width: 480px;
            max-height: 520px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .product-image img:hover {
            transform: scale(1.04);
        }

        .no-image {
            color: #888;
            text-align: center;
        }

        .no-image-icon {
            font-size: 70px;
            margin-bottom: 15px;
        }

        /* ================= INFO ================= */

        .product-info {
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .badge {
            display: inline-block;
            width: fit-content;
            background: #e8f1ff;
            color: #2563eb;
            padding: 8px 14px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 18px;
        }

        .product-title {
            font-size: 38px;
            line-height: 1.15;
            margin-bottom: 18px;
        }

        .rating {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            color: #666;
        }

        .stars {
            color: #f59e0b;
            font-size: 18px;
        }

        .price {
            font-size: 34px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .stock {
            display: inline-flex;
            width: fit-content;
            padding: 9px 15px;
            border-radius: 30px;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .stock.available {
            background: #dcfce7;
            color: #15803d;
        }

        .stock.empty {
            background: #fee2e2;
            color: #dc2626;
        }

        .section-title {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .description {
            color: #666;
            line-height: 1.8;
            margin-bottom: 28px;
        }

        /* ================= PURCHASE ================= */

        .purchase-box {
            border-top: 1px solid #eee;
            padding-top: 25px;
        }

        .quantity-label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }

        .quantity {
            display: flex;
            align-items: center;
            width: 135px;
            height: 44px;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 18px;
        }

        .quantity button {
            width: 40px;
            height: 100%;
            border: none;
            background: #f3f3f3;
            font-size: 20px;
            cursor: pointer;
        }

        .quantity input {
            width: 55px;
            height: 100%;
            border: none;
            text-align: center;
            font-size: 16px;
            outline: none;
        }

        .buttons {
            display: flex;
            gap: 12px;
        }

        .btn {
            border: none;
            border-radius: 11px;
            padding: 14px 20px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: 0.2s;
        }

        .btn-cart {
            background: #111;
            color: white;
            flex: 1;
        }

        .btn-buy {
            background: #2563eb;
            color: white;
            flex: 1;
        }

        .btn-favorite {
            width: 50px;
            background: #f3f4f6;
            color: #222;
            font-size: 20px;
        }

        .btn:hover {
            transform: translateY(-2px);
            opacity: 0.92;
        }

        .btn:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
        }

        /* ================= GUARANTEE ================= */

        .guarantee {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-top: 25px;
        }

        .guarantee-item {
            background: #f8f8f8;
            padding: 13px;
            border-radius: 10px;
            text-align: center;
            font-size: 12px;
            color: #555;
        }

        .guarantee-icon {
            display: block;
            font-size: 22px;
            margin-bottom: 5px;
        }

        /* ================= FOOTER ================= */

        footer {
            background: #111;
            color: white;
            text-align: center;
            padding: 30px;
            margin-top: 70px;
        }

        footer p {
            color: #bbb;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 850px) {

            .navbar {
                padding: 0 5%;
            }

            .nav-menu {
                gap: 15px;
            }

            .product-card {
                grid-template-columns: 1fr;
            }

            .product-image {
                min-height: 400px;
            }

            .product-info {
                padding: 35px 25px;
            }

            .product-title {
                font-size: 30px;
            }
        }

        @media (max-width: 600px) {

            .navbar {
                height: auto;
                padding: 18px 5%;
                flex-direction: column;
                gap: 15px;
            }

            .nav-menu {
                flex-wrap: wrap;
                justify-content: center;
            }

            .container {
                width: 94%;
                margin-top: 25px;
            }

            .product-image {
                min-height: 330px;
                padding: 25px;
            }

            .product-info {
                padding: 28px 20px;
            }

            .product-title {
                font-size: 27px;
            }

            .price {
                font-size: 28px;
            }

            .buttons {
                flex-wrap: wrap;
            }

            .btn-cart,
            .btn-buy {
                flex: 1 1 45%;
            }

            .guarantee {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<!-- ================= NAVBAR ================= -->

<header class="navbar">

    <div class="logo">
        <div class="logo-icon">⚽</div>
        Jersey Store
    </div>

    <nav class="nav-menu">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/produk') }}">Produk</a>
        <a href="{{ url('/articles') }}">Artikel</a>
        <a href="{{ url('/kontak') }}">Kontak</a>
    </nav>

</header>


<!-- ================= CONTENT ================= -->

<main class="container">

    <a href="{{ url('/produk') }}" class="back">
        ← Kembali ke Katalog
    </a>

    <div class="product-card">

        <!-- FOTO PRODUK -->

        <div class="product-image">

            @if($product->image)

                <img
                    src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->name }}"
                >

            @else

                <div class="no-image">

                    <div class="no-image-icon">
                        👕
                    </div>

                    <p>Foto produk belum tersedia</p>

                </div>

            @endif

        </div>


        <!-- INFORMASI PRODUK -->

        <div class="product-info">

            <span class="badge">
                ⚽ JERSEY ORIGINAL
            </span>

            <h1 class="product-title">
                {{ $product->name }}
            </h1>


            <div class="rating">

                <span class="stars">
                    ★★★★★
                </span>

                <span>
                    Produk Pilihan
                </span>

            </div>


            <div class="price">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </div>


            @if($product->stock > 0)

                <div class="stock available">
                    ✓ {{ $product->stock }} tersedia
                </div>

            @else

                <div class="stock empty">
                    ✕ Stok habis
                </div>

            @endif


            <h3 class="section-title">
                Deskripsi Produk
            </h3>

            <p class="description">
                {{ $product->description ?: 'Jersey berkualitas dengan desain terbaru. Cocok digunakan untuk olahraga, koleksi, maupun aktivitas sehari-hari.' }}
            </p>


            <!-- PEMBELIAN -->

            <div class="purchase-box">

                @if($product->stock > 0)

                    <label class="quantity-label">
                        Jumlah
                    </label>

                    <div class="quantity">

                        <button type="button" onclick="kurang()">
                            −
                        </button>

                        <input
                            type="number"
                            id="quantity"
                            value="1"
                            min="1"
                            max="{{ $product->stock }}"
                        >

                        <button type="button" onclick="tambah()">
                            +
                        </button>

                    </div>


                   <form action="{{ route('cart.add',$product) }}" method="POST">

    @csrf

    <input type="hidden"
           name="quantity"
           id="quantity-input"
           value="1">

    <button class="btn btn-dark w-100 py-3 rounded-3">

        🛒 Tambah Keranjang

    </button>

</form>

                @else

                    <button
                        class="btn"
                        style="width:100%; background:#ddd; color:#777;"
                        disabled
                    >
                        Stok Produk Habis
                    </button>

                @endif

            </div>


            <!-- JAMINAN -->

            <div class="guarantee">

                <div class="guarantee-item">
                    <span class="guarantee-icon">🚚</span>
                    Pengiriman Cepat
                </div>

                <div class="guarantee-item">
                    <span class="guarantee-icon">🛡️</span>
                    Produk Berkualitas
                </div>

                <div class="guarantee-item">
                    <span class="guarantee-icon">💬</span>
                    Layanan Pelanggan
                </div>

            </div>

        </div>

    </div>

</main>


<!-- ================= FOOTER ================= -->

<footer>

    <strong>
        ⚽ Jersey Store
    </strong>

    <p style="margin-top:8px;">
        © {{ date('Y') }} Jersey Store. All Rights Reserved.
    </p>

</footer>


<script>

    const stock = {{ (int) $product->stock }};

    function kurang() {

        const input = document.getElementById('quantity');

        let jumlah = parseInt(input.value) || 1;

        if (jumlah > 1) {
            input.value = jumlah - 1;
        }
    }


    function tambah() {

        const input = document.getElementById('quantity');

        let jumlah = parseInt(input.value) || 1;

        if (jumlah < stock) {
            input.value = jumlah + 1;
        }
    }


    function tambahKeranjang() {

        const jumlah =
            document.getElementById('quantity').value;

        alert(
            '🛒 {{ $product->name }} berhasil ditambahkan ke keranjang sebanyak ' +
            jumlah +
            ' item.'
        );

        /*
         * Nanti bagian ini bisa kita sambungkan
         * ke sistem Cart Laravel.
         */
    }


    function beliSekarang() {

        const jumlah =
            document.getElementById('quantity').value;

        alert(
            '⚡ Pembelian {{ $product->name }} sebanyak ' +
            jumlah +
            ' item siap diproses.'
        );

        /*
         * Nanti bisa diarahkan ke halaman checkout.
         */
    }


    function favorit() {

        alert(
            '❤️ Produk ditambahkan ke favorit!'
        );
    }

</script>

</body>
</html>
```
