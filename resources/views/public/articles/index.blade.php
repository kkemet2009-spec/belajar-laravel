@extends('layouts.app')

@section('title', 'Artikel - Jersey Store')

@section('content')

<div class="container">

    <h1 style="
        font-size:40px;
        margin-bottom:10px;
    ">
        Artikel Jersey 📰
    </h1>

    <p style="
        color:#666;
        margin-bottom:35px;
    ">
        Informasi, tips, dan berita terbaru seputar jersey bola.
    </p>


    @if($articles->count() > 0)

        <div style="
            display:grid;
            grid-template-columns:repeat(auto-fit, minmax(280px, 1fr));
            gap:25px;
        ">

            @foreach($articles as $article)

                <div style="
                    background:white;
                    border-radius:15px;
                    overflow:hidden;
                    box-shadow:0 5px 20px rgba(0,0,0,0.08);
                ">


                    {{-- GAMBAR ARTIKEL --}}

                    @if($article->image)

                        <img
                            src="{{ asset('storage/' . $article->image) }}"
                            alt="{{ $article->title }}"
                            style="
                                width:100%;
                                height:220px;
                                object-fit:cover;
                                display:block;
                            "
                        >

                    @else

                        <div style="
                            width:100%;
                            height:220px;
                            background:#ddd;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            font-size:70px;
                        ">
                            📰
                        </div>

                    @endif


                    {{-- INFORMASI ARTIKEL --}}

                    <div style="padding:25px;">

                        <h2 style="
                            font-size:22px;
                            margin-bottom:10px;
                        ">
                            {{ $article->title }}
                        </h2>


                        <div style="
                            color:#777;
                            font-size:14px;
                            margin-bottom:15px;
                        ">
                            📅
                            {{ $article->created_at->format('d M Y') }}
                        </div>


                        <p style="
                            color:#555;
                            line-height:1.6;
                            margin-bottom:20px;
                        ">
                            {{ Str::limit($article->content, 150) }}
                        </p>


                        <a
                            href="{{ route('public.articles.show', $article) }}"
                            class="btn"
                        >
                            Baca Selengkapnya →
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
                📰 Belum Ada Artikel
            </h2>

            <p style="
                color:#666;
                margin-top:10px;
            ">
                Artikel akan ditampilkan di sini.
            </p>

        </div>

    @endif

</div>

@endsection