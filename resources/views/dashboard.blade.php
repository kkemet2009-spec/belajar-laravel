@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')

@section('content')

@php
    $hour = (int) now()->format('H');

    if ($hour < 11) {
        $greeting = 'Selamat Pagi';
    } elseif ($hour < 15) {
        $greeting = 'Selamat Siang';
    } elseif ($hour < 18) {
        $greeting = 'Selamat Sore';
    } else {
        $greeting = 'Selamat Malam';
    }
@endphp

<style>
    * {
        box-sizing: border-box;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-in {
        animation: fadeInUp .45s ease both;
    }

    /* =========================
       WELCOME
    ========================= */

    .welcome-section {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 14px;
        margin-bottom: 30px;
    }

    .welcome-section .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 8px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .4px;
        color: #9ca3af;
        text-transform: uppercase;
    }

    .welcome-section h1 {
        font-size: 27px;
        font-weight: 800;
        letter-spacing: -.4px;
        color: #111827;
        margin-bottom: 6px;
    }

    .welcome-section p {
        color: #6b7280;
        font-size: 14px;
    }

    /* =========================
       STATISTIC CARDS
    ========================= */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-bottom: 36px;
    }

    .stat-card {
        position: relative;
        overflow: hidden;
        background: white;
        border-radius: 16px;
        padding: 22px;
        box-shadow: 0 4px 16px rgba(15,23,42,.04);
        border: 1px solid #eef0f3;
        transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
    }

    .stat-card::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 3px;
        background: #e5e7eb;
        transition: background .2s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 30px rgba(15,23,42,.09);
        border-color: #e5e7eb;
    }

    .stat-card:hover::before {
        background: #facc15;
    }

    .stat-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .stat-title {
        color: #6b7280;
        font-size: 12.5px;
        font-weight: 700;
        letter-spacing: .2px;
    }

    .stat-icon {
        width: 40px;
        height: 40px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        background: #f4f5f7;
        flex-shrink: 0;
    }

    .stat-number {
        font-size: 30px;
        font-weight: 800;
        color: #111827;
        line-height: 1;
        margin-bottom: 6px;
    }

    .stat-sub {
        font-size: 12px;
        color: #b0b7c3;
    }

    /* =========================
       SECTION TITLE
    ========================= */

    .section-title-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 16px;
    }

    .section-title {
        font-size: 18px;
        font-weight: 800;
        color: #111827;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .section-count {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 22px;
        height: 22px;
        padding: 0 7px;
        border-radius: 20px;
        background: #f4f5f7;
        color: #6b7280;
        font-size: 11.5px;
        font-weight: 700;
    }

    .section-link {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 13px;
        font-weight: 700;
        color: #111827;
        text-decoration: none;
        transition: gap .2s ease, color .2s ease;
    }

    .section-link:hover {
        gap: 8px;
        color: #1d4ed8;
    }

    /* =========================
       QUICK ACTIONS
    ========================= */

    .quick-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
        gap: 16px;
        margin-bottom: 42px;
    }

    .quick-card {
        position: relative;
        display: flex;
        flex-direction: column;
        background: white;
        padding: 22px;
        border-radius: 16px;
        text-decoration: none;
        color: #111827;
        border: 1px solid #eef0f3;
        box-shadow: 0 4px 16px rgba(15,23,42,.03);
        transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
    }

    .quick-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 28px rgba(15,23,42,.09);
        border-color: #e5e7eb;
    }

    .quick-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 14px;
    }

    .quick-icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: #111827;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
    }

    .quick-arrow {
        font-size: 14px;
        color: #d1d5db;
        transition: transform .2s ease, color .2s ease;
    }

    .quick-card:hover .quick-arrow {
        transform: translateX(3px);
        color: #111827;
    }

    .quick-card h3 {
        font-size: 14.5px;
        font-weight: 750;
        margin-bottom: 5px;
    }

    .quick-card p {
        color: #6b7280;
        font-size: 12.5px;
        line-height: 1.55;
    }

    /* =========================
       RECENT LIST (PRODUK / ARTIKEL)
    ========================= */

    .recent-section {
        margin-bottom: 42px;
    }

    .recent-card {
        background: white;
        border-radius: 16px;
        border: 1px solid #eef0f3;
        box-shadow: 0 4px 16px rgba(15,23,42,.03);
        overflow: hidden;
    }

    .recent-item {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 15px 20px;
        border-bottom: 1px solid #f4f5f7;
        text-decoration: none;
        color: inherit;
        transition: background .15s ease, padding-left .15s ease;
    }

    .recent-item:hover {
        background: #fafbfc;
        padding-left: 24px;
    }

    .recent-item:last-child {
        border-bottom: none;
    }

    .recent-thumb {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        overflow: hidden;
        background: #f1f5f9;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        color: #9ca3af;
    }

    .recent-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .recent-info {
        flex-grow: 1;
        min-width: 0;
    }

    .recent-info h4 {
        font-size: 13.5px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 3px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .recent-info span {
        font-size: 12px;
        color: #9ca3af;
    }

    .recent-meta {
        text-align: right;
        flex-shrink: 0;
    }

    .recent-price {
        font-size: 13px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 4px;
    }

    .recent-chevron {
        color: #d1d5db;
        font-size: 14px;
        transition: transform .15s ease, color .15s ease;
        flex-shrink: 0;
    }

    .recent-item:hover .recent-chevron {
        transform: translateX(2px);
        color: #111827;
    }

    .badge {
        display: inline-block;
        padding: 3px 9px;
        border-radius: 6px;
        font-size: 10.5px;
        font-weight: 700;
    }

    .badge-in {
        background: #dcfce7;
        color: #16a34a;
    }

    .badge-out {
        background: #fee2e2;
        color: #dc2626;
    }

    .recent-empty {
        padding: 46px 20px;
        text-align: center;
    }

    .recent-empty .icon {
        width: 52px;
        height: 52px;
        margin: 0 auto 14px;
        border-radius: 14px;
        background: #f4f5f7;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .recent-empty h4 {
        font-size: 14.5px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 5px;
    }

    .recent-empty p {
        font-size: 12.5px;
        color: #9ca3af;
        margin-bottom: 18px;
    }

    .btn-small {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 9px 16px;
        border-radius: 8px;
        background: #111827;
        color: white;
        text-decoration: none;
        font-size: 12.5px;
        font-weight: 700;
        transition: background .2s ease, transform .2s ease;
    }

    .btn-small:hover {
        background: #1f2937;
        transform: translateY(-1px);
    }

    /* =========================
       INFO GRID (AKTIVITAS / STATUS)
    ========================= */

    .info-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 16px;
    }

    .info-card {
        background: white;
        border-radius: 16px;
        padding: 22px;
        border: 1px solid #eef0f3;
        box-shadow: 0 4px 16px rgba(15,23,42,.03);
    }

    .info-card h3 {
        margin-bottom: 16px;
        font-size: 15px;
        font-weight: 750;
        color: #111827;
    }

    .activity {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 12px 0;
        border-bottom: 1px solid #f4f5f7;
    }

    .activity:last-child {
        border-bottom: none;
    }

    .activity-icon {
        width: 36px;
        height: 36px;
        background: #f4f5f7;
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .activity-text strong {
        display: block;
        margin-bottom: 3px;
        font-size: 13.5px;
        color: #111827;
    }

    .activity-text small {
        color: #9ca3af;
        font-size: 12px;
    }

    .system-status {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 14px;
        background: #f4f5f7;
        border-radius: 10px;
        color: #111827;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 14px;
    }

    .status-dot {
        width: 8px;
        height: 8px;
        background: #16a34a;
        border-radius: 50%;
        flex-shrink: 0;
        box-shadow: 0 0 0 3px rgba(22,163,74,.15);
    }

    .system-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 11px 0;
        border-bottom: 1px solid #f4f5f7;
        font-size: 13px;
    }

    .system-item:last-child {
        border-bottom: none;
    }

    .system-item .label {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #6b7280;
    }

    .system-item .value {
        font-weight: 700;
        color: #111827;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 1100px) {

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .info-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 650px) {

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .quick-grid {
            grid-template-columns: 1fr;
        }

        .welcome-section h1 {
            font-size: 22px;
        }

        .stat-number {
            font-size: 25px;
        }

        .recent-meta {
            text-align: left;
        }
    }
