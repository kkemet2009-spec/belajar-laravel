@php
    use Illuminate\Support\Str;
@endphp
@extends('layouts.app')

@section('title', $article->title . ' - Jersey Store')

@section('content')

<div class="container">

    <article style="
        background:white;
        border-radius:18px;
        overflow:hidden;
        box-shadow:0 8px 30px rgba(0,0,0,0.08);
        max-width:900px;
        margin:0 auto;
    ">


        {{-- GAMBAR ARTIKEL --}}

        @if($article->image)

            <img
                src="{{ asset('storage/' . $article->image) }}"
                alt="{{ $article->title }}"
                style="
                    width:100%;
                    height:450px;
                    object-fit:cover;
                    display:block;
                "
            >

        @else

            <div style="
                width:100%;
                height:300px;
                background:#ddd;
                display:flex;
                align-items:center;
                justify-content:center;
                font-size:100px;
            ">
                📰
            </div>

        @endif


        {{-- ISI ARTIKEL --}}

        <div style="padding:45px;">

            <div style="
                color:#777;
                font-size:14px;
                margin-bottom:15px;
            ">
                📅
                {{ $article->created_at->format('d M Y') }}
            </div>


            <h1 style="
                font-size:40px;
                line-height:1.2;
                margin-bottom:25px;
            ">
                {{ $article->title }}
            </h1>


            <div style="
                color:#444;
                font-size:17px;
                line-height:1.9;
                white-space:pre-line;
            ">
                {{ $article->content }}
            </div>


            <div style="
                margin-top:35px;
                padding-top:25px;
                border-top:1px solid #eee;
            ">

                <a
                    href="{{ route('public.articles.index') }}"
                    class="btn"
                >
                    ← Kembali ke Artikel
                </a>

            </div>

        </div>

    </article>

</div>

@endsection