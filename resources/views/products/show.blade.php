<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $product->name }} - Jersey Store</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f5f5;
            color: #222;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            background: #111;
            color: white;
            height: 72px;
            display: flex;
            align-items: center;
        }

        .nav-container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            text-decoration: none;
            font-size: 25px;
            font-weight: bold;
        }

        .logo-icon {
            font-size: 28px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            transition: 0.2s;
        }

        .nav-menu a:hover {
            color: #ccc;
        }

        /* =========================
           CONTAINER
        ========================= */

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 45px auto;
        }

        .back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #555;
            font-size: 15px;
            margin-bottom: 22px;
        }

        .back:hover {
            color: #111;
        }

        /* =========================
           PRODUCT CARD
        ========================= */

        .product-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            display: grid;
            grid-template-columns: 48% 52%;
        }

        /* =========================
           IMAGE
        ========================= */

        .product-image-section {
            background: #f1f1f1;
            min-height: 550px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .product-image {
            width: 100%;
            max-width: 480px;
            max-height: 500px;
            object-fit: contain;
            border-radius: 12px;
        }

        .no-image {
            width: 100%;
            max-width: 420px;
            height: 420px;
            background: #ddd;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
            font-size: 18px;
        }

        /* =========================
           DETAIL
        ========================= */

        .product-detail {
            padding: 45px;
        }

        .badge {
            display: inline-block;
            background: #111;
            color: white;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .product-name {
            font-size: 34px;
            line-height: 1.2;
            margin-bottom: 15px;
            color: #111;
        }

        .price {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 25px;
            color: #111;
        }

        .info-list {
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
            margin-bottom: 25px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #777;
            font-size: 15px;
        }

        .info-value {
            font-weight: bold;
            color: #222;
            text-align: right;
        }

        .stock-available {
            display: inline-block;
            background: #e5f8ec;
            color: #168344;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
        }

        .stock-empty {
            display: inline-block;
            background: #fde8e8;
            color: #c62828;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
        }

        /* =========================
           DESCRIPTION
        ========================= */

        .description-title {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .description {
            color: #666;
            line-height: 1.7;
            font-size: 15px;
            margin-bottom: 30px;
            white-space: pre-line;
        }

        /* =========================
           BUTTON
        ========================= */

        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            border: none;
            border-radius: 8px;
            padding: 12px 18px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: 0.2s;
        }

        .btn:hover {
            transform: translateY(-1px);
            opacity: 0.9;
        }

        .btn-back {
            background: #eee;
            color: #222;
        }

        .btn-edit {
            background: #2563eb;
            color: white;
        }

        .btn-delete {
            background: #dc2626;
            color: white;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            background: #111;
            color: white;
            text-align: center;
            padding: 28px 20px;
            margin-top: 70px;
        }

        .footer p {
            font-size: 14px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 800px) {

            .navbar {
                height: auto;
                padding: 18px 0;
            }

            .nav-container {
                flex-direction: column;
                gap: 18px;
            }

            .nav-menu {
                gap: 18px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .product-card {
                grid-template-columns: 1fr;
            }

            .product-image-section {
                min-height: 400px;
            }

            .product-detail {
                padding: 30px;
            }

            .product-name {
                font-size: 28px;
            }

            .price {
                font-size: 26px;
            }
        }

        @media (max-width: 500px) {

            .container {
                width: 94%;
                margin: 25px auto;
            }

            .product-image-section {
                padding: 25px;
                min-height: 330px;
            }

            .product-detail {
                padding: 22px;
            }

            .product-name {
                font-size: 24px;
            }

            .price {
                font-size: 23px;
            }

            .info-item {
                align-items: flex-start;
                gap: 15px;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
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

            <a href="{{ url('/') }}" class="logo">
                <span class="logo-icon">⚽</span>
                <span>Jersey Store</span>
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

                @auth
                    <a href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                @endauth

            </div>

        </div>
    </nav>


    {{-- =========================
         CONTENT
    ========================= --}}

    <main class="container">

        <a href="{{ route('products.index') }}" class="back">
            ← Kembali ke Produk
        </a>


        <div class="product-card">

            {{-- =========================
                 PRODUCT IMAGE
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
                 PRODUCT DETAIL
            ========================= --}}

            <div class="product-detail">

                <span class="badge">
                    ⚽ Jersey Store
                </span>


                <h1 class="product-name">
                    {{ $product->name }}
                </h1>


                <div class="price">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </div>


                {{-- INFO PRODUK --}}

                <div class="info-list">

                    <div class="info-item">

                        <span class="info-label">
                            Stok
                        </span>

                        <span class="info-value">

                            @if($product->stock > 0)

                                <span class="stock-available">
                                    {{ $product->stock }} tersedia
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
                            Slug
                        </span>

                        <span class="info-value">
                            {{ $product->slug }}
                        </span>

                    </div>


                    <div class="info-item">

                        <span class="info-label">
                            Ditambahkan
                        </span>

                        <span class="info-value">
                            {{ $product->created_at ? $product->created_at->format('d/m/Y') : '-' }}
                        </span>

                    </div>


                    <div class="info-item">

                        <span class="info-label">
                            Diperbarui
                        </span>

                        <span class="info-value">
                            {{ $product->updated_at ? $product->updated_at->format('d/m/Y') : '-' }}
                        </span>

                    </div>

                </div>


                {{-- DESKRIPSI --}}

                <h2 class="description-title">
                    Deskripsi Produk
                </h2>

                <div class="description">

                    @if($product->description)

                        {{ $product->description }}

                    @else

                        Belum ada deskripsi untuk produk ini.

                    @endif

                </div>


                {{-- =========================
                     ACTION BUTTON
                ========================= --}}

                <div class="actions">

                    <a
                        href="{{ route('products.index') }}"
                        class="btn btn-back"
                    >
                        ← Kembali
                    </a>


                    <a
                        href="{{ route('products.edit', $product->id) }}"
                        class="btn btn-edit"
                    >
                        ✏️ Edit Produk
                    </a>


                    <form
                        action="{{ route('products.destroy', $product->id) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus produk {{ addslashes($product->name) }}? Produk yang dihapus tidak dapat dikembalikan.');"
                    >

                        @csrf

                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-delete"
                        >
                            🗑️ Hapus Produk
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </main>


    {{-- =========================
         FOOTER
    ========================= --}}

    <footer class="footer">

        <p>
            © {{ date('Y') }} Jersey Store. All Rights Reserved.
        </p>

    </footer>

</body>
</html>