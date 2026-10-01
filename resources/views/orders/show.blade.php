@extends('layouts.app')

@section('content')

<style>
    .ord-wrap { max-width: 760px; margin: 0 auto; padding: 120px 20px 60px; }
    .ord-back { display: inline-block; margin-bottom: 18px; font-size: 14px; color: #64748b; text-decoration: none; }
    .ord-back:hover { color: #0f172a; }
    .ord-title { font-size: 26px; font-weight: 700; margin: 0 0 20px; color: #0f172a; }
    .ord-box { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 22px 24px; margin-bottom: 20px; }
    .ord-box h2 { font-size: 16px; margin: 0 0 14px; color: #0f172a; }
    .ord-row { display: flex; justify-content: space-between; gap: 16px; padding: 10px 0; border-bottom: 1px solid #f1f5f9; font-size: 14px; }
    .ord-row:last-child { border-bottom: 0; }
    .ord-row .l { color: #64748b; }
    .ord-row .v { font-weight: 600; color: #0f172a; text-align: right; }
    .ord-badge { display: inline-block; padding: 4px 12px; border-radius: 999px; font-size: 12px; font-weight: 700; }
    .ord-total { display: flex; justify-content: space-between; margin-top: 14px; padding-top: 14px; border-top: 1px solid #e2e8f0; font-size: 17px; font-weight: 800; color: #0f172a; }
</style>

@php
    $statusMap = [
        'pending'    => ['Pending',  '#fef9c3', '#92400e'],
        'processing' => ['Diproses', '#dbeafe', '#1d4ed8'],
        'shipped'    => ['Dikirim',  '#e0e7ff', '#4338ca'],
        'completed'  => ['Selesai',  '#dcfce7', '#16a34a'],
        'cancelled'  => ['Dibatalkan', '#fee2e2', '#dc2626'],
    ];
    $st = $statusMap[$order->status] ?? [ucfirst($order->status), '#f4f5f7', '#6b7280'];
@endphp

<div class="ord-wrap">

    <a href="{{ route('orders.index') }}" class="ord-back">← Kembali ke Pesanan Saya</a>

    <h1 class="ord-title">Detail Pesanan</h1>

    <div class="ord-box">
        <h2>Informasi Pesanan</h2>

        <div class="ord-row"><span class="l">Nomor Pesanan</span><span class="v">{{ $order->order_number }}</span></div>
        <div class="ord-row"><span class="l">Tanggal</span><span class="v">{{ $order->created_at->format('d M Y, H:i') }}</span></div>
        <div class="ord-row">
            <span class="l">Status</span>
            <span class="v"><span class="ord-badge" style="background: {{ $st[1] }}; color: {{ $st[2] }};">{{ $st[0] }}</span></span>
        </div>
        <div class="ord-row"><span class="l">Penerima</span><span class="v">{{ $order->customer_name }}</span></div>
        <div class="ord-row"><span class="l">WhatsApp</span><span class="v">{{ $order->phone }}</span></div>
        <div class="ord-row"><span class="l">Alamat</span><span class="v">{{ $order->address }}</span></div>
    </div>

    <div class="ord-box">
        <h2>Produk yang Dipesan</h2>

        @foreach($order->items as $item)
            <div class="ord-row">
                <span class="l">
                    <strong style="color:#0f172a;">{{ $item->product_name }}</strong><br>
                    {{ $item->quantity }} × Rp {{ number_format($item->price, 0, ',', '.') }}
                </span>
                <span class="v">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
            </div>
        @endforeach

        <div class="ord-total">
            <span>Total</span>
            <span>Rp {{ number_format($order->total, 0, ',', '.') }}</span>
        </div>
    </div>

</div>

@endsection