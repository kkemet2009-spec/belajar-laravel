@extends('layouts.admin')

@section('title', 'Kelola Artikel')
@section('page-title', 'Kelola Artikel')

@section('content')

<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        gap: 20px;
    }

    .page-header h1 {
        font-size: 28px;
        color: #111827;
        margin-bottom: 6px;
    }

    .page-header p {
        color: #6b7280;
        margin: 0;
    }

    .btn-add {
        background: #2563eb;
        color: white;
        text-decoration: none;
        padding: 12px 18px;
        border-radius: 10px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: .2s;
        white-space: nowrap;
    }

    .btn-add:hover {
        background: #1d4ed8;
        transform: translateY(-2px);
    }

    /* ALERT */

    .alert-success {
        background: #dcfce7;
        color: #166534;
        border: 1px solid #bbf7d0;
        padding: 14px 18px;
        border-radius: 10px;
        margin-bottom: 22px;
    }

    .alert-error {
        background: #fee2e2;
        color: #991b1b;
        border: 1px solid #fecaca;
        padding: 14px 18px;
        border-radius: 10px;
        margin-bottom: 22px;
    }

    /* TABLE CARD */

    .article-card {
        background: white;
        border-radius: 16px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 5px 20px rgba(0,0,0,.05);
        overflow: hidden;
    }

    .card-header {
        padding: 20px 24px;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-header h2 {
        margin: 0;
        font-size: 19px;
        color: #111827;
    }

    .article-count {
        color: #6b7280;
        font-size: 14px;
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px;
    }

    thead {
        background: #f9fafb;
    }

    th {
        text-align: left;
        padding: 15px 18px;
        font-size: 13px;
        color: #4b5563;
        text-transform: uppercase;
        border-bottom: 1px solid #e5e7eb;
        white-space: nowrap;
    }

    td {
        padding: 18px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    tbody tr {
        transition: .15s;
    }

    tbody tr:hover {
        background: #f9fafb;
    }

    tbody tr:last-child td {
        border-bottom: none;
    }

    /* ARTICLE */

    .article-info {
        display: flex;
        align-items: center;
        gap: 14px;
        min-width: 300px;
    }

    .article-image {
        width: 62px;
        height: 62px;
        border-radius: 10px;
        object-fit: cover;
        background: #f3f4f6;
        border: 1px solid #e5e7eb;
        flex-shrink: 0;
    }

    .article-no-image {
        width: 62px;
        height: 62px;
        border-radius: 10px;
        background: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px;
        flex-shrink: 0;
    }

    .article-title {
        font-weight: 700;
        color: #111827;
        margin-bottom: 5px;
    }

    .article-slug {
        font-size: 12px;
        color: #9ca3af;
    }

    .article-excerpt {
        max-width: 300px;
        color: #6b7280;
        font-size: 13px;
        line-height: 1.5;
    }

    /* CATEGORY */

    .category-badge {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        background: #eff6ff;
        color: #2563eb;
        white-space: nowrap;
    }

    /* ACTION */

    .actions {
        display: flex;
        gap: 7px;
        flex-wrap: wrap;
    }

    .btn-action {
        border: none;
        text-decoration: none;
        padding: 8px 11px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: .15s;
    }

    .btn-detail {
        background: #eff6ff;
        color: #2563eb;
    }

    .btn-detail:hover {
        background: #dbeafe;
    }

    .btn-edit {
        background: #fef3c7;
        color: #b45309;
    }

    .btn-edit:hover {
        background: #fde68a;
    }

    .btn-delete {
        background: #fee2e2;
        color: #dc2626;
    }

    .btn-delete:hover {
        background: #fecaca;
    }

    /* EMPTY */

    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-icon {
        font-size: 55px;
        margin-bottom: 15px;
    }

    .empty-state h3 {
        margin-bottom: 8px;
        color: #111827;
    }

    .empty-state p {
        color: #6b7280;
        margin-bottom: 20px;
    }

    /* RESPONSIVE */

    @media (max-width: 700px) {

        .page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .btn-add {
            width: 100%;
            justify-content: center;
        }

        .card-header {
            padding: 16px;
        }

        .article-card {
            border-radius: 12px;
        }
    }
</style>


{{-- ============================
     HEADER
============================= --}}

<div class="page-header">

    <div>

        <h1>
            Kelola Artikel
        </h1>

        <p>
            Kelola semua artikel dan berita Jersey Store.
        </p>

    </div>


    <a
        href="{{ route('articles.create') }}"
        class="btn-add"
    >
        ➕ Tambah Artikel
    </a>

</div>


{{-- ============================
     SUCCESS MESSAGE
============================= --}}

@if(session('success'))

    <div class="alert-success">
        ✅ {{ session('success') }}
    </div>

@endif


{{-- ============================
     ERROR MESSAGE
============================= --}}

@if(session('error'))

    <div class="alert-error">
        ❌ {{ session('error') }}
    </div>

@endif


{{-- ============================
     ARTICLE TABLE
============================= --}}

<div class="article-card">

    <div class="card-header">

        <h2>
            📰 Daftar Artikel
        </h2>

        <div class="article-count">
            {{ $articles->count() }} artikel
        </div>

    </div>


    @if($articles->count() > 0)

        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>

                        <th style="width: 60px;">
                            No
                        </th>

                        <th>
                            Artikel
                        </th>

                        <th>
                            Kategori
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @foreach($articles as $article)

                        <tr>

                            {{-- NO --}}

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            {{-- ARTIKEL --}}

                            <td>

                                <div class="article-info">


                                    {{-- GAMBAR --}}

                                    @if($article->image)

                                        <img
                                            src="{{ asset('storage/' . $article->image) }}"
                                            alt="{{ $article->title }}"
                                            class="article-image"
                                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                        >

                                        <div
                                            class="article-no-image"
                                            style="display:none;"
                                        >
                                            📰
                                        </div>

                                    @else

                                        <div class="article-no-image">
                                            📰
                                        </div>

                                    @endif


                                    {{-- INFO ARTIKEL --}}

                                    <div>

                                        <div class="article-title">
                                            {{ $article->title }}
                                        </div>

                                        <div class="article-slug">
                                            {{ $article->slug }}
                                        </div>

                                    </div>

                                </div>

                            </td>


                            {{-- KATEGORI --}}

                            <td>

                                @if(!empty($article->category))

                                    <span class="category-badge">
                                        {{ $article->category }}
                                    </span>

                                @else

                                    <span class="category-badge">
                                        Artikel
                                    </span>

                                @endif

                            </td>


                            {{-- TANGGAL --}}

                            <td>

                                {{ $article->created_at
                                    ? $article->created_at->format('d/m/Y')
                                    : '-' }}

                            </td>


                            {{-- AKSI --}}

                            <td>

                                <div class="actions">


                                    {{-- DETAIL --}}

                                    <a
                                        href="{{ route('articles.show', $article->id) }}"
                                        class="btn-action btn-detail"
                                    >
                                        👁 Detail
                                    </a>


                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route('articles.edit', $article->id) }}"
                                        class="btn-action btn-edit"
                                    >
                                        ✏️ Edit
                                    </a>


                                    {{-- HAPUS --}}

                                    <form
                                        action="{{ route('articles.destroy', $article->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah kamu yakin ingin menghapus artikel {{ addslashes($article->title) }}?');"
                                        style="display:inline;"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn-action btn-delete"
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


        {{-- TIDAK ADA ARTIKEL --}}

        <div class="empty-state">

            <div class="empty-icon">
                📰
            </div>

            <h3>
                Belum Ada Artikel
            </h3>

            <p>
                Kamu belum menambahkan artikel.
            </p>

            <a
                href="{{ route('articles.create') }}"
                class="btn-add"
                style="display:inline-flex;"
            >
                ➕ Tambah Artikel
            </a>

        </div>

    @endif

</div>

@endsection