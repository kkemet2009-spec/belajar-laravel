@extends('layouts.admin')

@section('title', 'Kelola Produk')
@section('page-title', 'Kelola Produk')

@section('content')

<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        gap: 20px;
    }

    .page-header h1 {
        font-size: 28px;
        color: #111827;
        margin-bottom: 6px;
    }

    .page-header p {
        color: #6b7280;
        margin: 0;
    }

    .btn-add {
        background: #2563eb;
        color: white;
        text-decoration: none;
        padding: 12px 18px;
        border-radius: 10px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: .2s;
        white-space: nowrap;
    }

    .btn-add:hover {
        background: #1d4ed8;
        transform: translateY(-2px);
    }

    /* ALERT */

    .alert-success {
        background: #dcfce7;
        color: #166534;
        border: 1px solid #bbf7d0;
        padding: 14px 18px;
        border-radius: 10px;
        margin-bottom: 22px;
    }

    .alert-error {
        background: #fee2e2;
        color: #991b1b;
        border: 1px solid #fecaca;
        padding: 14px 18px;
        border-radius: 10px;
        margin-bottom: 22px;
    }

    /* TABLE CARD */

    .product-card {
        background: white;
        border-radius: 16px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 5px 20px rgba(0,0,0,.05);
        overflow: hidden;
    }

    .card-header {
        padding: 20px 24px;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-header h2 {
        margin: 0;
        font-size: 19px;
        color: #111827;
    }

    .product-count {
        color: #6b7280;
        font-size: 14px;
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px;
    }

    thead {
        background: #f9fafb;
    }

    th {
        text-align: left;
        padding: 15px 18px;
        font-size: 13px;
        color: #4b5563;
        text-transform: uppercase;
        border-bottom: 1px solid #e5e7eb;
        white-space: nowrap;
    }

    td {
        padding: 18px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    tbody tr {
        transition: .15s;
    }

    tbody tr:hover {
        background: #f9fafb;
    }

    tbody tr:last-child td {
        border-bottom: none;
    }

    /* PRODUCT */

    .product-info {
        display: flex;
        align-items: center;
        gap: 14px;
        min-width: 250px;
    }

    .product-image {
        width: 62px;
        height: 62px;
        border-radius: 10px;
        object-fit: cover;
        background: #f3f4f6;
        border: 1px solid #e5e7eb;
        flex-shrink: 0;
    }

    .product-no-image {
        width: 62px;
        height: 62px;
        border-radius: 10px;
        background: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px;
        flex-shrink: 0;
    }

    .product-name {
        font-weight: 700;
        color: #111827;
        margin-bottom: 5px;
    }

    .product-slug {
        font-size: 12px;
        color: #9ca3af;
    }

    .price {
        font-weight: 700;
        color: #111827;
        white-space: nowrap;
    }

    /* STOCK */

    .stock-badge {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
    }

    .stock-available {
        background: #dcfce7;
        color: #15803d;
    }

    .stock-low {
        background: #fef3c7;
        color: #b45309;
    }

    .stock-empty {
        background: #fee2e2;
        color: #dc2626;
    }

    /* ACTION */

    .actions {
        display: flex;
        gap: 7px;
        flex-wrap: wrap;
    }

    .btn-action {
        border: none;
        text-decoration: none;
        padding: 8px 11px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: .15s;
    }

    .btn-detail {
        background: #eff6ff;
        color: #2563eb;
    }

    .btn-detail:hover {
        background: #dbeafe;
    }

    .btn-edit {
        background: #fef3c7;
        color: #b45309;
    }

    .btn-edit:hover {
        background: #fde68a;
    }

    .btn-delete {
        background: #fee2e2;
        color: #dc2626;
    }

    .btn-delete:hover {
        background: #fecaca;
    }

    /* EMPTY */

    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-icon {
        font-size: 55px;
        margin-bottom: 15px;
    }

    .empty-state h3 {
        margin-bottom: 8px;
        color: #111827;
    }

    .empty-state p {
        color: #6b7280;
        margin-bottom: 20px;
    }

    /* RESPONSIVE */

    @media (max-width: 700px) {

        .page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .btn-add {
            width: 100%;
            justify-content: center;
        }

        .card-header {
            padding: 16px;
        }

        .product-card {
            border-radius: 12px;
        }
    }
</style>


{{-- ============================
     HEADER
============================= --}}

<div class="page-header">

    <div>

        <h1>
            Kelola Produk
        </h1>

        <p>
            Kelola semua koleksi jersey Jersey Store.
        </p>

    </div>


    <a
        href="{{ route('products.create') }}"
        class="btn-add"
    >
        ➕ Tambah Produk
    </a>

</div>


{{-- ============================
     SUCCESS MESSAGE
============================= --}}

@if(session('success'))

    <div class="alert-success">
        ✅ {{ session('success') }}
    </div>

@endif


{{-- ============================
     ERROR MESSAGE
============================= --}}

@if(session('error'))

    <div class="alert-error">
        ❌ {{ session('error') }}
    </div>

@endif


{{-- ============================
     PRODUCT TABLE
============================= --}}

<div class="product-card">

    <div class="card-header">

        <h2>
            📦 Daftar Produk
        </h2>

        <div class="product-count">
            {{ $products->count() }} produk
        </div>

    </div>


    @if($products->count() > 0)

        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>

                        <th style="width: 60px;">
                            No
                        </th>

                        <th>
                            Produk
                        </th>

                        <th>
                            Harga
                        </th>

                        <th>
                            Stok
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @foreach($products as $product)

                        <tr>

                            {{-- NO --}}

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            {{-- PRODUK --}}

                            <td>

                                <div class="product-info">


                                    {{-- GAMBAR --}}

                                    @if($product->image)

                                        <img
                                            src="{{ asset('storage/' . $product->image) }}"
                                            alt="{{ $product->name }}"
                                            class="product-image"
                                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                        >

                                        <div
                                            class="product-no-image"
                                            style="display:none;"
                                        >
                                            ⚽
                                        </div>

                                    @else

                                        <div class="product-no-image">
                                            ⚽
                                        </div>

                                    @endif


                                    {{-- INFO PRODUK --}}

                                    <div>

                                        <div class="product-name">
                                            {{ $product->name }}
                                        </div>

                                        <div class="product-slug">
                                            {{ $product->slug }}
                                        </div>

                                    </div>

                                </div>

                            </td>


                            {{-- HARGA --}}

                            <td>

                                <div class="price">

                                    Rp {{ number_format($product->price, 0, ',', '.') }}

                                </div>

                            </td>


                            {{-- STOK --}}

                            <td>

                                @if($product->stock <= 0)

                                    <span class="stock-badge stock-empty">
                                        Habis
                                    </span>

                                @elseif($product->stock <= 10)

                                    <span class="stock-badge stock-low">
                                        {{ $product->stock }} tersisa
                                    </span>

                                @else

                                    <span class="stock-badge stock-available">
                                        {{ $product->stock }} tersedia
                                    </span>

                                @endif

                            </td>


                            {{-- TANGGAL --}}

                            <td>

                                {{ $product->created_at
                                    ? $product->created_at->format('d/m/Y')
                                    : '-' }}

                            </td>


                            {{-- AKSI --}}

                            <td>

                                <div class="actions">


                                    {{-- DETAIL --}}

                                    <a
                                        href="{{ route('products.show', $product->id) }}"
                                        class="btn-action btn-detail"
                                    >
                                        👁 Detail
                                    </a>


                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route('products.edit', $product->id) }}"
                                        class="btn-action btn-edit"
                                    >
                                        ✏️ Edit
                                    </a>


                                    {{-- HAPUS --}}

                                    <form
                                        action="{{ route('products.destroy', $product->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah kamu yakin ingin menghapus produk {{ addslashes($product->name) }}?');"
                                        style="display:inline;"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn-action btn-delete"
                                        >
                                            🗑 Hapus
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


        {{-- TIDAK ADA PRODUK --}}

        <div class="empty-state">

            <div class="empty-icon">
                📦
            </div>

            <h3>
                Belum Ada Produk
            </h3>

            <p>
                Kamu belum menambahkan produk jersey.
            </p>

            <a
                href="{{ route('products.create') }}"
                class="btn-add"
                style="display:inline-flex;"
            >
                ➕ Tambah Produk
            </a>

        </div>

    @endif

</div>

@endsection