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

    $statusColors = [
        'pending' => ['bg' => '#FEF3C7', 'text' => '#B45309'],
        'processing' => ['bg' => '#DBEAFE', 'text' => '#1D4ED8'],
        'shipped' => ['bg' => '#E0E7FF', 'text' => '#4338CA'],
        'completed' => ['bg' => '#DCFCE7', 'text' => '#16A34A'],
        'cancelled' => ['bg' => '#FEE2E2', 'text' => '#DC2626'],
    ];

    // ===== Grafik Penjualan (7 hari terakhir) =====
    // Opsional: kirim $salesChartData dari controller berupa array asosiatif
    // ['d/m' => total_penjualan_hari_itu, ...] sepanjang 7 hari terakhir.
    // Jika tidak dikirim, chart tetap tampil aman dengan nilai 0 (tidak error).
    if (isset($salesChartData) && count($salesChartData) > 0) {
        $chartLabels = array_keys($salesChartData);
        $chartValues = array_values($salesChartData);
    } else {
        $chartLabels = [];
        $chartValues = [];
        for ($i = 6; $i >= 0; $i--) {
            $chartLabels[] = now()->subDays($i)->format('d/m');
            $chartValues[] = 0;
        }
    }

    $chartMax = max(1, max($chartValues));
    // Bulatkan atap grafik ke kelipatan rapi agar label sumbu Y enak dibaca
    $niceTop = $chartMax <= 0 ? 1 : pow(10, floor(log10($chartMax)));
    while ($niceTop * 5 < $chartMax) { $niceTop *= 2; }
    $chartTop = max($niceTop * 5, $chartMax);

    $chartW = 640;
    $chartH = 200;
    $chartPad = 8;
    $stepX = count($chartValues) > 1 ? ($chartW - $chartPad * 2) / (count($chartValues) - 1) : 0;

    $points = [];
    foreach ($chartValues as $i => $v) {
        $x = $chartPad + $i * $stepX;
        $y = $chartH - (($v / $chartTop) * ($chartH - 20)) - 4;
        $points[] = [$x, $y];
    }

    $linePath = '';
    foreach ($points as $i => $p) {
        $linePath .= ($i === 0 ? 'M' : ' L') . $p[0] . ' ' . $p[1];
    }

    $areaPath = $linePath;
    if (count($points) > 0) {
        $areaPath .= ' L' . $points[count($points) - 1][0] . ' ' . $chartH;
        $areaPath .= ' L' . $points[0][0] . ' ' . $chartH . ' Z';
    }

    // Info Sistem (helper Laravel bawaan, bukan data baru dari DB)
    $appVersion = config('app.version', '1.0.0');
    $appEnv = ucfirst(app()->environment());
    $serverTime = now()->translatedFormat('d M Y - H:i') . ' WIB';
@endphp

