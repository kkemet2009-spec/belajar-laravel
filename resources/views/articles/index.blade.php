<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Artikel - Jersey Store</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
            color: #222;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 260px;
            height: 100vh;
            background: #111;
            color: white;
            padding: 28px 18px;
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px 30px;
            border-bottom: 1px solid #2d2d2d;
        }

        .logo-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        .logo h2 {
            font-size: 20px;
            white-space: nowrap;
        }

        .menu-title {
            color: #999;
            font-size: 12px;
            margin: 25px 10px 12px;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px 16px;
            border-radius: 10px;
            color: #ddd;
            text-decoration: none;
            font-size: 15px;
            transition: .2s;
        }

        .menu a:hover {
            background: #1f1f1f;
            color: white;
        }

        .menu a.active {
            background: #2563eb;
            color: white;
        }

        .menu-icon {
            width: 23px;
            text-align: center;
            font-size: 18px;
        }

        .admin-box {
            position: absolute;
            left: 18px;
            right: 18px;
            bottom: 75px;
            background: #1d1d1d;
            border: 1px solid #303030;
            border-radius: 11px;
            padding: 14px;
        }

        .admin-box small {
            color: #999;
        }

        .admin-box strong {
            display: block;
            margin-top: 5px;
            font-size: 14px;
        }

        .logout {
            position: absolute;
            left: 18px;
            right: 18px;
            bottom: 18px;
        }

        .logout button {
            width: 100%;
            border: none;
            background: #ef2b2d;
            color: white;
            padding: 13px;
            border-radius: 9px;
            font-weight: bold;
            cursor: pointer;
            font-size: 14px;
        }

        .logout button:hover {
            background: #d91f21;
        }

        /* ================= MAIN ================= */

        .main {
            margin-left: 260px;
            min-height: 100vh;
        }

        .topbar {
            height: 76px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 34px;
        }

        .topbar h1 {
            font-size: 21px;
        }

        .online {
            background: #e9fbf2;
            color: #15945d;
            padding: 9px 15px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .content {
            padding: 38px 34px 60px;
        }

        /* ================= HEADER ================= */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-header h2 {
            font-size: 28px;
            margin-bottom: 7px;
        }

        .page-header p {
            color: #777;
            font-size: 15px;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #111;
            color: white;
            text-decoration: none;
            padding: 13px 19px;
            border-radius: 9px;
            font-weight: bold;
            transition: .2s;
        }

        .btn-add:hover {
            background: #2563eb;
        }

        /* ================= ALERT ================= */

        .alert {
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 22px;
            font-size: 14px;
        }

        .alert-success {
            background: #dcfce7;
            color: #15803d;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            background: #fee2e2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        /* ================= CARD ================= */

        .card {
            background: white;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(0,0,0,.05);
            overflow: hidden;
        }

        .card-header {
            padding: 21px 24px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h3 {
            font-size: 18px;
        }

        .total {
            color: #777;
            font-size: 14px;
        }

        /* ================= TABLE ================= */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #111;
            color: white;
            text-align: left;
            padding: 16px 18px;
            font-size: 13px;
            white-space: nowrap;
        }

        td {
            padding: 19px 18px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
            font-size: 14px;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background: #fafafa;
        }

        .number {
            width: 55px;
            font-weight: bold;
            color: #666;
        }

        .title {
            font-weight: bold;
            color: #222;
            margin-bottom: 6px;
        }

        .slug {
            color: #999;
            font-size: 12px;
        }

        .description {
            color: #666;
            max-width: 350px;
            line-height: 1.5;
        }

        .date {
            color: #555;
            white-space: nowrap;
        }

        /* ================= BUTTON ================= */

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
            min-width: 190px;
        }

        .btn {
            border: none;
            text-decoration: none;
            padding: 10px 13px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-detail {
            background: #e8f0ff;
            color: #2563eb;
        }

        .btn-edit {
            background: #fff1c7;
            color: #b77900;
        }

        .btn-delete {
            background: #fee2e2;
            color: #dc2626;
        }

        .btn:hover {
            opacity: .8;
        }

        .delete-form {
            display: inline;
        }

        /* ================= EMPTY ================= */

        .empty {
            text-align: center;
            padding: 60px 20px;
            color: #777;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 15px;
        }

        .empty h3 {
            color: #333;
            margin-bottom: 7px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 900px) {

            .sidebar {
                width: 220px;
            }

            .main {
                margin-left: 220px;
            }

            .page-header {
                align-items: flex-start;
                gap: 20px;
            }

            .actions {
                min-width: 130px;
            }

        }

        @media (max-width: 700px) {

            .sidebar {
                width: 70px;
                padding: 20px 10px;
            }

            .logo {
                justify-content: center;
                padding-left: 0;
                padding-right: 0;
            }

            .logo h2,
            .menu-title,
            .menu span,
            .admin-box,
            .logout button {
                display: none;
            }

            .menu a {
                justify-content: center;
                padding: 14px 8px;
            }

            .main {
                margin-left: 70px;
            }

            .topbar {
                padding: 0 18px;
            }

            .content {
                padding: 25px 15px;
            }

            .page-header {
                flex-direction: column;
            }

            .btn-add {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>

<body>

<!-- ================= SIDEBAR ================= -->

<aside class="sidebar">

    <div class="logo">
        <div class="logo-icon">⚽</div>
        <h2>Jersey Store</h2>
    </div>

    <div class="menu-title">
        Menu Admin
    </div>

    <nav class="menu">

        <a href="{{ url('/dashboard') }}">
            <span class="menu-icon">📊</span>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('products.index') }}">
            <span class="menu-icon">⚽</span>
            <span>Kelola Produk</span>
        </a>

        <a href="{{ route('articles.index') }}" class="active">
            <span class="menu-icon">📰</span>
            <span>Kelola Artikel</span>
        </a>

        <a href="{{ url('/produk') }}">
            <span class="menu-icon">🌐</span>
            <span>Lihat Website</span>
        </a>

        <a href="{{ url('/artikel') }}">
            <span class="menu-icon">📚</span>
            <span>Artikel Publik</span>
        </a>

    </nav>

    <div class="admin-box">
        <small>Login sebagai</small>
        <strong>Administrator</strong>
    </div>

    <div class="logout">
        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit">
                🚪 Logout
            </button>
        </form>
    </div>

</aside>


<!-- ================= MAIN ================= -->

<main class="main">

    <!-- TOPBAR -->

    <header class="topbar">

        <h1>Kelola Artikel</h1>

        <div class="online">
            ● Sistem Online
        </div>

    </header>


    <!-- CONTENT -->

    <section class="content">

        <!-- PAGE HEADER -->

        <div class="page-header">

            <div>
                <h2>Artikel Jersey Store</h2>

                <p>
                    Kelola artikel dan berita seputar dunia jersey.
                </p>
            </div>

            <a
                href="{{ route('articles.create') }}"
                class="btn-add"
            >
                ＋ Tambah Artikel
            </a>

        </div>


        <!-- SUCCESS -->

        @if(session('success'))

            <div class="alert alert-success">
                ✅ {{ session('success') }}
            </div>

        @endif


        <!-- ERROR -->

        @if(session('error'))

            <div class="alert alert-error">
                ❌ {{ session('error') }}
            </div>

        @endif


        <!-- ARTICLE CARD -->

        <div class="card">

            <div class="card-header">

                <h3>📰 Daftar Artikel</h3>

                <div class="total">
                    {{ $articles->count() }} artikel
                </div>

            </div>


            @if($articles->count() > 0)

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>
                                <th>No</th>
                                <th>Judul Artikel</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach($articles as $article)

                                <tr>

                                    <td class="number">
                                        {{ $loop->iteration }}
                                    </td>


                                    <td>

                                        <div class="title">
                                            {{ $article->title }}
                                        </div>

                                        <div class="slug">
                                            /{{ $article->slug }}
                                        </div>

                                    </td>


                                    <td>

                                        <div class="description">

                                            {{ \Illuminate\Support\Str::limit($article->description ?? $article->content ?? '-', 100) }}

                                        </div>

                                    </td>


                                    <td class="date">

                                        {{ $article->created_at
                                            ? $article->created_at->format('d M Y')
                                            : '-' }}

                                    </td>


                                    <td>

                                        <div class="actions">

                                            <!-- DETAIL -->

                                            <a
                                                href="{{ route('articles.show', $article->id) }}"
                                                class="btn btn-detail"
                                            >
                                                👁 Detail
                                            </a>


                                            <!-- EDIT -->

                                            <a
                                                href="{{ route('articles.edit', $article->id) }}"
                                                class="btn btn-edit"
                                            >
                                                ✏️ Edit
                                            </a>


                                            <!-- HAPUS -->

                                            <form
                                                action="{{ route('articles.destroy', $article->id) }}"
                                                method="POST"
                                                class="delete-form"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');"
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

                </div>

            @else

                <div class="empty">

                    <div class="empty-icon">
                        📰
                    </div>

                    <h3>Belum ada artikel</h3>

                    <p>
                        Silakan tambahkan artikel pertama Anda.
                    </p>

                    <br>

                    <a
                        href="{{ route('articles.create') }}"
                        class="btn-add"
                    >
                        ＋ Tambah Artikel
                    </a>

                </div>

            @endif

        </div>

    </section>

</main>


</body>
</html>