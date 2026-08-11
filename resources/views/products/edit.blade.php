<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Produk - Jersey Store</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f5f5;
            color: #111;
        }

        /* NAVBAR */
        .navbar {
            background: #111;
            color: white;
            min-height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
        }

        .logo {
            color: white;
            text-decoration: none;
            font-size: 26px;
            font-weight: bold;
        }

        .nav-menu {
            display: flex;
            gap: 30px;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        .nav-menu a:hover {
            color: #aaa;
        }

        /* CONTAINER */
        .container {
            max-width: 1000px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .breadcrumb {
            margin-bottom: 20px;
            color: #777;
            font-size: 14px;
        }

        .breadcrumb a {
            color: #111;
            text-decoration: none;
            font-weight: bold;
        }

        .page-title {
            margin-bottom: 25px;
        }

        .page-title h1 {
            margin: 0 0 8px;
            font-size: 32px;
        }

        .page-title p {
            margin: 0;
            color: #777;
        }

        /* FORM CARD */
        .form-card {
            background: white;
            border-radius: 15px;
            padding: 35px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .full {
            grid-column: 1 / -1;
        }

        .form-group {
            margin-bottom: 5px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 15px;
        }

        .required {
            color: #dc2626;
        }

        input,
        textarea {
            width: 100%;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 12px 14px;
            font-size: 15px;
            font-family: inherit;
            outline: none;
            background: white;
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

        .error {
            margin-top: 6px;
            color: #dc2626;
            font-size: 13px;
        }

        /* CURRENT IMAGE */
        .current-image {
            margin-top: 10px;
            padding: 15px;
            background: #f8f8f8;
            border-radius: 10px;
            border: 1px solid #eee;
        }

        .current-image p {
            margin: 0 0 10px;
            color: #666;
            font-size: 14px;
        }

        .current-image img {
            width: 150px;
            height: 150px;
            object-fit: contain;
            background: white;
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 8px;
        }

        .file-info {
            margin-top: 8px;
            color: #777;
            font-size: 13px;
        }

        /* BUTTON */
        .buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #eee;
        }

        .left-buttons,
        .right-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-back {
            background: #eee;
            color: #222;
        }

        .btn-back:hover {
            background: #ddd;
        }

        .btn-view {
            background: #f3f4f6;
            color: #222;
        }

        .btn-view:hover {
            background: #e5e7eb;
        }

        .btn-save {
            background: #2563eb;
            color: white;
        }

        .btn-save:hover {
            background: #1d4ed8;
        }

        /* FOOTER */
        .footer {
            margin-top: 70px;
            background: #111;
            color: white;
            text-align: center;
            padding: 30px 20px;
        }

        /* RESPONSIVE */
        @media (max-width: 800px) {
            .navbar {
                padding: 20px;
                flex-direction: column;
                gap: 20px;
            }

            .nav-menu {
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }

            .form-card {
                padding: 25px 20px;
            }

            .buttons {
                flex-direction: column;
                align-items: stretch;
            }

            .left-buttons,
            .right-buttons {
                width: 100%;
            }

            .btn {
                text-align: center;
                flex: 1;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar">

        <a href="{{ url('/') }}" class="logo">
            ⚽ Jersey Store
        </a>

        <div class="nav-menu">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('products.index') }}">Produk</a>
            <a href="{{ route('articles.index') }}">Artikel</a>
            <a href="{{ url('/contact') }}">Kontak</a>

            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
            @endauth
        </div>

    </nav>


    {{-- CONTENT --}}
    <main class="container">

        <div class="breadcrumb">
            <a href="{{ route('products.index') }}">Produk</a>
            &nbsp; / &nbsp;
            <a href="{{ route('products.show', $product) }}">
                {{ $product->name }}
            </a>
            &nbsp; / &nbsp;
            Edit
        </div>


        <div class="page-title">
            <h1>✏ Edit Produk</h1>
            <p>Perbarui informasi produk Jersey Store.</p>
        </div>


        {{-- VALIDATION ERROR --}}
        @if ($errors->any())
            <div style="
                background:#fee2e2;
                color:#991b1b;
                padding:15px;
                border-radius:8px;
                margin-bottom:20px;
            ">
                <strong>Periksa kembali data berikut:</strong>

                <ul style="margin:8px 0 0 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="form-card">

            <form
                action="{{ route('products.update', $product) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                <div class="form-grid">

                    {{-- NAMA --}}
                    <div class="form-group full">

                        <label for="name">
                            Nama Produk <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name', $product->name) }}"
                            placeholder="Contoh: Real Madrid 26/27 Home Jersey"
                            required
                        >

                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror

                    </div>


                    {{-- HARGA --}}
                    <div class="form-group">

                        <label for="price">
                            Harga <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            id="price"
                            name="price"
                            value="{{ old('price', $product->price) }}"
                            min="0"
                            placeholder="350000"
                            required
                        >

                        @error('price')
                            <div class="error">{{ $message }}</div>
                        @enderror

                    </div>


                    {{-- STOK --}}
                    <div class="form-group">

                        <label for="stock">
                            Stok <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            id="stock"
                            name="stock"
                            value="{{ old('stock', $product->stock) }}"
                            min="0"
                            placeholder="20"
                            required
                        >

                        @error('stock')
                            <div class="error">{{ $message }}</div>
                        @enderror

                    </div>


                    {{-- DESKRIPSI --}}
                    <div class="form-group full">

                        <label for="description">
                            Deskripsi Produk
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            placeholder="Masukkan deskripsi produk..."
                        >{{ old('description', $product->description) }}</textarea>

                        @error('description')
                            <div class="error">{{ $message }}</div>
                        @enderror

                    </div>


                    {{-- GAMBAR --}}
                    <div class="form-group full">

                        <label for="image">
                            Gambar Produk
                        </label>

                        @if($product->image)

                            <div class="current-image">

                                <p>Gambar saat ini:</p>

                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                >

                            </div>

                        @else

                            <div class="current-image">
                                <p>Produk belum memiliki gambar.</p>
                            </div>

                        @endif


                        <input
                            type="file"
                            id="image"
                            name="image"
                            accept="image/jpeg,image/png,image/webp"
                            style="margin-top:12px;"
                        >

                        <div class="file-info">
                            Kosongkan jika tidak ingin mengganti gambar.
                            Maksimal 2 MB.
                        </div>

                        @error('image')
                            <div class="error">{{ $message }}</div>
                        @enderror

                    </div>

                </div>


                {{-- BUTTON --}}
                <div class="buttons">

                    <div class="left-buttons">

                        <a
                            href="{{ route('products.index') }}"
                            class="btn btn-back"
                        >
                            ← Kembali
                        </a>

                        <a
                            href="{{ route('products.show', $product) }}"
                            class="btn btn-view"
                        >
                            👁 Lihat
                        </a>

                    </div>


                    <div class="right-buttons">

                        <button
                            type="submit"
                            class="btn btn-save"
                        >
                            💾 Simpan Perubahan
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </main>


    {{-- FOOTER --}}
    <footer class="footer">
        © {{ date('Y') }} Jersey Store. All Rights Reserved.
    </footer>

</body>
</html>