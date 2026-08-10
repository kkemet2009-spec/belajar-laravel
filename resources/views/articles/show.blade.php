<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>{{ $article->title }}</title>

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
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
        }

        .article-image {
            width: 100%;
            height: 450px;
            object-fit: cover;
            display: block;
        }

        .content {
            padding: 40px;
        }

        h1 {
            font-size: 38px;
            margin-bottom: 15px;
        }

        .date {
            color: #777;
            margin-bottom: 30px;
        }

        .article-content {
            font-size: 18px;
            line-height: 1.8;
            white-space: pre-line;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 35px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 15px;
        }

        .btn-back {
            background: #ddd;
            color: #222;
        }

        .btn-edit {
            background: #111;
            color: white;
        }

        .btn-delete {
            background: #e63946;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 15px;
            padding: 12px 20px;
            border-radius: 8px;
        }

        @media (max-width: 700px) {

            .container {
                width: 95%;
                margin: 20px auto;
            }

            .article-image {
                height: 250px;
            }

            .content {
                padding: 25px;
            }

            h1 {
                font-size: 28px;
            }

            .article-content {
                font-size: 16px;
            }

        }

    </style>

</head>

<body>

<div class="container">
    @if(session('success'))

    <div style="
        background:#d4edda;
        color:#155724;
        padding:15px;
        border-radius:8px;
        margin-bottom:20px;
    ">
        {{ session('success') }}
    </div>

@endif

    <div class="card">

        {{-- FOTO ARTIKEL --}}
        @if($article->image)

            <img
                src="{{ asset('storage/' . $article->image) }}"
                alt="{{ $article->title }}"
                class="article-image"
            >

        @endif


        <div class="content">

            {{-- JUDUL --}}
            <h1>
                {{ $article->title }}
            </h1>


            {{-- TANGGAL --}}
            <div class="date">

                📅
                {{ $article->created_at->format('d M Y') }}

            </div>


            {{-- ISI ARTIKEL --}}
            <div class="article-content">

                {{ $article->content }}

            </div>


            {{-- BUTTON --}}
            <div class="buttons">

                <a
                    href="{{ route('articles.index') }}"
                    class="btn btn-back"
                >
                    ← Kembali
                </a>


                <a
                    href="{{ route('articles.edit', $article) }}"
                    class="btn btn-edit"
                >
                    ✏️ Edit
                </a>


                <form
                    action="{{ route('articles.destroy', $article) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus artikel ini?')"
                >

                    @csrf

                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn-delete"
                    >
                        🗑️ Hapus
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</body>

</html>