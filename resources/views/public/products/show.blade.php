@extends('layouts.app')

@section('title', $product->name . ' - Jersey Store')

@section('content')

<style>
    .detail-page {
        background: #f5f5f5;
        min-height: 70vh;
        padding: 50px 7%;
    }

    .back-button {
        display: inline-block;
        margin-bottom: 25px;
        color: #555;
        text-decoration: none;
        font-weight: 600;
    }

    .back-button:hover {
        color: #111;
    }

    .detail-card {
        max-width: 1000px;
        margin: auto;
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 5px 25px rgba(0,0,0,.08);
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    .detail-image {
        min-height: 500px;
        background: #f1f1f1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px;
    }

    .detail-image img {
        width: 100%;
        height: 440px;
        object-fit: contain;
    }

    .no-image {
        color: #999;
        font-size: 16px;
    }

    .detail-info {
        padding: 45px;
    }

    .detail-info h1 {
        font-size: 34px;
        color: #111;
        margin-bottom: 15px;
    }

    .price {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 25px;
    }

    .stock {
        display: inline-block;
        padding: 8px 14px;
        border-radius: 20px;
        background: #e8f7ee;
        color: #168344;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 25px;
    }

    .description-title {
        font-size: 17px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .description {
        color: #666;
        line-height: 1.7;
        margin-bottom: 25px;
    }

    .slug {
        background: #f5f5f5;
        padding: 12px;
        border-radius: 8px;
        font-size: 13px;
        color: #666;
        margin-bottom: 25px;
        word-break: break-all;
    }

    .actions {
        display: flex;
        gap: 10px;
    }

    .btn {
        padding: 12px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 700;
        display: inline-block;
    }

    .btn-edit {
        background: #2563eb;
        color: white;
    }

    .btn-edit:hover {
        background: #1d4ed8;
    }

    .btn-back {
        background: #111;
        color: white;
    }

    .btn-back:hover {
        background: #333;
    }

    @media (max-width: 800px) {
        .detail-card {
            grid-template-columns: 1fr;
        }

        .detail-image {
            min-height: 350px;
        }

        .detail-image img {
            height: 320px;
        }

        .detail-info {
            padding: 30px;
        }
    }
</style>

<div class="detail-page">

    <a href="{{ route('products.index') }}" class="back-button">
        ← Kembali ke Produk
    </a>

    <div class="detail-card">

        {{-- FOTO --}}
        <div class="detail-image">

            @if($product->image)

                <img
                    src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->name }}"
                >

            @else

                <span class="no-image">
                    Tidak ada gambar produk
                </span>

            @endif

        </div>


        {{-- INFORMASI --}}
        <div class="detail-info">

            <h1>
                {{ $product->name }}
            </h1>

            <div class="price">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </div>

            <div class="stock">

                @if($product->stock > 0)
                    {{ $product->stock }} tersedia
                @else
                    Stok habis
                @endif

            </div>

            <div class="description-title">
                Deskripsi
            </div>

            <div class="description">

                {{ $product->description ?? 'Tidak ada deskripsi produk.' }}

            </div>

            <div class="description-title">
                Slug Produk
            </div>

            <div class="slug">
                {{ $product->slug }}
            </div>


            <div class="actions">

                <a
                    href="{{ route('products.index') }}"
                    class="btn btn-back"
                >
                    Kembali
                </a>

                <a
                    href="{{ route('products.edit', $product) }}"
                    class="btn btn-edit"
                >
                    Edit Produk
                </a>

            </div>

        </div>

    </div>

</div>

@endsection