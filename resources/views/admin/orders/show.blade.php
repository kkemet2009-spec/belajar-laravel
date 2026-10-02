@extends('layouts.admin')

@section('title', 'Detail Pesanan')
@section('page-title', 'Detail Pesanan')

@section('content')

<style>
    .order-layout {
        display: grid;
        grid-template-columns: 1.4fr 1fr;
        gap: 20px;
        align-items: start;
    }

    .card {
        background: white;
        border: 1px solid #eef0f3;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 4px 16px rgba(15,23,42,.03);
    }

    .card h3 {
        font-size: 15px;
        font-weight: 800;
        color: #111827;
        margin: 0 0 18px;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        padding: 12px 0;
        border-bottom: 1px solid #f4f5f7;
        font-size: 13.5px;
    }

    .detail-row:last-of-type {
        border-bottom: none;
    }

    .detail-row .label { color: #6b7280; }
    .detail-row .value { color: #111827; font-weight: 600; text-align: right; }

    .item-row {
        display: flex;
        justify-content: space-between;
        gap: 14px;
        padding: 12px 0;
        border-bottom: 1px solid #f4f5f7;
        font-size: 13.5px;
    }

    .item-row:last-child {
        border-bottom: none;
    }

    .item-name {
        font-weight: 700;
        color: #111827;
    }

    .item-meta {
        color: #6b7280;
        font-size: 12.5px;
    }

    .item-subtotal {
        font-weight: 700;
        color: #111827;
        text-align: right;
        white-space: nowrap;
    }

    .total-row {
        display: flex;
        justify-content: space-between;
        margin-top: 14px;
        padding-top: 14px;
        border-top: 1px solid #eef0f3;
        font-size: 16px;
        font-weight: 800;
        color: #111827;
    }

    .badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
    }

    .status-form select {
        width: 100%;
        padding: 11px 14px;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        font-size: 13.5px;
        margin-bottom: 12px;
        font-family: inherit;
    }

    .status-form button {
        width: 100%;
        border: none;
        background: #111827;
        color: white;
        padding: 12px;
        border-radius: 10px;
        font-size: 13.5px;
        font-weight: 700;
        cursor: pointer;
        font-family: inherit;
    }

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

    @media (max-width: 900px) {
        .order-layout {
            grid-template-columns: 1fr;
        }
    }
</style>

@php
    $statusColors = [
        'pending' => ['bg' => '#fef9c3', 'text' => '#92400e'],
        'processing' => ['bg' => '#dbeafe', 'text' => '#1d4ed8'],
        'shipped' => ['bg' => '#e0e7ff', 'text' => '#4338ca'],
        'completed' => ['bg' => '#dcfce7', 'text' => '#16a34a'],
        'cancelled' => ['bg' => '#fee2e2', 'text' => '#dc2626'],
    ];
    $sc = $statusColors[$order->status] ?? ['bg' => '#f4f5f7', 'text' => '#6b7280'];
@endphp

<a href="{{ route('admin.orders.index') }}" class="back-link">← Kembali ke Pesanan</a>

<div class="order-layout">

    <div>

        <div class="card" style="margin-bottom: 20px;">
            <h3>Informasi Pesanan</h3>

            <div class="detail-row">
                <span class="label">Nomor Pesanan</span>
                <span class="value">{{ $order->order_number }}</span>
            </div>

            <div class="detail-row">
                <span class="label">Nama Pelanggan</span>
                <span class="value">{{ $order->customer_name }}</span>
            </div>

            <div class="detail-row">
                <span class="label">Nomor WhatsApp</span>
                <span class="value">{{ $order->phone }}</span>
            </div>

            <div class="detail-row">
                <span class="label">Alamat</span>
                <span class="value">{{ $order->address }}</span>
            </div>

            <div class="detail-row">
                <span class="label">Tanggal</span>
                <span class="value">{{ $order->created_at->format('d M Y H:i') }}</span>
            </div>

            <div class="detail-row">
                <span class="label">Status</span>
                <span class="value">
                    <span class="badge" style="background: {{ $sc['bg'] }}; color: {{ $sc['text'] }};">
                        {{ ucfirst($order->status) }}
                    </span>
                </span>
            </div>
        </div>

        <div class="card">
            <h3>Produk yang Dipesan</h3>

            @foreach($order->items as $item)
                <div class="item-row">
                    <div>
                        <div class="item-name">{{ $item->product_name }}</div>
                        <div class="item-meta">
                            {{ $item->quantity }} × Rp {{ number_format($item->price, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="item-subtotal">
                        Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                    </div>
                </div>
            @endforeach

            <div class="total-row">
                <span>Total</span>
                <span>Rp {{ number_format($order->total, 0, ',', '.') }}</span>
            </div>
        </div>

    </div>

    <div class="card">
        <h3>Ubah Status Pesanan</h3>

        <form class="status-form" action="{{ route('admin.orders.updateStatus', $order) }}" method="POST">
            @csrf
            @method('PATCH')

            <select name="status">
                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>

            <button type="submit">Simpan Status</button>
        </form>
    </div>

</div>

@endsection