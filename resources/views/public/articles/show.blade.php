<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $article->title }} - Jersey Store</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f6f8;
            color: #222;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            background: #111;
            color: white;
            height: 72px;
            display: flex;
            align-items: center;
        }

        .nav-container {
            width: 92%;
            max-width: 1200px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            text-decoration: none;
            font-size: 24px;
            font-weight: bold;
        }

        .logo span {
            margin-right: 8px;
        }

        .nav-menu {
            display: flex;
            gap: 28px;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            font-size: 15px;
            transition: 0.2s;
        }

        .nav-menu a:hover {
            color: #ccc;
        }

        /* =========================
           CONTAINER
        ========================= */

        .container {
            width: 92%;
            max-width: 1000px;
            margin: 40px auto;
        }

        /* =========================
           CARD
        ========================= */

        .article-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.07);
            overflow: hidden;
        }

        .article-header {
            padding: 35px 40px 25px;
            border-bottom: 1px solid #eee;
        }

        .article-title {
            font-size: 34px;
            line-height: 1.3;
            margin-bottom: 15px;
            color: #111;
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 15px;
            color: #777;
            font-size: 14px;
        }

        .badge {
            background: #f0f0f0;
            color: #555;
            padding: 6px 12px;
            border-radius: 20px;
        }

        /* =========================
           CONTENT
        ========================= */

        .article-content {
            padding: 35px 40px;
        }

        .content-label {
            font-size: 14px;
            font-weight: bold;
            color: #777;
            margin-bottom: 12px;
            text-transform: uppercase;
        }

        .article-description {
            font-size: 17px;
            line-height: 1.9;
            color: #444;
            white-space: pre-line;
        }

        /* =========================
           ACTION
        ========================= */

        .article-actions {
            padding: 25px 40px;
            background: #fafafa;
            border-top: 1px solid #eee;

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .action-left,
        .action-right {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn:hover {
            opacity: 0.85;
            transform: translateY(-1px);
        }

        .btn-back {
            background: #e5e7eb;
            color: #222;
        }

        .btn-edit {
            background: #fff0c2;
            color: #8a6200;
        }

        .btn-delete {
            background: #ffe1e1;
            color: #c62828;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            background: #111;
            color: white;
            text-align: center;
            padding: 25px;
            margin-top: 60px;
            font-size: 14px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            .navbar {
                height: auto;
                padding: 18px 0;
            }

            .nav-container {
                flex-direction: column;
                gap: 15px;
            }

            .nav-menu {
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .container {
                width: 94%;
                margin: 25px auto;
            }

            .article-header {
                padding: 25px 22px 20px;
            }

            .article-title {
                font-size: 26px;
            }

            .article-content {
                padding: 25px 22px;
            }

            .article-description {
                font-size: 15px;
                line-height: 1.8;
            }

            .article-actions {
                padding: 20px 22px;
                flex-direction: column;
                align-items: stretch;
            }

            .action-left,
            .action-right {
                width: 100%;
            }

            .btn {
                text-align: center;
                flex: 1;
            }
        }
    </style>
</head>

<body>

    {{-- =========================
         NAVBAR
    ========================== --}}

    <nav class="navbar">

        <div class="nav-container">

            <a href="{{ route('home') }}" class="logo">
                <span>⚽</span> Jersey Store
            </a>

            <div class="nav-menu">

                <a href="{{ route('home') }}">
                    Home
                </a>

                <a href="{{ route('products.index') }}">
                    Produk
                </a>

                <a href="{{ route('articles.index') }}">
                    Artikel
                </a>

                <a href="{{ route('contact') }}">
                    Kontak
                </a>

                <a href="{{ route('dashboard') }}">
                    Dashboard
                </a>

            </div>

        </div>

    </nav>


    {{-- =========================
         CONTENT
    ========================== --}}

    <main class="container">

        <div class="article-card">

            {{-- HEADER ARTIKEL --}}
            <div class="article-header">

                <h1 class="article-title">
                    {{ $article->title }}
                </h1>

                <div class="article-meta">

                    <span class="badge">
                        📰 Artikel
                    </span>

                    <span>
                        📅
                        {{ $article->created_at
                            ? $article->created_at->format('d M Y')
                            : '-' }}
                    </span>

                </div>

            </div>


            {{-- ISI ARTIKEL --}}
            <div class="article-content">

                <div class="content-label">
                    Isi Artikel
                </div>

                <div class="article-description">

                    {{ $article->description }}

                </div>

            </div>


            {{-- TOMBOL --}}
            <div class="article-actions">

                <div class="action-left">

                    <a
                        href="{{ route('articles.index') }}"
                        class="btn btn-back"
                    >
                        ← Kembali
                    </a>

                </div>


                <div class="action-right">

                    {{-- EDIT --}}
                    <a
                        href="{{ route('articles.edit', $article) }}"
                        class="btn btn-edit"
                    >
                        ✏️ Edit
                    </a>


                    {{-- HAPUS --}}
                    <form
                        action="{{ route('articles.destroy', $article) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus artikel ini?');"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-delete"
                        >
                            🗑️ Hapus
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </main>


    {{-- =========================
         FOOTER
    ========================== --}}

    <footer class="footer">

        © {{ date('Y') }} Jersey Store. All Rights Reserved.

    </footer>


</body>
</html>