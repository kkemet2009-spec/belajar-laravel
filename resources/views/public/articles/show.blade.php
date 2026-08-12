<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $article->title }} - Jersey Store</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f6f8;
            color: #171717;
            line-height: 1.7;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            height: 72px;
            background: #111;
            color: white;
        }

        .nav-container {
            max-width: 1200px;
            height: 100%;
            margin: auto;
            padding: 0 25px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;

            color: white;
            text-decoration: none;

            font-size: 26px;
            font-weight: 700;
        }

        .logo-icon {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: linear-gradient(
                135deg,
                #2563eb,
                #7c3aed
            );

            font-size: 20px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            font-size: 16px;

            transition: 0.2s;
        }

        .nav-menu a:hover {
            color: #60a5fa;
        }

        /* =========================
           HERO ARTICLE
        ========================= */

        .article-wrapper {
            max-width: 1000px;
            margin: 45px auto 80px;
            padding: 0 20px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            color: #4b5563;
            text-decoration: none;

            font-size: 15px;
            font-weight: 600;

            margin-bottom: 25px;

            transition: 0.2s;
        }

        .back-link:hover {
            color: #2563eb;
        }

        .article-card {
            background: white;
            border-radius: 22px;

            overflow: hidden;

            box-shadow:
                0 15px 45px rgba(0, 0, 0, 0.08);
        }

        /* =========================
           COVER IMAGE
        ========================= */

        .article-cover {
            width: 100%;
            height: 430px;

            background: #e5e7eb;

            overflow: hidden;
        }

        .article-cover img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            display: block;

            transition: transform 0.5s ease;
        }

        .article-card:hover .article-cover img {
            transform: scale(1.02);
        }

        /* =========================
           HEADER
        ========================= */

        .article-header {
            padding: 40px 55px 35px;

            border-bottom: 1px solid #eee;
        }

        .category {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 8px 15px;

            border-radius: 999px;

            background: #eff6ff;
            color: #2563eb;

            font-size: 14px;
            font-weight: 700;

            margin-bottom: 18px;
        }

        .article-title {
            font-size: 44px;
            line-height: 1.15;

            color: #111;

            margin-bottom: 18px;
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 20px;

            color: #6b7280;

            font-size: 15px;
        }

        .meta {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        /* =========================
           CONTENT
        ========================= */

        .article-content {
            padding: 45px 55px 50px;
        }

        .content-title {
            font-size: 14px;
            font-weight: 700;

            color: #6b7280;

            text-transform: uppercase;

            letter-spacing: 1px;

            margin-bottom: 25px;
        }

        .content {
            font-size: 18px;
            line-height: 2;

            color: #374151;

            white-space: pre-line;
        }

        .content p {
            margin-bottom: 22px;
        }

        /* =========================
           SHARE / BOTTOM
        ========================= */

        .article-footer {
            padding: 25px 55px;

            background: #fafafa;

            border-top: 1px solid #eee;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .footer-text {
            color: #6b7280;
            font-size: 14px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            background: #111;
            color: white;

            padding: 12px 20px;

            border-radius: 9px;

            text-decoration: none;

            font-weight: 600;

            transition: 0.2s;
        }

        .back-button:hover {
            background: #2563eb;
        }

        /* =========================
           RELATED
        ========================= */

        .related-section {
            margin-top: 60px;
        }

        .related-title {
            font-size: 28px;
            margin-bottom: 25px;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .related-card {
            background: white;

            padding: 25px;

            border-radius: 16px;

            text-decoration: none;

            color: #111;

            box-shadow:
                0 8px 25px rgba(0, 0, 0, 0.05);

            transition: 0.25s;
        }

        .related-card:hover {
            transform: translateY(-4px);

            box-shadow:
                0 14px 35px rgba(0, 0, 0, 0.09);
        }

        .related-category {
            color: #2563eb;

            font-size: 13px;

            font-weight: 700;

            margin-bottom: 8px;
        }

        .related-card h3 {
            font-size: 19px;

            line-height: 1.4;

            margin-bottom: 8px;
        }

        .related-date {
            color: #9ca3af;

            font-size: 13px;
        }

        /* =========================
           FOOTER
        ========================= */

        .site-footer {
            background: #111;

            color: #aaa;

            text-align: center;

            padding: 30px 20px;
        }

        .site-footer strong {
            color: white;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            .navbar {
                height: auto;
            }

            .nav-container {
                padding: 15px 20px;

                flex-direction: column;

                gap: 15px;
            }

            .nav-menu {
                gap: 18px;
            }

            .nav-menu a {
                font-size: 14px;
            }

            .article-wrapper {
                margin-top: 30px;
            }

            .article-cover {
                height: 280px;
            }

            .article-header {
                padding: 30px 25px;
            }

            .article-title {
                font-size: 32px;
            }

            .article-content {
                padding: 30px 25px;
            }

            .content {
                font-size: 16px;
                line-height: 1.8;
            }

            .article-footer {
                padding: 20px 25px;

                flex-direction: column;

                align-items: flex-start;

                gap: 15px;
            }

            .related-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 500px) {

            .logo {
                font-size: 22px;
            }

            .nav-menu {
                gap: 12px;
            }

            .nav-menu a {
                font-size: 13px;
            }

            .article-cover {
                height: 220px;
            }

            .article-title {
                font-size: 27px;
            }

            .article-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
        }
    </style>
</head>

<body>

    <!-- =========================
         NAVBAR
    ========================= -->

    <nav class="navbar">

        <div class="nav-container">

            <a href="{{ url('/') }}" class="logo">

                <span class="logo-icon">
                    ⚽
                </span>

                Jersey Store

            </a>

            <div class="nav-menu">

                <a href="{{ url('/') }}">
                    Home
                </a>

                <a href="{{ url('/produk') }}">
                    Produk
                </a>

                <a href="{{ url('/artikel') }}">
                    Artikel
                </a>

                <a href="{{ url('/kontak') }}">
                    Kontak
                </a>

            </div>

        </div>

    </nav>


    <!-- =========================
         ARTICLE
    ========================= -->

    <main class="article-wrapper">

        <a
            href="{{ url('/artikel') }}"
            class="back-link"
        >
            ← Kembali ke Artikel
        </a>


        <article class="article-card">

            <!-- COVER -->

            <div class="article-cover">

                @if(!empty($article->image))

                    <img
                        src="{{ asset('storage/' . $article->image) }}"
                        alt="{{ $article->title }}"
                    >

                @else

                    <img
                        src="https://images.unsplash.com/photo-1579952363873-27f3bade9f55?auto=format&fit=crop&w=1400&q=80"
                        alt="Football Jersey"
                    >

                @endif

            </div>


            <!-- HEADER -->

            <header class="article-header">

                <div class="category">
                    📰 Artikel Jersey Store
                </div>


                <h1 class="article-title">
                    {{ $article->title }}
                </h1>


                <div class="article-meta">

                    <div class="meta">
                        📅
                        {{ $article->created_at->format('d M Y') }}
                    </div>

                    <div class="meta">
                        ⚽ Jersey Store
                    </div>

                    <div class="meta">
                        👁️ Artikel Publik
                    </div>

                </div>

            </header>


            <!-- CONTENT -->

            <section class="article-content">

                <div class="content-title">
                    Isi Artikel
                </div>


                @if(!empty($article->content))

                    <div class="content">
                        {{ $article->content }}
                    </div>

                @elseif(!empty($article->description))

                    <div class="content">
                        {{ $article->description }}
                    </div>

                @else

                    <div class="content">
                        Artikel ini belum memiliki isi.
                    </div>

                @endif

            </section>


            <!-- FOOTER ARTICLE -->

            <div class="article-footer">

                <div class="footer-text">
                    Terima kasih telah membaca artikel Jersey Store.
                </div>

                <a
                    href="{{ url('/artikel') }}"
                    class="back-button"
                >
                    ← Artikel Lainnya
                </a>

            </div>

        </article>


        <!-- =========================
             RELATED ARTICLE
        ========================= -->

        @if(isset($relatedArticles) && $relatedArticles->count() > 0)

            <section class="related-section">

                <h2 class="related-title">
                    Artikel Lainnya
                </h2>


                <div class="related-grid">

                    @foreach($relatedArticles as $related)

                        <a
                            href="{{ url('/artikel/' . $related->id) }}"
                            class="related-card"
                        >

                            <div class="related-category">
                                ARTIKEL JERSEY
                            </div>

                            <h3>
                                {{ $related->title }}
                            </h3>

                            <div class="related-date">
                                {{ $related->created_at->format('d M Y') }}
                            </div>

                        </a>

                    @endforeach

                </div>

            </section>

        @endif

    </main>


    <!-- =========================
         FOOTER WEBSITE
    ========================= -->

    <footer class="site-footer">

        © {{ date('Y') }}

        <strong>Jersey Store</strong>.

        Semua Hak Dilindungi.

    </footer>

</body>

</html>