<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Artikel Jersey</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            color: #222;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 32px;
        }

        .btn {
            background: #111;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
        }

        .btn:hover {
            opacity: 0.85;
        }

        .empty {
            background: white;
            padding: 60px 20px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.06);
        }

        .empty h2 {
            margin-bottom: 10px;
        }

        .articles {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .article-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .article-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .article-content {
            padding: 20px;
        }

        .article-content h2 {
            margin-bottom: 10px;
        }

        .article-content p {
            color: #666;
            line-height: 1.6;
        }

        .detail {
            display: inline-block;
            margin-top: 15px;
            background: #111;
            color: white;
            padding: 10px 16px;
            border-radius: 7px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    

<div class="container">
    @if(session('success'))

    <div style="
        background:#d4edda;
        color:#155724;
        padding:15px;
        border-radius:8px;
        margin-bottom:20px;
    ">
        {{ session('success') }}
    </div>

@endif

    <div class="header">

        <h1>📰 Artikel Jersey</h1>

        <a
            href="{{ route('articles.create') }}"
            class="btn"
        >
            + Tambah Artikel
        </a>

    </div>


    @if($articles->count() == 0)

        <div class="empty">

            <h2>Belum ada artikel 😴</h2>

            <p>
                Silakan tambahkan artikel pertama.
            </p>

        </div>

    @else

        <div class="articles">

            @foreach($articles as $article)

                <div class="article-card">

                    @if($article->image)

                        <img
                            src="{{ asset('storage/' . $article->image) }}"
                            alt="{{ $article->title }}"
                        >

                    @else

                        <div style="
                            height:220px;
                            background:#ddd;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            font-size:50px;
                        ">
                            📰
                        </div>

                    @endif


                    <div class="article-content">

                        <h2>
                            {{ $article->title }}
                        </h2>

                        <p>
                            {{ Str::limit($article->content, 120) }}
                        </p>

                        <a
                            href="{{ route('articles.show', $article) }}"
                            class="detail"
                        >
                            Baca Selengkapnya
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</div>

</body>
</html>