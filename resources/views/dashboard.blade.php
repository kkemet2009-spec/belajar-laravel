@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')

@section('content')

<style>
    .welcome-section {
        margin-bottom: 30px;
    }

    .welcome-section h1 {
        font-size: 32px;
        margin-bottom: 8px;
        color: #111827;
    }

    .welcome-section p {
        color: #6b7280;
        font-size: 16px;
    }

    /* STATISTIC CARD */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 32px;
    }

    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 5px 20px rgba(0,0,0,.05);
        border: 1px solid #f0f0f0;
        transition: .2s;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,.08);
    }

    .stat-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 18px;
    }

    .stat-title {
        color: #6b7280;
        font-size: 14px;
    }

    .stat-icon {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .icon-blue {
        background: #dbeafe;
    }

    .icon-purple {
        background: #ede9fe;
    }

    .icon-green {
        background: #d1fae5;
    }

    .icon-orange {
        background: #ffedd5;
    }

    .stat-number {
        font-size: 32px;
        font-weight: bold;
        color: #111827;
    }

    /* QUICK ACTION */

    .section-title {
        font-size: 21px;
        margin-bottom: 18px;
        color: #111827;
    }

    .quick-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 35px;
    }

    .quick-card {
        background: white;
        padding: 25px;
        border-radius: 16px;
        text-decoration: none;
        color: #111827;
        border: 1px solid #eee;
        box-shadow: 0 5px 20px rgba(0,0,0,.04);
        transition: .2s;
    }

    .quick-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(0,0,0,.08);
    }

    .quick-icon {
        font-size: 30px;
        margin-bottom: 15px;
    }

    .quick-card h3 {
        font-size: 17px;
        margin-bottom: 7px;
    }

    .quick-card p {
        color: #6b7280;
        font-size: 14px;
        line-height: 1.5;
    }

    /* INFO */

    .info-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 20px;
    }

    .info-card {
        background: white;
        border-radius: 16px;
        padding: 25px;
        border: 1px solid #eee;
        box-shadow: 0 5px 20px rgba(0,0,0,.04);
    }

    .info-card h3 {
        margin-bottom: 20px;
        font-size: 19px;
    }

    .activity {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 14px 0;
        border-bottom: 1px solid #eee;
    }

    .activity:last-child {
        border-bottom: none;
    }

    .activity-icon {
        width: 40px;
        height: 40px;
        background: #f3f4f6;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .activity-text strong {
        display: block;
        margin-bottom: 4px;
    }

    .activity-text small {
        color: #9ca3af;
    }

    .system-status {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px;
        background: #ecfdf5;
        border-radius: 10px;
        color: #047857;
        margin-bottom: 15px;
    }

    .status-dot {
        width: 10px;
        height: 10px;
        background: #10b981;
        border-radius: 50%;
    }

    .system-item {
        display: flex;
        justify-content: space-between;
        padding: 13px 0;
        border-bottom: 1px solid #eee;
        font-size: 14px;
    }

    .system-item:last-child {
        border-bottom: none;
    }

    .system-item span:first-child {
        color: #6b7280;
    }

    .system-item span:last-child {
        font-weight: bold;
    }


    /* RESPONSIVE */

    @media (max-width: 1100px) {

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .quick-grid {
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
            font-size: 26px;
        }

        .stat-number {
            font-size: 28px;
        }
    }
</style>


{{-- =========================
     WELCOME
========================= --}}

<div class="welcome-section">

    <h1>
        Selamat Datang 👋
    </h1>

    <p>
        Kelola produk, artikel, dan website Jersey Store dari sini.
    </p>

</div>


{{-- =========================
     STATISTIK
========================= --}}

