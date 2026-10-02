@extends('layouts.admin')

@section('title', 'Pesanan')
@section('page-title', 'Pesanan')

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

    .row-actions a {
        border: none;
        background: #f4f5f7;
        color: #111827;
        padding: 7px 12px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
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

@php
    $statusColors = [
        'pending' => ['bg' => '#fef9c3', 'text' => '#92400e'],
        'processing' => ['bg' => '#dbeafe', 'text' => '#1d4ed8'],
        'shipped' => ['bg' => '#e0e7ff', 'text' => '#4338ca'],
        'completed' => ['bg' => '#dcfce7', 'text' => '#16a34a'],
        'cancelled' => ['bg' => '#fee2e2', 'text' => '#dc2626'],
    ];
@endphp

<div class="filter-bar">

    <form method="GET" action="{{ route('admin.orders.index') }}" style="display:flex; gap:12px; flex: 1; flex-wrap: wrap;">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nomor pesanan atau nama pelanggan...">

        <select name="status">
            <option value="">Semua Status</option>
            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="processing" {{ request('status') === 'processing' ? 'selected' : '' }}>Processing</option>
            <option value="shipped" {{ request('status') === 'shipped' ? 'selected' : '' }}>Shipped</option>
            <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completed</option>
            <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>

        <button type="submit" class="filter-btn">Filter</button>
    </form>

</div>

<div class="table-card">

    <table>
        <thead>
            <tr>
                <th>Nomor Pesanan</th>
                <th>Pelanggan</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                    <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                    <td>
                        @php $sc = $statusColors[$order->status] ?? ['bg' => '#f4f5f7', 'text' => '#6b7280']; @endphp
                        <span class="badge" style="background: {{ $sc['bg'] }}; color: {{ $sc['text'] }};">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td>
                        <div class="row-actions">
                            <a href="{{ route('admin.orders.show', $order) }}">Lihat Detail</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr class="empty-row">
                    <td colspan="6">Belum ada pesanan.</td>
                </tr>
            @endforelse

        </tbody>
    </table>

</div>

<div class="pagination-wrap">
    {{ $orders->links() }}
</div>

@endsection