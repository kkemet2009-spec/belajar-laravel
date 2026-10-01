<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserOrderController extends Controller
{
    /**
     * Daftar pesanan milik user yang sedang login.
     */
    public function index(Request $request): View
    {
        $orders = $request->user()
            ->orders()
            ->withCount('items')
            ->latest()
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    /**
     * Detail satu pesanan. Hanya boleh dibuka oleh pemiliknya.
     */
    public function show(Request $request, Order $order): View
    {
        // 404 (bukan 403) agar keberadaan pesanan orang lain tidak terungkap.
        abort_unless($order->user_id === $request->user()->id, 404);

        $order->load('items');

        return view('orders.show', compact('order'));
    }
}