<div class="stats-grid">


    {{-- TOTAL PRODUK --}}

    <div class="stat-card">

        <div class="stat-top">

            <div class="stat-title">
                Total Produk
            </div>

            <div class="stat-icon icon-blue">
                ⚽
            </div>

        </div>

        <div class="stat-number">
            {{ $totalProducts ?? 0 }}
        </div>

    </div>


    {{-- TOTAL ARTIKEL --}}

    <div class="stat-card">

        <div class="stat-top">

            <div class="stat-title">
                Total Artikel
            </div>

            <div class="stat-icon icon-purple">
                📰
            </div>

        </div>

        <div class="stat-number">
            {{ $totalArticles ?? 0 }}
        </div>

    </div>


    {{-- TOTAL STOK --}}

    <div class="stat-card">

        <div class="stat-top">

            <div class="stat-title">
                Total Stok
            </div>

            <div class="stat-icon icon-green">
                📦
            </div>

        </div>

        <div class="stat-number">
            {{ $totalStock ?? 0 }}
        </div>

    </div>


    {{-- PRODUK TERSEDIA --}}

    <div class="stat-card">

        <div class="stat-top">

            <div class="stat-title">
                Produk Tersedia
            </div>

            <div class="stat-icon icon-orange">
                ✅
            </div>

        </div>

        <div class="stat-number">
            {{ $availableProducts ?? 0 }}
        </div>

    </div>


</div>


{{-- =========================
     AKSI CEPAT
========================= --}}

<h2 class="section-title">
    Aksi Cepat
</h2>


<div class="quick-grid">


    {{-- TAMBAH PRODUK --}}

    <a
        href="{{ route('products.create') }}"
        class="quick-card"
    >

        <div class="quick-icon">
            ➕
        </div>

        <h3>
            Tambah Produk
        </h3>

        <p>
            Tambahkan jersey baru ke katalog produk.
        </p>

    </a>


    {{-- TAMBAH ARTIKEL --}}

    <a
        href="{{ route('articles.create') }}"
        class="quick-card"
    >

        <div class="quick-icon">
            📝
        </div>

        <h3>
            Tulis Artikel
        </h3>

        <p>
            Buat artikel atau berita terbaru tentang jersey.
        </p>

    </a>


    {{-- WEBSITE --}}

    <a
        href="{{ url('/produk') }}"
        target="_blank"
        class="quick-card"
    >

        <div class="quick-icon">
            🌐
        </div>

        <h3>
            Lihat Website
        </h3>

        <p>
            Buka tampilan website publik Jersey Store.
        </p>

    </a>


</div>


{{-- =========================
     INFORMASI
========================= --}}

<div class="info-grid">


    {{-- AKTIVITAS --}}

    <div class="info-card">

        <h3>
            📋 Aktivitas Admin
        </h3>


        <div class="activity">

            <div class="activity-icon">
                ⚽
            </div>

            <div class="activity-text">

                <strong>
                    Kelola Produk
                </strong>

                <small>
                    Tambahkan, edit, atau hapus produk jersey.
                </small>

            </div>

        </div>


        <div class="activity">

            <div class="activity-icon">
                📰
            </div>

            <div class="activity-text">

                <strong>
                    Kelola Artikel
                </strong>

                <small>
                    Buat dan kelola artikel Jersey Store.
                </small>

            </div>

        </div>


        <div class="activity">

            <div class="activity-icon">
                🌐
            </div>

            <div class="activity-text">

                <strong>
                    Website Publik
                </strong>

                <small>
                    Pengunjung dapat melihat katalog jersey.
                </small>

            </div>

        </div>

    </div>


    {{-- STATUS SISTEM --}}

    <div class="info-card">

        <h3>
            ⚙️ Status Sistem
        </h3>


        <div class="system-status">

            <div class="status-dot"></div>

            <strong>
                Sistem Online
            </strong>

        </div>


        <div class="system-item">

            <span>
                Website
            </span>

            <span>
                Online
            </span>

        </div>


        <div class="system-item">

            <span>
                Database
            </span>

            <span>
                Terhubung
            </span>

        </div>


        <div class="system-item">

            <span>
                Admin
            </span>

            <span>
                Aktif
            </span>

        </div>


    </div>

</div>

@endsection