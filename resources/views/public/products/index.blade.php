@extends('layouts.app')

@section('title', 'Produk Jersey - Jersey Store')

@section('content')

<style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif;
    }

    /* ================= PAGE HEADER ================= */

    .products-header {
        background: #F1F1EF;
        padding: 56px 32px 48px;
        text-align: center;
    }

    .products-header .eyebrow {
        display: block;
        font-size: 14px;
        font-weight: 500;
        color: #4B5563;
        margin-bottom: 12px;
    }

    .products-header h1 {
        font-family: 'Playfair Display', 'Inter', serif;
        font-size: 48px;
        line-height: 1.08;
        font-weight: 700;
        letter-spacing: -.01em;
        color: #171717;
        margin: 0 0 14px;
    }

    .products-header p {
        max-width: 480px;
        margin: 0 auto 28px;
        color: #4B5563;
        font-size: 15px;
        line-height: 1.7;
    }

    .search-wrap {
        position: relative;
        max-width: 380px;
        margin: 0 auto;
    }

    .search-wrap input {
        width: 100%;
        padding: 13px 18px 13px 42px;
        border-radius: 999px;
        border: 1px solid #E5E7EB;
        outline: none;
        font-size: 14px;
        background: #FFFFFF;
        color: #171717;
    }

    .search-wrap input:focus {
        border-color: #171717;
    }

    .search-wrap .search-icon {
        position: absolute;
        left: 17px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 14px;
        color: #9CA3AF;
    }

    /* ================= SECTION ================= */

    .products-section {
        max-width: 1240px;
        margin: 0 auto;
        padding: 56px 32px 90px;
    }

    .section-heading-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 26px;
        flex-wrap: wrap;
        gap: 10px;
    }

    .section-heading-row h2 {
        font-size: 20px;
        font-weight: 700;
        color: #171717;
        margin: 0;
    }

    .result-count {
        font-size: 13px;
        color: #6B7280;
    }

    /* ================= PRODUCT GRID ================= */

    .product-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 22px;
    }

    .product-card {
        display: flex;
        flex-direction: column;
        background: #FFFFFF;
        border: 1px solid #E5E7EB;
        border-radius: 14px;
        overflow: hidden;
        transition: transform .2s ease, border-color .2s ease;
    }

    .product-card:hover {
        transform: translateY(-4px);
        border-color: #D1D5DB;
    }

    .product-image {
        position: relative;
        height: 240px;
        overflow: hidden;
        background: #F8FAFC;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .35s ease;
    }

    .product-card:hover .product-image img {
        transform: scale(1.05);
    }

    .image-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        gap: 6px;
        color: #9CA3AF;
        background: #F1F5F9;
        font-size: 13px;
    }

    .product-body {
        padding: 18px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .product-title {
        font-size: 15px;
        font-weight: 700;
        color: #171717;
        margin: 0 0 8px;
        line-height: 1.4;
    }

    .product-description {
        font-size: 12.5px;
        color: #6B7280;
        line-height: 1.6;
        margin: 0 0 14px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-price {
        font-size: 18px;
        font-weight: 800;
        color: #171717;
        margin-bottom: 6px;
    }

    .stock-text {
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 16px;
    }

    .stock-text.in-stock {
        color: #16A34A;
    }

    .stock-text.out-stock {
        color: #DC2626;
    }

    .product-actions {
        margin-top: auto;
        display: flex;
        gap: 8px;
    }

    .btn-detail {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 11px 14px;
        border-radius: 999px;
        background: #171717;
        color: #FFFFFF;
        text-decoration: none;
        font-size: 12.5px;
        font-weight: 700;
        transition: background .2s ease;
    }

    .btn-detail:hover {
        background: #F4B400;
        color: #171717;
    }

    .btn-cart {
        width: 42px;
        height: 42px;
        flex-shrink: 0;
        border-radius: 50%;
        border: none;
        background: #F4B400;
        color: #171717;
        font-size: 15px;
        cursor: pointer;
        transition: transform .2s ease, opacity .2s ease;
    }

    .btn-cart:hover:not(:disabled) {
        transform: translateY(-2px);
    }

    .btn-cart:disabled {
        opacity: .4;
        cursor: not-allowed;
    }

    /* ================= EMPTY / NO RESULT ================= */

    .empty-state {
        grid-column: 1 / -1;
        padding: 70px 25px;
        text-align: center;
        background: #F8FAFC;
        border-radius: 16px;
    }

    .empty-icon {
        font-size: 44px;
        margin-bottom: 14px;
        opacity: .6;
    }

    .empty-state h3 {
        margin: 0 0 8px;
        font-size: 17px;
        color: #171717;
    }

    .empty-state p {
        margin: 0;
        color: #6B7280;
        font-size: 13.5px;
    }

    /* ================= TOAST ================= */

    .js-toast {
        position: fixed;
        left: 50%;
        bottom: 28px;
        transform: translateX(-50%) translateY(20px);
        background: #171717;
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

    /* ================= RESPONSIVE ================= */

    @media (max-width: 1024px) {
        .product-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .products-header h1 {
            font-size: 36px;
        }
    }

    @media (max-width: 640px) {
        .products-header {
            padding: 40px 20px 36px;
        }

        .products-header h1 {
            font-size: 30px;
        }

        .products-section {
            padding: 40px 20px 60px;
        }

        .product-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .product-image {
            height: 150px;
        }

        .product-body {
            padding: 12px;
        }

        .product-title {
            font-size: 13px;
        }

        .product-price {
            font-size: 15px;
        }
    }
</style>


<!-- ================= HEADER ================= -->

<div class="products-header">

    <span class="eyebrow">Koleksi Jersey 2026</span>

    <h1>Koleksi Jersey</h1>

    <p>
        Temukan berbagai jersey favorit dengan desain berkualitas
        dan nyaman digunakan.
    </p>

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

</div>


<!-- ================= PRODUCT LIST ================= -->

<div class="products-section">

    <div class="section-heading-row">
        <h2>Semua Produk</h2>
        <div class="result-count" id="resultCount"></div>
    </div>

    @if($products->count() > 0)

        <div class="product-grid" id="productGrid">

            @foreach($products as $product)

                <article class="product-card" data-name="{{ strtolower($product->name) }}">

                    <a href="{{ route('public.products.show', $product) }}" style="text-decoration:none;">
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
                                    <span>Tidak ada gambar</span>
                                </div>
                            @endif

                        </div>
                    </a>

                    <div class="product-body">

                        <h3 class="product-title">{{ $product->name }}</h3>

                        @if($product->description)
                            <p class="product-description">
                                {{ \Illuminate\Support\Str::limit(strip_tags($product->description), 90) }}
                            </p>
                        @endif

                        <div class="product-price">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>

                        <div class="stock-text {{ $product->stock > 0 ? 'in-stock' : 'out-stock' }}">
                            {{ $product->stock > 0 ? '✓ Stok tersedia' : '✕ Stok habis' }}
                        </div>

                        <div class="product-actions">

                            <a href="{{ route('public.products.show', $product) }}" class="btn-detail">
                                Lihat Detail
                            </a>

                            <button
                                type="button"
                                class="btn-cart"
                                {{ $product->stock > 0 ? '' : 'disabled' }}
                                onclick="showComingSoon()"
                                title="Tambah ke Keranjang"
                            >
                                🛒
                            </button>

                        </div>

                    </div>

                </article>

            @endforeach

        </div>

        <div class="empty-state" id="noResultState" style="display:none;">
            <div class="empty-icon">🔎</div>
            <h3>Produk Tidak Ditemukan</h3>
            <p>Coba gunakan kata kunci lain.</p>
        </div>

    @else

        <div class="product-grid">
            <div class="empty-state">
                <div class="empty-icon">👕</div>
                <h3>Belum Ada Produk</h3>
                <p>Saat ini belum ada jersey yang tersedia. Silakan kembali lagi nanti.</p>
            </div>
        </div>

    @endif

</div>


<div class="js-toast" id="jsToast"></div>


<script>
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
            resultCount.textContent = query ? visibleCount + ' produk ditemukan' : '';
        }

        if (noResult) {
            noResult.style.display = (visibleCount === 0) ? 'block' : 'none';
        }
    }

    function showComingSoon() {
        const toast = document.getElementById('jsToast');
        toast.textContent = 'Fitur keranjang belum tersedia';
        toast.classList.add('show');

        clearTimeout(window.__toastTimeout);
        window.__toastTimeout = setTimeout(function () {
            toast.classList.remove('show');
        }, 2200);
    }
</script>

@endsection