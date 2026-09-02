@extends('layouts.admin')

@section('title', 'Pesan Masuk')
@section('page-title', 'Pesan Masuk')

@section('content')

<style>
    .filter-bar {
        display: flex;
        gap: 12px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .filter-bar input,
    .filter-bar select {
        padding: 10px 14px;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        font-size: 13.5px;
        font-family: inherit;
    }

    .filter-bar input {
        flex: 1;
        min-width: 200px;
    }

    .filter-btn {
        padding: 10px 18px;
        border: none;
        border-radius: 10px;
        background: #111827;
        color: white;
        font-weight: 700;
        font-size: 13.5px;
        cursor: pointer;
    }

    .table-card {
        background: white;
        border: 1px solid #eef0f3;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(15,23,42,.03);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13.5px;
    }

    thead th {
        text-align: left;
        padding: 14px 18px;
        background: #f8fafc;
        color: #6b7280;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: .3px;
        border-bottom: 1px solid #eef0f3;
    }

    tbody td {
        padding: 14px 18px;
        border-bottom: 1px solid #f4f5f7;
        color: #111827;
    }

    tbody tr:last-child td {
        border-bottom: none;
    }

    .badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
    }

    .badge-unread { background: #fee2e2; color: #dc2626; }
    .badge-read { background: #f4f5f7; color: #6b7280; }

    .row-actions {
        display: flex;
        gap: 8px;
    }

    .row-actions a,
    .row-actions button {
        border: none;
        background: #f4f5f7;
        color: #111827;
        padding: 7px 12px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        font-family: inherit;
    }

    .row-actions .danger {
        background: #fee2e2;
        color: #dc2626;
    }

    .empty-row td {
        text-align: center;
        padding: 50px 20px;
        color: #9ca3af;
    }

    .pagination-wrap {
        margin-top: 18px;
    }
</style>

<div class="filter-bar">

    <form method="GET" action="{{ route('admin.messages.index') }}" style="display:flex; gap:12px; flex: 1; flex-wrap: wrap;">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, email, atau subjek...">

        <select name="status">
            <option value="">Semua Status</option>
            <option value="unread" {{ request('status') === 'unread' ? 'selected' : '' }}>Belum Dibaca</option>
            <option value="read" {{ request('status') === 'read' ? 'selected' : '' }}>Sudah Dibaca</option>
        </select>

        <button type="submit" class="filter-btn">Filter</button>
    </form>

</div>

<div class="table-card">

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Subjek</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            @forelse($messages as $message)
                <tr>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->subject }}</td>
                    <td>{{ $message->created_at->format('d M Y H:i') }}</td>
                    <td>
                        <span class="badge {{ $message->status === 'unread' ? 'badge-unread' : 'badge-read' }}">
                            {{ $message->status === 'unread' ? 'Belum Dibaca' : 'Sudah Dibaca' }}
                        </span>
                    </td>
                    <td>
                        <div class="row-actions">
                            <a href="{{ route('admin.messages.show', $message) }}">Lihat</a>

                            @if($message->status === 'unread')
                                <form action="{{ route('admin.messages.markRead', $message) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit">Tandai Dibaca</button>
                                </form>
                            @endif

                            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr class="empty-row">
                    <td colspan="6">Belum ada pesan masuk.</td>
                </tr>
            @endforelse

        </tbody>
    </table>

</div>

<div class="pagination-wrap">
    {{ $messages->links() }}
</div>

@endsection