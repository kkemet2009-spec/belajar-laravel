{{-- =========================================================
     CHECKOUT PAGE - JERSEY STORE
     resources/views/checkout/index.blade.php
========================================================= --}}

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Checkout - Jersey Store</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #111827;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input,
        textarea {
            font-family: inherit;
        }

        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar {
            width: 100%;
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-container {
            max-width: 1150px;
            margin: auto;
            min-height: 78px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 21px;
            font-weight: 800;
            color: #111827;
        }

        .brand img {
            width: 42px;
            height: 42px;
            object-fit: contain;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-menu a {
            font-size: 15px;
            font-weight: 600;
            color: #374151;
            transition: 0.2s;
        }

        .nav-menu a:hover {
            color: #111827;
        }

        .dashboard-btn {
            background: #111827 !important;
            color: white !important;
            padding: 12px 22px;
            border-radius: 30px;
        }

        .dashboard-btn:hover {
            background: #000000 !important;
        }

        /* =====================================================
           CONTAINER
        ===================================================== */

        .container {
            max-width: 1150px;
            margin: auto;
            padding: 30px 20px 70px;
        }

        /* =====================================================
           BREADCRUMB
        ===================================================== */

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 15px;
        }

        .breadcrumb a {
            color: #111827;
            font-weight: 600;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        /* =====================================================
           HEADER
        ===================================================== */

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-size: 36px;
            font-weight: 800;
            margin-bottom: 8px;
            color: #111827;
        }

        .page-header p {
            color: #6b7280;
            font-size: 16px;
        }

        /* =====================================================
           ALERT
        ===================================================== */

        .alert {
            padding: 15px 18px;
            border-radius: 12px;
            margin-bottom: 25px;
            font-size: 14px;
            font-weight: 600;
        }

        .alert-success {
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
        }

        .alert-error {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .validation-errors {
            margin-bottom: 25px;
            padding: 18px 20px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 12px;
            color: #991b1b;
        }

        .validation-errors strong {
            display: block;
            margin-bottom: 8px;
        }

        .validation-errors ul {
            padding-left: 20px;
        }

        /* =====================================================
           CHECKOUT GRID
        ===================================================== */

        .checkout-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.7fr) minmax(320px, 0.9fr);
            gap: 28px;
            align-items: start;
        }

        /* =====================================================
           CARD
        ===================================================== */

        .card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 22px;
            padding: 30px;
            box-shadow: 0 8px 30px rgba(17, 24, 39, 0.04);
        }

        .card + .card {
            margin-top: 24px;
        }

        /* =====================================================
           SECTION TITLE
        ===================================================== */

        .section-title {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 8px;
        }

        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #111827;
            color: #ffffff;

            font-size: 14px;
            font-weight: 800;

            flex-shrink: 0;
        }

        .section-title h2 {
            font-size: 22px;
            font-weight: 800;
        }

        .section-description {
            margin-left: 54px;
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 25px;
        }

        /* =====================================================
           FORM
        ===================================================== */

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 700;
            color: #374151;
        }

        .required {
            color: #dc2626;
        }

        .form-control {
            width: 100%;
            border: 1px solid #d1d5db;
            border-radius: 12px;
            padding: 14px 15px;

            font-size: 15px;
            color: #111827;
            background: #ffffff;

            outline: none;
            transition: 0.2s;
        }

        .form-control:focus {
            border-color: #111827;
            box-shadow: 0 0 0 3px rgba(17, 24, 39, 0.08);
        }

        textarea.form-control {
            min-height: 130px;
            resize: vertical;
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        /* =====================================================
           PAYMENT
        ===================================================== */

        .payment-options {
            display: grid;
            gap: 12px;
        }

        .payment-option {
            position: relative;
        }

        .payment-option input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .payment-label {
            display: flex;
            align-items: center;
            gap: 15px;

            padding: 16px;
            border: 1px solid #d1d5db;
            border-radius: 14px;

            cursor: pointer;
            transition: 0.2s;
        }

        .payment-label:hover {
            border-color: #9ca3af;
            background: #fafafa;
        }

        .payment-option input:checked + .payment-label {
            border-color: #111827;
            background: #f9fafb;
            box-shadow: 0 0 0 2px rgba(17, 24, 39, 0.06);
        }

        .payment-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;

            background: #f3f4f6;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 22px;
            flex-shrink: 0;
        }

        .payment-info strong {
            display: block;
            font-size: 15px;
            margin-bottom: 4px;
        }

        .payment-info span {
            color: #6b7280;
            font-size: 13px;
        }

        .radio-circle {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid #d1d5db;
            margin-left: auto;
            flex-shrink: 0;
        }

        .payment-option input:checked + .payment-label .radio-circle {
            border: 6px solid #111827;
        }

        /* =====================================================
           ORDER SUMMARY
        ===================================================== */

        .summary-card {
            position: sticky;
            top: 100px;
        }

        .summary-title {
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 24px;
        }

        .product-list {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .product-item {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .product-image {
            width: 72px;
            height: 72px;

            border-radius: 13px;

            background: #f3f4f6;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;
            flex-shrink: 0;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-image-placeholder {
            font-size: 27px;
            color: #9ca3af;
        }

        .product-info {
            flex: 1;
            min-width: 0;
        }

        .product-name {
            font-weight: 700;
            font-size: 14px;
            line-height: 1.4;
            margin-bottom: 5px;

            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-quantity {
            color: #6b7280;
            font-size: 13px;
        }

        .product-price {
            font-size: 14px;
            font-weight: 800;
            white-space: nowrap;
        }

        .divider {
            border: 0;
            border-top: 1px solid #e5e7eb;
            margin: 22px 0;
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 14px;

            font-size: 14px;
            color: #6b7280;
        }

        .price-row strong {
            color: #374151;
        }

        .shipping-free {
            color: #059669 !important;
            font-weight: 700;
        }

        .total-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;

            padding-top: 20px;
            border-top: 2px solid #111827;
            margin-top: 20px;
        }

        .total-label {
            font-size: 18px;
            font-weight: 800;
        }

        .total-price {
            font-size: 25px;
            font-weight: 900;
            color: #111827;
        }

        /* =====================================================
           BUTTON
        ===================================================== */

        .submit-button {
            width: 100%;
            border: 0;

            background: #111827;
            color: #ffffff;

            padding: 16px 20px;
            border-radius: 14px;

            font-size: 16px;
            font-weight: 800;

            cursor: pointer;
            transition: 0.2s;

            margin-top: 25px;
        }

        .submit-button:hover {
            background: #000000;
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(17, 24, 39, 0.15);
        }

        .submit-button:active {
            transform: translateY(0);
        }

        .back-cart {
            display: block;
            text-align: center;

            margin-top: 16px;

            color: #6b7280;
            font-size: 14px;
            font-weight: 700;
        }

        .back-cart:hover {
            color: #111827;
        }

        .secure-info {
            margin-top: 20px;
            padding: 13px;

            background: #f9fafb;
            border-radius: 12px;

            color: #6b7280;
            font-size: 12px;
            text-align: center;
            line-height: 1.5;
        }

        /* =====================================================
           EMPTY CART
        ===================================================== */

        .empty-cart {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 22px;
            padding: 60px 25px;
            text-align: center;
        }

        .empty-cart-icon {
            font-size: 55px;
            margin-bottom: 18px;
        }

        .empty-cart h2 {
            font-size: 25px;
            margin-bottom: 8px;
        }

        .empty-cart p {
            color: #6b7280;
            margin-bottom: 25px;
        }

        .shop-button {
            display: inline-block;
            background: #111827;
            color: #ffffff;
            padding: 13px 22px;
            border-radius: 12px;
            font-weight: 700;
        }

        /* =====================================================
           SUCCESS ORDER
        ===================================================== */

        .success-card {
            background: #ffffff;
            border: 1px solid #d1fae5;
            border-radius: 22px;
            padding: 45px 30px;
            text-align: center;
            margin-bottom: 30px;
        }

        .success-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;

            margin: 0 auto 20px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #ecfdf5;
            color: #059669;

            font-size: 35px;
        }

        .success-card h2 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .success-card p {
            color: #6b7280;
            margin-bottom: 20px;
        }

        .order-number {
            display: inline-block;
            padding: 12px 18px;

            background: #f3f4f6;
            border-radius: 10px;

            font-size: 14px;
            font-weight: 800;
        }

        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {
            background: #111827;
            color: #ffffff;
            padding: 25px 20px;
            text-align: center;
            font-size: 13px;
        }

        .footer span {
            color: #9ca3af;
        }

        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 900px) {

            .checkout-grid {
                grid-template-columns: 1fr;
            }

            .summary-card {
                position: static;
            }

            .nav-menu {
                gap: 15px;
            }
        }

        @media (max-width: 700px) {

            .nav-container {
                min-height: auto;
                padding-top: 15px;
                padding-bottom: 15px;
                flex-direction: column;
                gap: 15px;
            }

            .nav-menu {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .page-header h1 {
                font-size: 29px;
            }

            .card {
                padding: 22px;
                border-radius: 17px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .form-group.full {
                grid-column: auto;
            }

            .section-description {
                margin-left: 0;
                margin-top: 8px;
            }

            .total-price {
                font-size: 21px;
            }
        }

        @media (max-width: 450px) {

            .nav-menu a {
                font-size: 13px;
            }

            .dashboard-btn {
                padding: 10px 15px;
            }

            .container {
                padding-left: 13px;
                padding-right: 13px;
            }

            .product-image {
                width: 62px;
                height: 62px;
            }

            .product-price {
                font-size: 13px;
            }
        }
    </style>
</head>


<body>

    {{-- =====================================================
         NAVBAR
    ====================================================== --}}

    <header class="navbar">

        <div class="nav-container">

            <a href="{{ route('home') }}" class="brand">

                @if(file_exists(public_path('images/logo.png')))
                    <img
                        src="{{ asset('images/logo.png') }}"
                        alt="Jersey Store">
                @else
                    <span style="font-size:30px;">⚽</span>
                @endif

                <span>Jersey Store</span>

            </a>


            <nav class="nav-menu">

                <a href="{{ route('home') }}">
                    Home
                </a>

                <a href="{{ route('public.products.index') }}">
                    Produk
                </a>

                <a href="{{ route('public.articles.index') }}">
                    Artikel
                </a>

                <a href="{{ route('contact') }}">
                    Kontak
                </a>

                @auth
                    <a
                        href="{{ route('dashboard') }}"
                        class="dashboard-btn">
                        Dashboard
                    </a>
                @endauth

            </nav>

        </div>

    </header>


    {{-- =====================================================
         MAIN
    ====================================================== --}}

    <main class="container">


        {{-- =================================================
             BREADCRUMB
        ================================================== --}}

        <div class="breadcrumb">

            <a href="{{ route('home') }}">
                Home
            </a>

            <span>/</span>

            <span>Checkout</span>

        </div>


        {{-- =================================================
             PAGE HEADER
        ================================================== --}}

        <div class="page-header">

            <h1>
                Checkout
            </h1>

            <p>
                Lengkapi informasi pengiriman dan pembayaran
                untuk menyelesaikan pesanan.
            </p>

        </div>


        {{-- =================================================
             SUCCESS MESSAGE
        ================================================== --}}

        @if(session('success'))

            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>

        @endif


        {{-- =================================================
             ERROR MESSAGE
        ================================================== --}}

        @if(session('error'))

            <div class="alert alert-error">
                {{ session('error') }}
            </div>

        @endif


        {{-- =================================================
             VALIDATION ERRORS
        ================================================== --}}

        @if($errors->any())

            <div class="validation-errors">

                <strong>
                    Ada data yang perlu diperbaiki:
                </strong>

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- =================================================
             SUCCESS ORDER DETAIL
        ================================================== --}}

        @if(session('success') && session('last_order'))

            @php
                $lastOrder = session('last_order');
            @endphp

            <div class="success-card">

                <div class="success-icon">
                    ✓
                </div>

                <h2>
                    Pesanan Berhasil!
                </h2>

                <p>
                    Terima kasih, pesanan kamu sudah berhasil dibuat.
                </p>

                <div class="order-number">

                    Nomor Pesanan:
                    {{ $lastOrder['order_number'] ?? '-' }}

                </div>

            </div>

        @endif


        {{-- =================================================
             EMPTY CART
        ================================================== --}}

        @if(empty($cart))

            <div class="empty-cart">

                <div class="empty-cart-icon">
                    🛒
                </div>

                <h2>
                    Keranjang Masih Kosong
                </h2>

                <p>
                    Silakan pilih jersey terlebih dahulu
                    sebelum melakukan checkout.
                </p>

                <a
                    href="{{ route('public.products.index') }}"
                    class="shop-button">

                    Lihat Produk

                </a>

            </div>


        @else


            {{-- =================================================
                 CHECKOUT GRID
            ================================================== --}}

            <div class="checkout-grid">


                {{-- =============================================
                     LEFT SIDE
                ============================================== --}}

                <div>


                    {{-- =========================================
                         INFORMASI PENGIRIMAN
                    ========================================== --}}

                    <div class="card">

                        <div class="section-title">

                            <div class="step-number">
                                01
                            </div>

                            <h2>
                                Informasi Pengiriman
                            </h2>

                        </div>

                        <p class="section-description">
                            Masukkan data penerima pesanan.
                        </p>


                        <form
                            action="{{ route('checkout.store') }}"
                            method="POST"
                            id="checkoutForm">

                            @csrf


                            <div class="form-grid">


                                {{-- Nama --}}

                                <div class="form-group">

                                    <label for="name">

                                        Nama Lengkap
                                        <span class="required">*</span>

                                    </label>

                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        class="form-control"
                                        placeholder="Masukkan nama lengkap"
                                        value="{{ old('name') }}"
                                        maxlength="100"
                                        required>

                                </div>


                                {{-- WhatsApp --}}

                                <div class="form-group">

                                    <label for="phone">

                                        Nomor WhatsApp
                                        <span class="required">*</span>

                                    </label>

                                    <input
                                        type="tel"
                                        id="phone"
                                        name="phone"
                                        class="form-control"
                                        placeholder="Contoh: 081234567890"
                                        value="{{ old('phone') }}"
                                        maxlength="30"
                                        required>

                                </div>


                                {{-- Alamat --}}

                                <div class="form-group full">

                                    <label for="address">

                                        Alamat Lengkap
                                        <span class="required">*</span>

                                    </label>

                                    <textarea
                                        id="address"
                                        name="address"
                                        class="form-control"
                                        placeholder="Nama jalan, nomor rumah, desa/kelurahan, kecamatan, kabupaten/kota, provinsi"
                                        maxlength="500"
                                        required>{{ old('address') }}</textarea>

                                </div>

                            </div>


                            {{-- =================================
                                 METODE PEMBAYARAN
                            ================================== --}}

                            <div style="margin-top: 15px;">

                                <div class="section-title">

                                    <div class="step-number">
                                        02
                                    </div>

                                    <h2>
                                        Metode Pembayaran
                                    </h2>

                                </div>

                                <p class="section-description">
                                    Pilih metode pembayaran yang kamu inginkan.
                                </p>


                                <div class="payment-options">


                                    {{-- COD --}}

                                    <div class="payment-option">

                                        <input
                                            type="radio"
                                            id="cod"
                                            name="payment_method"
                                            value="cod"
                                            {{ old('payment_method', 'cod') === 'cod' ? 'checked' : '' }}
                                            required>

                                        <label
                                            for="cod"
                                            class="payment-label">

                                            <div class="payment-icon">
                                                💵
                                            </div>

                                            <div class="payment-info">

                                                <strong>
                                                    Cash on Delivery (COD)
                                                </strong>

                                                <span>
                                                    Bayar ketika pesanan sampai.
                                                </span>

                                            </div>

                                            <div class="radio-circle"></div>

                                        </label>

                                    </div>


                                    {{-- Transfer --}}

                                    <div class="payment-option">

                                        <input
                                            type="radio"
                                            id="transfer"
                                            name="payment_method"
                                            value="transfer"
                                            {{ old('payment_method') === 'transfer' ? 'checked' : '' }}>

                                        <label
                                            for="transfer"
                                            class="payment-label">

                                            <div class="payment-icon">
                                                🏦
                                            </div>

                                            <div class="payment-info">

                                                <strong>
                                                    Transfer Bank
                                                </strong>

                                                <span>
                                                    Transfer melalui rekening bank.
                                                </span>

                                            </div>

                                            <div class="radio-circle"></div>

                                        </label>

                                    </div>


                                    {{-- QRIS --}}

                                    <div class="payment-option">

                                        <input
                                            type="radio"
                                            id="qris"
                                            name="payment_method"
                                            value="qris"
                                            {{ old('payment_method') === 'qris' ? 'checked' : '' }}>

                                        <label
                                            for="qris"
                                            class="payment-label">

                                            <div class="payment-icon">
                                                📱
                                            </div>

                                            <div class="payment-info">

                                                <strong>
                                                    QRIS
                                                </strong>

                                                <span>
                                                    Bayar menggunakan QRIS.
                                                </span>

                                            </div>

                                            <div class="radio-circle"></div>

                                        </label>

                                    </div>


                                </div>

                            </div>


                        </form>

                    </div>

                </div>


                {{-- =============================================
                     RIGHT SIDE - ORDER SUMMARY
                ============================================== --}}

                <div>


                    <div class="card summary-card">

                        <h2 class="summary-title">
                            Ringkasan Pesanan
                        </h2>


                        {{-- =====================================
                             PRODUCTS
                        ====================================== --}}

                        <div class="product-list">

                            @foreach($cart as $item)

                                @php

                                    /*
                                     * Menentukan URL gambar produk.
                                     *
                                     * Data image biasanya berupa:
                                     * products/nama-file.jpg
                                     *
                                     * sehingga URL:
                                     * /storage/products/nama-file.jpg
                                     */

                                    $image = $item['image'] ?? null;

                                    if ($image) {

                                        $image = ltrim($image, '/');

                                        if (
                                            str_starts_with($image, 'http://') ||
                                            str_starts_with($image, 'https://')
                                        ) {

                                            $imageUrl = $image;

                                        } elseif (
                                            str_starts_with($image, 'storage/')
                                        ) {

                                            $imageUrl = asset($image);

                                        } else {

                                            $imageUrl = asset('storage/' . $image);

                                        }

                                    } else {

                                        $imageUrl = null;

                                    }

                                @endphp


                                <div class="product-item">


                                    {{-- FOTO PRODUK --}}

                                    <div class="product-image">

                                        @if($imageUrl)

                                            <img
                                                src="{{ $imageUrl }}"
                                                alt="{{ $item['name'] ?? 'Produk' }}"
                                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                                            <div
                                                class="product-image-placeholder"
                                                style="display:none;">
                                                👕
                                            </div>

                                        @else

                                            <div class="product-image-placeholder">
                                                👕
                                            </div>

                                        @endif

                                    </div>


                                    {{-- INFO PRODUK --}}

                                    <div class="product-info">

                                        <div class="product-name">

                                            {{ $item['name'] ?? 'Produk' }}

                                        </div>

                                        <div class="product-quantity">

                                            {{ $item['quantity'] ?? 1 }}
                                            ×
                                            Rp
                                            {{ number_format($item['price'] ?? 0, 0, ',', '.') }}

                                        </div>

                                    </div>


                                    {{-- HARGA --}}

                                    <div class="product-price">

                                        Rp
                                        {{ number_format(
                                            ($item['price'] ?? 0) * ($item['quantity'] ?? 1),
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                    </div>


                                </div>

                            @endforeach

                        </div>


                        <hr class="divider">


                        {{-- =====================================
                             SUBTOTAL
                        ====================================== --}}

                        <div class="price-row">

                            <span>
                                Subtotal
                            </span>

                            <strong>

                                Rp
                                {{ number_format($total, 0, ',', '.') }}

                            </strong>

                        </div>


                        {{-- =====================================
                             SHIPPING
                        ====================================== --}}

                        <div class="price-row">

                            <span>
                                Pengiriman
                            </span>

                            <strong class="shipping-free">
                                Gratis
                            </strong>

                        </div>


                        {{-- =====================================
                             TOTAL
                        ====================================== --}}

                        <div class="total-row">

                            <div class="total-label">
                                Total
                            </div>

                            <div class="total-price">

                                Rp
                                {{ number_format($total, 0, ',', '.') }}

                            </div>

                        </div>


                        {{-- =====================================
                             SUBMIT
                        ====================================== --}}

                        <button
                            type="submit"
                            form="checkoutForm"
                            class="submit-button">

                            🛍️ Buat Pesanan

                        </button>


                        {{-- BACK CART --}}

                        <a
                            href="{{ route('cart.index') }}"
                            class="back-cart">

                            ← Kembali ke Keranjang

                        </a>


                        {{-- SECURITY INFO --}}

                        <div class="secure-info">

                            🔒 Data pesanan kamu akan diproses
                            dengan aman.

                        </div>

                    </div>

                </div>


            </div>


        @endif


    </main>


    {{-- =====================================================
         FOOTER
    ====================================================== --}}

    <footer class="footer">

        Jersey Store
        <span>
            © {{ date('Y') }}. All rights reserved.
        </span>

    </footer>


</body>

</html>