<style>
    * {
        box-sizing: border-box;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .fade-in {
        animation: fadeInUp .4s ease both;
    }

    /* ========= HERO / RINGKASAN ========= */

    .hero-card {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        background: #FFFFFF;
        border: 1px solid #E7E9F1;
        border-left: 4px solid #1F5EFF;
        border-radius: 14px;
        padding: 26px 30px;
        margin-bottom: 22px;
        box-shadow: 0 1px 2px rgba(16,24,40,.04);
        overflow: hidden;
    }

    .hero-text h1 {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 23px;
        font-weight: 800;
        letter-spacing: -.3px;
        color: #12162B;
        margin-bottom: 6px;
    }

    .hero-text h1 svg {
        color: #1F5EFF;
        flex-shrink: 0;
    }

    .hero-text p {
        color: #6B7280;
        font-size: 13.5px;
    }

    .hero-illustration {
        flex-shrink: 0;
        opacity: .95;
    }

    .hero-illustration img {
        display: block;
        width: 120px;
        height: auto;
        object-fit: contain;
    }

    @media (max-width: 780px) {
        .hero-illustration { display: none; }
    }

    /* ========= STATISTIC CARDS ========= */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
        margin-bottom: 16px;
    }

    .stats-grid:nth-of-type(2) {
        margin-bottom: 26px;
    }

    .stat-card {
        position: relative;
        background: #FFFFFF;
        border-radius: 12px;
        padding: 18px;
        box-shadow: 0 1px 2px rgba(16,24,40,.04);
        border: 1px solid #E7E9F1;
        transition: border-color .15s ease, box-shadow .15s ease;
    }

    .stat-card:hover {
        border-color: #D3D8E5;
        box-shadow: 0 4px 14px rgba(16,24,40,.06);
    }

    .stat-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 16px;
    }

    .stat-title {
        color: #6B7280;
        font-size: 12px;
        font-weight: 600;
    }

    .stat-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #EEF3FF;
        color: #1F5EFF;
        flex-shrink: 0;
    }

    .stat-icon.purple { background: #F3F0FE; color: #7C3AED; }
    .stat-icon.orange { background: #FEF3E2; color: #D97706; }
    .stat-icon.green  { background: #E9FBF0; color: #16A34A; }

    .stat-number {
        font-size: 26px;
        font-weight: 800;
        color: #12162B;
        line-height: 1;
        margin-bottom: 6px;
        letter-spacing: -.3px;
    }

    .stat-sub {
        font-size: 11.5px;
        color: #9AA1B2;
    }

    /* ========= SECTION TITLE ========= */

    .section-title-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 14px;
    }

    .section-title {
        font-size: 15.5px;
        font-weight: 700;
        color: #12162B;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .section-count {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 20px;
        height: 20px;
        padding: 0 6px;
        border-radius: 20px;
        background: #F0F1F5;
        color: #6B7280;
        font-size: 11px;
        font-weight: 700;
    }

    .section-count.warn {
        background: #FEE2E2;
        color: #DC2626;
    }

    .section-link {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 12.5px;
        font-weight: 600;
        color: #6B7280;
        text-decoration: none;
        transition: color .15s ease;
    }

    .section-link:hover {
        color: #1F5EFF;
    }

    .select-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #FFFFFF;
        border: 1px solid #E7E9F1;
        color: #12162B;
        font-size: 12.5px;
        font-weight: 600;
        padding: 7px 12px;
        border-radius: 8px;
    }

    /* ========= CHART CARD ========= */

    .chart-orders-row {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 16px;
        margin-bottom: 28px;
        align-items: start;
    }

    .chart-card {
        background: #FFFFFF;
        border: 1px solid #E7E9F1;
        border-radius: 12px;
        padding: 20px 22px;
        box-shadow: 0 1px 2px rgba(16,24,40,.03);
    }

    .chart-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 18px;
    }

    .chart-title {
        font-size: 15px;
        font-weight: 700;
        color: #12162B;
    }

    .chart-title span {
        font-weight: 400;
        color: #9AA1B2;
        font-size: 12.5px;
        margin-left: 4px;
    }

    .chart-svg-wrap {
        display: flex;
        gap: 10px;
    }

    .chart-y-labels {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        font-size: 11px;
        color: #9AA1B2;
        padding: 4px 0 22px;
        text-align: right;
        min-width: 34px;
    }

    .chart-x-labels {
        display: flex;
        justify-content: space-between;
        font-size: 11px;
        color: #9AA1B2;
        margin-top: 6px;
        padding: 0 2px;
    }

    /* ========= RECENT LIST ========= */

    .recent-section {
        margin-bottom: 28px;
    }

    .two-col {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .recent-card {
        background: #FFFFFF;
        border-radius: 12px;
        border: 1px solid #E7E9F1;
        box-shadow: 0 1px 2px rgba(16,24,40,.03);
        overflow: hidden;
    }

    .recent-item {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 13px 18px;
        border-bottom: 1px solid #F0F1F5;
        text-decoration: none;
        color: inherit;
        transition: background .15s ease;
    }

    .recent-item:hover {
        background: #FAFAFC;
    }

    .recent-item:last-child {
        border-bottom: none;
    }

    .recent-thumb {
        width: 40px;
        height: 40px;
        border-radius: 9px;
        overflow: hidden;
        background: #EEF3FF;
        color: #1F5EFF;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .recent-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .recent-info {
        flex-grow: 1;
        min-width: 0;
    }

    .recent-info h4 {
        font-size: 13px;
        font-weight: 600;
        color: #12162B;
        margin-bottom: 2px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .recent-info span {
        font-size: 11.5px;
        color: #9AA1B2;
    }

    .recent-meta {
        text-align: right;
        flex-shrink: 0;
    }

    .recent-price {
        font-size: 12.5px;
        font-weight: 700;
        color: #12162B;
        margin-bottom: 4px;
    }

    .badge {
        display: inline-block;
        padding: 3px 8px;
        border-radius: 6px;
        font-size: 10px;
        font-weight: 700;
    }

    .badge-in { background: #DCFCE7; color: #16A34A; }
    .badge-out { background: #FEE2E2; color: #DC2626; }

    .badge-unread {
        background: #FEE2E2;
        color: #DC2626;
    }

    .badge-read {
        background: #F0F1F5;
        color: #6B7280;
    }

    .recent-empty {
        padding: 36px 20px;
        text-align: center;
    }

    .recent-empty .icon {
        width: 42px;
        height: 42px;
        margin: 0 auto 12px;
        border-radius: 11px;
        background: #F0F1F5;
        color: #9AA1B2;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .recent-empty h4 {
        font-size: 13.5px;
        font-weight: 700;
        color: #12162B;
        margin-bottom: 4px;
    }

    .recent-empty p {
        font-size: 12px;
        color: #9AA1B2;
        margin-bottom: 12px;
    }

    .btn-small {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #1F5EFF;
        color: white;
        text-decoration: none;
        font-size: 12.5px;
        font-weight: 600;
        padding: 8px 14px;
        border-radius: 8px;
    }

    /* ========= INFO SISTEM BAR ========= */

    .info-bar {
        display: flex;
        align-items: center;
        background: #FFFFFF;
        border: 1px solid #E7E9F1;
        border-radius: 12px;
        padding: 18px 26px;
        box-shadow: 0 1px 2px rgba(16,24,40,.03);
        gap: 34px;
        flex-wrap: wrap;
    }

    .info-bar-title {
        font-size: 13.5px;
        font-weight: 700;
        color: #12162B;
        flex-basis: 100%;
        margin-bottom: 4px;
    }

    .info-bar-item {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .info-bar-icon {
        width: 36px;
        height: 36px;
        border-radius: 9px;
        background: #F0F1F5;
        color: #6B7280;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .info-bar-item .label {
        font-size: 11.5px;
        color: #9AA1B2;
        margin-bottom: 2px;
    }

    .info-bar-item .value {
        font-size: 13px;
        font-weight: 700;
        color: #12162B;
    }

    @media (max-width: 1100px) {
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
        .two-col { grid-template-columns: 1fr; }
        .chart-orders-row { grid-template-columns: 1fr; }
    }

    @media (max-width: 650px) {
        .stats-grid { grid-template-columns: 1fr; }
        .hero-text h1 { font-size: 19px; }
        .stat-number { font-size: 23px; }
        .recent-meta { text-align: left; }
        .info-bar { gap: 20px; }
    }
</style>


{{-- ========= HERO / RINGKASAN ========= --}}

<div class="hero-card fade-in">
    <div class="hero-text">
        <h1>
            Ringkasan Performa Toko
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M22 7 13.5 15.5 8.5 10.5 2 17"></path><path d="M16 7h6v6"></path></svg>
        </h1>
        <p>{{ $greeting }}, Admin — kelola produk, artikel, pesanan, dan pesan masuk dari satu tempat.</p>
    </div>

    <div class="hero-illustration">
        <img src="{{ asset('images/dashboard-hero-illustration.png') }}" alt="Jersey Store" width="120" height="110">
    </div>
</div>


{{-- ========= STATISTIK (lama) ========= --}}

<div class="stats-grid">

    <div class="stat-card fade-in">
        <div class="stat-top">
            <div class="stat-title">Total Produk</div>
            <div class="stat-icon">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23Z"></path></svg>
            </div>
        </div>
        <div class="stat-number">{{ $totalProducts ?? 0 }}</div>
        <div class="stat-sub">Jersey dalam katalog</div>
    </div>

    <div class="stat-card fade-in">
        <div class="stat-top">
            <div class="stat-title">Total Artikel</div>
            <div class="stat-icon purple">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8Z"></path><path d="M14 3v5h5"></path><path d="M9 13h6"></path><path d="M9 17h6"></path></svg>
            </div>
        </div>
        <div class="stat-number">{{ $totalArticles ?? 0 }}</div>
        <div class="stat-sub">Artikel dipublikasikan</div>
    </div>

    <div class="stat-card fade-in">
        <div class="stat-top">
            <div class="stat-title">Total Stok</div>
            <div class="stat-icon orange">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21 8-9-5-9 5 9 5 9-5Z"></path><path d="m3 8 9 5 9-5"></path><path d="M3 16l9 5 9-5"></path><path d="M3 12l9 5 9-5"></path></svg>
            </div>
        </div>
        <div class="stat-number">{{ $totalStock ?? 0 }}</div>
        <div class="stat-sub">Unit di seluruh produk</div>
    </div>

    <div class="stat-card fade-in">
        <div class="stat-top">
            <div class="stat-title">Produk Tersedia</div>
            <div class="stat-icon green">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"></path></svg>
            </div>
        </div>
        <div class="stat-number">{{ $availableProducts ?? 0 }}</div>
        <div class="stat-sub">Siap dijual</div>
    </div>

</div>


{{-- ========= STATISTIK (baru: order & pesan) ========= --}}

<div class="stats-grid">

    <div class="stat-card fade-in">
        <div class="stat-top">
            <div class="stat-title">Total Pesanan</div>
            <div class="stat-icon">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
            </div>
        </div>
        <div class="stat-number">{{ $totalOrders ?? 0 }}</div>
        <div class="stat-sub">Seluruh pesanan masuk</div>
    </div>

    <div class="stat-card fade-in">
        <div class="stat-top">
            <div class="stat-title">Pesanan Pending</div>
            <div class="stat-icon orange">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"></circle><path d="M12 7v5l3 3"></path></svg>
            </div>
        </div>
        <div class="stat-number">{{ $pendingOrders ?? 0 }}</div>
        <div class="stat-sub">Menunggu diproses</div>
    </div>

    <div class="stat-card fade-in">
        <div class="stat-top">
            <div class="stat-title">Total Pendapatan</div>
            <div class="stat-icon green">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1v22"></path><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
            </div>
        </div>
        <div class="stat-number" style="font-size:20px;">
            Rp {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}
        </div>
        <div class="stat-sub">Di luar pesanan dibatalkan</div>
    </div>

    <div class="stat-card fade-in">
        <div class="stat-top">
            <div class="stat-title">Pesan Belum Dibaca</div>
            <div class="stat-icon purple">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5Z"></path></svg>
            </div>
        </div>
        <div class="stat-number">{{ $unreadMessages ?? 0 }}</div>
        <div class="stat-sub">Dari halaman Kontak</div>
    </div>

</div>


{{-- ========= GRAFIK PENJUALAN + PESANAN TERBARU ========= --}}

<div class="chart-orders-row recent-section">

    {{-- GRAFIK PENJUALAN --}}
    <div class="chart-card fade-in">

        <div class="chart-header">
            <div class="chart-title">
                Grafik Penjualan <span>(7 Hari Terakhir)</span>
            </div>
            <div class="select-pill">
                7 Hari
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"></path></svg>
            </div>
        </div>

        <div class="chart-svg-wrap">

            <div class="chart-y-labels" style="height: {{ $chartH }}px;">
                <span>Rp {{ number_format($chartTop, 0, ',', '.') }}</span>
                <span>Rp {{ number_format($chartTop * 0.75, 0, ',', '.') }}</span>
                <span>Rp {{ number_format($chartTop * 0.5, 0, ',', '.') }}</span>
                <span>Rp {{ number_format($chartTop * 0.25, 0, ',', '.') }}</span>
                <span>0</span>
            </div>

            <div style="flex:1; min-width:0;">
                <svg viewBox="0 0 {{ $chartW }} {{ $chartH }}" width="100%" height="{{ $chartH }}" preserveAspectRatio="none">
                    <defs>
                        <linearGradient id="salesFill" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%" stop-color="#1F5EFF" stop-opacity="0.18"/>
                            <stop offset="100%" stop-color="#1F5EFF" stop-opacity="0"/>
                        </linearGradient>
                    </defs>

                    @for ($g = 0; $g <= 4; $g++)
                        <line x1="0" y1="{{ $g * ($chartH - 20) / 4 }}" x2="{{ $chartW }}" y2="{{ $g * ($chartH - 20) / 4 }}" stroke="#F0F1F5" stroke-width="1"></line>
                    @endfor

                    @if(count($points) > 0)
                        <path d="{{ $areaPath }}" fill="url(#salesFill)"></path>
                        <path d="{{ $linePath }}" fill="none" stroke="#1F5EFF" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>

                        @foreach ($points as $p)
                            <circle cx="{{ $p[0] }}" cy="{{ $p[1] }}" r="3.5" fill="#FFFFFF" stroke="#1F5EFF" stroke-width="2.2"></circle>
                        @endforeach
                    @endif
                </svg>

                <div class="chart-x-labels">
                    @foreach ($chartLabels as $label)
                        <span>{{ $label }}</span>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

    {{-- PESANAN TERBARU --}}
    <div>

        <div class="section-title-row">
            <h2 class="section-title">
                Pesanan Terbaru
                @isset($recentOrders)
                    <span class="section-count">{{ $recentOrders->count() }}</span>
                @endisset
            </h2>

            @isset($recentOrders)
                @if($recentOrders->count() > 0)
                    <a href="{{ route('admin.orders.index') }}" class="section-link">Lihat Semua &rarr;</a>
                @endif
            @endisset
        </div>

        <div class="recent-card">

            @isset($recentOrders)

                @if($recentOrders->count() > 0)

                    @foreach($recentOrders as $order)

                        <a href="{{ route('admin.orders.show', $order) }}" class="recent-item">

                            <div class="recent-thumb">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                            </div>

                            <div class="recent-info">
                                <h4>{{ $order->order_number }}</h4>
                                <span>{{ $order->customer_name }}</span>
                            </div>

                            <div class="recent-meta">
                                <div class="recent-price">
                                    Rp {{ number_format($order->total, 0, ',', '.') }}
                                </div>
                                @php $sc = $statusColors[$order->status] ?? ['bg' => '#F0F1F5', 'text' => '#6B7280']; @endphp
                                <span class="badge" style="background: {{ $sc['bg'] }}; color: {{ $sc['text'] }};">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>

                        </a>

                    @endforeach

                @else

                    <div class="recent-empty">
                        <div class="icon">
                            <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                        </div>
                        <h4>Belum ada pesanan</h4>
                        <p>Pesanan dari checkout akan muncul di sini.</p>
                    </div>

                @endif

            @else

                <div class="recent-empty">
                    <div class="icon">
                        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                    </div>
                    <h4>Belum ada pesanan</h4>
                    <p>Pesanan dari checkout akan muncul di sini.</p>
                </div>

            @endisset

        </div>

    </div>

</div>


{{-- ========= PESAN MASUK ========= --}}

<div class="recent-section">

    <div class="section-title-row">
        <h2 class="section-title">
            Pesan Masuk
            @isset($unreadMessages)
                @if($unreadMessages > 0)
                    <span class="section-count warn">{{ $unreadMessages }} baru</span>
                @endif
            @endisset
        </h2>

        @isset($recentMessages)
            @if($recentMessages->count() > 0)
                <a href="{{ route('admin.messages.index') }}" class="section-link">Lihat Semua &rarr;</a>
            @endif
        @endisset
    </div>

    <div class="recent-card">

        @isset($recentMessages)

            @if($recentMessages->count() > 0)

                @foreach($recentMessages as $message)

                    <a href="{{ route('admin.messages.show', $message) }}" class="recent-item">

                        <div class="recent-thumb">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5Z"></path></svg>
                        </div>

                        <div class="recent-info">
                            <h4>{{ $message->name }}</h4>
                            <span>{{ $message->subject }}</span>
                        </div>

                        <div class="recent-meta">
                            <span class="badge {{ $message->status === 'unread' ? 'badge-unread' : 'badge-read' }}">
                                {{ $message->status === 'unread' ? 'Baru' : 'Dibaca' }}
                            </span>
                        </div>

                    </a>

                @endforeach

            @else

                <div class="recent-empty">
                    <div class="icon">
                        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5Z"></path></svg>
                    </div>
                    <h4>Belum ada pesan</h4>
                    <p>Pesan dari halaman Kontak akan muncul di sini.</p>
                </div>

            @endif

        @else

            <div class="recent-empty">
                <div class="icon">
                    <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5Z"></path></svg>
                </div>
                <h4>Belum ada pesan</h4>
                <p>Pesan dari halaman Kontak akan muncul di sini.</p>
            </div>

        @endisset

    </div>

</div>


{{-- ========= PRODUK TERBARU (dipertahankan, tidak diubah) ========= --}}

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
                <a href="{{ route('products.index') }}" class="section-link">Lihat Semua &rarr;</a>
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
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23Z"></path></svg>
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

                    </a>

                @endforeach

            @else

                <div class="recent-empty">
                    <div class="icon">
                        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21 8-9-5-9 5 9 5 9-5Z"></path><path d="m3 8 9 5 9-5"></path><path d="M3 16l9 5 9-5"></path><path d="M3 12l9 5 9-5"></path></svg>
                    </div>
                    <h4>Belum ada produk</h4>
                    <p>Tambahkan produk pertama Anda.</p>
                    <a href="{{ route('products.create') }}" class="btn-small">+ Tambah Produk</a>
                </div>

            @endif

        @else

            <div class="recent-empty">
                <div class="icon">
                    <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21 8-9-5-9 5 9 5 9-5Z"></path><path d="m3 8 9 5 9-5"></path><path d="M3 16l9 5 9-5"></path><path d="M3 12l9 5 9-5"></path></svg>
                </div>
                <h4>Belum ada produk</h4>
                <p>Tambahkan produk pertama Anda.</p>
            </div>

        @endisset

    </div>

</div>


{{-- ========= ARTIKEL TERBARU (dipertahankan, tidak diubah) ========= --}}

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
                <a href="{{ route('articles.index') }}" class="section-link">Lihat Semua &rarr;</a>
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
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8Z"></path><path d="M14 3v5h5"></path><path d="M9 13h6"></path><path d="M9 17h6"></path></svg>
                            @endif
                        </div>

                        <div class="recent-info">
                            <h4>{{ $article->title }}</h4>
                            <span>{{ $article->created_at->format('d M Y') }}</span>
                        </div>

                    </a>

                @endforeach

            @else

                <div class="recent-empty">
                    <div class="icon">
                        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8Z"></path><path d="M14 3v5h5"></path><path d="M9 13h6"></path><path d="M9 17h6"></path></svg>
                    </div>
                    <h4>Belum ada artikel</h4>
                    <p>Mulai buat artikel pertama Anda.</p>
                </div>

            @endif

        @else

            <div class="recent-empty">
                <div class="icon">
                    <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8Z"></path><path d="M14 3v5h5"></path><path d="M9 13h6"></path><path d="M9 17h6"></path></svg>
                </div>
                <h4>Belum ada artikel</h4>
                <p>Mulai buat artikel pertama Anda.</p>
            </div>

        @endisset

    </div>

</div>


{{-- ========= INFORMASI SISTEM ========= --}}

<div class="info-bar fade-in">

    <div class="info-bar-title">Informasi Sistem</div>

    <div class="info-bar-item">
        <div class="info-bar-icon">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m16 18 6-6-6-6"></path><path d="m8 6-6 6 6 6"></path></svg>
        </div>
        <div>
            <div class="label">Versi Aplikasi</div>
            <div class="value">{{ $appVersion }}</div>
        </div>
    </div>

    <div class="info-bar-item">
        <div class="info-bar-icon">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="8" rx="2"></rect><rect x="2" y="13" width="20" height="8" rx="2"></rect><line x1="6" y1="7" x2="6.01" y2="7"></line><line x1="6" y1="17" x2="6.01" y2="17"></line></svg>
        </div>
        <div>
            <div class="label">Lingkungan</div>
            <div class="value">{{ $appEnv }}</div>
        </div>
    </div>

    <div class="info-bar-item">
        <div class="info-bar-icon">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 6v6l4 2"></path></svg>
        </div>
        <div>
            <div class="label">Waktu Server</div>
            <div class="value">{{ $serverTime }}</div>
        </div>
    </div>

</div>

@endsection