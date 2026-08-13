@extends('layouts.app')

@section('title', 'Produk Jersey - Jersey Store')

@section('content')

<style>
    * {
        box-sizing: border-box;
    }

    .products-page {
        max-width: 1280px;
        margin: 0 auto;
        padding: 40px 20px 70px;
    }

    /* ==============================
       HERO
    ============================== */

    .products-hero {
        position: relative;
        overflow: hidden;

        padding: 55px 40px;
        margin-bottom: 32px;

        border-radius: 24px;

        background: linear-gradient(135deg, #111827, #1d4ed8);

        color: white;

        box-shadow: 0 15px 40px rgba(15, 23, 42, .15);
    }

    .products-hero::before {
        content: "";
        position: absolute;
        width: 300px;
        height: 300px;
        right: -100px;
        top: -130px;
        background: rgba(255,255,255,.08);
        border-radius: 50%;
    }

    .products-hero::after {
        content: "";
        position: absolute;
        width: 180px;
        height: 180px;
        right: 180px;
        bottom: -110px;
        background: rgba(255,255,255,.06);
        border-radius: 50%;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 700px;
    }

    .hero-badge {
        display: inline-block;
        padding: 7px 14px;
        margin-bottom: 15px;
        border-radius: 50px;
        background: rgba(255,255,255,.12);
        border: 1px solid rgba(255,255,255,.2);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .5px;
    }

    .products-hero h1 {
        margin: 0;
        font-size: 40px;
        line-height: 1.15;
        font-weight: 800;
    }

    .products-hero p {
        margin: 15px 0 0;
        color: rgba(255,255,255,.8);
        font-size: 16px;
        line-height: 1.7;
        max-width: 560px;
    }

    /* ==============================
       SEARCH BAR (frontend only)
    ============================== */

    .search-wrap {
        position: relative;
        z-index: 2;
        margin-top: 26px;
        max-width: 420px;
    }

    .search-wrap input {
        width: 100%;
        padding: 13px 16px 13px 42px;
        border-radius: 12px;
        border: none;
        outline: none;
        font-size: 14px;
        background: rgba(255,255,255,.95);
        color: #111827;
    }

    .search-wrap input::placeholder {
        color: #94a3b8;
    }

    .search-wrap .search-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 15px;
        color: #6b7280;
    }

    /* ==============================
       SECTION HEADER
    ============================== */

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: end;
        margin-bottom: 22px;
        flex-wrap: wrap;
        gap: 10px;
    }

    .section-header h2 {
        margin: 0;
        font-size: 24px;
        color: #111827;
    }

    .section-header p {
        margin: 6px 0 0;
        color: #6b7280;
        font-size: 14px;
    }

    .result-count {
        font-size: 13px;
        color: #6b7280;
    }

    /* ==============================
       PRODUCT GRID
    ============================== */

    .product-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 22px;
    }

    /* ==============================
       PRODUCT CARD
    ============================== */

    .product-card {
        overflow: hidden;
        display: flex;
        flex-direction: column;
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(15,23,42,.05);
        transition: transform .25s ease, box-shadow .25s ease;
    }

    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 35px rgba(15,23,42,.12);
    }

    .product-image {
        position: relative;
        height: 230px;
        overflow: hidden;
        background: #f1f5f9;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
        transition: transform .4s ease;
    }

    .product-card:hover .product-image img {
        transform: scale(1.06);
    }

    .image-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        color: #94a3b8;
        background: linear-gradient(135deg, #f8fafc, #e2e8f0);
    }

    .image-placeholder span {
        font-size: 46px;
        margin-bottom: 6px;
    }

    .image-placeholder small {
        font-size: 12px;
    }

    .product-body {
        padding: 18px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .product-title {
        margin: 0 0 8px;
        font-size: 17px;
        line-height: 1.4;
        font-weight: 750;
        color: #111827;
    }

    .product-description {
        margin: 0 0 14px;
        color: #6b7280;
        font-size: 13px;
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-price {
        margin-bottom: 14px;
        font-size: 20px;
        font-weight: 800;
        color: #1d4ed8;
    }

    .stock-text {
        margin-bottom: 14px;
        font-size: 12.5px;
        font-weight: 600;
    }

    .stock-text.in-stock {
        color: #16a34a;
    }

    .stock-text.out-stock {
        color: #dc2626;
    }

    /* ==============================
       ACTIONS
    ============================== */

    .product-actions {
        margin-top: auto;
        padding-top: 14px;
        border-top: 1px solid #f1f5f9;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        width: 100%;
        padding: 10px 14px;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        transition: background .2s ease, transform .2s ease, opacity .2s ease;
        font-family: inherit;
    }

    .btn-detail {
        background: #111827;
        color: white;
    }

    .btn-detail:hover {
        background: #1d4ed8;
        transform: translateY(-1px);
    }

    .btn-row {
        display: flex;
        gap: 8px;
    }

    .btn-cart {
        background: #facc15;
        color: #111827;
        flex: 1;
    }

    .btn-cart:hover:not(:disabled) {
        background: #eab308;
        transform: translateY(-1px);
    }

    .btn-buy {
        background: #1d4ed8;
        color: white;
        flex: 1.4;
        box-shadow: 0 6px 16px rgba(29,78,216,.28);
    }

    .btn-buy:hover:not(:disabled) {
        background: #1e3a8a;
        transform: translateY(-1px);
    }

    .btn:disabled {
        opacity: .5;
        cursor: not-allowed;
        transform: none !important;
    }

    /* ==============================
       WHY SECTION
    ============================== */

    .why-section {
        margin-top: 64px;
    }

    .why-section h3 {
        text-align: center;
        font-size: 22px;
        color: #111827;
        margin: 0 0 28px;
    }

    .why-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
    }

    .why-card {
        text-align: center;
        padding: 24px 16px;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        background: white;
    }

    .why-card .why-icon {
        font-size: 26px;
        margin-bottom: 10px;
    }

    .why-card h4 {
        margin: 0 0 6px;
        font-size: 14px;
        color: #111827;
    }

    .why-card p {
        margin: 0;
        font-size: 12.5px;
        color: #6b7280;
        line-height: 1.5;
    }

    /* ==============================
       EMPTY / NO RESULT
    ============================== */

    .empty-state {
        padding: 70px 25px;
        text-align: center;
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 20px;
        box-shadow: 0 6px 20px rgba(15,23,42,.04);
    }

    .empty-icon {
        font-size: 50px;
        margin-bottom: 15px;
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
       TOAST (untuk fitur yang belum tersedia)
    ============================== */

    .js-toast {
        position: fixed;
        left: 50%;
        bottom: 28px;
        transform: translateX(-50%) translateY(20px);
        background: #111827;
        color: white;
        padding: 12px 18px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        box-shadow: 0 10px 25px rgba(0,0,0,.2);
        opacity: 0;
        pointer-events: none;
        transition: opacity .25s ease, transform .25s ease;
        z-index: 999;
    }

    .js-toast.show {
        opacity: 1;
        transform: translateX(-50%) translateY(0);
    }

    /* ==============================
       RESPONSIVE
    ============================== */

    @media (max-width: 1100px) {
        .product-grid,
        .why-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 900px) {
        .product-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .why-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .products-hero h1 {
            font-size: 34px;
        }
    }

    @media (max-width: 560px) {
        .products-page {
            padding: 25px 15px 50px;
        }

        .products-hero {
            padding: 32px 22px;
            border-radius: 18px;
        }

        .products-hero h1 {
            font-size: 28px;
        }

        .products-hero p {
            font-size: 14px;
        }

        .search-wrap {
            max-width: 100%;
        }

        .product-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .why-grid {
            grid-template-columns: 1fr;
        }

        .product-image {
            height: 150px;
        }

        .product-body {
            padding: 12px;
        }

        .product-title {
            font-size: 14px;
        }

        .product-price {
            font-size: 16px;
        }

        .btn-row {
            flex-direction: column;
        }
    }
</style>


<div class="products-page">

    {{-- =========================================
         HERO
    ========================================== --}}

    <section class="products-hero">

        <div class="hero-content">

            <div class="hero-badge">⚽ JERSEY STORE</div>

            <h1>Koleksi Jersey Terbaik</h1>

            <p>
                Temukan berbagai jersey favorit dengan
                desain berkualitas dan nyaman digunakan.
                Pilih jersey yang paling cocok untuk
                kamu dan lengkapi koleksimu.
            </p>

        </div>

        <div class="search-wrap">
            <span class="search-icon">🔍</span>
            <input
                type="text"
                id="productSearch"
                placeholder="Cari nama jersey..."
                onkeyup="filterProducts()"
                autocomplete="off"
            >
        </div>

    </section>


    {{-- =========================================
         SECTION HEADER
    ========================================== --}}

    <div class="section-header">

        <div>
            <h2>Koleksi Jersey</h2>
            <p>Pilih jersey favoritmu dari koleksi kami.</p>
        </div>

        <div class="result-count" id="resultCount"></div>

    </div>


    {{-- =========================================
         PRODUCT LIST
    ========================================== --}}

    @if($products->count() > 0)

        <div class="product-grid" id="productGrid">

            @foreach($products as $product)

                <article class="product-card" data-name="{{ strtolower($product->name) }}">

                    {{-- IMAGE --}}
                    <a
                        href="{{ route('public.products.show', $product) }}"
                        style="text-decoration:none;"
                    >
                        <div class="product-image">

                            @if($product->image)
                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                    loading="lazy"
                                >
                            @else
                                <div class="image-placeholder">
                                    <span>👕</span>
                                    <small>Tidak ada gambar</small>
                                </div>
                            @endif

                        </div>
                    </a>

                    {{-- BODY --}}
                    <div class="product-body">

                        <h3 class="product-title">{{ $product->name }}</h3>

                        @if($product->description)
                            <p class="product-description">
                                {{ \Illuminate\Support\Str::limit(strip_tags($product->description), 90) }}
                            </p>
                        @else
                            <p class="product-description">
                                Jersey berkualitas dengan desain menarik dan nyaman digunakan.
                            </p>
                        @endif

                        <div class="product-price">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>

                        <div class="stock-text {{ $product->stock > 0 ? 'in-stock' : 'out-stock' }}">
                            @if($product->stock > 0)
                                ✓ Stok tersedia
                            @else
                                ✕ Stok habis
                            @endif
                        </div>

                        <div class="product-actions">

                            <a
                                href="{{ route('public.products.show', $product) }}"
                                class="btn btn-detail"
                            >
                                Lihat Detail <span>→</span>
                            </a>

                            <div class="btn-row">

                                <button
                                    type="button"
                                    class="btn btn-cart"
                                    {{ $product->stock > 0 ? '' : 'disabled' }}
                                    onclick="showComingSoon('keranjang')"
                                >
                                    🛒 Keranjang
                                </button>

                                <button
                                    type="button"
                                    class="btn btn-buy"
                                    {{ $product->stock > 0 ? '' : 'disabled' }}
                                    onclick="showComingSoon('beli')"
                                >
                                    Beli Sekarang
                                </button>

                            </div>

                        </div>

                    </div>

                </article>

            @endforeach

        </div>

        <div class="empty-state" id="noResultState" style="display:none; margin-top:24px;">
            <div class="empty-icon">🔎</div>
            <h3>Produk Tidak Ditemukan</h3>
            <p>Coba gunakan kata kunci lain.</p>
        </div>

    @else

        <div class="empty-state">
            <div class="empty-icon">👕</div>
            <h3>Belum Ada Produk</h3>
            <p>Saat ini belum ada jersey yang tersedia. Silakan kembali lagi nanti.</p>
        </div>

    @endif


    {{-- =========================================
         WHY SECTION
    ========================================== --}}

    <div class="why-section">

        <h3>Kenapa Belanja di Jersey Store?</h3>

        <div class="why-grid">

            <div class="why-card">
                <div class="why-icon">👕</div>
                <h4>Jersey Berkualitas</h4>
                <p>Bahan nyaman dan tahan lama untuk pemakaian sehari-hari.</p>
            </div>

            <div class="why-card">
                <div class="why-icon">💰</div>
                <h4>Harga Bersahabat</h4>
                <p>Harga yang wajar untuk kualitas jersey yang kamu dapatkan.</p>
            </div>

            <div class="why-card">
                <div class="why-icon">🚚</div>
                <h4>Pengiriman Cepat</h4>
                <p>Pesanan diproses dan dikirim secepat mungkin.</p>
            </div>

            <div class="why-card">
                <div class="why-icon">🤝</div>
                <h4>Pelayanan Terbaik</h4>
                <p>Tim kami siap membantu kebutuhan belanjamu.</p>
            </div>

        </div>

    </div>

</div>


{{-- Toast untuk tombol yang backend-nya belum tersedia --}}
<div class="js-toast" id="jsToast"></div>


<script>
    // Filter produk sederhana di sisi frontend (tidak memanggil backend)
    function filterProducts() {
        const query = document.getElementById('productSearch').value.trim().toLowerCase();
        const cards = document.querySelectorAll('#productGrid .product-card');
        const noResult = document.getElementById('noResultState');
        const resultCount = document.getElementById('resultCount');

        let visibleCount = 0;

        cards.forEach(function (card) {
            const name = card.getAttribute('data-name');
            const match = name.includes(query);
            card.style.display = match ? '' : 'none';
            if (match) visibleCount++;
        });

        if (resultCount) {
            resultCount.textContent = query
                ? visibleCount + ' produk ditemukan'
                : '';
        }

        if (noResult) {
            noResult.style.display = (visibleCount === 0) ? 'block' : 'none';
        }
    }

    // Notifikasi sementara untuk tombol Keranjang / Beli Sekarang
    // (Diaktifkan sebagai UI dulu karena backend keranjang/checkout belum tersedia)
    function showComingSoon(type) {
        const toast = document.getElementById('jsToast');
        toast.textContent = type === 'keranjang'
            ? 'Fitur keranjang belum tersedia'
            : 'Fitur beli sekarang belum tersedia';

        toast.classList.add('show');

        clearTimeout(window.__toastTimeout);
        window.__toastTimeout = setTimeout(function () {
            toast.classList.remove('show');
        }, 2200);
    }
</script>

@endsection