</style>


{{-- =========================
     WELCOME
========================= --}}

<div class="welcome-section fade-in">
    <div>
        <div class="eyebrow">⚽ Jersey Store Admin</div>
        <h1>{{ $greeting }}, Admin 👋</h1>
        <p>Kelola produk, artikel, dan konten toko dari satu tempat.</p>
    </div>
</div>


{{-- =========================
     STATISTIK
========================= --}}

<div class="stats-grid">

    <div class="stat-card fade-in">
        <div class="stat-top">
            <div class="stat-title">Total Produk</div>
            <div class="stat-icon">⚽</div>
        </div>
        <div class="stat-number">{{ $totalProducts ?? 0 }}</div>
        <div class="stat-sub">Jersey dalam katalog</div>
    </div>

    <div class="stat-card fade-in">
        <div class="stat-top">
            <div class="stat-title">Total Artikel</div>
            <div class="stat-icon">📰</div>
        </div>
        <div class="stat-number">{{ $totalArticles ?? 0 }}</div>
        <div class="stat-sub">Artikel dipublikasikan</div>
    </div>

    <div class="stat-card fade-in">
        <div class="stat-top">
            <div class="stat-title">Total Stok</div>
            <div class="stat-icon">📦</div>
        </div>
        <div class="stat-number">{{ $totalStock ?? 0 }}</div>
        <div class="stat-sub">Unit di seluruh produk</div>
    </div>

    <div class="stat-card fade-in">
        <div class="stat-top">
            <div class="stat-title">Produk Tersedia</div>
            <div class="stat-icon">✅</div>
        </div>
        <div class="stat-number">{{ $availableProducts ?? 0 }}</div>
        <div class="stat-sub">Siap dijual</div>
    </div>

