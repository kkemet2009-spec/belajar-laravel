@extends('layouts.app')

@section('title', 'Produk - Jersey Store')

@section('content')

<div class="container">

    <h1 style="font-size:40px; margin-bottom:10px;">
        Koleksi Jersey 👕
    </h1>

    <p style="color:#666; margin-bottom:35px;">
        Temukan jersey favoritmu dengan desain terbaik.
    </p>


    @if($products->count() > 0)

        <div style="
            display:grid;
            grid-template-columns:repeat(auto-fit, minmax(230px, 1fr));
            gap:25px;
        ">

            @foreach($products as $product)

                <div style="
                    background:white;
                    border-radius:15px;
                    overflow:hidden;
                    box-shadow:0 5px 20px rgba(0,0,0,0.08);
                ">

                    {{-- FOTO PRODUK --}}

                    @if($product->image)

                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            style="
                                width:100%;
                                height:280px;
                                object-fit:cover;
                                display:block;
                            "
                        >

                    @else

                        <div style="
                            width:100%;
                            height:280px;
                            background:#ddd;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            font-size:60px;
                        ">
                            ⚽
                        </div>

                    @endif


                    {{-- INFORMASI PRODUK --}}

                    <div style="padding:20px;">

                        <h2 style="
                            font-size:20px;
                            margin-bottom:10px;
                        ">
                            {{ $product->name }}
                        </h2>


                        <div style="
                            font-size:20px;
                            font-weight:bold;
                            margin-bottom:10px;
                        ">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>


                        <p style="
                            color:#666;
                            margin-bottom:18px;
                        ">
                            📦 Stok: {{ $product->stock }}
                        </p>


                        <a
                            href="{{ route('public.products.show', $product) }}"
                            class="btn"
                        >
                            Lihat Detail
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div style="
            background:white;
            padding:50px;
            text-align:center;
            border-radius:15px;
        ">

            <h2>
                😔 Belum Ada Produk
            </h2>

            <p style="
                color:#666;
                margin-top:10px;
            ">
                Produk jersey akan ditampilkan di sini.
            </p>

        </div>

    @endif

</div>

@endsection