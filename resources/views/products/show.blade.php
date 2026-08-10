<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $product->name }}</title>

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
            max-width: 1000px;
            margin: 50px auto;
        }

        .card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .product {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .product-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            background: #ddd;
        }

        .no-image {
            width: 100%;
            height: 500px;
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 80px;
        }

        .content {
            padding: 40px;
        }

        .content h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .price {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .stock {
            margin-bottom: 25px;
            color: #666;
        }

        .description {
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
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

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn:hover {
            opacity: 0.85;
        }

        @media (max-width: 700px) {
            .product {
                grid-template-columns: 1fr;
            }

            .product-image,
            .no-image {
                height: 350px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <div class="product">

            {{-- FOTO PRODUK --}}
            @if($product->image)

                <img
    src="{{ asset('storage/' . $product->image) }}"
    alt="{{ $product->name }}"
    class="product-image"
>

            @else

                <div class="no-image">
                    ⚽
                </div>

            @endif


            {{-- INFORMASI PRODUK --}}
            <div class="content">

                <h1>
                    {{ $product->name }}
                </h1>

                <div class="price">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </div>

                <div class="stock">
                    📦 Stok tersedia: {{ $product->stock }}
                </div>

                <div class="description">

                    <h3>Deskripsi</h3>

                    <p>
                        {{ $product->description ?? 'Belum ada deskripsi produk.' }}
                    </p>

                </div>


                <div class="buttons">

                    <a
                        href="{{ route('products.index') }}"
                        class="btn btn-secondary"
                    >
                        ← Kembali
                    </a>

                    <a
                        href="{{ route('products.edit', $product) }}"
                        class="btn btn-primary"
                    >
                        ✏️ Edit
                    </a>

                    <form
                        action="{{ route('products.destroy', $product) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus produk ini?')"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger"
                        >
                            🗑️ Hapus
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>