</div>


{{-- =========================
     AKSI CEPAT
========================= --}}

<div class="section-title-row">
    <h2 class="section-title">Aksi Cepat</h2>
</div>

<div class="quick-grid">

    <a href="{{ route('products.create') }}" class="quick-card">
        <div class="quick-top">
            <div class="quick-icon">➕</div>
            <div class="quick-arrow">→</div>
        </div>
        <h3>Tambah Produk</h3>
        <p>Tambahkan jersey baru ke katalog produk.</p>
    </a>

    <a href="{{ route('articles.create') }}" class="quick-card">
        <div class="quick-top">
            <div class="quick-icon">📝</div>
            <div class="quick-arrow">→</div>
        </div>
        <h3>Tulis Artikel</h3>
        <p>Buat artikel atau berita terbaru tentang jersey.</p>
    </a>

    <a href="{{ route('products.index') }}" class="quick-card">
        <div class="quick-top">
            <div class="quick-icon">🗂️</div>
            <div class="quick-arrow">→</div>
        </div>
        <h3>Lihat Produk</h3>
        <p>Kelola seluruh produk yang sudah ditambahkan.</p>
    </a>

    <a href="{{ route('articles.index') }}" class="quick-card">
        <div class="quick-top">
            <div class="quick-icon">📚</div>
            <div class="quick-arrow">→</div>
        </div>
        <h3>Lihat Artikel</h3>
        <p>Kelola seluruh artikel yang sudah dibuat.</p>
    </a>

    <a href="{{ url('/produk') }}" target="_blank" class="quick-card">
        <div class="quick-top">
            <div class="quick-icon">🌐</div>
            <div class="quick-arrow">→</div>
        </div>
        <h3>Lihat Website</h3>
        <p>Buka tampilan website publik Jersey Store.</p>
    </a>

</div>


{{--
    =========================
    PRODUK TERBARU
    =========================
    Menampilkan data dari variabel $recentProducts.
    Jika controller belum mengirim variabel ini, otomatis
    tampil empty state (tidak ada query database dari Blade).

    Agar section ini menampilkan produk sungguhan, tambahkan
    di controller dashboard:
    $recentProducts = Product::latest()->take(5)->get();
    lalu kirim ke view melalui compact('recentProducts', ...).
--}}

