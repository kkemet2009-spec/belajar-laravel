@extends('layouts.admin')

@section('title', 'Detail Pesan')
@section('page-title', 'Detail Pesan')

@section('content')

<style>
    .detail-card {
        max-width: 700px;
        background: white;
        border: 1px solid #eef0f3;
        border-radius: 16px;
        padding: 28px;
        box-shadow: 0 4px 16px rgba(15,23,42,.03);
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        padding: 14px 0;
        border-bottom: 1px solid #f4f5f7;
        font-size: 13.5px;
    }

    .detail-row:last-of-type {
        border-bottom: none;
    }

    .detail-row .label {
        color: #6b7280;
        flex-shrink: 0;
    }

    .detail-row .value {
        color: #111827;
        font-weight: 600;
        text-align: right;
    }

    .message-box {
        margin-top: 20px;
        padding: 18px;
        background: #f8fafc;
        border-radius: 12px;
        font-size: 14px;
        line-height: 1.7;
        color: #111827;
        white-space: pre-line;
    }

    .badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
    }

    .badge-unread { background: #fee2e2; color: #dc2626; }
    .badge-read { background: #dcfce7; color: #16a34a; }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 20px;
        color: #6b7280;
        text-decoration: none;
        font-size: 13.5px;
        font-weight: 600;
    }

    .back-link:hover {
        color: #111827;
    }

    .actions {
        margin-top: 22px;
        display: flex;
        gap: 10px;
    }

    .actions button {
        border: none;
        padding: 11px 18px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        font-family: inherit;
    }

    .btn-danger {
        background: #fee2e2;
        color: #dc2626;
    }
</style>

<a href="{{ route('admin.messages.index') }}" class="back-link">← Kembali ke Pesan Masuk</a>

<div class="detail-card">

    <div class="detail-row">
        <span class="label">Nama</span>
        <span class="value">{{ $message->name }}</span>
    </div>

    <div class="detail-row">
        <span class="label">Email</span>
        <span class="value">{{ $message->email }}</span>
    </div>

    <div class="detail-row">
        <span class="label">Nomor WhatsApp</span>
        <span class="value">{{ $message->phone }}</span>
    </div>

    <div class="detail-row">
        <span class="label">Subjek</span>
        <span class="value">{{ $message->subject }}</span>
    </div>

    <div class="detail-row">
        <span class="label">Tanggal Dikirim</span>
        <span class="value">{{ $message->created_at->format('d M Y H:i') }}</span>
    </div>

    <div class="detail-row">
        <span class="label">Status</span>
        <span class="value">
            <span class="badge {{ $message->status === 'unread' ? 'badge-unread' : 'badge-read' }}">
                {{ $message->status === 'unread' ? 'Belum Dibaca' : 'Sudah Dibaca' }}
            </span>
        </span>
    </div>

    <div class="message-box">
        {{ $message->message }}
    </div>

    <div class="actions">
        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-danger">🗑 Hapus Pesan</button>
        </form>
    </div>

</div>

@endsection