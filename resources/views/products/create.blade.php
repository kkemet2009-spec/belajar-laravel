<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Produk Jersey</title>

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
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
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

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #111;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
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

        /* PREVIEW GAMBAR */
        .preview-container {
            display: none;
            margin-top: 15px;
        }

        .preview-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .preview-image {
            width: 220px;
            height: 220px;
            object-fit: contain;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 8px;
            background: #fafafa;
        }

        .file-info {
            margin-top: 8px;
            font-size: 13px;
            color: #666;
        }

        @media (max-width: 600px) {

            .container {
                width: 95%;
                margin: 20px auto;
            }

            .card {
                padding: 20px;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }

            .preview-image {
                width: 180px;
                height: 180px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>⚽ Tambah Produk Jersey</h1>


        {{-- ERROR VALIDASI --}}
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


        {{-- FORM --}}
        <form
            action="{{ route('products.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            {{-- NAMA --}}
            <div class="form-group">

                <label for="name">
                    Nama Jersey
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Contoh: Jersey Real Madrid Home 2026"
                >

            </div>


            {{-- SLUG --}}
            <div class="form-group">

                <label for="slug">
                    Slug
                </label>

                <input
                    type="text"
                    id="slug"
                    name="slug"
                    value="{{ old('slug') }}"
                    placeholder="Contoh: jersey-real-madrid-home-2026"
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
                    value="{{ old('price') }}"
                    placeholder="Contoh: 350000"
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
                    value="{{ old('stock') }}"
                    placeholder="Contoh: 20"
                >

            </div>


            {{-- FOTO --}}
            <div class="form-group">

                <label for="image">
                    URL Foto
                </label>

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept="image/jpeg,image/png,image/jpg,image/webp"
                >


                {{-- PREVIEW --}}
                <div
                    id="previewContainer"
                    class="preview-container"
                >

                    <div class="preview-title">
                        Preview Gambar
                    </div>

                    <img
                        id="imagePreview"
                        class="preview-image"
                        src=""
                        alt="Preview Produk"
                    >

                    <div
                        id="fileInfo"
                        class="file-info"
                    ></div>

                </div>

            </div>


            {{-- DESKRIPSI --}}
            <div class="form-group">

                <label for="description">
                    Deskripsi
                </label>

                <textarea
                    id="description"
                    name="description"
                    placeholder="Masukkan deskripsi jersey..."
                >{{ old('description') }}</textarea>

            </div>


            {{-- BUTTON --}}
            <div class="buttons">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    💾 Simpan Produk
                </button>


                <a
                    href="{{ route('products.index') }}"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>


{{-- ================================================= --}}
{{-- JAVASCRIPT PREVIEW GAMBAR --}}
{{-- ================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const imageInput =
        document.getElementById('image');

    const imagePreview =
        document.getElementById('imagePreview');

    const previewContainer =
        document.getElementById('previewContainer');

    const fileInfo =
        document.getElementById('fileInfo');


    imageInput.addEventListener('change', function () {

        const file = this.files[0];


        // Jika tidak ada file
        if (!file) {

            previewContainer.style.display = 'none';

            imagePreview.src = '';

            fileInfo.textContent = '';

            return;
        }


        // Pastikan file adalah gambar
        if (!file.type.startsWith('image/')) {

            alert('File yang dipilih harus berupa gambar.');

            this.value = '';

            previewContainer.style.display = 'none';

            imagePreview.src = '';

            fileInfo.textContent = '';

            return;
        }


        // Tampilkan nama file
        fileInfo.textContent =
            'File: ' + file.name;


        // Baca gambar
        const reader = new FileReader();


        reader.onload = function (event) {

            imagePreview.src =
                event.target.result;

            previewContainer.style.display =
                'block';

        };


        reader.readAsDataURL(file);

    });

});

</script>

</body>

</html>