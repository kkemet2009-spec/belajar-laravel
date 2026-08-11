@extends('layouts.app')

@section('title', 'Edit Produk - Jersey Store')

@section('content')

<style>
    .edit-page {
        background: #f5f5f5;
        min-height: 70vh;
        padding: 50px 7%;
    }

    .edit-container {
        max-width: 850px;
        margin: auto;
    }

    .edit-header {
        margin-bottom: 30px;
    }

    .edit-header h1 {
        font-size: 32px;
        color: #111;
        margin-bottom: 8px;
    }

    .edit-header p {
        color: #777;
    }

    .edit-card {
        background: white;
        border-radius: 16px;
        padding: 35px;
        box-shadow: 0 5px 20px rgba(0,0,0,.08);
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-group label {
        display: block;
        font-weight: 700;
        margin-bottom: 8px;
        color: #222;
    }

    .form-control {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 15px;
        outline: none;
        transition: .2s;
    }

    .form-control:focus {
        border-color: #111;
        box-shadow: 0 0 0 3px rgba(0,0,0,.06);
    }

    textarea.form-control {
        min-height: 140px;
        resize: vertical;
    }

    .current-image {
        margin-bottom: 15px;
    }

    .current-image img {
        width: 180px;
        height: 180px;
        object-fit: contain;
        background: #f5f5f5;
        border-radius: 10px;
        padding: 10px;
    }

    .help-text {
        display: block;
        margin-top: 6px;
        color: #888;
        font-size: 13px;
    }

    .error-box {
        background: #fee2e2;
        border: 1px solid #fecaca;
        color: #b91c1c;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 25px;
    }

    .error-box ul {
        margin-left: 20px;
    }

    .actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 30px;
        gap: 10px;
    }

    .btn {
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 700;
        cursor: pointer;
        display: inline-block;
    }

    .btn-back {
        background: #eee;
        color: #222;
    }

    .btn-back:hover {
        background: #ddd;
    }

    .btn-save {
        background: #111;
        color: white;
    }

    .btn-save:hover {
        background: #333;
    }

    @media (max-width: 600px) {
        .edit-page {
            padding: 30px 20px;
        }

        .edit-card {
            padding: 25px 20px;
        }

        .actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .actions .btn {
            text-align: center;
        }
    }
</style>

<div class="edit-page">

    <div class="edit-container">

        {{-- HEADER --}}
        <div class="edit-header">
            <h1>Edit Produk</h1>

            <p>
                Ubah informasi produk:
                <strong>{{ $product->name }}</strong>
            </p>
        </div>


        {{-- ERROR --}}
        @if ($errors->any())

            <div class="error-box">

                <strong>Terjadi kesalahan:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif


        {{-- FORM --}}
        <div class="edit-card">

            <form
                action="{{ route('products.update', $product) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                {{-- NAMA --}}
                <div class="form-group">

                    <label for="name">
                        Nama Produk
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $product->name) }}"
                        required
                    >

                </div>


                {{-- HARGA --}}
                <div class="form-group">

                    <label for="price">
                        Harga
                    </label>

                    <input
                        type="number"
                        id="price"
                        name="price"
                        class="form-control"
                        value="{{ old('price', $product->price) }}"
                        min="0"
                        required
                    >

                </div>


                {{-- STOK --}}
                <div class="form-group">

                    <label for="stock">
                        Stok
                    </label>

                    <input
                        type="number"
                        id="stock"
                        name="stock"
                        class="form-control"
                        value="{{ old('stock', $product->stock) }}"
                        min="0"
                        required
                    >

                </div>


                {{-- DESKRIPSI --}}
                <div class="form-group">

                    <label for="description">
                        Deskripsi
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        class="form-control"
                    >{{ old('description', $product->description) }}</textarea>

                </div>


                {{-- GAMBAR LAMA --}}
                <div class="form-group">

                    <label>
                        Gambar Saat Ini
                    </label>

                    @if($product->image)

                        <div class="current-image">

                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                            >

                        </div>

                    @else

                        <p class="help-text">
                            Produk belum memiliki gambar.
                        </p>

                    @endif

                </div>


                {{-- GAMBAR BARU --}}
                <div class="form-group">

                    <label for="image">
                        Ganti Gambar
                    </label>

                    <input
                        type="file"
                        id="image"
                        name="image"
                        class="form-control"
                        accept="image/jpeg,image/png,image/webp"
                    >

                    <span class="help-text">
                        Kosongkan jika tidak ingin mengganti gambar.
                        Maksimal 2 MB.
                    </span>

                </div>


                {{-- BUTTON --}}
                <div class="actions">

                    <a
                        href="{{ route('products.index') }}"
                        class="btn btn-back"
                    >
                        ← Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn btn-save"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection