<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Artikel - Jersey Store</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            color: #222;
        }

        .container {
            width: 94%;
            max-width: 1200px;
            margin: 40px auto;
        }

        .header {
            background: white;
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 7px;
        }

        .header p {
            color: #777;
            font-size: 14px;
        }

        .btn {
            display: inline-block;
            padding: 11px 17px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-primary {
            background: #111;
            color: white;
        }

        .btn-primary:hover {
            background: #333;
        }

        .btn-detail {
            background: #e8f0ff;
            color: #2457c5;
        }

        .btn-edit {
            background: #fff3cd;
            color: #856404;
        }

        .btn-delete {
            background: #ffe5e5;
            color: #c62828;
        }

        .btn:hover {
            opacity: 0.8;
        }

        .alert {
            padding: 15px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #dff5e5;
            color: #216b36;
        }

        .table-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
            overflow: hidden;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        thead {
            background: #111;
            color: white;
        }

        th {
            padding: 16px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
            font-size: 14px;
        }

        tbody tr:hover {
            background: #fafafa;
        }

        .article-title {
            font-weight: bold;
            max-width: 300px;
        }

        .article-slug {
            color: #777;
            font-size: 12px;
            margin-top: 5px;
        }

        .description {
            max-width: 300px;
            color: #666;
            line-height: 1.5;
        }

        .actions {
            display: flex;
            gap: 7px;
            flex-wrap: wrap;
        }

        .empty {
            text-align: center;
            padding: 60px 20px;
            color: #777;
        }

        .empty-icon {
            font-size: 50px;
            margin-bottom: 15px;
        }

        @media (max-width: 700px) {

            .container {
                width: 95%;
                margin: 20px auto;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .header h1 {
                font-size: 23px;
            }

            .btn-primary {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    {{-- HEADER --}}
    <div class="header">

        <div>
            <h1>📰 Artikel Jersey Store</h1>

            <p>
                Kelola artikel dan berita seputar Jersey Store.
            </p>
        </div>

        <a href="{{ route('articles.create') }}"
           class="btn btn-primary">
            + Tambah Artikel
        </a>

    </div>


    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))

        <div class="alert alert-success">
            ✅ {{ session('success') }}
        </div>

    @endif


    {{-- TABLE --}}
    <div class="table-card">

        <div class="table-wrapper">

            @if($articles->count() > 0)

                <table>

                    <thead>
                        <tr>

                            <th width="60">No</th>

                            <th>Judul Artikel</th>

                            <th>Deskripsi</th>

                            <th>Tanggal</th>

                            <th width="250">Aksi</th>

                        </tr>
                    </thead>


                    <tbody>

                        @foreach($articles as $article)

                            <tr>

                                {{-- NOMOR --}}
                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                {{-- JUDUL --}}
                                <td>

                                    <div class="article-title">
                                        {{ $article->title }}
                                    </div>

                                    @if(isset($article->slug))

                                        <div class="article-slug">
                                            /{{ $article->slug }}
                                        </div>

                                    @endif

                                </td>


                                {{-- DESKRIPSI --}}
                                <td>

                                    <div class="description">

                                        {{ \Illuminate\Support\Str::limit(
                                            strip_tags($article->content ?? $article->description ?? ''),
                                            100
                                        ) }}

                                    </div>

                                </td>


                                {{-- TANGGAL --}}
                                <td>

                                    {{ $article->created_at
                                        ? $article->created_at->format('d M Y')
                                        : '-' }}

                                </td>


                                {{-- AKSI --}}
                                <td>

                                    <div class="actions">

                                        {{-- DETAIL --}}
                                        <a
                                            href="{{ route('articles.show', $article) }}"
                                            class="btn btn-detail"
                                        >
                                            👁 Detail
                                        </a>


                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('articles.edit', $article) }}"
                                            class="btn btn-edit"
                                        >
                                            ✏️ Edit
                                        </a>


                                        {{-- HAPUS --}}
                                        <form
                                            action="{{ route('articles.destroy', $article) }}"
                                            method="POST"
                                            onsubmit="return confirm(
                                                'Apakah kamu yakin ingin menghapus artikel ini?'
                                            );"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-delete"
                                            >
                                                🗑 Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            @else

                {{-- JIKA BELUM ADA ARTIKEL --}}

                <div class="empty">

                    <div class="empty-icon">
                        📰
                    </div>

                    <h2>
                        Belum Ada Artikel
                    </h2>

                    <p style="margin-top: 8px; margin-bottom: 20px;">
                        Silakan tambahkan artikel pertama kamu.
                    </p>

                    <a
                        href="{{ route('articles.create') }}"
                        class="btn btn-primary"
                    >
                        + Tambah Artikel
                    </a>

                </div>

            @endif

        </div>

    </div>

</div>

</body>
</html>