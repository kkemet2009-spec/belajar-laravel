<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Produk Jersey</title>

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
            max-width: 1200px;
            margin: 40px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 32px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            background: #111;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .btn:hover {
            background: #333;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 25px;
        }

        .product-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            background: #ddd;
        }

        .product-content {
            padding: 20px;
        }

        .product-content h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .price {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .stock {
            color: #666;
            margin-bottom: 15px;
        }

        .empty {
            text-align: center;
            background: white;
            padding: 50px;
            border-radius: 12px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>⚽ Koleksi Jersey</h1>

        <a href="{{ route('products.create') }}" class="btn">
            + Tambah Produk
        </a>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if($products->count() > 0)

        <div class="products">

            @foreach($products as $product)

                <div class="product-card">

                    @if($product->image)
                        <img
    src="{{ asset('storage/' . $product->image) }}"
    alt="{{ $product->name }}"
    class="product-image"
>
                    @else
                        <div class="product-image"></div>
                    @endif

                    <div class="product-content">

                        <h2>
                            {{ $product->name }}
                        </h2>

                        <div class="price">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>

                        <div class="stock">
                            Stok: {{ $product->stock }}
                        </div>

                        <a
                            href="{{ route('products.show', $product) }}"
                            class="btn"
                        >
                            Lihat Detail
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="empty">
            <h2>Belum ada produk 😔</h2>

            <p>
                Silakan tambahkan produk jersey pertama.
            </p>
        </div>

    @endif

</div>

</body>
</html>