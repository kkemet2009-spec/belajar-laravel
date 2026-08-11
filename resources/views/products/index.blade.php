@extends('layouts.app')

@section('content')

<style>
    .product-page {
        min-height: 70vh;
        background: #f5f5f5;
        padding: 45px 20px 60px;
    }

    .product-container {
        max-width: 1150px;
        margin: auto;
    }

    .product-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .product-title h1 {
        margin: 0;
        font-size: 32px;
        font-weight: 700;
        color: #111;
    }

    .product-title p {
        margin-top: 7px;
        color: #777;
        font-size: 15px;
    }

    .add-product {
        background: #111;
        color: white;
        text-decoration: none;
        padding: 13px 20px;
        border-radius: 8px;
        font-weight: 600;
        transition: .2s;
    }

    .add-product:hover {
        background: #333;
    }

    .alert-success {
        background: #e8f8ee;
        color: #168345;
        border: 1px solid #bce5cb;
        padding: 14px 18px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .product-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 3px 15px rgba(0,0,0,.06);
    }

    .table-header {
        padding: 20px 25px;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .table-header h2 {
        margin: 0;
        font-size: 21px;
        color: #222;
    }

    .product-count {
        color: #777;
        font-size: 14px;
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .product-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px;
    }

    .product-table th {
        background: #fafafa;
        padding: 16px 18px;
        text-align: left;
        font-size: 12px;
        color: #666;
        font-weight: 700;
        border-bottom: 1px solid #eee;
    }

    .product-table td {
        padding: 18px;
        border-bottom: 1px solid #eee;
        vertical-align: middle;
    }

    .product-table tr:last-child td {
        border-bottom: none;
    }

    .product-table tbody tr:hover {
        background: #fafafa;
    }

    .product-info {
        display: flex;
        align-items: center;
        gap: 15px;
        min-width: 280px;
    }

    .product-image {
        width: 65px;
        height: 65px;
        border-radius: 8px;
        background: #f2f2f2;
        object-fit: cover;
        border: 1px solid #eee;
        flex-shrink: 0;
    }

    .no-image {
        width: 65px;
        height: 65px;
        border-radius: 8px;
        background: #f2f2f2;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 27px;
        flex-shrink: 0;
    }

    .product-name {
        font-weight: 700;
        color: #222;
        font-size: 15px;
    }

    .product-description {
        color: #888;
        font-size: 13px;
        margin-top: 5px;
        max-width: 280px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .price {
        font-weight: 700;
        color: #111;
        white-space: nowrap;
    }

    .stock {
        display: inline-block;
        padding: 6px 11px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
    }

    .stock-good {
        background: #e6f7ed;
        color: #16834a;
    }

    .stock-low {
        background: #fff3d6;
        color: #a56a00;
    }

    .stock-empty {
        background: #fde7e7;
        color: #d32f2f;
    }

    .date {
        color: #666;
        font-size: 14px;
        white-space: nowrap;
    }

    .actions {
        display: flex;
        gap: 6px;
        justify-content: flex-end;
    }

    .btn {
        border: none;
        text-decoration: none;
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        display: inline-block;
    }

    .btn-view {
        background: #f1f1f1;
        color: #333;
    }

    .btn-view:hover {
        background: #ddd;
    }

    .btn-edit {
        background: #2867df;
        color: white;
    }

    .btn-edit:hover {
        background: #1e54bd;
    }

    .btn-delete {
        background: #dc2626;
        color: white;
    }

    .btn-delete:hover {
        background: #b91c1c;
    }

    .empty {
        text-align: center;
        padding: 70px 20px;
        color: #777;
    }

    .empty-icon {
        font-size: 45px;
        margin-bottom: 15px;
    }

    .empty h3 {
        color: #222;
        margin-bottom: 8px;
    }

    @media (max-width: 700px) {

        .product-page {
            padding: 30px 12px 40px;
        }

        .product-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 18px;
        }

        .product-title h1 {
            font-size: 27px;
        }

        .add-product {
            width: 100%;
            text-align: center;
        }

        .table-header {
            padding: 17px;
        }
    }
</style>


<div class="product-page">

    <div class="product-container">

        {{-- HEADER --}}
        <div class="product-header">

            <div class="product-title">
                <h1>Produk Jersey</h1>

                <p>
                    Kelola koleksi jersey Jersey Store.
                </p>
            </div>

            <a href="{{ route('products.create') }}"
               class="add-product">
                + Tambah Produk
            </a>

        </div>


        {{-- SUCCESS --}}
        @if(session('success'))

            <div class="alert-success">
                ✓ {{ session('success') }}
            </div>

        @endif


        {{-- CARD --}}
        <div class="product-card">

            <div class="table-header">

                <h2>Daftar Produk</h2>

                <span class="product-count">
                    {{ $products->count() }} produk
                </span>

            </div>


            @if($products->count() > 0)

                <div class="table-wrapper">

                    <table class="product-table">

                        <thead>

                            <tr>

                                <th width="60">NO</th>

                                <th>PRODUK</th>

                                <th>HARGA</th>

                                <th>STOK</th>

                                <th>TANGGAL</th>

                                <th style="text-align:right;">
                                    AKSI
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($products as $index => $product)

                                <tr>

                                    {{-- NO --}}
                                    <td>
                                        {{ $index + 1 }}
                                    </td>


                                    {{-- PRODUK --}}
                                    <td>

                                        <div class="product-info">

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


                                            <div>

                                                <div class="product-name">
                                                    {{ $product->name }}
                                                </div>

                                                <div class="product-description">

                                                    {{ $product->description ?: 'Tidak ada deskripsi' }}

                                                </div>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- HARGA --}}
                                    <td>

                                        <span class="price">

                                            Rp {{ number_format($product->price, 0, ',', '.') }}

                                        </span>

                                    </td>


                                    {{-- STOK --}}
                                    <td>

                                        @if($product->stock > 10)

                                            <span class="stock stock-good">
                                                {{ $product->stock }} tersedia
                                            </span>

                                        @elseif($product->stock > 0)

                                            <span class="stock stock-low">
                                                {{ $product->stock }} tersisa
                                            </span>

                                        @else

                                            <span class="stock stock-empty">
                                                Habis
                                            </span>

                                        @endif

                                    </td>


                                    {{-- TANGGAL --}}
                                    <td>

                                        <span class="date">

                                            {{ $product->created_at
                                                ? $product->created_at->format('d/m/Y')
                                                : '-' }}

                                        </span>

                                    </td>


                                    {{-- AKSI --}}
                                    <td>

                                        <div class="actions">

                                            {{-- LIHAT --}}
                                            <a
                                                href="{{ route('products.show', $product) }}"
                                                class="btn btn-view"
                                            >
                                                Lihat
                                            </a>


                                            {{-- EDIT --}}
                                            <a
                                                href="{{ route('products.edit', $product) }}"
                                                class="btn btn-edit"
                                            >
                                                Edit
                                            </a>


                                            {{-- HAPUS --}}
                                            <form
                                                action="{{ route('products.destroy', $product) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus produk ini?');"
                                                style="display:inline;"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-delete"
                                                >
                                                    Hapus
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                {{-- KOSONG --}}
                <div class="empty">

                    <div class="empty-icon">
                        ⚽
                    </div>

                    <h3>
                        Belum ada produk
                    </h3>

                    <p>
                        Tambahkan produk jersey pertama kamu.
                    </p>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection