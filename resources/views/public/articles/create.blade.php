<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Artikel - Jersey Store</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f6f8;
            color: #222;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: 40px auto;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,.08);
        }

        h1 {
            margin-bottom: 8px;
            font-size: 30px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #d5d5d5;
            border-radius: 9px;
            font-size: 15px;
            outline: none;
            transition: .2s;
        }

        input:focus,
        textarea:focus {
            border-color: #111;
            box-shadow: 0 0 0 3px rgba(0,0,0,.06);
        }

        textarea {
            min-height: 220px;
            resize: vertical;
            line-height: 1.6;
        }

        .error {
            background: #ffe5e5;
            color: #b42318;
            border: 1px solid #ffb8b8;
            padding: 15px;
            border-radius: 9px;
            margin-bottom: 25px;
        }

        .error ul {
            margin: 8px 0 0 20px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .btn {
            border: none;
            padding: 13px 22px;
            border-radius: 9px;
            cursor: pointer;
            text-decoration: none;
            font-size: 15px;
            font-weight: bold;
        }

        .btn-primary {
            background: #111;
            color: white;
        }

        .btn-secondary {
            background: #e5e5e5;
            color: #222;
        }

        .btn:hover {
            opacity: .85;
        }

        .hint {
            color: #888;
            font-size: 13px;
            margin-top: 6px;
        }

        @media(max-width:600px) {
            .container {
                width: 94%;
                margin: 20px auto;
            }

            .card {
                padding: 20px;
            }

            h1 {
                font-size: 25px;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>📰 Tambah Artikel</h1>

        <p class="subtitle">
            Tambahkan artikel atau berita terbaru tentang Jersey Store.
        </p>

        {{-- ERROR --}}
        @if($errors->any())
            <div class="error">

                <strong>⚠️ Ada kesalahan:</strong>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif

        <form
            action="{{ route('articles.store') }}"
            method="POST"
        >

            @csrf

            {{-- JUDUL --}}
            <div class="form-group">

                <label for="title">
                    Judul Artikel
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Contoh: 5 Jersey Bola Terbaik Tahun 2026"
                    required
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
                    placeholder="Contoh: 5-jersey-bola-terbaik-tahun-2026"
                    required
                >

                <div class="hint">
                    Contoh URL: /articles/5-jersey-bola-terbaik-tahun-2026
                </div>

            </div>


            {{-- DESKRIPSI --}}
            <div class="form-group">

                <label for="description">
                    Deskripsi Artikel
                </label>

                <textarea
                    id="description"
                    name="description"
                    placeholder="Tulis isi artikel di sini..."
                    required
                >{{ old('description') }}</textarea>

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
                    ← Kembali
                </a>

            </div>

        </form>

    </div>

</div>

<script>

    // Membuat slug otomatis dari judul
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');

    titleInput.addEventListener('input', function () {

        const slug = this.value
            .toLowerCase()
            .trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');

        slugInput.value = slug;

    });

</script>

</body>
</html>