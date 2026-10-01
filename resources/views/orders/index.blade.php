@extends('layouts.app')

@section('content')

<style>
    .ord-wrap { max-width: 860px; margin: 0 auto; padding: 120px 20px 60px; }
    .ord-title { font-size: 28px; font-weight: 700; margin: 0 0 6px; color: #0f172a; }
    .ord-sub { color: #64748b; margin: 0 0 28px; font-size: 14px; }
    .ord-card {
        display: block; background: #fff; border: 1px solid #e2e8f0;
        border-radius: 16px; padding: 20px 24px; margin-bottom: 14px;
        text-decoration: none; color: inherit; transition: box-shadow .2s;
    }
    .ord-card:hover { box-shadow: 0 6px 20px rgba(15,23,42,.08); }
    .ord-top { display: flex; justify-content: space-between; gap: 12px; flex-wrap: wrap; margin-bottom: 10px; }
    .ord-no { font-weight: 700; color: #0f172a; }
    .ord-meta { font-size: 13px; color: #64748b; }
    .ord-bottom { display: flex; justify-content: space-between; align-items: center; gap: 12px; }
    .ord-total { font-weight: 700; color: #0f172a; }
    .ord-badge { display: inline-block; padding: 4px 12px; border-radius: 999px; font-size: 12px; font-weight: 700; }
    .ord-empty { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 50px 24px; text-align: center; color: #64748b; }
    .ord-empty a { display: inline-block; margin-top: 16px; background: #0f172a; color: #fff; padding: 11px 22px; border-radius: 999px; text-decoration: none; font-weight: 600; }
</style>

@php
    $statusMap = [
        'pending'    => ['Pending',  '#fef9c3', '#92400e'],
        'processing' => ['Diproses', '#dbeafe', '#1d4ed8'],
        'shipped'    => ['Dikirim',  '#e0e7ff', '#4338ca'],
        'completed'  => ['Selesai',  '#dcfce7', '#16a34a'],
        'cancelled'  => ['Dibatalkan', '#fee2e2', '#dc2626'],
    ];
@endphp

<div class="ord-wrap">

    <h1 class="ord-title">Pesanan Saya</h1>
    <p class="ord-sub">Riwayat pesanan yang Anda buat saat login.</p>

    @forelse($orders as $order)
        @php $st = $statusMap[$order->status] ?? [ucfirst($order->status), '#f4f5f7', '#6b7280']; @endphp

        <a href="{{ route('orders.show', $order) }}" class="ord-card">
            <div class="ord-top">
                <span class="ord-no">{{ $order->order_number }}</span>
                <span class="ord-badge" style="background: {{ $st[1] }}; color: {{ $st[2] }};">{{ $st[0] }}</span>
            </div>
            <div class="ord-meta">
                {{ $order->created_at->format('d M Y, H:i') }} &middot; {{ $order->items_count }} produk
            </div>
            <div class="ord-bottom" style="margin-top:12px;">
                <span class="ord-meta">Total</span>
                <span class="ord-total">Rp {{ number_format($order->total, 0, ',', '.') }}</span>
            </div>
        </a>
    @empty
        <div class="ord-empty">
            Belum ada pesanan.
            <br>
            <a href="{{ route('public.products.index') }}">Lihat Produk</a>
        </div>
    @endforelse

    <div style="margin-top:20px;">
        {{ $orders->links() }}
    </div>

</div>

@endsection