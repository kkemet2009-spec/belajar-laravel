@extends('layouts.app')

@section('title', 'Artikel - Jersey Store')

@section('content')

<style>
    * {
        box-sizing: border-box;
    }

    .articles-page {
        max-width: 1200px;
        margin: 0 auto;
        padding: 48px 20px 80px;
    }

    /* ==============================
       HEADER
    ============================== */

    .articles-header {
        max-width: 620px;
        margin: 0 auto 52px;
        text-align: center;
    }

    .articles-header .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 16px;
        padding: 6px 14px;
        border-radius: 50px;
        background: #f1f5f9;
        color: #1d4ed8;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .articles-header .eyebrow::before {
        content: "";
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #1d4ed8;
    }

    .articles-header h1 {
        margin: 0 0 12px;
        font-size: 36px;
        font-weight: 800;
        letter-spacing: -.5px;
        color: #111827;
    }

    .articles-header p {
        margin: 0;
        color: #6b7280;
        font-size: 15px;
        line-height: 1.75;
    }

    /* ==============================
       FEATURED ARTICLE
    ============================== */

    .featured-article {
        display: grid;
        grid-template-columns: 1.15fr 1fr;
        gap: 40px;
        align-items: center;

        margin-bottom: 56px;
        padding-bottom: 52px;
        border-bottom: 1px solid #eef0f3;
    }

    .featured-image {
        position: relative;
        height: 380px;
        border-radius: 18px;
        overflow: hidden;
        background: #f1f5f9;
    }

    .featured-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform .6s ease;
    }

    .featured-article:hover .featured-image img {
        transform: scale(1.035);
    }

    .featured-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #9ca3af;
        background: linear-gradient(135deg, #f8fafc, #e2e8f0);
        font-size: 60px;
    }

    .featured-label {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 16px;
        padding: 6px 13px;
        border-radius: 6px;
        background: #111827;
        color: white;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .6px;
        text-transform: uppercase;
    }

    .featured-content h2 {
        margin: 0 0 14px;
        font-size: 28px;
        line-height: 1.35;
        font-weight: 800;
        letter-spacing: -.3px;
        color: #111827;
    }

    .featured-date {
        margin-bottom: 16px;
        font-size: 13px;
        font-weight: 600;
        color: #9ca3af;
    }

    .featured-content p {
        margin: 0 0 24px;
        color: #6b7280;
        font-size: 15px;
        line-height: 1.8;
    }

    /* ==============================
       BUTTON
    ============================== */

    .btn-read {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 22px;
        border-radius: 10px;
        background: #111827;
        color: white;
        text-decoration: none;
        font-size: 13.5px;
        font-weight: 700;
        transition: background .2s ease, transform .2s ease, gap .2s ease;
    }

    .btn-read:hover {
        background: #1d4ed8;
        transform: translateY(-1px);
        gap: 11px;
    }

    .card-read {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #1d4ed8;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        transition: gap .2s ease;
    }

    .card-read:hover {
        gap: 9px;
    }

    /* ==============================
       SECTION TITLE
    ============================== */

    .section-title-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 26px;
    }

    .section-title {
        margin: 0;
        font-size: 22px;
        font-weight: 800;
        letter-spacing: -.3px;
        color: #111827;
    }

    .section-sub {
        margin: 4px 0 0;
        font-size: 13.5px;
        color: #9ca3af;
    }

    /* ==============================
       ARTICLE GRID
    ============================== */

    .article-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 26px;
    }

    .article-card {
        display: flex;
        flex-direction: column;
        background: white;
        border: 1px solid #eef0f3;
        border-radius: 16px;
        overflow: hidden;
        transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
    }

    .article-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 34px rgba(15,23,42,.09);
        border-color: #e5e7eb;
    }

    .article-image {
        height: 195px;
        overflow: hidden;
        background: #f1f5f9;
    }

    .article-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform .45s ease;
    }

    .article-card:hover .article-image img {
        transform: scale(1.07);
    }

    .article-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #9ca3af;
        background: linear-gradient(135deg, #f8fafc, #e2e8f0);
        font-size: 38px;
    }

    .article-body {
        padding: 20px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .article-date {
        margin-bottom: 10px;
        font-size: 11.5px;
        font-weight: 700;
        letter-spacing: .3px;
        color: #b0b7c3;
        text-transform: uppercase;
    }

    .article-title {
        margin: 0 0 10px;
        font-size: 16.5px;
        line-height: 1.4;
        font-weight: 750;
        color: #111827;
    }

    .article-excerpt {
        margin: 0 0 18px;
        color: #6b7280;
        font-size: 13px;
        line-height: 1.7;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .article-footer {
        margin-top: auto;
        padding-top: 14px;
        border-top: 1px solid #f4f5f7;
    }

    /* ==============================
       INFO SECTION
    ============================== */

    .info-section {
        margin-top: 64px;
        padding: 46px 36px;
        border-radius: 22px;
        background: #111827;
        color: white;
        text-align: center;
    }

    .info-section h3 {
        margin: 0 0 10px;
        font-size: 23px;
        font-weight: 800;
        letter-spacing: -.3px;
    }

    .info-section p {
        margin: 0 auto 24px;
        max-width: 480px;
        color: rgba(255,255,255,.7);
        font-size: 14px;
        line-height: 1.75;
    }

    .btn-info {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 13px 24px;
        border-radius: 10px;
        background: white;
        color: #111827;
        text-decoration: none;
        font-size: 13.5px;
        font-weight: 700;
        transition: transform .2s ease, gap .2s ease;
    }

    .btn-info:hover {
        transform: translateY(-1px);
        gap: 11px;
    }

    /* ==============================
       EMPTY STATE
    ============================== */

    .empty-state {
        padding: 76px 25px;
        text-align: center;
        background: white;
        border: 1px solid #eef0f3;
        border-radius: 20px;
    }

    .empty-icon {
        font-size: 46px;
        margin-bottom: 16px;
        opacity: .6;
    }

    .empty-state h3 {
        margin: 0 0 8px;
        font-size: 19px;
        color: #111827;
    }

    .empty-state p {
        margin: 0;
        color: #6b7280;
        font-size: 14px;
    }

    /* ==============================
       RESPONSIVE
    ============================== */

    @media (max-width: 1000px) {
        .article-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .featured-article {
            grid-template-columns: 1fr;
        }

        .featured-image {
            height: 280px;
        }
    }

    @media (max-width: 620px) {
        .articles-page {
            padding: 32px 15px 56px;
        }

        .articles-header h1 {
            font-size: 27px;
        }

        .article-grid {
            grid-template-columns: 1fr;
        }

        .featured-image {
            height: 220px;
        }

        .featured-content h2 {
            font-size: 22px;
        }

        .info-section {
            padding: 34px 20px;
        }
    }
</style>


<div class="articles-page">

    {{-- =========================================
         HEADER
    ========================================== --}}

    <div class="articles-header">

        <span class="eyebrow">ARTIKEL</span>

        <h1>Berita, Tips &amp; Informasi Seputar Jersey</h1>

        <p>
            Temukan informasi terbaru, tips memilih jersey, inspirasi
            koleksi, dan berbagai cerita menarik seputar dunia sepak bola.
        </p>

    </div>


    @if($articles->count() > 0)

        {{-- =========================================
             FEATURED ARTICLE
        ========================================== --}}

        @foreach($articles as $article)

            @if($loop->first)

                <div class="featured-article">

                    <a href="{{ route('public.articles.show', $article) }}" style="text-decoration:none;">
                        <div class="featured-image">

                            @if($article->image)
                                <img
                                    src="{{ asset('storage/' . $article->image) }}"
                                    alt="{{ $article->title }}"
                                    loading="lazy"
                                >
                            @else
                                <div class="featured-placeholder">📰</div>
                            @endif

                        </div>
                    </a>

                    <div class="featured-content">

                        <span class="featured-label">Artikel Terbaru</span>

                        <h2>{{ $article->title }}</h2>

                        <div class="featured-date">
                            {{ $article->created_at->format('d M Y') }}
                        </div>

                        <p>
                            {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 180) }}
                        </p>

                        <a href="{{ route('public.articles.show', $article) }}" class="btn-read">
                            Baca Selengkapnya <span>→</span>
                        </a>

                    </div>

                </div>

            @endif

        @endforeach


        {{-- =========================================
             DAFTAR ARTIKEL LAINNYA
        ========================================== --}}

        @if($articles->count() > 1)

            <div class="section-title-row">
                <div>
                    <h2 class="section-title">Artikel Lainnya</h2>
                    <p class="section-sub">Update terbaru seputar jersey dan sepak bola</p>
                </div>
            </div>

            <div class="article-grid">

                @foreach($articles as $article)

                    @unless($loop->first)

                        <article class="article-card">

                            <a href="{{ route('public.articles.show', $article) }}" style="text-decoration:none;">
                                <div class="article-image">

                                    @if($article->image)
                                        <img
                                            src="{{ asset('storage/' . $article->image) }}"
                                            alt="{{ $article->title }}"
                                            loading="lazy"
                                        >
                                    @else
                                        <div class="article-placeholder">📰</div>
                                    @endif

                                </div>
                            </a>

                            <div class="article-body">

                                <div class="article-date">
                                    {{ $article->created_at->format('d M Y') }}
                                </div>

                                <h3 class="article-title">{{ $article->title }}</h3>

                                <p class="article-excerpt">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 130) }}
                                </p>

                                <div class="article-footer">
                                    <a href="{{ route('public.articles.show', $article) }}" class="card-read">
                                        Baca Selengkapnya <span>→</span>
                                    </a>
                                </div>

                            </div>

                        </article>

                    @endunless

                @endforeach

            </div>

        @endif


        {{-- =========================================
             INFO SECTION
        ========================================== --}}

        <div class="info-section">

            <h3>Ikuti Update Jersey Store</h3>

            <p>
                Dapatkan informasi terbaru seputar jersey, tips memilih
                jersey, dan berita menarik lainnya.
            </p>

            <a href="{{ route('public.products.index') }}" class="btn-info">
                Lihat Koleksi Jersey <span>→</span>
            </a>

        </div>

    @else

        <div class="empty-state">
            <div class="empty-icon">📰</div>
            <h3>Belum Ada Artikel</h3>
            <p>Artikel akan ditampilkan di sini.</p>
        </div>

    @endif

</div>

@endsection