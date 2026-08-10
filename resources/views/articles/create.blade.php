<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Artikel</title>

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
            max-width: 750px;
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
            min-height: 250px;
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
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>📰 Tambah Artikel</h1>

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
            action="{{ route('articles.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            {{-- JUDUL --}}
            <div class="form-group">

                <label>Judul Artikel</label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Contoh: 5 Jersey Bola Terbaik Tahun 2026"
                    required
                >

            </div>


            {{-- SLUG --}}
            <div class="form-group">

                <label>Slug</label>

                <input
                    type="text"
                    name="slug"
                    value="{{ old('slug') }}"
                    placeholder="contoh-5-jersey-bola-terbaik-2026"
                    required
                >

            </div>


            {{-- FOTO --}}
            <div class="form-group">

                <label>Foto Artikel</label>

                <input
                    type="file"
                    name="image"
                    accept=".jpg,.jpeg,.png,.webp"
                >

                <small style="display:block; margin-top:8px; color:#666;">
                    Format: JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                </small>

            </div>


            {{-- ISI --}}
            <div class="form-group">

                <label>Isi Artikel</label>

                <textarea
                    name="content"
                    placeholder="Tulis isi artikel di sini..."
                    required
                >{{ old('content') }}</textarea>

            </div>


            {{-- BUTTON --}}
            <div class="buttons">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    💾 Simpan Artikel
                </button>

                <a
                    href="{{ route('articles.index') }}"
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