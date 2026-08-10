<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Produk Jersey</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            color: #222;
        }

        .container {
            width: 90%;
            max-width: 700px;
            margin: 40px auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        h1 {
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .current-image {
            margin-bottom: 15px;
        }

        .current-image img {
            width: 180px;
            height: 180px;
            object-fit: contain;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-size: 15px;
        }

        .btn-primary {
            background: #111;
            color: white;
        }

        .btn-secondary {
            background: #ddd;
            color: #222;
        }

        .btn:hover {
            opacity: 0.85;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>✏️ Edit Produk Jersey</h1>

        @if($errors->any())
            <div class="error">

                <strong>Ada kesalahan:</strong>

                <ul style="margin-top: 10px; margin-left: 20px;">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>
        @endif

        <form
            action="{{ route('products.update', $product) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')


            {{-- NAMA --}}
            <div class="form-group">

                <label>Nama Jersey</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $product->name) }}"
                    required
                >

            </div>


            {{-- SLUG --}}
            <div class="form-group">

                <label>Slug</label>

                <input
                    type="text"
                    name="slug"
                    value="{{ old('slug', $product->slug) }}"
                    required
                >

            </div>


            {{-- HARGA --}}
            <div class="form-group">

                <label>Harga</label>

                <input
                    type="number"
                    name="price"
                    value="{{ old('price', $product->price) }}"
                    required
                >

            </div>


            {{-- STOK --}}
            <div class="form-group">

                <label>Stok</label>

                <input
                    type="number"
                    name="stock"
                    value="{{ old('stock', $product->stock) }}"
                    required
                >

            </div>


            {{-- FOTO --}}
            <div class="form-group">

                <label>Foto Jersey</label>

                @if($product->image)

                    <div class="current-image">

                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                        >

                    </div>

                @endif

                <input
                    type="file"
                    name="image"
                    accept=".jpg,.jpeg,.png,.webp"
                >

                <small style="display:block; margin-top:8px; color:#666;">
                    Kosongkan jika tidak ingin mengganti foto.
                </small>

            </div>


            {{-- DESKRIPSI --}}
            <div class="form-group">

                <label>Deskripsi</label>

                <textarea
                    name="description"
                >{{ old('description', $product->description) }}</textarea>

            </div>


            {{-- BUTTON --}}
            <div class="buttons">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    💾 Simpan Perubahan
                </button>

                <a
                    href="{{ route('products.show', $product) }}"
                    class="btn btn-secondary"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>