<div class="recent-section">

    <div class="section-title-row">
        <h2 class="section-title">
            Produk Terbaru
            @isset($recentProducts)
                <span class="section-count">{{ $recentProducts->count() }}</span>
            @endisset
        </h2>

        @isset($recentProducts)
            @if($recentProducts->count() > 0)
                <a href="{{ route('products.index') }}" class="section-link">Lihat Semua →</a>
            @endif
        @endisset
    </div>

    <div class="recent-card">

        @isset($recentProducts)

            @if($recentProducts->count() > 0)

                @foreach($recentProducts as $product)

                    <a href="{{ route('products.show', $product) }}" class="recent-item">

                        <div class="recent-thumb">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            @else
                                👕
                            @endif
                        </div>

                        <div class="recent-info">
                            <h4>{{ $product->name }}</h4>
                            <span>{{ $product->created_at->format('d M Y') }}</span>
                        </div>

                        <div class="recent-meta">
                            <div class="recent-price">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                            <span class="badge {{ $product->stock > 0 ? 'badge-in' : 'badge-out' }}">
                                {{ $product->stock > 0 ? 'Tersedia' : 'Habis' }}
                            </span>
                        </div>

                        <div class="recent-chevron">→</div>

                    </a>

                @endforeach

            @else

                <div class="recent-empty">
                    <div class="icon">📦</div>
                    <h4>Belum ada produk</h4>
                    <p>Tambahkan produk pertama Anda.</p>
                    <a href="{{ route('products.create') }}" class="btn-small">+ Tambah Produk</a>
                </div>

            @endif

        @else

            <div class="recent-empty">
                <div class="icon">📦</div>
                <h4>Belum ada produk</h4>
                <p>Tambahkan produk pertama Anda.</p>
                <a href="{{ route('products.create') }}" class="btn-small">+ Tambah Produk</a>
            </div>

        @endisset

    </div>

</div>


{{--
    =========================
    ARTIKEL TERBARU
    =========================
    Sama seperti section produk, menampilkan $recentArticles
    jika sudah dikirim dari controller. Contoh di controller:
    $recentArticles = Article::latest()->take(5)->get();
--}}

<div class="recent-section">

    <div class="section-title-row">
        <h2 class="section-title">
            Artikel Terbaru
            @isset($recentArticles)
                <span class="section-count">{{ $recentArticles->count() }}</span>
            @endisset
        </h2>

        @isset($recentArticles)
            @if($recentArticles->count() > 0)
                <a href="{{ route('articles.index') }}" class="section-link">Lihat Semua →</a>
            @endif
        @endisset
    </div>

    <div class="recent-card">

        @isset($recentArticles)

            @if($recentArticles->count() > 0)

                @foreach($recentArticles as $article)

                    <a href="{{ route('articles.show', $article) }}" class="recent-item">

                        <div class="recent-thumb">
                            @if($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                            @else
                                📰
                            @endif
                        </div>

                        <div class="recent-info">
                            <h4>{{ $article->title }}</h4>
                            <span>{{ $article->created_at->format('d M Y') }}</span>
                        </div>

                        <div class="recent-chevron">→</div>

                    </a>

                @endforeach

            @else

                <div class="recent-empty">
                    <div class="icon">📰</div>
                    <h4>Belum ada artikel</h4>
                    <p>Mulai buat artikel pertama Anda.</p>
                    <a href="{{ route('articles.create') }}" class="btn-small">+ Tambah Artikel</a>
                </div>

            @endif

        @else

            <div class="recent-empty">
                <div class="icon">📰</div>
                <h4>Belum ada artikel</h4>
                <p>Mulai buat artikel pertama Anda.</p>
                <a href="{{ route('articles.create') }}" class="btn-small">+ Tambah Artikel</a>
            </div>

        @endisset

    </div>

</div>


{{-- =========================
     AKTIVITAS & STATUS
========================= --}}

<div class="info-grid">

    <div class="info-card">

        <h3>📋 Aktivitas Admin</h3>

        <div class="activity">
            <div class="activity-icon">⚽</div>
            <div class="activity-text">
                <strong>Kelola Produk</strong>
                <small>Tambahkan, edit, atau hapus produk jersey.</small>
            </div>
        </div>

        <div class="activity">
            <div class="activity-icon">📰</div>
            <div class="activity-text">
                <strong>Kelola Artikel</strong>
                <small>Buat dan kelola artikel Jersey Store.</small>
            </div>
        </div>

        <div class="activity">
            <div class="activity-icon">🌐</div>
            <div class="activity-text">
                <strong>Website Publik</strong>
                <small>Pengunjung dapat melihat katalog jersey.</small>
            </div>
        </div>

    </div>

    <div class="info-card">

        <h3>⚙️ Status Sistem</h3>

        <div class="system-status">
            <div class="status-dot"></div>
            Sistem Online
        </div>

        <div class="system-item">
            <div class="label">🌐 Website</div>
            <div class="value">Online</div>
        </div>

        <div class="system-item">
            <div class="label">🗄️ Database</div>
            <div class="value">Terhubung</div>
        </div>

        <div class="system-item">
            <div class="label">👤 Admin</div>
            <div class="value">Aktif</div>
        </div>

    </div>

</div>

@endsection