@extends('layouts.app')

@section('title', $product->name . ' - Jersey Store')

@section('content')

<div class="container">

    <div style="
        background:white;
        border-radius:18px;
        overflow:hidden;
        display:grid;
        grid-template-columns:1fr 1fr;
        box-shadow:0 8px 30px rgba(0,0,0,0.08);
    ">

        {{-- FOTO PRODUK --}}

        <div style="
            background:#eee;
            min-height:500px;
            display:flex;
            align-items:center;
            justify-content:center;
        ">

            @if($product->image)

                <img
                    src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->name }}"
                    style="
                        width:100%;
                        height:500px;
                        object-fit:contain;
                        background:white;
                    "
                >

            @else

                <div style="font-size:100px;">
                    ⚽
                </div>

            @endif

        </div>


        {{-- INFORMASI PRODUK --}}

        <div style="padding:50px;">

            <h1 style="
                font-size:40px;
                margin-bottom:20px;
            ">
                {{ $product->name }}
            </h1>


            <div style="
                font-size:30px;
                font-weight:bold;
                margin-bottom:20px;
            ">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </div>


            <p style="
                color:#666;
                margin-bottom:30px;
            ">
                📦 Stok tersedia: {{ $product->stock }}
            </p>


            <h3 style="margin-bottom:10px;">
                Deskripsi
            </h3>


            <p style="
                color:#555;
                line-height:1.8;
                margin-bottom:35px;
            ">
                {{ $product->description }}
            </p>


            <div style="
                display:flex;
                gap:10px;
                flex-wrap:wrap;
            ">

                <a
                    href="{{ route('public.products.index') }}"
                    class="btn"
                    style="
                        background:#ddd;
                        color:#222;
                    "
                >
                    ← Kembali
                </a>


                <a
                    href="/contact"
                    class="btn"
                >
                    💬 Hubungi Kami
                </a>

            </div>

        </div>

    </div>

</div>

@endsection