<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ContactMessage;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        // ---------- Statistik produk & artikel (sudah ada sebelumnya) ----------
        $totalProducts = Product::count();
        $totalArticles = Article::count();
        $totalStock = (int) Product::sum('stock');
        $availableProducts = Product::where('stock', '>', 0)->count();

        // ---------- Statistik baru: pesanan & pesan ----------
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();

        // "Total Pendapatan": jumlah order yang tidak dibatalkan.
        // (Asumsi bisnis paling umum — order 'cancelled' tidak dihitung.)
        $totalRevenue = Order::where('status', '!=', 'cancelled')->sum('total');

        $unreadMessages = ContactMessage::where('status', 'unread')->count();

        // ---------- List untuk section "Pesanan Terbaru" & "Pesan Masuk" ----------
        $recentOrders = Order::latest()->take(5)->get();
        $recentMessages = ContactMessage::latest()->take(5)->get();

        // ---------- List lama, tetap dipertahankan ----------
        $recentProducts = Product::latest()->take(5)->get();
        $recentArticles = Article::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalProducts',
            'totalArticles',
            'totalStock',
            'availableProducts',
            'totalOrders',
            'pendingOrders',
            'totalRevenue',
            'unreadMessages',
            'recentOrders',
            'recentMessages',
            'recentProducts',
            'recentArticles'
        ));
    }
}